<?php

    namespace App\Core;

    class DBConnection {
        protected $name = 'PostDB';
        protected $host = 'localhost';
        protected $port = '3036';
        protected $user = 'root';
        protected $pass = 'root';
        protected $charset = 'utf8';
        protected $pdo;
    

        public function getPDO() {
            return $this->pdo;
        }

        public function __construct() {
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = "mysql:host=$this->host;
                    dbname=$this->name;
                    charset=$this->charset;
                    port=$this->port";

            try {
                $this->pdo = new \PDO($dsn, $this->user, $this->pass, $options);
           } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
           }
        }
    }

?>