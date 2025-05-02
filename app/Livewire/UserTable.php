<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\User;

class UserTable extends Component
{
    public $users;
    use withPagination;


    public function mount()
    {
        // Obtener todos los usuarios
        $this->users = User::all();
    }

    public function toggleActive($userId)
    {
        // Cambiar el estado activo/inactivo del usuario
        $user = User::find($userId);
        $user->active = !$user->active;
        $user->save();
        // Actualizar la lista de usuarios
        $this->users = User::all();
    }

    public function render()
    {
        $users = User::paginate(3);
        //$users = User::all()->paginate(3);
        // dd($users);
        return view('livewire.user-table', compact('users'));
    }
}
