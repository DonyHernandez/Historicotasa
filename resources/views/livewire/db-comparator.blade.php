<div>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Comparador de Bases de Datos</h4>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="selectedDb1" class="form-label"> 1.- Base de Datos Origen </label>
                        <select wire:model="selectedDb1"
                                wire:change="$dispatch('refresh-me')"
                                class="form-select"
                                id="selectedDb1">
                            <option value="">Seleccione una base de datos</option>
                            @foreach($databases as $db)
                                <option value="{{ $db }}">{{ $db }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="selectedDb2" class="form-label"> 3.-Base de Datos Destino </label>

                        <select wire:model="selectedDb2"
                                wire:change="$dispatch('refresh-me')"
                                class="form-select"
                                id="selectedDb2">
                            <option value="">Seleccione una base de datos</option>
                            @foreach($databases as $db)
                                <option value="{{ $db }}">{{ $db }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-6">
                @if($selectedDb1)
                <div class="col-md-6">
                    <label for="tablesDb1" class="form-label"> 2.-Tablas en {{ $selectedDb1 }} </label>
                    <select class="form-select" id="tablesDb1" wire:model="selectedTable">
                        <option value="">Seleccione una tabla</option>
                        @foreach($tablesDb1 as $table)
                            <option value="{{ $table }}">{{ $table }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                @if($selectedDb2)
                <div class="col-md-6">
                    <label for="tablesDb2" class="form-label">  4.-Tablas en {{ $selectedDb2 }}  </label>
                    <select class="form-select" id="tablesDb2" disabled>
                        <option value="">Tablas disponibles</option>
                        @foreach($tablesDb2 as $table)
                            <option>{{ $table }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                </div>
                <p>
                    <br>


                @if($selectedTable)
                <div class="d-grid gap-2">
                    <button wire:click="compareAndTransfer" class="btn btn-success btn-lg"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove>Comparar y Transferir</span>
                        <span wire:loading>Procesando...</span>
                    </button>
                </div>
                @endif

                @if($progress > 0)
                <div class="mt-4">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" style="width: {{ $progress }}%">
                            {{ round($progress, 2) }}%
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        Procesados: {{ $processedRecords }} de {{ $totalRecords }}
                    </div>
                </div>
                @endif

                @if($status)
                <div class="mt-4 p-3 bg-light rounded">
                    <h5>Estado:::</h5>
                    <pre class="mb-0">{{ $status }}</pre>
                </div>

                <div class="d-grid gap-2">
                    <button wire:click="resetDates" class="btn btn-danger btn-lg">
                        <span>  Reiniciar Vista  </span>
                    </button>
                </div>
                @endif





            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('refresh-window', event => {
        location.reload();
    });
</script>
