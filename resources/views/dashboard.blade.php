<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Panel
        </h2>
    </x-slot>

    @php
        $userCount=App\Models\User::count();
    @endphp

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-2">
                                  <div class="card-header h3">Usuarios</div>
                                      <div class="card-body">
                                        {{-- <h4 class="card-title">Primary card title</h4> --}}
                                        <p class="card-text">Cantidad de usuarios Registrados</p>
                                      </div>
                                        <div class="card-footer">                            
                                            <p class="text-right">
                                                <span class="badge bg-success rounded-pill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                                </svg>
                                                {{ $userCount }}
                                                </span>                            
                                            </p>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                {{-- <div class="card text-white bg-success mb-2">
                                  <div class="card-header h3">Usuarios</div>
                                      <div class="card-body">                                       
                                        <p class="card-text">Cantidad de usuarios Registrados</p>
                                      </div>
                                        <div class="card-footer">                            
                                            <p class="text-right">
                                                <span class="badge bg-primary rounded-pill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                                </svg>
                                                14
                                                </span>                            
                                            </p>
                                        </div>
                                </div> --}}
                            </div>

                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-2">
                                  <div class="card-header h3">Usuarios</div>
                                      <div class="card-body">
                                        {{-- <h4 class="card-title">Primary card title</h4> --}}
                                        <p class="card-text">Cantidad de usuarios Registrados</p>
                                      </div>
                                        <div class="card-footer">                            
                                            <p class="text-right">
                                                <span class="badge bg-primary rounded-pill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                                </svg>
                                                14
                                                </span>                            
                                            </p>
                                        </div>
                                </div>
                            </div>

                        <div class="p-6 text-gray-900">                    
                            {{-- <a href="{{ route('tasa') }}" type="button" class="btn btn-primary">Ir a otra página</a> --}}
                            <a href="{{ route('index') }}" type="button"  class="btn btn-info">Siguiente</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
