<?php

session_start();
require 'database.php';

$func = filter_input(INPUT_POST, 'data');
if ($func === "getAllBooks") {
    getAllBooks();
} elseif ($func === "getAllTags") {
    getAllTags();
} elseif ($func === "getBook") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    getBook($bookId);
    //getSellers($bookId);
} elseif ($func === "getSellers") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    $user_id = filter_input(INPUT_POST, 'user_id');
    getSellers($bookId, $user_id);
} elseif ($func === "searchTitles") {
    getTitles();
} elseif ($func === "getProfile") {
    $user_id = filter_input(INPUT_POST, 'user_id');

    $returnProfile = getProfile($user_id);
    $returnMyBooks = getProfileBooks($user_id);
    $returnMyHistoey = getHistory($user_id);
    $returnMyWishlist = getWishlist($user_id);
    $returnMyLoans = getLoan($user_id);
    $returnMySharedBooks = getSharedBooks($user_id);
    echo json_encode(array($returnProfile, $returnMyBooks, $returnMyHistoey, $returnMyWishlist, $returnMyLoans, $returnMySharedBooks));
} elseif ($func === "addWishlist") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    $uaerId = filter_input(INPUT_POST, 'userId');
    echo addWishlist($bookId, $uaerId);
} elseif ($func === "returnedBook") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    $uaerId = filter_input(INPUT_POST, 'userId');
    $account_id = filter_input(INPUT_POST, 'account_id');
    echo returnedBook($bookId, $uaerId, $account_id);
} elseif ($func === "refineByTags") {
    $category_id = filter_input(INPUT_POST, 'category');
    $troo = filter_input(INPUT_POST, 'troo');
    echo getRefinedBooks($category_id, $troo);
}

function getAllBooks() {
    global $db;
    $query = "SELECT * FROM uploaded_books ub , book b WHERE ub.book_id = b.book_id AND ub.available > 0 GROUP By b.title;";
    $statement = $db->prepare($query);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="book.php?id=' . ($row['book_id']) . '">' . $row['title'] . '</a>
                  </h4>
                  <p class="card-text">' . $row['description'] . '</p>
                </div>
                <div class="card-footer">
                <h6>By ' . $row['author'] . '</h6>
                </div>
              </div>
            </div>';
    }
}

function getAllTags() {
    global $db;
    $query = "SELECT * FROM categories;";
    $statement = $db->prepare($query);
    $statement->execute();

    foreach ($statement as $row) {
        echo '<label class="form-check">
                <input class="form-check-input" id="myChecked' . strval($row['category_id']) . '" type="checkbox" onclick="ajaxRefineByTags(' . $row['category_id'] . ')" value="">
                    <span class="form-check-label">
                        ' . $row['name'] . '
                    </span>
                </label>';
    }
}

function getBook($bookId) {
    global $db;
    $query = "SELECT * FROM book WHERE book_id = :bookId;";
    $statement = $db->prepare($query);
    $statement->bindValue(":bookId", $bookId);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<div class="col-md-4">
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
                        <p class="card-text">' . $row['ISBN'] . '</p><br/><br/>' .
        (!isset($_SESSION['account_id']) ? '<form action="./login.php"><input type="submit" class="btn btn-primary" value="Login to borrow this book"/>' : '<button id="addWishlist" type="button" onclick="ajaxAddWishlist()" class="btn btn-primary">Add To WishList</button> ') .
        '</div>

        </div>';
    }
}

