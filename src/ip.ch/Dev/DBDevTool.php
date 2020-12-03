<?php
    namespace App\Dev;

    class DBDevTool {

        protected $name = 'PostDB';
        protected $host = 'localhost';
        protected $port = '3036';
        protected $user = 'root';
        protected $pass = 'root';
        protected $charset = 'utf8';
        protected $pdo;

        public function act($action, $args){
            switch ($action) {
                case 'add':
                    if (isset($args[1]))
                        $this->addRecord($args[0], $args[1]);
                    else
                        $this->addRecord($args[0]);
                    break;

            }
            echo 'Action is done!';
        }

        private function addRecord($textContent, $imgSrc = NULL) {
            if ($imgSrc) {
                $sql = "INSERT INTO posts (text_content, img_src) VALUES (?,?)";
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$textContent, $imgSrc]);
            } 
            else {
                $sql = "INSERT INTO posts (text_content) VALUES (?)";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute([$textContent]);
            }
        }

        public function __construct() {
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = "mysql:host=$this->host;dbname=$this->name;charset=$this->charset;port=$this->port";

            try {
                $this->pdo = new \PDO($dsn, $this->user, $this->pass, $options);
           } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
           }
        }
    }
?>