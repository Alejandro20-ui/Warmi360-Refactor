<main class="pt-24 bg-background-light">
    <!-- Hero Section -->
    <section class="cta-gradient-bg text-white pt-20 pb-24 overflow-hidden">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-bold leading-tight mb-2 reveal">Mis Artículos</h1>
            <p class="text-lg md:text-xl text-white/80 max-w-2xl reveal" style="transition-delay: 0.2s;">
                Gestiona tu llavero, revisa su estado y configura tus contactos de confianza.
            </p>
        </div>
    </section>

    <!-- Sección de Artículos -->
    <section class="py-12 md:py-24">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">

                <!-- Columna Izquierda: Imagen y Estado -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Imagen del Artículo -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal">
                        <h2 class="text-3xl font-serif font-bold text-text-dark mb-4 text-center">Mi Llavero</h2>
                        <img src="https://scontent.flim2-1.fna.fbcdn.net/v/t39.30808-6/571109467_122115608246995175_7845623106691367822_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_ohc=KujOYyzbqmAQ7kNvwHyN9c1&_nc_oc=Adlv33izrFebLwUW9xOyQsP3kr7nXdy24JGHxV9f_AZkr1lqEMW7Uwt0nWtK7OYbXuQ&_nc_zt=23&_nc_ht=scontent.flim2-1.fna&_nc_gid=_BMBgpqK2NUCd9YEH8RBmA&oh=00_Afc2TaF-W3nlo9QuS_TcRKS1gBeJh4sgGgByYvF96r0gtA&oe=68FF4B8E" alt="Llavero" class="w-full h-64 object-cover rounded-lg shadow-md mx-auto">
                    </div>

                    <!-- Estado del Dispositivo -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal" style="transition-delay: 0.2s;">
                        <h3 class="text-2xl font-serif font-bold text-text-dark mb-6">Estado del Dispositivo</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-3 text-text-muted font-semibold"><i class="fas fa-signal text-green-500"></i> Estado</span>
                                <span class="font-bold text-green-600">Conectado</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-3 text-text-muted font-semibold"><i class="fas fa-battery-full text-primary"></i> Batería</span>
                                <span class="font-bold text-text-dark">92%</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-3 text-text-muted font-semibold"><i class="fas fa-sync text-primary"></i> Última Sinc.</span>
                                <span class="font-bold text-text-dark">Hace 1 min</span>
                            </li>
                        </ul>
                        <button class="w-full mt-6 bg-secondary text-text-dark py-3 px-6 rounded-full font-semibold hover:bg-primary-light hover:text-white transition duration-300">
                            <i class="fas fa-bell mr-2"></i> Probar Alerta
                        </button>
                    </div>
                    
                    <!-- Ajustes Rápidos -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal" style="transition-delay: 0.4s;">
                        <h3 class="text-2xl font-serif font-bold text-text-dark mb-6">Ajustes Rápidos</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-3 text-text-muted font-semibold"><i class="fas fa-volume-mute text-primary"></i> Modo Silencioso</span>
                                <label for="toggle-silent" class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" id="toggle-silent" class="sr-only toggle-checkbox">
                                        <div class="block bg-gray-300 w-12 h-7 rounded-full transition"></div>
                                        <div class="dot toggle-label absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition"></div>
                                    </div>
                                </label>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="flex items-center gap-3 text-text-muted font-semibold"><i class="fas fa-sync text-primary"></i> Forzar Sincronización</span>
                                <button class="text-primary hover:text-primary-light text-xl"><i class="fas fa-redo-alt"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Columna Derecha -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Red de Confianza -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal" style="transition-delay: 0.3s;">
                        <h3 class="text-2xl font-serif font-bold text-text-dark mb-6">Red de Confianza Vinculada</h3>
                        <p class="text-text-muted mb-6">Estas son las personas que recibirán una alerta si activas este llavero.</p>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex flex-col items-center text-center">
                                <img src="https://placehold.co/80x80/aa8dca/FFFFFF?text=Ana" alt="Contacto 1" class="w-20 h-20 rounded-full shadow-md border-2 border-primary">
                                <span class="font-semibold text-text-dark mt-2">Ana (Mamá)</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <img src="https://placehold.co/80x80/c6b3dc/FFFFFF?text=Luis" alt="Contacto 2" class="w-20 h-20 rounded-full shadow-md border-2 border-secondary">
                                <span class="font-semibold text-text-dark mt-2">Luis (Amigo)</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <img src="https://placehold.co/80x80/e3d9ed/FFFFFF?text=Maria" alt="Contacto 3" class="w-20 h-20 rounded-full shadow-md border-2 border-secondary">
                                <span class="font-semibold text-text-dark mt-2">Maria (Vecina)</span>
                            </div>
                            <button class="w-20 h-20 rounded-full bg-background-light border-2 border-dashed border-primary text-primary flex items-center justify-center hover:bg-secondary transition">
                                <i class="fas fa-plus fa-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Historial -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal" style="transition-delay: 0.5s;">
                        <h3 class="text-2xl font-serif font-bold text-text-dark mb-6">Historial de Alertas del Llavero</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center justify-between p-4 bg-white/60 rounded-lg">
                                <div class="flex items-center gap-4">
                                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                    <div>
                                        <p class="font-semibold text-text-dark">Prueba de Alerta</p>
                                        <p class="text-xs text-text-muted">Hoy, 10:30 AM</p>
                                    </div>
                                </div>
                                <a href="#" class="text-primary text-sm font-semibold hover:underline">Ver detalles</a>
                            </li>
                            <li class="flex items-center justify-between p-4 bg-white/60 rounded-lg">
                                <div class="flex items-center gap-4">
                                    <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                                    <div>
                                        <p class="font-semibold text-text-dark">Alerta de Emergencia</p>
                                        <p class="text-xs text-text-muted">20 Oct 2025, 08:15 PM</p>
                                    </div>
                                </div>
                                <a href="#" class="text-primary text-sm font-semibold hover:underline">Ver detalles</a>
                            </li>
                            <li class="flex items-center justify-between p-4 bg-white/60 rounded-lg">
                                <div class="flex items-center gap-4">
                                    <i class="fas fa-battery-quarter text-yellow-500 text-xl"></i>
                                    <div>
                                        <p class="font-semibold text-text-dark">Alerta de Batería Baja</p>
                                        <p class="text-xs text-text-muted">18 Oct 2025, 11:00 AM</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Gestión -->
                    <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal" style="transition-delay: 0.7s;">
                        <h3 class="text-2xl font-serif font-bold text-text-dark mb-6">Gestión del Dispositivo</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <button onclick="openModal('tutorial')" class="block p-4 bg-white rounded-lg text-center hover:shadow-md transition">
                                <i class="fas fa-book-open text-primary text-2xl mb-2"></i>
                                <p class="font-semibold text-text-dark">Ver Tutorial de Uso</p>
                            </button>
                            <button onclick="openModal('reporte')" class="block p-4 bg-white rounded-lg text-center hover:shadow-md transition">
                                <i class="fas fa-tools text-primary text-2xl mb-2"></i>
                                <p class="font-semibold text-text-dark">Reportar un Problema</p>
                            </button>
                            <button class="md:col-span-2 w-full mt-4 bg-red-100 text-red-700 py-3 px-6 rounded-full font-bold hover:bg-red-200 transition duration-300">
                                <i class="fas fa-trash-alt mr-2"></i> Desvincular este Llavero
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
