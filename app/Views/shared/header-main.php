<?php
$base_url = '';
?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WARMI 360 | Cuidarte es tu mejor defensa</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary': '#8d67b9',
            'primary-light': '#aa8dca',
            'secondary': '#c6b3dc',
            'background-light': '#e3d9ed',
            'text-dark': '#4C3558',
            'text-muted': '#6a5a7a',
          },
          fontFamily: {
            'sans': ['Poppins', 'sans-serif'],
            'serif': ['Playfair Display', 'serif'],
          },
        },
      },
    };
  </script>

  <!-- Chatbot CSS -->
  <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
</head>

<body class="text-text-dark font-sans relative">

  <!-- Header -->
  <header class="bg-white/80 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 shadow-sm">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="<?= $base_url ?>" class="flex items-center space-x-2">
        <img src="<?= $base_url ?>/images/warmilogo.png" alt="Logo WARMI 360" class="w-16 rounded-2xl">
        <span class="text-2xl font-bold text-text-dark font-serif">WARMI 360</span>
      </a>

      <div class="hidden lg:flex items-center space-x-8">
        <a href="<?= $base_url ?>/?view=main" class="hover:text-primary transition">Inicio</a>
        <a href="<?= $base_url ?>/?view=tienda" class="hover:text-primary transition">Tienda</a>
        <a href="<?= $base_url ?>/?view=biblioteca" class="hover:text-primary transition">Biblioteca</a>
        <a href="<?= $base_url ?>/?view=eventos" class="hover:text-primary transition">Eventos</a>
        <a href="<?= $base_url ?>/?view=descargar" class="hover:text-primary transition">Descargar</a>
      </div>

      <div class="hidden lg:flex items-center space-x-4">
        <a href="<?= $base_url ?>/?view=login" class="text-text-dark font-semibold hover:text-primary transition">Iniciar Sesión</a>
        <a href="<?= $base_url ?>/?view=register" class="bg-primary text-white py-2 px-6 rounded-full font-semibold hover:bg-primary-light transition">Regístrate</a>
      </div>

      <button id="mobile-menu-button" class="lg:hidden text-text-dark focus:outline-none">
        <i class="fa-solid fa-bars text-2xl"></i>
      </button>
    </nav>
  </header>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="hidden fixed top-20 left-0 w-full bg-white shadow-lg z-40">
    <ul class="flex flex-col items-center space-y-4 py-6 text-lg font-semibold">
      <li><a href="<?= $base_url ?>/?view=main" class="hover:text-primary transition">Inicio</a></li>
      <li><a href="<?= $base_url ?>/?view=tienda" class="hover:text-primary transition">Tienda</a></li>
      <li><a href="<?= $base_url ?>/?view=biblioteca" class="hover:text-primary transition">Biblioteca</a></li>
      <li><a href="<?= $base_url ?>/?view=eventos" class="hover:text-primary transition">Eventos</a></li>
      <li><a href="<?= $base_url ?>/?view=descargar" class="hover:text-primary transition">Descargar</a></li>
      <li><a href="<?= $base_url ?>/?view=login" class="text-primary font-bold">Iniciar Sesión</a></li>
      <li><a href="<?= $base_url ?>/?view=register" class="bg-primary text-white py-2 px-6 rounded-full">Regístrate</a></li>
    </ul>
  </div>

  <!-- Contenedor del chatbot (sin interferir con el DOM principal) -->
  <div id="luna-chatbot"></div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuButton = document.getElementById("mobile-menu-button");
      const mobileMenu = document.getElementById("mobile-menu");
      menuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });
    });
  </script>

  <!-- Inicialización del chatbot -->
  <script type="module">
    import { createChat } from "https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js";

    window.addEventListener("load", () => {
      const container = document.getElementById("luna-chatbot");
      if (!container) return;

      createChat({
        webhookUrl: "http://warmi360-refactor-production.up.railway.app/webhook/713a62c3-cfa4-4df7-af75-05c877ccf605/chat", // 🔹 Reemplázalo por tu URL real
        target: container, // ✅ Se monta dentro del contenedor invisible
        title: "Luna 💜",
        subtitle: "Tu asistente WARMI 360",
        avatarUrl: "<?= $base_url ?>/images/luna-avatar.png",
        theme: {
          primary: "#8d67b9",
          secondary: "#c6b3dc",
          background: "#ffffff",
        },
        initialMessages: [
          "¡Hola! Soy Luna 🌸",
          "Tu asistente en WARMI 360. ¿Cómo puedo ayudarte hoy?"
        ],
        position: "bottom-right"
      });
    });
  </script>

</body>
</html>
