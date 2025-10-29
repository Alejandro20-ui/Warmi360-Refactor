
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda y Planes | WARMI 360</title>
        <!-- FAVICON (LOGO) -->
    <link rel="icon" href="../Usuaria/img/corazon.png" type="image/png">
    <link rel="apple-touch-icon" href="../Usuaria/img/corazon.png">
    <!-- Tailwind CSS --><script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Script de Configuración de Tailwind --><script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#8d67b9', // Morado principal
                        'primary-light': '#aa8dca', // Morado claro
                        'secondary': '#c6b3dc', // Lila secundario
                        'background-light': '#e3d9ed', // Lila muy claro (fondo alternativo 1)
                        'white': '#ffffff', // Blanco (fondo alternativo 2)
                        'text-dark': '#4C3558', // Morado oscuro para texto principal
                        'text-muted': '#6a5a7a', // Gris morado para texto secundario
                        'dark-bg': '#4C3558', // Morado oscuro para fondos (e.g., Luna)
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Estilos Personalizados --><style>
        body {
            background-color: #ffffff; /* Fondo base blanco */
        }
        .cta-gradient-bg {
             background: linear-gradient(120deg, #8d67b9, #4C3558);
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
        .glassmorphism-card {
            background: rgba(255, 255, 255, 0.75); 
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5); 
            border-radius: 1.5rem; 
        }
         .plan-card { 
             transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, border-color 0.3s ease;
             border: 2px solid transparent;
        }
        .plan-card.selected {
            border-color: #8d67b9; /* primary */
            transform: scale(1.03);
            box-shadow: 0 10px 30px -5px rgba(141, 103, 185, 0.3);
        }
        .plan-card:not(.selected):hover {
             transform: scale(1.03);
        }

        /* Estilos Chatbot */
        #chatbot-window { transition: opacity 0.4s ease, transform 0.4s ease; }
        #chatbot-window.hidden { opacity: 0; transform: translateY(20px) scale(0.95); pointer-events: none; }
         .chat-bubble {
            opacity: 0;
            transform: translateY(15px) scale(0.98);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); 
         }
        .chat-bubble.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* Estilos para el formulario de varios pasos */
        .form-step {
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
        }
        .form-step.hidden {
            opacity: 0;
            pointer-events: none;
            position: absolute;
            transform: scale(0.95);
        }
        .form-step.visible {
            opacity: 1;
            pointer-events: auto;
            position: relative;
            transform: scale(1);
        }
        /* Estilos para campos de formulario */
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #c6b3dc; /* secondary */
            background-color: rgba(255, 255, 255, 0.5);
            transition: ring 0.3s, border-color 0.3s;
        }
        .form-input:focus {
            outline: none;
            border-color: #8d67b9; /* primary */
            --tw-ring-color: #8d67b9;
            box-shadow: 0 0 0 2px var(--tw-ring-color);
        }
    </style>
</head>

