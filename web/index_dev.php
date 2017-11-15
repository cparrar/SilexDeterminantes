<?php

    /**
     * Import Namespace debug
     */
    use Symfony\Component\Debug\Debug;

    // This check prevents access to debug front controllers that are deployed by accident to production servers.
    // Feel free to remove this, extend it, or make something more sophisticated.
    if (isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR']) || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))) {
        header('HTTP/1.0 403 Forbidden');
        exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
    }

    /**
     * Autocargador de composer
     */
    require_once __DIR__.'/../vendor/autoload.php';

    /**
     * Activación de modo debug
     */
    Debug::enable();

    /**
     * Carga de librerías de configuración y
     * ejecución del núcleo de silex
     */
    $app = require __DIR__ . '/../app/app.php';
    require __DIR__ . '/../app/config/dev.php';
    require __DIR__ . '/../app/controllers.php';
    $app->run();