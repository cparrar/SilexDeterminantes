<?php

    namespace MathBundle\Controller;

    use Silex\Application;

    /**
     * Class IndexController
     * @package MathBundle\Controller
     */
    class IndexController {

        /**
         * Carga la plantilla inicial de la aplicacion
         * en la cual se da una introduccion al tema
         * propuesto
         *
         * @param Application $app
         * @return mixed
         */
        public function indexAction(Application $app) {
            return $app['twig']->render('Template/base.html.twig');
            //return $app['twig']->render('Laura/base.html.twig');
        }
    }