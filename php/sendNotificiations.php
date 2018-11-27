<?php
require("database.php");
//THIS PAGE SHOULD BE RUN EVERYDAY TO SEND OUT REMINDERS 


$due_books = "SELECT account.account_id,account.name, book.title, borrowed_books.due_date, "
        . "DATEDIFF(`due_date`,CURRENT_DATE) AS DateDiff from borrowed_books ,"
        . " account, uploaded_books, book where account.account_id=borrowed_books.account_id "
        . "and uploaded_books.uploaded_book_id=borrowed_books.uploaded_book_id and uploaded_books.book_id=book.book_id and returned=0 ; ";
    
$statement = $db->prepare($due_books);
$statement->execute();
$due_books_array = $statement->fetchAll();
$statement->closeCursor();


function updateNotifications($notification,$account_id) {
    global $db;
    $insertQuery = "INSERT INTO `notifications`(`account_id`, `notification`)VALUES (:np_account_id,:np_notification)";   //not sure how to get the uploaded_book id from selecting borrow
       $statement = $db->prepare($insertQuery);
    $statement->bindValue(":np_notification", $notification);
    $statement->bindValue(":np_account_id", $account_id);
    $statement->execute();
    $statement->closeCursor();
}

 
?>

<?php foreach ($due_books_array as $due_books)  : ?>

    <?php 
    
    
       if($due_books['DateDiff']==1)
       {
         $notification=  $due_books['title'].', is due to be returned tomorrow.';   
         updateNotifications($notification,$due_books['account_id']);
         
       }
       else if($due_books['DateDiff']==3)
       {
           $notification= $due_books['title'].',is due to be returned in 3 days.';  
           updateNotifications($notification,$due_books['account_id']);
       }
       
       else if($due_books['DateDiff']<1)
       {
            $notification= $due_books['title'].',your book is over due, please return to the owner asap.';  
            updateNotifications($notification,$due_books['account_id']);
           
       }  

     
       
    ?>
       <?php endforeach; ?>

<html>
    
    notifications sent
    
    
</html>












