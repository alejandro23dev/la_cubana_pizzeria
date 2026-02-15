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
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/favicon.ico'); ?>">

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">

    <!-- jQuery -->
    <script src="<?php echo base_url('public/assets/jquery/dist/jquery.min.js'); ?>"></script>
</head>

<body class="bg-neutral-950 text-white overflow-x-hidden">
    <nav class="w-full bg-black/80 backdrop-blur border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- IZQUIERDA: LOGO -->
            <div class="flex items-center gap-3">
                <img src="<?= base_url('public/images/logo.png'); ?>"
                    alt="La Cubana"
                    class="h-10 w-auto">
                <span class="font-extrabold text-lg tracking-wide hidden sm:block">
                    LA CUBANA · ADMIN
                </span>
            </div>

            <!-- MENU DESKTOP -->
            <ul class="hidden md:flex gap-10 text-sm font-semibold">
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>"
                        class="hover:text-red-500 transition <?= isset($dashboard_active) ? 'text-red-500' : ''; ?>">
                        Mis Productos
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

            <!-- DERECHA -->
            <div class="flex items-center gap-4">

                <!-- USUARIO (desktop) -->
                <div class="relative hidden md:block">
                    <button id="btnUserMenu"
                        class="flex items-center gap-3 bg-neutral-900 px-4 py-2 rounded-lg hover:bg-neutral-800 transition cursor-pointer">
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

                    <div id="userDropdown"
                        class="absolute right-0 mt-2 w-44 bg-neutral-900 border border-white/10 rounded-lg shadow-lg hidden">

                        <button id="btnLogout"
                            class="w-full text-left px-4 py-3 text-sm hover:bg-red-600 transition cursor-pointer">
                            🚪 Cerrar sesión
                        </button>
                    </div>
                </div>

                <!-- HAMBURGUESA -->
                <button id="menuToggle"
                    class="md:hidden text-2xl focus:outline-none">
                    ☰
                </button>

            </div>
        </div>

        <!-- MENU MOBILE -->
        <div id="mobileMenu"
            class="md:hidden hidden border-t border-white/10 bg-neutral-950">

            <ul class="flex flex-col px-6 py-6 space-y-6 text-sm font-semibold">
                <li>
                    <a href="<?= base_url('admin/dashboard'); ?>"
                        class="block hover:text-red-500 transition <?= isset($dashboard_active) ? 'text-red-500' : ''; ?>">
                        Mis Productos
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/orders'); ?>"
                        class="block hover:text-red-500 transition <?= isset($orders_active) ? 'text-red-500' : ''; ?>">
                        Órdenes
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/admins'); ?>"
                        class="block hover:text-red-500 transition <?= isset($admins_active) ? 'text-red-500' : ''; ?>">
                        Administradores
                    </a>
                </li>
            </ul>

            <!-- USUARIO MOBILE -->
            <div class="border-t border-white/10 px-6 py-6">
                <p class="text-sm font-semibold">
                    <?= esc(session()->get('admin_user')); ?>
                </p>
                <p class="text-xs text-white/60 mb-4">
                    <?= esc(session()->get('admin_email') ?? 'No registrado'); ?>
                </p>

                <button id="btnLogoutMobile"
                    class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold">
                    Cerrar sesión
                </button>
            </div>

        </div>
    </nav>

    <!-- TOAST ALERT -->
    <div id="appToast"
        class="fixed top-6 right-6 z-50 hidden">

        <div class="flex items-center gap-3 
                bg-neutral-900 border border-white/10
                px-5 py-4 rounded-xl shadow-2xl
                min-w-[280px]">

            <div id="toastIcon" class="text-2xl"></div>

            <div id="toastText" class="text-sm font-semibold"></div>
        </div>
    </div>

    <!-- CONFIRM MODAL -->
    <div id="appConfirm"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

        <div class="bg-neutral-900 w-full max-w-md p-6 rounded-xl">

            <div class="flex items-start gap-3 mb-4">
                <div class="text-yellow-400 text-2xl">⚠️</div>
                <p id="confirmText" class="font-semibold"></p>
            </div>

            <div class="flex justify-end gap-3">
                <button id="confirmCancel"
                    class="px-4 py-2 bg-neutral-700 rounded-lg cursor-pointer">
                    Cancelar
                </button>

                <button id="confirmOk"
                    class="px-4 py-2 bg-red-600 rounded-lg font-semibold cursor-pointer">
                    Confirmar
                </button>
            </div>
        </div>
    </div>

    <?php echo $page; ?>

    <script>
        $(document).ready(function() {
            /* ---------- TOGGLE MOBILE MENU ---------- */
            $('#menuToggle').on('click', function() {
                $('#mobileMenu').slideToggle(200);
            });

            /* ---------- USER DROPDOWN DESKTOP ---------- */
            $('#btnUserMenu').on('click', function() {
                $('#userDropdown').toggleClass('hidden');
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#btnUserMenu, #userDropdown').length) {
                    $('#userDropdown').addClass('hidden');
                }
            });

            /* ---------- LOGOUT ---------- */
            function logout() {
                showConfirm('¿Deseas cerrar sesión?', function() {
                    $.post("<?= base_url('admin/logout'); ?>", function() {
                        window.location.href = "<?= base_url('/'); ?>";
                    });
                });
            }

            $('#btnLogout, #btnLogoutMobile').on('click', logout);
        });
    </script>

    <?php echo view('components/toast'); ?>

</body>

</html>