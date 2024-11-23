<?php headerAdmin($data);
sideBar();
$fecha = new DateTime();
?>
<main class="main">
<div class="header-wrap">
        <div class="header-title">
            
            <h2>Ajustes</h2>
<span><?php echo $fecha->format('d/m/Y'); ?></span>



        </div>
        <div class="user-info">

           
            <div class="username">
                <h5><?= $_SESSION['nameUser'] ?></h5>
            </div>
        </div>
    </div>
<section class="card-container">
     
    <h3 class="main-title">Progreso Actual</h3>      
        
    </div>

</section>
</main>

<?= getModal('modal_project') ?>

<?php footerAdmin($data) ?>