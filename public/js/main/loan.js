(function () {
    let loanproductID = $("#loanproductID"),
        loanPartnerID = $("#loanPartnerID"),
        interestRate = $("#interestRate"),
        calcPeriod = $("#calcPeriod"),
        calcDepost = $("#calcDepost"),
        calcInstallment = $("#calcInstallment"),
        principalAmount = $("#principalAmount");

    function numberFormat(number) {
        var parts = number.toFixed(2).split(".");
        var integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        var formattedNumber = integerPart;
        if (parts.length > 1) {
            var decimalPart = parts[1];
            formattedNumber += "." + decimalPart;
        }
        return formattedNumber;
    }

    $("#loansectiontoggle").on('click', function() {
        $(".loansection").toggle();
    });

    function getPartners() {
        $.getJSON("/partners", function (partners) {
            let option = '<option value="">Select One</option>';
            $.each(partners, function (key, value) {
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.name +
                    "</option>";
            });
            loanPartnerID.html(option);
        });
    }
    getPartners();

    loanPartnerID.on("change", function () {
        let partner_id = $(this).val();
        if (partner_id !== null && partner_id !== "") {
            $.getJSON(
                "/partner-loanproducts/" + partner_id,
                function (loanproducts) {
                    let option = "<option value=''>Select One</option>";
                    $.each(loanproducts, function (key, value) {
                        option +=
                            "<option value=" +
                            value.id +
                            ">" +
                            value.name +
                            "</option>";
                    });
                    loanproductID.html(option);
                }
            );
        } else {
            loanproductID.html("<option value=''>Select One</option>");
        }
    });

    loanproductID.on("change", function (event) {
        let loanproduct_id = $(this).val();
        if (loanproduct_id !== "" && loanproduct_id !== null) {
            $.getJSON("/loanproducts/" + loanproduct_id, function (products) {
                let product = products[0],
                    principal = parseFloat(principalAmount.val());
                interestRate.val(product.interest);
                console.log(product);
                calcPeriod.val(product.period);
                let rate = parseFloat(product.interest),
                    period = parseFloat(product.period),
                    tenure = parseFloat(period / 12);
                let installments = 0,
                    deposit = 0;
                // Display the calculated installments
                $("#installments").text("$" + installments.toFixed(2));
                if (product.method === "Simple") {
                    var timePeriod = parseFloat(period) / 12;
                    var interest = principal * (rate / 100) * timePeriod;
                    var totalAmount = principal + interest;
                    deposit +=
                        totalAmount * (parseFloat(product.deposit) / 100);
                    installments += (totalAmount - deposit) / (timePeriod * 12);
                }
                if (product.method === "Compound") {
                    var interest = principal * Math.pow(1 + rate / 100, tenure);
                    var totalAmount = principal + interest;
                    var numberOfInstallments = period;
                    installments += totalAmount / numberOfInstallments;
                }
                if (product.method === "Armotization") {
                    var monthlyInterestRate = rate / 100 / 12;
                    var denominator =
                        Math.pow(1 + monthlyInterestRate, period) - 1;
                    installments +=
                        (principal *
                            monthlyInterestRate *
                            Math.pow(1 + monthlyInterestRate, period)) /
                        denominator;
                    var totalAmount = installments * period;
                    deposit += totalAmount - principal;
                }
                calcInstallment.val(numberFormat(installments));
                calcDepost.val(numberFormat(deposit));
            });
        } else {
            calcInstallment.val(0);
            calcDepost.val(0);
        }
    });
})();
