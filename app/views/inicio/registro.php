<?php require_once RUTA_APP . '/views/layouts/header.php'; ?>
<?php require_once RUTA_APP . '/views/layouts/whatsapp.php'; ?>
<?php if(isset($_SESSION['success'])) : ?>

    <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl text-sm">

        <?= $_SESSION['success']; ?>

    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100 relative overflow-hidden">

    <!-- Fondo -->
    <div class="absolute inset-0">

        <img 
            src="<?= URL; ?>/assets/img/banner/facturacion.jpg"
            alt="Registro"
            class="w-full h-full object-cover"
        >

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

    </div>

    <!-- Contenedor -->
    <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 py-10">

        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                <!-- Información -->
                <div class="hidden lg:block text-white">

                    <div class="max-w-lg">

                        <span class="inline-block px-4 py-2 rounded-full bg-orange-500/20 border border-orange-400/30 text-orange-200 text-sm font-medium mb-6">
                            NovaFact SaaS
                        </span>

                        <h1 class="text-5xl font-extrabold leading-tight mb-6">
                            Crea tu Empresa en Minutos
                        </h1>

                        <p class="text-lg text-gray-200 leading-relaxed mb-8">
                            Registra tu empresa y administra facturación electrónica, inventario, clientes y reportes desde cualquier lugar.
                        </p>

                        <div class="space-y-4">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-orange-500/20 flex items-center justify-center">
                                    ✓
                                </div>

                                <div>
                                    <h3 class="font-bold text-lg">
                                        Multiempresa
                                    </h3>

                                    <p class="text-gray-300 text-sm">
                                        Cada empresa administra sus propios datos
                                    </p>
                                </div>

                            </div>

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-orange-500/20 flex items-center justify-center">
                                    ✓
                                </div>

                                <div>
                                    <h3 class="font-bold text-lg">
                                        Facturación
                                    </h3>

                                    <p class="text-gray-300 text-sm">
                                        Preparado para facturación
                                    </p>
                                </div>

                            </div>

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-orange-500/20 flex items-center justify-center">
                                    ✓
                                </div>

                                <div>
                                    <h3 class="font-bold text-lg">
                                        Acceso Seguro
                                    </h3>

                                    <p class="text-gray-300 text-sm">
                                        Plataforma moderna y protegida
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Registro -->
                <div class="w-full max-w-xl mx-auto lg:ml-auto">

                    <form 
                        method="POST"
                        class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20"
                    >

                        <!-- Logo -->
                        <div class="text-center mb-8">

                            <div class="w-24 h-24 mx-auto mb-5 rounded-3xl bg-orange-500 shadow-xl overflow-hidden flex items-center justify-center">

                                <!-- Logo -->
                                <img 
                                    src="<?= URL; ?>/assets/img/banner/logo.png"
                                    alt="Logo"
                                    class="w-full h-full object-cover"
                                >

                            </div>

                            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
                                Crear Cuenta
                            </h2>

                            <p class="text-gray-500 mt-3 text-sm sm:text-base">
                                Registra tu empresa y comienza ahora
                            </p>

                        </div>

                        <!-- DATOS EMPRESA -->
                        <div class="mb-8">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                                    1
                                </div>

                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">
                                        Datos Empresa
                                    </h3>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                <!-- Razón social -->
                                <div class="sm:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Razón Social
                                    </label>

                                    <input
                                        type="text"
                                        name="razon_social"
                                        placeholder="Mi Empresa SAS"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
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
                                        placeholder="900123456"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                                    >

                                </div>

                                <!-- Teléfono -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Teléfono
                                    </label>

                                    <input
                                        type="text"
                                        name="telefono"
                                        placeholder="3000000000"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- ADMIN -->
                        <div class="mb-8">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                                    2
                                </div>

                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">
                                        Administrador
                                    </h3>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                <!-- Nombre -->
                                <div class="sm:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nombre Completo
                                    </label>

                                    <input
                                        type="text"
                                        name="nombre"
                                        placeholder="Nombre Administrador"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                                    >

                                </div>

                                <!-- Correo -->
                                <div class="sm:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Correo Electrónico
                                    </label>

                                    <input
                                        type="email"
                                        name="correo"
                                        placeholder="admin@empresa.com"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                                    >

                                </div>

                                <!-- Password -->
                                <div class="sm:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Contraseña
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="********"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- Botón -->
                        <button 
                            type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 rounded-2xl shadow-xl transition duration-300"
                        >
                            Crear Cuenta
                        </button>

                        <!-- Login -->
                        <div class="text-center mt-6">

                            <p class="text-gray-500 text-sm mb-3">
                                ¿Ya tienes cuenta?
                            </p>

                            <a 
                                href="<?= URL; ?>/inicio/login"
                                class="inline-flex items-center justify-center w-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold py-3 rounded-2xl transition"
                            >
                                Iniciar Sesión
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once RUTA_APP . '/views/layouts/footer.php'; ?>