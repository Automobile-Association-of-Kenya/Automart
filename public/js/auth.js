(function () {
    $("#show-password").click(function () {
        var passwordField = $("#passwordLo");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(this).html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordField.attr("type", "password");
            $(this).html('<i class="fa fa-eye"></i>');
        }
    });

    $(".show-passwordRe").on("click", function () {
        var passwordField = $("#passwordRe");
        var passwordCField = $("#passwordConfirmationRe");
        var passwordCType = passwordCField.attr("type");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(".show-passwordRe").html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordField.attr("type", "password");
            $(".show-passwordRe").html('<i class="fa fa-eye"></i>');
        }

        if (passwordCType == "password") {
            passwordCField.attr("type", "text");
            $(".show-passwordRe").html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordCField.attr("type", "password");
            $(".show-passwordRe").html('<i class="fa fa-eye"></i>');
        }
    });

    $("body").on("click", ".show-passwordReset", function () {
        var passwordField = $("#passwordRe");
        var passwordCField = $("#passwordConfirmationRe");
        var passwordCType = passwordCField.attr("type");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(".show-passwordRe").html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordField.attr("type", "password");
            $(".show-passwordRe").html('<i class="fa fa-eye"></i>');
        }

        if (passwordCType == "password") {
            passwordCField.attr("type", "text");
            $(".show-passwordRe").html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordCField.attr("type", "password");
            $(".show-passwordRe").html('<i class="fa fa-eye"></i>');
        }
    });
})();
