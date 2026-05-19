<!-- SIDEBAR -->
<aside class="w-72 bg-gray-900 text-white hidden lg:flex flex-col shadow-2xl">

    <!-- LOGO -->
    <div class="h-24 flex items-center justify-center border-b border-gray-800">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl overflow-hidden bg-orange-500 shadow-lg">

                <img 
                    src="<?= URL; ?>/assets/img/logo/logo.png"
                    alt="Logo"
                    class="w-full h-full object-cover"
                >

            </div>

            <div>

                <h2 class="font-bold text-xl">
                    Facturación
                </h2>

                <p class="text-sm text-gray-400">
                    SaaS Empresarial
                </p>

            </div>

        </div>

    </div>

    <!-- MENU -->
    <nav class="flex-1 px-5 py-6 space-y-2">

        <a href="<?= URL; ?>/dashboard"
           class="flex items-center gap-4 px-4 py-3 rounded-2xl bg-orange-500 text-white shadow-lg">

            <span>📊</span>

            <span class="font-medium">
                Dashboard
            </span>

        </a>

<a href="<?= URL; ?>/clientes"
   class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-gray-800 transition">

    <span>👥</span>

    <span>
        Clientes
    </span>

</a>

        <a href="#"
           class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-gray-800 transition">

            <span>📦</span>

            <span>Productos</span>

        </a>

        <a href="#"
           class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-gray-800 transition">

            <span>🧾</span>

            <span>Facturas</span>

        </a>

        <a href="#"
           class="flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-gray-800 transition">

            <span>⚙️</span>

            <span>Configuración</span>

        </a>

    </nav>

    <!-- FOOTER -->
    <div class="p-5 border-t border-gray-800">

        <a href="<?= URL; ?>/inicio/logout"
           class="flex items-center justify-center gap-3 w-full bg-red-500 hover:bg-red-600 py-3 rounded-2xl transition">

            <span>🚪</span>

            <span>
                Cerrar Sesión
            </span>

        </a>

    </div>

</aside>