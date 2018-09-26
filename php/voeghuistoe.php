<?php
include_once('../includes/connection.php');
session_start();
if (isset($_POST['submit'])) {
    $file = $_FILES['articleimage'];
    $fileName = $file['name'];
    $fileTMPname = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileFile = $file['type'];

    // house_name house_description park_id house_photos general_information person_count level discount Product toevoegen

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 5120000) {
                if ($_SESSION["rank"] == 1) {
                    $fileHash = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../data/img/' . $fileHash;
                    move_uploaded_file($fileTMPname, $fileDestination);

                    $sql = "INSERT INTO homes('house_name' 'house_description' 'park_id' 'house_photos' 'general_information' 'person_count' 'level' 'discount' 'Product') VALUES (':house_name' ':house_description' ':park_id' ':house_photos' ':general_information' ':person_count' ':level' ':discount' ':Product')";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(':articlename', $_POST['articlename'], PDO::PARAM_STR);
                    $stmt->bindParam(':articledesc', $_POST['articledesc'], PDO::PARAM_STR);
                    $stmt->bindParam(':articleprice', $_POST['articleprice'], PDO::PARAM_STR);
                    $stmt->bindParam(':articleimage', $fileHash, PDO::PARAM_STR);
                    $stmt->execute();
                } else {
                    header("Location: ../../index.php");
                }

                header("Location: ../index.php");
                exit;
            } else {
                $filesizeMB = $fileSize / 1024;
                echo "Your file is too big! (" + $filesizeMB + " / 50mb)";
            }
        } else {
            echo "There was an error uploading this file! please try again!";
        }

    } else {
        echo "You can only upload jpg, jpeg, pdf or gif files!";
    }
}
?>