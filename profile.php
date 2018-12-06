<?php
require_once'php/nav.php';
//echo $_SESSION['account_id'];
if (!isset($_SESSION['account_id'])) {
    header("location: home.php");
    exit();
}
?>


<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->

    <!-- Profile Info -->
    <?php
    if (isset($_GET["passwordReset"])) {
        if ($_GET["passwordReset"] == "success") {
            echo ' <h2 id="uploadSuccess"> - Reset Password successful!</h2>';
        } else if ($_GET["passwordReset"] == "fail") {
            echo ' <h2 id="uploadSuccess"> - Reset Password failed - check your details</h2>';
        } else {
            echo '';
        }
    }
    if (isset($_GET["profileEdit"])) {
        if ($_GET["profileEdit"] == "success") {
            echo ' <h2 id="uploadSuccess"> - Edit Profile data successful!</h2>';
        } else if ($_GET["profileEdit"] == "fail") {
            echo ' <h2 id="uploadSuccess"> - Edit profile data failed - check your details</h2>';
        } else {
            echo '';
        }
    }
    //profileBook
    if (isset($_GET["profileBook"])) {
        if ($_GET["profileBook"] == "success") {
            echo ' <h2 id="uploadSuccess"> - Edit Book data successful!</h2>';
        } else if ($_GET["profileBook"] == "fail") {
            echo ' <h2 id="uploadSuccess"> - Edit Book data failed - check your details</h2>';
        } else {
            echo '';
        }
    }
    ?>
    <div class="card person-card" id="profile"></div>

    <!-- Profile Content -->
    <div class="row">
        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">Currently Shared Books</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#booksShared">Show Shared Books</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="booksShared" class="collapse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card"> 
                <div class="card-body" >
                    <h2 class="card-title">Currently Borrowed Books</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#booksLoan" >Show Borrowed Books</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="booksLoan" class="collapse">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Wishlist</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#wishlist">Show Whishlist</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="wishlist" class="collapse">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">My Books</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#mybooks">Show My Books</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="mybooks" class="collapse">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">History</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#history">Show History</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="history" class="collapse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-top:0.5em;">
            <div class="card"> 
                <div class="card-body">
                    <h2 class="card-title">Pending Requests</h2>
                    <button class="btn btn-primary " data-toggle="collapse" data-target="#bookRequests">Show Requests</button>    
                    <div class="col-sm-12 col-xs-12 my-1">
                        <div id="bookRequests" class="collapse">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once'./php/footer.php';
