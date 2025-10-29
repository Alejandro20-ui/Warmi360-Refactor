<section class="pt-32 bg-background-light text-text-dark font-sans">
  <!-- Hero Section -->
  <section class="cta-gradient-bg text-white pt-20 pb-24 overflow-hidden">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-6xl font-serif font-bold leading-tight mb-4 reveal">Buzón de Consultas</h1>
      <p class="text-lg md:text-xl text-white/80 mb-8 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">
        Tu voz es importante. Déjanos tu queja, reclamo o sugerencia de forma segura y anónima.
      </p>
    </div>
  </section>

  <!-- Sección de Formulario -->
  <section class="py-24">
    <div class="container mx-auto px-6 max-w-2xl">
      <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal relative overflow-hidden">
        
        <!-- Paso 1: Triage -->
        <div id="form-step-1" class="form-step visible text-center">
          <h2 class="text-3xl font-serif font-bold text-text-dark mb-6">¿Cómo podemos ayudarte?</h2>
          <p class="text-text-muted mb-8">Selecciona el motivo de tu consulta para dirigirte al formulario correcto.</p>
          <div class="space-y-4">
            <button onclick="showFormStep(2, 'problema')" class="w-full text-left p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 flex items-center">
              <i class="fas fa-robot text-primary text-2xl mr-4"></i>
              <div>
                <span class="font-semibold text-text-dark">Problema con Luna (IA)</span>
                <p class="text-sm text-text-muted">Luna no pudo resolver mi consulta o busco más detalles.</p>
              </div>
            </button>
            <button onclick="showFormStep(2, 'asesor')" class="w-full text-left p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 flex items-center">
              <i class="fas fa-user-headset text-primary text-2xl mr-4"></i>
              <div>
                <span class="font-semibold text-text-dark">Contactar con un Asesor</span>
                <p class="text-sm text-text-muted">Necesito hablar con una persona del equipo de soporte.</p>
              </div>
            </button>
            <button onclick="showFormStep(2, 'sugerencia')" class="w-full text-left p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 flex items-center">
              <i class="fas fa-lightbulb-on text-primary text-2xl mr-4"></i>
              <div>
                <span class="font-semibold text-text-dark">Queja, Reclamo o Sugerencia</span>
                <p class="text-sm text-text-muted">Quiero reportar un problema, una queja o dar una idea.</p>
              </div>
            </button>
          </div>
        </div>

        <!-- Paso 2: Formulario -->
        <div id="form-step-2" class="form-step hidden">
          <h2 id="form-title" class="text-3xl font-serif font-bold text-text-dark mb-6">Detalla tu consulta</h2>
          <form id="consulta-form" class="space-y-6">
            <input type="hidden" id="consulta-tipo" name="tipo">
            
            <div>
              <label for="categoria" class="block text-sm font-semibold text-text-muted mb-2">Categoría</label>
              <select id="categoria" name="categoria" class="w-full p-3 rounded-lg border border-secondary bg-white/50 focus:outline-none focus:ring-2 focus:ring-primary text-text-dark">
                <option value="sugerencia">Sugerencia</option>
                <option value="queja">Queja</option>
                <option value="reclamo">Reclamo</option>
                <option value="problema_tecnico">Problema Técnico (App)</option>
                <option value="problema_hardware">Problema con Dije (Hardware)</option>
              </select>
            </div>

            <div>
              <label for="mensaje" class="block text-sm font-semibold text-text-muted mb-2">Mensaje</label>
              <textarea id="mensaje" name="mensaje" rows="6" placeholder="Describe tu consulta con el mayor detalle posible..." required class="w-full p-3 rounded-lg border border-secondary bg-white/50 focus:outline-none focus:ring-2 focus:ring-primary text-text-dark placeholder-text-muted"></textarea>
            </div>

            <div>
              <label class="block text-sm font-semibold text-text-muted mb-2">Adjuntar Imagen (Opcional)</label>
              <label for="file-upload" class="file-upload-btn">
                <i class="fas fa-paperclip mr-2"></i> Seleccionar archivo...
              </label>
              <input type="file" id="file-upload" name="file" class="hidden" accept="image/*">
              <span id="file-name" class="text-text-muted text-sm ml-4">Ningún archivo seleccionado.</span>
            </div>

            <div class="border-t border-secondary pt-6">
              <label class="flex items-center">
                <input type="checkbox" id="anonimo-checkbox" class="h-5 w-5 text-primary rounded border-secondary focus:ring-primary" checked>
                <span class="ml-3 text-text-muted">Deseo enviar esta consulta de forma anónima.</span>
              </label>
            </div>

            <div id="datos-opcionales" class="hidden space-y-4">
              <div>
                <label for="nombre" class="block text-sm font-semibold text-text-muted mb-2">Nombre (Opcional)</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" class="w-full p-3 rounded-lg border border-secondary bg-white/50 focus:outline-none focus:ring-2 focus:ring-primary text-text-dark placeholder-text-muted">
              </div>
              <div>
                <label for="email" class="block text-sm font-semibold text-text-muted mb-2">Correo (Opcional)</label>
                <input type="email" id="email" name="email" placeholder="tu@correo.com (para seguimiento)" class="w-full p-3 rounded-lg border border-secondary bg-white/50 focus:outline-none focus:ring-2 focus:ring-primary text-text-dark placeholder-text-muted">
              </div>
            </div>

            <div class="flex gap-4 pt-4">
              <button type="button" onclick="showFormStep(1)" class="w-1/3 bg-gray-300 text-text-dark py-3 px-6 rounded-full font-bold hover:bg-gray-400 transition">Volver</button>
              <button type="submit" class="w-2/3 bg-primary text-white py-3 px-6 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Enviar Consulta</button>
            </div>
          </form>
        </div>

        <!-- Paso 3: Confirmación -->
        <div id="form-step-3" class="form-step hidden text-center">
          <i class="fas fa-check-circle text-7xl text-primary mb-6"></i>
          <h2 class="text-3xl font-serif font-bold text-text-dark mb-6">¡Consulta Enviada!</h2>
          <p class="text-text-muted mb-8">Gracias por tu mensaje. Hemos recibido tu consulta. Tu opinión es fundamental para que WARMI 360 siga mejorando.</p>
          <button type="button" onclick="showFormStep(1)" class="bg-primary text-white py-3 px-8 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Enviar otra consulta</button>
        </div>
      </div>
    </div>
  </section>
