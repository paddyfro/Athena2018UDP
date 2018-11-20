$(document).ready(function () {

    $("#upload_book_form").submit(function (evt) {
        var title = $("#exBkTitle").val();
        var author = $("#exBkAuthor").val();
        var description = $("#exBkDescription").val();
        var category = $("#exBkCategory").val();
        var isbn = $("#exBkISBN").val();

        var isValid = true;
        
        if (title == "")
        {
            $("#exBkTitle").prev().text(" **(Required)**");
            isValid = false;
        }else if(title.length <=4){
            $("#exBkTitle").prev().text(" **(length too short, needs to be longer than 4 chars)**");
            isValid = false;
        }else{
            $("#exBkTitle").prev().text("");
        } 
        
        if (author == "")
        {
            $("#exBkAuthor").prev().text(" **(Required)**");
            isValid = false;
        }else if(author.length <=4){
            $("#exBkAuthor").prev().text(" **(length too short, needs to be longer than 4 chars)**");
            isValid = false;
        } else{
            $("#exBkAuthor").prev().text("");
        }

        if (description == "")
        {
            $("#exBkDescription").prev().text(" **(Required)**");
            isValid = false;
        }else if(description.length <=20){
            $("#exBkDescription").prev().text(" **(length too short, needs to be longer than 20 characters)**");
            isValid = false;
        }else{
            $("#exBkDescription").prev().text("");
        }
        
        if (category == null)
        {
//            alert("xat" . category);
            $("#exBkCategory").prev().text(" **(Required)**");
            isValid = false;
        }else{
            $("#exBkCategory").prev().text("");
//            $("#exBkCategory").prev().text(category);
        }
        
        if (isbn == "")
        {
            $("#exBkISBN").prev().text(" **(Required)**");
            isValid = false;
        }else if(isbn.length !==10 && isbn.length !==13){
            $("#exBkISBN").prev().text(" **(ISBN must be 10 or 13 digits in length)**");
            isValid = false;
        }else{
            $("#exBkISBN").prev().text("");
        }


        if (isValid == true) {
            $("#upload_book_form").submit();
            $("#exBkTitle").prev().prev().prev().text("Upload Book successful!")
        }
        //stops images opening up ina  new window
        evt.preventDefault();
    });
    $("#exBkISBN").focus();

});
