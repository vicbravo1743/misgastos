<form wire:submit.prevent="store">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Crear un nuevo gasto
            </h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <input class="form-control" type="text" wire:model="descripcion" placeholder="Descripcion">
                @error('descripcion')
                    <span class="text-red">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input class="form-control" type="number" wire:model="cantidad" placeholder="Cantidad">
                @error('cantidad')
                    <span class="text-red">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <select class="form-control" wire:model="tipo">
                    <option value="">Selecciona el tipo</option>
                    <option value="EFECTIVO">Efectivo</option>
                    <option value="CREDITO">Credito</option>
                    <option value="DEBITO">Debito</option>
                </select>
                @error('tipo')
                    <span class="text-red">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <select class="form-control" wire:model="necesario">
                    <option value="">
                        Selecciona una opcion
                    </option>
                    <option value="true">Necesario</option>
                    <option value="false">Innecesario</option>
                </select>
                @error('necesario')
                    <span class="text-red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-block">
                Guardar
            </button>
        </div>
    </div>
</form>