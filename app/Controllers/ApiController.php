<?php include __DIR__ . '/../../shared/header-main.php'; ?>

<main>
  <!-- Video de fondo -->
  <video autoplay muted loop playsinline class="fixed top-0 left-0 w-full h-full object-cover -z-10">
    <source src="<?= $base_url ?>/videos/VideoMujer.mp4" type="video/mp4">
    Tu navegador no soporta videos en HTML5.
  </video>

  <!-- Contenedor principal -->
  <div class="register-box bg-white/10 backdrop-blur-md max-w-3xl mx-auto mt-32 p-10 rounded-2xl shadow-lg text-center text-white">
    <div class="flex justify-center items-center gap-4 mb-4">
      <img src="<?= $base_url ?>/images/corazonblanco.png" alt="Logo WARMI 360" class="w-16">
      <h2 class="text-3xl font-semibold">Registro de usuaria</h2>
    </div>
    <p class="text-lg mb-8">Completa tus datos para crear tu cuenta segura 💜</p>

    <form id="registro-form" class="text-left">
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Columna izquierda -->
        <div>
          <label class="block mb-2 font-semibold">DNI</label>
          <div class="flex gap-2">
            <input type="text" id="dni" maxlength="8" pattern="[0-9]{8}" required placeholder="Ingresa tu DNI"
              class="w-full p-3 rounded-lg bg-white/30 placeholder-white/70 focus:outline-none">
            <button type="button" id="btn-validar"
              class="bg-primary px-4 py-2 rounded-lg hover:bg-primary-light transition">Validar</button>
          </div>

          <label class="block mt-4 mb-2 font-semibold">Nombres</label>
          <input type="text" id="nombres" readonly placeholder="Se autocompletará"
            class="w-full p-3 rounded-lg bg-white/20 text-white">

          <label class="block mt-4 mb-2 font-semibold">Apellidos</label>
          <input type="text" id="apellidos" readonly placeholder="Se autocompletará"
            class="w-full p-3 rounded-lg bg-white/20 text-white">

          <label class="block mt-4 mb-2 font-semibold">Sexo</label>
          <select id="sexo" disabled class="w-full p-3 rounded-lg bg-white/20 text-white">
            <option value="Femenino">Femenino</option>
          </select>
        </div>

        <!-- Columna derecha -->
        <div>
          <label class="block mb-2 font-semibold">Correo electrónico</label>
          <input type="email" id="correo" required placeholder="ejemplo@email.com"
            class="w-full p-3 rounded-lg bg-white/30 placeholder-white/70 focus:outline-none">

          <label class="block mt-4 mb-2 font-semibold">Número de celular</label>
          <div class="flex gap-2">
            <input type="tel" id="telefono" maxlength="9" required placeholder="987654321"
              class="w-full p-3 rounded-lg bg-white/30 placeholder-white/70 focus:outline-none">
            <button type="button" id="btn-enviar-codigo"
              class="bg-primary px-4 py-2 rounded-lg hover:bg-primary-light transition">Enviar código</button>
          </div>

          <label class="block mt-4 mb-2 font-semibold">Código recibido</label>
          <div class="flex gap-2">
            <input type="text" id="codigo" maxlength="6" placeholder="Código de verificación"
              class="w-full p-3 rounded-lg bg-white/30 placeholder-white/70 focus:outline-none">
            <button type="button" id="btn-validar-sms"
              class="bg-primary px-4 py-2 rounded-lg hover:bg-primary-light transition">Validar</button>
          </div>
        </div>
      </div>

      <div class="text-center mt-8">
        <a href="<?= $base_url ?>/?view=login" class="text-secondary font-semibold hover:underline">Iniciar Sesión</a>
        <button type="submit"
          class="block mx-auto mt-4 bg-primary text-white px-8 py-3 rounded-full hover:bg-primary-light transition font-bold">
          Registrar
        </button>
      </div>
    </form>
  </div>
</main>

<!-- JS externo -->
<script>
  const base_url = "<?= $base_url ?>";
</script>
<script src="<?= $base_url ?>/js/register.js"></script>

<?php include __DIR__ . '/../../shared/footer.php'; ?>
