<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location: ../login.php?error=emptyfields");
        exit();
    } else if (strlen($password) < 8) {
        header("Location: ../login.php?signup=passwordLength");
        exit();
    } else {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        if (!$uppercase || !$lowercase || !$number) {
            header("Location: ../login.php?signup=passwordStrength");
            exit();
        } else {
            $sql = "SELECT * FROM account WHERE username=? OR  email_address=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../home.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['password']);
                    if ($pwdCheck == false) {
                        header("location: ../login.php?error=wrongpassword");
                        exit();
                    } else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['account_id'] = $row['account_id'];
                        $_SESSION['account_type'] = $row['account_type'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['location_id'] = $row['location_id'];
                        header("location: ../home.php?login=success");
                        exit();
                    } else {
                        header("location: ../login.php?error=wrongpassword");
                        exit();
                    }
                } else {
                    header("location: ../login.php?error=nouser");
                    exit();
                }
            }
        }
    }
} else {
    header("location: ../login.php");
    exit();
}