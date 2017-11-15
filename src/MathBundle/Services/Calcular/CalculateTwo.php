<?php

    namespace MathBundle\Services;

    class CalculateTwo implements InterfaceDeterminant {

        /**
         * @var array
         */
        private $array;

        /**
         * @var integer
         */
        private $result;

        /**
         * CalculateTwo constructor.
         *
         * Asigna la matriz al array indicado
         * y genera el calculo de la matriz
         * al mismo tiempo
         *
         * @param array $array
         */
        function __construct($array = []) {
            $this->array = $array;
            $this->result = ($this->array[0][0] * $this->array[1][1]) - ($this->array[0][1] * $this->array[1][0]);
        }

        /**
         * @return mixed
         */
        public function getResult() {
            return $this->result;
        }

        /**
         * Retorna la matriz correspondiente
         *
         * @return array
         */
        public function getArray() {
            return $this->array;
        }

        /**
         * Retorna la regla renderizada para
         * el proceso de validación y calculo
         *
         * @return string
         */
        public function getRule() {

            return sprintf(
                'det A = [%s] - [%s] = %s',
                $this->array[0][0] * $this->array[1][1],
                $this->array[0][1] * $this->array[1][0],
                $this->result
            );
        }

        /**
         * Retorna la regla renderizada para
         * el proceso de validación y calculo
         * explicada paso a paso en sus
         * calculos internos
         *
         * @return string
         */
        public function getRuleExplanation() {

            return sprintf(
                'det A = [%s*%s] - [%s*%s] = %s',
                $this->array[0][0],
                $this->array[1][1],
                $this->array[0][1],
                $this->array[1][0],
                $this->result
            );
        }

        /**
         * @return mixed
         */
        public function getType() {
            return 2;
        }
    }