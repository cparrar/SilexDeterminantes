<?php

    namespace MathBundle\Services;

    class CalculateMore implements InterfaceDeterminant {

        private $array;
        private $result;

        function __construct($array = []) {
            $this->array = [];
        }

        /**
         * @return mixed
         */
        public function getResult() {
            return $this->result;
        }

        /**
         * @return mixed
         */
        public function getArray() {
            return $this->array;
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
        public function getType() {
            return count($this->array);
        }
    }