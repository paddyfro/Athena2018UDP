<!--NavBar-->        
<?php
require_once'php/nav.php';
$bookId = filter_input(INPUT_GET, 'id');
if (!isset($bookId)) {
    $bookTitle = filter_input(INPUT_POST, 'title');
    include 'php/search.php';
}
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
<div class="container" id="sellers">


</div>

<!-- Footer -->
<?php
require_once'php/footer.php';
