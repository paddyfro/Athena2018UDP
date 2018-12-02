<?php

include './functions.inc.php';
session_start();

if (isset($_POST['editUploadedBook-submit'])) {
    require 'dbh.inc.php';
    require './database.php';

    $condition = $_POST['bkCondition'];
    //$availability = $_SESSION['bkAvailability'];
    $uploadBookId = $_POST['bk_uploadedBook_id'];
    $accId = $_SESSION['account_id'];



    try {
        $query = 'UPDATE uploaded_books SET book_condition = :np_condition WHERE account_id = :np_accId AND uploaded_book_id = :np_uploaded_book_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_condition', $condition);
       // $statement->bindValue(':np_available', $availability);
        $statement->bindValue(':np_uploaded_book_id', $uploadBookId);
        $statement->bindValue(':np_accId', $accId);
        $statement->execute();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('database_error.php');
        exit();
    }
    header("location: ../profile.php?profileBook=success");
} else {
    header("location: ../profile.php?profileBook=fail");
    exit();
}