<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\withPagination;
use Livewire\Attributes\On;
use App\Models\Historialtasa;
use Illuminate\Support\Collection;
// use Illuminate\Support\Str;


class ResultComponent extends Component
{


    public $showModal = false;
    public $searchResults=[];



    use withPagination;





    #[On('showSearchModal')]
    public function mostrarModal($searchResults)
    {
        // dump('Received searchResults:', $searchResults); // Verifica que la estructura y data recibida sean correctas
        if (is_array($searchResults)) {
            $searchResults = collect($searchResults);
        } elseif (is_string($searchResults)) {
            $searchResults = collect(json_decode($searchResults, true));
        } else {
            $searchResults = collect();
        }

        // if ($searchResults->isEmpty()) {
        //     dump('No data in searchResults after conversion'); // Confirmar que no haya datos después de la conversión
        // // } else {
        // //     dump($searchResults); // Muestra la colección de datos
        // }


        // $this->searchResults = $searchResults->paginate(8);   // Ajuste para la paginación, por ejemplo, 8 resultados por página
        $this->searchResults = ($searchResults);   // Ajuste para la paginación, por ejemplo, 8 resultados por página
        $this->showModal = true;
    }

    public function close()
    {
        $this->dispatch('refresh-window');
        // $this->resetPage(); // Resetea la paginación cuando cierras el modal
        // $this->reset(['searchResults']);
        // $this->dispatch('close-modal');
    }


        public function render()
        {
            return view('livewire.result-component', [
                'results' => $this->searchResults
            ]);
        }
}
