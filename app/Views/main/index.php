
<main class="mt-24">

    <!-- HERO -->
<section class="hero-background-image text-white pt-40 pb-32 md:pt-48 md:pb-40 overflow-hidden relative"
    style="background-image: url('https://s.france24.com/media/display/2f1603b2-618a-11ea-b917-005056a98db9/w:1280/p:16x9/MOBILISATION.jpg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-[rgba(76,53,88,0.6)] z-10"></div>
    <div class="container mx-auto px-6 relative z-20">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-serif font-bold leading-tight mb-4">Tu seguridad, tu voz, tu comunidad.</h1>
            <p class="text-lg md:text-xl text-white/90 mb-8">WARMI 360 es una app creada por y para mujeres peruanas. Conecta, protege y empodera.</p>
            <a href="#que-es" class="bg-secondary text-text-dark py-3 px-8 rounded-full font-bold text-lg hover:bg-background-light transition duration-300 shadow-lg inline-block">Descubre cómo funciona</a>
        </div>
    </div>
</section>


    <!-- ¿Qué es WARMI 360? -->
    <section id="que-es" class="py-24 bg-background-light">
        <div class="container mx-auto px-6 md:flex items-center gap-10">
            <div class="w-full md:w-1/2 mb-8 md:mb-0 text-center">
                <img src="<?= $base_url ?>/images/warmilogo.png" alt="Logo WARMI 360" class="rounded-2xl w-full max-w-[18rem] mx-auto">
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-6">¿Qué es WARMI 360?</h2>
                <p class="text-text-muted leading-relaxed mb-4 text-justify">
                    WARMI 360 es una plataforma digital diseñada para fortalecer el bienestar, la seguridad emocional y la protección de mujeres peruanas. 
                </p>
                <p class="text-text-muted leading-relaxed text-justify">
                    A través de un ecosistema que integra tecnología, cultura y sororidad, ofrecemos herramientas accesibles y empáticas para el autocuidado, la conexión con redes de apoyo y la gestión de situaciones de riesgo.
                </p>
            </div>
        </div>
    </section>

    <!-- EQUIPO -->
