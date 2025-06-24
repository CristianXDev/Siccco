@section('title', __('Solicitudes Mejoras'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Listado de solicitudes</h4>
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
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Solicitud" aria-label="Buscar Solicitud" aria-describedby="basic-addon1">
        </div>
        
        <div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
            Agregar Solicitud +
        </div>
    </div>

    @include('livewire.solicitudes-mejoras.modals')
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Solicitud</th>
                    <th>Persona</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Cierre</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($solicitudesMejoras as $row)
                <tr>
                    <td>{{ $row->tiposSolicitud->nombre }}</td>
                    <td>{{ $row->persona->nombres }} {{ $row->persona->apellidos }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->fecha_creacion)->format('d-m-Y') }}</td>
                    <td>{{ $row->fecha_cierre ? \Carbon\Carbon::parse($row->fecha_cierre)->format('d-m-Y') : 'N/A' }}</td>
                    <td>
                        @if($row->estado == 'Pendiente')
                        <span class="badge bg-disabled">Pendiente</span>
                        @elseif($row->estado == 'Completada')
                        <span class="badge-success">Completada</span>
                        @elseif($row->estado == 'Cancelada')
                        <span class="badge bg-danger">Cancelada</span>
                        @else
                        <span class="badge bg-secondary">{{ $row->estado }}</span>
                        @endif
                    </td>
                    <td>{{ $row->user->nombre }} {{ $row->user->apellido }}</td>
                    <td width="90">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </a>
                            <ul class="dropdown-menu position-absolute">
                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar</a></li>
                                <li><a class="dropdown-item" onclick="confirm('Confirm Delete Solicitudes Mejora id {{$row->id}}? \nDeleted Solicitudes Mejoras cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
                            </ul>
                        </div>                               
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">No hay información disponible</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $solicitudesMejoras->links() }}</div>
    </div>
</div>