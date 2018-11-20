<?php

include './functions.inc.php';

if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';
    require './database.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email_address'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $pic = ($_FILES['photo']['name']);
    $defaultPicName = "default_profile.png";
    $pic = checkPicDetails($pic, $defaultPicName);
    $location_id = chceckLocation($address, $db);


    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../signup.php?error=InvalidMailuid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../signup.php?error=InvalidMail&uid=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../signup.php?error=InvalidUid&mail=" . $mail);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("location: ../signup.php?error=passwordcheck&uid" . $username . "&mail=" . $email);
        exit();
    } else if ($age < 17 || $age > 120) {
        header("location: ../signup.php?error=invalidAge" . $age);
        exit();
    } else if (strlen($name) < 4 || strlen($username) < 4) {
        header("location: ../signup.php?error=lengthTooShort&uid=" . $username . "&gullnbame=" . $name);
        exit();
    } else {
        $sql = "SELECT username FROM account WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=sqlError1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("location: ../signup.php?error=usertaken&mail" . $email);
                exit();
            } else {

                $sql = "INSERT INTO account (name, username, email_address, password, address, phone_number, age,profile_image, location_id) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../signup.php?error=sqlError2");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $username, $email, $hashedPwd, $address, $phone_number, $age, $pic, $location_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $uploadSuccessful = checkPicUpload($pic, "../images/users/", $defaultPicName);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);

                    $accId = getAccountId($email, $db);
                    if (insertReview($accId, 3, $db)) {
                        header("location: ../home.php?signup=success");
                        exit();
                    } else {
                        header("location: ../signup.php?signup=fail");
                        exit();
                    }
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location: ../signup.php");
    exit();
}