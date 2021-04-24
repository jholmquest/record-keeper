<?php
    class Character {

        private $id;
        private $name;
        private $feats;

        // Magic Get/Set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }

        public function __toString() {
            
            $format = "<hr/>Id: %s<br/>Name: %s";
            
            return sprintf($format, $this->__get('id'), $this->__get('name'));
        }
    }
?>