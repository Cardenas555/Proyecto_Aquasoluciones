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
        case 1: // Tabla Empleados
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Empleados</h2>';
        
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id, nombre, apellido FROM empleado";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
                    echo '<label>Seleccione el ID del registro a modificar: </label>';
                    echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="selec">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                    }
                    echo '</select>';
                }
            }
            
            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="empleado">'; // Tabla seleccionada
            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="cedula">Cédula</option>';
            echo '<option value="nombre">Nombre</option>';
            echo '<option value="apellido">Apellido</option>';
            echo '<option value="celular">Celular</option>';
            echo '<option value="email">Email</option>';
            echo '<option value="cargo">Cargo</option>';
            echo '</select>';
        
            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';

            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar1">';
            echo '</form>';
            break;
            

        case 2: // Tabla Clientes
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Clientes</h2>';

            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del registro a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                        }
                        echo '</select>';
                    }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="cliente">'; // Tabla seleccionada
            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="cedula">Cédula</option>';
            echo '<option value="nombre_completo">Nombre Completo</option>';
            echo '<option value="direccion">Dirección</option>';
            echo '<option value="celular">Celular</option>';
            echo '</select>';

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';

            
            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar2">';
            echo '</form>';

            break;

        case 3: // Tabla Contratos Empleado
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Contratos Empleado</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_contrato, id_empleado FROM contrato_empleado";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del contrato a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_contrato'] . '">' . 'ID: ' . $row['id_contrato'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="contrato_empleado">'; // Tabla seleccionada
            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_empleado">ID Empleado</option>';
            echo '<option value="tipo_contrato">Tipo de Contrato</option>';
            echo '<option value="fecha_inicio">Fecha de Inicio</option>';
            echo '<option value="fecha_fin">Fecha de Fin</option>';
            echo '<option value="sueldo">Sueldo</option>';
            echo '</select>';

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';


            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar3">';

            echo '</form>';

            break;
        
        case 4: // Tabla Contratos Servicio
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Contratos Servicio</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_servicio, id_cliente FROM contrato_servicio";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del contrato a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_servicio'] . '">' . 'ID: ' . $row['id_servicio'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="contrato_servicio">'; // Tabla seleccionada
            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_cliente">ID Cliente</option>';
            echo '<option value="tipo_servicio">Tipo de Servicio</option>';
            echo '<option value="fecha_inicio">Fecha de Inicio</option>';
            echo '<option value="fecha_fin">Fecha de Fin</option>';
            echo '</select>';
            
            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';

            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar4">';
            echo '</form>';

            break;
        case 5: // Tabla Medidores
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Medidores</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_medidor, numero_serie FROM medidor";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del medidor a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_medidor'] . '">' . 'ID: ' . $row['id_medidor'] . ' - Serie: ' . $row['numero_serie'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="medidor">'; // Tabla seleccionada

            echo '<label class="block text-black text-sm font-bold mb-2" for="campo">Seleccione el campo a modificar</label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_cliente">ID Cliente</option>';
            echo '<option value="numero_serie">Número de Serie</option>';
            echo '</select>';
                

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';
            
            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar5">';
            echo '</form>';

            break;

        case 6: // Tabla Lectura Medidores
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Lectura Medidores</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_lectura, id_medidor FROM lectura_medidor";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID de la lectura a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_lectura'] . '">' . 'ID: ' . $row['id_lectura'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="lectura_medidor">'; // Tabla seleccionada

            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_medidor">ID Medidor</option>';
            echo '<option value="fecha_lectura">Fecha de Lectura</option>';
            echo '<option value="lectura_actual">Lectura Actual</option>';
            echo '<option value="lectura_anterior">Lectura Anterior</option>';
            echo '</select>';

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';
        
            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar6">';
            echo '</form>';

            break;

        case 7: // Tabla Facturas
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Facturas</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_factura, id_cliente FROM factura";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID de la factura a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_factura'] . '">' . 'ID: ' . $row['id_factura'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="factura">'; // Tabla seleccionada
            

            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_cliente">ID Cliente</option>';
            echo '<option value="fecha_aviso">Fecha de Aviso</option>';
            echo '<option value="fecha_vencimiento">Fecha de Vencimiento</option>';
            echo '<option value="total">Costo Total</option>';
            echo '</select>';

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';
            
            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar7">';
            echo '</form>';

            break;
        
        case 8: // Tabla Pagos
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Pagos</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_pago, id_factura FROM pagos";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del pago a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_pago'] . '">' . 'ID: ' . $row['id_pago'] . '</option>';
                        }
                        echo '</select>';
                        }
            }

            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="pagos">'; // Tabla seleccionada
            

            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_factura">ID Factura</option>';
            echo '<option value="fecha">Fecha</option>';
            echo '<option value="monto">Monto</option>';
            echo '</select>';
        
            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';
        
            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar8">';
            echo '</form>';

            break;
        
        case 9: // Tabla Reportes de Servicio
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Modificar datos de la tabla Reportes de Servicio</h2>';
            
            // Crear una instancia de la clase ConexionBD
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs registrados
                $sql = "SELECT id_reporte, id_cliente FROM reporte_servicio";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
                    echo '<br>';
        
                        echo '<label class="block text-black text-sm font-bold mb-2" for="id">Seleccione el ID del reporte a modificar</label>';
                        echo '<select name="id" id="id_combobox" onchange="cargarValorActual()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                        echo '<option value="selec">Seleccione...</option>';
                        foreach ($result as $row) {
                            echo '<option value="' . $row['id_reporte'] . '">' . 'ID: ' . $row['id_reporte'] . '</option>';
                        }
                        echo '</select>';
                        }
            }


            echo '<br>';
            echo '<input type="hidden" id="tabla_combobox" value="reporte_servicio">'; // Tabla seleccionada
            

            echo '<label>Seleccione el campo a modificar: </label>';
            echo '<select name="campo" id="campo_combobox" onchange="cargarValorActual(); actualizarInput()" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
            echo '<option value="selec">Seleccione...</option>';
            echo '<option value="id_cliente">ID Cliente</option>';
            echo '<option value="problema">Problema Reportado</option>';
            echo '<option value="fecha_reporte">Fecha de Reporte</option>';
            echo '<option value="estado">Estado</option>';
            echo '</select>';

            echo '<br>';
            echo '<div id="contenedorNuevoValor" style="display:none;">';
            echo '<label>Nuevo valor: </label>';
            echo '  <div id="inputContainer"></div>'; // Aquí se inyecta el input
            echo '</div>';

            echo '<br><br>';
            echo '<input type="submit" value="Modificar" name="modificar9">';
        echo '</form>';

            break;
    }

    // Procesar la modificación
    if (isset($_POST['modificar1']) || isset($_POST['modificar2']) || isset($_POST['modificar3']) || isset($_POST['modificar4']) || isset($_POST['modificar5']) || isset($_POST['modificar6']) || isset($_POST['modificar7'])|| isset($_POST['modificar8']) || isset($_POST['modificar9'])) {
        
        $tabla = '';
        $campo = $_POST['campo'];
        $id = $_POST['id'];
        $valor = $_POST['valor'];
        $columna_id = ''; // Columna identificadora
    
        // Determinar la tabla y la columna identificadora según el botón presionado
        if (isset($_POST['modificar1'])) {
            $tabla = 'empleado';
            $columna_id = 'id';
        }
        if (isset($_POST['modificar2'])) {
            $tabla = 'cliente';
            $columna_id = 'id';
        }
        if (isset($_POST['modificar3'])) {
            $tabla = 'contrato_empleado';
            $columna_id = 'id_contrato';
        }
        if (isset($_POST['modificar4'])) {
            $tabla = 'contrato_servicio';
            $columna_id = 'id_servicio';
        }
        if (isset($_POST['modificar5'])) {
            $tabla = 'medidor';
            $columna_id = 'id_medidor';
        }
        if (isset($_POST['modificar6'])) {
            $tabla = 'lectura_medidor';
            $columna_id = 'id_lectura';
        }
        if (isset($_POST['modificar7'])) {
            $tabla = 'factura';
            $columna_id = 'id_factura';
        }
        if (isset($_POST['modificar8'])) {
            $tabla = 'pagos';
            $columna_id = 'id_pago';
        }
        if (isset($_POST['modificar9'])) {
            $tabla = 'reporte_servicio';
            $columna_id = 'id_reporte';
        }

    
        // Crear una instancia de la clase ConexionBD
        $conexionBD = new ConexionBD();
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión

        if (!$dbconn) {
            echo '<form id="miFormulario" action="" method="post">';
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            echo '</form>';
        } else {
            // Escapar los valores para evitar inyecciones SQL
            $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');
            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
            $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

            // Construir y preparar la consulta
            $sql = "UPDATE $tabla SET $campo = :valor WHERE $columna_id = :id";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta

            // Vincular los parámetros
            $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutar la consulta
            if (!$stmt->execute()) {
                echo '<form id="miFormulario" action="" method="post">';
                echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Error al modificar el registro. Verifique los datos ingresados.</h2>';
                echo '</form>';
            } else {
                echo '<form id="miFormulario" action="" method="post">';
                echo '<h2 class="text-2xl font-bold text-black-600 mb-4">El registro se modificó exitosamente.</h2>';
                echo '</form>';
            }
        }
    }
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="assets/css/disenore.css">

