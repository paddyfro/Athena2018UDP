<?php
include_once'.\php\nav.php';
?>

<!--Login Form-->

<div class="container">	
    <div class="row" style="margin-bottom:100px; margin-top:100px;">
        <h2>Login</h2><br/>
        <?php
        //        validation checks       
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "wrongpassword") {
                echo ' <h2 id="uploadSuccess"> - Issue with your login details, please try again</h2>';
            } else {
                echo '';
            }
        }
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Start form -->
            <form id="login_form" action="php/login.inc.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label><span class="validSpan"></span>
                    <input type="email" class="form-control" id="login_email" name="mailuid" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label><span class="validSpan"></span>
                    <input type="password" class="form-control" id="login_password" name="pwd"  placeholder="Enter Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="form-check"> 
                    <button type="submit" class="btn btn-primary" id="reg_button" name="login-submit">Login</button>
                </div>
                
            </form>
            <!--<a href="#">Forgot password</a>-->


            <!-- End form -->
        </div>



    </div>
</div>
<script src="js/loginValidation.js" type="text/javascript"></script>
<?php
require_once'./php/footer.php';
