<?php

require '/var/www/html/controller/auth.php';
?>
<!DOCTYPE html>
<html id="ht" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/disenore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="assets/js/dise.js"></script>
    <title>Registro de datos</title>
</head>
<body>
    <div class="Cargarpag">
        <div class="cargar"><img src="assets/imagenes/loading.gif" alt="#"/></div>
    </div>

    <header class="relative header2">
        <div class="cuadrologor flex justify-center">
            <div class="logor">
                <a href="index.html">
                    <img src="assets/imagenes/logo2.png" alt="Logo" class="h-12">
                </a>
            </div>
        </div>
        
        <!-- Ícono de cerrar sesión en el extremo derecho -->
        <div class="absolute top-1/2 right-6 transform -translate-y-1/2 mt-[-5.5px]">
            <a href="/controller/logout.php" class="text-blue-600 hover:text-red-800 text-2xl logout" title="Cerrar sesión">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </header>
    <div id="separador"></div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtén el formulario y el combobox
        var formulario = document.getElementById('miFormulario');
        var combobox = formulario.querySelector('#combobox');

        // Verifica si hay una opción seleccionada en sessionStorage
        var opcionSeleccionada = sessionStorage.getItem('opcionSeleccionada');
        if (opcionSeleccionada && combobox.querySelector(`option[value="${opcionSeleccionada}"]`)) {
            // Establece el valor del combobox y marca la opción como seleccionada
            combobox.value = opcionSeleccionada;
        } else {
            // Si no hay una opción válida en sessionStorage, selecciona la opción por defecto
            combobox.value = "0";
        }

        // Agrega un evento al formulario para almacenar la opción seleccionada en sessionStorage
        formulario.addEventListener('submit', function () {
            sessionStorage.setItem('opcionSeleccionada', combobox.value);
        });
    });
</script>

<form id="miFormulario" action="" method="post" class="text-center">
    <h2 id="opciones" class="text-lg font-bold mb-4">Elija una opción:</h2>
    <div class="mb-4">
        <select name="combobox" id="combobox" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="0" selected>Selecciona una...</option>
            <option value="1">Empleados</option>
            <option value="2">Clientes</option>
            <option value="9">Reportes del Servicio</option>
        </select>
        <br><br>
        <input type="submit" value="Consultar" name="consultar">
        <input type="submit" value="Listar" name="listar">
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
        AOS.init();
</script>