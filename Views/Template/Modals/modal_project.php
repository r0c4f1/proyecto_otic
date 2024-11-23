<!-- modal agregar proyecto -->

<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddProject" onsubmit="addProject(event)">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Proyecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Título
                            <input type="text" name="nombre" class="form-control" placeholder="Título">
                        </label>

                        <label class="col-6">
                            Descripción
                            <input type="text" name="descripcion" class="form-control" placeholder="Descrición">
                        </label>

                        <label class="col-6">
                            Fecha de Inicio
                            <input type="date" name="fecha_inicio" class="form-control">
                        </label>
                        <label class="col-12 mb-4">
                            Fecha Final
                            <input type="date" name="fecha_fin" class="form-control">
                        </label>
                        <label for="estado" class="col-12 mb-4">Selecciona el estado:
                            <select id="estado" name="estado">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Progreso">En Progreso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select></label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseAddProjectmodal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal editar proyecto -->

<div class="modal fade" id="modalEditProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditProject">
                <input type="hidden" id="idProyecto" name="id_proyecto">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Título
                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Título">
                        </label>

                        <label class="col-6">
                            Descripción
                            <input id="descripcion" type="text" name="descripcion" class="form-control"
                                placeholder="Descripción">
                        </label>

                        <label class="col-6">
                            Fecha de Inicio
                            <input id="fecha_inicio" type="date" name="fecha_inicio" class="form-control">
                        </label>
                        <label class="col-12 mb-4">
                            Fecha Final
                            <input id="fecha_fin" type="date" name="fecha_fin" class="form-control">
                        </label>
                    <label for="estado" class="col-12 mb-4">Selecciona el estado:
                            <select id="selectEditState" name="estado">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Progreso">En Progreso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select></label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseEditProjectmodal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="updateProject(event)">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal papelera proyecto -->
<div class="modal fade" id="modalRecycleBinProject" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Papelera</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section class="col-11">
                    <table id="proyectoPapelera" class="tabla-estilizada" style="width:90%;">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Final</th>
                                <th>Estado</th>
                                <th>Opc</th>
                            </tr>
                        </thead>
                    </table>

                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnCloseRecycleBinProjectmodal"
                    data-bs-dismiss="modal">Cerrar</button>

            </div>

        </div>
    </div>
</div>