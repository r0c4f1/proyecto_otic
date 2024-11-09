<!-- modal inscribir a capacitacion -->

<div class="modal fade" id="addUserTraining" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formRegisterUserTraining">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Inscribirse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <label class="w-100">
                        Cedula
                        <input type="number" name="id_usuario" class="form-control" placeholder="Cedula">
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalDddUserTraining"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal agregar capacitacion -->

<div class="modal fade" id="addTraining" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddTraining">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Inscribirse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Tema
                            <input type="text" name="tema" class="form-control" placeholder="Tema">
                        </label>

                        <label class="col-6">
                            Fecha De Inicio
                            <input type="date" name="fecha" class="form-control">
                        </label>

                        <label class="col-6">
                            Duración (Horas)
                            <input type="number" name="duracion" class="form-control">
                        </label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalAddTraining"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal editar capacitacion -->

<div class="modal fade" id="modalEditTraining" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditTraining">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <input type="hidden" name="id_usuario">
                        <label class="col-12 mb-4">
                            Tema
                            <input type="text" name="tema" class="form-control" placeholder="Tema">
                        </label>

                        <label class="col-6">
                            Fecha De Inicio
                            <input type="date" name="fecha" class="form-control">
                        </label>

                        <label class="col-6">
                            Duración (Horas)
                            <input type="number" name="duracion" class="form-control">
                        </label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModalEditTraining"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>