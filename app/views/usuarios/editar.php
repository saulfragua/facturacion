<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Editar Usuario
        </h2>

        <p class="text-gray-500 mt-2">
            Actualiza la información del usuario
        </p>

    </div>

    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- FOTO -->
            <div class="xl:col-span-3 flex justify-center">

                <?php if(!empty($data['usuario']->foto)) : ?>

                    <img
                        src="<?= URL; ?>/assets/img/usuarios/<?= $data['usuario']->foto; ?>"
                        class="w-32 h-32 rounded-3xl object-cover border border-gray-200 shadow-lg"
                    >

                <?php else : ?>

                    <div class="w-32 h-32 rounded-3xl bg-orange-100 flex items-center justify-center text-orange-500 text-4xl font-bold">

                        <?= strtoupper(substr($data['usuario']->nombre, 0, 1)); ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- NOMBRE -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nombre
                </label>

                <input
                    type="text"
                    name="nombre"
                    value="<?= $data['usuario']->nombre; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- CORREO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Correo
                </label>

                <input
                    type="email"
                    name="correo"
                    value="<?= $data['usuario']->correo; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- PASSWORD -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nueva Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Dejar vacío para no cambiar"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- ROL -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rol
                </label>

                <select
                    name="rol"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option
                        value="ADMIN"
                        <?= $data['usuario']->rol == 'ADMIN'
                            ? 'selected'
                            : ''; ?>
                    >
                        ADMIN
                    </option>

                    <option
                        value="EMPLEADO"
                        <?= $data['usuario']->rol == 'EMPLEADO'
                            ? 'selected'
                            : ''; ?>
                    >
                        EMPLEADO
                    </option>

                </select>

            </div>

            <!-- FOTO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Foto
                </label>

                <input
                    type="file"
                    name="foto"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- ESTADO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Estado
                </label>

                <select
                    name="estado"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option
                        value="1"
                        <?= $data['usuario']->estado == 1
                            ? 'selected'
                            : ''; ?>
                    >
                        Activo
                    </option>

                    <option
                        value="0"
                        <?= $data['usuario']->estado == 0
                            ? 'selected'
                            : ''; ?>
                    >
                        Inactivo
                    </option>

                </select>

            </div>

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 mt-8 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >
                Actualizar Usuario
            </button>

            <a
                href="<?= URL; ?>/usuarios"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>