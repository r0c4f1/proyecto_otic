<div class="modal fade" id="addIncidentAssignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddIncidentAssignment">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_equipo">
                    <div class="row p-3">
                        <label class="col-12 mb-3">
                            Fecha Asignación
                            <input type="date" name="fecha_asignacion" class="form-control" required>
                        </label>

                        <label class="col-12 mb-3">
                            Estado
                            <select id="estado" name="estado" class="form-select" required>
                                <option value="">---</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Progreso">En Progreso</option>
                                <option value="Finalizado">Finalizado</option>
                            </select></label>
                        </label>

                        <label class="col-12 mb-3">
                            Recurso
                            <select id="recurso" name="idRecurso" class="form-select" required>
                                <option value="">---</option>
                            </select></label>
                        </label>

                        <label class="col-12">
                            Cantidad Del Recurso
                            <input type="number" name="cantRecurso" id="cantRecurso" class="form-control" disabled
                                required>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseAddIncidentAssignment"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" disabled
                        id="btnGuardarIncidentAssignment">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addIncident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAddIncident">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Incidencia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Descripción
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" style="height: 100px"></textarea>
                            </div>
                        </label>


                        <label class="col-6">
                            Fecha de Inicio
                            <input type="date" name="fecha_reporte" class="form-control">
                        </label>
                        <label class="col-6 mb-4">
                            Fecha Solución
                            <input type="date" name="fecha_solucion" class="form-control">
                        </label>
                        <label for="estado" class="col-12 mb-4">Tipo De Incidencia:
                            <select class="form-select" id="tipoIncident" name="id_tipo">
                                <option value="0">---</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseAddIncident"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editIncident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditIncident">
                <input type="hidden" name="id_incidencia">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Incidencia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-4">
                            Descripción
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" style="height: 100px"></textarea>
                            </div>
                        </label>


                        <label class="col-6">
                            Fecha de Inicio
                            <input type="date" name="fecha_reporte" class="form-control">
                        </label>
                        <label class="col-6 mb-4">
                            Fecha Solución
                            <input type="date" name="fecha_solucion" class="form-control">
                        </label>
                        <label for="estado" class="col-12 mb-4">Tipo De Incidencia:
                            <select class="form-select" id="tipoIncidentEdit" name="id_tipo">
                                <option value="0">---</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseEditIncident"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAsignados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAsignados">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información de la asignación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <label class="col-12 mb-2">
                            Incidencia
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" disabled></textarea>
                            </div>
                        </label>
                        <label class="col-6">
                            Fecha de asignación
                            <input type="date" class="form-control" disabled>
                        </label>
                        <label class="col-6 mb-2">
                            Estado
                            <input type="text" class="form-control" disabled>
                        </label>
                        <label class="col-12 mb-2">
                            Nombre del equipo
                            <input type="text" class="form-control" disabled>
                        </label>
                        <label class="col-12 mb-2">
                            Nombre del recurso
                            <input type="text" class="form-control" disabled>
                        </label>
                        <label class="col-12 mb-2">
                            Cantidad del recurso usado en la incidencia
                            <input type="text" class="form-control" disabled>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseEditIncident"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Finalizar asignación</button>
                </div>
            </form>
        </div>
    </div>
</div>