<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Registrar Nuevo Tipo de Solicitud
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                    <!-- Sección de información del tipo de solicitud -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-card-checklist me-2"></i>Datos del Tipo de Solicitud</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                <label for="nombre">Nombre</label>
                                @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder=" ">
                                <label for="descripcion">Descripción</label>
                                @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select wire:model="prioridad" class="form-select" id="prioridad">
                                    <option value="">Seleccione una prioridad</option>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                                <label for="prioridad">Prioridad</label>
                                @error('prioridad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Pie de modal -->
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Cancelar
                </button>
                <button type="submit" wire:click.prevent="store()" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Registrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="updateModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>Actualizar Tipo de Solicitud
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    
                    <!-- Sección de información del tipo de solicitud -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-card-checklist me-2"></i>Datos del Tipo de Solicitud</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                <label for="nombre">Nombre</label>
                                @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder=" ">
                                <label for="descripcion">Descripción</label>
                                @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select wire:model="prioridad" class="form-select" id="prioridad">
                                    <option value="">Seleccione una prioridad</option>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                                <label for="prioridad">Prioridad</label>
                                @error('prioridad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Pie de modal -->
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Cancelar
                </button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>