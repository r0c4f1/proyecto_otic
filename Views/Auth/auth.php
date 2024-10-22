<?php headerAdmin($data) ?>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <img src="<?= media() ?>/images/1630588198601.png" alt="logo" />
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="#" class="link">Servicios</a></li>

                <li><a href="#miModal" class="link">Acerca</a>

                    <div id="miModal" class="modal">
                        <div class="modal-contenido">
                            <a href="#"><img src="<?= media() ?>/icon/close.png" alt="cerrar"></a>
                            <p>iconos creados por<a href="https://www.flaticon.com/" title="icons" target="_blank">
                                    Flaticon</a> <br>
                                Imagen de rawpixel.com en <a
                                    href="https://www.freepik.es/foto-gratis/fondo-banner-computacion-nube-ciudad-inteligente_16016425.html"
                                    title="freepick" target="_blank"> Freepik</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Iniciar Sesión</button>
            <button class="btn" id="registerBtn" onclick="register()">Registrarse</button>
        </div>
        <div class="nav-menu-btn">
            <img src="<?= media() ?>/icon/menu.png" alt="" onclick="myMenuFunction()">
        </div>
    </nav>
    <!-------------Contenedor----------->
    <main class="container">
        <!-------------Formulario inicio sesion----------->
        <section class="login-container" id="login">
            <header class="top">
                <p>Iniciar Sesión</p>
            </header>
            <form action="" id="formLogin">
                <div class="input-box">
                    <input type="number" class="input-field" placeholder="Cedula" name="cedula" />
                    <i><img src="<?= media() ?>/icon/usuario.png" alt="nombre"></i>
                </div>

                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Clave" name="clave" />
                    <i><img src="<?= media() ?>/icon/llave.png" alt="llave"></i>
                </div>
                <div class="input-box">
                    <button type="submit" class="submit">Iniciar Sesión</button>
                </div>
                <div class="bottom">
                    <span>¿No tiene una cuenta? <a href="#" onclick="register()">Registrarse</a></span>
                </div>
            </form>
        </section>
        <!-------------Formulario registro----------->
        <section class="register-container" id="register">
            <header class="top">
                <p>Registrarse</p>
            </header>
            <form action="" id="formRegister">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nombre" name="nombre" />
                        <i><img src="<?= media() ?>/icon/nombre.png" alt="nombre"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Apellido" name="apellido" />
                        <i><img src="<?= media() ?>/icon/nombre.png" alt="llave"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Nombre de Usuario" name="nombreUsuario" />

                    <i><img src="<?= media() ?>/icon/usuario.png" alt="nombre"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Contraseña" name="clave" />
                    <i><img src="<?= media() ?>/icon/llave.png" alt="llave"></i>
                </div>
                <div class="input-box">
                    <button type="submit" class="submit">Registrarse</button>
                </div>
                <div class="bottom">
                    <span>¿Ya tiene una cuenta? <a href="#" onclick="login()">Iniciar Sesión</a></span>
                </div>
            </form>
        </section>
    </main>
</div>

<script>

</script>
<?php footerAdmin($data) ?>