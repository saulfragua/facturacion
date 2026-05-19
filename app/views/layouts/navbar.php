<!-- NAVBAR -->
<header class="h-24 bg-white shadow-sm flex items-center justify-between px-6 lg:px-10">

    <!-- MOBILE -->
    <div class="flex items-center gap-3 lg:hidden">

        <div class="w-12 h-12 rounded-2xl overflow-hidden bg-orange-500">

            <img 
                src="<?= URL; ?>/assets/img/logo/logo.png"
                alt="Logo"
                class="w-full h-full object-cover"
            >

        </div>

        <div>

            <h2 class="font-bold text-lg text-gray-800">
                Facturación
            </h2>

        </div>

    </div>

    <!-- TITULO -->
    <div class="hidden lg:block">

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>

        <p class="text-gray-500 mt-1">
            Bienvenido nuevamente 👋
        </p>

    </div>

    <!-- USER -->
    <div class="flex items-center gap-4">

        <div class="text-right hidden sm:block">

            <h3 class="font-bold text-gray-800">
                <?= $_SESSION['usuario_nombre']; ?>
            </h3>

            <p class="text-sm text-gray-500">
                <?= $_SESSION['usuario_rol']; ?>
            </p>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-orange-500 text-white flex items-center justify-center text-xl font-bold shadow-lg">

            <?= strtoupper(substr($_SESSION['usuario_nombre'], 0, 1)); ?>

        </div>

    </div>

</header>