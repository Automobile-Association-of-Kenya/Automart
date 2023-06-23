(function () {
    // function getDealerSummary() {
    //     $.getJSON('/dealer-summary', function (data) {

    //     });
    // }
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

    let dealerForm = $("#dealerForm"),
        dealerName = $("#dealerName"),
        dealerEmail = $("#dealerEmail"),
        dealerPhone = $("#dealerPhone"),
        dealerAltPhone = $("#dealerAltPhone"),
        postolAddress = $("#postolAddress"),
        dealerAddress = $("#dealerAddress"),
        dealerCity = $("#dealerCity");

    dealerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']"),
            data = {
                _token: token,
                name: dealerName.val(),
                email: dealerEmail.val(),
                phone: dealerPhone.val(),
                alt_phone: dealerAltPhone.val(),
                address: dealerAddress.val(),
                postal_address: postolAddress.val(),
                city: dealerCity.val(),
            };
        submit.prop("disabled", true);

        $.post("/dealer/store", data)
            .done(function (params) {
                console.log(params);
                let result = JSON.parse(params);

                if (result.status === "data") {
                    if (confirm(result.message)) {
                        data.continue = true;
                        $.post("/dealer/store", data)
                            .done(function (params) {
                                console.log(params);
                                let result = JSON.parse(params);

                                if (result.status == "success") {
                                    showSuccess(
                                        result.message,
                                        "#businessfeedback"
                                    );
                                    $this.trigger("reset");
                                } else {
                                    showError(
                                        result.error,
                                        "#businessfeedback"
                                    );
                                }
                            })
                            .fail(function (error) {
                                console.log(error);
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
                            });
                    } else {
                        submit.prop("disabled", false);
                    }
                }
                submit.prop("disabled", false);

                if (result.status == "success") {
                    showSuccess(result.message, "#businessfeedback");
                    $this.trigger("reset");
                } else {
                    showError(result.error, "#businessfeedback");
                }
            })
            .fail(function (error) {
                console.log(error);
                submit.prop({ disabled: false });
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#businessfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#businessfeedback"
                    );
                }
            });
    });
})();
