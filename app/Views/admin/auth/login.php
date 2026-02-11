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
    <div class="min-h-screen flex items-center justify-center px-6">

        <div class="w-full max-w-md bg-neutral-900 rounded-2xl shadow-2xl p-10">

            <!-- Título -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold mb-2">Panel de Administración</h1>
                <p class="text-white/60 text-sm">
                    Acceso restringido · Pizzería La Cubana
                </p>
            </div>

            <!-- FORM -->
            <form id="adminLoginForm" class="space-y-6">

                <!-- Usuario -->
                <div>
                    <label class="block text-sm mb-2">Usuario</label>
                    <input
                        id="txt-username"
                        type="text"
                        name="username"
                        required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-white/10 focus:border-red-500 focus:outline-none">
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-sm mb-2">Contraseña</label>
                    <input
                        id="txt-password"
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-white/10 focus:border-red-500 focus:outline-none">
                </div>

                <!-- Error -->
                <div id="loginError" class="hidden text-red-500 text-sm text-center"></div>

                <!-- Botón -->
                <button
                    type="submit"
                    id="loginBtn"
                    class="w-full py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold transition flex items-center justify-center gap-2">

                    <span id="btnText">Entrar</span>

                    <!-- Spinner -->
                    <svg id="spinner" class="hidden w-5 h-5 animate-spin"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                </button>

                <div class="text-center">
                    <a href="<?php echo base_url('/'); ?>" class="text-white/60 hover:text-white transition">Volver al sitio principal</a>
                </div>

            </form>

            <!-- Footer -->
            <p class="mt-8 text-center text-xs text-white/40">
                © <?= date('Y'); ?> La Cubana · Administración
            </p>

        </div>
    </div>

    <script>
        $('#adminLoginForm').on('submit', function(e) {
            e.preventDefault();

            // UI loading
            $('#loginBtn').prop('disabled', true).addClass('opacity-70 cursor-not-allowed');
            $('#btnText').text('Comprobando credenciales...');
            $('#spinner').removeClass('hidden');
            $('#loginError').addClass('hidden').text('');

            let username = $('#txt-username').val().trim();
            let password = $('#txt-password').val().trim();

            $.ajax({
                url: "<?php echo base_url('adminLoginProccess'); ?>",
                method: "POST",
                data: {
                    username: username,
                    password: password
                },
                dataType: "json",
                success: function(res) {
                    switch (res.error) {
                        case 0:
                            window.location.href = "<?php echo base_url('admin/dashboard'); ?>";
                            break;
                        case 1:
                            showError(res.msg);
                            break;
                    }
                },
                error: function() {
                    showError('Error del servidor. Inténtalo nuevamente.');
                }
            });

            function showError(message) {
                $('#loginBtn').prop('disabled', false).removeClass('opacity-70 cursor-not-allowed');
                $('#btnText').text('Entrar');
                $('#spinner').addClass('hidden');
                $('#loginError').removeClass('hidden').text(message);
            }
        });
    </script>

</body>

</html>