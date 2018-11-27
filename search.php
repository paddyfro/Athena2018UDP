<?php
require_once'php/nav.php';
require 'php/database.php';

$search = filter_input(INPUT_POST, 'search');
$query = "SELECT * FROM uploaded_books ub , book b WHERE ub.book_id = b.book_id AND b.title LIKE :query1 OR b.author LIKE :query2 OR b.description LIKE :query3 Group By b.title;";
$statement = $db->prepare($query);
$statement->bindValue(":query1", "%" . $search . "%");
$statement->bindValue(":query2", "%" . $search . "%");
$statement->bindValue(":query3", "%" . $search . "%");
$statement->execute();
$value = '';
if (!checkResults($search)) {
    $value = "<p>no  books matching your search</p>";
} else {
    foreach ($statement as $row) {

        $value = $value . '<div class="col-lg-4 col-md-6 mb-4">
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

function checkResults($search) {
    global $db;

    $query = "SELECT count(1) as value FROM uploaded_books ub , book b WHERE ub.book_id = b.book_id AND b.title LIKE :query1 OR b.author LIKE :query2 OR b.description LIKE :query3 Group By b.title;";
    $statement = $db->prepare($query);
    $statement->bindValue(":query1", "%" . $search . "%");
    $statement->bindValue(":query2", "%" . $search . "%");
    $statement->bindValue(":query3", "%" . $search . "%");
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
?>

<div class="container">

    <div class="row">


        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div id="loginSuccess">
            </div>

            <h4 class="my-4"><center>Search Results</center></h4>

            <div class="row" id="products">
                <?php
                echo $value;
                ?>
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
