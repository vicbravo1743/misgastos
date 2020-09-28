<form wire:submit.prevent="agregarEfectivo">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Agrear efectivo
            </h3>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        {{ $efectivoActual }} $
                    </h1>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control" wire:model="efectivo" placeholder="Cantidad">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-footer">
            <button class="btn btn-success btn-block" type="submit">
                Agregar 
            </button>
        </div>
    </div>
</form>