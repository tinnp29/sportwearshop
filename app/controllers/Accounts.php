<?php
    class Accounts extends Controller {

        public function __construct() {
            $this->helper("link");
            
            $this->accountModel = $this->model("AccountModel");
        }

        public function index() {

            $accountId = $this->getSession("accountId");

            $result = $this->accountModel->getAllAccount($accountId);

            $this->viewServer("index", [
                "title"       => "__hoamattroi | Danh Sách tài Khoản",
                "page"        => "accounts",
                "data"        => $result
            ]);
        }

    }
?>