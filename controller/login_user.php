<?php
require '../conexionBD/conexion.php';
session_start();
try {
    // Validar datos de entrada
    if (empty($_POST['correo']) || empty($_POST['passwd'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    $correo = $_POST['correo'];
    $pasword = $_POST['passwd'];

    // Crear conexión
    $conn = new ConexionBD();
    $pdo = $conn->conexionBD();

    // Verificar credenciales
    $query = "SELECT usuario, rol, contrasena FROM usuarios WHERE correo = :correo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pasword, $user['contrasena'])) {
            $_SESSION['rol'] = $user['rol']; // Almacena el rol en la sesión
            $nombreUsuario = $user['usuario']; // Extrae el nombre de usuario

            // Redirigir según el rol
            if ($user['rol'] === 'administrador') {
                header("Location: ../registroadmin.php");
            } elseif ($user['rol'] === 'supervisor') {
                header("Location: ../registrosuperv.php");
            } else {                     
                echo "<script>
                        alert('El usuario \"$nombreUsuario\" todavía no tiene un rol asignado, por favor vuelva a iniciar sesión más tarde.');
                        window.location.href = '../iniciar_sesion.php';
                    </script>";
            }
            exit();
        }
        else {
        header("Location: ../iniciar_sesion.php?contraseña=incorrecta");
        exit();
        }
    }
     else {
        header("Location: ../iniciar_sesion.php?contraseña=incorrecta");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>