<?php
require("./php/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$user_id = filter_input(INPUT_POST, "user_id");

$user_id = $_SESSION['account_id'];

//getWishlist($user_id) ;
//finding out what books are due

$due_books = "SELECT account.account_id,account.name, book.title, borrowed_books.due_date, "
        . "DATEDIFF(`due_date`,CURRENT_DATE) AS DateDiff from borrowed_books ,"
        . " account, uploaded_books, book where account.account_id=borrowed_books.account_id "
        . "and uploaded_books.uploaded_book_id=borrowed_books.uploaded_book_id and uploaded_books.book_id=book.book_id and returned=0 ; ";
    
$statement = $db->prepare($due_books);
$statement->execute();
$due_books_array = $statement->fetchAll();
$statement->closeCursor();

//updating the notifications
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
//      if(getMaxDateNofication($user_id) < getCurrentDate())       
//  {  
    
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
            $notification= $due_books['title'].', is over due, please return to the owner asap.';  
            updateNotifications($notification,$due_books['account_id']);
           
       }  
  //}

     
       
    ?>
       <?php endforeach; ?>
  
//<?php
////getting the wishlist
//function getWishlist($user_id) {
//    global $db;
//    $getUsersWishList="SELECT title , name , available   FROM wish_list w, uploaded_books ub, book b, account a WHERE w.book_id=b.book_id AND b.book_id= ub.book_id and ub.account_id=a.account_id AND a.account_id=:UserId AND ub.available=1";
//    //$query = "select * from notifications where account_id= :UserId ORDER BY created_on DESC;";
//    $statement = $db->prepare($getUsersWishList);
//    $statement->bindValue(":UserId", $user_id);
//   $statement->execute();
//   $getUsersWishListArray=$statement->fetchAll();  
//   
//    foreach ($getUsersWishListArray as $wishlist)
//        {        
//   $notification=$wishlist['title']. ', is now available to borrow!';
//   updateNotifications($notification,$user_id);
//          //echo "<br><br><center><b>".$notification['created_on']."</b> ".$notification['notification'].'</center>';
//    }
//   
//}
//
//
//
////?>








<?php

//dropping duplicated


$dropDuplicates = "DELETE `a` FROM `notifications` AS `a`, `notifications` AS `b`"
        . " WHERE `a`.`notification_id` > `b`.`notification_id`"
        . " AND `a`.`account_id` <=> `b`.`account_id`"
        . " AND `a`.`notification` <=> `b`.`notification` ";       
$statement = $db->prepare($dropDuplicates);
$statement->execute();
//$due_books_array = $statement->fetchAll();
$statement->closeCursor();





function getNofications($user_id) {
    global $db;
    $query = "select * from notifications where account_id= :UserId ORDER BY created_on DESC;";
    $statement = $db->prepare($query);
    $statement->bindValue(":UserId", $user_id);
   $statement->execute();
   $notificationData=$statement->fetchAll();
   
    foreach ($notificationData as $notification) {

       echo "<br><br><center><b>".$notification['created_on']."</b> ".$notification['notification'].'</center>';
    }
}
?>






<?php require'./php/nav.php'?>
<body>
    <h1 class="my-4"><center>notifications</center></h1>
    
    <?php // foreach ($notificationArray as $view_notification)  : ?>
    <?php 
//    echo "<br><br><b>".$view_notification['created_on']."</b> ".$view_notification['notification'];
    
    echo getNofications($user_id);
   
    
//  echo  getMaxDateNofication($user_id);

//echo getMaxDateNofication($user_id) ;
echo "<br><br>";

    ?>
    
    
     <?php // endforeach; ?>
    
    
    
    <a href="nav.php"></a>
<!--notifications for due books/nearly due books-->



 





</body>
<?php require('./php/footer.php')?>











