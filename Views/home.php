<?php headerAdmin($data);
sideBar();
?>
<div class="main">
    <div class="header-wrap">
        <div class="header-title">
            <span>Inicio</span>
            <h2>Dashboard</h2>
        </div>
        <div class="user-info">

            <div class="username">
                <h5><?= $_SESSION['nameUser'] ?></h5>
            </div>
        </div>
    </div>
    <div class="card-container justify-content-between" style="display:flex; flex-wrap:wrap;">
        <h3 class="main-title" style="width:100%;">Información de Hoy</h3>
        <div class="card-wrap" style="width: 300px;">
            <canvas id="myChart"></canvas>
        </div>
        <div class="card-wrap" style="width: 400px;">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="card-wrap" style="width: 600px;">
            <canvas id="myChart3"></canvas>
        </div>
        <canvas id="miGrafico"></canvas>
        
    </div>
    <div class="card-container">
        <h3 class="main-title">Prioridad de Hoy</h3>
        <div class="card-wrap">
            <div class="card-one light-blue pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Casos:
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Lo que sea
                </span>
            </div>

            <div class="card-one light-green pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Proyectos:
                        </span>
                        <span class="card-inf-value">
                            1000
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Lo que sea
                </span>
            </div>
        </div>

    </div>
    <div class="card-container" style="display:flex; flex-wrap:wrap;">
        <h3 class="main-title" style="width:100%;">Estadísticas</h3>
        <div class="card-wrap" style="width: 300px;">
        </div>
    </div>

    <div>
    </div>
</div>
<?= getModal('modal_home') ?>


<?php footerAdmin($data) ?>