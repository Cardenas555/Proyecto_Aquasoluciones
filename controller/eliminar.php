<?php
require '/var/www/html/conexionBD/conexion.php';
require '/var/www/html/controller/auth.php';

$conexionBD = new ConexionBD();
$dbconn = $conexionBD->conexionBD();

if (!$dbconn) {
    echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
} else {
    switch ($opcion) {
        case 1:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<caption><h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Empleados</h2>';
            echo '<br><br>';
                    
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD(); 
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id, nombre, apellido FROM empleado";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del registro a eliminar: </label>';
                    echo '<select name="id_empleado" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar1">';
            echo '</form>';
            break;
        case 2:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Clientes</h2>';
            echo '<br><br>';
        
           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id, nombre_completo FROM cliente";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del cliente a eliminar: </label>';
                    echo '<select name="id_cliente" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['nombre_completo'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar2">';
            echo '</form>';
            break;
        case 3:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Contratos Empleado</h2>';
            echo '<br><br>';
        
           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_contrato, id_empleado FROM contrato_empleado";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del contrato a eliminar: </label>';
                    echo '<select name="id_contrato" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_contrato'] . '">' . 'ID: ' . $row['id_contrato'] . ' - Empleado con ID: ' . $row['id_empleado'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar3">';
            echo '</form>';
            break;
        case 4:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Contratos de Servicio</h2>';
            echo '<br><br>';
        
           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
        
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_servicio, id_cliente FROM contrato_servicio";
                $stmt = $dbconn->prepare($sql);
        
                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del contrato a eliminar: </label>';
                    echo '<select name="id_servicio" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_servicio'] . '">' . 'ID: ' . $row['id_servicio'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }
        
            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar4">';
            echo '</form>';
            break;
        case 5:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Medidores</h2>';
            echo '<br><br>';

           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_medidor, id_cliente FROM medidor";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del medidor a eliminar: </label>';
                    echo '<select name="id_medidor" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_medidor'] . '">' . 'ID: ' . $row['id_medidor'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar5">';
            echo '</form>';
            break;
        case 6:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Lecturas de Medidor</h2>';
            echo '<br><br>';

           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_lectura, id_medidor FROM lectura_medidor";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID de la lectura a eliminar: </label>';
                    echo '<select name="id_lectura" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_lectura'] . '">' . 'ID: ' . $row['id_lectura'] . ' - Medidor con ID: ' . $row['id_medidor'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar6">';
            echo '</form>';
            break;
        case 7:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Facturas</h2>';
            echo '<br><br>';

           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_factura, id_cliente FROM factura";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID de la factura a eliminar: </label>';
                    echo '<select name="id_factura" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_factura'] . '">' . 'ID: ' . $row['id_factura'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar7">';
            echo '</form>';
            break;
        case 8:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Pagos</h2>';
            echo '<br><br>';

           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_pago, id_factura FROM pagos";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del pago a eliminar: </label>';
                    echo '<select name="id_pago" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_pago'] . '">' . 'ID: ' . $row['id_pago'] . ' - Factura con ID: ' . $row['id_factura'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar8">';
            echo '</form>';
            break;
        case 9:
            echo '<form id="miFormulario" action="" method="post">';
            echo '<h2 class="text-xl font-semibold text-center mb-4">Eliminar datos de la tabla Reportes de Servicio</h2>';
            echo '<br><br>';

           
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                
                $sql = "SELECT id_reporte, id_cliente FROM reporte_servicio";
                $stmt = $dbconn->prepare($sql);

                if (!$stmt->execute()) {
                    echo "Error al obtener los datos.";
                } else {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<label>Seleccione el ID del reporte a eliminar: </label>';
                    echo '<select name="idre" class="block mx-auto w-1/2 bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>';
                    echo '<option value="">Seleccione...</option>';
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_reporte'] . '">' . 'ID: ' . $row['id_reporte'] . ' - Cliente con ID: ' . $row['id_cliente'] . '</option>';
                    }
                    echo '</select>';
                }
            }

            echo '<br><br>';
            echo '<input type="submit" value="Eliminar" name="eliminar9">';
            echo '</form>';
            break;
    }    
    if (isset($_POST['eliminar1'])) {
        $idSeleccionado = isset($_POST['id_empleado']) ? $_POST['id_empleado'] : null;
    
        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
    
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM empleado WHERE id = :id";
                $stmt = $dbconn->prepare($sql);
    
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El registro con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el registro. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un registro válido.</h3>";
        }
    }
    if (isset($_POST['eliminar2'])) {
        $idSeleccionado = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : null;
    
        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
    
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM cliente WHERE id = :id";
                $stmt = $dbconn->prepare($sql);
    
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El cliente con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el cliente. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un cliente válido.</h3>";
        }
    }
    else if (isset($_POST['eliminar3'])) {
        $idSeleccionado = isset($_POST['id_contrato']) ? $_POST['id_contrato'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM contrato_empleado WHERE id_contrato = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El contrato con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el contrato. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un contrato válido.</h3>";
        }
    }
    else if (isset($_POST['eliminar4'])) {
        $idSeleccionado = isset($_POST['id_servicio']) ? $_POST['id_servicio'] : null;
    
        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();
    
            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM contrato_servicio WHERE id_servicio = :id";
                $stmt = $dbconn->prepare($sql);
    
                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El contrato de servicio con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el contrato de servicio. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un contrato de servicio válido.</h3>";
        }
    }
    else if (isset($_POST['eliminar5'])) {
        $idSeleccionado = isset($_POST['id_medidor']) ? $_POST['id_medidor'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM medidor WHERE id_medidor = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El medidor con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el medidor. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un medidor válido.</h3>";
        }
    }
    else if (isset($_POST['eliminar6'])) {
        $idSeleccionado = isset($_POST['id_lectura']) ? $_POST['id_lectura'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM lectura_medidor WHERE id_lectura = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>La lectura con ID $idSeleccionado fue eliminada exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar la lectura. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione una lectura válida.</h3>";
        }
    }
    else if (isset($_POST['eliminar7'])) {
        $idSeleccionado = isset($_POST['id_factura']) ? $_POST['id_factura'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM factura WHERE id_factura = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>La factura con ID $idSeleccionado fue eliminada exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar la factura. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione una factura válida.</h3>";
        }
    }
    else if (isset($_POST['eliminar8'])) {
        $idSeleccionado = isset($_POST['id_pago']) ? $_POST['id_pago'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM pagos WHERE id_pago = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El pago con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el pago. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un pago válido.</h3>";
        }
    }
    else if (isset($_POST['eliminar9'])) {
        $idSeleccionado = isset($_POST['idre']) ? $_POST['idre'] : null;

        if ($idSeleccionado) {
            $conexionBD = new ConexionBD();
            $dbconn = $conexionBD->conexionBD();

            if (!$dbconn) {
                echo "ERROR, NO SE PUDO CONECTAR A LA BASE DE DATOS";
            } else {
                $sql = "DELETE FROM reporte_servicio WHERE id_reporte = :id";
                $stmt = $dbconn->prepare($sql);

                $stmt->bindParam(':id', $idSeleccionado, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='font-bold'>El reporte con ID $idSeleccionado fue eliminado exitosamente.</h2>";
                    echo '</form>';
                } else {
                    echo '<form id="miFormulario" action="" method="post">';
                    echo "<h2 class='text-black-600 font-bold'>Error al eliminar el reporte. Verifique las dependencias o restricciones.</h2>";
                    echo '</form>';
                }
            }
        } else {
            echo "<h3 class='text-black-600 font-bold'>Por favor, seleccione un reporte válido.</h3>";
        }
    }
}