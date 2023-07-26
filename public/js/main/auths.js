(function () {
    $("#signupToggle").on("click", function () {
        $("#register-section").show();
        $("#login-section").hide();
        $("#emailpassword-reset").hide();
        $("#partner-section").hide();
    });
    $("#loginToggle").on("click", function () {
        $("#register-section").hide();
        $("#login-section").show();
        $("#emailpassword-reset").hide();
        $("#partner-section").hide();
    });

    $("#loginToggle1").on("click", function () {
        $("#register-section").hide();
        $("#login-section").show();
        $("#emailpassword-reset").hide();
        $("#partner-section").hide();
    });

    $("#partnerLoginToggle").on("click", function () {
        $("#register-section").hide();
        $("#login-section").show();
        $("#emailpassword-reset").hide();
        $("#partner-section").hide();
    });

    $("#forgetPasswordToggle").on("click", function () {
        $("#register-section").hide();
        $("#login-section").hide();
        $("#emailpassword-reset").show();
        $("#partner-section").hide();
    });

    $("#partnerToggle").on("click", function () {
        $("#register-section").hide();
        $("#login-section").hide();
        $("#emailpassword-reset").hide();
        $("#partner-section").show();
    });

    $("#show-password").click(function () {
        var passwordField = $("#loginPassword");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(this).html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordField.attr("type", "password");
            $(this).html('<i class="fa fa-eye"></i>');
        }
    });

    $(".show-password-patner").click(function () {
        var passwordField = $("#partnerPassword");
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
        var passwordField = $("#registerPassword");
        var passwordCField = $("#registerPasswordConfirmation");
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
        var passwordField = $("#passwordReset");
        var passwordCField = $("#passwordConfirmationReset");
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

    let nameRe = $("#registerName"),
        phoneRe = $("#registerPhone"),
        emailRe = $("#registerEmail"),
        passwordRe = $("#registerPassword"),
        roleRe = $("#registerRole"),
        passwordConfirmationRe = $("#registerPasswordConfirmation");
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
            registerSubmit = $("#registerSubmit"),
            errors = [];
        registerSubmit.prop({ disabled: true });

        if (password !== password_confirmation) {
            errors.push("Password mismatch");
        }
        if (name == "" || name == null) {
            errors.push("Name is required");
        }
        if (email == "" || email == null) {
            errors.push("Name is required");
        }
        if (errors.length > 0) {
            p = "";
            $.each(errors, function (key, value) {
                p += "<p>" + value + "</p>";
            });
            showError(p, "#authfeedback");
        } else {
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

            $.ajax({
                method: "POST",
                url: "/register",
                data: data,
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#authfeedback");
                        $this.trigger("reset");
                        $("#register-section").hide();
                        $("#login-section").show();
                        $("#emailpassword-reset").hide();
                        $("#loginEmail").val(email);
                        $("#loginPassword").val(password);
                    } else {
                        showError(result.error, "#authfeedback");
                    }
                    registerSubmit.prop({ disabled: false });
                },
                error: function (error) {
                    console.error(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#authfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#authfeedback"
                        );
                    }
                    registerSubmit.prop({ disabled: false });
                },
            });
        }
    });

    let partnertype = $("#partnertype"),
        partnerName = $("#partnerName"),
        partnerAddress = $("#partnerAddress"),
        partnerEmail = $("#partnerEmail"),
        partnerPhone = $("#partnerPhone"),
        partnerPassword = $("#partnerPassword"),
        contactName = $("#contactName"),
        contactEmail = $("#contactEmail"),
        contactPhone = $("#contactPhone");

    partnerForm = $("#partnerForm");

    partnerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            type = partnertype.val(),
            name = partnerName.val(),
            email = partnerEmail.val(),
            phone = partnerPhone.val(),
            address = partnerAddress.val(),
            password = partnerPassword.val(),
            contactname = contactName.val(),
            contactemail = contactEmail.val(),
            contactphone = contactPhone.val(),
            role = "partner",
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']"),
            errors = [];

        submit.prop({ disabled: true });
        if (name == "" || name == null) {
            errors.push("Name is required");
        }
        if (email == "" || email == null) {
            errors.push("Name is required");
        }
        if (errors.length > 0) {
            p = "";
            $.each(errors, function (key, value) {
                p += "<p>" + value + "</p>";
            });
            showError(p, "#authfeedback");
        } else {
            let data = {
                type: type,
                name: name,
                phone: phone,
                email: email,
                address: address,
                contactname: contactname,
                contactemail: contactemail,
                contactphone: contactphone,
                password: password,
                role: role,
            };
            console.log(data);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                method: "POST",
                url: "/partner/store",
                data: data,
                success: function (params) {
                    console.log(params);
                    submit.prop({ disabled: false });
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#authfeedback");
                        $this.trigger("reset");
                        $("#register-section").hide();
                        $("#login-section").show();
                        $("#emailpassword-reset").hide();
                        $("#partner-section").hide();
                        $('#loginEmail').val(email);
                        $('#loginPassword').val(password);
                    } else {
                        showError(result.error, "#authfeedback");
                    }
                },
                error: function (error) {
                    console.error(error);
                    submit.prop({ disabled: false });
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#authfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#authfeedback"
                        );
                    }
                },
            });
        }
    });

    $("#passwordResetForm").on("submit", function (event) {
        event.preventDefault();
        let email = $("#resetEmail").val(),
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
                    submitEmail.prop({ disabled: false });
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#forgotauthfeedback");
                    } else {
                        showError(result.error, "#forgotauthfeedback");
                    }
                },
                error: function (error) {
                    submitEmail.prop({ disabled: false });
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#forgotauthfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#forgotauthfeedback"
                        );
                    }
                    $this.find("#loginUser").prop({ disabled: false });
                },
            });
        } else {
                    submitEmail.prop({ disabled: false });
            showError("Email address is required");
        }
    });


    // $("#passwordSetForm").on("submit", function (event) {
    //     event.preventDefault();
    //     console.log("there");
    //     let $this = $(this),
    //         passwordRE = $("#passwordRe").val(),
    //         passwordConfirmationRe = $("#passwordConfirmationRe").val(),
    //         token = $this.find("input[name='_token']").val(),
    //         submitReset = $("#submitReset");
    //     submitReset.prop({ disabled: true });
    //     if (passwordRE !== passwordConfirmationRe) {
    //         showError("Password mismatch. Please check and retry");
    //     } else {
    //         $.ajaxSetup({
    //             headers: {
    //                 "X-CSRF-TOKEN": token,
    //             },
    //         });
    //         $.ajax({
    //             type: "POST",
    //             url: "/reset-password",
    //             data: {
    //                 password: passwordRE,
    //                 password_confirmation: passwordConfirmationRe,
    //             },
    //             success: function (params) {
    //                 console.log(params);
    //                 let result = JSON.parse(params);
    //                 if (result.status == "success") {
    //                     showSuccess(result.message, "#authfeedback");
    //                 } else {
    //                     showError(result.error, "#authfeedback");
    //                 }
    //                 submitReset.prop({ disabled: false });
    //                 window.setTimeout(function () {
    //                     window.location.href = "login";
    //                 }, 7000);
    //             },
    //             error: function (error) {
    //                 console.log(error);
    //                 if (error.status == 422) {
    //                     var errors = "";
    //                     $.each(
    //                         error.responseJSON.errors,
    //                         function (key, value) {
    //                             errors += value + "!";
    //                         }
    //                     );
    //                     showError(errors, "#authfeedback");
    //                 } else {
    //                     showError(
    //                         "Error occurred during processing",
    //                         "#authfeedback"
    //                     );
    //                 }
    //                 submitReset.prop({ disabled: false });
    //             },
    //         });
    //     }
    // });

    function showSuccess(message, target) {
        iziToast.success({
            title: "OK",
            message: message,
            position: "center",
            timeout: 10000,
            target: target,
        });
    }

    function showError(message, target) {
        iziToast.error({
            title: "Error",
            message: message,
            position: "center",
            timeout: 10000,
            target: target,
        });
    }
})();
