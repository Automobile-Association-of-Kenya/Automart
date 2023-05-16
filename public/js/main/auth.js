$(document).ready(function () {
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

    $(".show-passwordRe").on('click',function () {
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

    let nameRe = $("#nameRe"),
        phoneRe = $("#phoneRe"),
        emailRe = $("#emailRe"),
        passwordRe = $("#passwordRe"),
        roleRe = $("#roleRe"),
        passwordConfirmationRe = $("#passwordConfirmationRe");
    registerForm = $("#registerForm");

    registerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            name = nameRe.val(),
            phone = phoneRe.val(),
            email = emailRe.val(),
            password = passwordRe.val(),
            password_confirmation = passwordConfirmationRe.val(),
            role = roleRe.val(),
            token = $this.find("input[name='_token']").val(),
            registerSubmit = $("#registerSubmit");
        registerSubmit.prop({ disabled: true });

        let data = {
            name: name,
            phone: phone,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
            role: role,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });
        console.log(data);

        $.ajax({
            method: "POST",
            url: "/register",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message);
                    window.setTimeout(function () {
                        window.location.href = "/login";
                    }, 3000);
                } else {
                    showError(result.error);
                }
                registerSubmit.prop({ disabled: false });
            },
            error: function (error) {
                console.error(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors);
                } else {
                    showError("Error occurred during processing");
                }
                registerSubmit.prop({ disabled: false });
            },
        });
    });

    let emailLo = $("#emailLo"),
        passwordLo = $("#passwordLo"),
        loginForm = $("#loginForm");
    loginForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            email = emailLo.val(),
            password = passwordLo.val(),
            token = $this.find("input[name='_token']").val(),
            loginUser = $("#loginUser");
        loginUser.prop({ disabled: true });

        let data = {
            email: email,
            password: password,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });
        $.ajax({
            type: "POST",
            url: "login",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.success);
                    window.setTimeout(function () {
                        window.location.href = result.url;
                    }, 7000);
                } else {
                    showError(result.error);
                }
                loginUser.prop({ disabled: false });
            },
            error: function (error) {
                console.log(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors);
                } else {
                    showError("Error occurred during processing");
                }
                loginUser.prop({ disabled: false });
            },
        });
    });

    $("#passwordResetLinkForm").on("submit", function (event) {
        event.preventDefault();
        let email = $("#emailForget").val(),
            $this = $(this),
            token = $this.find("input[name='_token']").val(),
            submitEmail = $("#submitEmail");
        submitEmail.prop({ disabled: true });
        if (email !== "" && email !== null) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/forgot-password",
                data: { email: email },
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message);
                    } else {
                        showError(result.error);
                    }
                    submitEmail.prop({ disabled: false });
                },
                error: function (error) {
                    console.log(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors);
                    } else {
                        showError("Error occurred during processing");
                    }
                    submitEmail.prop({ disabled: false });

                    $this.find("#loginUser").prop({ disabled: false });
                },
            });
        } else {
            showError("Email address is required");
        }
    });

    $("#passwordSetForm").on("submit", function (event) {
        event.preventDefault();
        console.log("there");
        let $this = $(this),
            passwordRE = $("#passwordRe").val(),
            passwordConfirmationRe = $("#passwordConfirmationRe").val(),
            token = $this.find("input[name='_token']").val(),
            submitReset = $("#submitReset");
        submitReset.prop({ disabled: true });
        if (passwordRE !== passwordConfirmationRe) {
            showError("Password mismatch. Please check and retry");
        } else {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/password-store",
                data: {
                    password: passwordRE,
                    password_confirmation: passwordConfirmationRe,
                },
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message);
                    } else {
                        showError(result.error);
                    }
                    submitReset.prop({ disabled: false });
                    window.setTimeout(function () {
                        window.location.href = "login";
                    }, 7000);
                },
                error: function (error) {
                    console.log(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors);
                    } else {
                        showError("Error occurred during processing");
                    }
                    submitReset.prop({ disabled: false });
                },
            });
        }
    });

    function showSuccess(message) {
        iziToast.success({
            title: "OK",
            message: message,
            position: "center",
            timeout: 7000,
            target: "#feedback",
        });
    }

    function showError(message) {
        iziToast.error({
            title: "Error",
            message: message,
            position: "center",
            timeout: 7000,
            target: "#feedback",
        });
    }
});
