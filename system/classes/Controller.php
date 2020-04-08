<?php
    // Class này chứa các method mà các class con dùng chung 

    class Controller {
        public function model($model) {
            if(file_exists("../app/models/" . $model . ".php")) {
                require_once "../app/models/" . $model . ".php";

                return new $model;
            }
        }

        public function viewServer($view, $data = []) {
            if(file_exists("../app/views/server/" . $view . ".php")) {
                require_once "../app/views/server/" . $view . ".php";
            } else {
                echo "Not found view !";
            }
        }

        public function viewClient($view, $data = []) {
            if(file_exists("../app/views/client/" . $view . ".php")) {
                require_once "../app/views/client/" . $view . ".php";
            } else {
                echo "Not found view !";
            }
        }

        public function checkInput($inputName) {
            if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post") {
                return trim($_POST[$inputName]);
            } elseif($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get") {
                return trim($_GET[$inputName]);
            }
        }

        public function helper($helperName) {
            
            if(file_exists("../system/helpers/" . $helperName . ".php")) {
                require_once "../system/helpers/" . $helperName . ".php";
            } else {
                echo "Not Found $helperName !";
            }

        }

        public function setSession($sessionName, $sessionValue) {
            if(!empty($sessionName) && !empty($sessionValue)) {
                $_SESSION[$sessionName] = $sessionValue;
            }
        }

        public function getSession($sessionName) {
            if(!empty($sessionName)) {
                return $_SESSION[$sessionName];
            }
        }

        public function unsetSession($sessionName) {
            if(!empty($sessionName)) {
                unset($_SESSION[$sessionName]);
            }
        }

        public function destroySession() {
            session_destroy();
        }

        public function setFlash($sessionName, $msg) {
            if(!empty($sessionName) && !empty($msg)) {
                $_SESSION[$sessionName] = $msg;
            }
        }

        public function flash($sessionName, $className) {
            if(!empty($sessionName) && !empty($className) && isset($sessionName)) {

                $msg = $_SESSION[$sessionName];
                echo "<div class=' " . $className . " '>" . $msg . "</div>";
                unset($_SESSION[$sessionName]);

            }
        }

        public function redirect($path) {
            header("Location:" . BASEURL . "/" . $path);
        }

    }
?>



















