(function () {
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

    // $("#userupdateForm").on("submit", function (event) {
    //     event.preventDefault();
    //     var formdata = new FormData();
    //     let $this = $(this), name = $("#username").val(),
    //         phone = $("#userphone").val(),
    //         email = $("#useremail").val(),
    //         alt_phone = $("#useralt_phone").val(),
    //         user_id = $("#userId").val(), token = $this.find("input[name='_token']").val(), errors = [],
    //         fileInput = document.getElementById("profilePhoto"),
    //         file = fileInput.files[0];
    //     formdata.append('name',name);
    //     formdata.append('phone',phone);
    //     formdata.append('email',email);
    //     formdata.append('alt_phone',alt_phone);
    //     formdata.append('user_id',user_id);
    //     formdata.append("_token", token);
    //     formdata.append("profile", file);
    //     if (size > (1024 * 1024) / 2) {
    //         errors.push("Profile size cannot be more than 500kb");
    //     }
    //     if (name.length <= 0) {
    //         errors.push("Name is required");
    //     }
    //     if (phone.length <= 0) {
    //         errors.push("Phone is required");
    //     }
    //     $.post("/users/update/" + user_id, formdata)
    //         .done(function (params) {
    //             let result = JSON.parse(params);
    //             if (result.status == "success") {
    //                 showSuccess(result.message, "#profilefeedback");
    //             } else {
    //                 showError(result.error, "#profilefeedback");
    //             }
    //         })
    //         .fail(function (error) {
    //             console.error(error);
    //             if (error.status == 422) {
    //                 var errors = "";
    //                 $.each(error.responseJSON.errors, function (key, value) {
    //                     errors += value + "!";
    //                 });
    //                 showError(errors, "#profilefeedback");
    //             } else {
    //                 showError(
    //                     "Error occurred during processing",
    //                     "#profilefeedback"
    //                 );
    //             }
    //         });
    // });

    let dealerForm = $("#dealerForm"),
        dealerName = $("#dealerName"),
        dealerEmail = $("#dealerEmail"),
        dealerPhone = $("#dealerPhone"),
        dealerAltPhone = $("#dealerAltPhone"),
        postolAddress = $("#postolAddress"),
        dealerAddress = $("#dealerAddress"),
        dealerCity = $("#dealerCity"),
        dealerID = $("#dealerID");

    dealerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']");
        var formData = new FormData();
        var fileInput = document.getElementById("dealerLogo");
        var file = fileInput.files[0],
            errors = [];
        if (file > (1024 * 1024) / 3) {
            errors.push("File cannot be greater than 250kb");
        }
        if (dealerName.val().length <= 1) {
            errors.push("Name is required");
        }
        if (dealerEmail.val().length <= 1) {
            errors.push("Email is required");
        }
        if (dealerPhone.val().length <= 1 && dealerPhone.val().length > 14) {
            errors.push(
                "Phone is required and cannot be greater than 14 characters"
            );
        }
        if (error.length > 0) {
            var p = "";
            $.each(errors, function (key, value) {
                p += "<p>" + value + "</p>";
            });
            showError(p, "#businessfeedback");
            submit.prop({ disabled: false });
        } else {
            formData.append("logo", file);
            formData.append("name", dealerName.val());
            formData.append("email", dealerEmail.val());
            formData.append("phone", dealerPhone.val());
            formData.append("alt_phone", dealerAltPhone.val());
            formData.append("address", dealerAddress.val());
            formData.append("postal_address", postolAddress.val());
            formData.append("city", dealerCity.val());
            formData.append("dealer_id", dealerID.val());
            submit.prop("disabled", true);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: "POST",
                url: "/dealer/update/",
                data: formData,
                processData: false,
                contentType: false,
                success: function (params) {
                    let result = JSON.parse(params);

                    if (result.status == "success") {
                        showSuccess(result.message, "#businessfeedback");
                        $this.trigger("reset");
                    } else {
                        showError(result.error, "#businessfeedback");
                    }
                },
                error: function (error) {
                    submit.prop({ disabled: false });
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#businessfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#businessfeedback"
                        );
                    }
                },
            });
        }
    });
})();
