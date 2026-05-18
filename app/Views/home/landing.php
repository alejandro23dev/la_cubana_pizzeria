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

    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico'); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="Pizzería La Cubana | Pizza Cubana en Georgia">
    <meta property="og:description" content="Auténtica pizza cubana artesanal en Moultrie, Georgia.">
    <meta property="og:image" content="<?= base_url('public/images/logo.png'); ?>">
    <meta property="og:url" content="<?= base_url(); ?>">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">

    <!-- Tipografía: Playfair Display (headings) + Outfit (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS compilado del proyecto -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">

    <!-- Tailwind CDN (complemento para utilities adicionales) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        body: ['"Outfit"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* ===== VARIABLES DE DISEÑO ===== */
        :root {
            --bg: #0c0a09;
            --bg-elevated: #1c1917;
            --card: #161311;
            --border: rgba(255, 255, 255, 0.07);
            --accent: #dc2626;
            --accent-hover: #b91c1c;
            --gold: #f59e0b;
            --gold-dark: #d97706;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: #fafaf9;
            overflow-x: hidden;
        }

        /* ===== TEXTURA DE RUIDO (profundidad cinematográfica) ===== */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 9990;
            pointer-events: none;
            opacity: 0.02;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 200px 200px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            transition: background 0.4s ease, border-color 0.4s ease, padding 0.4s ease;
        }

        .navbar.scrolled {
            background: rgba(12, 10, 9, 0.88) !important;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom-color: var(--border) !important;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        /* ===== HAMBURGUESA ANIMADA ===== */
        .hamburger-line {
            display: block;
            width: 22px;
            height: 2px;
            background: #fafaf9;
            border-radius: 2px;
            transition: all 0.35s cubic-bezier(0.76, 0, 0.24, 1);
            transform-origin: center;
        }

        #menu-btn.active .hamburger-line:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        #menu-btn.active .hamburger-line:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        #menu-btn.active .hamburger-line:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ===== MENÚ MÓVIL OVERLAY ===== */
        #mobile-menu {
            position: fixed;
            inset: 0;
            z-index: 45;
            background: rgba(12, 10, 9, 0.97);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 32px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        #mobile-menu.open {
            opacity: 1;
            pointer-events: all;
        }

        #mobile-menu a {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #fafaf9;
            text-decoration: none;
            transition: color 0.3s;
        }

        #mobile-menu a:hover {
            color: var(--accent);
        }

        /* ===== HERO ===== */
        .hero-overlay {
            background: linear-gradient(180deg,
                    rgba(12, 10, 9, 0.55) 0%,
                    rgba(12, 10, 9, 0.35) 40%,
                    rgba(12, 10, 9, 0.7) 100%);
        }

        /* ===== SEPARADOR DE FUEGO (refinado) ===== */
        .separator-fire {
            width: 180px;
            height: 3px;
            background: #1a1a1a;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
        }

        .separator-fire::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    #7f1d1d, #dc2626, #f97316, #fbbf24, #f97316, #dc2626, #7f1d1d);
            background-size: 200% 100%;
            animation: fireMove 3s linear infinite;
        }

        .separator-fire::after {
            content: "";
            position: absolute;
            inset: -4px 0;
            background: linear-gradient(90deg,
                    rgba(255, 0, 0, 0.35), rgba(255, 115, 0, 0.35), rgba(255, 200, 0, 0.35));
            filter: blur(6px);
            opacity: 0.6;
        }

        @keyframes fireMove {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        /* ===== SCROLL REVEAL ===== */
        .reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== HERO ENTRANCE ===== */
        .hero-enter {
            opacity: 0;
            transform: translateY(30px);
            animation: heroFadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes heroFadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== SCROLL INDICADOR ===== */
        .scroll-line {
            width: 1px;
            height: 45px;
            background: linear-gradient(to bottom, rgba(250, 250, 249, 0.5), transparent);
            animation: scrollPulse 2.5s ease-in-out infinite;
        }

        @keyframes scrollPulse {

            0%,
            100% {
                opacity: 0.3;
                transform: scaleY(0.4);
                transform-origin: top;
            }

            50% {
                opacity: 1;
                transform: scaleY(1);
            }
        }

        /* ===== PRODUCT CARDS ===== */
        .product-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.45s ease,
                border-color 0.45s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45), 0 0 30px rgba(220, 38, 38, 0.08);
            border-color: rgba(220, 38, 38, 0.18);
        }

        .product-card:hover .product-img {
            transform: scale(1.08);
        }

        .product-img {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Bordes luminosos para productos populares */
        .fire-border {
            border-color: rgba(245, 158, 11, 0.2) !important;
            box-shadow: 0 0 25px rgba(245, 158, 11, 0.1), 0 0 50px rgba(220, 38, 38, 0.06);
        }

        .fire-border:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45), 0 0 40px rgba(245, 158, 11, 0.2);
            border-color: rgba(245, 158, 11, 0.35) !important;
        }

        /* ===== BADGES ===== */
        .badge-popular {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #1c1917;
        }

        .badge-offer {
            background: var(--accent);
            color: white;
        }

        /* ===== BOTONES ===== */
        .btn-order {
            border-radius: 999px;
            font-weight: 600;
            letter-spacing: 0.02em;
            transition: all 0.3s ease;
        }

        .btn-order:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
        }

        .btn-order-gold {
            background: linear-gradient(135deg, #f59e0b, #d97706) !important;
            color: #1c1917 !important;
        }

        .btn-order-gold:hover {
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35) !important;
        }

        /* ===== CATEGORÍA TABS ===== */
        .category-tab {
            border-radius: 999px;
            white-space: nowrap;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #a8a29e !important;
            background: transparent !important;
        }

        .category-tab:hover {
            background: rgba(255, 255, 255, 0.06) !important;
            color: #fafaf9 !important;
        }

        .category-tab.active {
            background: var(--accent) !important;
            color: white !important;
            border-color: var(--accent) !important;
        }

        /* Scrollbar oculto para tabs */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ===== FILOSOFÍA CARD (borde gradiente) ===== */
        .philosophy-border {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.5), rgba(245, 158, 11, 0.3), rgba(220, 38, 38, 0.5));
            padding: 1px;
            border-radius: 24px;
        }

        .philosophy-inner {
            background: #141210;
            border-radius: 23px;
        }

        /* ===== FEATURE ITEMS ===== */
        .feature-item {
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(4px);
        }

        /* ===== CARRITO ===== */
        #cartBox {
            background: rgba(22, 19, 17, 0.92);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #cartBox.hidden {
            display: none !important;
        }

        /* ===== MODALES ===== */
        .modal-backdrop {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal-card {
            background: #1a1714;
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6);
            animation: modalIn 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.94) translateY(12px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-input {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            padding: 13px 18px;
            color: #fafaf9;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .modal-input:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(255, 255, 255, 0.06);
        }

        .modal-input::placeholder {
            color: #78716c;
        }

        /* ===== TOAST ===== */
        .toast-card {
            background: rgba(22, 19, 17, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            animation: toastIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ===== SECCIÓN DIVIDER ===== */
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.06), transparent);
        }

        /* ===== FOOTER LINKS ===== */
        footer a {
            transition: color 0.3s ease;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent) !important;
        }

        /* ===== PHONE LINKS ===== */
        .phone-link {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 14px;
            transition: all 0.3s ease;
        }

        .phone-link:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        /* ===== BLOB DECORATIVO ===== */
        .warm-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            opacity: 0.5;
        }

        /* ===== REDUCED MOTION ===== */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }

            .hero-enter {
                opacity: 1;
                transform: none;
            }
        }

        /* ===== RESPONSIVE CARRITO ===== */
        @media (max-width: 640px) {
            #cartBox {
                right: 12px !important;
                left: 12px !important;
                width: auto !important;
                bottom: 12px !important;
            }
        }
    </style>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8921374874744505"
        crossorigin="anonymous"></script>
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar fixed top-0 left-0 w-full z-50 border-b border-transparent" id="navbar">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-5">

            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 text-decoration-none" style="text-decoration:none;">
                <img src="<?= base_url('public/images/logo.png'); ?>" alt="La Cubana Pizzería" fetchpriority="high"
                    decoding="async" class="h-11 w-auto">
                <span class="font-display font-bold text-lg tracking-wide text-white">LA CUBANA</span>
            </a>

            <!-- Menú Desktop -->
            <ul class="hidden md:flex items-center gap-10 text-sm tracking-wider font-medium">
                <li><a href="#" data-scroll="hero"
                        class="text-stone-400 hover:text-white transition-colors duration-300"
                        style="text-decoration:none;">Inicio</a></li>
                <li><a href="#" data-scroll="about"
                        class="text-stone-400 hover:text-white transition-colors duration-300"
                        style="text-decoration:none;">Nosotros</a></li>
                <li><a href="#" data-scroll="menu"
                        class="text-stone-400 hover:text-white transition-colors duration-300"
                        style="text-decoration:none;">Menú</a></li>
                <li><a href="#" data-scroll="contact"
                        class="text-stone-400 hover:text-white transition-colors duration-300"
                        style="text-decoration:none;">Contacto</a></li>
                <li>
                    <a href="#" data-scroll="menu"
                        class="ml-2 px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20"
                        style="text-decoration:none;">
                        Ordenar
                    </a>
                </li>
            </ul>

            <!-- Hamburguesa -->
            <button id="menu-btn"
                class="md:hidden flex flex-col justify-between w-6 h-[14px] focus:outline-none focus:ring-2 focus:ring-red-500 rounded"
                aria-label="Abrir menú" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </nav>

    <!-- ===== MENÚ MÓVIL OVERLAY ===== -->
    <div id="mobile-menu">
        <a href="#" data-scroll="hero">Inicio</a>
        <a href="#" data-scroll="about">Nosotros</a>
        <a href="#" data-scroll="menu">Menú</a>
        <a href="#" data-scroll="contact">Contacto</a>
        <a href="#" data-scroll="menu" class="mt-4 px-8 py-3 bg-red-600 text-white font-semibold rounded-full text-lg"
            style="text-decoration:none;">
            Ordenar Ahora
        </a>
    </div>

    <main>

        <!-- ===== HERO ===== -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black">
            <!-- Video de fondo -->
            <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline preload="none">
                <source src="<?= base_url('videos/hero.mp4'); ?>" type="video/mp4">
            </video>

            <!-- Overlay cálido -->
            <div class="hero-overlay absolute inset-0"></div>

            <!-- Blobs decorativos -->
            <div class="warm-blob"
                style="width:500px;height:500px;background:rgba(220,38,38,0.08);bottom:-15%;left:-10%;"
                aria-hidden="true"></div>
            <div class="warm-blob" style="width:400px;height:400px;background:rgba(245,158,11,0.06);top:-10%;right:-8%;"
                aria-hidden="true"></div>

            <!-- Contenido -->
            <div class="relative z-10 max-w-5xl text-center px-6">

                <img src="<?= base_url('public/images/logo.png'); ?>" class="mx-auto h-40 sm:h-48 mb-8 hero-enter"
                    fetchpriority="high" decoding="async" style="animation-delay: 0.2s;" alt="Logo Pizzería La Cubana">

                <h1 class="font-display text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold tracking-tight leading-[0.92] hero-enter"
                    style="animation-delay: 0.45s;">
                    Pizzería<br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-orange-500 to-amber-400">
                        La Cubana
                    </span>
                </h1>

                <p class="mt-6 text-base sm:text-lg md:text-xl text-stone-300/70 max-w-xl mx-auto font-light tracking-wide leading-relaxed hero-enter"
                    style="animation-delay: 0.65s;">
                    Auténtico sabor cubano fusionado con la mejor pizza artesanal
                </p>

                <div class="mt-10 flex flex-wrap justify-center gap-4 hero-enter" style="animation-delay: 0.85s;">
                    <a href="#" data-scroll="menu"
                        class="inline-flex items-center gap-2.5 px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300 hover:shadow-xl hover:shadow-red-600/25 hover:-translate-y-0.5"
                        style="text-decoration:none;">
                        <i class="fa-solid fa-utensils text-sm"></i>
                        Ver Menú
                    </a>
                    <a href="#" data-scroll="contact"
                        class="inline-flex items-center gap-2.5 px-8 py-4 border border-white/15 hover:bg-white/8 text-white font-medium rounded-full transition-all duration-300 hover:-translate-y-0.5"
                        style="text-decoration:none;">
                        <i class="fa-solid fa-phone text-sm"></i>
                        Contáctanos
                    </a>
                </div>
            </div>

            <!-- Indicador de scroll -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 hero-enter"
                style="animation-delay: 1.3s;" aria-hidden="true">
                <span class="text-[10px] tracking-[3px] uppercase text-stone-500 font-medium">Scroll</span>
                <div class="scroll-line"></div>
            </div>
        </section>

        <!-- ===== DIVIDER ===== -->
        <div class="section-divider"></div>

        <!-- ===== ABOUT ===== -->
        <section id="about" class="py-24 md:py-32 relative overflow-hidden">
            <!-- Blob decorativo -->
            <div class="warm-blob" style="width:600px;height:600px;background:rgba(220,38,38,0.04);top:10%;right:-15%;"
                aria-hidden="true"></div>

            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                <!-- Texto -->
                <div class="reveal">
                    <span
                        class="inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-[3px] text-red-500 mb-6">
                        <span class="w-7 h-px bg-red-500"></span>
                        Nuestra Historia
                    </span>

                    <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold leading-[1.1] mb-8"
                        style="letter-spacing: -0.5px;">
                        Auténtica Pizza Cubana<br>
                        <span class="text-red-500">en el corazón de Moultrie</span>
                    </h2>

                    <p class="text-stone-300/80 leading-relaxed mb-5 text-base md:text-lg">
                        <strong class="text-white">La Cubana Pizzería</strong> es un negocio familiar dedicado a la
                        elaboración
                        de las mejores pizzas cubanas en el estado de <strong class="text-white">Georgia</strong>.
                        Combinamos tradición, cultura y sabor en cada receta.
                    </p>

                    <p class="text-stone-400 leading-relaxed mb-10 text-[15px]">
                        Nuestro compromiso es ofrecer una experiencia auténtica, utilizando ingredientes
                        frescos, masas preparadas diariamente y recetas inspiradas en la cocina cubana
                        tradicional, adaptadas al gusto moderno.
                    </p>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="feature-item flex items-center gap-3.5 p-3 rounded-xl">
                            <div
                                class="w-10 h-10 rounded-xl bg-red-600/10 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-pizza-slice text-red-500 text-sm"></i>
                            </div>
                            <span class="text-stone-300 text-sm">Recetas originales cubanas</span>
                        </div>
                        <div class="feature-item flex items-center gap-3.5 p-3 rounded-xl">
                            <div
                                class="w-10 h-10 rounded-xl bg-orange-600/10 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-fire-flame-curved text-orange-500 text-sm"></i>
                            </div>
                            <span class="text-stone-300 text-sm">Preparación artesanal diaria</span>
                        </div>
                        <div class="feature-item flex items-center gap-3.5 p-3 rounded-xl">
                            <div
                                class="w-10 h-10 rounded-xl bg-amber-600/10 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-heart text-amber-500 text-sm"></i>
                            </div>
                            <span class="text-stone-300 text-sm">Sabor auténtico caribeño</span>
                        </div>
                        <div class="feature-item flex items-center gap-3.5 p-3 rounded-xl">
                            <div
                                class="w-10 h-10 rounded-xl bg-red-600/10 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-red-500 text-sm"></i>
                            </div>
                            <span class="text-stone-300 text-sm">Moultrie, Georgia, USA</span>
                        </div>
                    </div>
                </div>

                <!-- Card de filosofía -->
                <div class="reveal" style="transition-delay: 0.15s;">
                    <div class="philosophy-border">
                        <div class="philosophy-inner p-10 md:p-12 text-center">

                            <div
                                class="w-16 h-16 rounded-2xl bg-red-600/10 flex items-center justify-center mx-auto mb-6">
                                <i class="fa-solid fa-quote-left text-red-500 text-xl"></i>
                            </div>

                            <h3 class="font-display text-2xl md:text-3xl font-bold mb-4">
                                Nuestra Filosofía
                            </h3>

                            <p class="text-stone-400 text-base md:text-lg leading-relaxed mb-10 max-w-sm mx-auto">
                                Cada pizza que sale de nuestro horno representa nuestro amor
                                por la cultura cubana, la calidad y el buen servicio.
                            </p>

                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <p class="font-display text-3xl md:text-4xl font-bold text-red-500">100%</p>
                                    <p class="text-stone-500 text-xs mt-1.5 tracking-wide">Artesanal</p>
                                </div>
                                <div>
                                    <p class="font-display text-3xl md:text-4xl font-bold text-red-500">+5</p>
                                    <p class="text-stone-500 text-xs mt-1.5 tracking-wide">Años de experiencia</p>
                                </div>
                                <div>
                                    <p class="font-display text-3xl md:text-4xl font-bold text-red-500">&infin;</p>
                                    <p class="text-stone-500 text-xs mt-1.5 tracking-wide">Pasión por el sabor</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ===== DIVIDER ===== -->
        <div class="section-divider"></div>

        <!-- ===== MENÚ ===== -->
        <section id="menu" class="py-24 md:py-32 relative">
            <div class="max-w-7xl mx-auto px-6">

                <!-- Encabezado -->
                <div class="text-center mb-14 reveal">
                    <span
                        class="inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-[3px] text-red-500 mb-6 justify-center">
                        <span class="w-7 h-px bg-red-500"></span>
                        Nuestro Menú
                        <span class="w-7 h-px bg-red-500"></span>
                    </span>
                    <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold" style="letter-spacing: -0.5px;">
                        Pizzas Artesanales
                    </h2>
                    <p class="mt-4 text-stone-400 max-w-lg mx-auto text-base">
                        Con auténtico sabor cubano, hechas al momento con ingredientes frescos.
                    </p>
                </div>

                <!-- Separador de fuego -->
                <div class="flex justify-center mb-12 reveal" style="transition-delay:0.1s;">
                    <div class="separator-fire"></div>
                </div>

                <?php if (!empty($categories)) { ?>
                    <!-- Tabs de categorías -->
                    <div class="mb-12 reveal" style="transition-delay:0.15s;">
                        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-2" id="categoryTabs">
                            <?php if (!empty($products)) { ?>
                                <button class="category-tab active px-5 py-2.5 text-sm font-medium" data-category="all">
                                    Todos
                                </button>
                                <?php foreach ($categories as $cat) { ?>
                                    <button class="category-tab px-5 py-2.5 text-sm font-medium" data-category="<?= $cat->id ?>">
                                        <?= $cat->name ?>
                                    </button>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>


                <?php if (!empty($products)) { ?>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

                        <?php foreach ($products as $p) {
                            $isPopular = ($p->popular == '1');
                            $hasOffer = ($p->new_price != '0');

                            $cardClasses = 'product-card';
                            if ($isPopular)
                                $cardClasses .= ' fire-border';
                            ?>

                            <div class="<?= $cardClasses ?> product-card reveal" data-category="<?= $p->category_id ?>">

                                <!-- Badges -->
                                <div class="relative">
                                    <?php if ($isPopular) { ?>
                                        <span
                                            class="badge-popular absolute top-4 left-4 text-xs font-bold px-3 py-1.5 rounded-full z-10 tracking-wide">
                                            <i class="fa-solid fa-star text-[10px] mr-1"></i> POPULAR
                                        </span>
                                    <?php } ?>

                                    <?php if ($hasOffer) { ?>
                                        <span
                                            class="badge-offer absolute top-4 right-4 text-xs font-bold px-3 py-1.5 rounded-full z-10 tracking-wide">
                                            <i class="fa-solid fa-fire text-[10px] mr-1"></i> OFERTA
                                        </span>
                                    <?php } ?>

                                    <!-- Imagen -->
                                    <div class="h-56 overflow-hidden bg-stone-900/50">
                                        <img src="<?= base_url('public/images/pizzas/' . esc($p->img)); ?>"
                                            alt="<?= esc($p->name); ?>" loading="lazy" decoding="async"
                                            class="product-img h-full w-full object-cover">
                                    </div>
                                </div>

                                <!-- Contenido -->
                                <div class="p-6">
                                    <h3 class="font-display text-xl font-bold mb-1.5">
                                        <?= esc($p->name); ?>
                                    </h3>

                                    <p class="text-stone-500 text-sm mb-5 leading-relaxed line-clamp-2">
                                        <?= esc($p->description); ?>
                                    </p>

                                    <div class="flex justify-between items-end">

                                        <!-- Precio -->
                                        <?php if ($hasOffer) { ?>
                                            <div class="flex items-baseline gap-2.5">
                                                <span class="text-sm line-through text-stone-600">
                                                    $<?= number_format($p->price, 2); ?>
                                                </span>
                                                <span class="text-2xl font-bold text-red-500 font-display">
                                                    $<?= number_format($p->new_price, 2); ?>
                                                </span>
                                            </div>
                                        <?php } else { ?>
                                            <span
                                                class="text-2xl font-bold font-display <?= $isPopular ? 'text-amber-500' : 'text-red-500'; ?>">
                                                $<?= number_format($p->price, 2); ?>
                                            </span>
                                        <?php } ?>

                                        <!-- Botón ordenar -->
                                        <button
                                            class="btn-order px-5 py-2.5 text-sm <?= $isPopular ? 'btn-order-gold' : 'bg-red-600 hover:bg-red-700 text-white'; ?>"
                                            data-id="<?= $p->id; ?>" data-name="<?= esc($p->name); ?>"
                                            data-price="<?= $hasOffer ? $p->new_price : $p->price; ?>">
                                            Ordenar
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                <?php } else { ?>

                    <!-- Estado vacío: sin productos -->
                    <div class="flex flex-col items-center justify-center text-center py-24 reveal">
                        <div class="w-20 h-20 rounded-2xl bg-red-600/10 flex items-center justify-center mb-6">
                            <i class="fa-solid fa-pizza-slice text-3xl text-red-500"></i>
                        </div>
                        <h3 class="font-display text-3xl font-bold mb-4">
                            Menú en preparación
                        </h3>
                        <p class="text-stone-400 max-w-xl mb-8 leading-relaxed">
                            Estamos trabajando para traerte las mejores pizzas cubanas de Georgia.
                            Muy pronto nuestro menú estará disponible.
                        </p>
                        <a href="#" data-scroll="contact"
                            class="inline-flex items-center gap-2 px-8 py-3.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20"
                            style="text-decoration:none;">
                            <i class="fa-solid fa-phone text-sm"></i>
                            Contáctanos
                        </a>
                    </div>
                <?php } ?>

                <!-- Mensaje: sin productos en categoría -->
                <div id="noProductsMessage" class="hidden flex-col items-center justify-center text-center py-20">

                    <div class="w-16 h-16 rounded-2xl bg-stone-800/60 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-magnifying-glass text-xl text-stone-500"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 font-display">
                        Sin productos en esta categoría
                    </h3>
                    <p class="text-stone-500 max-w-md text-sm">
                        Explora otras categorías para encontrar tu pizza favorita.
                    </p>
                </div>

            </div>
        </section>

    </main>

    <!-- ===== DIVIDER ===== -->
    <div class="section-divider"></div>

    <!-- ===== CARRITO FLOTANTE ===== -->
    <div id="cartBox" class="fixed bottom-6 right-6 p-5 w-72 hidden z-40">

        <div class="flex items-center gap-2.5 mb-4">
            <div class="w-8 h-8 rounded-lg bg-red-600/15 flex items-center justify-center">
                <i class="fa-solid fa-bag-shopping text-red-500 text-sm"></i>
            </div>
            <h4 class="font-display font-bold text-sm">Tu Pedido</h4>
        </div>

        <div id="cartItems" class="space-y-2.5 text-sm max-h-44 overflow-y-auto pr-1"
            style="scrollbar-width:thin; scrollbar-color: rgba(255,255,255,0.1) transparent;"></div>

        <div class="border-t border-white/8 mt-4 pt-4 flex justify-between items-baseline">
            <span class="text-stone-400 text-sm font-medium">Total</span>
            <span id="cartTotal" class="font-display text-xl font-bold text-red-500">$0.00</span>
        </div>

        <button id="clearCart"
            class="mt-4 w-full py-2.5 rounded-xl text-sm font-medium text-stone-400 hover:text-white bg-white/5 hover:bg-white/10 transition-all duration-300">
            <i class="fa-solid fa-trash-can text-xs mr-1.5"></i> Vaciar carrito
        </button>
        <button id="openCheckout"
            class="mt-2.5 w-full py-3 rounded-xl text-sm font-semibold bg-red-600 hover:bg-red-700 transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20">
            Confirmar pedido
        </button>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer id="contact" class="pt-24 pb-10 relative overflow-hidden">
        <!-- Blob decorativo -->
        <div class="warm-blob"
            style="width:500px;height:500px;background:rgba(220,38,38,0.04);bottom:-20%;left:50%;transform:translateX(-50%);"
            aria-hidden="true"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12 text-stone-400">

                <!-- Logo y descripción -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <img src="<?= base_url('public/images/logo.png'); ?>" alt="La Cubana Pizzería" loading="lazy"
                        decoding="async" class="h-20 mb-5">
                    <p class="text-sm leading-relaxed">
                        Auténtico sabor cubano en cada pizza. Tradición, calidad y pasión artesanal desde Moultrie,
                        Georgia.
                    </p>
                </div>

                <!-- Contacto -->
                <div>
                    <h3 class="text-white font-display font-bold mb-6">Contacto</h3>
                    <div class="space-y-3">
                        <a href="tel:+19125208544"
                            class="phone-link flex items-center gap-3 py-3.5 px-4 text-stone-300">
                            <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider w-16">ENG</span>
                            <i class="fa-solid fa-phone text-xs text-red-500"></i>
                            <span class="font-semibold text-sm">(912) 520-8544</span>
                        </a>
                        <a href="tel:+12294549662"
                            class="phone-link flex items-center gap-3 py-3.5 px-4 text-stone-300">
                            <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider w-16">ESP</span>
                            <i class="fa-solid fa-phone text-xs text-red-500"></i>
                            <span class="font-semibold text-sm">(229) 454-9662</span>
                        </a>
                    </div>
                </div>

                <!-- Horario -->
                <div>
                    <h3 class="text-white font-display font-bold mb-6">Horario</h3>
                    <ul class="space-y-3.5 text-sm">
                        <li class="flex items-center gap-3">
                            <i class="fa-regular fa-clock text-xs text-red-500 w-4 text-center"></i>
                            <span>Lun – Sáb: <strong class="text-white">11:00 AM – 9:00 PM</strong></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-regular fa-clock text-xs text-red-500 w-4 text-center"></i>
                            <span>Domingo: <strong class="text-white">12:00 PM – 8:00 PM</strong></span>
                        </li>
                    </ul>
                </div>

                <!-- Ubicación -->
                <div>
                    <h3 class="text-white font-display font-bold mb-6">Ubicación</h3>
                    <div class="rounded-2xl overflow-hidden border border-white/7 mb-4">
                        <iframe
                            src="https://www.google.com/maps?q=1807%20Garden%20Villa%20Dr,%20Moultrie,%20GA&output=embed"
                            width="100%" height="200" style="border:0;" allowfullscreen loading="lazy"
                            title="Mapa de ubicación de Pizzería La Cubana">
                        </iframe>
                    </div>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=1807+Garden+Villa+Dr+Moultrie+GA"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20"
                        style="text-decoration:none;">
                        <i class="fa-solid fa-diamond-turn-right text-xs"></i>
                        Cómo llegar
                    </a>
                </div>

            </div>

            <!-- Divider del footer -->
            <div class="mt-16 border-t border-white/7"></div>

            <!-- Pie final -->
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-stone-600">
                <span>&copy; <?= date('Y'); ?> Pizzería La Cubana. Todos los derechos reservados.</span>
                <span>Hecho por <a href="https://avsoftwares.dev/" target="_blank" rel="noopener noreferrer"
                        class="text-red-500 hover:text-red-400 font-medium">AVSoftwares</a></span>
            </div>
        </div>
    </footer>


    <!-- ===============================
         SISTEMA DE OVERLAY GLOBAL
    ================================ -->
    <div id="ui-layer" class="fixed inset-0 pointer-events-none z-[9999]">

        <!-- OFFLINE -->
        <div id="offlineScreen"
            class="absolute inset-0 bg-[#0c0a09] hidden items-center justify-center pointer-events-auto">
            <div class="text-center">
                <div class="w-20 h-20 rounded-2xl bg-red-600/10 flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-triangle-exclamation text-3xl text-red-500"></i>
                </div>
                <h1 class="font-display text-2xl font-bold mb-3 text-white">Sin conexión</h1>
                <p class="text-stone-500">Revisa tu conexión a internet para continuar.</p>
            </div>
        </div>

        <!-- MODAL CHECKOUT -->
        <div id="modalCheckout"
            class="absolute inset-0 modal-backdrop hidden items-center justify-center pointer-events-auto p-4">
            <div class="modal-card p-7 w-full max-w-sm relative">
                <button id="closeCheckout"
                    class="absolute top-4 right-4 text-stone-500 hover:text-white transition-colors w-8 h-8 flex items-center justify-center rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-green-600/15 flex items-center justify-center">
                        <i class="fa-solid fa-clipboard-check text-green-500"></i>
                    </div>
                    <h3 class="font-display text-xl font-bold">Confirmar orden</h3>
                </div>

                <input id="clientName" type="text" placeholder="Tu nombre" class="modal-input mb-3">
                <input id="clientPhone" type="text" placeholder="(XXX) XXX-XXXX" class="modal-input mb-6">

                <button id="confirmOrder"
                    class="w-full py-3.5 rounded-xl font-semibold bg-green-600 hover:bg-green-700 transition-all duration-300 hover:shadow-lg hover:shadow-green-600/20">
                    Confirmar orden
                </button>
            </div>
        </div>

        <!-- MODAL CANTIDAD -->
        <div id="modalQty"
            class="absolute inset-0 modal-backdrop hidden items-center justify-center pointer-events-auto p-4">
            <div class="modal-card p-7 w-full max-w-sm text-center relative">
                <button id="closeQty"
                    class="absolute top-4 right-4 text-stone-500 hover:text-white transition-colors w-8 h-8 flex items-center justify-center rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="w-12 h-12 rounded-2xl bg-red-600/15 flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-cart-plus text-red-500"></i>
                </div>

                <h3 id="qtyProductName" class="font-display text-xl font-bold mb-6"></h3>

                <input type="number" id="qtyInput" min="1" value="1"
                    class="modal-input text-center text-lg font-semibold mb-6">

                <button id="addToCart"
                    class="w-full py-3.5 rounded-xl font-semibold bg-red-600 hover:bg-red-700 transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20">
                    Añadir al carrito
                </button>
            </div>
        </div>

        <!-- MODAL ÉXITO -->
        <div id="successModal"
            class="absolute inset-0 modal-backdrop hidden items-center justify-center pointer-events-auto p-4">
            <div class="modal-card px-12 py-12 text-center max-w-sm w-full">
                <div class="w-20 h-20 rounded-full bg-green-600/15 flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-check text-3xl text-green-500"></i>
                </div>
                <h3 class="font-display text-2xl font-bold text-green-400 mb-3">
                    ¡Orden realizada!
                </h3>
                <p class="text-stone-400 text-sm leading-relaxed">
                    Tu orden fue procesada con éxito. Te contactaremos pronto para confirmar los detalles.
                </p>
            </div>
        </div>

        <!-- TOAST -->
        <div id="appToast" class="absolute top-6 right-6 hidden pointer-events-auto">
            <div class="toast-card flex items-center gap-3.5 px-5 py-4 min-w-[280px]">
                <div id="toastIcon" class="text-xl flex-shrink-0"></div>
                <div id="toastText" class="text-sm font-medium text-stone-200"></div>
            </div>
        </div>
    </div>


    <!-- ===== JQUERY ===== -->
    <script src="<?php echo base_url('public/assets/jquery/dist/jquery.min.js'); ?>"></script>

    <script>
        $(function () {

            /* ==========================================
               NAVBAR SCROLL
            ========================================== */
            var $navbar = $('#navbar');
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 60) {
                    $navbar.addClass('scrolled');
                } else {
                    $navbar.removeClass('scrolled');
                }
            });

            /* ==========================================
               MENÚ MÓVIL
            ========================================== */
            var $menuBtn = $('#menu-btn');
            var $mobileMenu = $('#mobile-menu');

            $menuBtn.on('click', function () {
                var isOpen = $mobileMenu.hasClass('open');
                $menuBtn.toggleClass('active');
                $mobileMenu.toggleClass('open');
                $menuBtn.attr('aria-expanded', !isOpen);
                $('body').css('overflow', isOpen ? '' : 'hidden');
            });

            /* ==========================================
               SCROLL SUAVE A SECCIONES
            ========================================== */
            $('[data-scroll]').on('click', function (e) {
                e.preventDefault();

                // Cerrar menú móvil si está abierto
                if ($mobileMenu.hasClass('open')) {
                    $menuBtn.removeClass('active');
                    $mobileMenu.removeClass('open');
                    $menuBtn.attr('aria-expanded', 'false');
                    $('body').css('overflow', '');
                }

                var targetId = $(this).data('scroll');
                var $section = $('#' + targetId);

                if ($section.length) {
                    var offset = 80;
                    var top = $section.offset().top - offset;
                    $('html, body').animate({ scrollTop: top }, 600, 'swing');
                }
            });


            /* =====================================================
               ESTADO GLOBAL
            ====================================================== */
            var cart = JSON.parse(getCookie('cart') || '[]');
            var currentProduct = null;

            renderCart();
            updateConnectionStatus();


            /* =====================================================
               TOAST
            ====================================================== */
            function showToast(icon, message) {
                $('#toastIcon').text(icon);
                $('#toastText').text(message);
                $('#appToast').removeClass('hidden').hide().fadeIn(250);
                clearTimeout(showToast._timer);
                showToast._timer = setTimeout(function () {
                    $('#appToast').fadeOut(250);
                }, 3000);
            }


            /* =====================================================
               PRODUCTOS - AGREGAR AL CARRITO
            ====================================================== */
            $('.btn-order').on('click', function () {
                currentProduct = {
                    id: $(this).data('id'),
                    name: $(this).data('name'),
                    price: parseFloat($(this).data('price'))
                };
                $('#qtyProductName').text(currentProduct.name);
                $('#qtyInput').val(1);
                $('#modalQty').removeClass('hidden').addClass('flex');
            });

            $('#closeQty').on('click', function () {
                $('#modalQty').addClass('hidden').removeClass('flex');
            });

            $('#addToCart').on('click', function () {
                var qty = parseInt($('#qtyInput').val(), 10);

                if (isNaN(qty) || qty < 1) {
                    showToast('⚠️', 'La cantidad mínima es 1');
                    $('#qtyInput').val(1).focus();
                    return;
                }

                var found = cart.find(function (p) { return p.id === currentProduct.id; });

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
                showToast('✅', currentProduct.name + ' añadido');
            });


            /* =====================================================
               CARRITO
            ====================================================== */
            $(document).on('click', '.remove-item', function () {
                var id = $(this).data('id');
                cart = cart.filter(function (p) { return p.id !== id; });
                saveCart();
                renderCart();
                showToast('🗑️', 'Producto eliminado');
            });

            $('#clearCart').on('click', function () {
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

                var total = 0;

                cart.forEach(function (p) {
                    total += p.price * p.quantity;
                    $('#cartItems').append(
                        '<div class="flex justify-between items-center py-2 border-b border-white/5 last:border-0">' +
                        '<div class="min-w-0">' +
                        '<span class="text-sm text-stone-200 block truncate">' + p.name + '</span>' +
                        '<span class="text-xs text-stone-500">x' + p.quantity + ' &middot; $' + (p.price * p.quantity).toFixed(2) + '</span>' +
                        '</div>' +
                        '<button class="remove-item text-stone-600 hover:text-red-500 transition-colors ml-3 flex-shrink-0 w-7 h-7 flex items-center justify-center rounded-lg hover:bg-red-600/10" data-id="' + p.id + '">' +
                        '<i class="fa-solid fa-xmark text-xs"></i>' +
                        '</button>' +
                        '</div>'
                    );
                });

                $('#cartTotal').text('$' + total.toFixed(2));
            }


            /* =====================================================
               CHECKOUT
            ====================================================== */
            $('#openCheckout').on('click', function () {
                resetCheckoutForm();
                $('#modalCheckout').removeClass('hidden').addClass('flex');
            });

            $('#closeCheckout').on('click', function () {
                $('#modalCheckout').addClass('hidden').removeClass('flex');
            });

            $('#confirmOrder').on('click', function () {
                var name = $('#clientName').val().trim();
                var phoneRaw = $('#clientPhone').val().trim();
                var phoneDigits = phoneRaw.replace(/\D/g, '');

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
                    showToast('⚠️', 'Número inválido (10 dígitos USA)');
                    $('#clientPhone').focus();
                    return;
                }

                var totalPrice = cart.reduce(function (acc, p) { return acc + (p.price * p.quantity); }, 0);
                totalPrice = parseFloat(totalPrice.toFixed(2));

                var products = cart.map(function (p) {
                    return { id: p.id, quantity: p.quantity };
                });

                var button = $('#confirmOrder');
                button.text('Procesando...').prop('disabled', true);

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
                    success: function (res) {
                        if (res.error === 0) {
                            showSuccessModal();
                            cart = [];
                            saveCart();
                            renderCart();
                            $('#modalCheckout').addClass('hidden').removeClass('flex');
                            resetCheckoutForm();
                        } else {
                            showToast('⚠️', 'Error al procesar la orden');
                        }
                        button.text('Confirmar orden').prop('disabled', false);
                    },
                    error: function () {
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
               VALIDACIONES DE INPUT
            ===================================================== */
            $('#clientName').on('input', function () {
                this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
            });

            $('#clientPhone').on('input', function () {
                var numbers = this.value.replace(/\D/g, '').substring(0, 10);
                var formatted = '';
                if (numbers.length > 0) formatted = '(' + numbers.substring(0, 3);
                if (numbers.length >= 4) formatted += ') ' + numbers.substring(3, 6);
                if (numbers.length >= 7) formatted += '-' + numbers.substring(6, 10);
                this.value = formatted;
            });


            /* =====================================================
               FILTRO DE CATEGORÍAS
            ===================================================== */
            $('.category-tab').on('click', function () {
                $('.category-tab').removeClass('active');
                $(this).addClass('active');

                var selected = $(this).data('category');
                var visibleCount = 0;

                $('.product-card').each(function () {
                    var productCategory = $(this).data('category');
                    if (selected === 'all' || productCategory == selected) {
                        $(this).fadeIn(250);
                        visibleCount++;
                    } else {
                        $(this).hide();
                    }
                });

                if (visibleCount === 0) {
                    $('#noProductsMessage').removeClass('hidden').addClass('flex').hide().fadeIn(200);
                } else {
                    $('#noProductsMessage').fadeOut(150, function () {
                        $(this).addClass('hidden').removeClass('flex');
                    });
                }
            });


            /* =====================================================
               CONTROL OFFLINE
            ===================================================== */
            window.addEventListener('offline', updateConnectionStatus);
            window.addEventListener('online', updateConnectionStatus);

            function updateConnectionStatus() {
                if (!navigator.onLine) {
                    $('#offlineScreen').removeClass('hidden').addClass('flex');
                    $('body, html').css('overflow', 'hidden');
                } else {
                    $('#offlineScreen').addClass('hidden').removeClass('flex');
                    $('body, html').css('overflow', '');
                }
            }


            /* =====================================================
               COOKIES
            ===================================================== */
            function saveCart() {
                document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) + ";path=/;max-age=86400";
            }

            function getCookie(name) {
                var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? decodeURIComponent(match[2]) : null;
            }


            /* =====================================================
               MODAL DE ÉXITO
            ===================================================== */
            function showSuccessModal() {
                $('#successModal').removeClass('hidden').addClass('flex');
                setTimeout(function () {
                    $('#successModal').addClass('hidden').removeClass('flex');
                }, 5000);
            }


            /* =====================================================
               CERRAR MODALES CON CLIC EN BACKDROP
            ===================================================== */
            $('#modalCheckout, #modalQty').on('click', function (e) {
                if (e.target === this) {
                    $(this).addClass('hidden').removeClass('flex');
                }
            });

        });


        /* =====================================================
           SCROLL REVEAL (IntersectionObserver)
        ===================================================== */
        (function () {
            var revealEls = document.querySelectorAll('.reveal');
            if (!revealEls.length) return;

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        // Respetar transition-delay definido en style
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

            revealEls.forEach(function (el) {
                observer.observe(el);
            });
        })();
    </script>

</body>

</html>