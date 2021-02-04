<?php

    namespace App\Models;

    class User extends Model {
        
        protected $username;
        protected $email;
        protected $password;

        public function getUsername() { return $this->username; }

        function __construct($user) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
        }
    }
?>