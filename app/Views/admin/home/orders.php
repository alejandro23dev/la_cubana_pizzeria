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
            <?= view('admin/home/partials/orders_list', ['orders' => $orders]) ?>
        </div>
        <input type="hidden" id="lastOrderId" value="<?= !empty($orders) ? $orders[0]->id : 0; ?>">
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

        function checkNewOrders() {

            let lastId = $('#lastOrderId').val();

            $.ajax({
                url: "<?= base_url('admin/checkNewOrders'); ?>",
                method: "GET",
                data: {
                    last_id: lastId
                },
                dataType: "json",
                success: function(res) {

                    if (res.count > 0) {

                        // 🔔 Sonido opcional
                        let audio = new Audio('<?= base_url('/public/sounds/notification.mp3'); ?>');
                        audio.play();

                        // 🔄 Recargar solo el contenedor
                        refreshOrders();

                    }
                }
            });
        }

        function refreshOrders() {
            $.ajax({
                url: "<?= base_url('admin/refreshOrders'); ?>",
                method: "GET",
                success: function(response) {
                    $('#ordersContainer').html(response);

                    // actualizar último ID
                    let firstOrder = $('.order-status').first().data('order-id');
                    if (firstOrder) {
                        $('#lastOrderId').val(firstOrder);
                    }

                    initializeOrderStatus();
                }
            });
        }

        // Revisar cada 1 minuto
        setInterval(checkNewOrders, 60000);

        // Abrir modal al hacer click en el teléfono
        $(document).on('click', '.client-phone', function(e) {
            e.preventDefault();

            let phone = String($(this).data('phone') || '');
            let cleanPhone = phone.replace(/\D/g, '');

            $('#modalPhoneNumber').text(phone);
            $('#btnCall').attr('href', 'tel:+' + cleanPhone);
            $('#btnWhatsapp').attr('href', 'https://wa.me/' + cleanPhone);

            $('#modalPhone').removeClass('hidden').addClass('flex');
        });

        // Cerrar modal
        $('#closePhoneModal, #cancelPhoneModal').on('click', function() {
            $('#modalPhone').addClass('hidden').removeClass('flex');
        });

        function initializeOrderStatus() {
            $('.order-status').each(function() {
                $(this).data('original', $(this).val());
            });
        }

        initializeOrderStatus();

        $(document).on('change', '.order-status', function() {

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