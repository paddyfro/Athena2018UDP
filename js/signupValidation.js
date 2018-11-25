$(document).ready(function () {



    $("#signup_form").submit(function (evt) {
        var fullname = $("#fullName").val();
        var username = $("#exUserName").val();
        var email1 = $("#exInputEmail1").val();
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var address = $("#exInputAddress").val();
        var phoneNum = $("#exInputPhoneNumber").val();
        var age = $("#exInputAge").val();
        var isValid = true;

        if (fullname == "")
        {
            $("#fullName").prev().text(" **(Required)**");
            isValid = false;
        } else if (fullname.length <= 4) {
            $("#fullName").prev().text(" **(length too short, needs to be longer than 4 chars)**");
            isValid = false;
        } else {
            $("#fullName").prev().text("");
        }

        if (username == "")
        {
            $("#exUserName").prev().text(" **(Required)**");
            isValid = false;
        } else if (username.length <= 4) {
            $("#exUserName").prev().text(" **(length too short, needs to be longer than 4 chars)**");
            isValid = false;
        } else {
            $("#exUserName").prev().text("")
        }

        if (email1 == "")
        {
            $("#exInputEmail1").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#exInputEmail1").prev().text("");
            $.ajax({
                url: "./php/checkEmail.php",
                method: "POST",
                async: true,
                data: {query: email1},
                success: function (data)
                {
                    if (data == "emailFound") {
                        isValid = false;
//                        alert("title found");
                        $("#exInputEmail1").prev().text(" (This Email is already in use)");

                    } else {
//                        alert("no title found");
                        $("#exInputEmail1").prev().text("");
                    }

                }
            });
        }

        if (password1 == "")
        {
            $("#password1").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#password1").prev().text("");
            if (password1 != password2)
            {
                $("#password1").prev().text(" (Passwords must match)");
                isValid = false;
            }
        }
        if (password2 == "")
        {
            $("#password2").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#password2").prev().text("");
            if (password2 != password1)
            {
                $("#password2").prev().text(" (Passwords must match)");
                isValid = false;
            }
        }
        if (address == null)
        {
            $("#exInputAddress").prev().text(" **(Required)**");
            isValid = false;
        } else {
            $("#exInputAddress").prev().text("");
        }

        if (phoneNum == "")
        {
            $("#exInputPhoneNumber").prev().text(" **(Required)**");
            isValid = false;
        } else if (phoneNum.length < 10) {
            $("#exInputPhoneNumber").prev().text(" **(Phone number required length (10 digits))**");
            isValid = false;
        } else {
            $("#exInputPhoneNumber").prev().text("");
        }

        if (age == "")
        {
            $("#exInputAge").prev().text(" **(Required)**");
            isValid = false;
        } else if (age < 17 || age > 120) {
            $("#exInputAge").prev().text(" (Age must be valid and between 17-120)");
            isValid = false;
        } else {
            $("#exInputAge").prev().text("");
        }


        if (isValid == true) {
            $("#signup_form").submit();
        }
        //stops images opening up ina  new window
        evt.preventDefault();
    });
    $("#fullName").focus();

//        $("#exInputEmail").focusout(function () {
//        $.ajax({
//            url: "./php/checkEmail.php",
//            method: "POST",
//            async: true,
//            data: {query: email1},
//            success: function (data)
//            {
//                if (data == "emailFound") {
//                    isValid = false;
////                        alert("title found");
//                    $("#exInputEmail1").prev().text(" (This Email is already in use1)");
//
//                } else {
////                        alert("no title found");
//                    $("#exInputEmail1").prev().text("");
//                }
//
//            }
//        });
//    });

});
