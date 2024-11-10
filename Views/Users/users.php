<?php headerAdmin($data);
sideBar(); ?>

<main class="main">
    <section class="card-container">
        <article class="d-flex justify-content-between">
            <div>
                <label>
                    <h6>Usuario</h6>
                    <div class="user"></div>
                </label>
                <label>
                    <h6>Jefe</h6>
                    <div class="boss"></div>
                </label>
                <label>
                    <h6>Admin</h6>
                    <div class="admin"></div>
                </label>
            </div>
            <button class="btn btn-primary" onclick="modalAddUserModal()">Agregar Usuario</button>
        </article>
        <table id="usuarios" class="tabla-estilizada" style="width:100%;">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Telefono</th>
                    <th>Nacimiento</th>
                    <th>Unidad</th>
                    <th>Sexo</th>
                    <th>Nivel</th>
                    <th>Opc</th>
                </tr>
            </thead>
        </table>
    </section>

</main>

<?= getModal('modal_users') ?>

<?php footerAdmin($data) ?>