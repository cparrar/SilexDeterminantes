<?php

    namespace MathBundle\Services\Calcular;

    class CalculateThree implements InterfaceDeterminant {

        /**
         * @var array
         */
        private $array;

        /**
         * @var
         */
        private $result;

        /**
         * CalculateThree constructor.
         * @param array $array
         */
        function __construct($array = []) {
            $this->array = $array;
            $this->result = $this->getCompound();
        }

        /**
         * @return mixed
         */
        private function getCompound() {
            return ($this->array[0][0] * $this->array[1][1] * $this->array[2][2]) +
                ($this->array[1][0] * $this->array[2][1] * $this->array[0][2]) +
                ($this->array[2][0] * $this->array[0][1] * $this->array[1][2]) -
                ($this->array[0][2] * $this->array[1][1] * $this->array[2][0]) -
                ($this->array[1][2] * $this->array[2][1] * $this->array[0][0]) -
                ($this->array[2][2] * $this->array[0][1] * $this->array[1][0]);
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
        public function getRule() {

            return sprintf(
                'det A = [%s] + [%s] + [%s] - [%s] - [%s] - [%s] = %s',
                ($this->array[0][0] * $this->array[1][1] * $this->array[2][2]),
                ($this->array[1][0] * $this->array[2][1] * $this->array[0][2]),
                ($this->array[2][0] * $this->array[0][1] * $this->array[1][2]),
                ($this->array[0][2] * $this->array[1][1] * $this->array[2][0]),
                ($this->array[1][2] * $this->array[2][1] * $this->array[0][0]),
                ($this->array[2][2] * $this->array[0][1] * $this->array[1][0]),
                $this->result
            );
        }

        /**
         * @return mixed
         */
        public function getRuleExplanation() {

            return sprintf(
                'det A = [%s*%s*%s] + [%s*%s*%s] + [%s*%s*%s] - [%s*%s*%s] - [%s*%s*%s] -[%s*%s*%s] = %s',
                $this->array[0][0],
                $this->array[1][1],
                $this->array[2][2],
                $this->array[1][0],
                $this->array[2][1],
                $this->array[0][2],
                $this->array[2][0],
                $this->array[0][1],
                $this->array[1][2],
                $this->array[0][2],
                $this->array[1][1],
                $this->array[2][0],
                $this->array[1][2],
                $this->array[2][1],
                $this->array[0][0],
                $this->array[2][2],
                $this->array[0][1],
                $this->array[1][0],
                $this->result
            );
        }

        /**
         * @return mixed
         */
        public function getType() {
            return 3;
        }
    }