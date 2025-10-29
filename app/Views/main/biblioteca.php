
<style>
    @keyframes gradient-animation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-gradient-bg {
        background: linear-gradient(120deg, #4C3558, #8d67b9);
        background-size: 200% 200%;
        animation: gradient-animation 10s ease infinite;
    }

    .cta-gradient-bg {
        background: linear-gradient(120deg, #8d67b9, #4C3558);
        background-size: 200% 200%;
        animation: gradient-animation 8s ease infinite;
    }

    .glassmorphism-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 1.5rem;
        transition: transform 0.3s ease-in-out;
    }

    .glassmorphism-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 25px -10px rgba(76, 53, 88, 0.25);
    }

    .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(76, 53, 88, 0.6);
        backdrop-filter: blur(10px);
        z-index: 50;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease-out;
    }

    .modal-backdrop.visible {
        opacity: 1;
        pointer-events: auto;
    }

    .modal-content {
        position: relative;
        max-width: 500px;
        width: 100%;
        display: none;
    }

    .modal-content.visible {
        display: block;
    }

    .modal-close-btn {
        position: absolute;
        top: 1rem;
        right: 1.5rem;
        font-size: 1.5rem;
        color: #6a5a7a;
        transition: transform 0.3s ease;
    }

    .modal-close-btn:hover {
        color: #4C3558;
        transform: scale(1.2);
    }

    .reveal {
        opacity: 0;
        transform: translateY(50px) scale(0.98);
        transition: opacity 0.8s cubic-bezier(0.165, 0.84, 0.44, 1), transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
</style>

<main class="pt-24 bg-background-light">

    <!-- Hero con fondo degradado animado -->
    <section class="hero-gradient-bg text-white pt-20 pb-24 overflow-hidden shadow-md">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-serif font-bold leading-tight mb-4 reveal">
                Nuestra Biblioteca
            </h1>
            <p class="text-lg md:text-xl text-white/80 mb-8 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">
                Recursos de bienestar, seguridad y empoderamiento seleccionados para ti.
            </p>
        </div>
    </section>

    <!-- Sección dinámica de recursos -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div id="recursos-container" class="space-y-16"></div>
        </div>
    </section>
</main>

<!-- Modal -->
<div id="modal-backdrop" class="modal-backdrop" onclick="closeModal(event)"></div>

<script>
    // --- DATA DE RECURSOS ---
    const recursos = {
        "Libros": [
            { titulo: "Empoderamiento Femenino", img: "https://www.penguinlibros.com/co/3213671-large_default/empoderamiento-femenino-con-los-arquetipos-zodiacales.webp", descripcion: "Guía práctica para potenciar la autoestima y la confianza." },
            { titulo: "Niñas Rebeldes: 100 Peruanas Extraordinarias", img: "https://sudaca.pe/wp-content/uploads/portada_cuentos-de-buenas-noches-para-ninas-rebeldes-100-peruanas-extraordinarias_v-600x839.jpg", descripcion: "Técnicas de atención plena para tu día a día." },
            { titulo: "Mujeres Fuera de la Caja", img: "https://sudaca.pe/wp-content/uploads/portada_mujeres-fuera-de-la-caja_carla-olivieri-600x920.jpg", descripcion: "Cómo desarrollar seguridad en ti misma en cualquier situación." },
            { titulo: "La Mujer Invisible", img: "https://sudaca.pe/wp-content/uploads/la-mujer-invisible_aurora-echevarria-perez-2-597x1024.jpg", descripcion: "Estrategias para liderar tu vida y proyectos con éxito." }
        ],
        "Revistas": [
            { titulo: "Empoderamia", img: "https://www.empoderamia.com/wp-content/uploads/2025/03/PortadaEdi50.png", descripcion: "Artículos sobre desarrollo personal y bienestar femenino." },
            { titulo: "Mujer y Vida", img: "https://pbs.twimg.com/media/EfKMJBuU8AMbC0i?format=jpg&name=medium", descripcion: "Consejos de salud, moda y crecimiento personal." },
            { titulo: "Lidera", img: "https://image.isu.pub/240301185651-8a7d0a5f970a747f866c1285a87fad67/jpg/page_1_thumb_large.jpg", descripcion: "Historias inspiradoras de mujeres líderes en el mundo." }
        ],
        "Artículos": [
            { titulo: "Derechos Femeninos", img: "https://www.expoknews.com/wp-content/uploads/2024/10/Principios-Empoderamiento-de-Mujeres.jpg", descripcion: "Todo lo que necesitas saber sobre tus derechos como mujer y cómo ejercerlos." },
            { titulo: "Salud Emocional", img: "https://mexico.unwomen.org/sites/default/files/Field%20Office%20Mexico/Imagenes/Publicaciones/2013/empoderamiento-mujeres%20jpg.jpg", descripcion: "Claves para mantener un equilibrio mental y emocional en situaciones de estrés." },
            { titulo: "Autocuidado", img: "https://www.comecso.com/wp-content/uploads/2018/02/Cartel-Final_Mujer-y-Empoderamiento-810x1252.jpg", descripcion: "Consejos prácticos para cuidarte física y emocionalmente en el día a día." }
        ]
    };

    const container = document.getElementById('recursos-container');
    const modalBackdrop = document.getElementById('modal-backdrop');

    Object.keys(recursos).forEach((categoria, i) => {
        const catTitle = document.createElement('h3');
        catTitle.textContent = categoria;
        catTitle.className = 'text-3xl font-serif font-bold text-text-dark mb-8 mt-4 reveal text-center md:text-left';
        container.appendChild(catTitle);

        const grid = document.createElement('div');
        grid.className = 'grid sm:grid-cols-2 lg:grid-cols-4 gap-8 reveal';
        container.appendChild(grid);

        recursos[categoria].forEach((item, index) => {
            const recurso = document.createElement('div');
            recurso.className = 'glassmorphism-card shadow-lg overflow-hidden reveal';
            recurso.innerHTML = `
                <img src="${item.img}" alt="${item.titulo}" class="w-full h-64 object-cover" onerror="this.src='https://placehold.co/600x400/c6b3dc/4C3558?text=Recurso';">
                <div class="p-6 text-center">
                    <h4 class="font-bold text-lg mb-2 text-text-dark">${item.titulo}</h4>
                    <p class="text-text-muted text-sm mb-4 h-16 overflow-hidden">${item.descripcion}</p>
                    <button class="bg-primary text-white py-2 px-6 rounded-full font-semibold text-sm hover:bg-primary-light transition w-full"
                            onclick="openModal('${categoria}-${index}')">Leer más</button>
                </div>
            `;
            grid.appendChild(recurso);

            const modalContent = document.createElement('div');
            modalContent.id = `modal-content-${categoria}-${index}`;
            modalContent.className = 'modal-content glassmorphism-card p-8 rounded-2xl shadow-xl';
            modalContent.innerHTML = `
                <button class="modal-close-btn" onclick="closeModal(event)">&times;</button>
                <h3 class="text-2xl font-serif font-bold text-text-dark mb-4">${item.titulo}</h3>
                <img src="${item.img}" alt="${item.titulo}" class="w-full max-h-72 object-contain rounded-xl mb-6">
                <p class="text-text-muted leading-relaxed">${item.descripcion}</p>
            `;
            modalBackdrop.appendChild(modalContent);
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    function openModal(modalType) {
        document.querySelectorAll('.modal-content').forEach(modal => modal.classList.remove('visible'));
        const modalContent = document.getElementById(`modal-content-${modalType}`);
        if (modalContent) modalContent.classList.add('visible');
        modalBackdrop.classList.add('visible');
    }

    function closeModal(event) {
        if (event.target === modalBackdrop || event.target.closest('.modal-close-btn')) {
            modalBackdrop.classList.remove('visible');
            document.querySelectorAll('.modal-content').forEach(modal => modal.classList.remove('visible'));
        }
    }
</script>
