<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Crear Factura
        </h2>

        <p class="text-gray-500 mt-2">
            Registro de facturación de productos y servicios
        </p>

    </div>

    <!-- FORM -->
    <form
        method="POST"
        action="<?= URL; ?>/facturas/guardar"
    >

        <!-- DATOS FACTURA -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- CLIENTE -->
            <div class="xl:col-span-2">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Cliente
                </label>

                <select
                    name="cliente_id"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

                    <option value="">
                        Seleccione cliente
                    </option>

                    <?php foreach($data['clientes'] as $cliente) : ?>

                        <option value="<?= $cliente->id; ?>">

                            <?php if($cliente->tipo_persona == 'JURIDICA') : ?>

                                <?= $cliente->razon_social; ?>

                            <?php else : ?>

                                <?= $cliente->nombres; ?>
                                <?= $cliente->apellidos; ?>

                            <?php endif; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- FECHA -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Fecha
                </label>

                <input
                    type="date"
                    name="fecha"
                    value="<?= date('Y-m-d'); ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- VENCIMIENTO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Vencimiento
                </label>

                <input
                    type="date"
                    name="fecha_vencimiento"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- METODO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Método Pago
                </label>

                <select
                    name="metodo_pago"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="EFECTIVO">
                        EFECTIVO
                    </option>

                    <option value="TRANSFERENCIA">
                        TRANSFERENCIA
                    </option>

                    <option value="TARJETA">
                        TARJETA
                    </option>

                    <option value="NEQUI">
                        NEQUI
                    </option>

                    <option value="DAVIPLATA">
                        DAVIPLATA
                    </option>

                </select>

            </div>

            <!-- OBSERVACIONES -->
            <div class="xl:col-span-3">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Observaciones
                </label>

                <textarea
                    name="observaciones"
                    rows="2"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                ></textarea>

            </div>

        </div>

        <!-- PRODUCTOS -->
        <div class="mt-10">

            <div class="flex items-center justify-between mb-6">

                <h3 class="text-2xl font-bold text-gray-800">
                    Productos
                </h3>

                <button
                    type="button"
                    id="agregar_producto"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-2xl shadow-lg transition"
                >

                    Agregar Producto

                </button>

            </div>

            <!-- TABLA -->
            <div class="overflow-x-auto">

                <table class="w-full min-w-[1200px]">

                    <thead>

                        <tr class="border-b border-gray-100">

                            <th class="text-left py-4">
                                Producto
                            </th>

                            <th class="text-left py-4">
                                Precio
                            </th>

                            <th class="text-left py-4">
                                Cantidad
                            </th>

                            <th class="text-left py-4">
                                IVA
                            </th>

                            <th class="text-left py-4">
                                Subtotal
                            </th>

                            <th class="text-left py-4">
                                Total
                            </th>

                            <th class="text-center py-4">
                                Acción
                            </th>

                        </tr>

                    </thead>

                    <tbody id="items_factura">

                    </tbody>

                </table>

            </div>

        </div>

        <!-- TOTALES -->
        <div class="mt-10 flex justify-end">

            <div class="w-full md:w-[450px] bg-gray-50 rounded-3xl p-6 border border-gray-200">

                <div class="flex justify-between py-3 border-b border-gray-200">

                    <span class="font-semibold text-gray-700">
                        Subtotal
                    </span>

                    <span id="subtotal_text" class="font-bold text-gray-800">
                        $ 0
                    </span>

                </div>

                <div class="flex justify-between py-3 border-b border-gray-200">

                    <span class="font-semibold text-gray-700">
                        IVA
                    </span>

                    <span id="iva_text" class="font-bold text-orange-600">
                        $ 0
                    </span>

                </div>

                <div class="flex justify-between py-4">

                    <span class="text-xl font-bold text-gray-800">
                        TOTAL
                    </span>

                    <span id="total_text" class="text-2xl font-bold text-green-600">
                        $ 0
                    </span>

                </div>

                <!-- INPUTS -->
                <input type="hidden" name="subtotal" id="subtotal">
                <input type="hidden" name="iva" id="iva_total">
                <input type="hidden" name="total" id="total_general">

            </div>

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 mt-8 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >

                Guardar Factura

            </button>

            <a
                href="<?= URL; ?>/facturas"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition"
            >

                Cancelar

            </a>

        </div>

    </form>

</div>

