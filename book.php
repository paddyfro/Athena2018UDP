<!--NavBar-->        
<?php
require_once'php/nav.php';
$bookId = filter_input(INPUT_GET, 'id');

?>

<!--Page Content-->

<section>
    <div class="container py-3">
        <div class="card">
            <div class="row " id="book">
               

            </div>
        </div>
    </div>
</div>
</section>
<div class="container" id="showWishListButton"></div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">    
        <h4 class="modal-title">Added! Other Items in your Wishlist</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="wishlistBook"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div></div></div></div>

<div class="container" id="sellers">


</div>

<!-- Footer -->
<?php
require_once'php/footer.php';
