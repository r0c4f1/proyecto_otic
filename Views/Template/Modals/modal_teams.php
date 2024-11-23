<!-- modal ingresar a equipo -->

<div class="modal fade" id="addUserTeams" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formRegisterUserTeams">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <label class="w-100">
                        Cedula
                        <input type="number" name="id_usuario" class="form-control" placeholder="Cedula">
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalAddUserTeams"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal agregar equipo de trabajo -->

<div class="modal fade" id="addTeams" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddTeams">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Nombre Equipo
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre equipo">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalAddTeams"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal editar equipos de trabajo-->

<div class="modal fade" id="modalEditTeams" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditTeams">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <input type="hidden" name="id_equipoDeTrabajo">
                        <label class="col-12 mb-4">
                            Nombre Equipo
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Equipo">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalEditTeams"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>