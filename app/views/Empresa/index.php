<div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Mi Empresa
            </h2>

            <p class="text-gray-500 mt-2">
                Información general de la empresa
            </p>

        </div>

        <!-- BOTON EDITAR -->
        <a
            href="<?= URL; ?>/empresa/editar/<?= $data['empresa']->id; ?>"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl shadow-lg transition font-semibold"
        >

            Editar Empresa

        </a>

    </div>

    <!-- INFORMACION -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LOGO -->
        <div class="bg-gray-50 rounded-3xl p-6 border border-gray-100 flex flex-col items-center justify-center">

            <?php if(!empty($data['empresa']->logo)) : ?>

                <img
                    src="<?= URL; ?>/assets/img/logosempresas/<?= $data['empresa']->logo; ?>"
                    alt="Logo"
                    class="w-40 h-40 object-cover rounded-3xl shadow-lg border border-gray-200"
                >

            <?php else : ?>

                <div class="w-40 h-40 rounded-3xl bg-orange-100 flex items-center justify-center text-orange-500 text-5xl font-bold">

                    <?= strtoupper(substr($data['empresa']->razon_social, 0, 1)); ?>

                </div>

            <?php endif; ?>

            <h3 class="mt-6 text-2xl font-bold text-gray-800 text-center">

                <?= $data['empresa']->razon_social; ?>

            </h3>

            <span class="mt-3 px-4 py-2 rounded-full text-sm font-semibold
                <?= $data['empresa']->estado == 'ACTIVA'
                    ? 'bg-green-100 text-green-600'
                    : 'bg-red-100 text-red-600'; ?>">

                <?= $data['empresa']->estado; ?>

            </span>

        </div>

        <!-- DATOS -->
        <div class="lg:col-span-2">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NIT -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        NIT
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->nit; ?>

                        <?php if(!empty($data['empresa']->dv)) : ?>

                            - <?= $data['empresa']->dv; ?>

                        <?php endif; ?>

                    </h4>

                </div>

                <!-- TELEFONO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Teléfono
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->telefono ?: 'No registrado'; ?>

                    </h4>

                </div>

                <!-- CORREO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Correo
                    </p>

                    <h4 class="text-lg font-bold text-gray-800 break-all">

                        <?= $data['empresa']->correo ?: 'No registrado'; ?>

                    </h4>

                </div>

                <!-- DIRECCION -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Dirección
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->direccion ?: 'No registrada'; ?>

                    </h4>

                </div>

                <!-- MUNICIPIO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Ciudad
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->municipio ?: 'No registrada'; ?>

                    </h4>

                </div>

                <!-- DEPARTAMENTO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Departamento
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->departamento ?: 'No registrado'; ?>

                    </h4>

                </div>

                <!-- REGIMEN -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Régimen
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->regimen ?: 'No registrado'; ?>

                    </h4>

                </div>

                <!-- RESPONSABILIDAD -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Responsabilidad Fiscal
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->responsabilidad_fiscal ?: 'No registrada'; ?>

                    </h4>

                </div>

                <!-- PLAN -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Plan
                    </p>

                    <h4 class="text-lg font-bold text-orange-500">

                        <?= $data['empresa']->plan ?: 'PLAN GRATIS'; ?>

                    </h4>

                </div>

                <!-- RESOLUCION -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Resolución DIAN
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->resolucion_dian ?: 'No registrada'; ?>

                    </h4>

                </div>

                <!-- PREFIJO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Prefijo Factura
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->prefijo_factura ?: 'No registrado'; ?>

                    </h4>

                </div>

                <!-- RANGO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Rango Facturación
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->rango_desde ?: 0; ?>
                        -
                        <?= $data['empresa']->rango_hasta ?: 0; ?>

                    </h4>

                </div>

                <!-- VENCIMIENTO -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-1">
                        Fecha Vencimiento
                    </p>

                    <h4 class="text-lg font-bold text-gray-800">

                        <?= $data['empresa']->fecha_vencimiento ?: 'No registrada'; ?>

                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>