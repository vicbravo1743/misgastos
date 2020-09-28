<div class="card">

    <div class="card-header">
        <h3 class="card-title">Crear usuario</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <input wire:model="name" type="text" class="form-control" placeholder="Nombre" autocomplete="off">
            @error('name')
                <span class="text-red">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input wire:model="email" type="email" class="form-control" placeholder="Email" autocomplete="off">
            @error('email')
                <span class="text-red">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input wire:model="password" type="password" class="form-control" placeholder="Contraseña" autocomplete="off">
            @error('password')
                <span class="text-red">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input wire:model="password_confirmation" type="password" class="form-control" placeholder="Confirmar contraseña" autocomplete="off">
        </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-success btn-block" wire:click="store">
            Actualizar
        </button>
    </div>

</div>