<body class="text-text-dark font-sans">


    <main class="pt-24 bg-background-light">
         <!-- Hero Section -->
        <section class="cta-gradient-bg text-white pt-20 pb-24 overflow-hidden">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-serif font-bold leading-tight mb-4 reveal">Tienda y Suscripciones</h1>
                <p class="text-lg md:text-xl text-white/80 mb-8 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s;">Elige tus artículos de seguridad y el plan que te acompañará.</p>
            </div>
        </section>

        <!-- Sección de Checkout -->
        <section class="py-12 md:py-24">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-3 gap-12">
                    
                    <!-- Columna de Pasos (Formulario) -->
                    <div class="lg:col-span-2 relative overflow-hidden">
                        
                        <!-- Paso 1: Carrito -->
                        <div id="step-1" class="form-step visible">
                            <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal">
                                <h2 class="text-3xl font-serif font-bold text-text-dark mb-8">1. Tu Pedido</h2>
                                
                                <!-- Sección Artículos -->
                                <h3 class="text-xl font-semibold text-text-dark mb-4">Artículos Inteligentes</h3>
                                <div class="space-y-6">
                                    <!-- Artículo 1 -->
                                    <div class="flex items-center gap-4 p-4 bg-white/50 rounded-lg">
                                        <img src="https://scontent.flim2-1.fna.fbcdn.net/v/t39.30808-6/571109467_122115608246995175_7845623106691367822_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_ohc=KujOYyzbqmAQ7kNvwHyN9c1&_nc_oc=Adlv33izrFebLwUW9xOyQsP3kr7nXdy24JGHxV9f_AZkr1lqEMW7Uwt0nWtK7OYbXuQ&_nc_zt=23&_nc_ht=scontent.flim2-1.fna&_nc_gid=_BMBgpqK2NUCd9YEH8RBmA&oh=00_Afc2TaF-W3nlo9QuS_TcRKS1gBeJh4sgGgByYvF96r0gtA&oe=68FF4B8E" alt="Llavero" class="w-20 h-20 rounded-lg object-cover">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-text-dark">Llavero</h4>
                                            <p class="text-sm text-text-muted">S/ 50.00</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <button onclick="updateCart('llavero', -1)" class="quantity-btn bg-secondary text-text-dark rounded-full w-8 h-8 font-bold hover:bg-primary-light hover:text-white transition">-</button>
                                            <span id="quantity-llavero" class="font-bold w-6 text-center">0</span>
                                            <button onclick="updateCart('llavero', 1)" class="quantity-btn bg-primary text-white rounded-full w-8 h-8 font-bold hover:bg-primary-light transition">+</button>
                                        </div>
                                    </div>
                                    <!-- Artículo 2 -->
                                    <div class="flex items-center gap-4 p-4 bg-white/50 rounded-lg">
                                        <img src="https://scontent.flim2-2.fna.fbcdn.net/v/t39.30808-6/570208380_122115608774995175_4614461980498422310_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=hSiATNqhqe4Q7kNvwEZ5fh8&_nc_oc=AdmITEcvE0fBivOUJ23hLXb8EW98BSjREO57ZN1lJbt7l7E3rCsxX7RcD83xYuS8t8A&_nc_zt=23&_nc_ht=scontent.flim2-2.fna&_nc_gid=Kf2_sq7WdxnzVS9fSWpetg&oh=00_AfeyWdc14vu8-bkEqe2BBNNBbzG8Kg_Mu04PP7XXlutKVg&oe=68FF6597" alt="Collar" class="w-20 h-20 rounded-lg object-cover">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-text-dark">Collar</h4>
                                            <p class="text-sm text-text-muted">S/ 80.00</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <button onclick="updateCart('collar', -1)" class="quantity-btn bg-secondary text-text-dark rounded-full w-8 h-8 font-bold hover:bg-primary-light hover:text-white transition">-</button>
                                            <span id="quantity-collar" class="font-bold w-6 text-center">0</span>
                                            <button onclick="updateCart('collar', 1)" class="quantity-btn bg-primary text-white rounded-full w-8 h-8 font-bold hover:bg-primary-light transition">+</button>
                                        </div>
                                    </div>
                                    <!-- Artículo 3 -->
                                    <div class="flex items-center gap-4 p-4 bg-white/50 rounded-lg">
                                        <img src="https://scontent.flim26-1.fna.fbcdn.net/v/t39.30808-6/569363821_122115608864995175_4451652342889721233_n.jpg?stp=dst-jpg_s590x590_tt6&_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=X4WgcWqjKyIQ7kNvwFy1uWJ&_nc_oc=AdnuIHLLgLSplBsH-VFZhkZdiCpB3pp6Zx0uNuQnjAgkol7mU1fzswnc8DY9qhO-so8&_nc_zt=23&_nc_ht=scontent.flim26-1.fna&_nc_gid=KsF6tzduOiM-R-9yk_7_Mg&oh=00_Afek58XrFl2A5GUlmHoDnnh1l2bRQUv10LAWordOie01Eg&oe=68FF6D6C" alt="Ganchito" class="w-20 h-20 rounded-lg object-cover">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-text-dark">Ganchito de Cabello</h4>
                                            <p class="text-sm text-text-muted">S/ 30.00</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <button onclick="updateCart('ganchito', -1)" class="quantity-btn bg-secondary text-text-dark rounded-full w-8 h-8 font-bold hover:bg-primary-light hover:text-white transition">-</button>
                                            <span id="quantity-ganchito" class="font-bold w-6 text-center">0</span>
                                            <button onclick="updateCart('ganchito', 1)" class="quantity-btn bg-primary text-white rounded-full w-8 h-8 font-bold hover:bg-primary-light transition">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección Planes -->
                                <h3 class="text-xl font-semibold text-text-dark mb-4 mt-10">Suscripción (Selecciona una)</h3>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div id="plan-gratuito" class="plan-card glassmorphism-card p-4 rounded-2xl cursor-pointer" onclick="selectPlan('gratuito', 0)">
                                        <input type="radio" name="plan" id="radio-gratuito" class="hidden">
                                        <h4 class="font-bold text-center text-text-dark">Plan Gratuito</h4>
                                        <p class="font-bold text-lg text-primary text-center">S/ 0.00</p>
                                    </div>
                                    <div id="plan-guardiana" class="plan-card glassmorphism-card p-4 rounded-2xl cursor-pointer" onclick="selectPlan('guardiana', 5)">
                                        <input type="radio" name="plan" id="radio-guardiana" class="hidden">
                                        <h4 class="font-bold text-center text-text-dark">Plan Guardiana</h4>
                                        <p class="font-bold text-lg text-primary text-center">S/ 5.00</p>
                                    </div>
                                    <div id="plan-warmi360" class="plan-card glassmorphism-card p-4 rounded-2xl cursor-pointer" onclick="selectPlan('warmi360', 10)">
                                        <input type="radio" name="plan" id="radio-warmi360" class="hidden">
                                        <h4 class="font-bold text-center text-text-dark">Plan Warmi 360</h4>
                                        <p class="font-bold text-lg text-primary text-center">S/ 10.00</p>
                                    </div>
                                </div>
                                <div class="mt-12 text-right">
                                    <button onclick="showStep(2)" class="bg-primary text-white py-3 px-8 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Continuar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2: Envío -->
                        <div id="step-2" class="form-step hidden">
                             <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal">
                                <h2 class="text-3xl font-serif font-bold text-text-dark mb-8">2. Información de Contacto y Envío</h2>
                                <form id="shipping-form" class="space-y-6">
                                    <h3 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2">Datos de Contacto</h3>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="nombre" class="block text-sm font-semibold text-text-muted mb-2">Nombre Completo</label>
                                            <input type="text" id="nombre" name="nombre" class="form-input" required>
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-semibold text-text-muted mb-2">Correo Electrónico</label>
                                            <input type="email" id="email" name="email" class="form-input" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="celular" class="block text-sm font-semibold text-text-muted mb-2">Celular</label>
                                        <input type="tel" id="celular" name="celular" class="form-input" required>
                                    </div>
                                    
                                    <!-- Campos de envío condicionales -->
                                    <div id="shipping-fields-container" class="hidden space-y-6">
                                        <h3 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2 pt-6">Dirección de Envío</h3>
                                        <div class="grid md:grid-cols-3 gap-6">
                                            <div>
                                                <label for="departamento" class="block text-sm font-semibold text-text-muted mb-2">Departamento</label>
                                                <select id="departamento" name="departamento" class="form-input" onchange="populateProvinces()">
                                                    <option value="">Seleccionar...</option>
                                                    <option value="Lima">Lima</option>
                                                    <option value="Ica">Ica</option>
                                                    <option value="Arequipa">Arequipa</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="provincia" class="block text-sm font-semibold text-text-muted mb-2">Provincia</label>
                                                <select id="provincia" name="provincia" class="form-input" onchange="populateDistricts()" disabled>
                                                    <option value="">Seleccionar...</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="distrito" class="block text-sm font-semibold text-text-muted mb-2">Distrito</label>
                                                <select id="distrito" name="distrito" class="form-input" disabled>
                                                    <option value="">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="direccion" class="block text-sm font-semibold text-text-muted mb-2">Dirección Exacta</label>
                                            <input type="text" id="direccion" name="direccion" placeholder="Ej: Av. El Sol 123, Urb. Las Flores" class="form-input">
                                        </div>
                                        <div>
                                            <label for="destinatario" class="block text-sm font-semibold text-text-muted mb-2">Nombre del Destinatario (Opcional)</label>
                                            <input type="text" id="destinatario" name="destinatario" placeholder="Si es un regalo, ingresa el nombre aquí" class="form-input">
                                        </div>
                                    </div>
                                    <!-- Fin de campos condicionales -->

                                    <div class="flex gap-4 pt-12">
                                        <button type="button" onclick="showStep(1)" class="w-1/3 bg-gray-300 text-text-dark py-3 px-6 rounded-full font-bold hover:bg-gray-400 transition">Volver</button>
                                        <button type="button" onclick="showStep(3)" class="w-2/3 bg-primary text-white py-3 px-6 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Continuar a Pago</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Paso 3: Pago -->
                        <div id="step-3" class="form-step hidden">
                            <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal">
                                <h2 class="text-3xl font-serif font-bold text-text-dark mb-8">3. Método de Pago</h2>
                                
                                <div class="space-y-4 mb-8">
                                    <label class="flex items-center p-4 border border-secondary rounded-lg cursor-pointer">
                                        <input type="radio" name="paymentMethod" value="yape" class="h-5 w-5 text-primary focus:ring-primary" onchange="showPaymentMethod('yape')">
                                        <span class="ml-3 font-semibold text-text-dark">Yape / Plin</span>
                                    </label>
                                    <label class="flex items-center p-4 border border-secondary rounded-lg cursor-pointer">
                                        <input type="radio" name="paymentMethod" value="tarjeta" class="h-5 w-5 text-primary focus:ring-primary" onchange="showPaymentMethod('tarjeta')" checked>
                                        <span class="ml-3 font-semibold text-text-dark">Tarjeta de Crédito / Débito</span>
                                    </label>
                                </div>

                                <!-- Formulario Yape/Plin -->
                                <div id="yape-plin-form" class="hidden space-y-4">
                                    <p class="text-text-muted text-center">Escanea el código QR para pagar. Luego, adjunta tu comprobante.</p>
                                    <img src="https://placehold.co/300x300/e3d9ed/4C3558?text=QR+Yape%2FPlin" alt="QR Code" class="mx-auto rounded-lg">
                                    <label for="comprobante-upload" class="file-upload-btn text-center block">
                                        <i class="fas fa-paperclip mr-2"></i> Adjuntar Comprobante
                                    </label>
                                    <input type="file" id="comprobante-upload" class="hidden" accept="image/*">
                                </div>

                                <!-- Formulario Tarjeta -->
                                <div id="tarjeta-form" class="space-y-6">
                                    <div>
                                        <label for="tarjeta-num" class="block text-sm font-semibold text-text-muted mb-2">Número de Tarjeta</label>
                                        <input type="text" id="tarjeta-num" name="tarjeta-num" class="form-input" placeholder="0000 0000 0000 0000">
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label for="tarjeta-fecha" class="block text-sm font-semibold text-text-muted mb-2">Fecha Venc. (MM/AA)</label>
                                            <input type="text" id="tarjeta-fecha" name="tarjeta-fecha" class="form-input" placeholder="MM/AA">
                                        </div>
                                        <div>
                                            <label for="tarjeta-cvv" class="block text-sm font-semibold text-text-muted mb-2">CVV</label>
                                            <input type="text" id="tarjeta-cvv" name="tarjeta-cvv" class="form-input" placeholder="123">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tarjeta-nombre" class="block text-sm font-semibold text-text-muted mb-2">Nombre en la Tarjeta</label>
                                        <input type="text" id="tarjeta-nombre" name="tarjeta-nombre" class="form-input">
                                    </div>
                                    <div>
                                        <label class="flex items-center">
                                            <input type="checkbox" id="factura-check" class="h-5 w-5 text-primary rounded border-secondary focus:ring-primary" onchange="toggleFactura()">
                                            <span class="ml-3 text-text-muted">Solicitar Factura</span>
                                        </label>
                                    </div>
                                    <div id="factura-datos" class="hidden space-y-4 bg-background-light p-4 rounded-lg">
                                        <div>
                                            <label for="factura-ruc" class="block text-sm font-semibold text-text-muted mb-2">RUC</label>
                                            <input type="text" id="factura-ruc" name="factura-ruc" class="form-input">
                                        </div>
                                        <div>
                                            <label for="factura-razon" class="block text-sm font-semibold text-text-muted mb-2">Razón Social</label>
                                            <input type="text" id="factura-razon" name="factura-razon" class="form-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex gap-4 pt-12">
                                    <button type="button" onclick="showStep(2)" class="w-1/3 bg-gray-300 text-text-dark py-3 px-6 rounded-full font-bold hover:bg-gray-400 transition">Volver</button>
                                    <button type="button" onclick="showVerification()" class="w-2/3 bg-primary text-white py-3 px-6 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Continuar a Verificación</button>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 4: Verificación -->
                        <div id="step-4" class="form-step hidden">
                            <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal">
                                <h2 class="text-3xl font-serif font-bold text-text-dark mb-8">4. Verifica tu Pedido</h2>
                                
                                <div id="verification-summary" class="space-y-6">
                                    <!-- El contenido se llenará con JS -->
                                </div>

                                <div class="flex gap-4 pt-12">
                                    <button type="button" onclick="showStep(3)" class="w-1/3 bg-gray-300 text-text-dark py-3 px-6 rounded-full font-bold hover:bg-gray-400 transition">Volver</button>
                                    <button type="button" onclick="submitOrder()" class="w-2/3 bg-primary text-white py-3 px-6 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Confirmar y Pagar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 5: Boleta -->
                        <div id="step-5" class="form-step hidden">
                            <div class="glassmorphism-card p-8 md:p-12 rounded-2xl shadow-lg reveal text-center">
                                <i class="fas fa-check-circle text-7xl text-primary mb-6"></i>
                                <h2 class="text-3xl font-serif font-bold text-text-dark mb-6">¡Gracias por tu compra!</h2>
                                <p class="text-text-muted mb-8">Tu pedido ha sido procesado. Hemos enviado una copia de tu boleta a tu correo.</p>
                                
                                <!-- Boleta Simple -->
                                <div class="boleta bg-white p-6 rounded-lg shadow-inner border border-secondary text-left max-w-md mx-auto">
                                    <h3 class="text-xl font-bold text-text-dark font-serif text-center mb-4">Boleta de Venta</h3>
                                    <p class="text-sm"><strong>Pedido:</strong> #WARMI-00123</p>
                                    <p class="text-sm"><strong>Fecha:</strong> <span id="boleta-fecha"></span></p>
                                    <p class="text-sm mb-4"><strong>Cliente:</strong> <span id="boleta-nombre"></span></p>
                                    
                                    <div class="border-t border-b border-secondary py-2 my-2" id="boleta-items">
                                        <!-- Items se llenan con JS -->
                                    </div>
                                    <div id="boleta-shipping-details" class="text-sm mt-4">
                                        <!-- Detalles de envío se llenan con JS -->
                                    </div>
                                    <div class="text-right font-bold text-lg text-primary mt-4" id="boleta-total">
                                        Total: S/ 0.00
                                    </div>
                                </div>

                                <button type="button" onclick="showStep(1)" class="mt-8 bg-primary text-white py-3 px-8 rounded-full font-bold text-lg hover:bg-primary-light transition shadow-md">Realizar otro pedido</button>
                            </div>
                        </div>

                    </div>

                    <!-- Columna de Resumen (Sidebar) -->
                    <div class="lg:col-span-1 lg:sticky top-32">
                         <div class="glassmorphism-card p-8 rounded-2xl shadow-lg reveal">
                             <h3 class="text-2xl font-serif font-bold text-text-dark mb-6 border-b border-secondary pb-4">Resumen del Pedido</h3>
                             <div id="summary-items" class="space-y-4 mb-4">
                                 <p class="text-text-muted">Tu carrito está vacío.</p>
                             </div>
                             <div class="border-t border-secondary pt-4 space-y-2">
                                <div class="flex justify-between text-text-muted">
                                    <span>Subtotal:</span>
                                    <span id="summary-subtotal">S/ 0.00</span>
                                </div>
                                <div class="flex justify-between text-text-muted">
                                    <span>Envío:</span>
                                    <span id="summary-shipping">S/ 0.00</span>
                                </div>
                                <div class="flex justify-between text-text-dark font-bold text-xl mt-2">
                                    <span>Total:</span>
                                    <span id="summary-total">S/ 0.00</span>
                                </div>
                             </div>
                         </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    
    <script>
        // --- Mobile menu toggle ---
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // --- Scroll Animations ---
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => {
            observer.observe(el);
        });

        // --- Chatbot ---
        const chatbotWindow = document.getElementById('chatbot-window');
        function toggleChatbot() {
            chatbotWindow.classList.toggle('hidden');
            chatbotWindow.classList.toggle('flex');
        }

        function sendMessage() {
            const input = document.getElementById('user-input');
            const chatBody = document.getElementById('chat-body');
            const message = input.value.trim();

            if (message) {
                // Add user message
                const userMsg = document.createElement('div');
                userMsg.className = 'flex justify-end mb-3 chat-bubble';
                userMsg.innerHTML = `<div class="bg-primary text-white p-3 rounded-lg max-w-xs shadow">${message}</div>`;
                chatBody.appendChild(userMsg);
                setTimeout(() => userMsg.classList.add('visible'), 50);


                input.value = '';
                chatBody.scrollTop = chatBody.scrollHeight;
                
                // Bot response placeholder
                setTimeout(() => {
                    const botMsg = document.createElement('div');
                    botMsg.className = 'flex justify-start mb-3 chat-bubble';
                    botMsg.innerHTML = `<div class="bg-background-light text-text-dark p-3 rounded-lg max-w-xs shadow">Gracias por tu mensaje. Un especialista se pondrá en contacto contigo pronto.</div>`;
                    chatBody.appendChild(botMsg);
                    setTimeout(() => botMsg.classList.add('visible'), 50);
                    chatBody.scrollTop = chatBody.scrollHeight;
                }, 1200);
            }
        }
        document.getElementById('user-input').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // --- Lógica del Carrito y Checkout ---

        // Estado del pedido
        let cart = {
            llavero: 0,
            collar: 0,
            ganchito: 0
        };
        let selectedPlan = null; // 'gratuito', 'guardiana', 'warmi360'
        let hasPhysicalItems = false; // Flag global

        // Datos de productos y planes
        const prices = {
            llavero: 50,
            collar: 80,
            ganchito: 30,
            gratuito: 0,
            guardiana: 5,
            warmi360: 10
        };
        const itemNames = {
            llavero: 'Llavero Inteligente',
            collar: 'Collar Inteligente',
            ganchito: 'Ganchito de Cabello IA',
            gratuito: 'Plan Gratuito',
            guardiana: 'Plan Guardiana',
            warmi360: 'Plan Warmi 360'
        };

        // Datos de envío (para simulación)
        const locations = {
            "Lima": {
                "Lima": ["Miraflores", "San Isidro", "Barranco", "La Molina", "Santiago de Surco"],
                "Cañete": ["San Vicente de Cañete", "Imperial", "Mala"],
                "Huaral": ["Huaral", "Chancay"]
            },
            "Ica": {
                "Ica": ["Ica", "La Tinguiña", "Parcona", "Subtanjalla"],
                "Pisco": ["Pisco", "San Andrés", "Tupac Amaru Inca"],
                "Chincha": ["Chincha Alta", "Grocio Prado", "Sunampe"],
                "Nazca": ["Nazca", "Vista Alegre"]
            },
            "Arequipa": {
                "Arequipa": ["Arequipa", "Cayma", "Yanahuara", "Cerro Colorado"],
                "Camaná": ["Camaná", "Quilca"],
                "Islay": ["Mollendo", "Cocachacra"]
            }
        };

        // --- Funciones del Carrito (Paso 1) ---

        function updateCart(item, quantityChange) {
            if (cart[item] + quantityChange >= 0) {
                cart[item] += quantityChange;
                document.getElementById(`quantity-${item}`).textContent = cart[item];
                updateSummary();
            }
        }

        function selectPlan(planId, price) {
            selectedPlan = { id: planId, price: price };
            
            document.querySelectorAll('.plan-card').forEach(card => card.classList.remove('selected'));
            document.getElementById(`plan-${planId}`).classList.add('selected');
            
            document.getElementById(`radio-${planId}`).checked = true;
            
            updateSummary();
        }

        function updateSummary() {
            const summaryItems = document.getElementById('summary-items');
            summaryItems.innerHTML = ''; 
            let subtotal = 0;
            
            // Resetear el flag
            hasPhysicalItems = false;

            // Añadir artículos
            Object.keys(cart).forEach(item => {
                if (cart[item] > 0) {
                    hasPhysicalItems = true; // Hay al menos 1 artículo físico
                    const price = prices[item];
                    const itemTotal = price * cart[item];
                    subtotal += itemTotal;
                    summaryItems.innerHTML += `
                        <div class="flex justify-between text-text-muted text-sm">
                            <span>${itemNames[item]} (x${cart[item]})</span>
                            <span>S/ ${itemTotal.toFixed(2)}</span>
                        </div>`;
                }
            });

            // Añadir plan
            if (selectedPlan) {
                subtotal += selectedPlan.price;
                summaryItems.innerHTML += `
                    <div class="flex justify-between text-text-muted text-sm">
                        <span>${itemNames[selectedPlan.id]} (Mensual)</span>
                        <span>S/ ${selectedPlan.price.toFixed(2)}</span>
                    </div>`;
            }
            
            if (summaryItems.innerHTML === '') {
                 summaryItems.innerHTML = '<p class="text-text-muted">Tu carrito está vacío.</p>';
            }

            // Calcular total
            const shipping = hasPhysicalItems ? 10.00 : 0.00; // Envío condicional
            const total = subtotal + shipping;
            
            document.getElementById('summary-subtotal').textContent = `S/ ${subtotal.toFixed(2)}`;
            document.getElementById('summary-shipping').textContent = `S/ ${shipping.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `S/ ${total.toFixed(2)}`;
        }

        // --- Funciones de Pasos (Navegación) ---
        const steps = ['step-1', 'step-2', 'step-3', 'step-4', 'step-5'];
        
        function showStep(stepNum) {
            // Lógica condicional al ir al Paso 2
            if (stepNum === 2) {
                const shippingFields = document.getElementById('shipping-fields-container');
                // Campos de dirección requeridos solo si hay items físicos
                const fieldsToToggle = ['departamento', 'provincia', 'distrito', 'direccion'];
                
                if (hasPhysicalItems) {
                    shippingFields.classList.remove('hidden');
                    fieldsToToggle.forEach(id => document.getElementById(id).required = true);
                } else {
                    shippingFields.classList.add('hidden');
                     fieldsToToggle.forEach(id => document.getElementById(id).required = false);
                }
            }

            steps.forEach((stepId, index) => {
                const stepEl = document.getElementById(stepId);
                if (index + 1 === stepNum) {
                    stepEl.classList.remove('hidden');
                    stepEl.classList.add('visible');
                } else {
                    stepEl.classList.add('hidden');
                    stepEl.classList.remove('visible');
                }
            });
            window.scrollTo(0, 200); 
        }

        // --- Funciones de Envío (Paso 2) ---

        function populateProvinces() {
            const depaSelect = document.getElementById('departamento');
            const provSelect = document.getElementById('provincia');
            const distSelect = document.getElementById('distrito');
            const depa = depaSelect.value;

            provSelect.innerHTML = '<option value="">Seleccionar...</option>';
            distSelect.innerHTML = '<option value="">Seleccionar...</option>';
            
            if (depa && locations[depa]) {
                Object.keys(locations[depa]).forEach(prov => {
                    provSelect.innerHTML += `<option value="${prov}">${prov}</option>`;
                });
                provSelect.disabled = false;
                distSelect.disabled = true;
            } else {
                provSelect.disabled = true;
                distSelect.disabled = true;
            }
        }

        function populateDistricts() {
            const depaSelect = document.getElementById('departamento');
            const provSelect = document.getElementById('provincia');
            const distSelect = document.getElementById('distrito');
            const depa = depaSelect.value;
            const prov = provSelect.value;

            distSelect.innerHTML = '<option value="">Seleccionar...</option>';

            if (depa && prov && locations[depa][prov]) {
                 locations[depa][prov].forEach(dist => {
                    distSelect.innerHTML += `<option value="${dist}">${dist}</option>`;
                });
                distSelect.disabled = false;
            } else {
                distSelect.disabled = true;
            }
        }

        // --- Funciones de Pago (Paso 3) ---
        
        function showPaymentMethod(method) {
            const yapeForm = document.getElementById('yape-plin-form');
            const tarjetaForm = document.getElementById('tarjeta-form');
            if (method === 'yape') {
                yapeForm.classList.remove('hidden');
                tarjetaForm.classList.add('hidden');
            } else {
                yapeForm.classList.add('hidden');
                tarjetaForm.classList.remove('hidden');
            }
        }
        
        function toggleFactura() {
            document.getElementById('factura-datos').classList.toggle('hidden');
        }

        // --- Funciones de Verificación (Paso 4) ---
        function showVerification() {
            const summaryContainer = document.getElementById('verification-summary');
            // Recolectar datos
            const nombre = document.getElementById('nombre').value;
            const email = document.getElementById('email').value;
            const celular = document.getElementById('celular').value;
            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
            const total = document.getElementById('summary-total').textContent;

            let paymentHtml = paymentMethod === 'yape' ? 
                '<p><strong>Método:</strong> Yape / Plin (Comprobante adjunto)</p>' :
                '<p><strong>Método:</strong> Tarjeta de Crédito/Débito</p>';
            
            let shippingHtml = '';
            if (hasPhysicalItems) {
                const depa = document.getElementById('departamento').value;
                const prov = document.getElementById('provincia').value;
                const dist = document.getElementById('distrito').value;
                const dir = document.getElementById('direccion').value;
                const dest = document.getElementById('destinatario').value || nombre;
                shippingHtml = `
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2 mb-3">Datos de Envío</h4>
                    <p><strong>Recibe:</strong> ${dest}</p>
                    <p><strong>Dirección:</strong> ${dir}, ${dist}, ${prov}, ${depa}</p>
                </div>`;
            }

            summaryContainer.innerHTML = `
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2 mb-3">Resumen de Pedido</h4>
                    <div id="verification-items" class="text-text-muted"></div>
                    <p class="text-right text-xl font-bold text-primary mt-4">${total}</p>
                </div>
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2 mb-3">Datos de Contacto</h4>
                    <p><strong>Nombre:</strong> ${nombre}</p>
                    <p><strong>Correo:</strong> ${email}</p>
                    <p><strong>Celular:</strong> ${celular}</p>
                </div>
                ${shippingHtml}
                <div>
                    <h4 class="text-xl font-semibold text-text-dark border-b border-secondary pb-2 mb-3">Datos de Pago</h4>
                    ${paymentHtml}
                </div>
            `;
            
            // Poblar items
            document.getElementById('verification-items').innerHTML = document.getElementById('summary-items').innerHTML;

            showStep(4);
        }

        // --- Funciones de Boleta (Paso 5) ---
        function submitOrder() {
            const nombre = document.getElementById('nombre').value;
            const total = document.getElementById('summary-total').textContent;
            
            document.getElementById('boleta-nombre').textContent = nombre;
            document.getElementById('boleta-fecha').textContent = new Date().toLocaleDateString('es-ES');
            document.getElementById('boleta-items').innerHTML = document.getElementById('summary-items').innerHTML;
            document.getElementById('boleta-total').textContent = `Total: ${total}`;

            const boletaShippingContainer = document.getElementById('boleta-shipping-details');
            if (hasPhysicalItems) {
                 const dir = document.getElementById('direccion').value;
                 const dist = document.getElementById('distrito').value;
                 boletaShippingContainer.innerHTML = `<p class="text-sm mt-2"><strong>Enviar a:</strong> ${dir}, ${dist}</p>`;
            } else {
                 boletaShippingContainer.innerHTML = '';
            }

            showStep(5);
        }

        // --- Inicializar Resumen ---
        document.addEventListener('DOMContentLoaded', () => {
            updateSummary(); // Para mostrar el envío inicial
            showPaymentMethod('tarjeta'); // Mostrar tarjeta por defecto
        });
    </script>
</body>
</html>

