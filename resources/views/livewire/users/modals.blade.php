<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-secondary">
            <!-- Encabezado estilo expediente -->
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold" id="createDataModalLabel">
                    <i class="bi bi-person-plus me-2"></i>Registrar Nuevo Usuario
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form wire:submit.prevent="store">
                    <!-- Sección de información personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-person-badge me-2"></i>Datos Personales</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                        <label for="nombre">Nombre</label>
                                        @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder=" ">
                                        <label for="apellido">Apellido</label>
                                        @error('apellido') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="cedula" type="text" class="form-control" id="cedula" placeholder=" ">
                                <label for="cedula">Cédula</label>
                                @error('cedula') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de credenciales -->
                    <div class="card mb-4 border-success">
                        <div class="card-header bg-success text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Credenciales de Acceso</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="correo" type="email" class="form-control" id="correo" placeholder=" ">
                                <label for="correo">Correo Electrónico</label>
                                @error('correo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="password" type="password" class="form-control" id="password" placeholder=" ">
                                <label for="password">Contraseña</label>
                                @error('password') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select wire:model="rol" class="form-select" id="rol">
                                    <option value="">Seleccione un rol</option>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuario</option>
                                    <!-- Agrega más opciones según tus roles -->
                                </select>
                                <label for="rol">Rol</label>
                                @error('rol') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-person-gear me-2"></i>Editar Usuario
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    
                    <!-- Sección de información personal -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-person-badge me-2"></i>Datos Personales</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder=" ">
                                        <label for="nombre">Nombre</label>
                                        @error('nombre') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder=" ">
                                        <label for="apellido">Apellido</label>
                                        @error('apellido') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="cedula" type="text" class="form-control" id="cedula" placeholder=" ">
                                <label for="cedula">Cédula</label>
                                @error('cedula') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de credenciales -->
                    <div class="card mb-4 border-success">
                        <div class="card-header bg-success text-white py-2">
                            <h6 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Credenciales de Acceso</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-4">
                                <input wire:model="correo" type="email" class="form-control" id="correo" placeholder=" ">
                                <label for="correo">Correo Electrónico</label>
                                @error('correo') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input wire:model="password" type="password" class="form-control" id="password" placeholder=" ">
                                <label for="password">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                                @error('password') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="rol" class="form-select" id="rol">
                                            <option value="">Seleccione un rol</option>
                                            <option value="admin">Administrador</option>
                                            <option value="user">Usuario</option>
                                            <!-- Agrega más opciones según tus roles -->
                                        </select>
                                        <label for="rol">Rol</label>
                                        @error('rol') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select wire:model="estatus" class="form-select" id="estatus">
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        </select>
                                        <label for="estatus">Estatus</label>
                                        @error('estatus') <span class="error text-danger small d-block mt-1">{{ $message }}</span> @enderror
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
                    <i class="bi bi-save me-1"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>