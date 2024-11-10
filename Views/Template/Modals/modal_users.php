<!-- modal editar  -->

<div class="modal  fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditUsers">
                    <input type="hidden" name="id_usuario">
                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Nombre
                            <input type="text" name="nombre" class="border">
                        </label>
                        <label class="col d-flex justify-content-between mb-4">
                            Apellido
                            <input type="text" name="apellido" class="border">
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Correo
                            <input type="text" name="email" class="border">
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Telefono
                            <input type="text" name="telefono" class="border">
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Cargo
                            <input type="text" name="cargo" class="border">
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Nacimiento
                            <input type="date" name="fechaNac" class="border w-50">
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Unidad
                            <input type="number" name="unidad" class="border">
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Sexo
                            <select name="sexo" id="selectSexEdit" class="border w-50">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="btnCloseEditUsermodal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateUser(event)">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal agregar  -->

<div class="modal  fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formAddUsers" onsubmit="addUser(event)">
                <header class="modal-header d-flex justify-content-between align-items-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar</h1>
                    <section class="d-flex justify-content-between w-25">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="isAdmin">
                            <label class="form-check-label" for="isAdmin">Admin</label>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </section>
                </header>
                <section class="modal-body">
                    <div class="row">
                        <label class="col-6 d-flex justify-content-between align-items-center mb-4">
                            Cedula
                            <input type="number" name="cedula" class="border" onfocusout="verifyId(event)" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Nombre
                            <input type="text" name="nombre" class="border" required>
                        </label>
                        <label class="col d-flex justify-content-between mb-4">
                            Apellido
                            <input type="text" name="apellido" class="border" required>
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Correo
                            <input type="email" name="email" class="border" required>
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Telefono
                            <input type="number" name="telefono" class="border" required>
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Cargo
                            <input type="text" name="cargo" class="border" required>
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Nacimiento
                            <input type="date" name="fechaNac" class="border w-50" required>
                        </label>
                    </div>

                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Unidad
                            <input type="number" name="unidad" class="border" required>
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Sexo
                            <select name="sexo" id="" class="border w-50" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col d-flex justify-content-between mb-4">
                            Clave
                            <input type="password" name="clave" class="border" required>
                        </label>

                        <label class="col d-flex justify-content-between mb-4">
                            Repetir Clave
                            <input type="password" class="border" onkeyup="claveRepetida(event)">
                        </label>
                    </div>
                </section>
                <div class="modal-footer">
                    <button type="button" id="btnCloseAddUsermodal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnAddUserSubmit" class="btn btn-primary" disabled>Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>