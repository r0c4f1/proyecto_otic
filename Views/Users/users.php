<?php headerAdmin($data);
sideBar(); ?>
<style>
.tabla-estilizada {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

.tabla-estilizada th,
.tabla-estilizada td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: start;
}

.tabla-estilizada th {
    background-color: #72975e;
    color: white;
}

.tabla-estilizada tr:nth-child(even) {
    background-color: #f2f2f2;
}

.tabla-estilizada tr:hover {
    background-color: #ddd;
}

.admin {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: auto;
    background-color: #72975e;
}

.no-admin {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: auto;
    background-color: #975e5e;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>

<main class="main">
    <div class="card-container">
        <div class="text-end">
            <button class="btn btn-primary" onclick="modalAddUserModal()">Agregar Usuario</button>
        </div>
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
                    <th>Admin</th>
                    <th>Opc</th>
                </tr>
            </thead>
        </table>
    </div>

</main>

<?= getModal('modal_users') ?>

<?php footerAdmin($data) ?>