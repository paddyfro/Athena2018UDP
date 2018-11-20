<?php
require 'database.php';

$uid = filter_input(INPUT_POST, "uid");
$bookID = filter_input(INPUT_POST, "bookID");
$id = filter_input(INPUT_POST, "id");
//$comment = filter_input(INPUT_POST, "content");

if ($id == 1){
remove($uid, $bookID);
} else {
add($uid, $bookID);
}

function remove($uid, $bookID) {
    global $db;
    $commentQuery = 'DELETE FROM `wish_list` WHERE `wish_list`.`account_id` = :uID AND `wish_list`.`book_id` = :bookID';
    $statement = $db->prepare($commentQuery);
    $statement->bindValue(':uID', $uid);
    $statement->bindValue(':bookID', $bookID);
    $statement->execute();
    $statement->closeCursor();
}

function add($uid, $bookID) {
    global $db;
    $commentQuery = 'INSERT INTO `wish_list` (`account_id`, `book_id`, `notifications`) VALUES (:uID, :bookID, NULL)';
    $statement = $db->prepare($commentQuery);
    $statement->bindValue(':uID', $uid);
    $statement->bindValue(':bookID', $bookID);
    $statement->execute();
    $statement->closeCursor();
}