<!-- TEMPLATE -->
<template id="template_producto">

    <tr class="border-b border-gray-100 item">

        <!-- PRODUCTO -->
        <td class="py-4 pr-3">

            <select
                name="producto_id[]"
                class="producto w-full px-4 py-3 rounded-2xl border border-gray-300"
                required
            >

                <option value="">
                    Seleccione producto
                </option>

                <?php foreach($data['productos'] as $producto) : ?>

                    <option
                        value="<?= $producto->id; ?>"
                        data-precio="<?= $producto->precio; ?>"
                        data-iva="<?= $producto->iva; ?>"
                    >

                        <?= $producto->nombre; ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </td>

        <!-- PRECIO -->
        <td class="py-4 pr-3">

            <input
                type="number"
                step="0.01"
                name="precio[]"
                class="precio w-full px-4 py-3 rounded-2xl border border-gray-300"
                readonly
            >

        </td>

        <!-- CANTIDAD -->
        <td class="py-4 pr-3">

            <input
                type="number"
                step="1"
                min="1"
                value="1"
                name="cantidad[]"
                class="cantidad w-full px-4 py-3 rounded-2xl border border-gray-300"
            >

        </td>

        <!-- IVA -->
        <td class="py-4 pr-3">

            <input
                type="number"
                name="iva[]"
                class="iva w-full px-4 py-3 rounded-2xl border border-gray-300 bg-orange-50"
                readonly
            >

        </td>

        <!-- SUBTOTAL -->
        <td class="py-4 pr-3">

            <input
                type="number"
                name="subtotal_item[]"
                class="subtotal_item w-full px-4 py-3 rounded-2xl border border-gray-300"
                readonly
            >

        </td>

        <!-- TOTAL -->
        <td class="py-4 pr-3">

            <input
                type="number"
                name="total_item[]"
                class="total_item w-full px-4 py-3 rounded-2xl border border-gray-300 bg-green-50"
                readonly
            >

        </td>

        <!-- ELIMINAR -->
        <td class="py-4 text-center">

            <button
                type="button"
                class="eliminar bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl"
            >

                X

            </button>

        </td>

    </tr>

</template>

<!-- SCRIPT -->
<script>

document.addEventListener('DOMContentLoaded', function(){

    const agregar =
        document.getElementById('agregar_producto');

    const items =
        document.getElementById('items_factura');

    const template =
        document.getElementById('template_producto');

    // AGREGAR ITEM

    agregar.addEventListener('click', function(){

        const clone =
            template.content.cloneNode(true);

        items.appendChild(clone);
    });

    // EVENTOS

    items.addEventListener('change', function(e){

        if(
            e.target.classList.contains('producto')
        ){

            const row =
                e.target.closest('tr');

            const option =
                e.target.selectedOptions[0];

            const precio =
                parseFloat(
                    option.dataset.precio || 0
                );

            const iva =
                parseFloat(
                    option.dataset.iva || 0
                );

            row.querySelector('.precio').value =
                precio;

            row.querySelector('.iva').value =
                iva;

            calcularFila(row);
        }
    });

    items.addEventListener('input', function(e){

        if(
            e.target.classList.contains('cantidad')
        ){

            const row =
                e.target.closest('tr');

            calcularFila(row);
        }
    });

    // ELIMINAR

    items.addEventListener('click', function(e){

        if(
            e.target.classList.contains('eliminar')
        ){

            e.target.closest('tr').remove();

            calcularTotales();
        }
    });

    // CALCULAR FILA

    function calcularFila(row){

        const precio =
            parseFloat(
                row.querySelector('.precio').value || 0
            );

        const cantidad =
            parseFloat(
                row.querySelector('.cantidad').value || 0
            );

        const iva =
            parseFloat(
                row.querySelector('.iva').value || 0
            );

        const subtotal =
            precio * cantidad;

        const ivaValor =
            subtotal * (iva / 100);

        const total =
            subtotal + ivaValor;

        row.querySelector('.subtotal_item').value =
            subtotal.toFixed(2);

        row.querySelector('.total_item').value =
            total.toFixed(2);

        calcularTotales();
    }

    // TOTALES

    function calcularTotales(){

        let subtotal = 0;
        let iva = 0;
        let total = 0;

        document
            .querySelectorAll('.subtotal_item')
            .forEach(function(item){

                subtotal +=
                    parseFloat(item.value || 0);
            });

        document
            .querySelectorAll('.total_item')
            .forEach(function(item){

                total +=
                    parseFloat(item.value || 0);
            });

        iva = total - subtotal;

        // TEXTOS

        document.getElementById('subtotal_text')
            .innerText =
                '$ ' + subtotal.toLocaleString();

        document.getElementById('iva_text')
            .innerText =
                '$ ' + iva.toLocaleString();

        document.getElementById('total_text')
            .innerText =
                '$ ' + total.toLocaleString();

        // INPUTS

        document.getElementById('subtotal').value =
            subtotal;

        document.getElementById('iva_total').value =
            iva;

        document.getElementById('total_general').value =
            total;
    }

});

</script>