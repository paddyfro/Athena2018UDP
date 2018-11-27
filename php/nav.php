<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--Bootstrap 4-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!--Bootstrap 4-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            var user_id = "<?php echo $_SESSION['account_id']; ?>";
        </script>
        <script src="js/main.js" type="text/javascript"></script>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link href="css/profile.css" rel="stylesheet" type="text/css"/>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/jpg" href="bookIcon.png">
        <!-- font aweosme style sheet -->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    </head>
    <body>

        <!--Nav-->

        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#03a9f4;">
            <div class="container">
                <a class="navbar-brand" href="home.php"><i class='fas fa-home' style='font-size: 36px'><img src="images/bookshare.png" style="width:200px"/></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <form action="search.php" method="post" class="form-inline">
                        <input class="form-control mr-sm-2" id="search" type="text" name="search" placeholder="Search Books"/><br />
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <?php
                        if (isset($_SESSION['account_id'])) {
                            echo '<li class="nav-item active">
                            <a class="nav-link" href="upload_book.php">UploadBook
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>';
                        }
                        ?>
<!--                        <li class="nav-item active">
                            <a class="nav-link" href="#aboutUs">About Us
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>-->
                        <!-- $_SESSION['account_id'] -->
                        <?php
                        if (isset($_SESSION['account_id'])) {
                            echo '<li class="nav-item active">
                            <a class="nav-link" href="php/logout.inc.php">Logout
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                           <li class="nav-item active">
                            <a class="nav-link" href="profile.php">Profile
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        </li>
                           <li class="nav-item active">
                            <a class="nav-link" href="Notifications.php"><i class="fas fa-bell" style="font-size:24px"></i>
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
                        ';
                        } else {
                            echo '<li class="nav-item active">
                            <a class="nav-link" href="signup.php">Signup
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                         ';
                        }
                        ?>

                    </ul>
                </div>

            </div>
        </nav>