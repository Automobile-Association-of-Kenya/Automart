(function () {
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

    function numberFormat(number ) {
        var parts = number.toFixed(2).split(".");
        var integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        var formattedNumber = integerPart;
        if (parts.length > 1) {
            var decimalPart = parts[1];
            formattedNumber += '.' + decimalPart;
        }
        return formattedNumber;
    }

    function getProducts() {
        $.getJSON("/partner/loanproducts", function (products) {
            let tr = "",
                i = 1;
            $.each(products, function (key, value) {
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    value.name +
                    "</td><td>" +
                    value.method +
                    "</td><td>" +
                    value.period +
                    " Months</td><td>" +
                    value.deposit +
                    " %</td><td>" +
                    value.interest +
                    " %</td><td>" +
                    numberFormat(value.limit) +
                    "</td><td></td></tr>";
            });
            $("#productsTableData").html(tr);
        });
    }
    getProducts();

    let loanProductForm = $("#loanProductForm"),
        lproductName = $("#lproductName"),
        lproductPeriod = $("#lproductPeriod"),
        lproductDeposit = $("#lproductDeposit"),
        lproductInterestRate = $("#lproductInterestRate"),
        lproductLimit = $("#lproductLimit"),
        interestMethod = $("#interestMethod");
    loanProductForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            submit = $this.find("button[type='submit']"),
            data = {
                _token: $this.find("input[name='_token']").val(),
                name: lproductName.val(),
                method: interestMethod.val(),
                period: lproductPeriod.val(),
                deposit: lproductDeposit.val(),
                interest: lproductInterestRate.val(),
                limit: lproductLimit.val(),
            };
        console.log(data);
        $.post("/partner/saveloanproduct", data)
            .done(function (params) {
                console.log(params);
                let result = JSON.parse(params);
                submit.prop({ disabled: false });
                if (result.status == "success") {
                    getProducts();
                    showSuccess(result.message, "#lpcreatefeedback");
                    $this.trigger("reset");
                } else {
                    showError(result.error, "#lpcreatefeedback");
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
                    showError(errors, "#lpcreatefeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#lpcreatefeedback"
                    );
                }
            });
    });
})();
