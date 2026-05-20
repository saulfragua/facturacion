<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Editar Cliente
        </h2>

        <p class="text-gray-500 mt-2">
            Actualiza la información del cliente
        </p>

    </div>

    <form method="POST">

        <!-- INFORMACION CLIENTE -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    1
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Información Cliente
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Datos generales del cliente
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- TIPO PERSONA -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tipo Persona
                    </label>

                    <select
                        name="tipo_persona"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                        <option value="NATURAL"
                            <?= $data['cliente']->tipo_persona == 'NATURAL'
                                ? 'selected'
                                : ''; ?>>

                            Natural

                        </option>

                        <option value="JURIDICA"
                            <?= $data['cliente']->tipo_persona == 'JURIDICA'
                                ? 'selected'
                                : ''; ?>>

                            Jurídica

                        </option>

                    </select>

                </div>

                <!-- TIPO DOCUMENTO -->
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

                                <?= $data['cliente']->tipo_documento_id == $tipo->id
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

                <!-- DOCUMENTO -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Número Documento
                    </label>

                    <input
                        type="text"
                        name="numero_documento"
                        value="<?= $data['cliente']->numero_documento; ?>"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- NOMBRES -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nombres
                    </label>

                    <input
                        type="text"
                        name="nombres"
                        value="<?= $data['cliente']->nombres; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- APELLIDOS -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Apellidos
                    </label>

                    <input
                        type="text"
                        name="apellidos"
                        value="<?= $data['cliente']->apellidos; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- RAZON SOCIAL -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Razón Social
                    </label>

                    <input
                        type="text"
                        name="razon_social"
                        value="<?= $data['cliente']->razon_social; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- NIT -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        NIT
                    </label>

                    <input
                        type="text"
                        name="nit"
                        value="<?= $data['cliente']->nit; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- DV -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        DV
                    </label>

                    <input
                        type="text"
                        name="dv"
                        value="<?= $data['cliente']->dv; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

            </div>

        </div>

        <!-- CONTACTO -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    2
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Información Contacto
                    </h3>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- TELEFONO -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Teléfono
                    </label>

                    <input
                        type="text"
                        name="telefono"
                        value="<?= $data['cliente']->telefono; ?>"
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
                        value="<?= $data['cliente']->correo; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

                <!-- DIRECCION -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Dirección
                    </label>

                    <input
                        type="text"
                        name="direccion"
                        value="<?= $data['cliente']->direccion; ?>"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                </div>

            </div>

        </div>

        <!-- UBICACION -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    3
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Ubicación
                    </h3>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- DEPARTAMENTO -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Departamento
                    </label>

                    <select
                        id="departamento"
                        name="departamento_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                        <option value="">
                            Seleccione
                        </option>

                        <?php foreach($data['departamentos'] as $dep): ?>

                            <option
                                value="<?= $dep->id; ?>"

                                <?= $data['cliente']->departamento_id == $dep->id
                                    ? 'selected'
                                    : ''; ?>
                            >

                                <?= $dep->nombre; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- MUNICIPIO -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Municipio
                    </label>

                    <select
                        id="municipio"
                        name="municipio_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                        <option value="">
                            Seleccione
                        </option>

                        <?php foreach($data['municipios'] as $mun): ?>

                            <option
                                value="<?= $mun->id; ?>"

                                <?= $data['cliente']->municipio_id == $mun->id
                                    ? 'selected'
                                    : ''; ?>
                            >

                                <?= $mun->nombre; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

            </div>

        </div>

        <!-- DIAN -->
        <div class="mb-10">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                    4
                </div>

                <div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        Información DIAN
                    </h3>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- REGIMEN -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Régimen
                    </label>

                    <select
                        name="regimen_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                        <option value="">
                            Seleccione
                        </option>

                        <?php foreach($data['regimenes'] as $regimen): ?>

                            <option
                                value="<?= $regimen->id; ?>"

                                <?= $data['cliente']->regimen_id == $regimen->id
                                    ? 'selected'
                                    : ''; ?>
                            >

                                <?= $regimen->codigo; ?>
                                -
                                <?= $regimen->nombre; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- RESPONSABILIDAD -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Responsabilidad Fiscal
                    </label>

                    <select
                        name="responsabilidad_fiscal_id"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-4 focus:ring-orange-200 focus:border-orange-500"
                    >

                        <option value="">
                            Seleccione
                        </option>

                        <?php foreach($data['responsabilidades'] as $responsabilidad): ?>

                            <option
                                value="<?= $responsabilidad->id; ?>"

                                <?= $data['cliente']->responsabilidad_fiscal_id == $responsabilidad->id
                                    ? 'selected'
                                    : ''; ?>
                            >

                                <?= $responsabilidad->codigo; ?>
                                -
                                <?= $responsabilidad->nombre; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

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

                        <option value="1"
                            <?= $data['cliente']->estado == 1
                                ? 'selected'
                                : ''; ?>>

                            Activo

                        </option>

                        <option value="0"
                            <?= $data['cliente']->estado == 0
                                ? 'selected'
                                : ''; ?>>

                            Inactivo

                        </option>

                    </select>

                </div>

            </div>

        </div>

        <!-- BOTONES -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-100">

            <button
                type="submit"
                class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl shadow-lg font-semibold transition"
            >
                Actualizar Cliente
            </button>

            <a
                href="<?= URL; ?>/clientes"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>