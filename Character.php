<?php
    class Character {

        private $id;
        private $name;
        private $feats;

        // Magic Get/Set
        public function __get($ivar)
        {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value)
        {
            $this->$ivar = $value;
        }


    }
?>