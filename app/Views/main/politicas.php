
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Privacidad y Seguridad | WARMI 360</title>

    <!-- FAVICON -->
    <link rel="icon" href="<?= $base_url ?>/app/Views/usuaria/img/corazon.png" type="image/png">
    <link rel="apple-touch-icon" href="<?= $base_url ?>/app/Views/usuaria/img/corazon.png">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#8d67b9',
                        'primary-light': '#aa8dca',
                        'secondary': '#c6b3dc',
                        'background-light': '#e3d9ed',
                        'white': '#ffffff',
                        'text-dark': '#4C3558',
                        'text-muted': '#6a5a7a',
                        'dark-bg': '#4C3558',
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #ffffff; }
        .hero-gradient-bg { background: linear-gradient(120deg, #4C3558, #8d67b9); }
        .cta-gradient-bg { background: linear-gradient(120deg, #8d67b9, #4C3558); }
        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 35px -10px rgba(76, 53, 88, 0.2);
        }
        .glassmorphism-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1.5rem;
            transition: transform 0.3s ease-in-out;
        }
        .policy-list li { padding-bottom: .75rem; margin-left: 1rem; text-align: justify; }
        .policy-list li::marker { font-weight: 600; color: #4C3558; }
    </style>
</head>
<body class="text-text-dark font-sans">

<!-- Header -->

<main class="pt-24 bg-background-light">
    <section class="cta-gradient-bg text-white pt-20 pb-24">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-5xl font-serif font-bold">Políticas de Seguridad y Privacidad</h1>
            <p class="text-lg text-white/80 mt-4">Última actualización: 23 de Octubre de 2025. Tu confianza y seguridad son nuestra prioridad.</p>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="glassmorphism-card p-10 shadow-lg">
                <h2 class="text-3xl font-serif font-bold text-text-dark mb-6">Términos, Condiciones y Políticas</h2>
                <p class="text-text-muted mb-6 text-justify">Bienvenida a WARMI 360. Al registrarte y utilizar nuestros servicios (nuestra App, Dije y Sitio Web), aceptas las condiciones que rigen nuestra relación. Léelas con atención.</p>

                <!-- Aquí solo coloco parte del listado para ejemplo -->
                <ol class="policy-list list-decimal">
                    <li>Estos Términos constituyen un contrato legal vinculante entre la usuaria y WARMI 360.</li>
                    <li>Al usar el servicio confirmas que has leído y aceptado los Términos.</li>
                    <li>Si no estás de acuerdo, no debes registrarte ni usar los servicios.</li>
                    <li>Tu cuenta es personal e intransferible.</li>
                    <li>WARMI 360 no se hace responsable por accesos no autorizados a tu cuenta.</li>
                    <li>Tu información se maneja con confidencialidad y conforme a la ley de protección de datos del Perú.</li>
                    <li>WARMI 360 no comparte tus datos con terceros sin tu consentimiento.</li>
                    <li>El Dije y la App se ofrecen “tal cual” y pueden presentar interrupciones o limitaciones.</li>
                    <li>Al usar WARMI 360 aceptas nuestras políticas de privacidad y seguridad.</li>
                    <li>Para más información, contáctanos en <b>legal@warmi360.com</b>.</li>
                </ol>
            </div>
        </div>
    </section>
</main>



</body>
</html>
