<?php

error_reporting(E_ALL);
    ini_set("display_errors", 1);

$username="gdplace";
$password="gdplace%2021";

try {
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
    $conn = new PDO('mysql:host=localhost;dbname=teste', $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}





