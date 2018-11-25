$(document).ready(function () {


    $("#reset_pwd_form").submit(function (evt) {
        var oldPwd = $("#reset_old_pwd").val();
        var newPwd1 = $("#reset_new_pwd1").val();
        var newPwd2 = $("#reset_new_pwd2").val();

        var isValid = true;

        if (oldPwd == "")
        {
            $("#reset_old_pwd").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#reset_old_pwd").prev().text("");
        }

        if (newPwd1 == "")
        {
            $("#reset_new_pwd1").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#reset_new_pwd1").prev().text("");
            if (newPwd1 != newPwd2)
            {
                $("#reset_new_pwd1").prev().text(" (Passwords must match)");
                isValid = false;
            }
            if (newPwd1 == oldPwd)
            {
                $("#reset_new_pwd1").prev().text(" (Password must not be the same as old password)");
                isValid = false;
            }
        }
        if (newPwd2 == "")
        {
            $("#reset_new_pwd2").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#reset_new_pwd2").prev().text("");
            if (newPwd2 != newPwd1)
            {
                $("#reset_new_pwd2").prev().text(" (Passwords must match)");
                isValid = false;
            }
            if (newPwd2 == oldPwd)
            {
                $("#reset_new_pwd2").prev().text(" (Password must not be the same as old password)");
                isValid = false;
            }
        }

        if (isValid == true) {
            $("#reset_pwd_form").submit();
        }
        //stops images opening up ina  new window
        evt.preventDefault();
    });
    $("#reset_old_pwd").focus();

});
