<?php

include './functions.inc.php';
session_start();

if (isset($_POST['reset_pwd_submit'])) {
    require './database.php';

    $oldPwd = $_POST['reset_old_pwd'];
    $newPwd1 = $_POST['reset_new_pwd1'];
    $newPwd2 = $_POST['reset_new_pwd2'];
    $accId = $_SESSION['account_id'];

//    echo 'acc id' . $accId;
//    echo 'old'.$oldPwd;
//    echo 'new1' . $newPwd1;
//    echo 'mew 2 ' . $newPwd2;
    if (empty($oldPwd) || empty($newPwd1) || empty($newPwd2)) {
        header("location: ../resetPassword.php?error=emptyfields");
        exit();
    } else if (strlen($newPwd1) < 8 || strlen($newPwd2) < 8) {
        header("location: ../resetPassword.php?error=passwordLength");
        exit();
    } else {
        $uppercase = preg_match('@[A-Z]@', $newPwd1);
        $lowercase = preg_match('@[a-z]@', $newPwd1);
        $number = preg_match('@[0-9]@', $newPwd1);
        if (!$uppercase || !$lowercase || !$number) {
            header("location: ../resetPassword.php?error=passwordStrength");
            exit();
        } else {
            $pwdDb = getPasswordDb($accId, $db);
            echo 'pwd db' . $pwdDb;
            if ($pwdDb != '0') {
                $pwdCheck = password_verify($oldPwd, $pwdDb);
                if ($pwdCheck == false) {
                    header("location: ../resetPassword.php?error=wrongpassword1");
                    exit();
                } else if ($pwdCheck == true) {
                    $hashedPwd = password_hash($newPwd1, PASSWORD_DEFAULT);
                    updateUserPassword($hashedPwd, $accId, $db);
                    header("location: ../profile.php?passwordReset=success");
                    exit();
                }
            } else {
                header("location: ../profile.php?error=fail");
                exit();
            }
        }
    }
} 