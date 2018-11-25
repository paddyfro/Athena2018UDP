<?php
require_once("php/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//get the values from the form
$loanDays = filter_input(INPUT_POST, "days");
$uploaded_book_id = filter_input(INPUT_POST, "uploaded_book_id");
$user_id = filter_input(INPUT_POST, "user_id");


if (!isset($loanDays)) {
    include("loadHomeData.php");
    exit();
}

updateBorrowedBooks($loanDays, $uploaded_book_id , $user_id);
updateUploadedBooks($uploaded_book_id);

function updateBorrowedBooks($loanDays, $uploaded_book_id,$user_id) {
    global $db;
    $insertQuery = "INSERT INTO `borrowed_books`(`account_id`, `overdue_fees`, `overdue_days`, `start_date`, `rent_period`, `due_date`, `uploaded_book_id`, `returned`)
    VALUES (:np_acc_id,:np_overdue_fees, :np_overdue_days, :np_start_date,
    :np_rent_period, :np_due_date, :np_uploaded_book_id,:np_returned)";   //not sure how to get the uploaded_book id from selecting borrow


    $insertQuery = "INSERT INTO `borrowed_books`(`account_id`, `overdue_fees`, `overdue_days`, `start_date`, `rent_period`, `due_date`, `uploaded_book_id`, `returned`) "
            . "VALUES (:np_acc_id,0,0,CURRENT_DATE,:np_rent_period,CURRENT_DATE+rent_period,:np_uploaded_book_id,0)";

    $statement = $db->prepare($insertQuery);
    $statement->bindValue(":np_acc_id", $user_id);
    $statement->bindValue(":np_rent_period", $loanDays);
    $statement->bindValue(":np_uploaded_book_id", $uploaded_book_id);
    $statement->execute();
    $statement->closeCursor();
}

function updateUploadedBooks($uploaded_book_id) {
    global $db;
    $updateAvailability = "update uploaded_books SET available =0 where uploaded_book_id= :uploaded_book_id";

    $statement = $db->prepare($updateAvailability);
    $statement->bindValue(":uploaded_book_id", $uploaded_book_id);
    $statement->execute();
    $statement->closeCursor();
}

//$borrowed_book_details = "SELECT max(borrowed_book_id), b.title, bb.start_date, bb.due_date, bb.rent_period, b.image FROM borrowed_books bb, uploaded_books u, book b where bb.uploaded_book_id = u.uploaded_book_id and u.book_id= b.book_id and bb.account_id = 9 and bb.start_date=CURRENT_DATE";
//$statement1 = $db->prepare($borrowed_book_details);
//$statement1->execute();
//$book_borrowedTodayArray = $statement1->fetchAll();
//$statement1->closeCursor();
//
//$borrower_details = "SELECT a.name, a.email_address, ub.uploaded_book_id from account a, uploaded_books ub where ub.account_id=a.account_id and ub.account_id=9;";
//$statement2 = $db->prepare($borrower_details);
//$statement2->execute();
//$borrower_details_Array = $statement2->fetchAll();
//$statement2->closeCursor();
//
//
//$owner_details = "select * from account a, uploaded_books ub where a.account_id=ub.account_id and uploaded_book_id=:uploaded_book_id;";//HERE
//$statement3 = $db->prepare($owner_details);
//$statement3->bindValue(":uploaded_book_id", $uploaded_book_id);
//$statement3->execute();
//$owner_details_array = $statement3->fetchAll();
//$statement3->closeCursor();
?>

<!-- SENDING THE EMAIL TO THE BORROWER-->
<?php // foreach ($borrower_details_Array as $borrower_details)  : ?>
<?php // foreach ($book_borrowedTodayArray as $book_borrowedToday)  : ?>
 <?php // foreach ($owner_details_array as $owner_details)  : ?>
<?php
//$to = $borrower_details["email_address"];
//$subject = "Thanks for borrowing a book " . $borrower_details ["name"];
//$txt = "Hello ".$borrower_details["name"] . " , thank you for borrowing " . $book_borrowedToday ["title"] ."!"
//        . "  All you have to do now is, get in contact with " .$owner_details["name"].""
//        . " by phone: " .$owner_details["phone_number"]." The  book"
//        . " will be due back on : ". $book_borrowedToday['due_date'];
//
//mail($to,$subject,$txt);
//$send = mail($to,$subject,$txt);
//if($send)
//{
//     "Email sent to " .$to;
//}
//else
//     "Failed to send";
//           ?>            
              <?php // endforeach; ?>
                 <?php // endforeach; ?>
              <?php // endforeach; ?>


<!-- SENDING THE EMAIL TO THE OWNER .. THIS IS WORKING BUT IT IS TRYING TO SEND THE EMAIL TO THE OWNER MULTIPLE TIMES--> 
<!--
//<?php
//$to = $owner_details["email_address"];
//$subject = "".$book_borrowedToday["title"] . "has been requested!";
//$txt = "Hello, ".$owner_details["name"] . " , your book, " . $book_borrowedToday ["title"] 
//        . "  has been borrowed, " .$borrower_details["name"]." will be in contact with you soon.";
//
//mail($to,$subject,$txt);
//$send = mail($to,$subject,$txt);
//if($send)
//{
//     "Email sent to " .$to;
//}
//else
//     "Failed to send";
$owner_details = "select *, book.title as book_title from account a, uploaded_books ub LEFT JOIN book on book.book_id = ub.book_id where a.account_id=ub.account_id and uploaded_book_id=:uploaded_book_id;";//HERE
$statement3 = $db->prepare($owner_details);
$statement3->bindValue(":uploaded_book_id", $uploaded_book_id);
$statement3->execute();
$owner_details_array = $statement3->fetchAll();
$statement3->closeCursor();


function updateNotifications($notification,$user_id) {
    global $db;
    $insertQuery = "INSERT INTO `notifications`(`account_id`, `notification`)VALUES (:np_account_id,:np_notification)";   //not sure how to get the uploaded_book id from selecting borrow
     $statement = $db->prepare($insertQuery);
    $statement->bindValue(":np_notification", $notification);
    $statement->bindValue(":np_account_id", $user_id);
    $statement->execute();
    $statement->closeCursor();
}

//           ?>            
          -->
          
          <!-- notification-->

 <?php foreach ($owner_details_array as $owner_details)  : ?>
           
<?php
//sending notification to borrower

$notification="Please get in contact with ".$owner_details['name']." on ".$owner_details['phone_number']."  to organise the colection of the book". $owner_details['book_title'];
updateNotifications($notification,$user_id);

//
//
$user_id=$owner_details['account_id'];
$notification="Your book, ".$owner_details['book_title'].", has been borrowed by ".$_SESSION['username'] .", you will be contacted shortly to arrange collection";
updateNotifications($notification,$user_id);
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
          
<?php
//echo 'Thank you, ' . $borrower_details ["name"] . ' for borrowing a book!';
//echo ' A confirmation email has been sent to '. $borrower_details["email_address"].'<br>';

//echo 'Thank you for borrowing a book! <br/>'
//. 'A confirmation email has been sent your your email address.<br/>'
//        . 'This outlines how to contact the owner of the book and collect your book.';
  foreach ($owner_details_array as $owner_details)  : ?>
           
<?php
//sending notification to borrower
echo "Thank you for borrowing a book, check your notifications for details to contact  ".$owner_details['name'];
?>
              <?php endforeach; ?>
          
    </main>


</body>
</html>
<?php include "./php/footer.php"; ?>






