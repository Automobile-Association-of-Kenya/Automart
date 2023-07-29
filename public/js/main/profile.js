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
})();
