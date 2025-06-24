@section('title', __('Beneficios'))
<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div class="float-left">
            <h4 class="mt-2">Lista de beneficios dados</h4>
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
            <input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Beneficio" aria-label="Buscar Beneficio" aria-describedby="basic-addon1">
        </div>
    </div>
    
    <div class="table-responsive mt-5">
        <table class="table table-stripeed table-sm">
            <thead class="thead bg-light">
                <tr> 
                    <th>Persona</th>
                    <th>Cédula</th>
                    <th>Reporte</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beneficios as $row)
                <tr>
                    <td>{{ $row->persona->nombres }} {{ $row->persona->apellidos }}</td>
                    <td>{{ $row->persona->cedula }}</td>
                    <td>
                        <a href="{{ route('beneficios-reporte-download',['id'=>$row->persona->id]) }}" 
                           target="_blank" 
                           class="btn btn-sm btn-success">
                           <i class="bx bx-file"></i> Descargar
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="3">No hay información agregada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>                        
        <div class="float-end">{{ $beneficios->links() }}</div>
    </div>
</div>