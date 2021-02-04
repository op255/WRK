<?php

namespace App\Controllers;

use App\Repos\UserRepository;
use App\Models\User;

class UserController extends Controller {

    public function reg($username, $email, $password1, $password2) {
        return $this->repo->reg($username, $email, $password1, $password2);
    }

    public function auth($username, $email, $password) {
        return $this->repo->auth($username, $email, $password);
    }


    public function __construct($conn) {
        $this->repo = new UserRepository($conn);
    }
}

?>