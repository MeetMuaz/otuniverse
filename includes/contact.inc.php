<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    require_once '../config/dbh.con.php';
    require_once 'function.inc.php';

    if (emptyInputContact($name, $email, $phone, $message) !== false) {
        header("location: ../contact.php?error=emptyinput");
        exit();
    }

    if(invalidName($name) !== false){
        header("location: ../contact.php?error=invalidname");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../contact.php?error=invalidemail");
        exit();
    }

    if(invalidPhone($phone) !== false){
        header("location: ../contact.php?error=invalidphone");
        exit();
    }

    sendContact($conn, $name, $email, $phone, $message);

} else {
    header("location: ../contact.php");
    exit();
}