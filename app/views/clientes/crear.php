<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100 max-w-7xl">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Nuevo Cliente
        </h2>

        <p class="text-gray-500 mt-2">
            Registro completo de clientes
        </p>

    </div>

    <form method="POST">

        <!-- DATOS PERSONALES -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div
                    class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    1
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Información General
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Datos principales del cliente
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- Tipo Persona -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tipo Persona
                    </label>

                    <select name="tipo_persona" required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">
                        <option value="NATURAL">Natural</option>
                        <option value="JURIDICA">Jurídica</option>
                    </select>

                </div>

                <!-- Tipo Documento -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tipo Documento
                    </label>

<select
    name="tipo_documento_id"
    required
    class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
>

    <option value="">
        Seleccione
    </option>

    <?php foreach($data['tipos_documento'] as $tipo): ?>

        <option
            value="<?= $tipo->id; ?>"

            <?= isset($data['cliente']) &&
                $data['cliente']->tipo_documento_id == $tipo->id
                ? 'selected'
                : ''; ?>
        >

            <?= $tipo->codigo; ?>
            -
            <?= $tipo->nombre; ?>

        </option>

    <?php endforeach; ?>

</select>

                </div>

                <!-- Documento -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Número Documento
                    </label>

                    <input type="text" name="numero_documento" required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- Nombres -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nombres
                    </label>

                    <input type="text" name="nombres"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- Apellidos -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Apellidos
                    </label>

                    <input type="text" name="apellidos"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- Razón Social -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Razón Social
                    </label>

                    <input type="text" name="razon_social"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- NIT -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        NIT
                    </label>

                    <input type="text" name="nit"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- DV -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        DV
                    </label>

                    <input type="text" name="dv"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

            </div>

        </div>

        <!-- CONTACTO -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div
                    class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    2
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Información Contacto
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Datos de ubicación y contacto
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- Teléfono -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Teléfono
                    </label>

                    <input type="text" name="telefono"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- Correo -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Correo Electrónico
                    </label>

                    <input type="email" name="correo"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>

                <!-- Dirección -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Dirección
                    </label>

                    <input type="text" name="direccion"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                </div>
                <!-- Departamento -->
                <!-- Departamento -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Departamento
                    </label>

                    <select id="departamento" name="departamento_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300">

                        <option value="">Seleccione</option>

                        <?php foreach ($data['departamentos'] as $dep): ?>

                            <option value="<?= $dep->id ?>">

                                <?= $dep->nombre ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Municipio -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Ciudad
                    </label>

                    <select id="municipio" name="municipio_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300">

                        <option value="">
                            Seleccione un departamento
                        </option>

                    </select>

                </div>

            </div>

        </div>

        <!-- INFORMACION DIAN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- REGIMEN -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Régimen
                </label>

                <select name="regimen_id" required
                    class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach ($data['regimenes'] as $regimen): ?>

                        <option value="<?= $regimen->id; ?>">

                            <?= $regimen->codigo; ?>
                            -
                            <?= $regimen->nombre; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- RESPONSABILIDAD -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Responsabilidad Fiscal
                </label>

                <select name="responsabilidad_fiscal_id" required
                    class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-4 focus:ring-orange-200 focus:border-orange-500">

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach ($data['responsabilidades'] as $responsabilidad): ?>

                        <option value="<?= $responsabilidad->id; ?>">

                            <?= $responsabilidad->codigo; ?>
                            -
                            <?= $responsabilidad->nombre; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-100">

            <button type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition">
                Guardar Cliente
            </button>

            <a href="<?= URL; ?>/clientes"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition">
                Cancelar
            </a>

        </div>

    </form>

</div>