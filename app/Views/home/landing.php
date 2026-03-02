<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Pizzería La Cubana | Pizza Cubana en Moultrie, Georgia</title>

    <meta name="description"
        content="La mejor pizza cubana en Moultrie, Georgia. Pizzería La Cubana ofrece pizzas artesanales con auténtico sabor cubano. Ordena hoy mismo.">

    <meta name="keywords"
        content="pizza cubana, pizzas cubanas, pizzería cubana, pizza cubana en Georgia, pizza cubana en Moultrie, comida cubana en Georgia">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Pizzería La Cubana">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="<?= base_url(); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico'); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="Pizzería La Cubana | Pizza Cubana en Georgia">
    <meta property="og:description" content="Auténtica pizza cubana artesanal en Moultrie, Georgia.">
    <meta property="og:image" content="<?= base_url('public/images/logo.png'); ?>">
    <meta property="og:url" content="<?= base_url(); ?>">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">

    <!-- jQuery -->
    <script src="<?php echo base_url('public/assets/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Font Cabin -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nova+Square&family=Playwrite+NZ+Basic:wght@100..400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Cabin", sans-serif;
        }

        button {
            cursor: pointer;
        }

        .separator-fire {
            position: relative;
            width: 320px;
            height: 6px;
            background: #1a1a1a;
            /* Base horno */
            border-radius: 9999px;
            overflow: hidden;
        }

        /* Fuego principal */
        .separator-fire::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    #7f1d1d,
                    #dc2626,
                    #f97316,
                    #facc15,
                    #f97316,
                    #dc2626,
                    #7f1d1d);
            background-size: 200% 100%;
            animation: fireMove 3s linear infinite;
        }

        /* Glow / calor */
        .separator-fire::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    rgba(255, 0, 0, 0.6),
                    rgba(255, 115, 0, 0.6),
                    rgba(255, 200, 0, 0.6));
            filter: blur(8px);
            opacity: 0.8;
        }

        /* Animación fuego */
        @keyframes fireMove {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }
    </style>

</head>

