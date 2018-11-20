$(document).ready(function () {
//    alert("jjjjj");
    $("#login_form").submit(function (evt) {

        var login_email = $("#login_email").val();
        var login_password = $("#login_password").val();
        var isValid = true;
//        var message = "";

//        alert(login_email);
//
//        alert(login_password);

        if (login_email == "")
        {
//            $("#login_email").next().text("This is required");
//            alert('email cannot be left empty');
            $("#login_email").prev().text("**(Required)**");
//            message += "Email cannot be left empty.";
            isValid = false;
        } else {
            $("#login_email").prev().text("");
        }
//        alert(isValid);
        if (login_password == "")
        {
            $("#login_password").prev().text("**(Required)**");
//            alert('email cannot be left empty');
//            message += " Password cannot be left empty.";
            isValid = false;
        } else {
            $("#login_password").prev().text("");
        }
//        alert(isValid);

        if (isValid == true) {
            $("#login_form").submit();
        }
        //stops images opening up ina  new window
        evt.preventDefault();


    });
    $("#login_email").focus();

});