function getSellers($bookId, $user_id) {
    if (checkSellers($bookId)) {
        global $db;
        $query = "SELECT a.name,a.address, a.account_id,  a.username, AVG(r.rating) as rating, a.profile_image, b.book_id, ub.uploaded_book_id, ub.book_condition, ub.available FROM account a, book b, uploaded_books ub, review r WHERE a.account_id = ub.account_id AND b.book_id = ub.book_id AND r.account_id = a.account_id AND  b.book_id = :book_Id AND ub.available > 0 GROUP BY a.username;";
        $statement = $db->prepare($query);
        $statement->bindValue(":book_Id", $bookId);
        $statement->execute();
        echo '<h2 class="my-4"><center>Lenders who have this book up for borrow</center></h2>';
        foreach ($statement as $row) {

            $rating = getRating($row['rating']);



            echo ' <div class = "card">
        <div class = "card-body">
        <div class = "row">
        <div class = "col-md-2">
        <img src = "images/users/' . $row['profile_image'] . '" class = "img rounded-circle img-fluid" />
        </div>
        <div class = "col-md-10">
        <p>
        <h3 class = "float-left"><strong>' . $row['username'] . '</strong></h3>



        </p>
        <div class = "clearfix"></div>
        <br/>
        <p><strong>Name: </strong>' . $row['name'] . '</p>
        <br\>
        <p><strong>Book Condition: </strong>' . $row['book_condition'] . '</p>
        <br\>
        <p><strong>Location: </strong>' . $row['address'] . '</p>
        <br\>
        <p><strong>User Rating: ' . $rating . '</strong></p>
        <a class = " btn btn-primary float-right" data-toggle = "modal" href = "#ignismyModal">Borrow</a>
        <!--Div For PopUp-->
       <div class="modal fade" id="ignismyModal" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                            </div>
                            <!--Content For Popver-->
                            <div class="modal-body"> <!--ADD INPUT HERE!!!!!!!!!!!!!!!!IN THIS DIV-->
                  
                                <div class="thank-you-pop">
                                   <form action="borrow_book.php" method="POST">
                        Loan days<br>
                        <input type="text" name="days" >
                        <input type="hidden" value="' . $row['book_id'] . '" name="book_id" >
                        <input type="hidden" value="' . $row['uploaded_book_id'] . '" name="uploaded_book_id" >
                           <p> ' . $row['uploaded_book_id'] . ' </p>
                               <p> ' . $row['rating'] . ' </p>
                        <input type="hidden" value="' . $user_id . '" name="user_id" >
  <br>
 
  <input type="submit" value="Confirm">
</form> 

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
    } else {
        echo '<div class = container>
            <h3><center>No Current Lenders</center></h3>
            </div>';
    }
}

function getTitles() {

    global $db;
    $query = "SELECT * FROM book;";
    $statement = $db->prepare($query);
    $statement->execute();


    /* Manipulate the query result */
    $json = "[";
    if ($statement->rowCount() > 0) {
        /* Get field information for all fields */
        $isFirstRecord = true;
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $row) {
            if (!$isFirstRecord) {
                $json .= ",";
            }

            /* NOTE: json strings MUST have double quotes around the attribute names, as shown below */
            $json .= ' {
            "title":"' . $row->title . '"
        }';

            $isFirstRecord = false;
        }
    }
    $json .= "]";

    /* Send the $json string back to the webpage that sent the AJAX request */
    echo $json;
}

