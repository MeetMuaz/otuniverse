<?php

//require all necessary files
require_once '../config/dbh.con.php';
require_once 'function.inc.php';
//global $conn;
    if (isset($_POST['action']) && $_POST['action'] == "sendContactMsg"){

        $errors = false;

        // Validate all inputs
        if (empty($_POST['name'])){
            $errors = true;
            $errorMsg = "Please Provide Name";
        }

        if (empty($_POST['email'])){
            $errors = true;
            $errorMsg = "Please Provide Email";
        }

        if (empty($_POST['number'])){
            $errors = true;
            $errorMsg = "Please Provide 10 digit Number";
        }

        if (empty($_POST['message'])){
            $errors = true;
            $errorMsg = "Please Provide Message";
        }

        if (!$errors){

            // collect other input values
            $contactData = [
                'contactName' => $_POST['name'],
                'contactEmail' => $_POST['email'],
                'contactPhone' => $_POST['number'],
                'contactMessage' => $_POST['message']
            ];

            if (newContactFunction($contactData)){

                $data = [
                    'status' => 200,
                    'message' => "Message Successfully sent"
                ];

            }else{

                $data = [
                    'status' => 400,
                    'message' => "Error Message Could not send"
                ];

            }

        }else{

            $data = [
                'status' => 400,
                'message' => $errorMsg
            ];
        }


        header("Content-type: application/json");
        echo json_encode($data);
        die();

    }

//if (isset($_POST["submit"])) {
//
//    $name = $_POST["name"];
//    $email = $_POST["email"];
//    $phone = $_POST["phone"];
//    $message = $_POST["message"];
//
//    require_once '../config/dbh.con.php';
//    require_once 'function.inc.php';
//
//    if (emptyInputContact($name, $email, $phone, $message) !== false) {
//        header("location: ../contact.php?error=emptyinput");
//        exit();
//    }
//
//    if(invalidName($name) !== false){
//        header("location: ../contact.php?error=invalidname");
//        exit();
//    }
//
//    if(invalidEmail($email) !== false){
//        header("location: ../contact.php?error=invalidemail");
//        exit();
//    }
//
//    if(invalidPhone($phone) !== false){
//        header("location: ../contact.php?error=invalidphone");
//        exit();
//    }
//
//    sendContact($conn, $name, $email, $phone, $message);
//
//} else {
//    header("location: ../contact.php");
//    exit();
//}

