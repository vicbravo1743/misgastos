<form wire:submit.prevent='agregarCredito'>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Agrear credito
            </h3>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        {{ $creditoActual }} $
                    </h1>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" wire:model="credito" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-footer">
            <button class="btn btn-success btn-block">
                Agregar 
            </button>
        </div>
    </div>
</form>