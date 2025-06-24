<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-gift me-2"></i>Registrar Nuevo Beneficio
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                  <!-- Sección del beneficiario -->
                  <div class="card mb-4 border-primary">
                    <div class="card-header bg-primary text-white py-2">
                        <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Beneficiario</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <select wire:model="persona_id" class="form-select" id="persona_id">
                                <option value="">Seleccione el beneficiario</option>
                                @foreach($personas as $persona)
                                <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }} - {{ $persona->cedula }}</option>
                                @endforeach
                            </select>
                            <label for="persona_id">Beneficiario</label>
                            @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                    <!-- Sección de tipo de beneficio -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Tipo de Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select wire:model="tipos_beneficio_id" class="form-select" id="tipos_beneficio_id">
                                    <option value="">Seleccione un tipo de beneficio</option>
                                    @foreach($tiposBeneficios as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                <label for="tipos_beneficio_id">Tipo de Beneficio</label>
                                @error('tipos_beneficio_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección de detalles -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Detalles del Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 100px"></textarea>
                                <label for="descripcion">Descripción/Observaciones</label>
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

            <!-- Sección del beneficiario -->
           <div class="card mb-4 border-primary">
                    <div class="card-header bg-primary text-white py-2">
                        <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Beneficiario</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <select wire:model="persona_id" class="form-select" id="persona_id">
                                <option value="">Seleccione el beneficiario</option>
                                @foreach($personas as $persona)
                                <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }} - {{ $persona->cedula }}</option>
                                @endforeach
                            </select>
                            <label for="persona_id">Beneficiario</label>
                            @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                    <!-- Sección de tipo de beneficio -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Tipo de Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select wire:model="tipos_beneficio_id" class="form-select" id="tipos_beneficio_id">
                                    <option value="">Seleccione un tipo de beneficio</option>
                                    @foreach($tiposBeneficios as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                <label for="tipos_beneficio_id">Tipo de Beneficio</label>
                                @error('tipos_beneficio_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección de detalles -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Detalles del Beneficio</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 100px"></textarea>
                                <label for="descripcion">Descripción/Observaciones</label>
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