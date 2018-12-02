<?php

function checkPicDetails($pic, $defaultName) {
    $allowed = array('png', 'jpg');
    if ($pic == null) {
        $pic = $defaultName;
    } else {
        //check file stenstion of file uplaoded, only allow png
        $ext = pathinfo($pic, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $pic = $defaultName;
        }
    }
    return $pic;
}

function checkPicUpload($pic, $target, $defaultImgName) {
//    $target = "../img/blog_images/";
    $target = $target . basename($_FILES['photo']['name']);
//    print_r($_FILES);
    $uploadSuccessful = false;
    if ($pic != $defaultImgName) {
        $uploadSuccessful = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    }
    return $uploadSuccessful;
}

function insertReview($accId, $reviewScore, $db)
{
        try {
        $query = 'INSERT INTO review (account_id, rating) VALUES (:np_accId, :np_reviewScore)';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_accId', $accId);
        $statement->bindValue(':np_reviewScore', $reviewScore);       
        $statement->execute();
        return TRUE;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('./php/database_error.php');
        exit();
    }
}

function getAccountId($email, $db){
        try {
        $query = 'SELECT account_id FROM account WHERE email_address = :np_email_address';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_email_address', $email);
        $statement->execute();
        $returnedNum = $statement->fetch();
        $statement->closeCursor();
        if (empty($returnedNum)) {
            return '0';
        } else {
            return $returnedNum['account_id'];
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
//        include('./php/error.php');
        header("location: ../signup.php?error=getAccountIdFunction");
        exit();
    }
}

function chceckLocation($countyName, $db) {
    try {
        $query = 'SELECT location_id FROM location WHERE county = :np_county_name';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_county_name', $countyName);
        $statement->execute();
        $returnedNum = $statement->fetch();
        $statement->closeCursor();
        if (empty($returnedNum)) {
            return '20';
        } else {
            return $returnedNum['location_id'];
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
//        include('./php/error.php');
        header("location: ../signup.php?error=sqlErrorCheckLocation3");
        exit();
    }
    //echo "<script type='text/javascript'>alert('$countyName');</script>";
//    $sql = "SELECT location_id FROM location WHERE county = ?";
//    $stmt = mysqli_stmt_init($conn);
//    if (!mysqli_stmt_prepare($stmt, $sql)) {
//        header("location: ../signup.php?error=sqlErrorCheckLocation2");
//        exit();
//    } else {
//        mysqli_stmt_bind_param($stmt, "s", $countyName);
//        mysqli_stmt_execute($stmt);
//        mysqli_stmt_store_result($stmt);
//        $resultCheck = mysqli_stmt_num_rows($stmt);
//        $test = $resultCheck['location_id'];
//        $loc = $resultCheck['location_id'];
//        echo ''. $loc;
//        echo "<script type='text/javascript'>alert('$loc');</script>";
//        if ($resultCheck > 0) {
//            return $test['location_id'];
//        } else {
//            return '20';
//        }
//    }
}

function chceckIfBookUploaded($ISBN, $db) {
    try {
        $query = 'SELECT book_id FROM book WHERE ISBN = :np_ISBN';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_ISBN', $ISBN);
        $statement->execute();
        $returnedNum = $statement->fetch();
        $statement->closeCursor();
        if (empty($returnedNum)) {
            return '0';
        } else {
            return $returnedNum['book_id'];
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
//        include('./php/error.php');
        header("location: ./upload_book.inc.php?error=sqlErrorcheckbookid");
        exit();
    }
}

function updateUploadedBooks($accountId, $bookId, $locationId, $condition, $db) {
    $available = 1;
        try {
        $query = 'INSERT INTO uploaded_books (account_id, book_id, available, location_id, book_condition) VALUES (:np_accId, :np_bookId, :np_available, :locId, :book_condt)';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_accId', $accountId);
        $statement->bindValue(':np_bookId', $bookId);
        $statement->bindValue(':np_available', $available);
        $statement->bindValue(':locId', $locationId);
        $statement->bindValue(':book_condt', $condition);        
        $statement->execute();
        return TRUE;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('./php/database_error.php');
        exit();
    }
    
//    $sql = "INSERT INTO uploaded_books (account_id, book_id, available, location_id, book_condition) VALUES (?,?,?,?,?)";
//    $stmt = mysqli_stmt_init($conn);
//    if (!mysqli_stmt_prepare($stmt, $sql)) {
//        return 0;
//    } else {
//        mysqli_stmt_bind_param($stmt, "sssss", $accountId, $bookId, $available, $locationId, $condition);
//        mysqli_stmt_execute($stmt);
//        mysqli_stmt_store_result($stmt);
//        return 1;
//    }
}

function getPasswordDb($accId, $db){
    try {
        $query = 'SELECT password FROM account WHERE account_id = :np_accId';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_accId', $accId);
        $statement->execute();
        $returnedPass = $statement->fetch();
        $statement->closeCursor();
        if (empty($returnedPass)) {
            return '0';
        } else {
            return $returnedPass['password'];
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
//        include('./php/error.php');
        header("location: ./resetPassword.php?error=sqlErrorgetpassword");
        exit();
    }
}

function updateUserPassword($pwd, $accId, $db){
      try {
        $query = 'UPDATE account SET password = :np_new_pwd WHERE account_id = :np_accId';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_new_pwd', $pwd);
        $statement->bindValue(':np_accId', $accId);
        $statement->execute();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('database_error.php');
        exit();
    }
    // UPDATE `account` SET `password` = '$2y$10$l1yLVbiyUrhQlxK.Y0PvauJ06q4r2gVBZTmnjh66lkhA6VpeRHf8y' WHERE `account`.`account_id` = 8;
//     try {
//        $query = 'INSERT INTO tags (tag) VALUES (:np_tag_name)';
//        $statement = $db->prepare($query);
//        $statement->bindValue(':np_tag_name', $tagName);
//        $statement->execute();
//    } catch (PDOException $e) {
//        $error = $e->getMessage();
//        include('./php/error.php');
//        exit();
//    }   
}
