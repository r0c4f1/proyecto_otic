<!-- modal editar  -->

<div class="modal  fade" id="resourceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditResource">
                    <input type="hidden" name="id_recurso">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Nombre del Recurso
                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Título">
                        </label>

                        <label class="col-6">
                            Tipo
                            <input id="tipo" type="text" name="tipo" class="form-control"
                                placeholder="Descripción">
                        </label>

                        <label class="col-6">
                            Cantidad
                            <input id="cantidad" type="text" name="cantidad" class="form-control">
                        </label>
                        <div class="form-check form-switch" class="col-6">
                            <input class="form-check-input" type="checkbox" role="switch" id="isAvailable">
                            <label class="form-check-label" for="isAvailable">Disponible</label>
                        </div>
                        <!-- <label class="col-12 mb-4">
                            Disponible
                            <input id="disponible" type="date" name="disponible" class="form-control">
                        </label> -->
                                             
                    </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="btnCloseEditResourceModal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="updateResource(event)">Actualizar</button>
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- modal agregar  -->

<div class="modal  fade" id="addResourceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddResource" onsubmit="addResource(event)">
                <header class="modal-header d-flex justify-content-between align-items-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar</h1>
                    <section class="d-flex justify-content-between w-25">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </section>
                </header>
                <section class="modal-body">
                <div class="row p-3">
                        <label class="col-12 mb-4">
                            Nombre del Recurso
                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre del Recurso">
                        </label>

                        <label class="col-6">
                            Tipo
                            <input id="tipo" type="text" name="tipo" class="form-control"
                                placeholder="Tipo">
                        </label>

                        <label class="col-6">
                            Cantidad
                            <input id="cantidad" type="text" name="cantidad" class="form-control" placeholder="Cantidad">
                        </label>
                        <div class="form-check form-switch" class="col-6">
                            <input class="form-check-input" type="checkbox" role="switch" id="isAvailable">
                            <label class="form-check-label" for="isAvailable">Disponible</label>
                        </div>
                        <!-- <label class="col-12 mb-4">
                            Disponible
                            <input id="disponible" type="date" name="disponible" class="form-control">
                        </label> -->
                                             
                    </div>
                </section>
                <div class="modal-footer">
                    <button type="button" id="btnCloseAddResourceModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnAddResourceSubmit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>