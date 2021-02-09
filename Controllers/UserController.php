<?php

namespace App\Controllers;

use App\Repos\UserRepository;
use App\Models\User;
use App\Mailer\Mailer;

class UserController extends Controller {

    protected $mail;

    public function reg($username, $email, $password1, $password2) {
        return $this->repo->reg($username, $email, $password1, $password2);
    }

    public function auth($username, $password) {
        return $this->repo->auth($username, $password);
    }

    public function sendConfirmationMail($email) {
        $this->mail->sendConfirmationMail($email);
    }


    public function __construct($conn) {
        $this->repo = new UserRepository($conn);
        $this->mail = new Mailer();
    }
}

?>