<?php

require_once("./database.php");


if (isset($_POST["query"])) {
    $output = '';

    //returns a list of the countries that match the posted query values
    $query = 'SELECT email_address FROM account WHERE email_address = :np_email';
    $statement = $db->prepare($query);
    $statement->bindValue(':np_email', $_POST["query"]);
    $statement->execute();
    $username = $statement->fetch();
    $statement->closeCursor();

    //checking if the array returned from the query has values
    if (count($username) > 1) {
        $output .= "emailFound";
    } else {
        //output if country not found
        $output .= "emailNotFound";
    }
    echo $output;
}