function getProfile($userId) {

    global $db;
    ///////user id hardcoded!
//    $userId = $_SESSION['account_id'];
//    echo 'acc' . $_SESSION['account_id'];
    $query = "SELECT AVG(r.rating) as rating,a.name, a.username,a.phone_number,a.age, a.email_address, a.profile_image, l.county FROM account a, review r, location l WHERE a.account_id = r.account_id AND a.location_id = l.location_id AND a.account_id = :user_id GROUP BY a.username;";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $userId);
    $statement->execute();

    foreach ($statement as $row) {

        $rating = getRating($row['rating']);

        return '<div class = "card-body">
        <!--Sex image -->
        <img id = "img_sex" class = "person-img"
        src = "images/users/' . $row['profile_image'] . '">
        </br>
        </br>
        <h1 id = "who_message" class = "card-title">' . $row['username'] . '</h1>
        <h3  class = "card-title">' . $row['name'] . '</h3>
        <!--First row (on medium screen) -->
        <div class = "row" >
        <div class = "col-sm-6" >
        <div class = "card profile-card">
        <div class = "card-body " >
        <h3>E-Mail:</h3>
        <p class = "profile-text">' . $row['email_address'] . '</p>
        </div>
        </div>
        </div>
        <div class = "col-sm-6">
        <div class = "card  profile-card">
        <div class = "card-body">
        <h3>Rating:</h3>
        <p class = "profile-text">' . $rating . '</p>
        </div>
        </div>
        </div>
        </div>
        <div class = "row">

        <div class = "col-sm-6">
        <div class = "card  profile-card">
        <div class = "card-body">
        <h3>Location:</h3>
        <p class = "profile-text">' . $row['county'] . '</p>
        </div>
        </div>
        </div>
        <div class = "col-sm-6">
        <div class = "card  profile-card">
        <div class = "card-body">

        <a href = "./resetPassword.php" class = "btn btn-primary" role = "button">Change Password</a>
        <br/>
        <br/>

        
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Details</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Edit Profile Details</h3>
        
      </div>
      <div class="modal-body">
                    <form id="signup_form" action="php/updateProfile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullName" class = "card-title"><strong>Full Name</strong></label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="fullName" name="name" aria-describedby="emailHelp" value = "' . $row['name'] . '" placeholder="Enter full name" title="string of at least 4 chars in length, allowing alphabetic, numeric and " ">
                </div>
                                <div class="form-group">
                    <label for="exUserName"><strong>User Name</strong></label><span class="validSpan"></span>
                    <input type="text" class="form-control" id="exUserName" name="username" aria-describedby="emailHelp" value="' . $row['username'] . '"placeholder="Enter User Name" pattern="[a-zA-Z0-9_]+" title="string of at least 4 chars in length, allowing alphabetic, numeric and " ">
                </div>
                                <div class="form-group">
                    <label for="exInputAddress"><strong>Location (County)</strong></label><span class="validSpan"></span>
                    <select class="form-control" name="address" id="exInputAddress" size="6">
                        <option value="Antrim">Antrim</option>
                        <option value="Armagh">Armagh</option>
                        <option value="Carlow">Carlow</option>
                        <option value="Cavan">Cavan</option>
                        <option value="Clare">Clare</option>
                        <option value="Cork">Cork</option>
                        <option value="Derry">Derry</option>
                        <option value="Donegal">Donegal</option>
                        <option value="Down">Down</option>
                        <option value="Dublin">Dublin</option>
                        <option value="Fermanagh">Fermanagh</option>
                        <option value="Galway">Galway</option>
                        <option value="Kerry">Kerry</option>
                        <option value="Kildare">Kildare</option>
                        <option value="Kilkenny">Kilkenny</option>
                        <option value="Loais">Laois</option>
                        <option value="Leitrim">Leitrim</option>
                        <option value="Limerick">Limerick</option>
                        <option value="Longford">Longford</option>
                        <option value="Louth">Louth</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Meath">Meath</option>
                        <option value="Monaghan">Monaghan</option>
                        <option value="Offaly">Offaly</option>
                        <option value="Roscommon">Roscommon</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exInputPhoneNumber"><strong>Phone Number</strong></label><span class="validSpan"></span>
                    <input type="number" class="form-control" name="phone_number" id="exInputPhoneNumber" value = "' . $row['phone_number'] . '" placeholder="Phone Number" title="must be a valid phone number. allowed format - (+44)(0)20-12341234 | 02012341234 | +44 (0) 1234-1234">                
                </div>

                <div class="form-group">
                    <label for="exInputAge"><strong>Age</strong></label><span class="validSpan"></span>
                    <input type="number" class="form-control" name="age" id="exInputAge" value = "' . $row['age'] . '" placeholder="Age"  title="Must be a vialld age 17- 120">
                </div>
                <button type="submit" class="btn btn-primary" name="editProfile-submit">Submit Changes</button>
                  </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-primary" data-dismiss="modal">Dont change anything</button>
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

function getProfileBooks($userId) {
    global $db;
    $query = "SELECT * FROM uploaded_books up, book b where up.book_id = b.book_id and up.account_id = :np_acc_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":np_acc_id", $userId);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {
        $value = $value . '
        <div class = "card">
        <div class = "row">
        <div class = "col-md-4">
        <!-- <img src = "images/book/' . $row['image'] . '" alt = "" class = "w-100"/> -->
            <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
        </div>
        <div class = "col-md-8">
        <div class = "card-block px-3">
        <h5 class = "card-title">Title</h5>
        <p>' . $row['title'] . '</p>
        <h5 class = "card-title">Available</h5>
        <p>' . (($row['available'] == 1) ? 'yes' : 'no') . '</p>
        <h5 class = "card-title">Condition</h5>
        <p>' . $row['book_condition'] . '</p>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edirBookDetailsModal">Edit Details</button>

<!-- Modal -->
<div id="edirBookDetailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Edit Profile Details</h3>
        
      </div>
      <div class="modal-body">
                    <form id="signup_form" action="php/updateUploadedBook.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exInputAddress"><strong>Book Condition</strong></label><span class="validSpan"></span>
                    <select class="form-control" name="bkCondition" id="exBkCondition" size="5">
                        <option value="New">New</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Great">great</option>
                        <option value="Good">Good</option>
                        <option value="Poor">Poor</option>
                    </select>
                </div>
                <input type="hidden" id="bk_uploadedBook_id" name="bk_uploadedBook_id" value="'.$row['uploaded_book_id'].'">
                <button type="submit" class="btn btn-primary" name="editUploadedBook-submit">Submit Changes</button>
                  </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-primary" data-dismiss="modal">Dont change anything</button>
      </div>
    
    </div>

  </div>
</div>




        <br/>
        <br/>
        </div>
        </div>
        </div>
        </div>';
    }return $value;
}

