<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Productos
            </h2>

            <p class="text-gray-500">
                Administración de productos y servicios
            </p>

        </div>

        <!-- BOTON -->
        <a
            href="<?= URL; ?>/productos/crear"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition font-semibold"
        >

            Nuevo Producto

        </a>

    </div>

    <!-- TABLA -->
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1200px]">

            <thead>

                <tr class="border-b border-gray-100">

                    <th class="text-left py-4">
                        Imagen
                    </th>

                    <th class="text-left py-4">
                        Código
                    </th>

                    <th class="text-left py-4">
                        Producto / Servicio
                    </th>

                    <th class="text-left py-4">
                        Tipo
                    </th>

                    <th class="text-left py-4">
                        Precio
                    </th>

                    <th class="text-left py-4">
                        IVA
                    </th>

                    <th class="text-left py-4">
                        Stock
                    </th>

                    <th class="text-left py-4">
                        Estado
                    </th>

                    <th class="text-center py-4">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($data['productos'])) : ?>

                    <?php foreach($data['productos'] as $producto) : ?>

                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">

                            <!-- IMAGEN -->
                            <td class="py-4">

                                <?php if(!empty($producto->imagen)) : ?>

                                    <img
                                        src="<?= URL; ?>/assets/img/productos/<?= $producto->imagen; ?>"
                                        class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-sm"
                                    >

                                <?php else : ?>

                                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center text-gray-400 font-bold">

                                        IMG

                                    </div>

                                <?php endif; ?>

                            </td>

                            <!-- CODIGO -->
                            <td class="py-4 font-semibold text-gray-700">

                                <?= $producto->codigo; ?>

                            </td>

                            <!-- NOMBRE + DESCRIPCION -->
                            <td class="py-4">

                                <!-- NOMBRE -->
                                <div class="font-bold text-gray-800">

                                    <?= $producto->nombre; ?>

                                </div>

                                <!-- DESCRIPCION -->
                                <div class="text-sm text-gray-500 mt-1 max-w-xs">

                                    <?= !empty($producto->descripcion)
                                        ? $producto->descripcion
                                        : 'Sin descripción'; ?>

                                </div>

                            </td>

                            <!-- TIPO -->
                            <td class="py-4">

                                <?php if($producto->tipo == 'PRODUCTO') : ?>

                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        PRODUCTO

                                    </span>

                                <?php else : ?>

                                    <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        SERVICIO

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- PRECIO -->
                            <td class="py-4 font-semibold text-gray-800">

                                $ <?= number_format($producto->precio, 0, ',', '.'); ?>

                            </td>

                            <!-- IVA -->
                            <td class="py-4">

                                <?php if($producto->tipo == 'SERVICIO') : ?>

                                    <span class="text-gray-400 text-sm">

                                        No aplica

                                    </span>

                                <?php else : ?>

                                    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        <?= $producto->iva; ?>%

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- STOCK -->
                            <td class="py-4">

                                <?php if($producto->tipo == 'SERVICIO') : ?>

                                    <span class="text-gray-400 text-sm">

                                        No aplica

                                    </span>

                                <?php else : ?>

                                    <span class="font-semibold text-gray-700">

                                        <?= $producto->stock; ?>

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- ESTADO -->
                            <td class="py-4">

                                <?php if($producto->estado == 1) : ?>

                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        Activo

                                    </span>

                                <?php else : ?>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">

                                        Inactivo

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- ACCIONES -->
                            <td class="py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- EDITAR -->
                                    <a
                                        href="<?= URL; ?>/productos/editar/<?= $producto->id; ?>"
                                        class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                    >

                                        Editar

                                    </a>

                                    <!-- ELIMINAR -->
                                    <a
                                        href="<?= URL; ?>/productos/eliminar/<?= $producto->id; ?>"
                                        onclick="return confirm('¿Eliminar producto?')"
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

                        <td colspan="9" class="py-12 text-center text-gray-500">

                            No hay productos registrados

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>