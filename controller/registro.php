<?php
require '/var/www/html/conexionBD/conexion.php';
require '/var/www/html/controller/auth.php';
// Crear una instancia de la clase ConexionBD
$conexionBD = new ConexionBD();
$dbconn = $conexionBD->conexionBD();

if (!$dbconn) {
    echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
} else {
    // Procesar registro según la opción seleccionada

    switch ($opcion) {
        case 1:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Empleados</h2>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="ccem">Cédula</label>';
            echo '      <input type="text" name="ccem" id="ccem" class="input-estilo" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el número de cédula" required>';
            echo '  </div>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="noem">Nombre</label>';
            echo '      <input class="input-estilo" type="text" name="noem" id="noem" placeholder="Escribe el nombre" required>';
            echo '  </div>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="apem">Apellido</label>';
            echo '      <input class="input-estilo" type="text" name="apem" id="apem" placeholder="Escribe el apellido" required>';
            echo '  </div>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="ceem">Celular</label>';
            echo '      <input class="input-estilo" type="text" name="ceem" id="ceem" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el celular">';
            echo '  </div>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="emem">Email</label>';
            echo '      <input class="input-estilo" type="text" name="emem" id="emem" placeholder="Escribe tu@email" required>';
            echo '  </div>';
            echo '  <div>';
            echo '      <label class="block text-black text-sm font-bold mb-2" for="caem">Cargo</label>';
            echo '      <input class="input-estilo" type="text" name="caem" id="caem" placeholder="Escribe el cargo" required>';
            echo '  </div>';
            echo '  <div class="flex items-center justify-between">';
            
            echo '      <input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar1">';
            echo '  </div>';
            echo '</form>';            

            break;
        case 2:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Clientes</h2>';
            
            echo '<div>';
                echo '<label class="block text-black text-sm font-bold mb-2" for="cccl">Cédula</label>';
                echo '<input class="input-estilo" type="text" name="cccl" id="cccl" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el número de cédula" required>';
            echo '</div>';
            
            echo '<div>';
                echo '<label class="block text-black text-sm font-bold mb-2" for="nocl">Nombre completo</label>';
                echo '<input class="input-estilo" type="text" name="nocl" id="nocl" placeholder="Escribe el nombre completo" required>';
            echo '</div>';
            
            echo '<div>';
                echo '<label class="block text-black text-sm font-bold mb-2" for="dicl">Dirección</label>';
                echo '<input class="input-estilo" type="text" name="dicl" id="dicl" placeholder="Escribe la dirección" required>';
            echo '</div>';
            
            echo '<div>';
                echo '<label class="block text-black text-sm font-bold mb-2" for="cecl">Celular</label>';
                echo '<input class="input-estilo" type="text" name="cecl" id="cecl" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el celular" required>';
            echo '</div>';
            
            echo '<div class="flex items-center justify-between">';
                echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar2">';
            echo '</div>';
            echo '</form>';

            break;
        case 3:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Contratos Empleado</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres de los empleados
                $sql = "SELECT id, nombre, apellido FROM empleado";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idemc">ID empleado</label>';
                    echo '<select name="idemc" id="idemc" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un empleado...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="ticoe">Tipo de contrato</label>';
            echo '<input class="input-estilo" type="text" name="ticoe" id="ticoe" placeholder="Escribe el tipo de contrato" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fecoe">Fecha de inicio</label>';
            echo '<input class="input-estilo-date" type="date" name="fecoe" id="fecoe" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fevcoe">Fecha de vencimiento</label>';
            echo '<input class="input-estilo-date" type="date" name="fevcoe" id="fevcoe" required>';
            echo '</div>';

            echo '<div class="relative">';
            echo '<label class="block text-black text-sm font-bold mb-2" for="sucoe">Sueldo</label>';
            echo '<div class="flex items-center">';
            echo '<span class="pesos absolute left-0 pl-3 text-gray-500">$</span>';
            echo '<input class="input-estilo pl-8" type="text" name="sucoe" id="sucoe" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el sueldo" required>';
            echo '</div>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar3">';
            echo '</div>';
            echo '</form>';

            break;
        case 4:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Contratos de Servicio</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres de los clientes
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idclc">ID Cliente</label>';
                    echo '<select name="idclc" id="idclc" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un cliente...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fecoc">Fecha de inicio</label>';
            echo '<input class="input-estilo-date" type="date" name="fecoc" id="fecoc" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fevcoc">Fecha de vencimiento</label>';
            echo '<input class="input-estilo-date" type="date" name="fevcoc" id="fevcoc" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="ticoc">Tipo de servicio</label>';
            echo '<input class="input-estilo" type="text" name="ticoc" id="ticoc" placeholder="Escribe el tipo de servicio" required>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar4">';
            echo '</div>';
            echo '</form>';
            break;
        case 5:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Medidores</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres de los clientes
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idclme">ID Cliente</label>';
                    echo '<select name="idclme" id="idclme" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un cliente...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="nums">Número de serie</label>';
            echo '<input class="input-estilo" type="text" name="nums" id="nums" maxlength="8" placeholder="AAAA-###-###" required>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar5">';
            echo '</div>';
            echo '</form>';
            break;
        case 6:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Lecturas de Medidor</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs de los medidores
                $sql = "SELECT id_medidor, numero_serie FROM medidor";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idmel">ID Medidor</label>';
                    echo '<select name="idmel" id="idmel" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un medidor...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id_medidor'] . '">' . $row['id_medidor'] . ' - Número de Serie: ' . $row['numero_serie'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fele">Fecha de Lectura</label>';
            echo '<input class="input-estilo-date" type="date" name="fele" id="fele" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="leac">Lectura Actual</label>';
            echo '<input class="input-estilo" type="text" name="leac" id="leac" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="m³" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="lean">Lectura Anterior</label>';
            echo '<input class="input-estilo" type="text" name="lean" id="lean" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="m³" required>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar6">';
            echo '</div>';
            echo '</form>';

            break;
        case 7:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Facturas</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres de los clientes
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idclf">ID Cliente</label>';
                    echo '<select name="idclf" id="idclf" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un cliente...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fefa">Fecha de Generación</label>';
            echo '<input class="input-estilo-date" type="date" name="fefa" id="fefa" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fevfa">Fecha de Vencimiento</label>';
            echo '<input class="input-estilo-date" type="date" name="fevfa" id="fevfa" required>';
            echo '</div>';

            echo '<div class="relative">';
            echo '<label class="block text-black text-sm font-bold mb-2" for="cofa">Total Costo</label>';
            echo '<div class="flex items-center">';
            echo '<span class="pesos absolute left-0 pl-3 text-gray-500">$</span>';
            echo '<input class="input-estilo pl-8" type="text" name="cofa" id="cofa" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el costo total" required>';
            echo '</div>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar7">';
            echo '</div>';
            echo '</form>';

            break;
        case 8:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Pagos</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs de las facturas
                $sql = "SELECT id_factura, id_cliente FROM factura";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idfap">ID Factura</label>';
                    echo '<select name="idfap" id="idfap" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione una factura...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id_factura'] . '">' . $row['id_factura'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fepa">Fecha de Pago</label>';
            echo '<input class="input-estilo-date" type="date" name="fepa" id="fepa" required>';
            echo '</div>';

            echo '<div class="relative">';
            echo '<label class="block text-black text-sm font-bold mb-2" for="mopa">Monto</label>';
            echo '<div class="flex items-center">';
            echo '<span class="pesos absolute left-0 pl-3 text-gray-500">$</span>';
            echo '<input class="input-estilo pl-8" type="text" name="mopa" id="mopa" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Escribe el monto" required>';
            echo '</div>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar8">';
            echo '</div>';
            echo '</form>';

            break;
        case 9:
            echo '<form id="miFormulario" action="" method="post" class="space-y-6">';
            echo '<h2 class="text-2xl font-bold text-black-600 mb-4">Se ingresarán datos a la tabla Reportes de Servicio</h2>';

            $conexionBD = new ConexionBD(); 
            $dbconn = $conexionBD->conexionBD(); 

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                // Consulta para obtener los IDs y nombres de los clientes
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql); // Preparar la consulta

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    echo '<div>';
                    echo '<label class="block text-black text-sm font-bold mb-2" for="idclr">ID Cliente</label>';
                    echo '<select name="idclr" id="idclr" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione un cliente...</option>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                }
            }

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="fere">Fecha de Reporte</label>';
            echo '<input class="input-estilo-date" type="date" name="fere" id="fere" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="esre">Estado</label>';
            echo '<input class="input-estilo" type="text" name="esre" id="esre" placeholder="Pendiente/Solucionado" required>';
            echo '</div>';

            echo '<div>';
            echo '<label class="block text-black text-sm font-bold mb-2" for="prre">Problema Reportado</label>';
            echo '<textarea class="input-estilo-pro" name="prre" id="prre" rows="2" cols="40" placeholder="Describe el problema" required></textarea>';
            echo '</div>';

            echo '<div class="flex items-center justify-between">';
            echo '<input class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Registrar" name="insertar9">';
            echo '</div>';
            echo '</form>';

            break;
        }

    if (isset($_POST['insertar1'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $ccem = isset($_POST['ccem']) ? $_POST['ccem'] : null;
            $noem = isset($_POST['noem']) ? $_POST['noem'] : null;
            $apem = isset($_POST['apem']) ? $_POST['apem'] : null;
            $ceem = isset($_POST['ceem']) ? $_POST['ceem'] : null;
            $emem = isset($_POST['emem']) ? $_POST['emem'] : null;
            $caem = isset($_POST['caem']) ? $_POST['caem'] : null;
    
            $sql = "INSERT INTO empleado (cedula, nombre, apellido, celular, email, cargo) VALUES (:ccem, :noem, :apem, :ceem, :emem, :caem) RETURNING id;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':ccem', $ccem);
            $stmt->bindParam(':noem', $noem);
            $stmt->bindParam(':apem', $apem);
            $stmt->bindParam(':ceem', $ceem);
            $stmt->bindParam(':emem', $emem);
            $stmt->bindParam(':caem', $caem);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON NÚMERO DE ID: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar2'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $cccl = isset($_POST['cccl']) ? $_POST['cccl'] : null;
            $nocl = isset($_POST['nocl']) ? $_POST['nocl'] : null;
            $dicl = isset($_POST['dicl']) ? $_POST['dicl'] : null;
            $cecl = isset($_POST['cecl']) ? $_POST['cecl'] : null;
    
            $sql = "INSERT INTO cliente (cedula, nombre_completo, direccion, celular) VALUES (:cccl, :nocl, :dicl, :cecl) RETURNING id;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':cccl', $cccl);
            $stmt->bindParam(':nocl', $nocl);
            $stmt->bindParam(':dicl', $dicl);
            $stmt->bindParam(':cecl', $cecl);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL NÚMERO DE ID: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar3'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idemc = isset($_POST['idemc']) ? $_POST['idemc'] : null;
            $ticoe = isset($_POST['ticoe']) ? $_POST['ticoe'] : null;
            $fecoe = isset($_POST['fecoe']) ? $_POST['fecoe'] : null;
            $fevcoe = isset($_POST['fevcoe']) ? $_POST['fevcoe'] : null;
            $sucoe = isset($_POST['sucoe']) ? $_POST['sucoe'] : null;
    
            $sql = "INSERT INTO contrato_empleado (id_empleado, tipo_contrato, fecha_inicio, fecha_fin, sueldo) 
                    VALUES (:idemc, :ticoe, :fecoe, :fevcoe, :sucoe) RETURNING id_contrato;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idemc', $idemc);
            $stmt->bindParam(':ticoe', $ticoe);
            $stmt->bindParam(':fecoe', $fecoe);
            $stmt->bindParam(':fevcoe', $fevcoe);
            $stmt->bindParam(':sucoe', $sucoe);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_contrato'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE CONTRATO: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar4'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idclc = isset($_POST['idclc']) ? $_POST['idclc'] : null;
            $fecoc = isset($_POST['fecoc']) ? $_POST['fecoc'] : null;
            $fevcoc = isset($_POST['fevcoc']) ? $_POST['fevcoc'] : null;
            $ticoc = isset($_POST['ticoc']) ? $_POST['ticoc'] : null;
    
            $sql = "INSERT INTO contrato_servicio (id_cliente, fecha_inicio, fecha_fin, tipo_servicio) 
                    VALUES (:idclc, :fecoc, :fevcoc, :ticoc) RETURNING id_servicio;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idclc', $idclc);
            $stmt->bindParam(':fecoc', $fecoc);
            $stmt->bindParam(':fevcoc', $fevcoc);
            $stmt->bindParam(':ticoc', $ticoc);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_servicio'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE CONTRATO: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar5'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idclme = isset($_POST['idclme']) ? $_POST['idclme'] : null;
            $nums = isset($_POST['nums']) ? $_POST['nums'] : null;
    
            $sql = "INSERT INTO medidor (id_cliente, numero_serie) VALUES (:idclme, :nums) RETURNING id_medidor;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idclme', $idclme);
            $stmt->bindParam(':nums', $nums);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_medidor'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE MEDIDOR: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar6'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idmel = isset($_POST['idmel']) ? $_POST['idmel'] : null;
            $fele = isset($_POST['fele']) ? $_POST['fele'] : null;
            $leac = isset($_POST['leac']) ? $_POST['leac'] : null;
            $lean = isset($_POST['lean']) ? $_POST['lean'] : null;
    
            $sql = "INSERT INTO lectura_medidor (id_medidor, fecha_lectura, lectura_actual, lectura_anterior) 
                    VALUES (:idmel, :fele, :leac, :lean) RETURNING id_lectura;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idmel', $idmel);
            $stmt->bindParam(':fele', $fele);
            $stmt->bindParam(':leac', $leac);
            $stmt->bindParam(':lean', $lean);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_lectura'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE LECTURA: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar7'])) {
            
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idclf = isset($_POST['idclf']) ? $_POST['idclf'] : null;
            $fefa = isset($_POST['fefa']) ? $_POST['fefa'] : null;
            $fevfa = isset($_POST['fevfa']) ? $_POST['fevfa'] : null;
            $cofa = isset($_POST['cofa']) ? $_POST['cofa'] : null;
    
            $sql = "INSERT INTO factura (id_cliente, fecha_aviso, fecha_vencimiento, total) 
                    VALUES (:idclf, :fefa, :fevfa, :cofa) RETURNING id_factura;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idclf', $idclf);
            $stmt->bindParam(':fefa', $fefa);
            $stmt->bindParam(':fevfa', $fevfa);
            $stmt->bindParam(':cofa', $cofa);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_factura'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID FACTURA: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar8'])) {
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idfap = isset($_POST['idfap']) ? $_POST['idfap'] : null;
            $fepa = isset($_POST['fepa']) ? $_POST['fepa'] : null;
            $mopa = isset($_POST['mopa']) ? $_POST['mopa'] : null;
    
            $sql = "INSERT INTO pagos (id_factura, fecha, monto) VALUES (:idfap, :fepa, :mopa) RETURNING id_pago;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idfap', $idfap);
            $stmt->bindParam(':fepa', $fepa);
            $stmt->bindParam(':mopa', $mopa);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_pago'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE PAGO: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
    else if (isset($_POST['insertar9'])) {
        $conexionBD = new ConexionBD(); // Crear una instancia de la clase
        $dbconn = $conexionBD->conexionBD(); // Obtener la conexión
    
        if (!$dbconn) {
            echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
        } else {
            $idclr = isset($_POST['idclr']) ? $_POST['idclr'] : null;
            $prre = isset($_POST['prre']) ? $_POST['prre'] : null;
            $fere = isset($_POST['fere']) ? $_POST['fere'] : null;
            $esre = isset($_POST['esre']) ? $_POST['esre'] : null;
    
            $sql = "INSERT INTO reporte_servicio (id_cliente, problema, fecha_reporte, estado) 
                    VALUES (:idclr, :prre, :fere, :esre) RETURNING id_reporte;";
            $stmt = $dbconn->prepare($sql); // Preparar la consulta
    
            // Vincular los parámetros
            $stmt->bindParam(':idclr', $idclr);
            $stmt->bindParam(':prre', $prre);
            $stmt->bindParam(':fere', $fere);
            $stmt->bindParam(':esre', $esre);
    
            if (!$stmt->execute()) {
                echo "Upss! Al parecer hubo un error al momento de ingresar los datos. Por favor revisa las llaves foráneas, los valores que deben ser únicos o los campos no nulos.";
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener el ID generado
                $id_generado = $row['id_reporte'];
                echo '<form action="" method="post">';
                echo "<h2 class='font-bold'>REGISTRO EXITOSO CON EL ID DE REPORTE: </h2>" . $id_generado;
                echo '</form>';
            }
        }
    }
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar todos los inputs con la clase "input-estilo"
    var inputs = document.querySelectorAll('.input-estilo');

    // Iterar sobre cada input y aplicar el margen izquierdo
    inputs.forEach(function(input) {
        input.style.marginLeft = '30%'; // Ajusta el margen izquierdo
    });
});

<link rel="stylesheet" href="assets/css/disenore.css">

</script>
<script src="https://cdn.tailwindcss.com"></script>