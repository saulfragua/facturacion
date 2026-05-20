<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Editar Producto
        </h2>

        <p class="text-gray-500 mt-2">
            Actualiza la información del producto
        </p>

    </div>

    <!-- FORM -->
    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- IMAGEN -->
            <div class="xl:col-span-3 flex justify-center">

                <?php if(!empty($data['producto']->imagen)) : ?>

                    <img
                        src="<?= URL; ?>/assets/img/productos/<?= $data['producto']->imagen; ?>"
                        class="w-40 h-40 rounded-3xl object-cover border border-gray-200 shadow-lg"
                    >

                <?php else : ?>

                    <div class="w-40 h-40 rounded-3xl bg-orange-100 flex items-center justify-center text-orange-500 text-5xl font-bold">

                        IMG

                    </div>

                <?php endif; ?>

            </div>

            <!-- TIPO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Tipo
                </label>

                <select
                    name="tipo"
                    id="tipo"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

                    <option
                        value="PRODUCTO"
                        <?= $data['producto']->tipo == 'PRODUCTO'
                            ? 'selected'
                            : ''; ?>
                    >
                        PRODUCTO
                    </option>

                    <option
                        value="SERVICIO"
                        <?= $data['producto']->tipo == 'SERVICIO'
                            ? 'selected'
                            : ''; ?>
                    >
                        SERVICIO
                    </option>

                </select>

            </div>

            <!-- CODIGO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Código
                </label>

                <input
                    type="text"
                    name="codigo"
                    value="<?= $data['producto']->codigo; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- NOMBRE -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="<?= $data['producto']->nombre; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- PRECIO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Precio
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="precio"
                    value="<?= $data['producto']->precio; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- IVA -->
            <div id="campo_iva">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    IVA %
                </label>

                <select
                    name="iva"
                    id="iva"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

                    <option
                        value="0"
                        <?= $data['producto']->iva == 0
                            ? 'selected'
                            : ''; ?>
                    >
                        0%
                    </option>

                    <option
                        value="5"
                        <?= $data['producto']->iva == 5
                            ? 'selected'
                            : ''; ?>
                    >
                        5%
                    </option>

                    <option
                        value="19"
                        <?= $data['producto']->iva == 19
                            ? 'selected'
                            : ''; ?>
                    >
                        19%
                    </option>

                </select>

            </div>

            <!-- STOCK -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Stock
                </label>

                <input
                    type="number"
                    name="stock"
                    value="<?= $data['producto']->stock; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- UNIDAD -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Unidad Medida
                </label>

                <input
                    type="text"
                    name="unidad_medida"
                    value="<?= $data['producto']->unidad_medida; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- ESTADO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Estado
                </label>

                <select
                    name="estado"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

                    <option
                        value="1"
                        <?= $data['producto']->estado == 1
                            ? 'selected'
                            : ''; ?>
                    >
                        Activo
                    </option>

                    <option
                        value="0"
                        <?= $data['producto']->estado == 0
                            ? 'selected'
                            : ''; ?>
                    >
                        Inactivo
                    </option>

                </select>

            </div>

            <!-- IMAGEN -->
            <div class="md:col-span-2">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Cambiar Imagen
                </label>

                <input
                    type="file"
                    name="imagen"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 bg-white"
                >

            </div>

            <!-- DESCRIPCION -->
            <div class="md:col-span-2 xl:col-span-3">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    rows="5"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                ><?= $data['producto']->descripcion; ?></textarea>

            </div>

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 mt-8 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >

                Actualizar Producto

            </button>

            <a
                href="<?= URL; ?>/productos"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition"
            >

                Cancelar

            </a>

        </div>

    </form>

</div>

<!-- SCRIPT -->
<script>

document.addEventListener('DOMContentLoaded', function(){

    const tipo =
        document.getElementById('tipo');

    const campoIVA =
        document.getElementById('campo_iva');

    const iva =
        document.getElementById('iva');

    function toggleIVA(){

        if(tipo.value === 'SERVICIO'){

            campoIVA.style.display = 'none';

            iva.value = 0;

        } else {

            campoIVA.style.display = 'block';
        }
    }

    // INICIAL

    toggleIVA();

    // CAMBIO

    tipo.addEventListener('change', function(){

        toggleIVA();

    });

});

</script>