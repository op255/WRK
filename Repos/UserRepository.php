<?php

    namespace App\Repos;

    use \Exception;
    use App\Models\User;

    class UserRepository extends Repository {

        public function auth($username, $email, $password) {
            $stm = $this->pdo->query('SELECT * FROM users WHERE username="'.$username.'"');
            $found = $stm->fetch();
            if (!$found) {
                throw new \Exception("Wrong username");
            }
            if ($found['password'] == md5($password)) {
                $user = new User($found);
            }
            else {
                throw new \Exception("Wrong password");
            }

            return $user;
        }

        public function reg($username, $email, $password1, $password2) {

            if(empty($username)) throw new \Exception("Username is required");
            if(empty($email)) throw new \Exception("Email is required");
            if(empty($password1)) throw new \Exception("Password is required");

            if($password1 != $password2) throw new \Exception("Passwords do not match");

            $stm = $this->pdo->query("SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
            $found = $stm->fetchAll();
            if (!empty($found)) throw new \Exception("User already exists");

            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$username, $email, md5($password1)]);
        }

        public function __construct($conn) {
            parent::__construct($conn);
        }
    }
?>