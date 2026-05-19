<?php require_once RUTA_APP . '/views/layouts/header.php'; ?>
<?php require_once RUTA_APP . '/views/layouts/whatsapp.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 relative overflow-hidden">

    <!-- Fondo -->
    <div class="absolute inset-0">

        <img 
            src="<?= URL; ?>/assets/img/banner/facturacion.jpg"
            alt="Facturación"
            class="w-full h-full object-cover"
        >

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

    </div>

    <!-- Contenedor -->
    <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8">

        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                <!-- Información -->
                <div class="hidden lg:block text-white">

                    <div class="max-w-lg">

                        <span class="inline-block px-4 py-2 rounded-full bg-orange-500/20 border border-orange-400/30 text-orange-200 text-sm font-medium mb-6">
                            NovaFact SaaS
                        </span>

                        <h1 class="text-5xl font-extrabold leading-tight mb-6">
                            Sistema de Facturación 
                        </h1>

                        <p class="text-lg text-gray-200 leading-relaxed mb-8">
                            Administra clientes, productos, inventario, facturación, cotizaciones y cuentas por cobrar todo en una sola plataforma moderna y segura.
                        </p>

                        <div class="flex flex-wrap gap-4">

                            <div class="bg-white/10 border border-white/10 rounded-2xl px-5 py-4 backdrop-blur-sm">
                                <h3 class="font-bold text-xl">100%</h3>
                                <p class="text-sm text-gray-300">
                                    Multiempresa SaaS
                                </p>
                            </div>

                            <div class="bg-white/10 border border-white/10 rounded-2xl px-5 py-4 backdrop-blur-sm">
                                <h3 class="font-bold text-xl">funciones</h3>
                                <p class="text-sm text-gray-300">
                                    Facturación, cotizaciones <br> y cuentas por cobrar 
                                </p>
                            </div>

                            <div class="bg-white/10 border border-white/10 rounded-2xl px-5 py-4 backdrop-blur-sm">
                                <h3 class="font-bold text-xl">24/7</h3>
                                <p class="text-sm text-gray-300">
                                    Acceso seguro
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Login -->
                <div class="w-full max-w-md mx-auto lg:ml-auto">

                    <form 
                        method="POST"
                        class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20"
                    >

                        <!-- Logo -->
                        <div class="text-center mb-8">

                            <!-- Campo Logo -->
                            <div class="w-24 h-24 mx-auto mb-5 rounded-3xl bg-orange-500 shadow-xl overflow-hidden flex items-center justify-center">

                                <!-- Logo -->
                                <!-- Reemplazar imagen -->
                                <img 
                                    src="<?= URL; ?>/assets/img/banner/logo.png"
                                    alt="Logo"
                                    class="w-full h-full object-cover"
                                > 

                                <!-- Si no hay logo usar icono -->
                                <!--
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-12 h-12 text-white" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2" 
                                          d="M9 14l2-2 4 4m0-6l-4-4-2 2m6 2H7m0 0V7m0 7v7"/>
                                </svg>
                                -->

                            </div>

                            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
                                Bienvenido
                            </h2>

                            <p class="text-gray-500 mt-3 text-sm sm:text-base">
                                Ingresa a tu plataforma de facturación
                            </p>

                        </div>

                        <!-- Error -->
                        <?php if(!empty($data['error'])) : ?>

                            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-2xl text-sm">
                                <?= $data['error']; ?>
                            </div>

                        <?php endif; ?>

                        <!-- Correo -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Correo Electrónico
                            </label>

                            <input
                                type="email"
                                name="correo"
                                placeholder="ejemplo@correo.com"
                                required
                                class="w-full px-4 py-3 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:border-orange-500 transition"
                            >

                        </div>

                        <!-- Password -->
                        <div class="mb-6">

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

                        <!-- Opciones -->
                        <div class="flex items-center justify-between mb-6 text-sm">

                            <label class="flex items-center gap-2 text-gray-600">

                                <input 
                                    type="checkbox"
                                    class="rounded border-gray-300 text-orange-500 focus:ring-orange-400"
                                >

                                Recordarme

                            </label>

                            <a 
                                href="<?= URL; ?>/inicio/recuperar"
                                class="text-orange-500 hover:text-orange-600 font-medium"
                            >
                                ¿Olvidaste tu contraseña?
                            </a>

                        </div>

                        <!-- Botón -->
                        <button 
                            type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 rounded-2xl shadow-xl transition duration-300"
                        >
                            Ingresar
                        </button>

                        <!-- Registro -->
                        <div class="text-center mt-6">

                            <p class="text-gray-500 text-sm mb-3">
                                ¿No tienes cuenta?
                            </p>

                            <a 
                                href="<?= URL; ?>/inicio/registro"
                                class="inline-flex items-center justify-center w-full border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold py-3 rounded-2xl transition"
                            >
                                Crear cuenta
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once RUTA_APP . '/views/layouts/footer.php'; ?>