<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no está iniciada
}

// Verifica si el usuario está logueado
if (!isset($_SESSION['rol'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}


// Define las rutas permitidas según el rol
$currentFile = basename($_SERVER['PHP_SELF']); // Obtiene el nombre del archivo actual
$rol = $_SESSION['rol'];

$permisos = [
    'administrador' => ['registroadmin.php'], // Archivos permitidos para administrador
    'supervisor' => ['registrosuperv.php'], // Archivos permitidos para supervisor
];

// Verifica si el archivo actual está permitido para el rol del usuario
if (!in_array($currentFile, $permisos[$rol])) {
    header("Location: ../desautorizado.html");
    exit();
}