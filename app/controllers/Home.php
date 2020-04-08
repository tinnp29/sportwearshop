<?php
    class Home extends Controller {

        public function __construct() {
            $this->helper("link");
        }

        public function index() {
            
            $this->viewClient("index", [
                "title" => "__hoamattroi | Sportwearshop"
            ]);
        }

    }
?>