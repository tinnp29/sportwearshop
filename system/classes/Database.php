<?php
    class Database {
        protected $host     = HOST;
        protected $user     = USER;
        protected $password = PASSWORD;
        protected $database = DATABASE;
        protected $con;
        protected $result;

        public function __construct() {

            try {
                return $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database,
                $this->user, $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $e) {
                echo "Kết Nối Database Lỗi: " . $e->getMessage();
            }

        }

        // Select * from table
        public function query($qr, $params = []) {

            if(empty($params)) {
                $this->result = $this->con->prepare($qr);
                return $this->result->execute();
            } else {
                $this->result = $this->con->prepare($qr);
                return $this->result->execute($params);
            }

        }

        // Row count
        public function rowCount() {
            return $this->result->rowCount();
        }

        //
        public function fetchAll() {
            return $this->result->fetchAll(PDO::FETCH_OBJ);
        }

        //
        public function fetch() {
            return $this->result->fetch(PDO::FETCH_OBJ);
        }
    }
?>


















