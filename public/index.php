<?php

require_once '../app/config/config.php';
require_once '../app/config/database.php';

spl_autoload_register(function($class){

    // CORE
    if(file_exists('../app/core/' . $class . '.php')){

        require_once '../app/core/' . $class . '.php';

    }

    // MODELS
    elseif(file_exists('../app/models/' . $class . '.php')){

        require_once '../app/models/' . $class . '.php';

    }

    // CONTROLLERS
    elseif(file_exists('../app/controllers/' . $class . '.php')){

        require_once '../app/controllers/' . $class . '.php';

    }

});

$init = new Router();