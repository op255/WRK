<?php

    namespace App\Repos;

    class Repository {

        protected $pdo;
    

        public function __construct($conn) {
            $this->pdo = $conn->getPDO();
        }
    }
?>