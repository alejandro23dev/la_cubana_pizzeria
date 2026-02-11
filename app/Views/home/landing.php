<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pizzería La Cubana</title>
    <meta name="description" content="Pizzería La Cubana: auténtico sabor cubano con pizzas artesanales.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico'); ?>">

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Animaciones base -->
    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 1s ease-out forwards;
        }

        @keyframes fireGlow {
            0% {
                box-shadow: 0 0 10px rgba(255, 180, 0, .4);
            }

            50% {
                box-shadow: 0 0 25px rgba(255, 140, 0, .9);
            }

            100% {
                box-shadow: 0 0 10px rgba(255, 180, 0, .4);
            }
        }

        .fire-border {
            border: 3px solid #facc15;
            /* amarillo oro */
            animation: fireGlow 2s infinite ease-in-out;
        }

        /* Separador base */
        .separator-fire {
            width: 220px;
            height: 4px;
            border-radius: 999px;
            background: linear-gradient(90deg,
                    #ef4444,
                    #facc15,
                    #ef4444);
            background-size: 300% 100%;
            animation: fireMove 3s ease-in-out infinite;
            box-shadow:
                0 0 10px rgba(239, 68, 68, 0.6),
                0 0 20px rgba(250, 204, 21, 0.6);
        }

        /* Animación */
        @keyframes fireMove {
            0% {
                background-position: 0% 50%;
                box-shadow:
                    0 0 8px rgba(239, 68, 68, 0.5),
                    0 0 16px rgba(250, 204, 21, 0.4);
            }

            50% {
                background-position: 100% 50%;
                box-shadow:
                    0 0 16px rgba(239, 68, 68, 0.9),
                    0 0 30px rgba(250, 204, 21, 0.9);
            }

            100% {
                background-position: 0% 50%;
                box-shadow:
                    0 0 8px rgba(239, 68, 68, 0.5),
                    0 0 16px rgba(250, 204, 21, 0.4);
            }
        }
    </style>
</head>

<body class="bg-neutral-950 text-white overflow-x-hidden">
    <nav class="fixed top-0 left-0 w-full z-50 bg-black/70 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="<?= base_url('images/logo.png'); ?>"
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

                <img src="<?= base_url('images/logo.png'); ?>"
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
                        <span class="text-red-500">en el corazón de Georgia</span>
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
                            <span class="text-white/80">Ubicados en Georgia, USA</span>
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

                <?php if (!empty($pizzas)) { ?>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

                        <?php foreach ($pizzas as $p) {

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

                            <div class="<?= $cardClasses ?>">

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
                                <img src="<?= base_url('images/pizzas/' . esc($p->img)); ?>"
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
            class="mt-3 w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold">
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
                class="w-full bg-green-600 hover:bg-green-700 py-2 rounded font-bold">
                Confirmar orden
            </button>
        </div>
    </div>

    <footer id="contact" class="bg-black border-t border-white/10 py-12">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-white/70">

            <!-- Logo / Marca -->
            <div class="text-center md:text-left">
                <img src="<?= base_url('images/logo.png'); ?>"
                    alt="La Cubana Pizzeria"
                    class="h-20 mx-auto md:mx-0 mb-4">
                <p class="text-sm">
                    Auténtico sabor cubano en cada pizza 🍕
                </p>
            </div>

            <!-- Contacto -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-white mb-4">Contacto</h3>
                <p class="mb-2">
                    📞 <a href="tel:12294560239" class="hover:text-red-500 transition">
                        229-456-0239
                    </a>
                </p>
                <p>
                    📞 <a href="tel:12294549662" class="hover:text-red-500 transition">
                        229-454-9662
                    </a>
                </p>
            </div>

            <!-- Dirección -->
            <div class="text-center md:text-right">
                <h3 class="text-lg font-semibold text-white mb-4">Dirección</h3>
                <p class="leading-relaxed">
                    📍 1807 Garden Villa Dr<br>
                    Moultrie, GA
                </p>
            </div>

        </div>

        <!-- Línea inferior -->
        <div class="mt-10 border-t border-white/10 pt-6 text-center text-sm text-white/50">
            © <?= date('Y'); ?> Pizzería La Cubana · Todos los derechos reservados
        </div>
    </footer>

    <div id="modalQty" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
        <div class="bg-neutral-900 rounded-xl p-6 w-full max-w-sm text-center relative">

            <button id="closeQty" class="absolute top-3 right-3 text-white/60 hover:text-white">✕</button>

            <h3 id="qtyProductName" class="text-xl font-bold mb-4"></h3>

            <input type="number" id="qtyInput" min="1" value="1"
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
                let qty = parseInt($('#qtyInput').val());
                if (qty < 1) return;

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

                if (cart.length === 0 || name === '' || phone === '') {
                    alert('Debes añadir productos, nombre y teléfono');
                    return;
                }

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
                        products: JSON.stringify(products)
                    },
                    success: res => {
                        if (res.error === 0) {
                            alert('Orden enviada correctamente');
                            cart = [];
                            saveCart();
                            renderCart();
                            $('#modalCheckout').addClass('hidden');
                        } else {
                            alert('Error al procesar la orden');
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

        });
    </script>
</body>

</html>