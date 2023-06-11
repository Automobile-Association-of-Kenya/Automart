(function () {
    $("#providerID").on("change", function () {
        let val = $(this).val();
        $("." + val).toggle();
        $(".Mpesa").toggle(val === "Mpesa");
        $(".Paypal").toggle(val === "Paypal");
        $(".Bank").toggle(val === "Bank");
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

    function getAccounts() {
        $.getJSON("/accounts-get", function (accounts) {
            let tr = "",
                i = 1;
            $.each(accounts, function (key, value) {
                if (value.provider === "Mpesa") {
                    tr +=
                        "<tr><td>" +
                        i++ +
                        "</td><td>" +
                        value.provider +
                        "</td><td>" +
                        value.mpesa_transaction_type +
                        "</td><td>" +
                        value.mpesa_business_short_code +
                        "</td><td>" +
                        value.mpesa_customer_key +
                        "</td><td>" +
                        value.mpesa_secret +
                        "</td><td>" +
                        value.mpesa_pass_key +
                        '</td><td>0</td><td><li class="dropdown"><a href="#" data-toggle="dropdown" class="btn btn-success btn-sm">Action</a><ul class="dropdown-menu"><li class="dropdown-item"><a href="#" id="assignSubscriptionToggle" data-toggle="modal" data-target="#assignToSubscriptionModal" data-id=' +
                        value.id +
                        '><i class="fa fa-edit text-warning"></i>&nbsp;Add subscription</a></li></ul></li></td></tr>';
                }
            });
            $("#accountsTable").html(tr);
        });
    }
    getAccounts();

    let accountID = $("#accountID"),
        providerID = $("#providerID"),
        clientID = $("#clientID"),
        clientSecrest = $("#clientSecrest"),
        paypalBusinessName = $("#paypalBusinessName"),
        paypalCardNumber = $("#paypalCardNumber"),
        expirationDate = $("#expirationDate"),
        paypalCW = $("#paypalCW"),
        mpesaSecret = $("#mpesaSecret"),
        mpesaCustomerKey = $("#mpesaCustomerKey"),
        mpesaPassKey = $("#mpesaPassKey"),
        businessShortCode = $("#businessShortCode"),
        transactionType = $("#transactionType"),
        createAccountForm = $("#createAccountForm");

    createAccountForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            account_id = accountID.val(),
            provider = providerID.val(),
            pp_client_id = clientID.val(),
            pp_client_secret = clientSecrest.val(),
            pp_business_name = paypalBusinessName.val(),
            pp_card_number = paypalCardNumber.val(),
            expiry = expirationDate.val(),
            pp_cw = paypalCW.val(),
            mpesa_secret = mpesaSecret.val(),
            mpesa_customer_key = mpesaCustomerKey.val(),
            mpesa_pass_kwy = mpesaPassKey.val(),
            mpesa_business_short_code = businessShortCode.val(),
            mpesa_transaction_type = transactionType.val();
        let data = {
            _token: token,
            account_id: account_id,
            provider: provider,
            pp_client_id: pp_client_id,
            pp_client_secret: pp_client_secret,
            pp_business_name: pp_business_name,
            pp_card_number: pp_card_number,
            expiry: expiry,
            pp_cw: pp_cw,
            mpesa_secret: mpesa_secret,
            mpesa_customer_key: mpesa_customer_key,
            mpesa_pass_key: mpesa_pass_kwy,
            mpesa_business_short_code: mpesa_business_short_code,
            mpesa_transaction_type: mpesa_transaction_type,
        };

        console.log(data);

        $.post("/accounts", data)
            .done(function (params) {
                console.log(params);
                let result = JSON.parse(params);
                $this.find("button[type='submit']").prop({ disabled: false });
                if (result.status == "success") {
                    getAccounts();
                    showSuccess(result.message, "#accountsfeedback");
                } else {
                    showError(result.error, "#accountsfeedback");
                }
            })
            .fail(function (error) {
                console.log(error);
                $this.find("button[type='submit']").prop({ disabled: false });
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#accountsfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#accountsfeedback"
                    );
                }
            });
    });

    let accountAssignForm = $("#accountAssignForm"),
        assignAccountID = $("#assignAccountID"),
        subscriptionAssignID = $("#subscriptionAssignID");

    function getSubscription() {
        $.getJSON("/subscriptions", function (subscriptions) {
            let option = "<option value=''>Select One</option>";
            $.each(subscriptions, function (key, value) {
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.name +
                    "</option>";
            });
            subscriptionAssignID.html(option);
        });
    }
    getSubscription();

    $("body").on("click", "#assignSubscriptionToggle", function (event) {
        let account_id = $(this).data("id");
        assignAccountID.val(account_id);
    });

    subscriptionAssignID.on('change', function() {
        console.log('there');
    });

    accountAssignForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            account_id = assignAccountID.val(),
            subscription_id = subscriptionAssignID.val(),
            token = $this.find("input[name='_token']").val();
        let data = {
            account_id: account_id,
            subscription_id: subscription_id,
            _token: token,
        };
        console.log(data);
        
        $.post("/accounts-subscribe", data)
            .done(function (params) {
                console.log(params);
                let result = JSON.parse(params);
                $this.find("button[type='submit']").prop({ disabled: false });
                if (result.status == "success") {
                    getAccounts();
                    showSuccess(result.message, "#assignfeeback");
                } else {
                    showError(result.error, "#assignfeeback");
                }
            })
            .fail(function (error) {
                console.log(error);
                $this.find("button[type='submit']").prop({ disabled: false });
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#assignfeeback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#assignfeeback"
                    );
                }
            });
    });
})();
