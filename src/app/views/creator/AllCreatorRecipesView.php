<?php
    class AllCreatorRecipesView implements ViewInterface {
        private $data;
        
        public function __construct($data = [])
        {
            $this->data = $data;    
        }

        public function render()
        {
            require_once __DIR__ . "/../../components/creator/allrecipebycreator.php";
        }
    }