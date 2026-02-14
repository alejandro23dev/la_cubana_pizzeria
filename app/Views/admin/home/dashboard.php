<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between mb-10">

        <!-- TÍTULO -->
        <div>
            <h1 class="text-3xl font-extrabold mb-2">Mis Productos</h1>
            <p class="text-white/60">Gestión de productos · La Cubana</p>
        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 sm:justify-end md:justify-end">

            <!-- BOTÓN NUEVO PRODUCTO -->
            <button id="btnOpenAddProduct"
                <?= empty($categories) ? 'disabled' : '' ?>
                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold transition
            <?= empty($categories)
                ? 'bg-gray-600 cursor-not-allowed opacity-60'
                : 'bg-red-600 hover:bg-red-700 cursor-pointer' ?>">
                Nuevo Producto
            </button>

            <!-- BOTÓN NUEVA CATEGORÍA -->
            <button id="btnOpenAddCategory"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold transition cursor-pointer">
                Nueva Categoría
            </button>

        </div>

    </div>

    <!-- =======================
     CATEGORÍAS
======================= -->
    <div class="mb-10">

        <h2 class="text-xl font-bold mb-4">Categorías</h2>

        <?php if (!empty($categories)) { ?>

            <div class="flex flex-wrap gap-3">

                <?php foreach ($categories as $cat) { ?>
                    <div class="bg-neutral-800 px-4 py-2 rounded-lg border border-white/10">
                        <span class="font-semibold"><?= esc($cat->name) ?></span>
                    </div>
                <?php } ?>

            </div>

        <?php } else { ?>

            <div class="bg-neutral-900 border border-yellow-500/40 p-4 rounded-lg">
                <p class="text-yellow-400 font-semibold">
                    ⚠ No hay categorías registradas
                </p>
                <p class="text-white/60 text-sm mt-1">
                    Debes crear al menos una categoría para poder agregar productos.
                </p>
            </div>

        <?php } ?>

    </div>


    <!-- CONTENIDO -->
    <h2 class="text-xl font-bold mb-4">Productos</h2>
    <?php if (!empty($products)) { ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($products as $p) {
                $isPopular = ($p->popular == '1');
                $hasOffer  = ($p->new_price != '0');
            ?>

                <div id="pizza-<?= $p->id ?>"
                    class="relative bg-neutral-900 rounded-xl overflow-hidden border border-white/10 hover:border-red-500 transition">

                    <!-- BADGES -->
                    <div class="absolute top-3 left-3 flex gap-2 z-10">
                        <?php if ($isPopular) { ?>
                            <span class="bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded">⭐ Popular</span>
                        <?php } ?>
                        <?php if ($hasOffer) { ?>
                            <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">Oferta</span>
                        <?php } ?>
                    </div>

                    <!-- IMAGEN -->
                    <img src="<?= base_url('public/images/pizzas/' . esc($p->img)); ?>"
                        class="h-40 w-full object-cover">

                    <!-- INFO -->
                    <div class="p-5 space-y-3">

                        <input type="text" id="txt-name-<?= $p->id ?>"
                            value="<?= esc($p->name); ?>"
                            class="w-full bg-neutral-800 px-3 py-2 rounded text-white font-semibold">

                        <textarea id="txt-description-<?= $p->id ?>"
                            class="w-full bg-neutral-800 px-3 py-2 rounded text-white text-sm resize-none"
                            style="height:90px"><?= esc($p->description); ?></textarea>

                        <div class="grid grid-cols-2 gap-3">
                            <input type="text" id="txt-price-<?= $p->id ?>"
                                value="<?= number_format($p->price, 2); ?>"
                                class="price-input bg-neutral-800 px-3 py-2 rounded text-white">

                            <input type="text" id="txt-new-price-<?= $p->id ?>"
                                value="<?= $hasOffer ? number_format($p->new_price, 2) : '' ?>"
                                placeholder="0.00"
                                class="price-input bg-neutral-800 px-3 py-2 rounded text-white">
                        </div>

                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="cbx-popular-<?= $p->id ?>"
                                <?= $isPopular ? 'checked' : '' ?>
                                class="accent-yellow-400 cursor-pointer">
                            <label for="cbx-popular-<?= $p->id ?>" class="text-sm text-white/70">
                                Pizza popular
                            </label>
                        </div>

                        <div class="flex gap-3 pt-3">
                            <button class="btn-update flex-1 bg-blue-600 py-2 rounded font-semibold cursor-pointer"
                                data-id="<?= $p->id ?>">
                                Actualizar
                            </button>

                            <button class="btn-delete flex-1 bg-red-700 py-2 rounded font-semibold cursor-pointer"
                                data-id="<?= $p->id ?>"
                                data-img="images/pizzas/<?= $p->img ?>">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    <?php } else { ?>
        <div class="text-center py-24">
            <p class="text-xl mb-4">🍕 No hay productos registrados</p>
        </div>
    <?php } ?>

    <!-- MODAL -->
    <div id="modalAddProduct"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

        <div class="bg-neutral-900 max-w-lg w-full p-6 rounded-xl relative">
            <button id="closeModal" class="absolute top-3 right-3 text-xl">✕</button>

            <h2 class="text-2xl font-bold mb-4">Nuevo Producto</h2>

            <form id="formAddProduct" enctype="multipart/form-data" class="space-y-4">
                <input type="file"
                    name="image"
                    accept="image/*"
                    required
                    class="bg-neutral-800 w-full px-3 py-2 rounded">
                <input type="text" name="name" placeholder="Nombre" required class="bg-neutral-800 w-full px-3 py-2 rounded">
                <textarea name="description" placeholder="Descripción" required
                    class="bg-neutral-800 w-full px-3 py-2 rounded resize-none" style="height:80px"></textarea>

                <div class="grid grid-cols-2 gap-3">
                    <input type="text" name="price" placeholder="Precio"
                        class="price-input bg-neutral-800 px-3 py-2 rounded">
                    <input type="text" name="new_price" placeholder="Oferta"
                        class="price-input bg-neutral-800 px-3 py-2 rounded">
                </div>

                <select name="category_id" required
                    class="bg-neutral-800 w-full px-3 py-2 rounded text-white">

                    <option value="" hidden>Seleccionar categoría</option>

                    <?php foreach ($categories as $cat) { ?>
                        <option value="<?= $cat->id ?>">
                            <?= esc($cat->name) ?>
                        </option>
                    <?php } ?>

                </select>

                <button type="submit" id="btnAddProduct"
                    class="w-full bg-red-600 py-2 rounded font-semibold cursor-pointer">
                    Guardar
                </button>
            </form>
        </div>
    </div>

    <!-- MODAL ADD CATEGORY -->
    <div id="modalAddCategory"
        class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

        <div class="bg-neutral-900 max-w-md w-full p-6 rounded-xl relative">
            <button id="closeModalCategory" class="absolute top-3 right-3 text-xl">✕</button>

            <h2 class="text-2xl font-bold mb-4">Nueva Categoría</h2>

            <form id="formAddCategory" class="space-y-4">
                <input type="text"
                    name="name"
                    placeholder="Nombre de la categoría"
                    required
                    class="bg-neutral-800 w-full px-3 py-2 rounded text-white">

                <button type="submit"
                    id="btnAddCategory"
                    class="w-full bg-blue-600 py-2 rounded font-semibold cursor-pointer">
                    Guardar Categoría
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        /* =======================
           MODAL
        ======================= */
        $('#btnOpenAddProduct').on('click', function() {
            $('#modalAddProduct').removeClass('hidden').addClass('flex');
        });

        $('#closeModal').on('click', function() {
            $('#modalAddProduct').addClass('hidden').removeClass('flex');
            $('#formAddPizza')[0].reset();
        });

        /* =======================
           PRICE INPUT
        ======================= */
        $('.price-input').on('input', function() {
            let v = $(this).val().replace(/[^0-9.]/g, '');
            let p = v.split('.');
            if (p.length > 2) v = p[0] + '.' + p[1];
            if (p[1]?.length > 2) v = p[0] + '.' + p[1].slice(0, 2);
            $(this).val(v);
        });

        /* =======================
           ADD PRODUCT
        ======================= */
        $('#formAddProduct').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#btnAddProduct');
            btn.prop('disabled', true).text('Guardando...');

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/addProduct'); ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    if (response.error === 0) {
                        location.reload();
                    } else {
                        alert(response.msg);
                        btn.prop('disabled', false).text('Guardar')
                    }
                },
                error: function() {
                    alert('Error del servidor');
                    btn.prop('disabled', false).text('Guardar')
                }
            });
        });

        /* =======================
           UPDATE PRODUCT
        ======================= */
        $('.btn-update').on('click', function() {
            let id = $(this).data('id');
            let btn = $(this);

            btn.prop('disabled', true).text('Actualizando...');

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/updateProduct'); ?>",
                data: {
                    id,
                    name: $('#txt-name-' + id).val(),
                    description: $('#txt-description-' + id).val(),
                    price: $('#txt-price-' + id).val(),
                    new_price: $('#txt-new-price-' + id).val(),
                    popular: $('#cbx-popular-' + id).is(':checked') ? 1 : 0
                },
                dataType: "json",
                success: function(response) {
                    if (response.error === 0) {
                        btn.text('Actualizado');
                    } else {
                        btn.text('Error');
                    }
                    setTimeout(() => btn.prop('disabled', false).text('Actualizar'), 1500);
                },
                error: function() {
                    btn.text('Error');
                    setTimeout(() => btn.prop('disabled', false).text('Actualizar'), 1500);
                }
            });
        });

        /* =======================
           DELETE PRODUCT
        ======================= */
        $('.btn-delete').on('click', function() {
            if (!confirm('¿Eliminar este producto?')) return;

            let btn = $(this);
            let id = btn.data('id');

            btn.text('Eliminando').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/deleteProduct'); ?>",
                data: {
                    id,
                    imgURL: btn.data('img')
                },
                dataType: "json",
                success: function(response) {
                    if (response.error === 0) {
                        window.location.reload();
                    } else {
                        alert('Error al eliminar');
                        btn.text('Eliminar').prop('disabled', false);
                    }
                },
                error: function() {
                    btn.text('Eliminar').prop('disabled', false);
                    alert('Error del servidor');
                }
            });
        });

        /* =======================
   OPEN CATEGORY MODAL
======================= */
        $('#btnOpenAddCategory').on('click', function() {
            $('#modalAddCategory').removeClass('hidden').addClass('flex');
        });

        $('#closeModalCategory').on('click', function() {
            $('#modalAddCategory').addClass('hidden').removeClass('flex');
            $('#formAddCategory')[0].reset();
        });

        /* =======================
           ADD CATEGORY
        ======================= */
        $('#formAddCategory').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#btnAddCategory');
            btn.prop('disabled', true).text('Guardando...');

            $.ajax({
                url: "<?= base_url('admin/addCategory'); ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.error === 0) {
                        location.reload();
                    } else {
                        alert(response.msg);
                    }
                },
                error: function() {
                    alert('Error del servidor');
                },
                complete: function() {
                    btn.prop('disabled', false).text('Guardar Categoría');
                }
            });
        });
    });
</script>