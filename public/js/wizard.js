"use strict";
$(document).ready(function () {
    $("#loanApplicationForm").bootstrapValidator({
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: "The User title is required",
                    },
                },
                required: true,
                minlength: 3,
            },
            firstname: {
                validators: {
                    notEmpty: {
                        message: "The firstname is required",
                    },
                },
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: "The lastname is required",
                    },
                },
            },
            date_of_birth: {
                validators: {
                    notEmpty: {
                        message: "The date_of_birth is required",
                    },
                },
            },
            date_of_birth: {
                validators: {
                    notEmpty: {
                        message: "The date_of_birth is required",
                    },
                },
            },

            email: {
                validators: {
                    notEmpty: {
                        message: "The email address is required",
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: "The input is not a valid email address",
                    },
                },
            },
            phonenumber: {
                validators: {
                    notEmpty: {
                        message: "The phonenumber is required ",
                    },
                },
            },
            krapin: {
                validators: {
                    notEmpty: {
                        message: "The kra pin is required ",
                    },
                },
            },
            idno: {
                validators: {
                    notEmpty: {
                        message: "ID NO is required",
                    },
                },
            },
            country_id: {
                validators: {
                    notEmpty: {
                        message: "Country is required ",
                    },
                },
            },
            city: {
                validators: {
                    notEmpty: {
                        message: "City is required ",
                    },
                },
            },
            estate: {
                validators: {
                    notEmpty: {
                        message: "Estate is required ",
                    },
                },
            },
            house_no: {
                validators: {
                    notEmpty: {
                        message: "House no is required ",
                    },
                },
            },
            employment: {
                validators: {
                    notEmpty: {
                        message: "Please select employment ",
                    },
                },
            },

            employement_type: {
                validators: {
                    notEmpty: {
                        message: "Please select employement_type ",
                    },
                },
            },
            industry: {
                validators: {
                    notEmpty: {
                        message: "Please select industry ",
                    },
                },
            },
            proffession: {
                validators: {
                    notEmpty: {
                        message: "Proffession is required ",
                    },
                },
            },
            employername: {
                validators: {
                    notEmpty: {
                        message: "Employer name is required ",
                    },
                },
            },
            years_of_employment: {
                validators: {
                    notEmpty: {
                        message: "Years of employment name is required ",
                    },
                },
            },
            employeraddress: {
                validators: {
                    notEmpty: {
                        message: "Employer address name is required ",
                    },
                },
            },
            sidebusiness: {
                validators: {
                    notEmpty: {
                        message: "State if you have side business ",
                    },
                },
            },

            businessowner: {
                validators: {
                    notEmpty: {
                        message: "State if you are the business owner",
                    },
                },
            },
            businessname: {
                validators: {
                    notEmpty: {
                        message: "Business name is required",
                    },
                },
            },
            businessregno: {
                validators: {
                    notEmpty: {
                        message: "Business registration number is required",
                    },
                },
            },
            businesstype: {
                validators: {
                    notEmpty: {
                        message: "Business type is required",
                    },
                },
            },
            businessaddress: {
                validators: {
                    notEmpty: {
                        message: "Business address is required",
                    },
                },
            },
            typeOfAccount: {
                validators: {
                    notEmpty: {
                        message: "Please check account type",
                    },
                },
            },
            bank: {
                validators: {
                    notEmpty: {
                        message: "Bank is required",
                    },
                },
            },
            accountholdername: {
                validators: {
                    notEmpty: {
                        message: "Account holder name is required",
                    },
                },
            },
            accountnumber: {
                validators: {
                    notEmpty: {
                        message: "Account number is required",
                    },
                },
            },
            bankaccounttype: {
                validators: {
                    notEmpty: {
                        message: "Account type is required",
                    },
                },
            },
            monthlyturnover: {
                validators: {
                    notEmpty: {
                        message: "Monthly turnover is required",
                    },
                },
            },
        },
    });

    let loanApplicationForm = $("#loanApplicationForm"),
        appliTitle = $("#appliTitle"),
        vehicleloanID = $("#vehicleloanID"),
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

    $("#acceptTerms").on("ifChanged", function (event) {
        $("#loanApplicationForm").bootstrapValidator(
            "revalidateField",
            $("#acceptTerms")
        );
    });
    $("#rootwizard").bootstrapWizard({
        tabClass: "nav nav-pills",
        onNext: function (tab, navigation, index) {
            var $validator = $("#loanApplicationForm")
                .data("bootstrapValidator")
                .validate();
            if ($validator.isValid()) {
                // alert('fd');
                $(".userprofile_tab1").addClass("tab_clr");
                $(".userprofile_tab2").addClass("tab_clr");
            }
            return $validator.isValid();
        },
        onPrevious: function (tab, navigation, index) {
            $(".userprofile_tab2").removeClass("tab_clr");
        },
        onTabClick: function (tab, navigation, index) {
            return false;
        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find("li").length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            var $rootwizard = $("#rootwizard");
            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $rootwizard.find(".pager .next").hide();
                $rootwizard.find(".pager .finish").show();
                $rootwizard.find(".pager .finish").removeClass("disabled");
            } else {
                $rootwizard.find(".pager .next").show();
                $rootwizard.find(".pager .finish").hide();
            }
        },
    });

    loanApplicationForm.on('submit', function(event) {
        event.preventDefault();
        console.log('submitted');
    });

    $("#loanSubmit").on("click", function () {
        var $validator = $("#loanApplicationForm")
            .data("bootstrapValidator")
            .validate();
        if ($validator.isValid()) {
            $("#loanSubmit").prop("disabled", true);
            let $this = $(this),
                submit = $this.find("button[type='submit']"),
                data = {
                    _token: $("input[name='_token']").val(),
                    vehicle_id: vehicleloanID.val(),
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
            $.post("/loan-application", data)
                .done(function (params) {
                    console.log(params);
                    $("#loanSubmit").prop("disabled", false);
                    let result = JSON.parse(params);
                    $("#loanApplicationForm").trigger("reset");
                    if (result.status == "success") {
                        showSuccess(result.message, "#loanfeedback");
                        $this.trigger("reset");
                    } else {
                        showError(result.error, "#loanfeedback");
                    }
                })
                .fail(function (error) {
                    $("#loanSubmit").prop("disabled", false);
                    console.log(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#loanfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#loanfeedback"
                        );
                    }
                    // });
                });
        }
    });


    

    $("#rootwizard_no_val").bootstrapWizard({ tabClass: "nav nav-pills" });

    $(".user2, .finish_tab, .next_btn1").on("click", function () {
        $(".userprofile_tab").addClass("tab_clr");
    });
    $(".user1, .previous_btn2").on("click", function () {
        $(".userprofile_tab").removeClass("tab_clr");
    });
    $(".finish_tab, .next_btn2").on("click", function () {
        $(".profile_tab").addClass("tab_clr");
    });
    $(".user2, .previous_btn3").on("click", function () {
        $(".profile_tab").removeClass("tab_clr");
    });
    $(".user1").on("click", function () {
        $(".user2 a span").removeClass("tab_clr");
    });
    $(".general_number").on("keyup", function () {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g, "");
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
});
