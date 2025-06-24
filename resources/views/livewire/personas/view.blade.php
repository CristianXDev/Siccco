@section('title', __('Personas'))
<div class="container-fluid">
	<div style="display: flex; justify-content: space-between; align-items: center;">
		<div class="float-left">
			<h4 class="mt-2">Listado de personas</h4>
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
			<input wire:model='keyWord' type="text" class="form-control" placeholder="Buscar Persona" aria-label="Buscar Persona" aria-describedby="basic-addon1">
		</div>
		
		<div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
			Agregar Persona +
		</div>
	</div>

	@include('livewire.personas.modals')
	
	<div class="table-responsive mt-5">
		<table class="table table-stripeed table-sm">
			<thead class="thead bg-light">
				<tr> 
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
					<th>Sexo</th>
					<th>Fecha Nacimiento</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@forelse($personas as $row)
				<tr>
					<td>{{ $row->nombres }}</td>
					<td>{{ $row->apellidos }}</td>
					<td>{{ $row->cedula }}</td>
					<td>{{ $row->sexo }}</td>
					<td>{{ \Carbon\Carbon::parse($row->fecha_nacimiento)->format('d-m-Y') }}</td>
					<td>
						@if($row->estado == 1)
						<span class="badge-success">Activo</span>
						@elseif($row->estado == 2)
						<span class="badge-disabled">Pendiente</span>
						@else
						<span class="badge-danger">Inactivo</span>
						@endif
					</td>
					<td width="90">
						<div class="dropdown">
							<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Acciones
							</a>
							<ul class="dropdown-menu position-absolute">
								<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Editar </a></li>
								<li><a class="dropdown-item" onclick="confirm('Confirm Delete Persona id {{$row->id}}? \nDeleted Personas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Eliminar</a></li>  
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
		<div class="float-end">{{ $personas->links() }}</div>
	</div>
</div>