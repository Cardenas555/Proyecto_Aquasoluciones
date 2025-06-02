<?php
ob_start(); // Inicia el buffer de salida
require 'controller/auth.php';
include 'includes/formulario.php';
include 'includes/logic.php';
include 'includes/footer.php';
ob_end_flush(); // Envía la salida al navegador
?>