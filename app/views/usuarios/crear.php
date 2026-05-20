<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Crear Usuario
        </h2>

        <p class="text-gray-500 mt-2">
            Registro de usuarios del sistema
        </p>

    </div>

    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

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

            <!-- CORREO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Correo
                </label>

                <input
                    type="email"
                    name="correo"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- PASSWORD -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

            </div>

            <!-- ROL -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rol
                </label>

                <select
                    name="rol"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                >

                    <option value="ADMIN">
                        ADMIN
                    </option>

                    <option value="EMPLEADO">
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

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 mt-8 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >
                Guardar Usuario
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