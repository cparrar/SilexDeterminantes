<?php

    /**
     * No mostrar errores
     */
    ini_set('display_errors', 0);

    /**
     * Autocargador de composer
     */
    require_once __DIR__.'/../vendor/autoload.php';

    /**
     * Carga de librerías de configuración y
     * ejecución del núcleo de silex
     */
    $app = require __DIR__ . '/../app/app.php';
    require __DIR__ . '/../app/config/prod.php';
    require __DIR__ . '/../app/controllers.php';
    $app->run();