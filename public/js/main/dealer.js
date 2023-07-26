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
        dealerCity = $("#dealerCity"),
        dealerID = $("#dealerID");

    dealerForm.on("submit", function (event) {
        event.preventDefault();
 let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']");
        var formData = new FormData();
        var fileInput = document.getElementById("dealerLogo");
        var file = fileInput.files[0];
        formData.append("logo", file);
        formData.append("name", dealerName.val());
        formData.append("email", dealerEmail.val());
        formData.append("phone", dealerPhone.val());
        formData.append("alt_phone", dealerAltPhone.val());
        formData.append("address", dealerAddress.val());
        formData.append("postal_address", postolAddress.val());
        formData.append("city", dealerCity.val());
        formData.append("dealer_id", dealerID.val());
        formData.append("_token", token);

        submit.prop("disabled", true);

        $.post("/dealer/store", formData)
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

    let subsPromise = new Promise(function (resolve, reject) {
        $.getJSON("/dealer/subscription", function (subscription) {
            resolve(subscription?.expiry_date);
            console.log(subscription);
        });
    });
    Promise.resolve(subsPromise).then((result) => {
        if (result !== undefined) {
            var targetDate = new Date(result);
        }

        function updateCountdown() {
            var countdownElement = document.getElementById("subscriptionCountdowntimer");
            if (targetDate !== undefined) {
                var currentDate = new Date();
                var timeDifference = targetDate - currentDate;
                var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor(
                    (timeDifference % (1000 * 60 * 60)) / (1000 * 60)
                );
                var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                let day =
                    days > 1
                        ? days + " days, "
                        : days < 1
                        ? ""
                        : days + " day, ";
                countdownElement.innerHTML = day +
                    hours +
                    " : " +
                    minutes +
                    " : " +
                    seconds;
                if (timeDifference < 0) {
                    clearInterval(countdownInterval);
                    countdownElement.innerHTML =
                        "<a href='/subscription-plans' _target='_blank' class='btn btn-light btn-sm alert-link'>&nbsp;Promote your ads</a>";
                }
            } else {
                countdownElement.innerHTML =
                    "<a href='/subscription-plans' _target='_blank' class='btn btn-light btn-sm alert-link'>&nbsp;Promote your ads</a>";
            }
        }
        var countdownInterval = setInterval(updateCountdown, 1000);
    });
})();
