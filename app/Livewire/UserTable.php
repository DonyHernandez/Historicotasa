<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserTable extends Component
{
    // public $users;
    use WithPagination;

    // public function mount()
    // {
    //     $this->loadUsers();
    // }

    // protected function loadUsers()
    // {
    //     $this->users = User::query()
    //         ->select(['id','name','email','active','last_login_at'])
    //         ->latest()
    //         ->paginate(3);
    // }

    public function toggleActive($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $user->active = !$user->active;
            $result = $user->save();

            // Emitimos un evento de notificación
            if ($result) {
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'Estado actualizado correctamente'
        ]);
        }else {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Error al actualizar el estado'
            ]);
        }
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Error al actualizar el estado: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::paginate(3)
        ]);
    }
}
