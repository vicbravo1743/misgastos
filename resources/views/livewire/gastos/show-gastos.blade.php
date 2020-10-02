<div class="col-12">
    @if(session()->has('message_error'))
        <div class="alert alert-danger">
            {{ session()->get('message_error') }}
        </div>
    @endif
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            {{ session()->get('message_success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            @include('livewire.gastos.create')
        </div>

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Tipo</label>
                            <select class="form-control" wire:model="tipoSearch">
                                <option value="">Selecciona una opcion</option>
                                <option value="EFECTIVO">Efectivo</option>
                                <option value="DEBITO">Debito</option>
                                <option value="CREDITO">Credito</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="">Necesario</label>
                            <select class="form-control" wire:model="necesarioSearch">
                                <option value="">Selecciona una opcion</option>
                                <option value="NECESARIO">Necesario</option>
                                <option value="INNECESARIO">Innecesario</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>
                                Id
                            </th>

                            <th>
                                Descripción
                            </th>
            
                            <th>
                                Cantidad
                            </th>
            
                            <th>
                                Iva
                            </th>

                            <th>
                                Tipo
                            </th>
            
                            <th>
                                Necesario
                            </th>
                        </thead>

                        <tbody>
                            @foreach ($gastos as $gasto)
                                <tr>
                                    <td>
                                        {{ $gasto->id }}
                                    </td>

                                    <td>
                                        {{ $gasto->descripcion }}
                                    </td>

                                    <td>
                                        {{ $gasto->cantidad }} $
                                    </td>

                                    <td>
                                        {{ $gasto->iva }} $
                                    </td>

                                    <td>
                                        {{ $gasto->tipo }}
                                    </td>

                                    <td>
                                        @if($gasto->necesario == 'NECESARIO')
                                            Necesario
                                        @elseif($gasto->necesario == 'INNECESARIO')
                                            Innecesario
                                        @endif  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $gastos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>