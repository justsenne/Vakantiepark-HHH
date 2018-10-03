<?php
include('../includes/connection.php');
$connection = new connection();

if (isset($_POST['submit'])) {
    echo '1 ';
    if (isset($_POST['email']) && isset($_POST['password'])) {
        echo '2 ';
        //Insert into DB
        $query = $connection->connect()->prepare('INSERT INTO users (email, password, first_name, surname, phone_number, street_name, house_number) 
                                                      VALUES (:email, :password, :first_name, :surname, :phone_number, :street_name, :house_number)');

        $exec = $query->execute(array(
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ':first_name' => $_POST['first_name'],
            ':surname' => $_POST['surname'],
            ':phone_number' => $_POST['phone_number'],
            ':street_name' => $_POST['street_name'],
            ':house_number' => $_POST['house_number']
        ));

        if ($exec) {
            echo 'Inserted';
        }
        //header('location: ../index.php');
        $_SESSION['error'] = '';
    } else {
        echo 3;
        $_SESSION['error'] = 'Please fill out the entire form.';
        //header('location: register.php');
    }
} else {
    echo 4;
    echo 'Nothing was inserted';
}
