<!-- modal agregar proyecto -->

<div class="modal fade" id="addTypeIncident" tabindex="-1" aria-labelledby="addTypeIncident" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddTypeIncident" onsubmit="addTypeIncident(event)">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Proyecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Categoria
                            <input type="text" name="categoria" class="form-control" placeholder="Categoria">
                        </label>

                        <label class="col-6">
                            Nombre
                            <input type="text" name="nombre_tipo" class="form-control" placeholder="Nombre">
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCloseAddProjectmodal"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal editar tipo incidencia-->

<div class="modal fade" id="modalEditTypeIncident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditTypeIncident">
                <input type="hidden" id="id_type" name="id_tipo">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col d-flex justify-content-between mb-4">
                            Categoria
                            <select name="categoria" id="selectCategory" class="border w-50">
                                <option value="software">Software</option>
                                <option value="hardware">Hardware</option>
                                <option value="otro">Otro</option>
                            </select>
                        </label>
                        <label class="col-6">
                            Nombre
                            <input id="nombre_tipo" type="text" name="nombre_tipo" class="form-control"
                                placeholder="Descripción">
                        </label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseEditProjectmodal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success"
                        onclick="updateTypeIncident(event)">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>