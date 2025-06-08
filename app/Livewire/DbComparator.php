<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class DbComparator extends Component
{
    public $databases = [];
    public $selectedDb1=null;
    public $selectedDb2=null;
    // public $tables = [];
    public $selectedTable=null;
    public $primaryKey = 'id';
    public $status = '';
    public $progress = 0;
    public $totalRecords = 0;
    public $processedRecords = 0;
    public $tablesDb1 = [];
    public $tablesDb2 = [];




    public function mount()
    {
        $this->databases = $this->getAvailableDatabases();
    }
    protected function getListeners()
    {
        return [
            'refresh-me' => '$refresh',
        ];
    }
    protected function getColumnsWithNullHandling()
    {
        $columns = Schema::connection('db1')->getColumnListing($this->selectedTable);

        return implode(', ', array_map(function($column) {
            return "IFNULL(`$column`, NULL) as `$column`";
        }, $columns));
    }
    public function getAvailableDatabases()
    {

    try {
        $query = "SELECT schema_name as name FROM information_schema.schemata
                    WHERE schema_name NOT IN ('information_schema', 'mysql', 'performance_schema', 'sys')";

        $databases = DB::connection('mysql')->select($query);

        return collect($databases)->pluck('name')->toArray();
    } catch (\Exception $e) {
        $this->status = "Error al conectar con el servidor de bases de datos: " . $e->getMessage();
        return [];
    }
    }
    public function updatedSelectedDb1($value)
    {
        $this->reset('tablesDb1', 'selectedTable');
        $this->loadTables($value, 'db1');
        $this->dispatch('refresh-me');              // Nuevo sistema de eventos en LW3
    }
    public function updatedSelectedDb2($value)
    {
        $this->reset('tablesDb2');
        $this->loadTables($value, 'db2');
        $this->dispatch('refresh-me');              // Nuevo sistema de eventos en LW3
    }
    public function loadTables($database, $type)
    {
        if (empty($database)) {
            if ($type === 'db1') {
                $this->tablesDb1 = [];
            } else {
                $this->tablesDb2 = [];
            }
            return;
        }

        try {
            // Usar una conexión temporal única para cada llamada
            $tempConnectionName = 'temp_' . $type;

            config(["database.connections.{$tempConnectionName}" => [
                'driver' => 'mysql',
                'host' => config('database.connections.mysql.host'),
                'port' => config('database.connections.mysql.port'),
                'database' => $database,
                'username' => config('database.connections.mysql.username'),
                'password' => config('database.connections.mysql.password'),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
            ]]);

            DB::purge($tempConnectionName);

            $tables = DB::connection($tempConnectionName)
                    ->select('SHOW TABLES');

            $key = 'Tables_in_' . $database;
            $tablesList = collect($tables)->pluck($key)->toArray();

            if ($type === 'db1') {
                $this->tablesDb1 = $tablesList;
            } else {
                $this->tablesDb2 = $tablesList;
            }

        } catch (\Exception $e) {
            $errorMsg = "Error cargando tablas de {$database}: " . $e->getMessage();
            $this->status = $errorMsg;
            \Log::error($errorMsg);

            if ($type === 'db1') {
                $this->tablesDb1 = [];
            } else {
                $this->tablesDb2 = [];
            }
        }
    }
    public function compareAndTransfer()
    {
        $this->validate([
            'selectedDb1' => 'required',
            'selectedDb2' => 'required',
            'selectedTable' => 'required',
            'primaryKey' => 'required',
        ]);

        $this->status = 'Iniciando comparación...';
        $this->progress = 0;
        $this->processedRecords = 0;

        try {
            // Conexión a DB1
            config(['database.connections.db1.database' => $this->selectedDb1]);
            DB::purge('db1');

            // Conexión a DB2
            config(['database.connections.db2.database' => $this->selectedDb2]);
            DB::purge('db2');

            // Obtener registros de DB1
            $sourceRecords = DB::connection('db1')
            ->table($this->selectedTable)
            ->select(DB::raw($this->getColumnsWithNullHandling()))
            ->get()
            ->keyBy($this->primaryKey);

            $this->totalRecords = $sourceRecords->count();
            $this->status = "Total registros en DB1: {$this->totalRecords}";

            // Obtener registros de DB2
            $targetRecords = DB::connection('db2')
                ->table($this->selectedTable)
                ->select($this->primaryKey)
                ->get()
                ->keyBy($this->primaryKey);

            $this->status .= "\nTotal registros en DB2: " . $targetRecords->count();

            // Identificar registros faltantes
            $missingRecords = $sourceRecords->diffKeys($targetRecords);

            $this->status .= "\nRegistros faltantes: " . $missingRecords->count();
            $this->totalRecords = $missingRecords->count();

            if ($missingRecords->isEmpty()) {
                $this->status .= "\nNo hay registros faltantes para transferir.";
                return;
            }

            // Transferir registros faltantes
            $this->status .= "\nIniciando transferencia...";
            $batchSize = 100;
            $batch = [];

            foreach ($missingRecords as $key => $record) {
                $batch[] = (array)$record;

                if (count($batch) >= $batchSize) {
                    $this->insertBatch($batch);
                    $batch = [];
                }

                $this->processedRecords++;
                $this->progress = ($this->processedRecords / $this->totalRecords) * 100;
            }

            // Insertar el último lote si no está vacío
            if (!empty($batch)) {
                $this->insertBatch($batch);
            }

            $this->status .= "\nTransferencia completada con éxito!";
        } catch (\Exception $e) {
            $this->status = "Error: " . $e->getMessage();
        }
    }
    protected function insertBatch($records)
    {
        try {
            // Convertir los valores datetime antes de insertar
            $processedRecords = array_map(function($record) {
                foreach ($record as $key => $value) {
                    if ($value instanceof \DateTime) {
                        $record[$key] = $value->format('Y-m-d H:i:s');
                    } elseif (is_string($value) && $this->isDateTimeString($value)) {
                        $record[$key] = $this->formatDateTimeString($value);
                    } elseif (empty($value) && $this->isDateTimeColumn($key)) {
                        $record[$key] = null; // Permitir NULL para campos datetime vacíos
                    }
                }
                return $record;
            }, $records);

            DB::connection('db2')->table($this->selectedTable)->insert($processedRecords);
        } catch (\Exception $e) {
            // Consejo Adicional 1 - Ampliado
            $problematicRecord = collect($records)->first(function ($record) use ($e) {
                return str_contains($e->getMessage(), json_encode($record));
            });

            Log::channel('db_sync')->error('Error en transferencia de datos', [
                'exception' => $e->getMessage(),
                'table' => $this->selectedTable,
                'sample_data' => $problematicRecord ?: $records[0] ?? 'No records',
                'datetime_columns' => $this->getDateTimeColumns(),
                'connection' => config('database.connections.db2.database')
            ]);

            $this->status .= sprintf(
                "\nError en lote de %d registros: %s (Ver logs para detalles)",
                count($records),
                $e->getMessage()
            );
        }
    }
    protected function getDateTimeColumns()
    {
        return collect(DB::connection('db2')
            ->getSchemaBuilder()
            ->getColumns($this->selectedTable))
            ->filter(function ($column) {
                return in_array($column['type'], ['datetime', 'timestamp', 'date']);
            })
            ->pluck('name')
            ->toArray();
    }
    /**
     * Método de depuración que se ejecuta antes de renderizar
     **/
    public function hydrate()
    {
        \Log::debug('Hydrate (antes de render)', [
            'selectedDb1' => $this->selectedDb1,
            'selectedDb2' => $this->selectedDb2,
            'tablesDb1' => $this->tablesDb1,
            'tablesDb2' => $this->tablesDb2,
            'selectedTable' => $this->selectedTable
        ]);
    }
    /**
     * Método de depuración que se ejecuta después de renderizar
    **/
    public function dehydrate()
    {
        \Log::debug('Dehydrate (después de render)', [
            'selectedDb1' => $this->selectedDb1,
            'selectedDb2' => $this->selectedDb2,
            'tablesDb1' => $this->tablesDb1,
            'tablesDb2' => $this->tablesDb2,
            'selectedTable' => $this->selectedTable
        ]);
    }
    protected function isDateTimeString($value)
    {
        return preg_match('/\d{4}-\d{2}-\d{2}/', $value) ||
            preg_match('/\d{2}\/\d{2}\/\d{4}/', $value);
    }
    protected function formatDateTimeString($value)
    {
        try {
            if (strpos($value, '/') !== false) {
                // Formato DD/MM/YYYY
                return \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d H:i:s');
            } else {
                // Intentar parsear otros formatos
                return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
            }
        } catch (\Exception $e) {
            return null; // O manejar el error como prefieras
        }
    }
    protected function isDateTimeColumn($columnName)
    {
        $columns = DB::connection('db2')
            ->getSchemaBuilder()
            ->getColumns($this->selectedTable);

        foreach ($columns as $column) {
            if ($column['name'] === $columnName) {
                return in_array($column['type'], ['datetime', 'timestamp', 'date']);
            }
        }

        return false;
    }
    public function resetDates()
    {
        $this->dispatch('refresh-window');

    }
    public function render()
    {
        return view('livewire.db-comparator');
    }
}
