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

    $("#userupdateForm").on("submit", function (event) {
        event.preventDefault();
        let name = $("#username").val(),
            phone = $("#userphone").val(),
            email = $("#useremail").val(),
            alt_phone = $("#useralt_phone").val(),
            user_id = $("#userId").val(),
            data = {
                name: name,
                phone: phone,
                email: email,
                alt_phone: alt_phone,
            };
        $.post("/users/update/" + user_id, data)
            .done(function (params) {
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#profilefeedback");
                } else {
                    showError(result.error, "#profilefeedback");
                }
            })
            .fail(function (error) {
                console.error(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#profilefeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#profilefeedback"
                    );
                }
            });
    });
})();
