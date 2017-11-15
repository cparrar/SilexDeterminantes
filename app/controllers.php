<?php

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    //Request::setTrustedProxies(array('127.0.0.1'));

    /*$app->get('/', function () use ($app) {
        return $app['twig']->render('index.html.twig', array());
    })->bind('homepage');*/
    //MathBundle\Controller

    $app->get('/', 'MathBundle\Controller\IndexController::indexAction')->bind('inicio');
    $app->get('/det', 'MathBundle\Controller\DeterminantesController::indexAction')->bind('determinantes');
    $app->post('/det/ajax/form', 'MathBundle\Controller\DeterminantesController::getFormAction')->bind('det_form');
    $app->post('/det/ajax/calcular', 'MathBundle\Controller\DeterminantesController::calcularAction')->bind('det_calcular');

    $app->error(function (\Exception $e, Request $request, $code) use ($app) {

        if ($app['debug']):
            return;
        endif;

        // 404.html, or 40x.html, or 4xx.html, or error.html
        $templates = [
            'errors/'.$code.'.html.twig',
            'errors/'.substr($code, 0, 2).'x.html.twig',
            'errors/'.substr($code, 0, 1).'xx.html.twig',
            'errors/default.html.twig',
        ];

        return new Response($app['twig']->resolveTemplate($templates)->render(['code' => $code]), $code);
    });
