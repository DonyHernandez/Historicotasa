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
                @if($users && count($users))
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><center>
                            @if ($user->isOnline())
                                <span class="badge bg-success">En Linea</span>
                            @else
                                <span class="badge bg-secondary">Desconectado</span>
                            @endif
                        </center></td>
                        <td>
                            <div class="form-check form-switch d-flex justify-content-center">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    role="switch"
                                    {{ $user->active ? 'checked' : '' }}
                                    wire:click="toggleActive({{ $user->id }})"
                                    wire:loading.attr="disabled"
                                >
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
        <tr>
            <td colspan="4">No hay usuarios registrados.</td>
        </tr>
    @endif
            </tbody>
        </table>
    </div>
    <div class="justify-content-end">
        {{ $users->links() }}
    </div>
</div>