<section id="equipo" class="py-24 bg-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-12">Conoce al Equipo Detrás de WARMI 360</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $equipo = [
                [
                    "nombre" => "Leidy",
                    "rol" => "Líder de Proyecto",
                    "descripcion" => "Líder de proyecto y diseñadora estratégica. Encargada de la página web.",
                    "img" => "https://media.licdn.com/dms/image/v2/D4E35AQEGnkaUyeCixg/profile-framedphoto-shrink_400_400/B4EZiQjK1jGUAc-/0/1754771795708?e=1761843600&v=beta&t=Kx4uAZ7muoLg0w9aBUFRMwP2qiQQzgfHbqAZ6oUHZig"
                ],
                [
                    "nombre" => "Lynn",
                    "rol" => "Desarrolladora Desktop",
                    "descripcion" => "Desarrolladora de la plataforma de escritorio.",
                    "img" => "https://media.licdn.com/dms/image/v2/D4E35AQG1cVEX3g99hQ/profile-framedphoto-shrink_400_400/B4EZki9jtSGUAc-/0/1757228186690?e=1761843600&v=beta&t=jGkoC_qgflDhMLb4bIGTTYDKbp2m3_0SbPS6GKFCb9U"
                ],
                [
                    "nombre" => "Alejandro",
                    "rol" => "Co-creador App Móvil",
                    "descripcion" => "Co-creador de la app móvil WARMI360.",
                    "img" => "https://media.licdn.com/dms/image/v2/D5603AQGe2UsnqA5nNg/profile-displayphoto-scale_400_400/B56Zl0uHXkKAAg-/0/1758599871758?e=1762992000&v=beta&t=RJip9punrkU7JcAqZrr7qVc-WpzCLqANVTO-xgZ3QMc"
                ],
                [
                    "nombre" => "Alyssa",
                    "rol" => "Co-creadora App Móvil",
                    "descripcion" => "Co-creadora de la app móvil WARMI360.",
                    "img" => "https://media.licdn.com/dms/image/v2/D4D35AQEqvHNBtE_baQ/profile-framedphoto-shrink_400_400/B4DZeE.B_jHkAc-/0/1750282543407?e=1761843600&v=beta&t=rgWF9Kja2QgsZf7YE2Nq2s7b5AT4dNMJVXOXYJYwSiU"
                ],
            ];
            foreach ($equipo as $m): ?>
                <div class="team-member text-center bg-background-light rounded-2xl shadow-lg p-6">
                    <img src="<?= $m['img'] ?>" alt="<?= $m['nombre'] ?>" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow-lg">
                    <h4 class="font-bold text-lg text-text-dark"><?= $m['nombre'] ?></h4>
                    <p class="text-text-muted text-sm mb-2"><?= $m['rol'] ?></p>
                    <p class="text-text-muted text-sm italic"><?= $m['descripcion'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


    <!-- PILARES -->
    <section id="pilares" class="py-24 bg-background-light">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-12">Nuestros Pilares de Protección</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $pilares = [
                    ["icon" => "fa-bell", "titulo" => "Botón de Emergencia", "texto" => "Envía alertas con tu ubicación a contactos de confianza y centros de ayuda."],
                    ["icon" => "fa-map-marked-alt", "titulo" => "Mapa Seguro", "texto" => "Identifica zonas seguras y rutas recomendadas en tiempo real."],
                    ["icon" => "fa-book-open", "titulo" => "Educación Integral", "texto" => "Accede a contenidos sobre derechos, salud emocional y empoderamiento."],
                    ["icon" => "fa-users", "titulo" => "Comunidad Activa", "texto" => "Conecta con otras mujeres, comparte experiencias y recibe apoyo."]
                ];
                foreach ($pilares as $p): ?>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition card-hover">
                        <i class="fas <?= $p['icon'] ?> fa-3x text-primary mb-6"></i>
                        <h3 class="font-bold text-xl mb-2 text-text-dark"><?= $p['titulo'] ?></h3>
                        <p class="text-text-muted text-sm"><?= $p['texto'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

   <!-- TIENDA - Artículos inteligentes (imágenes desde URLs con fallback local) -->
<section id="tienda" class="py-24 bg-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-8">Nuestros Artículos Inteligentes</h2>
        <p class="text-lg text-text-muted mb-12 max-w-2xl mx-auto">Seguridad y estilo en una sola pieza. Elige el diseño que resuena contigo.</p>

        <div class="grid md:grid-cols-3 gap-10">
            <?php
            $articulos = [
                [
                    "nombre" => "Llavero",
                    "precio" => "S/ 50.00",
                    "img_url" => "https://scontent.flim2-1.fna.fbcdn.net/v/t39.30808-6/571109467_122115608246995175_7845623106691367822_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_ohc=KujOYyzbqmAQ7kNvwHyN9c1&_nc_oc=Adlv33izrFebLwUW9xOyQsP3kr7nXdy24JGHxV9f_AZkr1lqEMW7Uwt0nWtK7OYbXuQ&_nc_zt=23&_nc_ht=scontent.flim2-1.fna&_nc_gid=_BMBgpqK2NUCd9YEH8RBmA&oh=00_Afc2TaF-W3nlo9QuS_TcRKS1gBeJh4sgGgByYvF96r0gtA&oe=68FF4B8E",
                    "descripcion" => "Inspirado en la energía femenina y los ciclos de la naturaleza.",
                    "local_img" => "llavero.jpg"
                ],
                [
                    "nombre" => "Collar",
                    "precio" => "S/ 80.00",
                    "img_url" => "https://scontent.flim2-2.fna.fbcdn.net/v/t39.30808-6/570208380_122115608774995175_4614461980498422310_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=hSiATNqhqe4Q7kNvwEZ5fh8&_nc_oc=AdmITEcvE0fBivOUJ23hLXb8EW98BSjREO57ZN1lJbt7l7E3rCsxX7RcD83xYuS8t8A&_nc_zt=23&_nc_ht=scontent.flim2-2.fna&_nc_gid=Kf2_sq7WdxnzVS9fSWpetg&oh=00_AfeyWdc14vu8-bkEqe2BBNNBbzG8Kg_Mu04PP7XXlutKVg&oe=68FF6597",
                    "descripcion" => "Un símbolo de fuerza, energía y el poder de renacer cada día.",
                    "local_img" => "collar.jpg"
                ],
                [
                    "nombre" => "Ganchito de cabello",
                    "precio" => "S/ 30.00",
                    "img_url" => "https://scontent.flim26-1.fna.fbcdn.net/v/t39.30808-6/569363821_122115608864995175_4451652342889721233_n.jpg?stp=dst-jpg_s590x590_tt6&_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=X4WgcWqjKyIQ7kNvwFy1uWJ&_nc_oc=AdnuIHLLgLSplBsH-VFZhkZdiCpB3pp6Zx0uNuQnjAgkol7mU1fzswnc8DY9qhO-so8&_nc_zt=23&_nc_ht=scontent.flim26-1.fna&_nc_gid=KsF6tzduOiM-R-9yk_7_Mg&oh=00_Afek58XrFl2A5GUlmHoDnnh1l2bRQUv10LAWordOie01Eg&oe=68FF6D6C",
                    "descripcion" => "Representa el arraigo, la estabilidad y la conexión con nuestras raíces.",
                    "local_img" => "ganchito.jpg"
                ],
            ];

            foreach ($articulos as $a):
                // ruta local de fallback (en app/public/images/)
                $fallback = $base_url . '/images/' . $a['local_img'];
            ?>
                <div class="bg-background-light rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img
                        src="<?= $a['img_url'] ?>"
                        alt="<?= htmlspecialchars($a['nombre']) ?>"
                        class="w-full h-64 object-cover"
                        onerror="this.onerror=null;this.src='<?= $fallback ?>';"
                    >
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-text-dark"><?= htmlspecialchars($a['nombre']) ?></h3>
                        <p class="text-text-muted mb-4 text-sm"><?= htmlspecialchars($a['descripcion']) ?></p>
                        <p class="text-2xl font-serif font-bold text-primary"><?= htmlspecialchars($a['precio']) ?></p>
                        <a href="#" class="mt-4 inline-block bg-primary text-white py-2 px-6 rounded-full font-semibold hover:bg-primary-light transition">Añadir al Carrito</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- 🌙 CONOCE A LUNA -->
<!-- Conoce a Luna Section -->
<section id="luna-demo" class="py-24 bg-[#2a1b3d] text-white">
    <div class="container mx-auto px-6 section-image-right md:flex">
        <div class="text-container w-full md:w-1/2 md:pr-8 reveal text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Conoce a Luna, tu Asistente Personal</h2>
            <p class="text-lg text-white/80 mb-6">
                Luna no es solo un chatbot, es tu compañera de bienestar. Está diseñada para escucharte, ofrecerte recursos de autocuidado y conectarte con la ayuda que necesitas, siempre con empatía.
            </p>
            <a href="#" onclick="toggleChatbot(); return false;" class="bg-primary-light text-text-dark py-3 px-8 rounded-full font-semibold hover:bg-secondary transition inline-block">
                Habla con Luna
            </a>
        </div>
        <div class="image-container w-full md:w-1/2 reveal" style="transition-delay: 0.3s;">
            <div class="glassmorphism-card-dark p-6 rounded-2xl shadow-xl bg-white/10 backdrop-blur-sm">
                <div class="h-96 flex flex-col space-y-4 overflow-y-auto p-4 bg-primary-light/10 rounded-lg" id="chat-simulation">
                    <!-- Chat simulation -->
                    <div class="chat-bubble flex justify-start mb-3 visible" style="transition-delay: 1s;">
                        <div class="bg-secondary text-text-dark p-3 rounded-lg max-w-xs shadow-md">
                            Hola, soy Luna. ¿Cómo te sientes hoy?
                        </div>
                    </div>
                    <div class="chat-bubble flex justify-end mb-3 visible" style="transition-delay: 2.5s;">
                        <div class="bg-primary text-white p-3 rounded-lg max-w-xs shadow-md">
                            Me siento un poco ansiosa...
                        </div>
                    </div>
                    <div class="chat-bubble flex justify-start mb-3 visible" style="transition-delay: 4s;">
                        <div class="bg-secondary text-text-dark p-3 rounded-lg max-w-xs shadow-md">
                            Entiendo. A veces ayuda respirar profundo. ¿Te gustaría probar un ejercicio de respiración guiada?
                        </div>
                    </div>
                    <div class="chat-bubble flex justify-end mb-3 visible" style="transition-delay: 2.5s;">
                        <div class="bg-primary text-white p-3 rounded-lg max-w-xs shadow-md">
                            Sí, por favor.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- PLANES -->
    <section id="planes" class="py-24 bg-background-light">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-12">Elige tu Plan WARMI 360</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <?php
                $planes = [
                    ["nombre" => "Plan Gratuito", "precio" => "S/ 0.00 / mes", "beneficios" => ["Acceso a Comunidad Básica", "Contenido Educativo Limitado"]],
                    ["nombre" => "Plan Guardiana", "precio" => "S/ 5.00 / mes", "beneficios" => ["Monitoreo de Alertas 24/7", "Red de Confianza Ilimitada", "Comunidad Básica"]],
                    ["nombre" => "Plan WARMI 360", "precio" => "S/ 10.00 / mes", "beneficios" => ["Todo del Plan Guardiana", "Línea de Apoyo Psicológico", "Talleres Virtuales"]]
                ];
                foreach ($planes as $p): ?>
                    <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                        <h3 class="text-2xl font-bold text-text-dark mb-2"><?= $p['nombre'] ?></h3>
                        <p class="text-3xl font-bold text-primary mb-6"><?= $p['precio'] ?></p>
                        <ul class="text-text-muted text-sm space-y-2 mb-6">
                            <?php foreach ($p['beneficios'] as $b): ?>
                                <li>✅ <?= $b ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="#" class="bg-primary text-white py-2 px-6 rounded-full hover:bg-primary-light transition">Seleccionar</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- EVENTOS -->
    <section id="eventos" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-center mb-12">Próximos Eventos</h2>
            <div class="max-w-3xl mx-auto space-y-8">
                <div class="flex items-start bg-background-light p-6 rounded-2xl shadow-lg">
                    <div class="bg-primary text-white rounded-lg p-4 text-center mr-6">
                        <span class="block text-2xl font-bold">16</span>
                        <span class="block text-sm uppercase">Nov</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-text-dark mb-1">Taller de Defensa Emocional</h3>
                        <p class="text-text-muted">Aprende técnicas para gestionar tus emociones y fortalecer tu resiliencia.</p>
                    </div>
                </div>
                <div class="flex items-start bg-background-light p-6 rounded-2xl shadow-lg">
                    <div class="bg-primary text-white rounded-lg p-4 text-center mr-6">
                        <span class="block text-2xl font-bold">23</span>
                        <span class="block text-sm uppercase">Nov</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-text-dark mb-1">Lanzamiento en Comunidades Rurales</h3>
                        <p class="text-text-muted">Llevamos WARMI 360 a nuevas comunidades para ampliar nuestro impacto.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- VOCES DE NUESTRA COMUNIDAD -->
    <section id="testimonios" class="py-24 bg-background-light text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-12">Voces de Nuestra Comunidad</h2>
            <div class="grid md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                <blockquote class="bg-white p-8 rounded-2xl shadow-lg">
                    <i class="fas fa-quote-left fa-2x text-primary-light mb-4"></i>
                    <p class="text-lg text-text-muted italic mb-4">“WARMI 360 me ayudó a sentirme acompañada en momentos difíciles. Es más que una app, es una red de esperanza.”</p>
                    <cite class="font-semibold text-text-dark">- María G., Usuaria de WARMI 360</cite>
                </blockquote>
                <blockquote class="bg-white p-8 rounded-2xl shadow-lg">
                    <i class="fas fa-quote-left fa-2x text-primary-light mb-4"></i>
                    <p class="text-lg text-text-muted italic mb-4">“Gracias a WARMI 360 pude pedir ayuda sin miedo. Hoy me siento más segura y empoderada.”</p>
                    <cite class="font-semibold text-text-dark">- Ana R., Miembro de la Comunidad</cite>
                </blockquote>
            </div>
        </div>
    </section>

</main>
