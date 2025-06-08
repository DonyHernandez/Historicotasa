<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\Features\SupportEvents\HandlesEvents;
use Livewire\Attributes\On;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\Historialtasa;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;





class SearchComponent extends Component
{
    public $startDate;
    public $endDate;
    // public $inputValue = '';
    public $searchResults = [];
    public $showModal = false;

    public $message = '';
    protected $rules = [
        'startDate' => 'required|date',
        'endDate' => 'required|date|after_or_equal:startDate',
    ];


    use withPagination;




    public function resetDates()
    {
        $this->dispatch('refresh-window');

    }
    
    public function search()
    {
        $this->validate();

        // dump('Start Date:', $this->startDate, 'End Date:', $this->endDate);

        $query = Historialtasa::whereBetween('fechaval2', [$this->startDate, $this->endDate]);
        // dump($query->toSql());

        $this->searchResults = $query->get();
        // $this->searchResults = $query->paginate(8);

        if ( $this->searchResults->isEmpty()) {
            // dump('No data found');
            $this->searchResults = collect();
        // } else {
        //     dump($this->searchResults); // Mostrar los resultados encontrados
        }

        // Emite el evento con los resultados (asegura datos válidos).
        $this->dispatch('showSearchModal', searchResults: $this->searchResults->isNotEmpty() ? $this->searchResults->toArray() : []);
    // dd($this->dispatch);
    }

    /**
     * Funcion boton actualizar tasa bcv por comando
     * @return void
     */
    public function fetchRates()
    {
        Artisan::call('fetch:fetch-rates');
        $this->message = 'Tasas Actualizadas Correctamente... ';

        // Limpia el mensaje después de 5 segundos
    // $this->dispatchBrowserEvent('message-timer', ['duration' => 5000]);
    $this->dispatch('message-timer', ['duration' => 5000]);
    }


    public function render()
    {
        $tasabcvs = Historialtasa::orderBy('id', 'desc')->paginate(8)->withQueryString();
        return view('livewire.search-component', compact('tasabcvs'));
    }


}
