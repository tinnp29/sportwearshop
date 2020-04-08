<?php
    class Router {

        protected $controller = "home";

        protected $action = "index";

        protected $params = [];

        public function __construct() {
            
            $url = $this->parseUrl();

            if(file_exists("../app/controllers/" . $url[0] . ".php")) {
                
                $this->controller = $url[0];
                unset($url[0]);
            
            }

            require_once "../app/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;

            if(isset($url[1]) && !empty($url[1])) {

                if(method_exists($this->controller, $url[1])) {

                    $this->action = $url[1];
                    unset($url[1]);

                } else {
                    echo "Not Found Action !";
                }

            }

            if(isset($url)) {
                $this->params = $url;
            } else {
                $this->params = [];
            }
            // || $this->params = $url ? array_values($url) : []; 

            call_user_func_array([$this->controller, $this->action], $this->params);

        }

        public function parseUrl() {

            if(isset($_GET["url"])) {
                return $url = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
            }

        }

    }
?>