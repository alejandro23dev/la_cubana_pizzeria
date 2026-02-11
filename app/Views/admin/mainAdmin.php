<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pizzería La Cubana | Panel de Administración</title>
    <meta name="description" content="Pizzería La Cubana: auténtico sabor cubano con pizzas artesanales.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico'); ?>">

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-neutral-950 text-white overflow-x-hidden">
    <nav class="w-full bg-black/80 backdrop-blur border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- IZQUIERDA: LOGO + NOMBRE -->
            <div class="flex items-center gap-3">
                <img src="<?= base_url('images/logo.png'); ?>"
                    alt="La Cubana"
                    class="h-10 w-auto">
                <span class="font-extrabold text-lg tracking-wide">
                    LA CUBANA · ADMIN
                </span>
            </div>

            <!-- CENTRO: MENU -->
            <ul class="hidden md:flex gap-10 text-sm font-semibold">
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>"
                        class="hover:text-red-500 transition <?= isset($dashboard_active) ? 'text-red-500' : ''; ?>">
                        Mis Pizzas
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/orders'); ?>"
                        class="hover:text-red-500 transition <?= isset($orders_active) ? 'text-red-500' : ''; ?>">
                        Órdenes
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/admins'); ?>"
                        class="hover:text-red-500 transition <?= isset($admins_active) ? 'text-red-500' : ''; ?>">
                        Administradores
                    </a>
                </li>
            </ul>

            <!-- DERECHA: USUARIO -->
            <div class="relative">
                <button id="btnUserMenu"
                    class="flex items-center gap-3 bg-neutral-900 px-4 py-2 rounded-lg hover:bg-neutral-800 transition">
                    <div class="text-right leading-tight">
                        <p class="text-sm font-semibold">
                            <?= esc(session()->get('admin_user')); ?>
                        </p>
                        <p class="text-xs text-white/60">
                            <?= esc(session()->get('admin_email') ?? 'No registrado'); ?>
                        </p>
                    </div>
                    <span class="text-white/60">▾</span>
                </button>

                <!-- DROPDOWN -->
                <div id="userDropdown"
                    class="absolute right-0 mt-2 w-44 bg-neutral-900 border border-white/10 rounded-lg shadow-lg hidden">

                    <button id="btnLogout"
                        class="w-full text-left px-4 py-3 text-sm hover:bg-red-600 transition">
                        🚪 Cerrar sesión
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <?php echo $page; ?>

    <script>
        $(document).ready(function() {
            /* =======================
               USER DROPDOWN
            ======================= */
            $('#btnUserMenu').on('click', function() {
                $('#userDropdown').toggleClass('hidden');
            });

            // Cerrar dropdown al hacer click fuera
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#btnUserMenu, #userDropdown').length) {
                    $('#userDropdown').addClass('hidden');
                }
            });

            /* =======================
               LOGOUT
            ======================= */
            $('#btnLogout').on('click', function() {
                if (!confirm('¿Deseas cerrar sesión?')) return;

                $.post("<?= base_url('admin/logout'); ?>", function() {
                    window.location.href = "<?= base_url('/'); ?>";
                });
            });

        });
    </script>

</body>

</html>