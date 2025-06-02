<?php
ob_start(); // Inicia el buffer de salida
require 'controller/auth.php';
include 'includes/formularioS.php';
include 'includes/logicS.php';
include 'includes/footerS.php';
ob_end_flush(); // Envía la salida al navegador
?>