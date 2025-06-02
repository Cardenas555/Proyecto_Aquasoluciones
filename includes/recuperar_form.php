<?php
require '/var/www/html/conexionBD/conexion.php';

$token = $_GET['token'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nueva_pass'])) {
    $nueva_pass = password_hash($_POST['nueva_pass'], PASSWORD_DEFAULT);
    $token = $_POST['token'];

    $conn = new ConexionBD();
    $pdo = $conn->conexionBD();

    $stmt = $pdo->prepare("UPDATE usuarios SET contrasena = :pass, token_recuperacion = NULL WHERE token_recuperacion = :token");
    $stmt->bindParam(':pass', $nueva_pass);
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Contraseña actualizada correctamente.');window.location.href='../iniciar_sesion.php';</script>";
    } else {
        echo "<script>alert('Token inválido o expirado.');window.location.href='../iniciar_sesion.php';</script>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restablecer contraseña</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>
<body>
  <div class="min-h-screen flex items-center justify-center relative overflow-hidden" style="background-color: #1e73e8;">
    <img alt="Fondo azul con textura de agua" class="absolute inset-0 w-full h-full object-cover" height="1080" src="../assets/imagenes/642457.jpg" width="1920"/>
    
    <div class="relative bg-[#1e73e8] bg-opacity-90 p-12 max-w-3xl w-full flex justify-center z-10">
      <div class="bg-[#ffffff80] rounded-xl p-10 max-w-lg w-full text-center shadow-xl"
           data-aos="fade-up" data-aos-duration="1000">
        <h1 class="font-serif font-bold text-2xl mb-4 text-gray-900" data-aos="zoom-in" data-aos-delay="200">
          Restablecer contraseña
        </h1>
        <p class="text-gray-900 mb-6" data-aos="fade-in" data-aos-delay="400">
          Introduce tu nueva contraseña para que puedas acceder a tu cuenta.
        </p>
        
        <form method="POST" action="" data-aos="fade-up" data-aos-delay="600">
          <div class="relative mb-6">
            <input id="nueva_pass" name="nueva_pass" placeholder="Nueva contraseña" type="password" required
                   class="w-full rounded-md p-2 text-gray-900 shadow-sm pr-10"
                   data-aos="fade-right" data-aos-delay="800"/>
            <button type="button" onclick="togglePassword()" 
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-700 hover:text-black focus:outline-none"
                    tabindex="-1" aria-label="Mostrar u ocultar contraseña">
              𓂀
            </button>
          </div>

          <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
          
          <div class="flex justify-center gap-4">
            <button type="submit" 
                    class="bg-gray-900 text-white px-5 py-2 rounded-md hover:bg-gray-800 transition" 
                    data-aos="zoom-in" data-aos-delay="1000">
              Actualizar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Script para AOS y Mostrar/Ocultar Contraseña -->
  <script>
    AOS.init();

    function togglePassword() {
      const input = document.getElementById('nueva_pass');
      input.type = input.type === 'password' ? 'text' : 'password';
    }
  </script>
</body>
</html>
