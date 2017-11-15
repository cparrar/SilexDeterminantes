<?php

    use Silex\Application;
    use Silex\Provider\AssetServiceProvider;
    use Silex\Provider\FormServiceProvider;
    use Silex\Provider\TwigServiceProvider;
    use Silex\Provider\ServiceControllerServiceProvider;
    use Silex\Provider\HttpFragmentServiceProvider;
    use Silex\Provider\VarDumperServiceProvider;

    $app = new Application();
    $app->register(new ServiceControllerServiceProvider());
    $app->register(new AssetServiceProvider());
    $app->register(new TwigServiceProvider());
    $app->register(new HttpFragmentServiceProvider());
    $app->register(new VarDumperServiceProvider());
    $app->register(new FormServiceProvider());
    $app['twig'] = $app->extend('twig', function ($twig, $app) {
        // add custom globals, filters, tags, ...
        return $twig;
    });

    return $app;