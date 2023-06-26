(function () {
    function showSuccess(message, target) {
        iziToast.success({
            title: "OK",
            message: message,
            position: "center",
            timeout: 20000,
            target: target,
        });
    }

    function showError(message, target) {
        iziToast.error({
            title: "Error",
            message: message,
            position: "center",
            timeout: 20000,
            target: target,
        });
    }

    // function getSubscriptions() {
    //     $("#plansSection").html(
    //         '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //     );
    //     $.when(
    //         $.getJSON("/subscriptions"),
    //         $.getJSON("/subscription-features")
    //     ).done(function (subscriptions, features) {
    //         if (subscriptions.length > 0) {
    //             let plan = "",
    //                 propids = [];
    //             $.each(subscriptions[0], function (key, value) {
    //                 let li = "";
    //                 $.each(value.properties, function (key, value) {
    //                     propids.push(value.id);
    //                 });
    //                 $.each(features[0], function (key, value) {
    //                     if ($.inArray(value.id, propids) !== -1) {
    //                         li +=
    //                             '<li><i class="fa fa-thumbs-up text-success"></i>&nbsp;' +
    //                             value.name +
    //                             "</li>";
    //                     }
    //                     // else {
    //                     //     li +=
    //                     //         '<li><i class="fa fa-thumbs-down text-danger"></i>&nbsp;' +
    //                     //         value.name +
    //                     //         "</li>";
    //                     // }
    //                 });
    //                 plan +=
    //                     '<div class="col-xl-4 col-lg-4 col-md-12"><div class="pricing-1 plan"><div class="plan-header"><h5>' +
    //                     value.name +
    //                     "</h5><p>" +
    //                     value.description +
    //                     '</p><div class="plan-price"><sup>Kes</sup>' +
    //                     value.cost +
    //                     "<span>/" +
    //                     value.billingcycle +
    //                     '</span> </div></div><div class="plan-list"><ul>' +
    //                     li +
    //                     '</ul><div class="plan-button text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#subscriptionPaymentModal" id="subscriptionSelect" class="btn pricing-btn" data-id="' +
    //                     value.id +
    //                     '">Get Started</a></div></div></div></div>';
    //             });
    //             $("#plansSection").html(plan);
    //             // /subscription/'+value.id+'
    //         }
    //     });
    // }
    // getSubscriptions();

    function getSubscriptions() {
        $.getJSON("/subscriptions", function (subscriptions) {
            let plan = "";

            $.each(subscriptions, function (key, value) {
                let li = "";
                $.each(value.properties, function (key, value) {
                    li +=
                        '<li><i class="fa fa-check-circle fa-1x text-success"></i>&nbsp;' +
                        value.name +
                        "</li>";
                });
                plan +=
                    '<div class="col-xl-4 col-lg-4 col-md-12"><div class="pricing-1 plan"><div class="plan-header"><h5>' +
                    value.name +
                    "</h5><p>" +
                    value.description +
                    '</p><div class="plan-price"><sup>Kes</sup>' +
                    value.cost +
                    "<span>/" +
                    value.billingcycle +
                    '</span> </div></div><div class="plan-list"><ul>' +
                    li +
                    '</ul><div class="plan-button text-center"><a href="subscription/'+value.id+'" id="subscriptionSelect" class="btn pricing-btn" data-id="' +
                    value.id +
                    '">Get Started</a></div></div></div></div>';
            });
            $("#plansSection").html(plan);
        });
    }
    getSubscriptions();

    function getSubscriptionsSummary() {
        $.getJSON("/subscriptions", function(params) {
            let propids = params.propids,
                properties = params.properties,
                subscriptions = params.subscriptions, li = "", plan = "";
            $.each(properties, function (key, value) {
                li += "<li class='list-group-item'>" + value.name + "</li>";
            });

            // console.log(subscriptions);
            // console.log(properties);
            // subscriptions.forEach(element => {
            //     let subs = element.properties
            //     subs.forEach((element1) => {
            //         let subPropId = element1.pivot.subsproperty_id;

            //         if ($.inArray(subPropId, propids) !== -1) {
            //             console.log(subPropId)
            //         }
            //     });
            // });
//             console.log(propids);

            // $.each(subscriptions, function (key, value) {
            //     let lii = "";
            //     $.each(value.properties, function (key, value) {
            //         if ($.inArray(value.pivot.subsproperty_id, propids) !== -1) {
            //             lii +=
            //                 '<li><i class="fa fa-check-circle fa-1x text-success"></i>&nbsp;' +
            //                 value.name +
            //                 "</li>";
            //         } else {
            //             lii += "<li class='text-center'>&times;</li>";
            //         }
            //     });
            //     plan +=
            //         '<div class="col-xl-4 col-lg-4 col-md-12"><div class="pricing-1 plan"><div class="plan-header"><h5>' +
            //         value.name +
            //         "</h5><p>" +
            //         value.description +
            //         '</p><div class="plan-price"><sup>Kes</sup>' +
            //         value.cost +
            //         "<span>/" +
            //         value.billingcycle +
            //         '</span> </div></div><div class="plan-list"><ul>' +
            //         lii +
            //         '</ul><div class="plan-button text-center"><a href="#" id="subscriptionSelect" data-bs-toggle="modal" data-bs-target="#" class="btn btn-success btn-sm" data-id="' +
            //         value.id +
            //         '">Get Started</a></div></div></div></div>';
            // });
            $("#planSubsSummary").append(plan);

            $("#subscriptionprops").html(li);
        });
    }

    getSubscriptionsSummary();


    // $("body").on("click", "#subscriptionSelect", function (event) {
    //     event.preventDefault();
    //     $("#subscriptionOverviewModalLabel").html(
    //         '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //     );
    //     $("#subscriptiondescription").html(
    //         '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //     );
    //     $("#subscriptiondetails").html(
    //         '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //     );
    //     $("#subscriptionPrice").html(
    //         '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //     );
    //     let plan_id = $(this).data("id");
    //     $.getJSON("/subscriptions/" + plan_id, function (subscription) {
    //         $("#subscriptionForPaymentID").val(subscription.id);
    //         let header =
    //                 '<h4 class="text-black">' + subscription.name + "</h4>",
    //             description = "",
    //             token = $("#paymentForm").find("input[name='_token']").val(),
    //             pricesection = "",
    //             price = subscription.cost !== "free" ? subscription.cost : 0;

    //         pricesection +=
    //             '<div class="social-list text-center"><h3>Kes: <span class="text-success">' +
    //             price +
    //             "</span></h3></div>";
    //         $("#subscriptionOverviewModalLabel").html(header);
    //         $.each(subscription.properties, function (key, value) {
    //             description +=
    //                 '<p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;' +
    //                 value.name +
    //                 "</p>";
    //         });

    //         $("#subscriptiondescription").text(subscription.description);
    //         $("#subscriptiondetails").html(description);
    //         $("#subscriptiondetails").append(pricesection);
    //         $("#subscriptionPrice").val(price);

    //         if (parseFloat(subscription.cost) <= 0) {
    //             $("#mpesa-submit-button").prop("disabled", true);
    //             $(".loadersection").html(
    //                 '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
    //             );
    //             let user_id = $("#subscriberID"),
    //                 dealer_id = $("#dealerID"),
    //                 subscription_id = subscription.id;
    //             let data = {
    //                 _token: token,
    //                 user_id: user_id,
    //                 dealer_id: dealer_id,
    //                 subscription_id: subscription_id,
    //             };

    //             $.post("/subscribe", data)
    //                 .done(function (params) {
    //                     console.log(params);
    //                     $("#mpesa-submit-button").prop("disabled", true);
    //                     let result = JSON.parse(params);
    //                     if (result.status === "success") {
    //                     }
    //                 })
    //                 .fail(function (error) {
    //                     $("#mpesa-submit-button").prop("disabled", true);
    //                     console.error(error);
    //                 });
    //         }
    //     });
    // });

    $("#mpesaPaymentForm").on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            subscription_id = $("#subscriptionForPaymentID").val(),
            user_id = $("#subscriberID").val(),
            dealer_id = $("#dealerID").val(),
            phonenumber = $("#phoneNumber").val(),
            errors = [],
            token = $(this).find("input[name='_token']").val(),
            submit = $this.find('button[type="submit"]');
        submit.prop("disabled", true);

        let data = {
            _token: token,
            subscription_id: subscription_id,
            user_id: user_id,
            dealer_id: dealer_id,
            phonenumber: phonenumber,
            type: "Mpesa",
        };
        if (
            phonenumber == null ||
            phonenumber == undefined ||
            phonenumber == ""
        ) {
            errors.push("Phone number is rrequired");
        }
        if (errors.length > 0) {
            let p = "";
            $.each(errors, function (key, value) {
                p += "<p>" + value + "</p>";
            });
            showError(p, "#paymentfeedbac");
        } else {
            $(".loadersection").html(
                '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
            );

            $.post("/payments", data)
                .done(function (params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#paymentfeedback");
                        window.setInterval(() => {
                            $.getJSON(
                                "/paymentconfirm/" + result.checkoutid,
                                function (payment) {
                                    if (
                                        payment.complete === 1 &&
                                        payment.trans_id !== null
                                    ) {
                                        showSuccess(
                                            "Thank you. Payment received successfully. Please proceed to enjoy unleaded advertisement experience on our platform.",
                                            "#paymentfeedback"
                                        );
                                        let attempts = 0
                                        $(".loadersection").children().remove();
                                        submit.prop({ disabled: false });
                                        setTimeout(() => {
                                            attempts += 1;
                                            window.location.href = "/dealers";
                                        }, 3000);
                                        console.log(attempts);
                                        if (attempts >= 5) {
                                            $(".loadersection").children().remove();
                                            submit.prop("disabled", false);
                                            showError(
                                                "We have received 0 from you. Please click on this button and retry",
                                                "#paymentfeedback"
                                            );
                                            return false;
                                        }
                                    }
                                }
                            );
                        }, 7000);
                    } else {
                        $(".loadersection").children().remove();
                        submit.prop({ disabled: false });
                        showError(result.message, "#paymentfeedback");
                    }
                })
                .fail(function (error) {
                    console.log(error);
                    submit.prop({ disabled: false });
                    $(".loadersection").children().remove();
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#paymentfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#paymentfeedback"
                        );
                    }
                });
        }
    });

    // paypal.Buttons({
        // Order is created on the server and the order id is returned
            // createOrder() {
            //     return fetch("/my-server/create-paypal-order", {
            //         method: "POST",
            //         headers: {
            //             "Content-Type": "application/json",
            //             ''
            //         },
            //         // use the "body" param to optionally pass additional order information
            //         // like product skus and quantities
            //         body: JSON.stringify({
            //             cart: [
            //                 {
            //                     sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
            //                     quantity: 1,
            //                 },
            //             ],
            //         }),
            //     })
            //         .then((response) => response.json())
            //         .then((order) => order.id);
            // },
            // // Finalize the transaction on the server after payer approval
            // onApprove(data) {
            //     return fetch("/my-server/capture-paypal-order", {
            //         method: "POST",
            //         headers: {
            //             "Content-Type": "application/json",
            //         },
            //         body: JSON.stringify({
            //             orderID: data.orderID,
            //         }),
            //     })
            //         .then((response) => response.json())
            //         .then((orderData) => {
            //             // Successful capture! For dev/demo purposes:
            //             console.log(
            //                 "Capture result",
            //                 orderData,
            //                 JSON.stringify(orderData, null, 2)
            //             );
            //             const transaction =
            //                 orderData.purchase_units[0].payments.captures[0];
            //             alert(
            //                 `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
            //             );
            //             // When ready to go live, remove the alert and show a success message within this page. For example:
            //             // const element = document.getElementById('paypal-button-container');
            //             // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            //             // Or go to another URL:  window.location.href = 'thank_you.html';
            //         });
            // },
        // })
        // .render("#paypal-button-container");
})();
