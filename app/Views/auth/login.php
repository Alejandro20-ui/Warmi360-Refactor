<?php
$base_url = "http://localhost/Warmi360-Refactor/public";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión | WARMI 360</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <video autoplay muted loop playsinline class="fixed inset-0 w-full h-full object-cover -z-10">
    <source src="<?= $base_url ?>/images/VideoMujer.mp4" type="video/mp4">
  </video>

  <main class="flex items-center justify-center min-h-screen">
    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 shadow-xl w-full max-w-md">
      <div class="text-center mb-6">
        <img src="<?= $base_url ?>/images/warmilogo.png" alt="Logo WARMI" class="w-20 mx-auto mb-3 rounded-lg">
        <h2 class="text-2xl font-semibold">Bienvenida a WARMI 360</h2>
        <p class="text-sm text-purple-200">Conecta, protege y empodérate 💜</p>
      </div>

      <form id="loginForm" class="space-y-5" autocomplete="off">
        <div>
          <label class="block mb-1 text-sm font-medium">Correo Electrónico</label>
          <input type="email" id="correo" name="correo" required
            class="w-full px-3 py-2 rounded-lg bg-white/20 text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>
        <div>
          <label class="block mb-1 text-sm font-medium">PIN de acceso</label>
          <input type="password" id="pin" name="pin" required
            class="w-full px-3 py-2 rounded-lg bg-white/20 text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>
        <button type="submit"
          class="w-full bg-purple-600 hover:bg-purple-700 py-2 rounded-lg font-semibold transition">Ingresar</button>
      </form>

      <p class="text-center text-sm mt-6">¿No tienes cuenta?
        <a href="<?= $base_url ?>/?view=register" class="text-purple-300 hover:underline">Regístrate aquí</a>
      </p>
    </div>
  </main>

  <script src="<?= $base_url ?>/js/login.js"></script>
</body>
</html>