</section>

<script>
  // Control de pasos
  const step1 = document.getElementById('form-step-1');
  const step2 = document.getElementById('form-step-2');
  const step3 = document.getElementById('form-step-3');
  const formTitle = document.getElementById('form-title');
  const consultaTipoInput = document.getElementById('consulta-tipo');
  const consultaForm = document.getElementById('consulta-form');
  const anonimoCheckbox = document.getElementById('anonimo-checkbox');
  const datosOpcionales = document.getElementById('datos-opcionales');
  const fileUploadInput = document.getElementById('file-upload');
  const fileNameSpan = document.getElementById('file-name');

  function showFormStep(stepNum, tipo = '') {
    [step1, step2, step3].forEach(step => {
      step.classList.add('hidden');
      step.classList.remove('visible');
    });

    if (stepNum === 1) {
      step1.classList.add('visible');
      consultaForm.reset();
      fileNameSpan.textContent = 'Ningún archivo seleccionado.';
      datosOpcionales.classList.add('hidden');
      anonimoCheckbox.checked = true;
    } else if (stepNum === 2) {
      consultaTipoInput.value = tipo;
      formTitle.textContent =
        tipo === 'problema' ? 'Paso 2: Describe tu problema' :
        tipo === 'asesor' ? 'Paso 2: Contacta con un Asesor' :
        'Paso 2: Detalla tu consulta';
      step2.classList.add('visible');
    } else if (stepNum === 3) {
      step3.classList.add('visible');
    }
  }

  anonimoCheckbox.addEventListener('change', () => {
    datosOpcionales.classList.toggle('hidden', anonimoCheckbox.checked);
  });

  fileUploadInput.addEventListener('change', (e) => {
    fileNameSpan.textContent = e.target.files.length > 0 ? e.target.files[0].name : 'Ningún archivo seleccionado.';
  });

  consultaForm.addEventListener('submit', (e) => {
    e.preventDefault();
    showFormStep(3);
  });
</script>
