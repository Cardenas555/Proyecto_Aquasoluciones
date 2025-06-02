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
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Empleados</h2>';
            echo '<br>';
        
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y apellidos registrados
                $sql = "SELECT id, nombre, apellido FROM empleado";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del registro a consultar: </label>';
                    echo '<select name="id_empleado" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar1">';
            echo '</form>';
            break;
        case 2:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Clientes</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres registrados
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del registro a consultar: </label>';
                    echo '<select name="id_cliente" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar2">';
            echo '</form>';
            break;
        case 3:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Contratos Empleado</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y tipos de contrato registrados
                $sql = "SELECT id_contrato, id_empleado FROM contrato_empleado";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del contrato a consultar: </label>';
                    echo '<select name="id_contrato" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_contrato'] . '">' . 'ID: ' . $row['id_contrato'] . ' - Empleado con ID: ' . $row['id_empleado'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar3">';
            echo '</form>';
            break;
        case 4:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Contratos Servicio</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
            
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y tipos de servicio registrados
                $sql = "SELECT id_servicio, id_cliente FROM contrato_servicio";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del contrato a consultar: </label>';
                    echo '<select name="id_servicio" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_servicio'] . '">' . 'ID: ' . $row['id_servicio'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar4">';
            echo '</form>';
            break;
        case 5:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Medidores</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y clientes registrados
                $sql = "SELECT id_medidor, id_cliente FROM medidor";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del medidor a consultar: </label>';
                    echo '<select name="id_medidor" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_medidor'] . '">' . 'ID: ' . $row['id_medidor'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar5">';
            echo '</form>';
            break;
        case 6:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Lecturas de Medidor</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y medidores registrados
                $sql = "SELECT id_lectura, id_medidor FROM lectura_medidor";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID de la lectura a consultar: </label>';
                    echo '<select name="id_lectura" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_lectura'] . '">' . 'ID: ' . $row['id_lectura'] . ' - Medidor con ID: ' . $row['id_medidor'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar6">';
            echo '</form>';
            break;
        case 7:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Facturas</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y clientes registrados
                $sql = "SELECT id_factura, id_cliente FROM factura";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID de la factura a consultar: </label>';
                    echo '<select name="id_factura" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_factura'] . '">' . 'ID: ' . $row['id_factura'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar7">';
            echo '</form>';
            break;
        case 8:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Pagos</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y facturas registradas
                $sql = "SELECT id_pago, id_factura FROM pagos";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del pago a consultar: </label>';
                    echo '<select name="id_pago" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_pago'] . '">' . 'ID: ' . $row['id_pago'] . ' - Factura con ID: ' . $row['id_factura'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar8">';
            echo '</form>';
            break;
        case 9:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Consultar datos de la tabla Reportes de Servicio</h2>';
            echo '<br>';
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y clientes registrados
                $sql = "SELECT id_reporte, id_cliente FROM reporte_servicio";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<label>Seleccione el ID del reporte a consultar: </label>';
                    echo '<select name="id_reporte" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_reporte'] . '">' . 'ID: ' . $row['id_reporte'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Consultar" name="consultar9">';
            echo '</form>';
            break;
    }        
    if (isset($_POST['consultar1'])) {
        $idSeleccionado = isset($_POST['id_empleado']) ? $_POST['id_empleado'] : null;
    
        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del registro seleccionado
                $sql = "SELECT * FROM empleado WHERE id = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
                // Vincular el parámetro
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);
    
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                    // Mostrar los detalles del registro
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Empleado </h2>';
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
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['id'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['cedula'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['nombre'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['apellido'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['celular'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['email'] . '</td>';
                    echo '<td class="px-2 py-1 text-center" style="overflow-wrap: break-word;">' . $row['cargo'] . '</td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }             
             
    else if (isset($_POST['consultar2'])) {
        $idSeleccionado = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
    
        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del registro seleccionado
                $sql = "SELECT * FROM cliente WHERE id = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
                // Vincular el parámetro
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);
    
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                    // Mostrar los detalles del registro
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Cliente </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID</th>';
                    echo '<th class="px-2 py-1">Cédula</th>';
                    echo '<th class="px-2 py-1">Nombre Completo</th>';
                    echo '<th class="px-2 py-1">Dirección</th>';
                    echo '<th class="px-2 py-1">Celular</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['cedula'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['nombre_completo'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['direccion'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['celular'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    
    else if (isset($_POST['consultar3'])) {
        $idSeleccionado = isset($_POST['id_contrato']) ? $_POST['id_contrato'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
 
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del contrato seleccionado
                $sql = "SELECT ce.*, e.nombre, e.apellido FROM contrato_empleado ce INNER JOIN empleado e ON ce.id_empleado = e.id WHERE ce.id_contrato = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles del contrato
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Contrato Empleado </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Contrato</th>';
                    echo '<th class="px-2 py-1">ID Empleado</th>';
                    echo '<th class="px-2 py-1">Tipo de Contrato</th>';
                    echo '<th class="px-2 py-1">Fecha de Inicio</th>';
                    echo '<th class="px-2 py-1">Fecha de Fin</th>';
                    echo '<th class="px-2 py-1">Sueldo</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_contrato'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_empleado'] . ' - ' . htmlspecialchars($row['nombre']) . ' ' . htmlspecialchars($row['apellido']) . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['tipo_contrato'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_inicio'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_fin'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . '$' . $row['sueldo'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    else if (isset($_POST['consultar4'])) {
        $idSeleccionado = isset($_POST['id_servicio']) ? $_POST['id_servicio'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del contrato seleccionado
                $sql = "SELECT cs.*, c.nombre_completo FROM contrato_servicio cs INNER JOIN cliente c ON cs.id_cliente = c.id WHERE cs.id_servicio = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles del contrato
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Contrato Servicio </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Contrato</th>';
                    echo '<th class="px-2 py-1">ID Cliente</th>';
                    echo '<th class="px-2 py-1">Fecha de Inicio</th>';
                    echo '<th class="px-2 py-1">Fecha de Fin</th>';
                    echo '<th class="px-2 py-1">Tipo de Servicio</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_servicio'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_inicio'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_fin'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['tipo_servicio'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    else if (isset($_POST['consultar5'])) {
        $idSeleccionado = isset($_POST['id_medidor']) ? $_POST['id_medidor'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del medidor seleccionado
                $sql = "SELECT m.*, c.nombre_completo FROM medidor m INNER JOIN cliente c ON m.id_cliente = c.id WHERE m.id_medidor = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles del medidor
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Medidor </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Medidor</th>';
                    echo '<th class="px-2 py-1">ID Cliente</th>';
                    echo '<th class="px-2 py-1">Número de Serie</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_medidor'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['numero_serie'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    else if (isset($_POST['consultar6'])) {
        $idSeleccionado = isset($_POST['id_lectura']) ? $_POST['id_lectura'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles de la lectura seleccionada
                $sql = "SELECT * FROM lectura_medidor WHERE id_lectura = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
                
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles de la lectura
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles de la Lectura </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Lectura</th>';
                    echo '<th class="px-2 py-1">ID Medidor</th>';
                    echo '<th class="px-2 py-1">Fecha de Lectura</th>';
                    echo '<th class="px-2 py-1">Lectura Actual</th>';
                    echo '<th class="px-2 py-1">Lectura Anterior</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_lectura'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_medidor'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_lectura'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['lectura_actual'] . 'm³' . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['lectura_anterior'] . 'm³' . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    else if (isset($_POST['consultar7'])) {
        $idSeleccionado = isset($_POST['id_factura']) ? $_POST['id_factura'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles de la factura seleccionada
                $sql = "SELECT f.*, c.nombre_completo FROM factura f INNER JOIN cliente c ON f.id_cliente = c.id WHERE f.id_factura = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles de la factura
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles de la Factura </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Factura</th>';
                    echo '<th class="px-2 py-1">ID Cliente</th>';
                    echo '<th class="px-2 py-1">Fecha de Generación</th>';
                    echo '<th class="px-2 py-1">Fecha de Vencimiento</th>';
                    echo '<th class="px-2 py-1">Total Costo</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_factura'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_aviso'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_vencimiento'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . '$' . $row['total'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    else if (isset($_POST['consultar8'])) {
        $idSeleccionado = isset($_POST['id_pago']) ? $_POST['id_pago'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del pago seleccionado
                $sql = "SELECT * FROM pagos WHERE id_pago = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles del pago
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Pago </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Pago</th>';
                    echo '<th class="px-2 py-1">ID Factura</th>';
                    echo '<th class="px-2 py-1">Fecha de Pago</th>';
                    echo '<th class="px-2 py-1">Monto</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_pago'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_factura'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . '$' . $row['monto'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
    if (isset($_POST['consultar9'])) {
        $idSeleccionado = isset($_POST['id_reporte']) ? $_POST['id_reporte'] : null;

        if ($idSeleccionado) {
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los detalles del reporte seleccionado
                $sql = "SELECT rs.*, c.nombre_completo FROM reporte_servicio rs INNER JOIN cliente c ON rs.id_cliente = c.id WHERE rs.id_reporte = :id";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Mostrar los detalles del reporte
                    echo '<form id="miFormulario" action="" method="post">';
                    echo '<h2 class="text-xl font-semibold text-center mb-4"> Detalles del Reporte de Servicio </h2>';
                    echo '<div class="tabla-scroll">';
                    echo '<table class="table-auto border-collapse mx-auto w-full max-w-4xl text-sm">';
                    echo '<tr style="background-color: #3498db; color: white;">';
                    echo '<th class="px-2 py-1">ID Reporte</th>';
                    echo '<th class="px-2 py-1">ID Cliente</th>';
                    echo '<th class="px-2 py-1">Problema Reportado</th>';
                    echo '<th class="px-2 py-1">Fecha de Reporte</th>';
                    echo '<th class="px-2 py-1">Estado</th>';
                    echo '</tr>';
                    echo '<tr class="odd:bg-gray-100 even:bg-white">';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_reporte'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['id_cliente'] . ' - ' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['problema'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['fecha_reporte'] . '</td>';
                    echo '<td class="px-2 py-1 text-center">' . $row['estado'] . '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo "No se encontró el registro.";
                }
            }
        } else {
            echo "Por favor, seleccione un registro válido.";
        }
    }
}

?>

<link rel="stylesheet" href="assets/css/disenore.css">