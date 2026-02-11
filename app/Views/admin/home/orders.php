<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
        <div>
            <h1 class="text-3xl font-extrabold mb-2">Órdenes</h1>
            <p class="text-white/60">Gestión de órdenes · La Cubana</p>
        </div>
    </div>

    <!-- CONTENIDO -->
    <?php if (!empty($orders)) { ?>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($orders as $o) { ?>

                <div class="bg-neutral-900 rounded-xl border border-white/10 p-6 hover:border-red-500 transition">

                    <!-- ORDER ID -->
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-white/60">Orden</span>
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
                                data-phone="<?= esc($o->client_phone); ?>">
                                <?= esc($o->client_phone); ?>
                            </a>
                        </p>
                    </div>

                    <!-- PRODUCTOS (FUTURO) -->
                    <div class="mb-4 text-sm text-white/40 italic">
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

                </div>

            <?php } ?>

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
                    📞 Llamar
                </a>

                <a id="btnWhatsapp"
                    href="#"
                    target="_blank"
                    class="bg-green-600 hover:bg-green-700 py-2 rounded font-semibold transition">
                    💬 Escribir por WhatsApp
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

            if (!confirm('¿Estás seguro de cambiar el estado de esta orden?')) {
                // volver al estado anterior
                select.val(oldStatus);
                return;
            }

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
                        // actualizar estado guardado
                        select.data('original', newStatus);
                        alert('Estado actualizado correctamente');
                    } else {
                        alert('Error al actualizar el estado');
                        select.val(oldStatus);
                    }
                },
                error: function() {
                    alert('Error de conexión');
                    select.val(oldStatus);
                }
            });

        });
    });
</script>