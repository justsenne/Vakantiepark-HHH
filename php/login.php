<?php

class login
{

//Compare username to usernames in DB
    public function fetchUsers()
    {
        session_start();
        include '../includes/connection.php';
        $connection = new Connection();

        $query = $connection->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(
            ':email' => $_POST['email']
        ));
        $result = $query->fetchAll();

        return $result;
    }

    public function compareUsers()
    {
        session_start();
        include '../includes/connection.php';
        $connection = new Connection();

        if (isset($_POST['submit'])) {
            //Start logging in
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $query = $connection->connect()->prepare("SELECT * FROM users WHERE email=? AND password=?");

                foreach ($this->fetchUsers() as $hash) {
                    $hashed = password_verify($_POST['password'], $hash['password']);

                    $query->bindParam(1, $email);
                    $query->bindParam(2, $hashed);
                }

                $query->execute();
                //If logged in allow access to site
                if ($hashed == true) {
                    foreach ($this->fetchUsers() as $results) {
                        $_SESSION['user_id'] = $results['user_id'];
                        $_SESSION['email'] = $results['email'];
                        $_SESSION['logged_in'] = true;
                    }
                    header('location: ../index.php');
                    exit;
                } else {
                    echo 'Naam of wachtwoord incorrect';
                    header('location: ../pages/login.php');
                }
            } else {
                echo 'Voer een naam en wachtwoord in';
                header('location: ../pages/login.php');
            }
            return false;
        }
    }
}