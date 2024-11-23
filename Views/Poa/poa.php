<?php headerAdmin($data);
sideBar();
$fecha = new DateTime();
?>
<div class="main">
    <div class="header-wrap">
        <div class="header-title">
            
            <h2>Plan Operativo Anual <?php echo $fecha->format('Y'); ?></h2>

<span>POA </span>

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
        <div class="card-container" >
        <h3 class="main-title">Progreso Actual</h3>
        <div class="card-wrap">
        <div class="card-one light-blue pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Servicios realizados
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Meta: 100
                </span>
            </div>
            <div class="card-one light-pink pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Cursos dictados
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Meta: 100
                </span>
            </div>
            <div class="card-one light-green pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Proyectos finalizados
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Meta: 100
                </span>
            </div>
            <div class="card-one light-purple pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Servicios realizados
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Meta: 100
                </span>
            </div>
            <div class="card-one light-blue pointer">
                <div class="card-header">
                    <div class="card-inf">
                        <span class="title">
                            Servicios realizados
                        </span>
                        <span class="card-inf-value">
                            5
                        </span>
                    </div>
                </div>
                <span class="card-detail">
                    Meta: 100
                </span>
            </div>
        </div>

    </div>
    <div class="card-container" style="display:flex; flex-wrap:wrap;">
    <h3 class="main-title">POA <?php echo $fecha->format('Y'); ?></h3>
    <table id="proyecto" class="tabla-estilizada" style="width:100%;">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Costo Unitario</th>
                        <th>Total (Sin IVA)</th>
                        <th>IVA 16%</th>
                        <th>Total con IVA</th>
                    </tr>
                </thead>
            </table>
    </div>
    <div class="card-container" style="display:flex; flex-wrap:wrap;">
        <h3 class="main-title" style="width:100%;">Metas Trazadas</h3>
        <table id="proyecto" class="tabla-estilizada" style="width:100%;">
                <thead>
                    <tr>
                        <th>Objetivo</th>
                        <th>Meta</th>
                        <th>Nro.</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div>
    </div>
</div>
<?= getModal('modal_poa') ?>


<?php footerAdmin($data) ?>