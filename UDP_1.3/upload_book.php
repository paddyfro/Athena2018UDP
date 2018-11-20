<?php
include_once'.\php\nav.php';
if (!isset($_SESSION['account_id'])) {
    header("location: home.php");
    exit();
}
?>

<!--signp Form-->

<div class="container">	
    <div class="row" style="margin-bottom:100px; margin-top:100px;">
        <h1>Upload Book</h1><br/>
        <?php
//        validation checks       
        if (isset($_GET["upload_book"])) {
            if ($_GET["upload_book"] == "success") {
                echo ' <h2 id="uploadSuccess"> - Upload Book successful!</h2>';
            } else if ($_GET["upload_book"] == "fail") {
                echo ' <h2 id="uploadSuccess"> - Upload Book failed - check your details</h2>';
            } else {
                echo '';
            }
        }
        ?>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="my-4">Please fill in book details below</h3>
            <!-- Start form -->
            <form id="upload_book_form" action="php/upload_book.inc.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exBkISBN">ISBN</label><span class="validSpan"></span>
                    <input type="number" class="form-control" id="exBkISBN" name="ISBN" aria-describedby="emailHelp" placeholder="Enter Book ISBN" title="Needs to be a valid ISBN">
                </div>
                <div class="form-group">
                    <span></span>
                    <label for="exBkTitle">Title</label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="exBkTitle" name="title" aria-describedby="emailHelp" placeholder="Enter Book Title" title="needs to be longer than 4 characters">
                </div>
                <div class="form-group">
                    <label for="exBkAuthor">Author</label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="exBkAuthor" name="author" aria-describedby="emailHelp" placeholder="Enter Book Author" title="needs to be longer than 4 characters">
                </div>
                <div class="form-group">
                    <label for="exBkDescription">Description</label><span class="validSpan"></span>
                     <!--<input type="textarea" rows="4" cols="50" class="form-control" id="exBkDescription" name="description" aria-describedby="emailHelp" placeholder="Enter Book Description">-->
                    <textarea rows="4" class="form-control" id="exBkDescription" name="description" aria-describedby="emailHelp" placeholder="Enter Book Description" title=", needs to be longer than 20 characters"></textarea>
                </div>
<!--                <div class="form-group">
                    <label for="exBkCategory">Category</label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="exBkCategory" name="category" aria-describedby="emailHelp" placeholder="Enter Book Category">
                </div>-->
                    <div class="form-group">
                    <label for="exBkCategory">Category</label><span class="validSpan"></span>
                    <select class="form-control" name="category" id="exBkCategory" size="5">
                        <option value="Accounting">Accounting</option>
                        <option value="Business">Business</option>
                        <option value="Computing">Computing</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Music">Music</option>                        
                        <option value="Nursing">Nursing</option>
                        <option value="Programming">Programming</option>
                        <option value="Science">Science</option>
                        <option value="Sports Science">Sports Science</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exInputAddress">Book Condition</label><span class="validSpan"></span>
                    <select class="form-control" name="bkCondition" id="exBkCondition" size="5">
                        <option value="new">New</option>
                        <option value="excellent">Excellent</option>
                        <option selected value="great">great</option>
                        <option value="good">Good</option>
                        <option value="poor">Poor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exBkImage">Cover Photo. Please upload a PNG/JPG photo.(default picture will be used if none uploaded)</label>
                    <input type="hidden" name="size" value="350000">
                    <input type="file" class="form-control" id="exBkImage" name="photo" aria-describedby="emailHelp">
                </div>
                <div class="form-check"> 
                    <button type="submit" class="btn btn-primary" name="upload_book-submit">Upload Book</button>
                </div>
            </form>
            <!-- End form -->
        </div>



    </div>
</div>
<script src="js/uploadBookValidation.js" type="text/javascript"></script>
<?php
require_once'./php/footer.php';
