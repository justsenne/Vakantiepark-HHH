<?php

class connection
{
    public function connect()
    {
        try {
            global $conn;
            $conn = new PDO('mysql:host=localhost;dbname=hhh', "root", "");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
