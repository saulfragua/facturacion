<?php require_once RUTA_APP . '/views/layouts/header.php'; ?>

<div class="min-h-screen bg-gray-100 flex">

    <!-- SIDEBAR -->
    <?php require_once RUTA_APP . '/views/layouts/sidebar.php'; ?>

    <!-- CONTENIDO -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR -->
        <?php require_once RUTA_APP . '/views/layouts/navbar.php'; ?>

        <!-- MAIN -->
        <main class="flex-1 p-6 lg:p-10">

            <?php

                // CARGAR VISTA DINAMICA

                if(isset($data['contenido'])){

                    require_once RUTA_APP . '/views/' . $data['contenido'] . '.php';

                }

            ?>

        </main>

    </div>

</div>

<?php require_once RUTA_APP . '/views/layouts/footer.php'; ?>