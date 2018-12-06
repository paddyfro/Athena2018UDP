<?php
require_once("php/database.php");
include 'php/functions.inc.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//get the values from the form
$loanDays = filter_input(INPUT_POST, "days");
$uploaded_book_id = filter_input(INPUT_POST, "uploaded_book_id");
$user_id = filter_input(INPUT_POST, "user_id");
$lender_id = filter_input(INPUT_POST, "lender_id");
//echo $uploaded_book_id;

if (!isset($loanDays)) {
    include("loadHomeData.php");
    exit();
}


//insert into requests
//insertIntoRequests($db, $uploaded_book_id, $loanDays, $user_id, $lender_id);
try {
    //$query = 'INSERT INTO requests (uploaded_book_id, days, borrower_id,lender_id) VALUES (:np_uploaded_book_id, :np_days, :np_borrower_id, :np_lender_id)';
    $query1 = "INSERT INTO requests (uploaded_book_id, days, borrower_id, lender_id) VALUES (:np_uploaded_book_id, :np_days, :np_borrower_id, :np_lender_id)";
    $statement6 = $db->prepare($query1);
    echo "inster1";
    $statement6->bindValue(':np_uploaded_book_id', $uploaded_book_id);
    $statement6->bindValue(':np_days', $loanDays);
    $statement6->bindValue(':np_borrower_id', $user_id);
    $statement6->bindValue(':np_lender_id', $lender_id);
    echo "inster2";
    $statement6->execute();
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('./php/database_error.php');
    exit();
}



$owner_details = "select *, book.title as book_title from account a, uploaded_books ub LEFT JOIN book on book.book_id = ub.book_id where a.account_id=ub.account_id and uploaded_book_id=:uploaded_book_id;"; //HERE
$statement3 = $db->prepare($owner_details);
$statement3->bindValue(":uploaded_book_id", $uploaded_book_id);
$statement3->execute();
$owner_details_array = $statement3->fetchAll();
$statement3->closeCursor();

function updateNotifications($notification, $user_id) {
    global $db;
    $insertQuery = "INSERT INTO `notifications`(`account_id`, `notification`)VALUES (:np_account_id,:np_notification)";   //not sure how to get the uploaded_book id from selecting borrow
    $statement = $db->prepare($insertQuery);
    $statement->bindValue(":np_notification", $notification);
    $statement->bindValue(":np_account_id", $user_id);
    $statement->execute();
    $statement->closeCursor();
}

//           
?>            


<!-- notification-->

<?php foreach ($owner_details_array as $owner_details) : ?>

    <?php
//sending notification to borrower

    $notification = "Your request for  " . $owner_details['book_title'] . " has been sent, please await confirmation.";
    updateNotifications($notification, $user_id);

//
//
    $user_id = $owner_details['account_id'];
//send notification to lender
    $notification = "Your book, " . $owner_details['book_title'] . ", has been requested by " . $_SESSION['username'] . ", please review details in your profile -> pending requests";
    updateNotifications($notification, $user_id);
    ?>
<?php endforeach; ?>





<style>
    img{
        width:90px;
        height: 110px;
    }
</style>

<?php include "php/nav.php"; ?>
<body>


    <main>
        <h2>Confirmation</h2>            
        <br><br>

        <?php foreach ($owner_details_array as $owner_details) : ?>

            <?php
//sending notification to borrower
            echo "Thank you for requesting the book " . $owner_details['book_title'] . ", you will be notified if the request has been accepted by " . $owner_details['name'];
            ?>
        <?php endforeach; ?>

    </main>


</body>
</html>
<?php include "./php/footer.php"; ?>






