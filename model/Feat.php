<?php
    class Feat {

        private $id;
        private $feat_name;
        private $feat_url;
        private $character_id;

        // Magic Get/Set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }

        public function __toString() {
            
            $format = "<a href='%s'>%s</a>";
            
            return sprintf($format, $this->__get('feat_url'), $this->__get('feat_name'));
        }
    }
?>