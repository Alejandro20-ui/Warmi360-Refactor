<?php
$base_url = "http://warmi360-refactor-production.up.railway.app/public";
?>

<style>
    @keyframes gradient-animation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-gradient-bg {
        background: linear-gradient(120deg, #4C3558, #8d67b9, #aa8dca);
        background-size: 200% 200%;
        animation: gradient-animation 8s ease infinite;
    }

    .card-hover {
        transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s;
    }
    .card-hover:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 25px 35px -10px rgba(76, 53, 88, 0.2), 0 10px 15px -5px rgba(76, 53, 88, 0.1);
    }

    .reveal {
        opacity: 0;
        transform: translateY(50px) scale(0.98);
        transition: opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1),
                    transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .glassmorphism-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 1.5rem;
    }
</style>

<main class="text-text-dark font-sans">

    <!-- Hero Section -->
    <section class="hero-gradient-bg text-white pt-40 pb-24 overflow-hidden relative">
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-serif font-bold leading-tight mb-4 reveal">
                Nuestra Agenda de Eventos
            </h1>
            <p class="text-lg md:text-xl text-white/80 mb-8 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">
                Conecta, aprende y crece con nuestra comunidad en los próximos talleres, charlas y encuentros.
            </p>
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[#4C3558]/20"></div>
    </section>

    <!-- Próximos Eventos -->
    <section id="eventos-futuros" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-2 reveal">
                    Próximos Eventos
                </h2>
                <p class="text-lg text-text-muted max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">
                    ¡Reserva la fecha! Estos son los encuentros que estamos preparando para ti.
                </p>
            </div>

            <div class="max-w-3xl mx-auto space-y-8">
                <div class="glassmorphism-card p-6 rounded-2xl shadow-lg flex items-start reveal" style="transition-delay: 0.3s;">
                    <div class="flex-shrink-0 bg-primary text-white rounded-lg p-4 text-center mr-6">
                        <span class="block text-2xl font-bold">16</span>
                        <span class="block text-sm uppercase">Sep</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-text-dark mb-1">Taller de Defensa Emocional</h3>
                        <p class="text-text-muted">Aprende técnicas para gestionar tus emociones y fortalecer tu resiliencia en Ica.</p>
                        <a href="javascript:void(0)" onclick="openModal('inscripcion-taller')" class="text-primary font-semibold text-sm mt-2 inline-block hover:underline">
                            Inscríbete aquí &rarr;
                        </a>
                    </div>
                </div>

                <div class="glassmorphism-card p-6 rounded-2xl shadow-lg flex items-start reveal" style="transition-delay: 0.5s;">
                    <div class="flex-shrink-0 bg-primary text-white rounded-lg p-4 text-center mr-6">
                        <span class="block text-2xl font-bold">23</span>
                        <span class="block text-sm uppercase">Sep</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-text-dark mb-1">Lanzamiento en Comunidades Rurales</h3>
                        <p class="text-text-muted">Llevamos WARMI 360 a nuevas comunidades para ampliar nuestro impacto.</p>
                        <a href="javascript:void(0)" onclick="openModal('info-lanzamiento')" class="text-primary font-semibold text-sm mt-2 inline-block hover:underline">
                            Conoce más &rarr;
                        </a>
                    </div>
                </div>

                <div class="glassmorphism-card p-6 rounded-2xl shadow-lg flex items-start reveal" style="transition-delay: 0.7s;">
                    <div class="flex-shrink-0 bg-primary text-white rounded-lg p-4 text-center mr-6">
                        <span class="block text-2xl font-bold">05</span>
                        <span class="block text-sm uppercase">Oct</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-text-dark mb-1">Webinar: Finanzas para Emprendedoras</h3>
                        <p class="text-text-muted">Virtual. Aprende a gestionar tu negocio y alcanzar la independencia económica.</p>
                        <a href="javascript:void(0)" onclick="openModal('inscripcion-webinar')" class="text-primary font-semibold text-sm mt-2 inline-block hover:underline">
                            Inscríbete aquí &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Eventos Pasados -->
    <section id="eventos-pasados" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-text-dark mb-2 reveal">
                    Revive Nuestros Eventos
                </h2>
                <p class="text-lg text-text-muted max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">
                    Mira el impacto y los momentos que hemos compartido como comunidad.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="glassmorphism-card rounded-2xl shadow-lg card-hover overflow-hidden reveal" style="transition-delay: 0.3s;">
                    <img src="https://revistaseguridad360.com/wp-content/uploads/2022/03/seguridad-digital-1.jpg" alt="Taller de Seguridad Digital" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <span class="text-sm font-semibold text-text-muted">Agosto 2025</span>
                        <h3 class="font-bold text-xl my-2 text-text-dark">Taller de Seguridad Digital</h3>
                        <p class="text-text-muted text-sm mb-4">Aprendimos a protegernos en línea y a identificar riesgos digitales.</p>
                    </div>
                </div>

                <div class="glassmorphism-card rounded-2xl shadow-lg card-hover overflow-hidden reveal" style="transition-delay: 0.5s;">
                    <img src="https://tse1.mm.bing.net/th/id/OIP.Y2wLs56uJWb-9GYLPAwJdAHaEK?rs=1&pid=ImgDetMain&o=7&rm=33" alt="Charla Amor Propio" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <span class="text-sm font-semibold text-text-muted">Julio 2025</span>
                        <h3 class="font-bold text-xl my-2 text-text-dark">Charla: El Poder del Amor Propio</h3>
                        <p class="text-text-muted text-sm mb-4">Una tarde de conexión y reencuentro con nuestra fuerza interior.</p>
                    </div>
                </div>

                <div class="glassmorphism-card rounded-2xl shadow-lg card-hover overflow-hidden reveal" style="transition-delay: 0.7s;">
                    <img src="https://tse3.mm.bing.net/th/id/OIP.AhvZJ7Cx9lXc-hYY4DpDVQHaEe?w=1160&h=700&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Encuentro de Sororidad" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <span class="text-sm font-semibold text-text-muted">Junio 2025</span>
                        <h3 class="font-bold text-xl my-2 text-text-dark">Encuentro de Sororidad</h3>
                        <p class="text-text-muted text-sm mb-4">Celebramos nuestros lazos y fortalecimos nuestra red de apoyo mutuo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
    });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>
