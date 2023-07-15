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
                i = 1,
                option = "<option value=''>All</option>";
            $.each(accounts, function (key, value) {
                var balance =
                    value.payments_sum_amount !== null
                        ? parseFloat(value.payments_sum_amount)
                        : 0;
                if (value.provider === "Mpesa") {
                    option +=
                        "<option value='" +
                        value.id +
                        "'>" +
                        value.provider +
                        " " +
                        value.mpesa_business_short_code +
                        "</option>";
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
                        '</td><td>'+toMoney(balance)+'</td><td>'+value.currency+'</td><td><li class="dropdown"><a href="#" data-toggle="dropdown" class="btn btn-success btn-sm">Action</a><ul class="dropdown-menu"><li class="dropdown-item"><a href="#" id="assignSubscriptionToggle" data-toggle="modal" data-target="#assignToSubscriptionModal" data-id=' +
                        value.id +
                        '><i class="fa fa-edit text-warning"></i>&nbsp;Add subscription</a></li></ul></li></td></tr>';
                }
            });
            $("#accountFilterID").html(option);
            $("#accountsTable").html(tr);
        });
    }
    getAccounts();

    function getDealers() {
        $.getJSON("/dealers-get", function (dealers) {
            let option = "<option value=''>All</option>",
                i = 1;
            $.each(dealers, function (key, value) {
                option +=
                    "<option value='" +
                    value.id +
                    "'>" +
                    value.name +
                    "</option>";
            });
            $("#dealerPaymentFilterID").html(option);
        });
    }
    getDealers();

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
        createAccountForm = $("#createAccountForm"),
        accurrency = $("#accurrency");

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
            mpesa_transaction_type = transactionType.val(),
            currency = accurrency.val();

        let data = {
            _token: token,
            account_id: account_id,
            provider: provider,
            pp_client_id: pp_client_id,
            pp_client_secret: pp_client_secret,
            business_name: pp_business_name,
            pp_card_number: pp_card_number,
            expiry: expiry,
            pp_cw: pp_cw,
            mpesa_secret: mpesa_secret,
            mpesa_customer_key: mpesa_customer_key,
            mpesa_pass_key: mpesa_pass_kwy,
            mpesa_business_short_code: mpesa_business_short_code,
            mpesa_transaction_type: mpesa_transaction_type,
            currency: currency,
        };

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
                console.error(error);
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
            var subscriptions = subscriptions.subscriptions;
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

    subscriptionAssignID.on("change", function () {
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
        $.post("/accounts-subscribe", data)
            .done(function (params) {
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

    let filterTransactionsForm = $("#filterTransactionsForm"),
        accountFilterID = $("#accountFilterID"),
        dealerPaymentFilterID = $("#dealerPaymentFilterID"),
        startDate = $("#startDate"),
        endDate = $("#endDate");
    filterTransactionsForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            account_id = accountFilterID.val(),
            dealer_id = dealerPaymentFilterID.val(),
            start_date = startDate.val(),
            end_date = endDate.val();
        let data = {
            _token: $this.find("input[name='_token']").val(),
            account_id: account_id,
            dealer_id: dealer_id,
            start_date: start_date,
            end_date: end_date,
        };
        $.post("/payments-get", data)
            .done(function (params) {
                let tr = "",
                    i = 1,
                    amount = 0;
                let payments = JSON.parse(params);
                $.each(payments, function (key, value) {
                    if (value.account.provider === "Mpesa") {
                        tr +=
                            "<tr><td><input type=\"checkbox\" name=\"payment-select\" id=\"payment-select\">&nbsp;&nbsp;" +
                            i++ +
                            "</td><td>" +
                            value.account.provider +
                            " " +
                            value.account.mpesa_business_short_code +
                            "</td><td>" +
                            value.user.name +
                            "</td><td>" +
                            value.dealer.name +
                            "</td><td>" +
                            value.subscription.name +
                            "</td><td>" +
                            value.trans_id +
                            "</td><td>" +
                            value.phone +
                            "</td><td>" +
                            moment(value.created_at).format(
                                "D MMM, YYYY H:mm:s"
                            ) +
                            "</td><td>" +
                            toMoney(value.amount) +
                            "</td></tr>";
                    }
                    amount += parseFloat(value.amount);
                });
                let table =
                    "<table class='table table-bordered table-hover transactionsTable'><thead><th>#</th><th>Account</th><th>Payee</th><th>Dealer</th><th>Subscription</th><th>Trans ID</th><th>Phone</th><th>Date</th><th>Amount</th></thead><tbody>" +
                    tr +
                    "</tbody><tfoot><tr><td colspan='8'><strong>Total</strong></td><td><strong>" +
                    toMoney(amount) +
                    "</strong></td></tfoot></table>";
                $("#transactionSection").html(table);
                if ($.fn.DataTable.isDataTable(".transactionsTable")) {
                    $(".transactionsTable").destroy();
                    $(".transactionsTable").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            "copyHtml5",
                            "excelHtml5",
                            "csvHtml5",
                            "pdfHtml5",
                        ],
                    });
                } else {
                    $(".transactionsTable").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            "copyHtml5",
                            "excelHtml5",
                            "csvHtml5",
                            "pdfHtml5",
                        ],
                    });
                }
            })
            .fail(function (error) {
            });
    });

    function toMoney(number) {
        let actul = parseFloat(number);
        return actul.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }
})();
