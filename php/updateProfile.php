<?php

include './functions.inc.php';
session_start();

if (isset($_POST['editProfile-submit'])) {
    require 'dbh.inc.php';
    require './database.php';

    $name = $_POST['name'];
    $accId = $_SESSION['account_id'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $location_id = chceckLocation($address, $db);
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];


    try {
        $query = 'UPDATE account SET name = :np_new_name, username = :np_username, address = :np_address, location_id = :np_location_id, phone_number = :np_phone_number, age = :np_age WHERE account_id = :np_accId';
        $statement = $db->prepare($query);
        $statement->bindValue(':np_new_name', $name);
        $statement->bindValue(':np_username', $username);
        $statement->bindValue(':np_accId', $accId);
        $statement->bindValue(':np_address', $address);
        $statement->bindValue(':np_location_id', $location_id);
        $statement->bindValue(':np_phone_number', $phone_number);
        $statement->bindValue(':np_age', $age);
        $statement->execute();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('database_error.php');
        exit();
    }
    header("location: ../profile.php?profileEdit=success");
} else {
    header("location: ../profile.php?profileEdit=fail");
    exit();
}