function getHistory($user_id) {
    global $db;
    $query = "SELECT * FROM borrowed_books bb, uploaded_books u, book b , account a where u.account_id = a.account_id and bb.uploaded_book_id = u.uploaded_book_id and u.book_id= b.book_id and bb.returned > 0 and bb.account_id = :user_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {

        $value = $value . '<div class = "card">
        <div class = "row">
        <div class = "col-md-4">
       <!-- <img src = "images/book/' . $row['image'] . '" alt = "" class = "w-100"/> -->
            <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
        </div>
        <div class = "col-md-8">
        <div class = "card-block px-3">
        <h5 class = "card-title">Title</h5>
        <p>' . $row['title'] . '</p>
        <h5 class = "card-title">Borrower</h5>
        <p>' . $row['name'] . '</p>
        <h5 class = "card-title">Date Borrowed</h5>
        <p>' . $row['start_date'] . '</p>
        <h5 class = "card-title">Date Returned</h5>
        <p>' . $row['due_date'] . '</p>
        <h5 class = "card-title">Days Borrowed</h5>
        <p>' . $row['rent_period'] . '</p>
        </div>
        </div>
        </div>
        </div>';
    }return $value;
}

function getLoan($user_id) {
    global $db;
    $query = "SELECT * FROM borrowed_books bb, uploaded_books u, book b, account a where u.account_id = a.account_id and bb.uploaded_book_id = u.uploaded_book_id and u.book_id= b.book_id and bb.returned = 0 and bb.account_id = :user_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {

        $value = $value . '<div class = "card">
        <div class = "row">
        <div class = "col-md-4">
       <!-- <img src = "images/book/' . $row['image'] . '" alt = "" class = "w-100"/> -->
            <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
        </div>
        <div class = "col-md-8">
        <div class = "card-block px-3">
        <h5 class = "card-title">Title</h5>
        <p>' . $row['title'] . '</p>
        <h5 class = "card-title">Borrower</h5>
        <p>' . $row['name'] . '</p>
        <h5 class = "card-title">Date Borrowed</h5>
        <p>' . $row['start_date'] . '</p>
        <h5 class = "card-title">Return Date</h5>
        <p>' . $row['due_date'] . '</p>
        <h5 class = "card-title">Days Borrowed</h5>
        <p>' . $row['rent_period'] . '</p>
        <button id="returnedBook" type="button" onclick="ajaxReturnedBook(' . $row['uploaded_book_id'] . ',' . $row['account_id'] . ')" class="btn btn-primary">Confirm Returned</button>
        <br/>
        <br/>
        </div>
        </div>
        </div>
        </div>';
    }return $value;
}

function addWishlist($bookId, $userId) {

    if (!checkWiskList($bookId, $userId)) {
        global $db;
        $query = 'INSERT INTO `wish_list` (`account_id`, `book_id`, `notifications`) VALUES (:userId, :bookId, NULL)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->bindValue(':bookId', $bookId);
        $statement->execute();
        $statement->closeCursor();
        return 'Added';
    } else {
        return 'Already In Wishlist';
    }
}

//        <span class = "float-right"><i class = "text-warning fas fa-star"></i></span>
//        <span class = "float-right"><i class = "text-warning far fa-star"></i></span>
//        <span class = "float-right"><i class = "text-warning fa fa-star"></i></span>
//        <span class = "float-right"><i class = "text-warning fa fa-star"></i></span>

function getRating($rating) {
    switch ($rating) {
        case 1: return '★✰✰✰✰';
            break;
        case 2: return '★★✰✰✰';
            break;
        case 3: return '★★★✰✰';
            break;
        case 4: return '★★★★✰';
            break;
        case 5: return '★★★★★';
            break;
    }
}

