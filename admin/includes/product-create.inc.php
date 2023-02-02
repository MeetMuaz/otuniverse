<?php

if (isset($_POST["submit"])) {

    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];
    $productImage1 = $_POST["productImage1"];
    $productImage2 = $_POST["productImage2"];
    $productImage3 = $_POST["productImage3"];
    $productAbout = $_POST["productAbout"];
    
    require_once '../../config/dbh.con.php';
    require_once 'function.inc.php';

    if (emptyInputProduct($productName, $productPrice, $productQuantity, $productImage1, $productImage2, $productImage3, $productAbout) !== false) {
        header("location: ../product-create.php?error=emptyinput");
        exit();
    }

    if(invalidPrice($productPrice) !== false){
        header("location: ../product-create.php?error=invalidprice");
        exit();       
    }

    if(invalidQuantity($productQuantity) !== false){
        header("location: ../product-create.php?error=invalidquantity");
        exit();       
    }

    createProduct($productName, $productPrice, $productQuantity, $productImage1, $productImage2, $productImage3, $productAbout);

} else {
    header("location: ../product-create.php");
    exit();
}