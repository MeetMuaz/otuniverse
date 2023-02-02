<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require_once '../config/dbh.con.php';
    require_once 'function.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pwdSmall($pwd) !== false){
        header("location: ../signup.php?error=passwordsissmall");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }


    if(uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernameexists");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

    loginUser($conn, $username, $pwd);

} else {
    header("location: ../signup.php");
    exit();
}


