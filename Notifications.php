<?php
require("./php/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$user_id = filter_input(INPUT_POST, "user_id");

$user_id = $_SESSION['account_id'];

  
//
//$view_notification = "select * from notifications where account_id = 21";    
//$statement = $db->prepare($view_notification);
//$statement->execute();
//$notificationArray = $statement->fetchAll();
//$statement->closeCursor();
//getNofications($user_id);


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
    ?>
    
    
     <?php // endforeach; ?>
    
    
    
    <a href="nav.php"></a>
<!--notifications for due books/nearly due books-->



 





</body>
<?php require('./php/footer.php')?>











