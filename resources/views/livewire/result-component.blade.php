<div>
    {{-- <div> --}}
        @if($showModal)
            <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;" aria-modal="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h5 class="modal-title" id="exampleModalLongTitle">Resultados de Búsqueda</h5></center>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close" wire:click="$set('showModal', false)">
                                <span aria-hidden="true"> </span>
                            </button>
                        </div>
                        <div class="modal-body">

@if ($results->isNotEmpty())

                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col"> </th>
                                            <th scope="col"><center>EURO</center></th>
                                            <th scope="col"><center>USD</center></th>
                                            <th scope="col"><center>FECHA ACTUAL</center></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach ($results  as $result)
                                            <tr>
                                                <td> </td>
                                                <td><center> {{ $result['eur']}} </center></td>
                                                <td><center> {{ $result['usd']}} </center></td>
                                                <td><center>{{ date('d-m-Y', strtotime($result['fechaval2'])) }} </center></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                                    {{-- <div class="justify-content-end">
                                        {{ $results->links() }}
                                    </div> --}}
@else
    <p>No se encontraron resultados.</p>
@endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success" wire:click="close">Cerrar</button>
                            {{-- <button type="button" class="btn btn-outline-success" wire:click="close">Cerrar</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show" style="display: block;"></div>
        @endif
    {{-- </div> --}}
</div>
