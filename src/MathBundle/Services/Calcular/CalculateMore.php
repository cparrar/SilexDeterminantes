<?php

    namespace MathBundle\Services\Calcular;

    use Symfony\Component\HttpFoundation\ParameterBag;

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
            return $this->rule;
        }

        /**
         * @return mixed
         */
        public function getRuleExplanation()
        {
            return $this->ruleExplanation;
        }

        /**
         * @return mixed
         */
        public function getType() {
            return count($this->array);
        }

        /**
         * Inicializa el calculo solicitado
         */
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
                $this->result = $this->setResult();
                $this->rule = $this->getPivotRule();
                $this->ruleExplanation = $this->process;
            }
        }

        /**
         * Genera la regla de los determinantes determinado
         * para el proceso de calculos realizados
         *
         * @return string
         */
        private function getPivotRule() {

            $list = [];
            $list[] = 'det A =';
            $result = [];
            $result[] = 'det A =';;

            foreach ($this->process AS $key => $value) {
                if($key == 0) {
                    $list[] = sprintf('(%s * %s)', $value['pivot'], $value['adj']['result']);
                    $result[] = sprintf('%s', $value['pivot'] * $value['adj']['result']);
                }
                elseif($key == 1) {
                    $list[] = sprintf('- (%s * %s)', $value['pivot'], $value['adj']['result']);
                    $result[] = sprintf('- %s', $value['pivot'] * $value['adj']['result']);
                }
                else {
                    if($key % 2 == 0) {
                        $list[] = sprintf('+ (%s * %s)', $value['pivot'], $value['adj']['result']);
                        $result[] = sprintf('+ %s', $value['pivot'] * $value['adj']['result']);
                    }
                    else {
                        $list[] = sprintf('- (%s * %s)', $value['pivot'], $value['adj']['result']);
                        $result[] = sprintf('- %s', $value['pivot'] * $value['adj']['result']);
                    }
                }
            }
            $list[] = sprintf('= %s', $this->result);
            $result[] = sprintf('= %s', $this->result);
            return new ParameterBag(['rule' => implode(' ', $result), 'explaned' => implode(' ', $list)]);
        }

        /**
         * Genera el resultado correspondiente
         * @return int
         */
        private function setResult() {
            $result = 0;
            foreach ($this->process AS $key => $value) {
                $total = $value['pivot'] * $value['adj']['result'];
                if($key == 0) {
                    $result = $result + $total;
                }
                elseif($key == 1) {
                    $result = $result - $total;
                }
                else {
                    if($key % 2 == 0) {
                        $result = $result + $total;
                    }
                    else {
                        $result = $result - $total;
                    }
                }
            }
            unset($key, $value, $total);
            return $result;
        }

        /**
         * Genera el proceso de generar el proceso
         * correspondiente para obtener las partes
         * del determinante
         */
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
            return ['pivot' => $this->array[$row][$column], 'adj' => ['array' => $list, 'result' => (new self($list))->getResult()]];
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