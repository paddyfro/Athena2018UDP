<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        alert("data");
        var bookID = 4;
        var uid = 10;
        var id = 1;
        //passing the input typed into the text box
        $("#buttondel").click(function (e) {
            e.preventDefault(); 
            $.ajax({
                type: "POST",
                url: "php/wishlist.php",
                data: {uid: uid, bookID: bookID, id:id},
                success: function (data) {
                }
            });
        });
    }
    );
</script>   

<input type="submit" id="buttondel" class="btn btn-info" value="Submit Button">
