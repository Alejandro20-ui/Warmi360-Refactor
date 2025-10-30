<?php
$base_url = '';
?>

<header id="header" class="bg-white/80 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 shadow-sm">
  <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
    
    <!-- Logo -->
    <a href="<?= $base_url ?>/?view=user" class="text-2xl font-bold text-text-dark font-serif flex items-center">
      <img src="<?= $base_url ?>/images/warmilogo.png" alt="Logo WARMI 360" class="rounded-2xl w-24">
    </a>

    <!-- Menú principal -->
    <div class="hidden lg:flex items-center space-x-8">
      <a href="<?= $base_url ?>/?view=user" class="text-primary font-bold transition duration-300">Mi Bienestar</a>
      <a href="<?= $base_url ?>/?view=mis-articulos" class="text-text-dark hover:text-primary transition duration-300">Mis Artículos</a>
      <a href="<?= $base_url ?>/?view=mis-planes" class="text-text-dark hover:text-primary transition duration-300">Mis Planes</a>
      <a href="<?= $base_url ?>/?view=mis-evidencias" class="text-text-dark hover:text-primary transition duration-300">Mis Evidencias</a>
    </div>

    <!-- Dropdown Perfil -->
    <div class="hidden lg:flex items-center space-x-4">
      <div class="relative profile-btn">
        <button class="flex items-center gap-2 text-text-dark font-semibold hover:text-primary transition duration-300">
          <img src="https://placehold.co/40x40/aa8dca/FFFFFF?text=U" alt="Perfil" class="w-10 h-10 rounded-full border-2 border-primary">
          <span><?= $_SESSION['nombre'] ?? 'Usuaria' ?></span>
          <i class="fas fa-chevron-down text-xs"></i>
        </button>

        <!-- Menú desplegable -->
        <div class="profile-dropdown glassmorphism-card p-4 rounded-xl shadow-lg w-48">
          <a href="<?= $base_url ?>/?view=configuracion" class="block px-4 py-2 hover:bg-background-light rounded-lg">Configuración</a>
          <div class="border-t border-secondary my-2"></div>
          <a href="<?= $base_url ?>/?view=main" class="block px-4 py-2 text-red-500 hover:bg-background-light rounded-lg">Cerrar Sesión</a>
        </div>
      </div>
    </div>

    <!-- Botón móvil -->
    <button id="mobile-menu-button" class="lg:hidden text-text-dark focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>

  </nav>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="hidden lg:hidden px-6 pb-4 space-y-2 bg-white/95 backdrop-blur-md">
    <a href="<?= $base_url ?>/?view=usuaria" class="block text-primary font-bold transition duration-300">Mi Bienestar</a>
    <a href="<?= $base_url ?>/?view=mis-articulos" class="block text-text-dark hover:text-primary transition duration-300">Mis Artículos</a>
    <a href="<?= $base_url ?>/?view=mis-planes" class="block text-text-dark hover:text-primary transition duration-300">Mis Planes</a>
    <a href="<?= $base_url ?>/?view=mis-evidencias" class="block text-text-dark hover:text-primary transition duration-300">Mis Evidencias</a>
    <div class="border-t border-gray-200 my-4"></div>
    <a href="<?= $base_url ?>/?view=configuracion" class="block text-text-dark font-semibold py-2">Configuración</a>
    <a href="<?= $base_url ?>/?view=main" class="block text-red-500 font-semibold py-2">Cerrar Sesión</a>
  </div>
</header>

<!-- Script para menú móvil -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const menuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const profileBtn = document.querySelector(".profile-btn");
    const dropdown = document.querySelector(".profile-dropdown");

    // Toggle menú móvil
    menuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });

    // Dropdown de perfil
    profileBtn.addEventListener("click", () => {
      dropdown.classList.toggle("active");
    });
  });
</script>

<style>
  .profile-dropdown {
    display: none;
    position: absolute;
    top: 3.5rem;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    z-index: 50;
  }

  .profile-dropdown.active {
    display: block;
    animation: fadeIn 0.3s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
