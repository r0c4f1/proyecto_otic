<?php headerAdmin($data);
sideBar(); ?>

<main class="main">
<div class="header-wrap">
        <div class="header-title">
            
            <h2>Recursos</h2>

<span>Recursos OTIC </span>

        </div>
        <div class="user-info">

           
            <div class="username">
                <h5><?= $_SESSION['nameUser'] ?></h5>
            </div>
        </div>
    </div>
    <section class="card-container">
    
    <div class="row d-flex justify-content-center mt-5 mb-5 ">
    <header class="d-flex justify-content-between align-items-center">
                <h3>Lista de Recursos</h3>
                <div class="text-end">
                <button class="btn btn-primary" onclick="modalAddResourceModal()">Agregar Recurso</button>
               
               </div>
            </header>
                <hr>
              
                
               
            
        
        <table id="recursos" class="tabla-estilizada" style="width:100%;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Disponible</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
</div>
    </section>

</main>

<?= getModal('modal_resources') ?>

<?php footerAdmin($data) ?>