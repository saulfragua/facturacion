<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Facturas
            </h2>

            <p class="text-gray-500">
                Administración de facturación
            </p>

        </div>

        <!-- BOTON -->
        <a
            href="<?= URL; ?>/facturas/crear"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition font-semibold"
        >

            Nueva Factura

        </a>

    </div>

    <!-- TABLA -->
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1400px]">

            <thead>

                <tr class="border-b border-gray-100">

                    <th class="text-left py-4">
                        Factura
                    </th>

                    <th class="text-left py-4">
                        Cliente
                    </th>

                    <th class="text-left py-4">
                        Fecha
                    </th>

                    <th class="text-left py-4">
                        Vencimiento
                    </th>

                    <th class="text-left py-4">
                        Subtotal
                    </th>

                    <th class="text-left py-4">
                        IVA
                    </th>

                    <th class="text-left py-4">
                        Total
                    </th>

                    <th class="text-left py-4">
                        Método Pago
                    </th>

                    <th class="text-left py-4">
                        Estado
                    </th>

                    <th class="text-left py-4">
                        Usuario
                    </th>

                    <th class="text-center py-4">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($data['facturas'])) : ?>

                    <?php foreach($data['facturas'] as $factura) : ?>

                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">

                            <!-- FACTURA -->
                            <td class="py-4">

                                <div class="font-bold text-gray-800">

                                    <?= $factura->prefijo; ?>
                                    <?= $factura->numero_factura; ?>

                                </div>

                            </td>

                            <!-- CLIENTE -->
                            <td class="py-4">

                                <div class="font-semibold text-gray-800">

                                    <?php if(!empty($factura->razon_social)) : ?>

                                        <?= $factura->razon_social; ?>

                                    <?php else : ?>

                                        <?= $factura->nombres; ?>
                                        <?= $factura->apellidos; ?>

                                    <?php endif; ?>

                                </div>

                                <div class="text-sm text-gray-500">

                                    <?= $factura->numero_documento; ?>

                                </div>

                            </td>

                            <!-- FECHA -->
                            <td class="py-4 text-gray-700">

                                <?= $factura->fecha; ?>

                            </td>

                            <!-- VENCIMIENTO -->
                            <td class="py-4 text-gray-700">

                                <?= $factura->fecha_vencimiento; ?>

                            </td>

                            <!-- SUBTOTAL -->
                            <td class="py-4 font-semibold text-gray-700">

                                $ <?= number_format(
                                    $factura->subtotal,
                                    0,
                                    ',',
                                    '.'
                                ); ?>

                            </td>

                            <!-- IVA -->
                            <td class="py-4">

                                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm font-semibold">

                                    $ <?= number_format(
                                        $factura->iva,
                                        0,
                                        ',',
                                        '.'
                                    ); ?>

                                </span>

                            </td>

                            <!-- TOTAL -->
                            <td class="py-4 font-bold text-gray-800">

                                $ <?= number_format(
                                    $factura->total,
                                    0,
                                    ',',
                                    '.'
                                ); ?>

                            </td>

                            <!-- METODO -->
                            <td class="py-4 text-gray-700">

                                <?= $factura->metodo_pago; ?>

                            </td>

                            <!-- ESTADO -->
                            <td class="py-4">

                                <?php if($factura->estado == 'PAGADA') : ?>

                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        PAGADA

                                    </span>

                                <?php elseif($factura->estado == 'PENDIENTE') : ?>

                                    <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        PENDIENTE

                                    </span>

                                <?php else : ?>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        ANULADA

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- USUARIO -->
                            <td class="py-4 text-gray-700">

                                <?= $factura->usuario; ?>

                            </td>

                            <!-- ACCIONES -->
                            <td class="py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- VER -->
                                    <a
                                        href="<?= URL; ?>/facturas/ver/<?= $factura->id; ?>"
                                        class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                    >

                                        Ver

                                    </a>

                                    <!-- PDF -->
                                    <a
                                        href="<?= URL; ?>/facturas/pdf/<?= $factura->id; ?>"
                                        class="bg-green-100 hover:bg-green-200 text-green-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                    >

                                        PDF

                                    </a>

                                    <!-- ELIMINAR -->
                                    <a
                                        href="<?= URL; ?>/facturas/eliminar/<?= $factura->id; ?>"
                                        onclick="return confirm('¿Eliminar factura?')"
                                        class="bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                    >

                                        Eliminar

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="11" class="py-12 text-center text-gray-500">

                            No hay facturas registradas

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>