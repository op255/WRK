<?php

namespace App\Controllers;

use App\Repos\UserRepository;


class UserController extends Controller {

    public function reg($username, $email, $password1, $password2) {
        return $this->repo->reg($username, $email, $password1, $password2);
    }

    public function auth($username, $password) {
        return $this->repo->auth($username, $password);
    }

    public function checkConfirmation($token) {
        $this->repo->checkConfirmation($token);
    }


    public function __construct($conn) {
        $this->repo = new UserRepository($conn);
    }
}

?>