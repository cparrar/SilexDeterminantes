<?php

    namespace MathBundle\Services;

    class CalculateMore implements InterfaceDeterminant {

        private $array;
        private $result;
        private $process;
        private $rule;
        private $ruleExplanation;

        function __construct($array = []) {
            $this->array = $array;
            $this->setCalculate();
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

        private function setCalculate() {

            if($this->getType() == 2) {
                $det = new CalculateTwo($this->array);
                $this->result = $det->getResult();
                $this->rule = $det->getRule();
                $this->ruleExplanation = $det->getRuleExplanation();
            }
            elseif($this->getType() == 3) {

                $det = new CalculateThree($this->array);
                $this->result = $det->getResult();
                $this->rule = $det->getRule();
                $this->ruleExplanation = $det->getRuleExplanation();
            }
            else {
                $this->getPivot();
            }
        }

        private function getPivot() {

            $column = 0;
            foreach ($this->array AS $row => $value) {
                $this->process[] = $this->getPivotArray($column, $row);
            }
        }

        /**
         * Genera el pivot correspondiente
         * junto con su determinante adjunta
         *
         * @param null $column
         * @param null $row
         * @return array
         */
        private function getPivotArray($column = null, $row = null) {
            $list = [];
            foreach ($this->array AS $key => $value) {
                if($key != $row) {
                    $list[] = $this->getPivotRowArray($column, $value);
                }
            }

            unset($key, $value);
            return ['pivot' => $this->array[$row][$column], 'array' => $list];
        }

        /**
         * Retorna el array correspondiente eliminando
         * la columna indicada
         *
         * @param $column
         * @param $array
         * @return array
         */
        private function getPivotRowArray($column, $array) {
            $list = [];
            foreach ($array AS $key => $value) {
                if($key != $column) {
                    $list[] = $value;
                }
            }

            unset($array, $key, $value, $column);
            return $list;
        }


    }