@section('title', __('Datos Censales'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Personas Censadas</h4>
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
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Datos Censales" aria-label="Buscar Datos Censales" aria-describedby="basic-addon1">
        </div>
        
        <div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
            Censar +
        </div>
    </div>

    @include('livewire.datos-censales.modals')
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr>  
                    <th>Persona</th>
                    <th>Nivel Educativo</th>
                    <th>Ocupación</th>
                    <th>Discapacidad</th>
                    <th>Seguro</th>
                    <th>Vive Desde</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($datosCensales as $row)
                <tr>
                    <td>{{ $row->persona->nombres }} {{ $row->persona->apellidos }}</td>
                    <td>{{ $row->nivel_educativo }}</td>
                    <td>{{ $row->ocupacion }}</td>
                    <td>
                        @if($row->tipo_discapacidad == null)
                        <span class="text-muted">No tiene</span>
                        @else
                        <span>{{ $row->tipo_discapacidad }}</span>
                        @endif
                    </td>
                    <td>
                        @if($row->nombre_seguro == null)
                        <span class="text-muted">No tiene</span>
                        @else
                        <span>{{ $row->nombre_seguro }}</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($row->vive_desde)->format('d-m-Y') }}</td>
                    <td width="90">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </a>
                            <ul class="dropdown-menu position-absolute">
                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar</a></li>
                                <li><a class="dropdown-item" onclick="confirm('Confirm Delete Datos Censale id {{$row->id}}? \nDeleted Datos Censales cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
                            </ul>
                        </div>                               
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">No hay información agregada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $datosCensales->links() }}</div>
    </div>
</div>