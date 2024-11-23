<?php headerAdmin($data);
sideBar();
$fecha = new DateTime();
?>
<div class="main">
    <div class="header-wrap">
        <div class="header-title">

            <h2>Informes</h2>

            <span><?php echo $fecha->format('Y'); ?></span>

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
    <div class="card-container">
        <h3 class="main-title">Crear informe</h3>
        <div class="card-wrap">
            <div class="modal-content">
                <form id="formCreateInf">

                    <section class="modal-body">
                        <div class="row">
                            <label class="col-6 d-flex justify-content-between align-items-center mb-4">
                                Área
                                <select name="Select">
                                    <option value="value1">Value 1</option>
                                    <option value="value2" selected>Value 2</option>
                                    <option value="value3">Value 3</option>
                                </select>
                            </label>
                        </div>
                        <div class="row">
                            <label class="col d-flex justify-content-between mb-4">
                                Quien envia
                                <input type="text" name="redactado" class="border" required>
                            </label>
                            <label class="col d-flex justify-content-between mb-4">
                                Quien escribe
                                <input type="text" name="dirigido" class="border" required>
                            </label>
                        </div>

                        <div class="row">
                            <label class="col d-flex justify-content-between mb-4">
                                Correo
                                <input type="email" name="email" class="border" required>
                            </label>

                            <label class="col d-flex justify-content-between mb-4">
                                Telefono
                                <input type="number" name="telefono" class="border" required>
                            </label>
                        </div>

                        <div class="row">
                            <label class="col d-flex justify-content-between mb-4">
                                Cargo
                                <input type="text" name="cargo" class="border" required>
                            </label>

                            <label class="col d-flex justify-content-between mb-4">
                                Nacimiento
                                <input type="date" name="fechaNac" class="border w-50" required>
                            </label>
                        </div>

                        <div class="row">
                            <label class="col d-flex justify-content-between mb-4">
                                Unidad
                                <input type="number" name="unidad" class="border" required>
                            </label>

                            <label class="col d-flex justify-content-between mb-4">
                                Sexo
                                <select name="sexo" id="" class="border w-50" required>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </label>
                        </div>
                       
                    </section>
                    <div class="modal-footer">
                        
                        <button type="submit" id="btnCreateInf" class="btn btn-primary" disabled>Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-container" style="display:flex; flex-wrap:wrap;">
        <h3 class="main-title">POA <?php echo $fecha->format('Y'); ?></h3>
    </div>
    <div class="card-container" style="display:flex; flex-wrap:wrap;">
        <h3 class="main-title" style="width:100%;">Metas Trazadas</h3>
    </div>
</div>

<div>
</div>
</div>
<?= getModal('modal_poa') ?>


<?php footerAdmin($data) ?>