@section('title', __('users'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Listado de usuarios</h4>
        </div>
        @if (session()->has('message'))
        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
        @endif

        <div class="input-group mb-3 w-25">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bx bx-search py-2 px-1"></i>
                </span>
            </div>
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Usuario" aria-label="Buscar Usuario" aria-describedby="basic-addon1">
        </div>
        
        <div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
            Agregar Usuario +
        </div>
    </div>

    @include('livewire.users.modals')
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $row)
                <tr>
                    <td>
                    <img class="object-cover rounded-circle" width="40" height="40"
                            src="{{ $row->foto ? Storage::url($row->foto) : asset('static/dashboard/img/avatar/user.png') }}"
                            alt="Foto usuario">
                    </td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->apellido }}</td>
                    <td>{{ $row->cedula }}</td>
                    <td>{{ $row->correo }}</td>
                    <td>
                        @if($row->estatus=='activo')
                        <span class="badge-success">Activo</span>
                        @elseif($row->estatus=='pendiente')
                        <span class="badge-disabled">Pendiente</span>
                        @else
                         <span class="badge-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        @if($row->rol== 1)
                        <span class="badge-active">Administrador</span>
                        @else
                        <span class="badge-pending">Secretaria</span>
                        @endif
                    </td>
                    <td width="90">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </a>
                            <ul class="dropdown-menu position-absolute">
                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar </a></li>
                                <li><a class="dropdown-item" onclick="confirm('Confirm Delete User id {{$row->id}}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
                            </ul>
                        </div>                               
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="8">No se encontraron datos.</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $users->links() }}</div>
    </div>
</div>