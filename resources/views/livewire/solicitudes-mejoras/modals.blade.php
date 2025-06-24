<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registrar Solicitud de Mejora
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                    <!-- Sección de información básica -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>Información Básica</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="tipos_solicitud_id" class="form-select" id="tipos_solicitud_id" required>
                                            <option value="">Seleccione tipo de solicitud</option>
                                            @foreach($tiposSolicitudes as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <label for="tipos_solicitud_id">Tipo de Solicitud</label>
                                        @error('tipos_solicitud_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="persona_id" class="form-select" id="persona_id" required>
                                            <option value="">Seleccione la persona</option>
                                            @foreach($personas as $persona)
                                            <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        <label for="persona_id">Solicitante</label>
                                        @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 100px" required></textarea>
                                        <label for="descripcion">Descripción</label>
                                        @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="observaciones" class="form-control" id="observaciones" placeholder=" " style="height: 80px"></textarea>
                                        <label for="observaciones">Observaciones</label>
                                        @error('observaciones') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="responsable_id" class="form-select" id="responsable_id">
                                            <option value="">Seleccione responsable</option>
                                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }} (Yo)</option>
                                        </select>
                                        <label for="responsable_id">Responsable</label>
                                        @error('responsable_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-save me-1"></i> Registrar Solicitud
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
                    <i class="bi bi-pencil-square me-2"></i>Actualizar Solicitud de Mejora
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" wire:model="selected_id">

                    <!-- Sección de información básica -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>Información Básica</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="tipos_solicitud_id" class="form-select" id="tipos_solicitud_id" required>
                                            <option value="">Seleccione tipo de solicitud</option>
                                            @foreach($tiposSolicitudes as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <label for="tipos_solicitud_id">Tipo de Solicitud</label>
                                        @error('tipos_solicitud_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="persona_id" class="form-select" id="persona_id" required>
                                            <option value="">Seleccione la persona</option>
                                            @foreach($personas as $persona)
                                            <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        <label for="persona_id">Solicitante</label>
                                        @error('persona_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="descripcion" class="form-control" id="descripcion" placeholder=" " style="height: 100px" required></textarea>
                                        <label for="descripcion">Descripción</label>
                                        @error('descripcion') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="observaciones" class="form-control" id="observaciones" placeholder=" " style="height: 80px"></textarea>
                                        <label for="observaciones">Observaciones</label>
                                        @error('observaciones') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de seguimiento -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Seguimiento</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="estado" class="form-select" id="estado">
                                            <option value="">Seleccione estado</option>
                                            <option value="En revision">En revision</option>
                                            <option value="Recibida">Recibida</option>
                                            <option value="Rechazada">Rechazada</option>
                                            <option value="Completada">Completada</option>
                                        </select>
                                        <label for="estado">Estado</label>
                                        @error('estado') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="responsable_id" class="form-select" id="responsable_id">
                                            <option value="">Seleccione responsable</option>
                                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }} (Yo)</option>
                                        </select>
                                        <label for="responsable_id">Responsable</label>
                                        @error('responsable_id') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea wire:model="comentarios_cierre" class="form-control" id="comentarios_cierre" placeholder=" " style="height: 80px"></textarea>
                                        <label for="comentarios_cierre">Comentarios de Cierre</label>
                                        @error('comentarios_cierre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-save me-1"></i> Actualizar Solicitud
                </button>
            </div>
        </div>
    </div>
</div>