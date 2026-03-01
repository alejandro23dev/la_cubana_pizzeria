<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
        <div>
            <h1 class="text-3xl font-extrabold mb-2">Órdenes</h1>
            <p class="text-white/60">Gestión de órdenes · La Cubana</p>
        </div>
    </div>

    <!-- <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <label class="text-sm text-white/60 block mb-1">
                Buscar órdenes por fecha
            </label>

            <input type="date"
                id="filterDate"
                value=""
                class="bg-neutral-800 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
    </div> -->

    <!-- CONTENIDO -->
    <?php if (!empty($orders)) { ?>
        <div id="ordersContainer">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php foreach ($orders as $o) {  ?>

                    <?php
                    $date = new DateTime($o->ordered_at);

                    // Formateador para fecha en español
                    $formatter = new IntlDateFormatter(
                        'es_ES',
                        IntlDateFormatter::LONG,
                        IntlDateFormatter::NONE,
                        null,
                        null,
                        "d 'de' MMMM 'del' yyyy"
                    );

                    $fecha = $formatter->format($date);

                    // Hora en formato 24h (hora:minutos)
                    $hora = $date->format('g:i a');

                    $fechaFormateada = $fecha . ' - ' . $hora;

                    // 🔹 Limpiar número (solo dígitos)
                    $cleanPhone = preg_replace('/\D+/', '', $o->client_phone);

                    // 🔹 Formatear visualmente (ejemplo estilo US 7875551234 → (787) 555-1234)
                    $formattedPhone = $cleanPhone;

                    if (strlen($cleanPhone) === 10) {
                        $formattedPhone = '(' . substr($cleanPhone, 0, 3) . ') '
                            . substr($cleanPhone, 3, 3) . '-'
                            . substr($cleanPhone, 6);
                    } elseif (strlen($cleanPhone) === 11) {
                        // Si incluye código país (ej: 17875551234)
                        $formattedPhone = '+' . substr($cleanPhone, 0, 1) . ' '
                            . '(' . substr($cleanPhone, 1, 3) . ') '
                            . substr($cleanPhone, 4, 3) . '-'
                            . substr($cleanPhone, 7);
                    }
                    ?>

                    <div class="bg-neutral-900 rounded-xl border border-white/10 p-6 hover:border-red-500 transition flex flex-col h-full">
                        <!-- ORDER ID -->
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-white/60">
                                <?= esc($fechaFormateada); ?>
                            </span>
                            <span class="font-bold text-red-500">
                                <?= esc($o->order_id); ?>
                            </span>
                        </div>

                        <!-- CLIENTE -->
                        <div class="mb-4">
                            <p class="font-semibold text-lg">
                                <?= esc($o->client_name); ?>
                            </p>
                            <p class="text-sm text-white/60">
                                <a href="#"
                                    class="client-phone hover:text-red-500 transition"
                                    data-phone="<?= esc($cleanPhone); ?>">
                                    <?= esc($formattedPhone); ?>
                                </a>
                            </p>
                        </div>

                        <!-- PRODUCTOS -->
                        <div class="mb-4">
                            <div class="text-xs text-white/60 mb-2 uppercase tracking-wide">
                                Productos
                            </div>

                            <div class="bg-neutral-800/40 rounded-lg p-3 h-32 overflow-y-auto custom-scroll">
                                <?php if (!empty($o->products_readable)) { ?>
                                    <ul class="text-sm text-white/70 space-y-1">
                                        <?php foreach ($o->products_readable as $item) { ?>
                                            <li>🍕 <?= esc($item); ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <p class="text-white/40 text-sm">Sin productos</p>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- TOTAL -->
                        <div class="mb-4 flex justify-between items-center bg-neutral-800/60 rounded-lg px-4 py-2">
                            <span class="text-sm text-white/60">
                                Total a pagar
                            </span>
                            <span class="text-lg font-bold text-green-500">
                                $<?= number_format((float)$o->total_price, 2); ?>
                            </span>
                        </div>

                        <!-- ESTADO -->
                        <div>
                            <label class="text-xs text-white/60 mb-1 block">
                                Estado de la orden
                            </label>

                            <select
                                class="w-full bg-neutral-800 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-red-500 order-status"
                                data-order-id="<?= $o->id; ?>">

                                <option value="0" <?= $o->status == 0 ? 'selected' : ''; ?>>
                                    📝 Ordenada
                                </option>
                                <option value="1" <?= $o->status == 1 ? 'selected' : ''; ?>>
                                    🔄 En proceso
                                </option>
                                <option value="2" <?= $o->status == 2 ? 'selected' : ''; ?>>
                                    ✅ Finalizada
                                </option>
                                <option value="3" <?= $o->status == 3 ? 'selected' : ''; ?>>
                                    🚚 Enviada al cliente
                                </option>
                                <option value="4" <?= $o->status == 4 ? 'selected' : ''; ?>>
                                    ❌ Cancelada
                                </option>
                            </select>
                        </div>

                        <!-- BOTÓN IMPRIMIR -->
                        <div class="mt-6">
                            <a href="<?= base_url('admin/printOrder/' . $o->id); ?>"
                                target="_blank"
                                class="w-full block text-center bg-neutral-800 text-white hover:bg-gray-200 py-2 rounded-lg font-semibold transition">
                                🖨 Imprimir Ticket
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>

        <!-- EMPTY STATE -->
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="text-6xl mb-4">📦</div>
            <h3 class="text-2xl font-bold mb-3">No hay órdenes</h3>
            <p class="text-white/60">
                Aún no se han registrado órdenes en el sistema.
            </p>
        </div>

    <?php } ?>

    <!-- MODAL TELÉFONO -->
    <div id="modalPhone"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

        <div class="bg-neutral-900 rounded-xl p-6 w-full max-w-sm text-center relative">

            <button id="closePhoneModal"
                class="absolute top-3 right-3 text-white/60 hover:text-white text-xl">
                ✕
            </button>

            <h3 class="text-xl font-bold mb-4">
                Contactar cliente
            </h3>

            <p id="modalPhoneNumber"
                class="text-white/70 mb-6">
            </p>

            <div class="flex flex-col gap-3">

                <a id="btnCall"
                    href="#"
                    class="bg-blue-600 hover:bg-blue-700 py-2 rounded font-semibold transition">
                    Llamar
                </a>

                <a id="btnWhatsapp"
                    href="#"
                    target="_blank"
                    class="bg-green-600 hover:bg-green-700 py-2 rounded font-semibold transition">
                    Escribir por WhatsApp
                </a>

                <button id="cancelPhoneModal"
                    class="bg-neutral-700 hover:bg-neutral-600 py-2 rounded transition">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        setInterval(function() {
            window.location.reload();
        }, 120000); // 120000 ms = 2 minutos

        // Abrir modal al hacer click en el teléfono
        $('.client-phone').on('click', function(e) {
            e.preventDefault();

            let phone = $(this).data('phone');

            // Limpiar número (solo dígitos)
            let cleanPhone = phone.replace(/\D/g, '');

            $('#modalPhoneNumber').text(phone);

            $('#btnCall').attr('href', 'tel:+' + cleanPhone);
            $('#btnWhatsapp').attr(
                'href',
                'https://wa.me/' + cleanPhone
            );

            $('#modalPhone').removeClass('hidden').addClass('flex');
        });

        // Cerrar modal
        $('#closePhoneModal, #cancelPhoneModal').on('click', function() {
            $('#modalPhone').addClass('hidden').removeClass('flex');
        });

        $('.order-status').each(function() {
            // guardar estado original
            $(this).data('original', $(this).val());
        });

        $('.order-status').on('change', function() {

            let select = $(this);
            let orderId = select.data('order-id');
            let newStatus = select.val();
            let oldStatus = select.data('original');

            showOrderStatusConfirm('¿Estas seguro de cambiar el estado de esta orden?', select, oldStatus, function() {
                $.ajax({
                    url: "<?= base_url('admin/updateOrderStatus'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        order_id: orderId,
                        status: newStatus
                    },
                    success: function(res) {
                        if (res.error === 0) {
                            select.data('original', newStatus);
                            showToast('✅', 'Estado actualizado correctamente');
                        } else {
                            showToast('⚠️', 'Error al actualizar el estado');
                            select.val(oldStatus);
                        }
                    },
                    error: function() {
                        showToast('⚠️', 'Error del servidor');
                        select.val(oldStatus);
                    }
                });
            });
        });
    });
</script>

<?php echo view('components/toast'); ?>