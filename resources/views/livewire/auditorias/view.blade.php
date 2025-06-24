@section('title', __('Auditorias'))

<div class="container-fluid">

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Listado de solicitudes</h4>
        </div>
        @if (session()->has('message'))
        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
        @endif

        <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bx bx-search py-2 px-1"></i>
                </span>
            </div>
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar solicitud" aria-label="Buscar solicitud" aria-describedby="basic-addon1">
        </div>

    </div>

    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse($auditorias as $row)
                <tr>
                    <td>{{ $row->user->nombre }} {{ $row->user->apellido }}</td>
                    <td>
                        @if($row->user->rol==1)

                        <span class="badge-active">Administrador</span>

                        @else

                        <span class="badge-success">Secretaria</span>

                        @endif
                    </td>
                    <td> {{ Str::limit($row->descripcion, 50, '...') }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="100%">No data Found </td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $auditorias->links() }}</div>
    </div>

</div>
</div>