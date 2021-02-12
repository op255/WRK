<?php

    namespace App\Repos;

    use \Exception;
    use App\Models\User;
    use App\Mailer\Mailer;

    class UserRepository extends Repository {

        public function auth($username, $password) {
            $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$username' LIMIT 1");
            $found = $stm->fetch();
            if (!$found) {
                throw new \Exception("Wrong username");
            }
            if ($found['status'] == "pending") {
                throw new \Exception("Confirm email!");
            }
            if ($found['password'] == md5($password)) {
                $user = new User($found);
            }
            else {
                throw new \Exception("Wrong password");
            }
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['token'] = $user->getToken();

            return $user;
        }

        public function reg($username, $email, $password1, $password2) {

            if(empty($username)) throw new \Exception("Username is required");
            if(empty($password1)) throw new \Exception("Password is required");

            if($password1 != $password2) throw new \Exception("Passwords do not match");

            $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
            $found = $stm->fetchAll();
            if (!empty($found)) throw new \Exception("User already exists");

            $token = md5($email.date("Y-m-d H:i:s"));

            $sql = "INSERT INTO users (username, email, password, status, token) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$username, $email, md5($password1), "pending", $token]);

            $mail = new Mailer();
            $mail->sendConfirmationMail($email, $token);

            return $token;
        }

        public function checkConfirmation($token) {
            $stm = $this->pdo->query("SELECT * FROM users WHERE token='$token' LIMIT 1");
            $found = $stm->fetch();
            if (!empty($found)){
                $id = $found['id'];
                $this->pdo->query("UPDATE users SET status='confirmed' WHERE id=$id");
            }
            else
                throw new \Exception("Wrong token");
        }

        public function __construct($conn) {
            parent::__construct($conn);
        }
    }
?>