function getWishlist($user_id) {

    global $db;
    $query = "SELECT * FROM wish_list w, book b, account a WHERE w.book_id = b.book_id AND a.account_id = w.account_id AND a.account_id = :user_id;";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {

        $value = $value . '
        <div class = "card">
        <div class = "row">
        <div class = "col-md-4">
        <!--<img src = "images/book/' . $row['image'] . '" alt = "" class = "w-100"/> -->
            <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
        </div>
        <div class = "col-md-8">
        <div class = "card-block px-3">
        <h5 class = "card-title">Title</h5>
        <p>' . $row['title'] . '</p>
        <button id="removeWishlist" type="button" onclick="ajaxRemoveWishlist()" class="btn btn-primary">Remove</button>

 
        </div>
        </div>
        </div>
        </div>';
    }return $value;
}

function checkWiskList($bookId, $userId) {
    global $db;

    $query = 'SELECT count(1) as value FROM wish_list WHERE account_id = :userId AND book_id = :bookId;';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->bindValue(':bookId', $bookId);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {
        $value = $row['value'];
    }
    if ($value > 0) {
        return true;
    } else {
        return false;
    }
}

function returnedBook($bookId, $userId, $account_id) {
    global $db;
    //if (returnedBook($bookId, $userId)) {
    $query = 'Update borrowed_books set returned = 1 WHERE account_id = :userId AND uploaded_book_id = :uploaded_book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->bindValue(':uploaded_book_id', $bookId);
    $statement->execute();
    $statement->closeCursor();
    setUploaded($bookId, $account_id);
    return getLoan($userId);
    //} else {        
    //}
}

function setUploaded($bookId, $account_id) {
    global $db;
    //if (returnedBook($bookId, $userId)) {
    $query = 'Update uploaded_books set available = 1 WHERE account_id = :userId AND uploaded_book_id = :uploaded_book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $account_id);
    $statement->bindValue(':uploaded_book_id', $bookId);
    $statement->execute();
    $statement->closeCursor();
    //} else {        
    //}
}

function getRefinedBooks($category_id, $troo) {
    if ($troo == "false") {
        getAllBooks();
    } else {
        global $db;
        $query = "SELECT * FROM uploaded_books ub , book b WHERE ub.book_id = b.book_id AND ub.available > 0 and category_id = :category_id GROUP By b.book_id;";
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->closeCursor();
        $statement->execute();

        foreach ($statement as $row) {

            echo '<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="book.php?id=' . ($row['book_id']) . '">' . $row['title'] . '</a>
                  </h4>
                  <p class="card-text">' . $row['description'] . '</p>
                </div>
                <div class="card-footer">
                <h6>By ' . $row['author'] . '</h6>
                </div>
              </div>
            </div>';
        }
    }
}

function checkSellers($bookId) {
    global $db;
    $query = "SELECT count(1) as value FROM account a, book b, uploaded_books ub, review r WHERE a.account_id = ub.account_id AND b.book_id = ub.book_id AND r.account_id = a.account_id AND  b.book_id = :book_Id AND ub.available > 0 GROUP BY a.username;";
    $statement = $db->prepare($query);
    $statement->bindValue(":book_Id", $bookId);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {
        $value = $row['value'];
    }
    if ($value > 0) {
        return true;
    } else {
        return false;
    }
}

function getSharedBooks($user_id) {
    global $db;
    $query = "SELECT * FROM uploaded_books ub, book b, borrowed_books bb, account a WHERE ub.book_id = b.book_id AND bb.uploaded_book_id = ub.uploaded_book_id AND a.account_id = bb.account_id AND ub.account_id = :user_id AND ub.available =0 AND bb.returned = 0";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $value = '';
    foreach ($statement as $row) {

        $value = $value . '<div class = "card">
        <div class = "row">
        <div class = "col-md-4">
       <!-- <img src = "images/book/' . $row['image'] . '" alt = "" class = "w-100"/> -->
            <a href="book.php?id=' . ($row['book_id']) . '"><img class="card-img-top" src="images/book/' . $row['image'] . '" alt=""></a>
        </div>
        <div class = "col-md-8">
        <div class = "card-block px-3">
        <h5 class = "card-title">Title</h5>
        <p>' . $row['title'] . '</p>
        <h5 class = "card-title">Borrower</h5>
        <p>' . $row['name'] . '</p>
        <h5 class = "card-title">Date Borrowed</h5>
        <p>' . $row['start_date'] . '</p>
        <h5 class = "card-title">Return Date</h5>
        <p>' . $row['due_date'] . '</p>
        <h5 class = "card-title">Days Borrowed</h5>
        <p>' . $row['rent_period'] . '</p>

        </div>
        </div>
        </div>
        </div>';
    }return $value;
}

