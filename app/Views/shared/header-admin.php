<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$base_url = "http://warmi360-refactor-production.up.railway.app/public";

// ✅ Verificar si hay sesión y si el rol es admin (3)
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 3) {
    header("Location: $base_url/?view=login");
    exit;
}

// ✅ Datos del usuario logueado
$nombre = htmlspecialchars($_SESSION['nombres']);
$inicial = strtoupper(substr($nombre, 0, 1));
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración | WARMI 360</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-[#f6f3fa] text-[#4C3558] min-h-screen">

<!-- 🔹 HEADER ADMIN -->
<header class="bg-white/80 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 shadow-sm">
  <nav class="container mx-auto px-6 py-4 flex justify-between items-center">

    <a href="<?= $base_url ?>/?view=admin" class="flex items-center gap-3">
      <img src="<?= $base_url ?>/images/warmi360.png" alt="Logo WARMI" class="w-16 rounded-xl">
      <h1 class="text-2xl font-bold font-serif text-[#4C3558]">WARMI 360</h1>
    </a>

    <div class="flex items-center space-x-4">
      <div class="relative profile-btn">
        <button class="flex items-center gap-2 font-semibold hover:text-[#8d67b9] transition">
          <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#8d67b9] text-white font-bold">
            <?= $inicial ?>
          </div>
          <span><?= $nombre ?></span>
          <i class="fas fa-chevron-down text-xs"></i>
        </button>
        <div class="profile-dropdown absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl border border-gray-200 hidden">
          <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Configuración</a>
          <div class="border-t border-gray-200"></div>
          <a href="<?= $base_url ?>/?view=logout" class="block px-4 py-2 text-red-500 hover:bg-gray-100 rounded-b-lg">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </nav>
</header>

<script>
// Mostrar/Ocultar dropdown del perfil
document.addEventListener("click", (e) => {
  const dropdown = document.querySelector(".profile-dropdown");
  const btn = e.target.closest(".profile-btn");
  if (btn) dropdown.classList.toggle("hidden");
  else dropdown.classList.add("hidden");
});
</script>

<!-- FIN HEADER -->
<main class="pt-28 px-8">
