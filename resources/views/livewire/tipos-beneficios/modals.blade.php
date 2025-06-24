<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Registrar Nuevo Beneficio
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                    <!-- Sección de información del beneficio -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-card-checklist me-2"></i>Datos del Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                <label for="nombre">Nombre del Beneficio</label>
                                @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 150px"></textarea>
                                <label for="descripcion">Descripción Detallada</label>
                                @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-save me-1"></i> Registrar Beneficio
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
                    <i class="bi bi-pencil-square me-2"></i>Actualizar Beneficio
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    
                    <!-- Sección de información del beneficio -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-card-checklist me-2"></i>Datos del Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                <label for="nombre">Nombre del Beneficio</label>
                                @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 150px"></textarea>
                                <label for="descripcion">Descripción Detallada</label>
                                @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-save me-1"></i> Actualizar Beneficio
                </button>
            </div>
        </div>
    </div>
</div>