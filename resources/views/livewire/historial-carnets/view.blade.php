@section('title', __('Historial Carnets'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Listado de reportes</h4>
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
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Reporte" aria-label="Buscar Reporte" aria-describedby="basic-addon1">
        </div>
        
        <div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
            Agregar Reporte +
        </div>
    </div>

    @include('livewire.historial-carnets.modals')
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Persona</th>
                    <th>Código Carnet</th>
                    <th>Fecha Cambio</th>
                    <th>Reporte</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($historialCarnets as $row)
                <tr>
                    <td>{{ $row->persona->nombres }} {{ $row->persona->apellidos }}</td>
                    <td>#{{ $row->codigo_carnet }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->fecha_cambio)->format('d-m-Y') }}</td>
                    <td>
                        @if($row->nivel_educativo == 'Renovacion')
                        <span class="badge-success">Renovación</span>
                        @else
                        <span class="badge bg-danger">Pérdida</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($row->observaciones, 50, '...') }}</td>
                    <td width="90">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </a>
                            <ul class="dropdown-menu position-absolute">
                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar</a></li>
                                <li><a class="dropdown-item" onclick="confirm('Confirm Delete Historial Carnet id {{$row->id}}? \nDeleted Historial Carnets cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
                            </ul>
                        </div>                               
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="6">No hay información agregada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $historialCarnets->links() }}</div>
    </div>
</div>