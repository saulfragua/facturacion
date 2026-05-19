<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Clientes
            </h2>

            <p class="text-gray-500 mt-1">
                Administración completa de clientes
            </p>

        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <!-- BUSCADOR -->
            <div class="relative">

                <input
                    type="text"
                    placeholder="Buscar cliente..."
                    class="w-full sm:w-72 px-5 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 outline-none"
                >

            </div>

            <!-- BOTON -->
            <a href="<?= URL; ?>/clientes/crear"
               class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition text-center font-medium">

                + Nuevo Cliente

            </a>

        </div>

    </div>

    <!-- MENSAJES -->
    <?php if(isset($_SESSION['success'])) : ?>

        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

            <?= $_SESSION['success']; ?>

        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>

    <!-- TABLA -->
    <div class="overflow-x-auto rounded-2xl border border-gray-100">

        <table class="w-full min-w-[1500px]">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Documento
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Tipo
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Cliente
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Razón Social
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Teléfono
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Correo
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Dirección
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Ciudad
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Departamento
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Régimen
                    </th>

                    <th class="text-left px-5 py-4 text-gray-600 font-semibold">
                        Estado
                    </th>

                    <th class="text-center px-5 py-4 text-gray-600 font-semibold">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($data['clientes'])) : ?>

                    <?php foreach($data['clientes'] as $cliente) : ?>

                        <tr class="border-b border-gray-100 hover:bg-orange-50/30 transition">

                            <!-- DOCUMENTO -->
                            <td class="px-5 py-4 font-semibold text-gray-800">

                                <?= $cliente->numero_documento; ?>

                            </td>

                            <!-- TIPO -->
                            <td class="px-5 py-4">

                                <?php if($cliente->tipo_persona == 'NATURAL') : ?>

                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold">

                                        Natural

                                    </span>

                                <?php else : ?>

                                    <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-semibold">

                                        Jurídica

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- CLIENTE -->
                            <td class="px-5 py-4">

                                <?php if($cliente->tipo_persona == 'NATURAL') : ?>

                                    <div class="font-semibold text-gray-800">

                                        <?= $cliente->nombres . ' ' . $cliente->apellidos; ?>

                                    </div>

                                <?php else : ?>

                                    <div class="text-gray-400">
                                        —
                                    </div>

                                <?php endif; ?>

                            </td>

                            <!-- RAZON SOCIAL -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->razon_social) ? $cliente->razon_social : '—'; ?>

                            </td>

                            <!-- TELEFONO -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->telefono) ? $cliente->telefono : '—'; ?>

                            </td>

                            <!-- CORREO -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->correo) ? $cliente->correo : '—'; ?>

                            </td>

                            <!-- DIRECCION -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->direccion) ? $cliente->direccion : '—'; ?>

                            </td>

                            <!-- CIUDAD -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->ciudad) ? $cliente->ciudad : '—'; ?>

                            </td>

                            <!-- DEPARTAMENTO -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->departamento) ? $cliente->departamento : '—'; ?>

                            </td>

                            <!-- REGIMEN -->
                            <td class="px-5 py-4">

                                <?= !empty($cliente->regimen) ? $cliente->regimen : '—'; ?>

                            </td>

                            <!-- ESTADO -->
                            <td class="px-5 py-4">

                                <?php if($cliente->estado == 1) : ?>

                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">

                                        Activo

                                    </span>

                                <?php else : ?>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">

                                        Inactivo

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- ACCIONES -->
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <!-- EDITAR -->
                                    <a href="<?= URL; ?>/clientes/editar/<?= $cliente->id; ?>"
                                       class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-2 rounded-xl text-sm font-medium transition">

                                        Editar

                                    </a>

                                    <!-- ELIMINAR -->
                                    <a href="<?= URL; ?>/clientes/eliminar/<?= $cliente->id; ?>"
                                       onclick="return confirm('¿Desea eliminar este cliente?')"
                                       class="bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-medium transition">

                                        Eliminar

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="12" class="text-center py-16">

                            <div class="flex flex-col items-center justify-center">

                                <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center text-4xl mb-5">

                                    👥

                                </div>

                                <h3 class="text-2xl font-bold text-gray-700 mb-2">

                                    No hay clientes registrados

                                </h3>

                                <p class="text-gray-500 mb-6">

                                    Comienza agregando tu primer cliente

                                </p>

                                <a href="<?= URL; ?>/clientes/crear"
                                   class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                                    Crear Cliente

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>