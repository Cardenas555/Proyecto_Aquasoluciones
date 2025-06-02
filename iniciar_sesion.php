<?php

session_start();

// Verifica si hay una sesión activa
if (isset($_SESSION['rol'])) {
    // Redirige según el rol del usuario
    if ($_SESSION['rol'] === 'administrador') {
        header("Location: registroadmin.php");
        exit();
    } elseif ($_SESSION['rol'] === 'supervisor') {
        header("Location: registrosuperv.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html id="ht" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaSoluciones</title>
    <script defer src="assets/js/scripts.js"></script>
    <link rel="stylesheet" href="assets/css/inicio_sesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>
    <main data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="contenedor_todo">
            <!-- Contenedores de información de inicio de sesión y registro -->
            <div id="trasera" class="caja_trasera">
                <div id="caja_trasera_login" class="caja_trasera_login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para acceder a tu cuenta</p>
                    <button id="btn_login">Iniciar sesión</button>
                </div>
                <div id="caja_trasera_register" class="caja_trasera_register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para acceder a todas las funcionalidades</p>
                    <button id="btn_register">Registrarse</button>
                </div>
            </div>
            <!-- Formularios de login y registro -->
            <div id="contenedor_login_register" class="contenedor_login_register">
                <!-- Mensaje dinámico -->
                <div id="mensaje_registro" class="mensaje_registro">
                    ¡Registro exitoso! Ahora puedes iniciar sesión.
                </div>
                <div id="mensaje-x" class="mensaje-xx">
                    Credenciales incorrectas, vuelve a intentarlo.
                </div>
                <div id="mensaje_sesion" class="mensaje-sesion">
                    Sesión cerrada exitosamente.
                </div>
                <form action="controller/login_user.php" id="form_login" class="formulario_login" method="POST">
                    <h2>Iniciar sesión</h2>
                    <input type="email" placeholder="Correo Electrónico" name="correo" required>
                    <input type="password" placeholder="Contraseña" name="passwd" required>
                    <button type="submit">Ingresar</button>
                    <p><a href="#" id="passwd">¿Olvidaste tu contraseña?</a></p>
                </form>

                <form action="controller/register_user.php" id="form_register" class="formulario_register" method="POST">
                    <h2>Regístrate</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre" required>
                    <input type="email" placeholder="Correo electrónico" name="correoe" id="correo_registro" required>
                    <div id="mensaje-correo" class="mensaje-error" style="display:none;">Este correo ya está en uso.</div>
                    <input type="text" placeholder="Usuario" name="usuario" required>
                    <input type="password" placeholder="Contraseña" name="pasword" required>
                    <button type="submit">Registrarse</button>
                </form>
                <form id="form_correo" class="formulario_correo" action="controller/recuperar_password.php" method="POST">
                    <h2>Recupera tu contraseña</h2>
                    <p>Introduce tu correo electrónico para recibir un enlace de recuperación</p>
                    <input type="email" placeholder="Correo electrónico" name="correo" required>
                    <button id="go" type="submit">Confirmar</button>
                    <button id="go-back" type="button">Volver atrás</button>                  
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();

        // Mostrar mensaje de registro exitoso si el parámetro está presente en la URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('registro') === 'exitoso') {
            document.getElementById('mensaje_registro').style.display = 'block';
        }
        if (urlParams.get('contraseña') === 'incorrecta') {
            document.getElementById('mensaje-x').style.display = 'block';   
        }
        if (urlParams.get('cerrar') === 'ok') {
            document.getElementById('mensaje_sesion').style.display = 'block';   
        }

        function registrarUsuario() {
            // Seleccionamos el mensaje
            const mensaje = document.getElementById("mensaje-x");
            const mensajeRegistro = document.getElementById("mensaje_registro");
            const mensajeSesion = document.getElementById("mensaje_sesion");

            // Verificamos si el mensaje existe y lo eliminamos
            if (mensaje) {
                mensaje.style.display="none"// Elimina el elemento del DOM
            }
            if (mensajeRegistro) {
                mensajeRegistro.style.display="none"// Elimina el elemento del DOM
            }
            if (mensajeSesion) {
                mensajeSesion.style.display="none"// Elimina el elemento del DOM
            }

        }

        document.getElementById('correo_registro').addEventListener('blur', function() {
            const correo = this.value;
            const mensaje = document.getElementById('mensaje-correo');
            const input = this;

            if (correo.length > 0) {
                fetch('controller/validar_correo.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'correo=' + encodeURIComponent(correo)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.existe) {
                        mensaje.style.display = 'block';
                        input.classList.add('input-error');
                    } else {
                        mensaje.style.display = 'none';
                        input.classList.remove('input-error');
                    }
                });
            } else {
                mensaje.style.display = 'none';
                input.classList.remove('input-error');
            }
        });

        const correoInput = document.getElementById('correo_registro');
        const mensaje = document.getElementById('mensaje-correo');
        const botonRegistro = document.querySelector('#form_register button[type="submit"]');

        correoInput.addEventListener('blur', function() {
            const correo = this.value;
            if (correo.length > 0) {
                fetch('controller/validar_correo.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'correo=' + encodeURIComponent(correo)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.existe) {
                        mensaje.style.display = 'block';
                        correoInput.classList.add('input-error');
                        botonRegistro.disabled = true;
                    } else {
                        mensaje.style.display = 'none';
                        correoInput.classList.remove('input-error');
                        botonRegistro.disabled = false;
                    }
                });
            } else {
                mensaje.style.display = 'none';
                correoInput.classList.remove('input-error');
                botonRegistro.disabled = false;
            }
        });
    
        // Agregamos el evento al botón
        document.getElementById("btn_register").addEventListener("click", registrarUsuario);
    </script>
</body>
</html>