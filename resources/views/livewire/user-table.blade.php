<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>

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
                            <input type="checkbox" {{ $user->active ? 'checked' : '' }} wire:click="toggleActive({{ $user->id }})">
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
