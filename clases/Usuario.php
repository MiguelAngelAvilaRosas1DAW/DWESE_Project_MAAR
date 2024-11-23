<?php

    class Usuario {
        private int $idUsu;
        private string $nomUsu;
        private string $claveUsu;

        public function __construct() {
            
        }

        /**
         * @return int
         */
        public function getId():int {
            return $this->idUsu;
        }

        /**
         * @return string
         */
        public function getNombre():string {
            return $this->nomUsu;
        }

    }

?>