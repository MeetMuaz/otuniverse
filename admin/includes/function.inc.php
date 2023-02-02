<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdSmall($pwd) {
    $result;
    if(strlen($pwd) < 6) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM admins WHERE adminUid = ? OR adminEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO admins (adminName, adminEmail, adminUid, adminPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
    
}

function emptyInputLogin($username, $pwd) {
    $result;
    if(empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["adminPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["adminid"] = $uidExists["adminId"];
        $_SESSION["adminuid"] = $uidExists["adminUid"];
        header("location: ../index.php");
        exit();
    }
}

function invalidName($name) {
    $result;
    if(!preg_match("/^[a-z ]+$/i", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPhone($phone) {
    $result;
    if(!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputProduct($productName, $productPrice, $productQuantity, $productImage1, $productImage2, $productImage3, $productAbout) {
    $result;
    if(empty($productName) || empty($productPrice) || empty($productQuantity) || empty($productImage1) || empty($productImage2) || empty($productImage3)  || empty($productAbout)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPrice($productPrice){
    $result;
    if(!preg_match("/^[0-9]*$/", $productPrice)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidQuantity($productQuantity){
    $result;
    if(!preg_match("/^[0-9]*$/", $productQuantity)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createProduct($productName, $productPrice, $productQuantity, $productImage1, $productImage2, $productImage3, $productAbout) {
  
      $fileName1 = $_FILES[$productImage1]['name'];
      $fileName2 = $_FILES[$productImage2]['name'];
      $fileName3 = $_FILES[$productImage3]['name'];


      $fileName1 = $_FILES[$productImage1]['tmp_name'];
      $fileName2 = $_FILES[$productImage2]['tmp_name'];
      $fileName3 = $_FILES[$productImage3]['tmp_name'];
      
      
      

    //   $fileSize = $_FILES['file']['size'];
    //   $fileError = $_FILES['file']['error'];
    //   $fileType = $_FILES['file']['type'];

    //   $fileExt = explode('.', $fileName);
    //   $fileActualExt = strtolower(end($fileExt));

    //   $allowed = array('jpg', 'jpeg', 'png');

    //   if (in_array( $fileActualExt, $allowed)) {
    //     if ($fileError === 0) {
    //         if ($fileSize < 1000000) {
    //             $fileNameNew = uniqid('', true).".".$fileActualExt;
    //             $fileDestination = "uploads/".$fileNameNew;
    //             move_uploaded_file($fileTepName, $fileDestination);
    //             return $fileNameNew;
    //         }else{
    //             header("location: ../product-create.php?error=bigfile");
    //             exit();
    //         }
    //     }else {
    //         header("location: ../product-create.php?error=erroruploadingfile");
    //         exit();
    //     }
    //   } else {
    //     header("location: ../product-create.php?error=filenotallowed");
    //     exit();
    //   }
}




































































































































// $extension=array('jpeg', 'jpg', 'png', 'gif');
// foreach ($_FILES['image']['tmp_name'] as $key => $value) {
//     $filename=$_FILES['image']['name'][$key];
//     $filename_tmp=$_FILES['image']['tmp_name'][$key];
//     echo '<br>';
//     $ext=pathinfo($filename, PATHINFO_EXTENSION);
    
//     if (in_array($ext, $extension)) {
//         move_uploaded_file($filename_tmp, 'images/'.$filename);
//     }else{

//     }
// }

    //   $file = $_FILES['file'];
  
    //   $fileName = $file['name'];
    //   $fileTepName = $file['tmp_name'];
    //   $fileSize = $file['size'];
    //   $fileError = $file['error'];
    //   $fileType = $file['type'];

    //   $fileExt = explode('.', $fileName);
    //   $fileActualExt = strtolower(end($fileExt));

    //   $allowed = array('jpg', 'jpeg', 'png');

    //   if (in_array( $fileActualExt, $allowed)) {
    //     if ($fileError === 0) {
    //         if ($fileSize < 1000000) {
    //             $fileNameNew = uniqid('', true).".".$fileActualExt;
    //             $fileDestination = "uploads/".$fileNameNew;
    //             move_uploaded_file($fileTepName, $fileDestination);
    //             return $fileNameNew;
    //         }else{
    //             header("location: ../product-create.php?error=bigfile");
    //             exit();
    //         }
    //     }else {
    //         header("location: ../product-create.php?error=erroruploadingfile");
    //         exit();
    //     }
    //   } else {
    //     header("location: ../product-create.php?error=filenotallowed");
    //     exit();
    //   }
// }

// $image1 = uploadProductFunction($productImage1);
// $image2 = uploadProductFunction($productImage2);
// $image3 = uploadProductFunction($productImage3);

// echo $image1;






