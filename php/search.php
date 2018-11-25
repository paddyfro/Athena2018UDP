<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'database.php';


getBook($bookTitle);
getSellers($bookTitle);

function getBook($bookTitle) {
    global $db;
    $query = "SELECT * FROM book WHERE title = :bookTitle;";
    $statement = $db->prepare($query);
    $statement->bindValue(":bookTitle", $bookTitle);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<section>
    <div class="container py-3">
        <div class="card">
            <div class="row " >
            <div class="col-md-4">
                    <img src="images/book/' . $row['image'] . '" alt="" class="w-100"/>

                </div>
                <div class="col-md-8 px-3">
                    <div class="card-block px-3">
                        <h4 class="card-title">' . $row['title'] . '</h4>
                        <hr>
                        <h6 class="card-title">Description</h6>
                        <p class="card-text">' . $row['description'] . '</p>
                        <h6 class="card-title">Author</h6>
                        <p class="card-text">' . $row['author'] . '</p>
                        <h6 class="card-title">ISBN</h6>
                        <p class="card-text">' . $row['ISBN'] . '</p>
                            hello
                        
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
</section>';
    }
}

function getSellers($bookTitle) {
    global $db;
    $query = "SELECT a.username, r.rating, a.profile_image, b.book_id, ub.book_condition FROM account a, book b, uploaded_books ub, review r "
            . "WHERE a.account_id = ub.account_id AND b.book_id = ub.book_id AND r.account_id = a.account_id AND  b.title = :bookTitle GROUP BY a.username;";
    $statement = $db->prepare($query);
    $statement->bindValue(":bookTitle", $bookTitle);
    $statement->execute();
    if (!empty($statement)) {
        echo 'testing no data';
    } else {
        foreach ($statement as $row) {

            echo ' <div class="container" >
            <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-md-2">
                    <img src="images/' . $row['profile_image'] . '" class="img rounded-circle img-fluid" />
                </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href=""><strong>' . $row['username'] . '</strong></a>
                    
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                    </p>
                    <div class="clearfix"></div>
                    <p><strong>Condition:</strong>' . $row['book_condition'] . '</p>
                    <p><strong>Price:</strong>£0.00</p>
                    <p><strong>Rating:</strong>' . $row['rating'] . '</p>
                    <a class=" btn btn-primary float-right"  data-toggle="modal" href="#ignismyModal">Borrow</a>
                    <!--Div For PopUp-->
                          <div class="modal fade" id="ignismyModal" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                            </div>
                            <!--Content For Popver-->
                            <div class="modal-body">
                       
                                <div class="thank-you-pop">
                                    <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                                        <h1>Thank You!</h1>
                                        <p>Your submission is received and we will contact you soon</p>
                                        <h3 class="cupon-pop">Your Id: <span>12345</span></h3>	
                                </div>
                        </div>		
                </div>
            </div>
        </div>
                </div>
                </div>

        </div>
    </div>
    </div>';
        }
    }
}
