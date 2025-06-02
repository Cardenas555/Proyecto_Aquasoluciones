<?php

require '/var/www/html/conexionBD/conexion.php';
require '/var/www/html/controller/auth.php';

// Crear una instancia de la clase ConexionBD
$conexionBD = new ConexionBD();
$dbconn = $conexionBD->conexionBD();

if (!$dbconn) {
    echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
} else {
    switch ($opcion) {
        case 1:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT * FROM empleado;";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">Listado de Empleados</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">Cédula</th>';
                    echo '<th class="px-2 py-1">Nombre</th>';
                    echo '<th class="px-2 py-1">Apellido</th>';
                    echo '<th class="px-2 py-1">Celular</th>';
                    echo '<th class="px-2 py-1">Email</th>';
                    echo '<th class="px-2 py-1">Cargo</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['id'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['cedula'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['nombre'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['apellido'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['celular'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['email'] . '</td>';
                        echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['cargo'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 2:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT * FROM cliente;";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE CLIENTES</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">CÉDULA</th>';
                    echo '<th class="px-2 py-1">NOMBRE</th>';
                    echo '<th class="px-2 py-1">DIRECCIÓN</th>';
                    echo '<th class="px-2 py-1">CELULAR</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['cedula'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['nombre_completo'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['direccion'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['celular'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 3:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT contrato_empleado.*, empleado.nombre, empleado.apellido FROM contrato_empleado INNER JOIN empleado ON contrato_empleado.id_empleado = empleado.id";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE CONTRATOS EMPLEADO</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID EMPLEADO</th>';
                    echo '<th class="px-2 py-1">TIPO DE CONTRATO</th>';
                    echo '<th class="px-2 py-1">FECHA DE INICIO</th>';
                    echo '<th class="px-2 py-1">FECHA FINALIZA</th>';
                    echo '<th class="px-2 py-1">SUELDO</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_contrato'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_empleado'] . ' - ' . htmlspecialchars($row['nombre']) . ' ' . htmlspecialchars($row['apellido']) . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['tipo_contrato'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_inicio'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_fin'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . '$' . $row['sueldo'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 4:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT contrato_servicio.*, cliente.nombre_completo FROM contrato_servicio INNER JOIN cliente ON contrato_servicio.id_cliente = cliente.id";
                $stmt = $dbconn->prepare($sql);
                
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE CONTRATOS SERVICIO</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID CLIENTE</th>';
                    echo '<th class="px-2 py-1">FECHA DE INICIO</th>';
                    echo '<th class="px-2 py-1">FECHA FINALIZA</th>';
                    echo '<th class="px-2 py-1">TIPO DE SERVICIO</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_servicio'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_inicio'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_fin'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['tipo_servicio'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 5:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT medidor.*, cliente.nombre_completo FROM medidor INNER JOIN cliente ON medidor.id_cliente = cliente.id";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE MEDIDORES</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID CLIENTE</th>';
                    echo '<th class="px-2 py-1">NÚMERO DE SERIE</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_medidor'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['numero_serie'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 6:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT * FROM lectura_medidor;";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE LECTURAS DE MEDIDOR</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID MEDIDOR</th>';
                    echo '<th class="px-2 py-1">FECHA DE LECTURA</th>';
                    echo '<th class="px-2 py-1">LECTURA ACTUAL</th>';
                    echo '<th class="px-2 py-1">LECTURA ANTERIOR</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_lectura'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_medidor'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_lectura'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['lectura_actual'] . 'm³' . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['lectura_anterior'] . 'm³' . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 7:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT factura.*, cliente.nombre_completo 
                FROM factura 
                INNER JOIN cliente ON factura.id_cliente = cliente.id";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE FACTURAS</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID CLIENTE</th>';
                    echo '<th class="px-2 py-1">FECHA DE GENERACIÓN</th>';
                    echo '<th class="px-2 py-1">FECHA DE VENCIMIENTO</th>';
                    echo '<th class="px-2 py-1">TOTAL COSTO</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_factura'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_aviso'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_vencimiento'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . '$' . $row['total'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 8:
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT * FROM pagos;";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE PAGOS</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID FACTURA</th>';
                    echo '<th class="px-2 py-1">FECHA PAGO REALIZADO</th>';
                    echo '<th class="px-2 py-1">MONTO TOTAL</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_pago'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_factura'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . '$' . $row['monto'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
        case 9:
            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "SELECT reporte_servicio.*, cliente.nombre_completo FROM reporte_servicio INNER JOIN cliente ON reporte_servicio.id_cliente = cliente.id";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<caption><h2 class="text-xl font-semibold text-center mb-4">LISTADO DE REPORTES DE SERVICIO</h2></caption>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<thead>';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">ID CLIENTE</th>';
                    echo '<th class="px-2 py-1">PROBLEMA REPORTADO</th>';
                    echo '<th class="px-2 py-1">FECHA DE REPORTE</th>';
                    echo '<th class="px-2 py-1">ESTADO</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
        
                    foreach ($result as $row) {
                        echo '<tr class="odd:bg-gray-100 even:bg-white">';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_reporte'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                            echo '<td class="px-2 py-1 text-center">' . $row['problema'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['fecha_reporte'] . '</td>';
                        echo '<td class="px-2 py-1 text-center">' . $row['estado'] . '</td>';
                        echo '</tr>';
                    }
        
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                }
            }
            break;
    }                
    }

?>
<link rel="stylesheet" href="assets/css/disenore.css">