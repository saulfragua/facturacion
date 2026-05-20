<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">
            Editar Empresa
        </h2>

        <p class="text-gray-500 mt-2">
            Actualiza la información de la empresa
        </p>

    </div>

    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- RAZON SOCIAL -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Razón Social
                </label>

                <input
                    type="text"
                    name="razon_social"
                    value="<?= $data['empresa']->razon_social; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
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
                    value="<?= $data['empresa']->nit; ?>"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
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
                    value="<?= $data['empresa']->dv; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- TELEFONO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Teléfono
                </label>

                <input
                    type="text"
                    name="telefono"
                    value="<?= $data['empresa']->telefono; ?>"
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
                    value="<?= $data['empresa']->correo; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
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
                    value="<?= $data['empresa']->direccion; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- DEPARTAMENTO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Departamento
                </label>

                <select
                    id="departamento"
                    name="departamento_id"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach($data['departamentos'] as $dep): ?>

                        <option
                            value="<?= $dep->id; ?>"

                            <?= $data['empresa']->departamento_id == $dep->id
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
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach($data['municipios'] as $mun): ?>

                        <option
                            value="<?= $mun->id; ?>"

                            <?= $data['empresa']->municipio_id == $mun->id
                                ? 'selected'
                                : ''; ?>
                        >

                            <?= $mun->nombre; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- REGIMEN -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Régimen
                </label>

                <select
                    name="regimen_id"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach($data['regimenes'] as $regimen): ?>

                        <option
                            value="<?= $regimen->id; ?>"

                            <?= $data['empresa']->regimen_id == $regimen->id
                                ? 'selected'
                                : ''; ?>
                        >

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
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach($data['responsabilidades'] as $r): ?>

                        <option
                            value="<?= $r->id; ?>"

                            <?= $data['empresa']->responsabilidad_fiscal_id == $r->id
                                ? 'selected'
                                : ''; ?>
                        >

                            <?= $r->nombre; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- TIPO DOCUMENTO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Tipo Documento
                </label>

                <select
                    name="tipo_documento_id"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

                    <option value="">
                        Seleccione
                    </option>

                    <?php foreach($data['tipos_documento'] as $tipo): ?>

                        <option
                            value="<?= $tipo->id; ?>"

                            <?= $data['empresa']->tipo_documento_id == $tipo->id
                                ? 'selected'
                                : ''; ?>
                        >

                            <?= $tipo->nombre; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- RESOLUCION -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Resolución DIAN
                </label>

                <input
                    type="text"
                    name="resolucion_dian"
                    value="<?= $data['empresa']->resolucion_dian; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- PREFIJO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Prefijo Factura
                </label>

                <input
                    type="text"
                    name="prefijo_factura"
                    value="<?= $data['empresa']->prefijo_factura; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- RANGO DESDE -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rango Desde
                </label>

                <input
                    type="number"
                    name="rango_desde"
                    value="<?= $data['empresa']->rango_desde; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- RANGO HASTA -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rango Hasta
                </label>

                <input
                    type="number"
                    name="rango_hasta"
                    value="<?= $data['empresa']->rango_hasta; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- FECHA -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Fecha Vencimiento
                </label>

                <input
                    type="date"
                    name="fecha_vencimiento"
                    value="<?= $data['empresa']->fecha_vencimiento; ?>"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300"
                >

            </div>

            <!-- LOGO -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Logo
                </label>

                <input
                    type="file"
                    name="logo"
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

                    <option value="ACTIVA"
                        <?= $data['empresa']->estado == 'ACTIVA'
                            ? 'selected'
                            : ''; ?>>

                        ACTIVA

                    </option>

                    <option value="SUSPENDIDA"
                        <?= $data['empresa']->estado == 'SUSPENDIDA'
                            ? 'selected'
                            : ''; ?>>

                        SUSPENDIDA

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
                Actualizar Empresa
            </button>

            <a
                href="<?= URL; ?>/empresa"
                class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl transition"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>