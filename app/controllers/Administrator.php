<?php
    class Administrator extends Controller {

        public function __construct() {
            $this->helper("link");

            $this->accountModel = $this->model("AccountModel");
        }

        public function index() {
            $this->viewServer("index", [
                "title" => "__hoamattroi | Sportwearshop",
                "page"  => "dashboard"
            ]);
        }

        public function accounts() {
            $this->viewServer("index", [
                "page" => "accounts"
            ]);
        }

        public function categories() {
            $this->viewServer("index", [
                "page" => "categories"
            ]);
        }

        public function products() {
            $this->viewServer("index", [
                "page" => "products"
            ]);
        }

        public function news() {
            $this->viewServer("index", [
                "page" => "news"
            ]);
        }

    }
?>