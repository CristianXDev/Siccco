@section('title', __('Tipos Solicitud'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Listado de tipos de solicitud</h4>
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
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Tipos de Solicitud" aria-label="Buscar Tipos de Solicitud" aria-describedby="basic-addon1">
        </div>
        
        <div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
            Agregar Tipo +
        </div>
    </div>

    @include('livewire.tipos-solicituds.modals')
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Prioridad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tiposSolicituds as $row)
                <tr>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ Str::limit($row->descripcion, 50, '...') }}</td>
                    <td>
                        @if($row->prioridad == 'Alta')
                        <span class="badge bg-danger">Alta</span>
                        @elseif($row->prioridad == 'Media')
                        <span class="badge bg-warning">Media</span>
                        @else
                        <span class="badge bg-success">Baja</span>
                        @endif
                    </td>
                    <td width="90">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </a>
                            <ul class="dropdown-menu position-absolute">
                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar</a></li>
                                <li><a class="dropdown-item" onclick="confirm('¿Confirmar eliminación de Tipo de Solicitud id {{$row->id}}? \n¡Los Tipos de Solicitud eliminados no se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
                            </ul>
                        </div>                               
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="4">No hay registros disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $tiposSolicituds->links() }}</div>
    </div>
</div>