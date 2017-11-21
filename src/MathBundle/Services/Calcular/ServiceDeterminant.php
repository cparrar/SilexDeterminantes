<?php

    namespace MathBundle\Services\Calcular;

    class ServiceDeterminant implements InterfaceDeterminant {

        /**
         * @var array
         */
        private $array;

        /**
         * @var CalculateTwo
         */
        private $result;

        /**
         * ServiceDeterminant constructor.
         * @param array $array
         */
        function __construct($array = []) {
            $this->array = $array;
            $this->result = $this->setResult();
        }

        /**
         * Genera el proceso de calculo de
         * la determinante correspondiente
         *
         * @return CalculateTwo
         */
        public function setResult() {
            $count = count($this->array);
            if($count == 2):
                return new CalculateTwo($this->array);
            endif;
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
         * @return mixed
         */
        public function getResult()
        {
            // TODO: Implement getResult() method.
        }

        /**
         * @return mixed
         */
        public function getRule()
        {
            // TODO: Implement getRule() method.
        }

        /**
         * @return mixed
         */
        public function getRuleExplanation()
        {
            // TODO: Implement getRuleExplanation() method.
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            // TODO: Implement getType() method.
        }
    }