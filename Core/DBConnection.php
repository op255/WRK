<?php

    namespace App\Core;

    class DBConnection {
        protected $name;
        protected $host;
        protected $port;
        protected $user;
        protected $pass;
        protected $charset;
        protected $pdo;
    

        public function getPDO() {
            return $this->pdo;
        }

        public function __construct() {
            require 'Config/DBConfig.php';

            $this->name = $name;
            $this->host = $host;
            $this->port = $port;
            $this->user = $user;
            $this->pass = $pass;
            $this->charset = $charset;

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