<script>
    function cargarValorActual() {
        // Obtener el ID seleccionado, el campo seleccionado y la tabla seleccionada
        var idSeleccionado = document.getElementById('id_combobox').value;
        var campoSeleccionado = document.getElementById('campo_combobox').value;
        var tablaSeleccionada = document.getElementById('tabla_combobox').value; // Nuevo: tabla seleccionada

        // Determinar la columna identificadora según la tabla
        var columnaId;
        switch (tablaSeleccionada) {
            case 'empleado':
                columnaId = 'id';
                break;
            case 'cliente':
                columnaId = 'id';
                break;
            case 'contrato_empleado':
                columnaId = 'id_contrato';
                break;
            case 'contrato_servicio':
                columnaId = 'id_servicio';
                break;
            case 'medidor':
                columnaId = 'id_medidor';
                break;
            case 'lectura_medidor':
                columnaId = 'id_lectura';
                break;
            case 'factura':
                columnaId = 'id_factura';
                break;
            case 'pagos':
                columnaId = 'id_pago';
                break;
            case 'reporte_servicio':
                columnaId = 'id_reporte';
                break;
            default:
                columnaId = 'id'; // Valor predeterminado
        }

        // Realizar una solicitud AJAX al servidor
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'controller/obtener_valor_actual.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Actualizar el input con el valor recibido
                document.getElementById('nuevo_valor').value = xhr.responseText;
            }
        };

        // Enviar el ID, el campo y la tabla seleccionados al servidor
        xhr.send('id=' + idSeleccionado + '&campo=' + campoSeleccionado + '&tabla=' + tablaSeleccionada + '&columna_id=' + columnaId);
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Seleccionar todos los inputs con la clase "input-estilo"
        var inputs = document.querySelectorAll('.input-estilo');
        
        // Iterar sobre cada input y aplicar el margen izquierdo
        inputs.forEach(function(input) {
            input.style.marginLeft = '30%'; // Ajusta el margen izquierdo
        });
    });
    
    function actualizarInput() {
        const campoSeleccionado = document.getElementById('campo_combobox').value;
        const idSeleccionado = document.getElementById('id_combobox').value;
        const tablaSeleccionada = document.getElementById('tabla_combobox').value;
        const inputContainer = document.getElementById('inputContainer');
        const contenedor = document.getElementById('contenedorNuevoValor');

        inputContainer.innerHTML = ''; // Limpiar input anterior

        const tiposDeInput = {
            cedula: {
                tipo: 'text',
                clase: 'input-estilo',
                maxlength: 13,
                oninput: "if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);",
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'Escribe el número de cédula'
            },
            celular: {
                tipo: 'text',
                clase: 'input-estilo',
                maxlength: 13,
                oninput: "if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);",
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'Escribe el número de celular'
            },
            email: {
                tipo: 'email',
                clase: 'input-estilo',
                placeholder: 'Escribe@tuemail'
            },
            nombre: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el nombre'
            },
            nombre_completo: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el nombre'
            },
            direccion: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe tu dirección'
            },
            apellido: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el apellido'
            },
            cargo: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el cargo'
            },
            id_empleado: {
                tipo: 'select',
                clase: 'class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"',
                tablaOrigen: 'empleado',
                campoMostrar: 'id',
                descripcion: ['nombre', 'apellido'],
                cargarOpciones: true
            },
            id_cliente: {
                tipo: 'select',
                clase: 'class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"',
                tablaOrigen: 'cliente',
                campoMostrar: 'id',
                descripcion: ['nombre_completo'],
                cargarOpciones: true
            },
            id_medidor: {
                tipo: 'select',
                clase: 'class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"',
                tablaOrigen: 'medidor',
                campoMostrar: 'id_medidor',
                descripcion: ['numero_serie'],
                cargarOpciones: true
            },
            id_factura: {
                tipo: 'select',
                clase: 'class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"',
                tablaOrigen: 'factura',
                campoMostrar: 'id_factura',
                descripcion: [],
                cargarOpciones: true
            },
    
            id_reporte: {
                tipo: 'select',
                clase: 'class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"',
                tablaOrigen: 'reporte_servicio',
                campoMostrar: 'id_reporte',
                descripcion: ['id_cliente'],
                cargarOpciones: true
            },
            tipo_contrato: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el tipo de contrato'
            },
            tipo_servicio: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el tipo de servicio'
            },
            fecha_inicio: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            fecha_fin: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            sueldo: {
                tipo: 'text',
                clase: 'input-estilo',
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'Escribe el sueldo'
            },
            numero_serie: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Escribe el número de serie (AAAA-###-###)'
            },
            fecha_lectura: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            lectura_actual: {
                tipo: 'text',
                clase: 'input-estilo',
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'm³'
            },
            lectura_anterior: {
                tipo: 'text',
                clase: 'input-estilo',
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'm³'
            },
            fecha_aviso: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            fecha_vencimiento: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            total: {
                tipo: 'text',
                clase: 'input-estilo',
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'Escribe el total'
            },
            fecha: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            monto: {
                tipo: 'text',
                clase: 'input-estilo',
                onkeypress: "return event.charCode >= 48 && event.charCode <= 57",
                placeholder: 'Escribe la cuantía'
            },
            problema: {
                tipo: 'textarea',
                clase: 'input-estilo-pro',
                placeholder: 'Escribe el problema',
                rows: 2,
                cols: 40,
            },
            fecha_reporte: {
                tipo: 'date',
                clase: 'input-estilo-date'
            },
            estado: {
                tipo: 'text',
                clase: 'input-estilo',
                placeholder: 'Pendiente/Solucionado'
            }

        };

        const config = tiposDeInput[campoSeleccionado];

        if (!config || idSeleccionado === "selec") {
            contenedor.style.display = 'none';
            return;
        }

        contenedor.style.display = 'block';

        if (config.tipo === 'select' && config.cargarOpciones) {
            const select = document.createElement('select');
            select.name = 'valor';
            select.id = 'nuevo_valor';
            select.className = config.clase;
            select.required = true;

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Seleccione...';
            select.appendChild(defaultOption);

            const formData = new FormData();
            formData.append('modo_select', true);
            formData.append('tabla_origen', config.tablaOrigen);
            formData.append('campo_mostrar', config.campoMostrar);
            formData.append('descripcion', config.descripcion.join(','));

            fetch('controller/obtener_valor_actual.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                select.innerHTML += data;

                if (idSeleccionado !== "selec" && campoSeleccionado !== "selec") {
                    // Petición para obtener el valor actual
                    const params = new URLSearchParams();
                    params.append('id', idSeleccionado);
                    params.append('campo', campoSeleccionado);
                    params.append('tabla', tablaSeleccionada);
                    params.append('columna_id', document.getElementById('tabla_combobox').value === 'empleado' ? 'id' :
                        document.getElementById('tabla_combobox').value === 'cliente' ? 'id' :
                        document.getElementById('tabla_combobox').value === 'contrato_empleado' ? 'id_contrato' :
                        document.getElementById('tabla_combobox').value === 'contrato_servicio' ? 'id_servicio' :
                        document.getElementById('tabla_combobox').value === 'medidor' ? 'id_medidor' :
                        document.getElementById('tabla_combobox').value === 'lectura_medidor' ? 'id_lectura' :
                        document.getElementById('tabla_combobox').value === 'factura' ? 'id_factura' :
                        document.getElementById('tabla_combobox').value === 'pagos' ? 'id_pago' :
                        document.getElementById('tabla_combobox').value === 'reporte_servicio' ? 'id_reporte' : 'id'
                    );

                    fetch('controller/obtener_valor_actual.php', {
                        method: 'POST',
                        body: params
                    })
                    .then(response => response.text())
                    .then(valorActual => {
                        // Selecciona la opción correspondiente
                        for (let option of select.options) {
                            if (option.value == valorActual.trim()) {
                                option.selected = true;
                                break;
                            }
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error al cargar opciones:', error);
            });

            inputContainer.appendChild(select);

        } 
        else if (config.tipo === 'textarea') {
            // Crear un textarea
            const textarea = document.createElement('textarea');
            textarea.name = 'valor';
            textarea.id = 'nuevo_valor';
            textarea.className = config.clase;
            textarea.placeholder = config.placeholder || '';
            textarea.required = true;
            textarea.rows = config.rows || 4; // Número de filas
            textarea.cols = config.cols || 50; // Número de columnas
            textarea.style.marginLeft = '22%';
            textarea.style.width = 'auto';
            textarea.style.position='flex';

            inputContainer.appendChild(textarea);
        } 
        else {
            const input = document.createElement('input');
            input.type = config.tipo;
            input.name = 'valor';
            input.id = 'nuevo_valor';
            input.className = config.clase;
            input.placeholder = config.placeholder || '';
            input.required = true;
            
            if (config.tipo === 'date') {
                input.style.marginLeft = '35%';
            } else {
                input.style.marginLeft = '30%';
            }
            

            if (config.maxlength) input.maxLength = config.maxlength;
            if (config.oninput) input.setAttribute('oninput', config.oninput);
            if (config.onkeypress) input.setAttribute('onkeypress', config.onkeypress);

            inputContainer.appendChild(input);
        }
    }


    
</script>