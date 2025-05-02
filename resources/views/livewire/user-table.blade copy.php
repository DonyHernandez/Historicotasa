<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado de Sesion</th>
                    <th>Activo/Inactivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->isOnline())
                                <span class="text-success">En Linea</span>
                            @else
                                <span class="text-danger">Desconectado</span>
                            @endif
                        </td>
                        <td>
                            <input type="checkbox" {{ $user->active ? 'checked' : '' }} wire:click="toggleActive({{ $user->id }})">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
