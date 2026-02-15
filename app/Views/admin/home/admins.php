<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
        <div>
            <h1 class="text-3xl font-extrabold mb-2">Administradores</h1>
            <p class="text-white/60">Gestión de administradores · La Cubana</p>
        </div>

        <!-- BOTÓN NUEVO ADMINISTRADOR -->
        <button id="btnOpenAddAdmin"
            class="mt-4 md:mt-0 inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold transition cursor-pointer">
            Nuevo Administrador
        </button>
    </div>

    <!-- CONTENIDO -->
    <?php if (!empty($admins)) { ?>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($admins as $a) {

                // Comparar email con el de la sesión
                $isMe = session()->get('admin_email') === $a->email;
            ?>

                <div class="bg-neutral-900 rounded-xl border border-white/10 p-6 hover:border-red-500 transition cursor-pointer">

                    <!-- AVATAR -->
                    <div class="flex items-center gap-4 mb-4">
                        <div class="h-12 w-12 rounded-full bg-red-600 flex items-center justify-center font-bold text-lg">
                            <?= strtoupper(substr($a->user, 0, 1)); ?>
                        </div>

                        <div>
                            <div class="flex items-center gap-2">
                                <p class="font-semibold text-lg">
                                    <?= esc($a->user); ?>
                                </p>

                                <?php if ($isMe) { ?>
                                    <span class="text-xs bg-yellow-400 text-black px-2 py-0.5 rounded-full font-bold">
                                        Tú
                                    </span>
                                <?php } ?>
                            </div>

                            <p class="text-sm text-white/60">
                                <?= esc($a->email); ?>
                            </p>
                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="text-sm text-white/70 space-y-2">
                        <div class="flex justify-between">
                            <span>Última sesión</span>
                            <span class="text-white">
                                <?php
                                if ($a->last_session) {
                                    $date = new DateTime($a->last_session);

                                    $formatter = new IntlDateFormatter(
                                        'es_ES',
                                        IntlDateFormatter::LONG,
                                        IntlDateFormatter::SHORT,
                                        null,
                                        null,
                                        "d 'de' MMMM 'del' y 'a las' h:mm a"
                                    );

                                    echo $formatter->format($date);
                                } else {
                                    echo 'Nunca';
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>

    <?php } else { ?>

        <!-- EMPTY STATE -->
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="text-6xl mb-4">👤</div>
            <h3 class="text-2xl font-bold mb-3">No hay administradores</h3>
            <p class="text-white/60">
                Aún no se han registrado administradores en el sistema.
            </p>
        </div>

    <?php } ?>

    <!-- MODAL -->
    <div id="modalAddAdmin"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-40">

        <div class="bg-neutral-900 max-w-lg w-full p-6 rounded-xl relative">
            <button id="closeModal" class="absolute top-3 right-3 text-xl cursor-pointer">✕</button>

            <h2 class="text-2xl font-bold mb-4">Nuevo Administrador</h2>

            <div class="space-y-4">
                <input type="text" id="txt-name" name="name" placeholder="Usuario" required class="bg-neutral-800 w-full px-3 py-2 rounded">
                <input type="text" id="txt-email" name="email" placeholder="Correo Electrónico" required class="bg-neutral-800 w-full px-3 py-2 rounded">
                <input type="password" id="txt-password" name="password" placeholder="Contraseña" required class="bg-neutral-800 w-full px-3 py-2 rounded">

                <button id="btnAddAdmin"
                    class="w-full bg-red-600 py-2 rounded font-semibold cursor-pointer">
                    Guardar
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        /* =======================
           MODAL
        ======================= */
        $('#btnOpenAddAdmin').on('click', function() {
            $('#modalAddAdmin').removeClass('hidden').addClass('flex');
        });

        $('#closeModal').on('click', function() {
            $('#modalAddAdmin').addClass('hidden').removeClass('flex');
        });

        $('#btnAddAdmin').on('click', function() {
            let name = $('#txt-name').val().trim();
            let email = $('#txt-email').val().trim();
            let password = $('#txt-password').val().trim();

            if (name === '' || email === '' || password === '') {
                showToast('⚠️', 'Por favor, completa todos los campos.');
                return;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/addAdmin'); ?>",
                data: {
                    name: name,
                    email: email,
                    password: password
                },
                dataType: "json",
                success: function(response) {
                    switch (response.error) {
                        case 0:
                            window.location.reload();
                            break;
                        case 1:
                            showToast('⚠️', response.msg);
                            break;
                        default:
                            showToast('⚠️', 'Error al agregar el administrador. Inténtalo de nuevo.');
                    }
                }
            });
        });
    });
</script>

<?php echo view('components/toast'); ?>