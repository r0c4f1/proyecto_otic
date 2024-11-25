<?php headerAdmin($data);
sideBar();
?>

<main class="main">
    <section class="card-container">
        <div class="row d-flex justify-content-center mt-5 mb-5">
            <section class="col-5">
                <header class="d-flex justify-content-between align-items-center">
                    <h3>Equipos De Trabajo</h3>
                    <button class="btn btn-success" onclick="modalAddTeams()">Agregar Equipo</button>
                </header>
                <hr>
                <table id="equipodetrabajo" class="tabla-estilizada" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Equipos</th>
                            <th>Opc</th>
                        </tr>
                    </thead>
                </table>
            </section>
            <section class="col-6">
                <div>
                    <h3 id="temaInscritos"></h3>
                    <hr>
                    <select name="" id="selectTeams" class="form-control">
                        <option value="0">---</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <input type='text' class='mt-4 form-control w-50' placeholder='Buscar'
                        onkeyup='filtroListaInscritos(event)' id='buscador' disabled>
                    <button class="btn btn-success mt-4" onclick="modalAddUserTeams()" disabled
                        id="btnAddToTeams">Agregar Usuario a Equipo</button>
                </div>
                <article class="mt-2 inscritos row flex-wrap justify-content-start align-items-start" id="listaTeamss"
                    style="height: 450px; overflow-y: scroll;">
                </article>

            </section>
        </div>

    </section>
</main>

<?= getModal('modal_teams') ?>

<?php footerAdmin($data) ?>