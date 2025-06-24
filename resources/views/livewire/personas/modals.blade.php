<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registro de Persona
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <!-- Sección de información personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Datos Personales</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="nombres" type="text" class="form-control" id="nombres" placeholder=" " required>
                                        <label for="nombres" class="form-label">Nombres Completos</label>
                                        @error('nombres') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder=" " required>
                                        <label for="apellidos" class="form-label">Apellidos Completos</label>
                                        @error('apellidos') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="cedula" type="number" class="form-control" id="cedula" placeholder=" " required>
                                        <label for="cedula" class="form-label">Número de Cédula</label>
                                        @error('cedula') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select wire:model="sexo" class="form-select" id="sexo" required>
                                            <option value="">Seleccione...</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <label for="sexo" class="form-label">Sexo</label>
                                        @error('sexo') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder=" " required>
                                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        @error('fecha_nacimiento') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="estado_civil" class="form-select" id="estado_civil" required>
                                            <option value="">Seleccione...</option>
                                            <option value="Soltero">Soltero/a</option>
                                            <option value="Casado">Casado/a</option>
                                            <option value="Divorciado">Divorciado/a</option>
                                            <option value="Viudo">Viudo/a</option>
                                        </select>
                                        <label for="estado_civil" class="form-label">Estado Civil</label>
                                        @error('estado_civil') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="carga_familiar" type="number" class="form-control" id="carga_familiar" placeholder=" " min="0" required>
                                        <label for="carga_familiar" class="form-label">Carga Familiar</label>
                                        @error('carga_familiar') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de contacto -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-telephone-fill me-2"></i>Datos de Contacto</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <div class="form-floating mb-3">
                                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder=" " required>
                                        <label for="direccion" class="form-label">Dirección Completa</label>
                                        @error('direccion') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="telefono" type="number" class="form-control" id="telefono" placeholder=" " required>
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        @error('telefono') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder=" " required>
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        @error('correo') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de información socioeconómica -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-cash-stack me-2"></i>Información Socioeconómica</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="ingresos" type="number" class="form-control" id="ingresos" placeholder=" " min="0" step="0.01" required>
                                        <label for="ingresos" class="form-label">Ingresos Mensuales ($)</label>
                                        @error('ingresos') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="tiene_carnet" class="form-select" id="tiene_carnet" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="tiene_carnet" class="form-label">¿Tiene Carnet de la Patria?</label>
                                        @error('tiene_carnet') <span class="error text-danger small">{{ $message }}</span> @enderror
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
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-file-earmark-text me-2"></i>Registro de Persona
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" wire:model="selected_id">

                    <!-- Sección de información personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Datos Personales</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="nombres" type="text" class="form-control" id="nombres" placeholder=" " required>
                                        <label for="nombres" class="form-label">Nombres Completos</label>
                                        @error('nombres') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder=" " required>
                                        <label for="apellidos" class="form-label">Apellidos Completos</label>
                                        @error('apellidos') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="cedula" type="number" class="form-control" id="cedula" placeholder=" " required>
                                        <label for="cedula" class="form-label">Número de Cédula</label>
                                        @error('cedula') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select wire:model="sexo" class="form-select" id="sexo" required>
                                            <option value="">Seleccione...</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <label for="sexo" class="form-label">Sexo</label>
                                        @error('sexo') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder=" " required>
                                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        @error('fecha_nacimiento') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="estado_civil" class="form-select" id="estado_civil" required>
                                            <option value="">Seleccione...</option>
                                            <option value="Soltero">Soltero/a</option>
                                            <option value="Casado">Casado/a</option>
                                            <option value="Divorciado">Divorciado/a</option>
                                            <option value="Viudo">Viudo/a</option>
                                        </select>
                                        <label for="estado_civil" class="form-label">Estado Civil</label>
                                        @error('estado_civil') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="carga_familiar" type="number" class="form-control" id="carga_familiar" placeholder=" " min="0" required>
                                        <label for="carga_familiar" class="form-label">Carga Familiar</label>
                                        @error('carga_familiar') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de contacto -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-telephone-fill me-2"></i>Datos de Contacto</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <div class="form-floating mb-3">
                                        <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder=" " required>
                                        <label for="direccion" class="form-label">Dirección Completa</label>
                                        @error('direccion') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input wire:model="telefono" type="number" class="form-control" id="telefono" placeholder=" " required>
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        @error('telefono') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder=" " required>
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        @error('correo') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de información socioeconómica -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-cash-stack me-2"></i>Información Socioeconómica</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input wire:model="ingresos" type="number" class="form-control" id="ingresos" placeholder=" " min="0" step="0.01" required>
                                        <label for="ingresos" class="form-label">Ingresos Mensuales ($)</label>
                                        @error('ingresos') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="tiene_carnet" class="form-select" id="tiene_carnet" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label for="tiene_carnet" class="form-label">¿Tiene Carnet de la Patria?</label>
                                        @error('tiene_carnet') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de registro -->
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Datos de Registro</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <select wire:model="estado" class="form-select" id="estado" required>
                                            <option value="">Seleccione...</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                        <label for="estado" class="form-label">Estado del Registro</label>
                                        @error('estado') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Pie de modal -->
            <div class="modal-footer bg-light">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>