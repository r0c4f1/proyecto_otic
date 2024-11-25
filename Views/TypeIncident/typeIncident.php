<?php headerAdmin($data);
sideBar(); ?>

<main class="main">
<div class="header-wrap">
        <div class="header-title">
            <h2>Tipos de incidente</h2>
        </div>
        <div class="user-info">

            <div class="input-box">
                <input type="text" class="input-field" placeholder="Búsqueda" />
                <i><img src="<?= media() ?>/icon/buscar.png" alt="búsqueda"></i>
            </div>
            <div class="username">
                <h5><?= $_SESSION['nameUser'] ?></h5>
            </div>
        </div>
    </div>
    <section class="card-container">
        <article class="d-flex justify-content-between">
            <button class="btn btn-primary" onclick="modalAddTypeIncident()">Agregar Nuevo</button>
        </article>
        <hr>
        <table id="type" class="tabla-estilizada" style="width:100%;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Opc</th>
                </tr>
            </thead>
        </table>
    </section>

</main>

<?= getModal('modal_type_incident') ?>

<?php footerAdmin($data) ?>