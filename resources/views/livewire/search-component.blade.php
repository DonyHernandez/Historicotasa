<div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="container">
                <div class="row">
                    <div class="col-5">
                        @error('startDate') <span class="error">{{ $message }}</span> @enderror
                        <input type="date" class="form-control"  id="startDate" wire:model="startDate" required=" ">
                    </div>
                    <div class="col-5">
                        @error('endDate') <span class="error">{{ $message }}</span> @enderror
                        <input type="date" class="form-control"  id="endDate" wire:model="endDate" required=" ">
                    </div>
                    <div class="col-1">
                        <button  class="btn btn-outline-success" wire:click="search">
                            <i class="bi bi-search"></i>
                            Buscar
                        </button>
                    </div>

                    <div class="col-1">
                        <button  class="btn btn-outline-danger" wire:click="resetDates">Resetear</button>
                    </div>
                </div>
        </div>
    </div>
    <br>

                    {{-- <div class="table-responsive-sm"> --}}
                    <div class="table-container">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark sticky-top>
                                <tr class="table-primary">
                                    <th scope="col"> </th>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col"><center>EURO</center></th>
                                    <th scope="col"><center>CNY</center></th>
                                    <th scope="col"><center>TRY</center></th>
                                    <th scope="col"><center>RUB</center></th>
                                    <th scope="col"><center>USD</center></th>
                                    <th scope="col"><center>FECHA OPERACION</center></th>
                                    <th scope="col"><center>FECHA</center></th>
                                    <th scope="col"><center>FECHA ACTUAL</center></th>
                                </tr>
                            </thead>
                                <tbody>

                                @foreach ($tasabcvs as $tasabcv)
                                    <tr>
                                        <td> </td>
                                        {{-- <th scope="row"> {{$tasabcv->id }} </center></th> --}}
                                        <td><center> {{ $tasabcv->eur}} </center></td>
                                        <td><center> {{ $tasabcv->cny}} </center></td>
                                        <td><center> {{ $tasabcv->try}} </center></td>
                                        <td><center> {{ $tasabcv->rub}} </center></td>
                                        <td><center> {{ $tasabcv->usd}} </center></td>
                                        <td><center> {{ $tasabcv->fechaope}} </center></td>
                                        <td><center> {{ $tasabcv->fechaval1}} </center></td>
                                        <td><center> {{ $tasabcv->fechaval2}} </center></td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
    <div class="justify-content-end">
        {{ $tasabcvs->links() }}
        <livewire:result-component />
    </div>


</div>
@livewireScripts
<script>
    window.addEventListener('refresh-window', event => {
        location.reload();
    });
</script>
