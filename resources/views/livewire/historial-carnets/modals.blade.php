<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registrar reporte de carnet
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                    <!-- Sección de información personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Información Personal</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="persona_id" class="form-select" id="persona_id" required>
                                            <option value="">Seleccione la persona</option>
                                            @foreach($personas as $persona)
                                            <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        <label for="persona_id">Persona</label>
                                        @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="codigo_carnet" class="form-select" id="codigo_carnet" required>
                                            <option value="">Seleccione un carnet</option>
                                            @foreach($carnets as $carnet)
                                            <option value="{{ $carnet->id }}">Numero carnet: #{{ $carnet->numero_carnet }}</option>
                                            @endforeach
                                        </select>
                                        <label for="codigo_carnet">Carnet</label>
                                        @error('codigo_carnet') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de salud -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Información  Del Reporte</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="nivel_educativo" class="form-select" id="nivel_educativo" required>
                                            <option value="">Seleccione el problema con el carnet</option>
                                            <option value="Renovacion">Renvación</option>
                                            <option value="Perdida">Perdida</option>
                                        </select>
                                        <label for="nivel_educativo">¿Qué problema tiene?</label>
                                        @error('nivel_educativo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                                        <label for="observaciones">Obervaciones</label>
                                        @error('observaciones') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
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
                    <i class="bi bi-save me-1"></i> Registrar Datos
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registrar reporte de carnet
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <input type="hidden" wire:model="selected_id">
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="update">

                  <input type="hidden" wire:model="selected_id">

                  <!-- Sección de información personal -->
                  <div class="card mb-4 border-primary">
                    <div class="card-header bg-primary text-white py-2">
                        <h6 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Información Personal</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="persona_id" class="form-select" id="persona_id" required>
                                        <option value="">Seleccione la persona</option>
                                        @foreach($personas as $persona)
                                        <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                                        @endforeach
                                    </select>
                                    <label for="persona_id">Persona</label>
                                    @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="codigo_carnet" class="form-select" id="codigo_carnet" required>
                                        <option value="">Seleccione un carnet</option>
                                        @foreach($carnets as $carnet)
                                        <option value="{{ $carnet->id }}">Numero carnet: #{{ $carnet->numero_carnet }}</option>
                                        @endforeach
                                    </select>
                                    <label for="codigo_carnet">Carnet</label>
                                    @error('codigo_carnet') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección de salud -->
                <div class="card mb-4 border-primary">
                    <div class="card-header bg-primary text-white py-2">
                        <h6 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Información  Del Reporte</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="nivel_educativo" class="form-select" id="nivel_educativo" required>
                                        <option value="">Seleccione el problema con el carnet</option>
                                        <option value="Renovacion">Renvación</option>
                                        <option value="Perdida">Perdida</option>
                                    </select>
                                    <label for="nivel_educativo">¿Qué problema tiene?</label>
                                    @error('nivel_educativo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <label for="observaciones">Obervaciones</label>
                                    @error('observaciones') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
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
            <button type="submit" wire:click.prevent="update()" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Actualizar Datos
            </button>
        </div>
    </div>
</div>
</div>