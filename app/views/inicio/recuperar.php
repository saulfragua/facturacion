<?php require_once RUTA_APP . '/views/layouts/header.php'; ?>
<?php require_once RUTA_APP . '/views/layouts/whatsapp.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 relative overflow-hidden">

    <!-- Fondo -->
    <div class="absolute inset-0">

        <img 
            src="<?= URL; ?>/assets/img/banner/facturacion.jpg"
            alt="Recuperar"
            class="w-full h-full object-cover"
        >

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

    </div>

    <!-- Contenedor -->
    <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8">

        <div class="max-w-md mx-auto">

            <form 
                method="POST"
                class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-6 sm:p-8 border border-white/20"
            >

                <!-- Logo -->
                <div class="text-center mb-8">

                    <div class="w-24 h-24 mx-auto mb-5 rounded-3xl bg-orange-500 shadow-xl overflow-hidden flex items-center justify-center">

                        <img 
                            src="<?= URL; ?>/assets/img/banner/logo.png"
                            alt="Logo"
                            class="w-full h-full object-cover"
                        >

                    </div>

                    <h2 class="text-3xl font-extrabold text-gray-800">
                        Recuperar Contraseña
                    </h2>

                    <p class="text-gray-500 mt-3">
                        Ingresa tu correo electrónico
                    </p>

                </div>

                <!-- Success -->
                <?php if(!empty($data['success'])) : ?>

                    <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-2xl text-sm">
                        <?= $data['success']; ?>
                    </div>

                <?php endif; ?>

                <!-- Correo -->
                <div class="mb-6">

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

                <!-- Botón -->
                <button 
                    type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 rounded-2xl shadow-xl transition duration-300"
                >
                    Enviar recuperación
                </button>

                <!-- Volver -->
                <div class="text-center mt-6">

                    <a 
                        href="<?= URL; ?>/inicio/login"
                        class="text-orange-500 hover:text-orange-600 font-medium"
                    >
                        Volver al login
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php require_once RUTA_APP . '/views/layouts/footer.php'; ?>