<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Seguimiento Solicitude</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="solicitud_id"></label>
                        <input wire:model="solicitud_id" type="text" class="form-control" id="solicitud_id" placeholder="Solicitud Id">@error('solicitud_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persona_id"></label>
                        <input wire:model="persona_id" type="text" class="form-control" id="persona_id" placeholder="Persona Id">@error('persona_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_seguimiento"></label>
                        <input wire:model="fecha_seguimiento" type="text" class="form-control" id="fecha_seguimiento" placeholder="Fecha Seguimiento">@error('fecha_seguimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_anterior"></label>
                        <input wire:model="estado_anterior" type="text" class="form-control" id="estado_anterior" placeholder="Estado Anterior">@error('estado_anterior') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_nuevo"></label>
                        <input wire:model="estado_nuevo" type="text" class="form-control" id="estado_nuevo" placeholder="Estado Nuevo">@error('estado_nuevo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Seguimiento Solicitude</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="solicitud_id"></label>
                        <input wire:model="solicitud_id" type="text" class="form-control" id="solicitud_id" placeholder="Solicitud Id">@error('solicitud_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persona_id"></label>
                        <input wire:model="persona_id" type="text" class="form-control" id="persona_id" placeholder="Persona Id">@error('persona_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_seguimiento"></label>
                        <input wire:model="fecha_seguimiento" type="text" class="form-control" id="fecha_seguimiento" placeholder="Fecha Seguimiento">@error('fecha_seguimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_anterior"></label>
                        <input wire:model="estado_anterior" type="text" class="form-control" id="estado_anterior" placeholder="Estado Anterior">@error('estado_anterior') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_nuevo"></label>
                        <input wire:model="estado_nuevo" type="text" class="form-control" id="estado_nuevo" placeholder="Estado Nuevo">@error('estado_nuevo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
