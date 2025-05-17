<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>



    <!-- Agregar esto para las notificaciones -->
    <div x-data="{ showNotification: false, message: '', type: '' }"
        x-on:notify.window="
            showNotification = true;
            message = $event.detail.message;
            type = $event.detail.type;
            setTimeout(() => { showNotification = false }, 3000)
        ">
        <div x-show="showNotification"
            x-transition
            :class="{'bg-green-500': type === 'success', 'bg-red-500': type === 'error'}"
            class="fixed top-4 right-4 p-4 rounded-lg text-white shadow-lg">
            <span x-text="message"></span>
        </div>
    </div>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><center>Nombre</center></th>
                    <th><center>Email</center></th>
                    <th><center>Estado de Sesion</center></th>
                    <th><center>Activo/Inactivo</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><center>
                            @if ($user->isOnline())
                                <span class="text-success">En Linea</span>
                            @else
                                <span class="text-danger">Desconectado</span>
                            @endif
                        </center></td>
                        <td><center>
                            <input
                                type="checkbox"
                                wire:click="toggleActive( {{ $user->id }} )"
                                {{ $user->active ? 'checked' : ' ' }}
                                wire:loading.attr="disabled"
                            >
                        </center></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    <div class="justify-content-end">
        {{ $users->links() }}
    </div>
</div>
</div>
</div>
</x-app-layout>
@livewireScripts
<script>
    window.addEventListener('notify', event => {
        toastr[event.detail.type](event.detail.message);
    });
</script>
