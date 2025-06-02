<?php
require '/var/www/html/conexionBD/conexion.php';
require '/var/www/html/controller/mail_config.php';
require __DIR__ . '/../vendor/autoload.php'; // Ajusta si cambia tu estructura

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['correo'])) {
    $correo = $_POST['correo'];

    $conn = new ConexionBD();
    $pdo = $conn->conexionBD();

    // Verifica si el correo existe y obtiene el nombre del usuario
    $stmt = $pdo->prepare("SELECT usuario, nombre_completo FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreUsuario = $usuarioData['nombre_completo'];

        // Genera un token único
        $token = bin2hex(random_bytes(32));
        $stmt2 = $pdo->prepare("UPDATE usuarios SET token_recuperacion = :token WHERE correo = :correo");
        $stmt2->bindParam(':token', $token);
        $stmt2->bindParam(':correo', $correo);
        $stmt2->execute();

        // Define el enlace dependiendo del entorno
        $enlace = "http://localhost:8080/includes/recuperar_form.php?token=$token";
        if (MAIL_ENV !== 'local') {
            $enlace = "https://www.aquasoluciones.software/includes/recuperar_form.php?token=$token";
        }

        $asunto = "🔐 Recupera tu contraseña";

        $mensaje = "
        <html>
        <head>
          <style>
            body {
              font-family: Arial, sans-serif;
              background-color: #f4f4f4;
              padding: 20px;
            }
            .container {
              background-color: #ffffff;
              padding: 30px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0,0,0,0.1);
              max-width: 600px;
              margin: auto;
            }
            h2 {
              color: #333;
            }
            p {
              color: #555;
            }
            .button {
              background-color: #007BFF;
              color: white;
              padding: 12px 20px;
              text-decoration: none;
              border-radius: 5px;
              display: inline-block;
              margin-top: 20px;
            }
            .footer {
              font-size: 12px;
              color: #999;
              margin-top: 30px;
            }
          </style>
        </head>
        <body>
          <div class='container'>
            <h2>Hola, $nombreUsuario 👋</h2>
            <p>Hemos recibido una solicitud para restablecer tu contraseña.</p>
            <p>Para continuar, haz clic en el siguiente botón:</p>
            <a href='$enlace' class='button'>Restablecer contraseña</a>
            <p class='footer'>Si tú no solicitaste este cambio, ignora este mensaje.</p>
            <p class='footer'>AquaSoluciones - Tu seguridad es nuestra prioridad</p>
          </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;
            $mail->Port = MAIL_PORT;
            if (MAIL_USERNAME) {
                $mail->SMTPAuth = true;
                $mail->Username = MAIL_USERNAME;
                $mail->Password = MAIL_PASSWORD;
            }
            if (MAIL_SMTP_SECURE) {
                $mail->SMTPSecure = MAIL_SMTP_SECURE;
            }
            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            $mail->addAddress($correo);
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            $mail->send();

            if ($mail->send()) {
              // Guardar en carpeta "Enviados"
              $imapStream = imap_open(
                  '{imap.titan.email:993/ssl/novalidate-cert}Sent',
                  MAIL_USERNAME,
                  MAIL_PASSWORD
              );

              if ($imapStream) {
                  imap_append($imapStream,
                      '{imap.titan.email:993/ssl/novalidate-cert}Sent',
                      $mail->getSentMIMEMessage()
                  );
                  imap_close($imapStream);
              } else {
                  error_log('No se pudo guardar el correo en "Enviados"');
              }
          }
            echo "<script>alert('Se ha enviado un enlace de recuperación a tu correo.');window.location.href='../iniciar_sesion.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error al enviar el correo: {$mail->ErrorInfo}');window.location.href='../iniciar_sesion.php';</script>";
        }
    } else {
        echo "<script>alert('El correo no existe en nuestra base de datos.');window.location.href='../iniciar_sesion.php';</script>";
    }
}
?>
