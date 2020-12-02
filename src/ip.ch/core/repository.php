<?php

    namespace App\Repos;

    

    class Repository {
        protected $dbName = 'PostDB';
        protected $dbHost = 'localhost';
        protected $dbPort = '3036';
        protected $dbUser = 'root';
        protected $dbPass = 'root';
        protected $charset = 'utf8';
        protected $pdo = FALSE;
    

        public function __construct() {
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = "mysql:host=$this->dbHost;dbname=$this->dbName;charset=$this->charset;port=$this->dbPort";

            try {
                $this->pdo = new \PDO($dsn, $this->dbUser, $this->dbPass, $options);
           } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
           }
        }
        public function __destruct() {
            #mysql_close($this->conn);
        }
    }
?>