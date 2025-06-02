<?php
require '../conexionBD/conexion.php';

try {
    // Validar datos de entrada
    if (empty($_POST['nombre']) || empty($_POST['correoe']) || empty($_POST['pasword']) || empty($_POST['usuario'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    $nombre_usuario = $_POST['nombre'];
    $correo = $_POST['correoe'];
    $pasword = password_hash($_POST['pasword'], PASSWORD_DEFAULT);
    $usuario = $_POST['usuario'];

    // Crear conexión
    $conn = new ConexionBD();
    $pdo = $conn->conexionBD(); // Usar el método conexionBD() para obtener la conexión

    // Ejecutar consulta
    $query = "INSERT INTO usuarios (nombre_completo, correo, contrasena, usuario) 
          VALUES (:nombre, :correo, :contrasena, :usuario)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre_usuario);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $pasword);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    // Redirigir a la página de inicio de sesión con un mensaje de éxito
    header("Location: ../iniciar_sesion.php?registro=exitoso");
    exit();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>