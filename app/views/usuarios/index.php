<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Usuarios
            </h2>

            <p class="text-gray-500 mt-2">
                Administración de usuarios
            </p>

        </div>

        <!-- NUEVO -->
        <a
            href="<?= URL; ?>/usuarios/crear"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition font-semibold"
        >

            Nuevo Usuario

        </a>

    </div>

    <!-- TABLA -->
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1000px]">

            <thead>

                <tr class="border-b border-gray-100">

                    <th class="text-left py-4 px-2">
                        Foto
                    </th>

                    <th class="text-left py-4 px-2">
                        Nombre
                    </th>

                    <th class="text-left py-4 px-2">
                        Correo
                    </th>

                    <th class="text-left py-4 px-2">
                        Rol
                    </th>

                    <th class="text-left py-4 px-2">
                        Último Login
                    </th>

                    <th class="text-left py-4 px-2">
                        Estado
                    </th>

                    <th class="text-center py-4 px-2">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($data['usuarios'] as $usuario) : ?>

                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition">

                        <!-- FOTO -->
                        <td class="py-4 px-2">

                            <?php if(!empty($usuario->foto)) : ?>

                                <img
                                    src="<?= URL; ?>/assets/img/usuarios/<?= $usuario->foto; ?>"
                                    class="w-12 h-12 rounded-2xl object-cover border border-gray-200"
                                >

                            <?php else : ?>

                                <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 font-bold">

                                    <?= strtoupper(substr($usuario->nombre, 0, 1)); ?>

                                </div>

                            <?php endif; ?>

                        </td>

                        <!-- NOMBRE -->
                        <td class="py-4 px-2 font-semibold text-gray-800">

                            <?= $usuario->nombre; ?>

                        </td>

                        <!-- CORREO -->
                        <td class="py-4 px-2 text-gray-600">

                            <?= $usuario->correo; ?>

                        </td>

                        <!-- ROL -->
                        <td class="py-4 px-2">

                            <?php if($usuario->rol == 'SUPER_ADMIN') : ?>

                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">

                                    SUPER ADMIN

                                </span>

                            <?php elseif($usuario->rol == 'ADMIN') : ?>

                                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm font-semibold">

                                    ADMIN

                                </span>

                            <?php else : ?>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">

                                    EMPLEADO

                                </span>

                            <?php endif; ?>

                        </td>

                        <!-- LOGIN -->
                        <td class="py-4 px-2 text-gray-600">

                            <?= $usuario->ultimo_login ?: 'Nunca'; ?>

                        </td>

                        <!-- ESTADO -->
                        <td class="py-4 px-2">

                            <?php if($usuario->estado == 1) : ?>

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
                        <td class="py-4 px-2">

                            <div class="flex items-center justify-center gap-2">

                                <!-- EDITAR -->
                                <a
                                    href="<?= URL; ?>/usuarios/editar/<?= $usuario->id; ?>"
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                >

                                    Editar

                                </a>

                                <!-- ELIMINAR -->
                                <a
                                    href="<?= URL; ?>/usuarios/eliminar/<?= $usuario->id; ?>"
                                    onclick="return confirm('¿Eliminar usuario?')"
                                    class="bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-medium transition"
                                >

                                    Eliminar

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>