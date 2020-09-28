<form wire:submit.prevent="agregarDebito">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Agregar debito
            </h3>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        {{ $debitoActual }} $
                    </h1>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control" wire:model="debito" placeholder="Cantidad">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-block">
                Agregar 
            </button>
        </div>
    </div>
</form>