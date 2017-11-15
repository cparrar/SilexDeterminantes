<?php

    namespace MathBundle\Controller;

    use Silex\Application;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpKernel\Exception\HttpException;

    /**
     * Class DeterminantesController
     * @package MathBundle\Controller
     */
    class DeterminantesController {

        /**
         * Genera la carga de la pagina principal
         * de seleccion del tamaño del determinante
         *
         * @param Application $app
         */
        public function indexAction(Application $app) {
            return $app['twig']->render('Template/Determinantes/index.html.twig');
        }

        /**
         * Genera la creacion del formulario correspondiente
         * para el ingreso de los datos del determinantes
         *
         * @param Application $app
         * @param Request $request
         * @return
         * @throws \Exception
         */
        public function getFormAction(Application $app, Request $request) {

            if($request->request->has('det') != true):
                throw new \Exception('No es posible procesar su solicitud');
            endif;

            return $app['twig']->render('Template/Determinantes/get_form.html.twig', ['det' => $request->request->get('det')]);
        }

        /**
         * Genera el proceso del calculo del determinante para
         * mostrarlo en pantalla
         *
         * @param Application $app
         * @param Request $request
         * @return mixed
         * @throws \Exception
         */
        public function calcularAction(Application $app, Request $request) {

            if($request->request->has('detForm') != true):
                throw new \Exception('No es posible procesar su solicitud');
            endif;

            return $app['twig']->render('Template/Determinantes/calcular.html.twig', ['det' => $request->request->get('detForm')]);
        }
    }