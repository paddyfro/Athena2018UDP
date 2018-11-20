        
<?php
require_once'php/nav.php';
?>

<!--Page Content-->

<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Borrow Books</h1>
            <h5 class="my-4">Refine by category</h5>
            <div class="list-group" id="tags">

            </div>


        </div>

        <!-- /.col-lg-3 -->
    
        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" style="width:900px;height:350px;" src="images/cover1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" style="width:900px;height:350px;" src="images/cover2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" style="width:900px;height:350px;" src="images/cover3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <h3 class="my-4"><center>Books available for borrowing</center></h3>
            <div class="row" id="products">


            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>


<!-- Footer -->
<?php
require_once'php/footer.php';
