<div class="col-12">

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session()->get('message') }}    
        </div>                    
    @endif
    <div class="row">
        <div class="col-md-4">
            @if ( $showEdit === true )
                @include('livewire.users.edit')
            @endif

            @if( $showCreate === true )
                @include('livewire.users.create')
            @endif
        </div>
    
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" wire:model="userId">
                                <option value="">Selecciona usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button wire:click="create" class="btn btn-primary">
                                Crear usuario
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
    
                                <th>
                                    Nombre
                                </th>
    
                                <th>
                                    Email
                                </th>

                                <th colspan="2"></th>
                            
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        <button wire:click="edit({{$user->id}})" class="btn btn-warning">Editar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>