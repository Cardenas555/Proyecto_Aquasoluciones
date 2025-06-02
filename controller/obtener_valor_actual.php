<?php
require '/var/www/html/conexionBD/conexion.php';

$conexionBD = new ConexionBD();
$dbconn = $conexionBD->conexionBD();

if (!$dbconn) {
    echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
    exit;
}

// MODO SELECT DINÁMICO
if (isset($_POST['modo_select']) && $_POST['modo_select']) {
    $tabla = $_POST['tabla_origen'] ?? '';
    $campo_mostrar = $_POST['campo_mostrar'] ?? 'id';
    $descripcion = isset($_POST['descripcion']) ? explode(',', $_POST['descripcion']) : [];

    if (!$tabla || !$campo_mostrar) {
        echo '<option value="">Datos insuficientes</option>';
        exit;
    }

    // Si es pagos, hacer JOIN para traer id_cliente y nombre
    if ($tabla === 'factura') {
        $sql = "SELECT factura.id_factura, factura.id_cliente, cliente.nombre_completo
                FROM factura
                INNER JOIN cliente ON factura.id_cliente = cliente.id";
        $stmt = $dbconn->prepare($sql);

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $value = $row['id_factura'];
                $label = $value . ' - ' . 'Cliente: ' . $row['id_cliente'] . ' - ' . $row['nombre_completo'];
                echo "<option value=\"$value\">$label</option>";
            }
        } else {
            echo '<option>Error al ejecutar la consulta</option>';
        }
        exit;
    }

    $sql = "SELECT * FROM $tabla";
    $stmt = $dbconn->prepare($sql);

    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $value = $row[$campo_mostrar];
            $label = $value;
            $nombreCompleto = [];

            
            foreach ($descripcion as $campo) {
                if (isset($row[$campo])) {
                    $nombreCompleto[] = $row[$campo];
                }
            }

            if (!empty($nombreCompleto)) {
                $label .= ' - ' . implode(' ', $nombreCompleto);
            }

            echo "<option value=\"$value\">$label</option>";
        }
    } else {
        echo '<option>Error al ejecutar la consulta</option>';
    }
    exit;
}

// CONSULTA NORMAL (mostrar valor actual)
$id = $_POST['id'] ?? null;
$campo = $_POST['campo'] ?? null;
$tabla = $_POST['tabla'] ?? null;
$columna_id = $_POST['columna_id'] ?? 'id';

if (!$tabla || $campo === 'selec' || !$id || $id === "selec" || !$campo || !$columna_id) {
    echo "Datos incompletos o inválidos.";
    exit;
}

$sql = "SELECT $campo FROM $tabla WHERE $columna_id = :id";
$stmt = $dbconn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute() && $stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo htmlspecialchars($row[$campo]);
} else {
    echo "No se encontró el registro.";
}
?>