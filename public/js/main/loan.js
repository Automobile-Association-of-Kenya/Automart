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

    $("#loansectiontoggle").on("click", function () {
        $(".loansection").toggle();
    });

    let sidebusiness = $("input[name='sidebusiness']"),
        employment = $("input[name='employment']");

    employment.on("change", function (event) {
        let val = $(this).val();
        let business = sidebusiness.val();
        if (val == "employment" && business == "yes") {
            $("." + val).show();
            $(".business").show();
        } else if ((val === "employment") & (business === "no")) {
            $("." + val).show();
            $(".business").hide();
        } else if (val == "business") {
            $("." + val).hide();
            $(".business").show();
        } else {
            $("." + val).show();
            $(".business").show();
        }
    });
    sidebusiness.on("change", function () {
        if ($(this).val() == "yes") {
            $(".business").show();
        } else {
            $(".business").hide();
        }
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

    let loanApplicationForm = $("#loanApplicationForm"),
        appliTitle = $("#appliTitle"),
        firstName = $("#firstName"),
        lastName = $("#lastName"),
        dateOfbirth = $("#dateOfbirth"),
        emailAddress = $("#emailAddress"),
        phoneNumber = $("#phoneNumber"),
        kraPin = $("#kraPin"),
        idNo = $("#idNo"),
        countryID = $("#countryID"),
        cityResidence = $("#cityResidence"),
        estateName = $("#estateName"),
        houseNO = $("#houseNO"),
        employmentinput = $("input[name='employment']"),
        employementType = $("#employementType"),
        industry = $("#industry"),
        proffession = $("#proffession"),
        employerName = $("#employerName"),
        yearsOfEmployment = $("#yearsOfEmployment"),
        employerAddress = $("#employerAddress"),
        sidebusinessinput = $("input[name='sidebusiness']"),
        businessowner = $("input[name='businessowner']"),
        businessName = $("#businessName"),
        businessRegNo = $("#businessRegNo"),
        businesstype = $("#businesstype"),
        businessaddress = $("#businessAddress"),
        typeOfAccount = $("input[name='typeOfAccount']"),
        bankName = $("#bankName"),
        accountholdername = $("#accountholdername"),
        accountNumber = $("#accountNumber"),
        bankAccountType = $("#bankAccountType"),
        monthlyTurnover = $("#monthlyTurnover");
    loanApplicationForm.on("submit", function (event) {
        event.preventDefault();

        let $this = $(this),
            submit = $this.find("button[type='submit']"),
            data = {
                _token: $this.find("input[name='_token']").val(),
                title: appliTitle.val(),
                firstname: firstName.val(),
                lastname: lastName.val(),
                date_of_birth: dateOfbirth.val(),
                email: emailAddress.val(),
                phone: phoneNumber.val(),
                kra_pin: kraPin.val(),
                id_no: idNo.val(),
                country_id: countryID.val(),
                city: cityResidence.val(),
                estate: estateName.val(),
                house_no: houseNO.val(),
                occupation: employmentinput.val(),
                employement_type: employementType.val(),
                industry_id: industry.val(),
                proffession: proffession.val(),
                employer: employerName.val(),
                years_of_employment: yearsOfEmployment.val(),
                employer_address: employerAddress.val(),
                business: sidebusinessinput.val(),
                businessowner: businessowner.val(),
                business_name: businessName.val(),
                business_reg_no: businessRegNo.val(),
                businesstype: businesstype.val(),
                businessaddress: businessaddress.val(),
                type_of_bank_account: typeOfAccount.val(),
                bank: bankName.val(),
                accountholdername: accountholdername.val(),
                account_number: accountNumber.val(),
                bank_account_type: bankAccountType.val(),
                monthly_turnover: monthlyTurnover.val(),
            };
        console.log(data);
        submit.prop("disabled", true);
        $.post("/loan-application", data)
            .done(function (params) {
                console.log(params);
                submit.prop({ disabled: false });
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#loanfeedback");
                    $this.trigger("reset");
                } else {
                    showError(result.error, "#loanfeedback");
                }
            })
            .fail(function (error) {
                submit.prop({ disabled: false });
                console.log(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#loanfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#loanfeedback"
                    );
                }
            });
    });
})();
