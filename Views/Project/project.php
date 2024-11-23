<?php headerAdmin($data);
sideBar();
?>
<main class="main">
<div class="header-wrap">
        <div class="header-title">
            
            <h2>Proyectos</h2>



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
    <div class="row d-flex justify-content-center mt-5 mb-5 ">
       
            <header class="d-flex justify-content-between align-items-center">
                <h3>Lista de Proyectos</h3>
                <div class="text-end">
                <button class="btn btn-primary"  onclick="modalAddProjectModal()">Agregar Proyecto</button>
               <button class="btn btn-danger" onclick="modalRecycleBinProject()">Papelera</button> 
               </div>
            </header>
            
            <hr>
            <section class="col-11">
            <table id="proyecto" class="tabla-estilizada" style="width:100%;">
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

</section>
</main>

<?= getModal('modal_project') ?>

<?php footerAdmin($data) ?>