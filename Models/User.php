<?php

    namespace App\Models;

    class User extends Model {
        
        protected $username;
        protected $email;
        protected $password;
        protected $token;

        public function getUsername() { return $this->username; }

        public function getToken() { return $this->token; }

        function __construct($user) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            $this->token = $user['token'];
        }
    }
?>