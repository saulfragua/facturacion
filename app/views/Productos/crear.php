<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Crear Producto
        </h2>

        <p class="text-gray-500 mt-2">
            Registro de productos y servicios
        </p>

    </div>

    <!-- FORM -->
    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- TIPO -->
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

        <option value="PRODUCTO">
            PRODUCTO
        </option>

        <option value="SERVICIO">
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

        <option value="0">
            0%
        </option>

        <option value="5">
            5%
        </option>

        <option value="19">
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
        value="0"
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
        placeholder="UND, KG, LT..."
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

        <option value="1">
            Activo
        </option>

        <option value="0">
            Inactivo
        </option>

    </select>

</div>

<!-- IMAGEN -->
<div class="md:col-span-2">

    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Imagen Producto
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
    ></textarea>

</div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 mt-8 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >

                Guardar Producto

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

    // FUNCION

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