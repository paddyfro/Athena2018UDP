<?php

session_start();
include './functions.inc.php';


if (isset($_POST['upload_book-submit'])) {
    require 'dbh.inc.php';
    require './database.php';

    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $ISBN = $_POST['ISBN'];
//        $image = $_POST['image'];
    $pic = ($_FILES['photo']['name']);
    $defaultPicName = "default_book.png";
    $pic = checkPicDetails($pic, $defaultPicName);
    $bookId = -1;
    

//    $condition = $_POST['bkCondition'];
//    $bookId = chceckIfBookUploaded($ISBN, $db);

//
//    if (isset($_SESSION['account_id'])) {
//    echo 'book id: ' . $bookId . '<br>';
//    echo 'acc id: ' . $_SESSION['account_id'] . '<br>';
//    echo 'USERNAME: ' . $_SESSION['username'] . '<br> ';
//    echo 'locATION  id: ' . $_SESSION['location_id'] . '<br>';
//    echo 'cond id: ' . $condition . '<br>';
//    echo '';
//    }
//


    if (empty($title) || empty($author) || empty($description) || empty($category) || empty($ISBN)) {
        header("location: ../upload_book.php?error=emptyfields&title=" . $title . "&author=" . $author . "&description=" . $description . "&category=" . $category . "&ISBN=" . $ISBN);
        exit();
    } else {
        $bookId = chceckIfBookUploaded($ISBN, $db);
        if ($bookId == 0) {
            //if not uploaded, 
            //upload book to db
            $sql = "INSERT INTO book (title,image,description,category,ISBN,author) VALUES (?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../upload_book.php?error=sqlError");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ssssss", $title, $pic, $description, $category, $ISBN, $author);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $uploadSuccessful = checkPicUpload($pic, "../images/book/", $defaultPicName);
                //get book id
                $bookId = chceckIfBookUploaded($ISBN, $db);
                //update book)uplaoded table
                if (updateUploadedBooks($_SESSION['account_id'], $bookId, $_SESSION['location_id'], $condition, $db)) {
                    header("location: ../upload_book.php?upload_book=success");
                    exit();
                } else {
                    header("location: ../upload_book.php?upload_book=fail");
                    exit();
                }
            }
        } else {
            //update book)uplaoded table
            if (updateUploadedBooks($_SESSION['account_id'], $bookId, $_SESSION['location_id'], $condition, $db)) {
                header("location: ../upload_book.php?upload_book=success");
                exit();
            } else {
                header("location: ../upload_book.php?upload_book=fail");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location: ../home.php");
    exit();
}