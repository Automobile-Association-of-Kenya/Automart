(function () {
    $("#quoteRequestToggle").on("click", function () {
        console.log("toggled");
        let vehicle_no = $(this).data("no");
        $("#vehicleRef").text(vehicle_no);
    });

    $("#financeRequestToggle").on("click", function () {
        console.log("was aslso");
    });

    function showSuccess(message, target) {
        iziToast.success({
            title: "OK",
            message: message,
            position: "center",
            timeout: 7000,
            target: target,
        });
    }

    function showError(message, target) {
        iziToast.error({
            title: "Error",
            message: message,
            position: "center",
            timeout: 7000,
            target: target,
        });
    }

    let quotationForm = $("#quotationForm"),
        vehicleID = $("#vehicleID"),
        quoteName = $("#quoteName"),
        quoteEmail = $("#quoteEmail"),
        quotePhone = $("#quotePhone"),
        quoteSubject = $("#quoteSubject"),
        quoteMessage = $("#quoteMessage");

    quotationForm.on("submit", function (event) {
        event.preventDefault();
        $("#quotefeeback").html(
            '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
        );
        let $this = $(this),
            vehicle_id = vehicleID.val(),
            name = quoteName.val(),
            email = quoteEmail.val(),
            phone = quotePhone.val(),
            subject = quoteSubject.val(),
            message = quoteMessage.val(),
            token = $this.find("input[name='_token']").val();
        $this.find("#quoteSubmitDetails").prop('disabled',true);
        let data = {
            _token: token,
            vehicle_id: vehicle_id,
            name: name,
            email: email,
            phone: phone,
            subject: subject,
            message: message,
        };

        $.post("/quotes", data)
            .done(function (params) {
                $("#quotefeeback").find(".lds-roller").remove();
                $this.find("#quoteSubmitDetails").prop('disabled',false);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    $this.trigger("reset");
                    showSuccess(result.message, "#quotefeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#quotefeeback"
                    );
                }
            })
            .fail(function (error) {
                $("#quotefeeback").find(".lds-roller").remove();
                $this.find("#quoteSubmitDetails").prop("disabled", false);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#quotefeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#quotefeeback"
                    );
                }
            });
    });

    let financialForm = $("#financialForm"),
        vehicleFinanceID = $("#vehicleFinanceID"),
        financeName = $("#financeName"),
        financeEmail = $("#financeEmail"),
        financePhone = $("#financePhone"),
        partnerID = $("#partnerID"),
        financeSubject = $("#financeSubject"),
        financeAmount = $("#financeAmount");

    financialForm.on("submit", function (event) {
        event.preventDefault();
        let vehicle_id = vehicleFinanceID.val(),
            name = financeName.val(),
            email = financeEmail.val(),
            phone = financePhone.val(),
            partner_id = partnerID.val(),
            subject = financeSubject.val(),
            amount = financeAmount.val(),
            $this = $(this), token = $this.find("input[name='_token']").val();
        let data = {
            _token: token,
            vehicle_id: vehicle_id,
            name: name,
            email: email,
            phone: phone,
            partner_id: partner_id,
            subject: subject,
            amount: amount,
        };
        $.post("/finances", data)
            .done(function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    $this.trigger("reset");
                    showSuccess(result.message, "#financefeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#financefeeback"
                    );
                }
            })
            .fail(function (error) {
                console.log(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#financefeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#financefeeback"
                    );
                }
            });
    });


    let tradeinForm = $("#tradeinForm"),
        vehicletradeinID = $("#vehicletradeinID"),
        tradeinName = $("#tradeinName"),
        tradeinEmail = $("#tradeinEmail"),
        tradeinPhone = $("#tradeinPhone"),
        makeID = $("#makeID"),
        vehicleModelID = $("#vehicleModelID"),
        tradeinYear = $("#tradeinYear"),
        regNO = $("#regNO");
    tradeinForm.on("submit", function (event) {
        event.preventDefault();
        $("#tradeinfeeback").html(
            '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
        );
        let vehicle_id = vehicletradeinID.val(),
            name = tradeinName.val(),
            email = tradeinEmail.val(),
            phone = tradeinPhone.val(),
            make_id = makeID.val(),
            vehicle_model_id = vehicleModelID.val(),
            year = tradeinYear.val(),
            reg_no = regNO.val(),
            $this = $(this),
            token = $this.find("input[name='_token']").val();
        $this.find("#tradeinSubmitDetails").prop("disabled", true);
        let data = {
            _token: token,
            vehicle_id:vehicle_id,
            name:name,
            email:email,
            phone:phone,
            make_id:make_id,
            vehicle_model_id:vehicle_model_id,
            year: year,
            reg_no: reg_no,
        };
        console.log(data);

        $.post("/tradein-store", data)
            .done(function (params) {
                console.log(params);
                $("#tradeinfeeback").find(".lds-roller").remove();
                $this.find("#tradeinSubmitDetails").prop("disabled", true);
                $this.find("#tradeinSubmitDetails").prop("disabled", false);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    $this.trigger("reset");
                    showSuccess(result.message, "#tradeinfeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#tradeinfeeback"
                    );
                }
            })
            .fail(function (error) {
                console.log(error);
                $("#tradeinfeeback").find(".lds-roller").remove();
                $this.find("#tradeinSubmitDetails").prop("disabled", false);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#tradeinfeeback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#tradeinfeeback"
                    );
                }
            });
    });
})();
