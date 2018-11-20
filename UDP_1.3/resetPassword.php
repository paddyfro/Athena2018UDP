<?php
include_once'.\php\nav.php';
if (!isset($_SESSION['account_id'])) {
    header("location: home.php");
    exit();
}
?>

<!--Login Form-->

<div class="container">	
    <div class="row" style="margin-bottom:100px; margin-top:100px;">
        <h2>Reset Password</h2><br/>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Start form -->
            <form id="reset_pwd_form" action="php/resetPass.php" method="post">
                <div class="form-group">
                    <label for="oldPwd">Old Password</label><span class="validSpan"></span>
                    <input type="password" class="form-control" id="reset_old_pwd" name="reset_old_pwd" placeholder="Enter old password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="form-group">
                    <label for="newPwd1">New Password 1</label><span class="validSpan"></span>
                    <input type="password" class="form-control" id="reset_new_pwd1" name="reset_new_pwd1"  placeholder="New password 1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="form-group">
                    <label for="newPwd2">New Password 2</label><span class="validSpan"></span>
                    <input type="password" class="form-control" id="reset_new_pwd2" name="reset_new_pwd2" placeholder="New password 2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="form-check"> 
                    <button type="submit" class="btn btn-primary" id="reg_button" name="reset_pwd_submit">Reset Password</button>
                </div>
                
            </form>



            <!-- End form -->
        </div>



    </div>
</div>
<script src="js/resetPassValidation.js" type="text/javascript"></script>
<?php
require_once'./php/footer.php';