<body class="bg-neutral-950 text-white overflow-x-hidden">
    <nav class="fixed top-0 left-0 w-full z-50 bg-black/70 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="<?= base_url('public/images/logo.png'); ?>"
                    alt="La Cubana"
                    fetchpriority="high"
                    decoding="async"
                    class="h-12 w-auto">
                <span class="font-bold text-xl tracking-wide">LA CUBANA</span>
            </div>

            <!-- MENU DESKTOP -->
            <ul class="hidden md:flex gap-8 text-sm uppercase tracking-wider">
                <li><a href="#" data-scroll="hero" class="hover:text-red-500 transition">Inicio</a></li>
                <li><a href="#" data-scroll="about" class="hover:text-red-500 transition">Nosotros</a></li>
                <li><a href="#" data-scroll="menu" class="hover:text-red-500 transition">Menú</a></li>
                <li><a href="#" data-scroll="contact" class="hover:text-red-500 transition">Contacto</a></li>
            </ul>

            <!-- BOTÓN HAMBURGUESA -->
            <button id="menu-btn"
                class="md:hidden text-white focus:outline-none focus:ring-2 focus:ring-red-500 rounded">
                ☰
            </button>
        </div>

        <!-- MENU MOBILE -->
        <div id="mobile-menu"
            class="md:hidden hidden bg-black/95 backdrop-blur-lg border-t border-white/10">

            <ul class="flex flex-col text-center py-6 space-y-6 uppercase tracking-wider text-sm">
                <li><a href="#" data-scroll="hero" class="block hover:text-red-500">Inicio</a></li>
                <li><a href="#" data-scroll="about" class="block hover:text-red-500">Nosotros</a></li>
                <li><a href="#" data-scroll="menu" class="block hover:text-red-500">Menú</a></li>
                <li><a href="#" data-scroll="contact" class="block hover:text-red-500">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <!-- Espaciador -->
    <div class="h-20"></div>

    <main>
        <!-- HERO -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <!-- VIDEO BACKGROUND -->
            <video
                class="absolute inset-0 w-full h-full object-cover"
                autoplay
                loop
                muted
                playsinline
                preload="none">
                <source src="<?= base_url('videos/hero.mp4'); ?>" type="video/mp4">
                Tu navegador no soporta video HTML5.
            </video>

            <!-- OVERLAY OSCURO -->
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- CONTENIDO -->
            <div class="relative z-10 max-w-5xl text-center px-6">

                <img src="<?= base_url('public/images/logo.png'); ?>"
                    class="mx-auto h-48 mb-8 animate-fade-up"
                    fetchpriority="high"
                    decoding="async"
                    style="animation-delay: 0.2s"
                    alt="">

                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight animate-fade-up"
                    style="animation-delay: 0.4s">
                    Pizzería <span class="text-red-500">La Cubana</span>
                </h1>

                <p class="mt-6 text-lg md:text-xl text-white/80 animate-fade-up"
                    style="animation-delay: 0.6s">
                    Auténtico sabor cubano fusionado con la mejor pizza artesanal.
                </p>

                <div class="mt-10 flex justify-center gap-6 flex-wrap animate-fade-up"
                    style="animation-delay: 0.8s">
                    <a href="#" data-scroll="menu"
                        class="px-8 py-3 bg-red-600 hover:bg-red-700 rounded-full font-semibold transition">
                        Ver Menú
                    </a>
                    <a href="#" data-scroll="contact"
                        class="px-8 py-3 border border-white/30 hover:bg-white/10 rounded-full transition">
                        Contáctanos
                    </a>
                </div>

            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="py-28 bg-gradient-to-b from-neutral-900 to-neutral-950">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">

                <!-- TEXTO -->
                <div class="animate-fade-up">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-8 leading-tight">
                        Auténtica Pizza Cubana<br>
                        <span class="text-red-500">en el corazón de Moultrie</span>
                    </h2>

                    <p class="text-white/80 leading-relaxed mb-6 text-lg">
                        <strong>La Cubana Pizzería</strong> es un negocio familiar dedicado a la elaboración
                        de las mejores pizzas cubanas en el estado de <strong>Georgia</strong>.
                        Combinamos tradición, cultura y sabor en cada receta.
                    </p>

                    <p class="text-white/70 leading-relaxed mb-8">
                        Nuestro compromiso es ofrecer una experiencia auténtica, utilizando ingredientes
                        frescos, masas preparadas diariamente y recetas inspiradas en la cocina cubana
                        tradicional, adaptadas al gusto moderno.
                    </p>

                    <div class="flex flex-wrap gap-6">
                        <div class="flex items-center gap-3">
                            <span class="text-red-500 text-xl">🍕</span>
                            <span class="text-white/80">Recetas originales cubanas</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-red-500 text-xl">🔥</span>
                            <span class="text-white/80">Preparación artesanal diaria</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-red-500 text-xl">🇨🇺</span>
                            <span class="text-white/80">Sabor auténtico caribeño</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-red-500 text-xl">📍</span>
                            <span class="text-white/80">Ubicados en Moultrie, Georgia, USA</span>
                        </div>
                    </div>
                </div>

                <!-- BLOQUE VISUAL -->
                <div class="animate-fade-up" style="animation-delay:0.3s">
                    <div class="relative bg-gradient-to-br from-red-600 via-yellow-400 to-blue-600 p-[2px] rounded-3xl">
                        <div class="bg-black rounded-3xl p-12 text-center">

                            <h3 class="text-3xl font-bold mb-6">
                                Nuestra Filosofía
                            </h3>

                            <p class="text-white/70 text-lg mb-8">
                                Cada pizza que sale de nuestro horno representa nuestro amor
                                por la cultura cubana, la calidad y el buen servicio.
                            </p>

                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <p class="text-3xl font-extrabold text-red-500">100%</p>
                                    <p class="text-white/60 text-sm">Artesanal</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-extrabold text-red-500">+5</p>
                                    <p class="text-white/60 text-sm">Años de experiencia</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-extrabold text-red-500">∞</p>
                                    <p class="text-white/60 text-sm">Pasión por el sabor</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="menu" class="py-24 bg-neutral-950">
            <div class="max-w-7xl mx-auto px-6">

                <!-- Título -->
                <div class="text-center mb-16 animate-fade-up">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
                        Nuestro <span class="text-red-500">Menú</span>
                    </h2>
                    <p class="text-white/70 max-w-2xl mx-auto">
                        Pizzas artesanales con auténtico sabor cubano, hechas al momento.
                    </p>
                </div>

                <div class="flex justify-center mb-10">
                    <div class="separator-fire"></div>
                </div>

                <?php if (!empty($categories)) { ?>

                    <!-- TABS CATEGORÍAS -->
                    <div class="mb-14">

                        <div class="flex overflow-x-auto no-scrollbar gap-4 pb-2"
                            id="categoryTabs">

                            <!-- TAB TODOS -->
                            <?php if (!empty($products)) { ?>
                                <div class="flex gap-3 overflow-x-auto pb-2">

                                    <!-- TODOS -->
                                    <button class="category-tab px-5 py-2 rounded-lg text-sm font-semibold bg-red-600 text-gray-600 border border-gray-300 transition-all duration-200 "
                                        data-category="all">
                                        Todos
                                    </button>

                                    <?php foreach ($categories as $cat) { ?>
                                        <button
                                            class="category-tab px-5 py-2 rounded-lg text-sm font-semibold bg-transparent text-gray-600 border border-gray-300 transition-all duration-200 "
                                            data-category="<?= $cat->id ?>">
                                            <?= esc($cat->name) ?>
                                        </button>
                                    <?php } ?>

                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>


                <?php if (!empty($products)) { ?>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

                        <?php foreach ($products as $p) {

                            // flags
                            $isPopular = ($p->popular == '1');
                            $hasOffer  = ($p->new_price != '0');

                            // clases dinámicas
                            $cardClasses = 'relative bg-neutral-900 rounded-2xl overflow-hidden shadow-xl transition';
                            if ($isPopular) {
                                $cardClasses .= ' fire-border hover:scale-[1.05]';
                            } else {
                                $cardClasses .= ' hover:scale-[1.03]';
                            }
                        ?>

                            <div class="<?= $cardClasses ?> product-card" data-category="<?= $p->category_id ?>">
                                <!-- BADGES -->
                                <?php if ($isPopular) { ?>
                                    <span class="absolute top-4 left-4 bg-yellow-400 text-gray-700 text-xs font-bold px-3 py-1 rounded-full z-10">
                                        ⭐ POPULAR
                                    </span>
                                <?php } ?>

                                <?php if ($hasOffer) { ?>
                                    <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full z-10">
                                        🔥 OFERTA
                                    </span>
                                <?php } ?>

                                <!-- IMAGEN -->
                                <img src="<?= base_url('public/images/pizzas/' . esc($p->img)); ?>"
                                    alt="<?= esc($p->name); ?>"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-56 w-full object-cover">

                                <!-- CONTENIDO -->
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold mb-2">
                                        <?= esc($p->name); ?>
                                    </h3>

                                    <p class="text-white/60 text-sm mb-4">
                                        <?= esc($p->description); ?>
                                    </p>

                                    <div class="flex justify-between items-center">

                                        <!-- PRECIOS -->
                                        <?php if ($hasOffer) { ?>
                                            <div class="flex items-center gap-3">
                                                <span class="text-sm line-through text-white/40">
                                                    $<?= number_format($p->price, 2); ?>
                                                </span>
                                                <span class="text-xl font-bold text-red-500">
                                                    $<?= number_format($p->new_price, 2); ?>
                                                </span>
                                            </div>
                                        <?php } else { ?>
                                            <span class="text-xl font-bold <?= $isPopular ? 'text-yellow-400' : 'text-red-500'; ?>">
                                                $<?= number_format($p->price, 2); ?>
                                            </span>
                                        <?php } ?>

                                        <!-- BOTÓN -->
                                        <button
                                            class="btn-order px-4 py-2 rounded-full text-sm transition 
  <?= $isPopular ? 'bg-yellow-400 hover:bg-yellow-500 font-bold' : 'bg-red-600 hover:bg-red-700 text-white'; ?>"
                                            data-id="<?= $p->id; ?>"
                                            data-name="<?= esc($p->name); ?>"
                                            data-price="<?= $hasOffer ? $p->new_price : $p->price; ?>">
                                            Ordenar
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                <?php } else { ?>

                    <div class="flex flex-col items-center justify-center text-center py-24 animate-fade-up">

                        <!-- Ícono -->
                        <div class="text-6xl mb-6">🍕</div>

                        <!-- Título -->
                        <h3 class="text-3xl font-extrabold mb-4">
                            Menú en preparación
                        </h3>

                        <!-- Descripción -->
                        <p class="text-white/70 max-w-xl mb-8">
                            Estamos trabajando para traerte las mejores pizzas cubanas de Georgia.
                            Muy pronto nuestro menú estará disponible.
                        </p>

                        <!-- CTA -->
                        <a href="#" data-scroll="contact"
                            class="px-8 py-3 bg-red-600 hover:bg-red-700 rounded-full font-semibold transition">
                            Contáctanos
                        </a>
                    </div>
                <?php } ?>

                <!-- MENSAJE SIN PRODUCTOS -->
                <div id="noProductsMessage"
                    class="hidden flex flex-col items-center justify-center text-center py-20">

                    <div class="text-6xl mb-6">🍕</div>

                    <h3 class="text-2xl font-bold mb-3">
                        No hay productos en esta categoría
                    </h3>

                    <p class="text-white/60 max-w-md">
                        Estamos preparando nuevas delicias para ti.
                        Vuelve pronto o explora otras categorías.
                    </p>
                </div>

            </div>
        </section>
    </main>

    <div id="cartBox"
        class="fixed bottom-6 right-6 bg-neutral-900 border border-white/10 rounded-xl p-4 w-72 hidden z-40">

        <h4 class="font-bold mb-2">🛒 Tu pedido</h4>

        <div id="cartItems" class="space-y-2 text-sm max-h-40 overflow-y-auto"></div>

        <div class="border-t border-white/10 mt-3 pt-3 flex justify-between font-bold">
            <span>Total</span>
            <span id="cartTotal">$0.00</span>
        </div>

        <button id="clearCart"
            class="mt-3 w-full bg-neutral-700 hover:bg-neutral-600 py-2 rounded text-sm">
            Vaciar carrito
        </button>

        <button id="openCheckout"
            class="mt-3 w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold ">
            Confirmar pedido
        </button>
    </div>

    <footer id="contact" class="bg-black border-t border-white/10 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-12 text-white/70">

            <!-- LOGO / DESCRIPCIÓN -->
            <div class="text-center lg:text-left">
                <img src="<?= base_url('public/images/logo.png'); ?>"
                    alt="La Cubana Pizzeria"
                    loading="lazy"
                    decoding="async"
                    class="h-24 mx-auto lg:mx-0 mb-6">
                <p class="text-sm leading-relaxed mb-4">
                    Auténtico sabor cubano en cada pizza.
                    Tradición, calidad y pasión artesanal desde Moultrie 🍕
                </p>
            </div>

            <!-- CONTACTO (MEJORADO) -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-white mb-6">Contacto</h3>

                <div class="space-y-4">
                    <a href="tel:+19125208544"
                        class="flex items-center justify-center gap-3 bg-neutral-900 hover:bg-neutral-800 py-3 rounded-xl transition">
                        <span class="text-xl">English</span>
                        <span>📞</span>
                        <span class="font-semibold">(912) 520-8544</span>
                    </a>

                    <a href="tel:+12294549662"
                        class="flex items-center justify-center gap-3 bg-neutral-900 hover:bg-neutral-800 py-3 rounded-xl transition">
                        <span class="text-xl">Español</span>
                        <span>📞</span>
                        <span class="font-semibold">(229) 454-9662</span>
                    </a>
                </div>
            </div>

            <!-- HORARIOS -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-white mb-6">Horario</h3>

                <ul class="space-y-3 text-sm">
                    <li>🕒 Lun – Sáb: <strong>11:00 AM – 9:00 PM</strong></li>
                    <li>🕒 Domingo: <strong>12:00 PM – 8:00 PM</strong></li>
                </ul>
            </div>

            <!-- MAPA -->
            <div class="text-center lg:text-right">
                <h3 class="text-lg font-semibold text-white mb-6">Ubicación</h3>

                <div class="rounded-xl overflow-hidden border border-white/10 mb-4">
                    <iframe
                        src="https://www.google.com/maps?q=1807%20Garden%20Villa%20Dr,%20Moultrie,%20GA&output=embed"
                        width="100%"
                        height="220"
                        style="border:0;"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>

                <a
                    href="https://www.google.com/maps/dir/?api=1&destination=1807+Garden+Villa+Dr+Moultrie+GA"
                    target="_blank"
                    class="inline-block bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full text-sm font-semibold transition">
                    📍 Cómo llegar
                </a>
            </div>

        </div>

        <!-- DIVISOR -->
        <div class="mt-16 border-t border-white/10"></div>

        <!-- PIE FINAL -->
        <div class="mt-6 text-center text-sm text-white/50">
            © <?= date('Y'); ?> Pizzería La Cubana · Hecho por <a href="https://avsoftwares.dev/" target="_blank" class="text-red-500 hover:underline">AVSoftwares</a>
        </div>
    </footer>

    <!-- ===============================
     GLOBAL OVERLAY SYSTEM
================================ -->

    <div id="ui-layer" class="fixed inset-0 pointer-events-none z-[9999]">

        <!-- OFFLINE -->
        <div id="offlineScreen"
            class="absolute inset-0 bg-black hidden items-center justify-center pointer-events-auto">
            <div class="text-center text-white">
                <h1 class="text-2xl font-bold mb-4">Sin conexión</h1>
                <p class="text-white/60">Revisa tu conexión a internet.</p>
            </div>
        </div>

        <!-- CHECKOUT MODAL -->
        <div id="modalCheckout"
            class="absolute inset-0 bg-black/70 hidden items-center justify-center pointer-events-auto">

            <div class="bg-neutral-900 rounded-2xl p-6 w-full max-w-sm relative shadow-2xl">

                <button id="closeCheckout"
                    class="absolute top-3 right-3 text-white/60 hover:text-white text-lg">
                    ✕
                </button>

                <h3 class="text-xl font-bold mb-4">Confirmar orden</h3>

                <input id="clientName" type="text" placeholder="Nombre"
                    class="w-full bg-neutral-800 px-3 py-2 rounded mb-3">

                <input id="clientPhone" type="text" placeholder="Teléfono"
                    class="w-full bg-neutral-800 px-3 py-2 rounded mb-4">

                <button id="confirmOrder"
                    class="w-full bg-green-600 hover:bg-green-700 py-2 rounded font-bold">
                    Confirmar orden
                </button>
            </div>
        </div>

        <!-- CANTIDAD MODAL -->
        <div id="modalQty"
            class="absolute inset-0 bg-black/70 hidden items-center justify-center pointer-events-auto">

            <div class="bg-neutral-900 rounded-2xl p-6 w-full max-w-sm text-center relative shadow-2xl">

                <button id="closeQty"
                    class="absolute top-3 right-3 text-white/60 hover:text-white text-lg">
                    ✕
                </button>

                <h3 id="qtyProductName" class="text-xl font-bold mb-4"></h3>

                <input type="number"
                    id="qtyInput"
                    min="1"
                    class="w-full bg-neutral-800 px-3 py-2 rounded text-center mb-6">

                <button id="addToCart"
                    class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold">
                    Añadir al carrito
                </button>
            </div>
        </div>

        <!-- SUCCESS MODAL -->
        <div id="successModal"
            class="absolute inset-0 bg-black/70 hidden items-center justify-center pointer-events-auto">

            <div class="bg-neutral-900 rounded-2xl px-10 py-10 text-center shadow-2xl max-w-sm w-full">

                <div class="text-5xl mb-4">✅</div>

                <h3 class="text-2xl font-bold text-green-400 mb-2">
                    ¡Orden realizada!
                </h3>

                <p class="text-white/70">
                    Su orden fue realizada con éxito.
                </p>
            </div>
        </div>

        <!-- TOAST -->
        <div id="appToast"
            class="absolute top-6 right-6 hidden pointer-events-auto">

            <div class="flex items-center gap-3 
                    bg-neutral-900 border border-white/10
                    px-5 py-4 rounded-xl shadow-2xl
                    min-w-[280px]">

                <div id="toastIcon" class="text-2xl"></div>
                <div id="toastText" class="text-sm font-semibold"></div>
            </div>
        </div>

    </div>

    <script>
        $(function() {

            /* ==========================================
               TOGGLE MENÚ MÓVIL
            ========================================== */
            const $menuBtn = $('#menu-btn');
            const $mobileMenu = $('#mobile-menu');

            $menuBtn.on('click', function() {
                $mobileMenu.toggleClass('hidden');
            });

            $('[data-scroll]').on('click', function(e) {

                e.preventDefault();

                const targetId = $(this).data('scroll');
                const $section = $('#' + targetId);

                $mobileMenu.addClass('hidden');

                if ($section.length) {

                    const offset = 80;
                    const top = $section.offset().top - offset;

                    $('html, body').animate({
                        scrollTop: top
                    }, 500);
                }
            });


            /* =====================================================
               ESTADO GLOBAL
            ====================================================== */

            let cart = JSON.parse(getCookie('cart') || '[]');
            let currentProduct = null;

            renderCart();
            updateConnectionStatus();

            function showToast(icon, message) {
                $('#toastIcon').text(icon);
                $('#toastText').text(message);

                $('#appToast')
                    .removeClass('hidden')
                    .fadeIn(200);

                setTimeout(function() {
                    $('#appToast').fadeOut(200);
                }, 3000);
            }


            /* =====================================================
               PRODUCTOS - AGREGAR AL CARRITO
            ====================================================== */

            $('.btn-order').on('click', function() {

                currentProduct = {
                    id: $(this).data('id'),
                    name: $(this).data('name'),
                    price: parseFloat($(this).data('price'))
                };

                $('#qtyProductName').text(currentProduct.name);
                $('#qtyInput').val(1);
                $('#modalQty').removeClass('hidden').addClass('flex');
            });

            $('#closeQty').on('click', function() {
                $('#modalQty').addClass('hidden').removeClass('flex');
            });

            $('#addToCart').on('click', function() {

                let qty = parseInt($('#qtyInput').val(), 10);

                if (isNaN(qty) || qty < 1) {
                    showToast('⚠️', 'La cantidad mínima es 1');
                    $('#qtyInput').val(1).focus();
                    return;
                }

                let found = cart.find(p => p.id === currentProduct.id);

                if (found) {
                    found.quantity += qty;
                } else {
                    cart.push({
                        id: currentProduct.id,
                        name: currentProduct.name,
                        price: currentProduct.price,
                        quantity: qty
                    });
                }

                saveCart();
                renderCart();
                $('#modalQty').addClass('hidden').removeClass('flex');
            });


            /* =====================================================
               CARRITO
            ====================================================== */

            $(document).on('click', '.remove-item', function() {

                let id = $(this).data('id');
                cart = cart.filter(p => p.id !== id);

                saveCart();
                renderCart();
                showToast('🗑️', 'Producto eliminado');
            });

            $('#clearCart').on('click', function() {

                cart = [];
                saveCart();
                renderCart();
                showToast('🗑️', 'Carrito vaciado');
            });


            function renderCart() {

                if (cart.length === 0) {
                    $('#cartBox').addClass('hidden');
                    return;
                }

                $('#cartBox').removeClass('hidden');
                $('#cartItems').html('');

                let total = 0;

                cart.forEach(p => {

                    total += p.price * p.quantity;

                    $('#cartItems').append(`
                <div class="flex justify-between items-center border-b border-white/10 pb-1">
                    <div>
                        <span>${p.name} x${p.quantity}</span>
                        <div class="text-xs text-white/50">
                            $${(p.price * p.quantity).toFixed(2)}
                        </div>
                    </div>
                    <button class="remove-item text-red-500 text-xs hover:text-red-400"
                        data-id="${p.id}">
                        ✕
                    </button>
                </div>
            `);
                });

                $('#cartTotal').text('$' + total.toFixed(2));
            }


            /* =====================================================
               CHECKOUT
            ====================================================== */

            $('#openCheckout').on('click', function() {

                resetCheckoutForm();

                $('#modalCheckout')
                    .removeClass('hidden')
                    .addClass('flex');
            });

            $('#closeCheckout').on('click', function() {
                $('#modalCheckout').addClass('hidden').removeClass('flex');
            });

            $('#confirmOrder').on('click', function() {

                let name = $('#clientName').val().trim();
                let phoneRaw = $('#clientPhone').val().trim();
                let phoneDigits = phoneRaw.replace(/\D/g, '');

                if (cart.length === 0) {
                    showToast('⚠️', 'Debes añadir productos');
                    return;
                }

                if (name.length < 2) {
                    showToast('⚠️', 'Nombre inválido');
                    $('#clientName').focus();
                    return;
                }

                if (phoneDigits.length !== 10) {
                    showToast('⚠️', 'Número inválido (USA)');
                    $('#clientPhone').focus();
                    return;
                }

                let totalPrice = cart.reduce((acc, p) => acc + (p.price * p.quantity), 0);
                totalPrice = parseFloat(totalPrice.toFixed(2));

                let products = cart.map(p => ({
                    id: p.id,
                    quantity: p.quantity
                }));

                let button = $('#confirmOrder');
                button.text('Confirmando...').prop('disabled', true);

                $.ajax({
                    url: "<?= base_url('makeOrder'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        client_name: name,
                        client_phone: phoneDigits,
                        products: JSON.stringify(products),
                        total_price: totalPrice
                    },
                    success: function(res) {

                        if (res.error === 0) {

                            showSuccessModal();

                            cart = [];
                            saveCart();
                            renderCart();

                            $('#modalCheckout')
                                .addClass('hidden')
                                .removeClass('flex');

                            resetCheckoutForm();

                        } else {
                            showToast('⚠️', 'Error al procesar la orden');
                        }

                        button.text('Confirmar orden').prop('disabled', false);
                    },
                    error: function() {

                        showToast('⚠️', 'Error de conexión');
                        button.text('Confirmar orden').prop('disabled', false);
                    }
                });
            });


            function resetCheckoutForm() {
                $('#clientName').val('');
                $('#clientPhone').val('');
                $('#confirmOrder').text('Confirmar orden').prop('disabled', false);
            }


            /* =====================================================
               VALIDACIONES INPUT
            ====================================================== */

            $('#clientName').on('input', function() {
                this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
            });

            $('#clientPhone').on('input', function() {

                let numbers = this.value.replace(/\D/g, '').substring(0, 10);
                let formatted = '';

                if (numbers.length > 0)
                    formatted = '(' + numbers.substring(0, 3);

                if (numbers.length >= 4)
                    formatted += ') ' + numbers.substring(3, 6);

                if (numbers.length >= 7)
                    formatted += '-' + numbers.substring(6, 10);

                this.value = formatted;
            });


            /* =====================================================
               FILTRO CATEGORÍAS
            ====================================================== */

            $('.category-tab').on('click', function() {

                $('.category-tab')
                    .removeClass('bg-red-600 text-white')
                    .addClass('bg-transparent text-gray-600');

                $(this)
                    .removeClass('bg-transparent text-gray-600')
                    .addClass('bg-red-600 text-white');

                let selected = $(this).data('category');
                let visibleCount = 0;

                $('.product-card').each(function() {

                    let productCategory = $(this).data('category');

                    if (selected === 'all' || productCategory == selected) {
                        $(this).fadeIn(200);
                        visibleCount++;
                    } else {
                        $(this).hide();
                    }
                });

                if (visibleCount === 0) {
                    $('#noProductsMessage').removeClass('hidden').fadeIn(200);
                } else {
                    $('#noProductsMessage').fadeOut(150, function() {
                        $(this).addClass('hidden');
                    });
                }
            });


            /* =====================================================
               OFFLINE CONTROL
            ====================================================== */

            window.addEventListener('offline', updateConnectionStatus);
            window.addEventListener('online', updateConnectionStatus);

            function updateConnectionStatus() {

                if (!navigator.onLine) {

                    $('#offlineScreen').removeClass('hidden');
                    $('body, html').css('overflow', 'hidden');

                } else {

                    $('#offlineScreen').addClass('hidden');
                    $('body, html').css('overflow', '');
                }
            }


            /* =====================================================
               COOKIES
            ====================================================== */

            function saveCart() {
                document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) + ";path=/;max-age=86400";
            }

            function getCookie(name) {
                let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? decodeURIComponent(match[2]) : null;
            }

            /* =====================================================
               SUCCESS ORDER MODAL
            ====================================================== */

            function showSuccessModal() {

                $('#successModal')
                    .removeClass('hidden')
                    .addClass('flex');

                setTimeout(function() {
                    $('#successModal')
                        .addClass('hidden')
                        .removeClass('flex');
                }, 5000);
            }

        });
    </script>
</body>

</html>