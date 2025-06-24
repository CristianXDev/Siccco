<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registrar Datos Censales
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
                                        <select wire:model="nivel_educativo" class="form-select" id="nivel_educativo" required>
                                            <option value="">Seleccione nivel educativo</option>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Universitario">Universitario</option>
                                        </select>
                                        <label for="nivel_educativo">Nivel Educativo</label>
                                        @error('nivel_educativo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="ocupacion" type="text" class="form-control" id="ocupacion" placeholder=" " required>
                                        <label for="ocupacion">Ocupación</label>
                                        @error('ocupacion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="vive_desde" type="date" class="form-control" id="vive_desde" placeholder=" " required>
                                        <label for="vive_desde">Vive Desde</label>
                                        @error('vive_desde') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de salud -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Información de Salud</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="discapacidad" class="form-select" id="discapacidad" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="discapacidad">¿Tiene discapacidad?</label>
                                        @error('discapacidad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="tipo_discapacidad" type="text" class="form-control" id="tipo_discapacidad" placeholder=" ">
                                        <label for="tipo_discapacidad">Tipo de Discapacidad</label>
                                        @error('tipo_discapacidad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="seguro_medico" class="form-select" id="seguro_medico" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="seguro_medico">¿Tiene seguro médico?</label>
                                        @error('seguro_medico') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="nombre_seguro" type="text" class="form-control" id="nombre_seguro" placeholder=" ">
                                        <label for="nombre_seguro">Nombre del Seguro</label>
                                        @error('nombre_seguro') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="updateModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>Actualizar Datos Censales
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
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
                                        <select wire:model="nivel_educativo" class="form-select" id="nivel_educativo" required>
                                            <option value="">Seleccione nivel educativo</option>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Universitario">Universitario</option>
                                        </select>
                                        <label for="nivel_educativo">Nivel Educativo</label>
                                        @error('nivel_educativo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="ocupacion" type="text" class="form-control" id="ocupacion" placeholder=" " required>
                                        <label for="ocupacion">Ocupación</label>
                                        @error('ocupacion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="vive_desde" type="date" class="form-control" id="vive_desde" placeholder=" " required>
                                        <label for="vive_desde">Vive Desde</label>
                                        @error('vive_desde') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de salud -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Información de Salud</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="discapacidad" class="form-select" id="discapacidad" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="discapacidad">¿Tiene discapacidad?</label>
                                        @error('discapacidad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="tipo_discapacidad" type="text" class="form-control" id="tipo_discapacidad" placeholder=" ">
                                        <label for="tipo_discapacidad">Tipo de Discapacidad</label>
                                        @error('tipo_discapacidad') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="seguro_medico" class="form-select" id="seguro_medico" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="seguro_medico">¿Tiene seguro médico?</label>
                                        @error('seguro_medico') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="nombre_seguro" type="text" class="form-control" id="nombre_seguro" placeholder=" ">
                                        <label for="nombre_seguro">Nombre del Seguro</label>
                                        @error('nombre_seguro') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Actualizar Datos
                </button>
            </div>
        </div>
    </div>
</div>