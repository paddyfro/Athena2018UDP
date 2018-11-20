<?php
include_once'.\php\nav.php';
?>

<!--signp Form-->

<div class="container">	
    <div class="row" style="margin-bottom:100px; margin-top:100px;">
        <h2>New Account Setup</h2><br/>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="my-4">Please fill in account details below</h3>
            <!-- Start form -->
            <form id="signup_form" action="php/signup.inc.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullName">Full Name</label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="fullName" name="name" aria-describedby="emailHelp" placeholder="Enter full name" title="string of at least 4 chars in length, allowing alphabetic, numeric and '_'">
                </div>
                <div class="form-group">
                    <label for="exUserName">User Name</label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="exUserName" name="username" aria-describedby="emailHelp" placeholder="Enter User Name" pattern="[a-zA-Z0-9_]+" title="string of at least 4 chars in length, allowing alphabetic, numeric and '_'">
                </div>
                <div class="form-group">
                    <label for="exInputEmail1">Email Address</label><span class="validSpan"></span>
                    <input type="email" class="form-control" id="exInputEmail1" name="email_address" aria-describedby="emailHelp" placeholder="Enter email" title="Must be a valid email">
                </div>
                <div class="form-group">
                    <label for="exInputPassword1">Password</label><span class="validSpan"></span>
                    <input type="password" class="form-control" name="pwd" id="password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="form-group">
                    <label for="exInputPassword2">Repeat Password</label><span class="validSpan"></span>
                    <input type="password" class="form-control" name="pwd-repeat" id="password2" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match other password, Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
<!--                <div class="form-group">
                    <label for="exInputAddress">Address (County)</label><span></span>
                    <input type="text" class="form-control" name="address" id="exInputAddress" placeholder="Address (County)" pattern="[a-zA-Z0-9]+" title="Must be a valid county address">
                </div>-->
                <div class="form-group">
                    <label for="exInputAddress">Address (County)</label><span class="validSpan"></span>
                    <select class="form-control" name="address" id="exInputAddress" size="6">
                        <option value="antrim">Antrim</option>
                        <option value="armagh">Armagh</option>
                        <option value="carlow">Carlow</option>
                        <option value="cavan">Cavan</option>
                        <option value="clare">Clare</option>
                        <option value="cork">Cork</option>
                        <option value="derry">Derry</option>
                        <option value="donegal">Donegal</option>
                        <option value="down">Down</option>
                        <option value="dublin">Dublin</option>
                        <option value="fermanagh">Fermanagh</option>
                        <option value="galway">Galway</option>
                        <option value="kerry">Kerry</option>
                        <option value="kildare">Kildare</option>
                        <option value="kilkenny">Kilkenny</option>
                        <option value="loais">Laois</option>
                        <option value="leitrim">Leitrim</option>
                        <option value="limerick">Limerick</option>
                        <option value="longford">Longford</option>
                        <option value="louth">Louth</option>
                        <option value="mayo">Mayo</option>
                        <option value="meath">Meath</option>
                        <option value="monaghan">Monaghan</option>
                        <option value="offaly">Offaly</option>
                        <option value="roscommon">Roscommon</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exInputPhoneNumber">Phone Number</label><span class="validSpan"></span>
                    <input type="number" class="form-control" name="phone_number" id="exInputPhoneNumber" placeholder="Phone Number" title="must be a valid phone number. allowed format - (+44)(0)20-12341234 | 02012341234 | +44 (0) 1234-1234">                </div>

                <div class="form-group">
                    <label for="exInputAge">Age</label><span class="validSpan"></span>
                    <input type="number" class="form-control" name="age" id="exInputAge" placeholder="Age"  title="Must be a vialld age 17- 120">
                </div>
                <div class="form-group">
                    <label for="exBkImage">Profile Photo. Please upload a PNG/JPG photo.(default picture will be used if none uploaded)</label>
                    <input type="hidden" name="size" value="350000">
                    <input type="file" class="form-control" id="exBkImage" name="photo" aria-describedby="emailHelp">
                </div>
                <div class="form-check"> 
                    <button type="submit" class="btn btn-primary" name="signup-submit">Sign up</button>
                </div>
            </form>
            <!-- End form -->
        </div>



    </div>
</div>
<script src="js/signupValidation.js" type="text/javascript"></script>

<?php
require_once'./php/footer.php';
