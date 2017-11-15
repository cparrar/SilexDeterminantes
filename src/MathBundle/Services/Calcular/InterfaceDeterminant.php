<?php
    namespace MathBundle\Services;

    /**
     * Interface IntefaceDeterminant
     * @package MathBundle\Services
     */
    interface InterfaceDeterminant {

        /**
         * @return mixed
         */
        public function getResult();

        /**
         * @return mixed
         */
        public function getArray();

        /**
         * @return mixed
         */
        public function getRule();

        /**
         * @return mixed
         */
        public function getRuleExplanation();

        /**
         * @return mixed
         */
        public function getType();
    }