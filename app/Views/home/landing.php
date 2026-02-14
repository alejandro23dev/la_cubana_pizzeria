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

    <!-- Open Graph -->
    <meta property="og:title" content="Pizzería La Cubana | Pizza Cubana en Georgia">
    <meta property="og:description" content="Auténtica pizza cubana artesanal en Moultrie, Georgia.">
    <meta property="og:image" content="<?= base_url('public/images/logo.png'); ?>">
    <meta property="og:url" content="<?= base_url(); ?>">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico'); ?>">

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">

    <!-- jQuery -->
    <script src="<?php echo base_url('public/assets/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- SWEET toast 2 -->
    <script src="<?= base_url('public/assets/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('public/assets/sweetalert2/dist/sweetalert2.min.css'); ?>">
</head>

<body class="bg-neutral-950 text-white overflow-x-hidden">
    <nav class="fixed top-0 left-0 w-full z-50 bg-black/70 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="<?= base_url('public/images/logo.png'); ?>"
                    alt="La Cubana"
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
                playsinline>
                <source src="<?= base_url('videos/hero.mp4'); ?>" type="video/mp4">
                Tu navegador no soporta video HTML5.
            </video>

            <!-- OVERLAY OSCURO -->
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- CONTENIDO -->
            <div class="relative z-10 max-w-5xl text-center px-6">

                <img src="<?= base_url('public/images/logo.png'); ?>"
                    class="mx-auto h-48 mb-8 animate-fade-up"
                    style="animation-delay: 0.2s">

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

                <div class="flex justify-center my-12">
                    <div class="separator-fire"></div>
                </div>

                <?php if (!empty($categories)) { ?>

                    <!-- TABS CATEGORÍAS -->
                    <div class="mb-14">

                        <div class="flex overflow-x-auto no-scrollbar gap-4 pb-2"
                            id="categoryTabs">

                            <!-- TAB TODOS -->
                            <button
                                class="category-tab active-tab whitespace-nowrap px-6 py-2 rounded-full text-sm font-semibold transition"
                                data-category="all">
                                Todos
                            </button>

                            <?php foreach ($categories as $cat) { ?>
                                <button
                                    class="category-tab whitespace-nowrap px-6 py-2 rounded-full text-sm font-semibold transition"
                                    data-category="<?= $cat->id ?>">
                                    <?= esc($cat->name) ?>
                                </button>
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
                                            class="btn-order px-4 py-2 rounded-full text-sm transition cursor-pointer
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
        class="fixed bottom-6 right-6 bg-neutral-900 border border-white/10 rounded-xl p-4 w-72 hidden z-50">

        <h4 class="font-bold mb-2">🛒 Tu pedido</h4>

        <div id="cartItems" class="space-y-2 text-sm max-h-40 overflow-y-auto"></div>

        <div class="border-t border-white/10 mt-3 pt-3 flex justify-between font-bold">
            <span>Total</span>
            <span id="cartTotal">$0.00</span>
        </div>

        <button id="openCheckout"
            class="mt-3 w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold cursor-pointer">
            Confirmar pedido
        </button>
    </div>

    <div id="modalCheckout" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
        <div class="bg-neutral-900 rounded-xl p-6 w-full max-w-sm relative">

            <button id="closeCheckout" class="absolute top-3 right-3 text-white/60">✕</button>

            <h3 class="text-xl font-bold mb-4">Confirmar orden</h3>

            <input id="clientName" type="text" placeholder="Nombre"
                class="w-full bg-neutral-800 px-3 py-2 rounded mb-3">

            <input id="clientPhone" type="text" placeholder="Teléfono"
                class="w-full bg-neutral-800 px-3 py-2 rounded mb-4">

            <button id="confirmOrder"
                class="w-full bg-green-600 hover:bg-green-700 py-2 rounded font-bold cursor-pointer">
                Confirmar orden
            </button>
        </div>
    </div>

    <footer id="contact" class="bg-black border-t border-white/10 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-12 text-white/70">

            <!-- LOGO / DESCRIPCIÓN -->
            <div class="text-center lg:text-left">
                <img src="<?= base_url('public/images/logo.png'); ?>"
                    alt="La Cubana Pizzeria"
                    class="h-24 mx-auto lg:mx-0 mb-6">
                <p class="text-sm leading-relaxed mb-4">
                    Auténtico sabor cubano en cada pizza.
                    Tradición, calidad y pasión artesanal desde Moultrie 🍕
                </p>

                <!-- REDES -->
                <!-- <div class="flex justify-center lg:justify-start gap-4 mt-4">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-800 hover:bg-red-600 transition">📘</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-800 hover:bg-red-600 transition">📸</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-800 hover:bg-red-600 transition">🐦</a>
                </div> -->
            </div>

            <!-- CONTACTO (MEJORADO) -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-white mb-6">Contacto rápido</h3>

                <div class="space-y-4">
                    <a href="tel:12294560239"
                        class="flex items-center justify-center gap-3 bg-neutral-900 hover:bg-neutral-800 py-3 rounded-xl transition">
                        📞 <span class="font-semibold">229-456-0239</span>
                    </a>

                    <a href="tel:12294549662"
                        class="flex items-center justify-center gap-3 bg-neutral-900 hover:bg-neutral-800 py-3 rounded-xl transition">
                        📞 <span class="font-semibold">229-454-9662</span>
                    </a>

                    <a href="https://wa.me/12294560239"
                        target="_blank"
                        class="flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold transition">
                        WhatsApp
                    </a>
                </div>
            </div>

            <!-- HORARIOS -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-white mb-6">Horario</h3>

                <ul class="space-y-3 text-sm">
                    <li>🕒 Lun – Jue: <strong>11:00 AM – 9:00 PM</strong></li>
                    <li>🕒 Vie – Sáb: <strong>11:00 AM – 11:00 PM</strong></li>
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
            © <?= date('Y'); ?> Pizzería La Cubana · Hecho por <a href="https://www.instagram.com/aleh.vzq/" target="_blank" class="text-red-500 hover:underline">Alejandro Vázquez</a>
        </div>
    </footer>

    <div id="modalQty" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
        <div class="bg-neutral-900 rounded-xl p-6 w-full max-w-sm text-center relative">

            <button id="closeQty" class="absolute top-3 right-3 text-white/60 hover:text-white">✕</button>

            <h3 id="qtyProductName" class="text-xl font-bold mb-4"></h3>

            <input
                type="number"
                id="qtyInput"
                min="1"
                step="1"
                inputmode="numeric"
                pattern="[0-9]*"
                class="w-full bg-neutral-800 px-3 py-2 rounded text-center mb-6">

            <button id="addToCart"
                class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold">
                Añadir al carrito
            </button>
        </div>
    </div>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('[data-scroll]').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();

                const targetId = link.getAttribute('data-scroll');
                const section = document.getElementById(targetId);

                // cerrar menú móvil al hacer click
                mobileMenu.classList.add('hidden');

                if (section) {
                    const offset = 80;
                    const top = section.getBoundingClientRect().top + window.pageYOffset - offset;

                    window.scrollTo({
                        top,
                        behavior: 'smooth'
                    });
                }
            });
        });

        function toast(icon, message) {
            Swal.fire({
                icon: icon, // success | error | warning | info
                title: message,
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        }
    </script>

    <!-- SCRIPT CARRITO -->
    <script>
        $(document).ready(function() {
            let cart = JSON.parse(getCookie('cart') || '[]');
            let currentProduct = null;

            renderCart();

            /* ---------- ORDENAR ---------- */
            $('.btn-order').on('click', function() {
                currentProduct = {
                    id: $(this).data('id'),
                    name: $(this).data('name'),
                    price: parseFloat($(this).data('price'))
                };

                $('#qtyProductName').text(currentProduct.name);
                $('#qtyInput').val(1);
                $('#modalQty').addClass('flex').removeClass('hidden');
            });

            $('#closeQty').click(() => $('#modalQty').addClass('hidden'));

            $('#addToCart').click(() => {
                let qtyRaw = $('#qtyInput').val();

                // convertir y validar
                let qty = parseInt(qtyRaw, 10);

                if (isNaN(qty) || qty < 1) {
                    toast('error', 'La cantidad mínima es 1');
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
                $('#modalQty').addClass('hidden');
            });

            /* ---------- CARRITO ---------- */
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
                    $('#cartItems').append(
                        `<div class="flex justify-between">
          <span>${p.name} x${p.quantity}</span>
          <span>$${(p.price * p.quantity).toFixed(2)}</span>
        </div>`
                    );
                });

                $('#cartTotal').text('$' + total.toFixed(2));
            }

            /* ---------- CHECKOUT ---------- */
            $('#openCheckout').click(() => $('#modalCheckout').addClass('flex').removeClass('hidden'));
            $('#closeCheckout').click(() => $('#modalCheckout').addClass('hidden'));

            $('#confirmOrder').click(() => {
                let name = $('#clientName').val().trim();
                let phone = $('#clientPhone').val().trim();
                let totalPrice = 0;

                let nameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,}$/;
                let phoneRegex = /^\+?[0-9]{7,15}$/;

                if (name === '' || phone === '') {
                    toast('error', 'Debes ingresar tu nombre y teléfono');
                    return;
                }

                if (!nameRegex.test(name)) {
                    toast('error', 'El nombre solo puede contener letras');
                    $('#clientName').focus();
                    return;
                }

                if (!phoneRegex.test(phone)) {
                    toast('error', 'Teléfono inválido');
                    $('#clientPhone').focus();
                    return;
                }

                if (cart.length === 0 || name === '' || phone === '') {
                    toast('error', 'Debes añadir productos, nombre y teléfono');
                    return;
                }

                cart.forEach(p => {
                    totalPrice += p.price * p.quantity;
                });

                totalPrice = parseFloat(totalPrice.toFixed(2));

                let products = cart.map(p => ({
                    id: p.id,
                    quantity: p.quantity
                }));

                $.ajax({
                    url: "<?= base_url('makeOrder'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        client_name: name,
                        client_phone: phone,
                        products: JSON.stringify(products),
                        total_price: totalPrice
                    },
                    success: res => {
                        if (res.error === 0) {
                            toast('success', 'Orden enviada correctamente');
                            cart = [];
                            saveCart();
                            renderCart();
                            $('#modalCheckout').addClass('hidden');
                        } else {
                            toast('error', 'Error al procesar la orden');
                        }
                    }
                });
            });

            /* ---------- COOKIE ---------- */
            function saveCart() {
                document.cookie = "cart=" + JSON.stringify(cart) + ";path=/;max-age=86400";
            }

            function getCookie(name) {
                let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? match[2] : null;
            }

            $('#clientName').on('input', function() {
                this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
            });

            $('#clientPhone').on('input', function() {
                // permitir solo + y números
                this.value = this.value.replace(/[^0-9+]/g, '');

                // solo un +
                if ((this.value.match(/\+/g) || []).length > 1) {
                    this.value = this.value.replace(/\+/g, '');
                }

                // máximo 15 caracteres
                if (this.value.length > 15) {
                    this.value = this.value.slice(0, 15);
                }
            });

            /* ---------- FILTRO POR CATEGORÍA ---------- */
            $('.category-tab').on('click', function() {

                $('.category-tab').removeClass('active-tab');
                $(this).addClass('active-tab');

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

                // Mostrar u ocultar mensaje vacío
                if (visibleCount === 0) {
                    $('#noProductsMessage').removeClass('hidden').fadeIn(200);
                } else {
                    $('#noProductsMessage').fadeOut(150, function() {
                        $(this).addClass('hidden');
                    });
                }
            });
        });
    </script>
</body>

</html>