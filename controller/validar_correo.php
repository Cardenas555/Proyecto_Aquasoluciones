<?php
require '/var/www/html/conexionBD/conexion.php';

if (!isset($_POST['correo'])) {
    echo json_encode(['existe' => false]);
    exit;
}

$correo = $_POST['correo'];
$conn = new ConexionBD();
$pdo = $conn->conexionBD();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$existe = $stmt->fetchColumn() > 0;

echo json_encode(['existe' => $existe]);
?>