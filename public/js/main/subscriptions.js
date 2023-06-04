(function () {
    function getSubscriptions() {
        $.when(
            $.getJSON("/subscriptions"),
            $.getJSON("/subscription-features")
        ).done(function (subscriptions, features) {
            if (subscriptions.length > 0) {
                let plan = "",
                    propids = [];
                $.each(subscriptions[0], function (key, value) {
                    let li = "";
                    $.each(value.properties, function (key, value) {
                        propids.push(value.id);
                    });
                    $.each(features[0], function (key, value) {
                        if ($.inArray(value.id,propids) !== -1) {
                            li +=
                                '<li><i class="fa fa-thumbs-up text-success"></i>&nbsp;' +
                                value.name +
                                "</li>";
                        } else {
                            li +=
                                '<li><i class="fa fa-thumbs-down text-danger"></i>&nbsp;' +
                                value.name +
                                "</li>";
                        }
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
                        '</ul><div class="plan-button text-center"><a href="#" class="btn pricing-btn">Get Started</a></div></div></div></div>';
                });
                $("#plansSection").html(plan);
            }
        });
    }

    getSubscriptions();
})();
