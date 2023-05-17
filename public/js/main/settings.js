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

    let subscriptionsTableSection = $("#subscriptionsTableSection"),
        subscriptionID = $("#subscriptionID"),
        subscriptionName = $("#subscriptionName"),
        subPriority = $("#subPriority"),
        subCost = $("#subCost"),
        billingCycle = $("#billingCycle"),
        createSubscriptionForm = $("#createSubscriptionForm"),
        _token = $("input[name=_token]").val();

    let subscriptionPropertiesList = $("#subscriptionPropertiesList"),
        subsPropInput = $("#subsPropInput"),
        subsPropsAdd = $("#subsPropsAdd");
    subsPropsAdd.on("click", function (event) {
        event.preventDefault();
        subspropname = subsPropInput.val();
        if (subspropname !== "" && subspropname !== null) {
            $.post("/subscription-prop-create", {
                _token: _token,
                name: subspropname,
            }).done(function (params) {
                let result = JSON.parse(params);
                if (result.status === "success") {
                    li =
                        "<li class='list-item'><label class='custom-control custom-radio'><input type='checkbox' checked value=" +
                        result.property.id +
                        ' class="subsproperty" name="subsproperty"><span>&nbsp;&nbsp;&nbsp;' +
                        result.property.name +
                        "</span></label></li>";
                    subscriptionPropertiesList.append(li);
                    subsPropInput.val("");
                }
            });
        }
    });

    function getSubscriptions() {
        $.getJSON("/subscriptions", function (subscriptions) {
            if (subscriptions.length > 0) {
                let tr = "",
                    i = 1;
                $.each(subscriptions, function (key, value) {
                    let { id, name, priority, cost, billingcycle, properties } =
                        value;
                    let td = "",
                        j = 1;
                    properties.forEach((element) => {
                        td +=
                            "<span>" +
                            j++ +
                            ".&nbsp;" +
                            element.name +
                            "</span><br>";
                    });

                    tr +=
                        "<tr><td>" +
                        i++ +
                        "</td><td>" +
                        name +
                        "</td><td>" +
                        priority +
                        "</td><td>" +
                        cost +
                        "</td><td>" +
                        billingcycle +
                        "</td><td>" +
                        td +
                        '</td><td><a href="#" id="editSubscriptionToggle" data-id=' +
                        id +
                        '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteSubscriptionToggle" data-id=' +
                        id +
                        '><i class="fas fa-trash text-danger"></i></a></td></tr>';
                });

                $("#subscriptionTable").html(tr);
            }
        });
    }

    getSubscriptions();

    function getSubsProperties() {
        $.getJSON("/get-subs-props", function (props) {
            var li = "";
            $.each(props, function (key, value) {
                li +=
                    "<li class='list-item'><label class='custom-control custom-radio'><input type='checkbox' value=" +
                    value.id +
                    ' class="subsproperty" name="subsproperty"><span>&nbsp;&nbsp;&nbsp;' +
                    value.name +
                    "</span></label></li>";
            });
            subscriptionPropertiesList.html(li);
        });
    }

    getSubsProperties();

    createSubscriptionForm.on("submit", function (event) {
        event.preventDefault();
        let subscription_id = subscriptionID.val(),
            name = subscriptionName.val(),
            priority = subPriority.val(),
            cost = subCost.val(),
            billingcycle = billingCycle.val(),
            submit = $(this).find("button[type='submit']"),
            properties = [];
        submit.prop("disabled", true);
        $(".subsproperty").each(function (input) {
            if ($(this).is(":checked")) {
                properties.push($(this).val());
            }
        });

        let data = {
            subscription_id: subscription_id,
            name: name,
            priority: priority,
            cost: cost,
            billingcycle: billingcycle,
            properties: properties,
        };
        // console.log(data);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": _token,
            },
        });
        $.ajax({
            url: "/subscriptions",
            type: "POST",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                submit.prop("disabled", false);
                if (result.status == "success") {
                    createSubscriptionForm.trigger("reset");
                    showSuccess(result.message, "#subscriptionfeedback");
                    getSubscriptions();
                } else {
                    showError(
                        "Error occured during processing",
                        "#subscriptionfeedback"
                    );
                }
            },
            error: function (error) {
                console.log(error);
                submit.prop("disabled", false);

                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#subscriptionfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#subscriptionfeedback"
                    );
                }
            },
        });
    });

    $("body").on("click", "#editSubscriptionToggle", function (event) {
        event.preventDefault();
        let subscription_id = $(this).data("id");
        if (subscription_id !== null && subscription_id !== undefined) {
            $.getJSON(
                "/subscriptions/" + subscription_id,
                function (subscription) {
                    console.log(subscription);
                    subscriptionID.val(subscription.id);
                    subscriptionName.val(subscription.name);
                    $(
                        "#subPriority option[value=" +
                            subscription.priority +
                            "]"
                    ).prop("selected", true);
                    subCost.val(subscription.cost);
                    $(
                        "#billingCycle option[value=" +
                            subscription.billingcycle +
                            "]"
                    ).prop("selected", true);

                    let subsprops = [];

                    $.each(subscription.properties, function (key, value) {
                        subsprops.push(value.id);
                    });
                    $(".subsproperty").each(function (key, input) {
                        let value = parseInt($(input).val());
                        $(input).prop("checked", false);
                        if ($.inArray(value, subsprops) !== -1) {
                            $(input).prop("checked", true);
                        }
                    });
                }
            );
        }
    });

    function getMailLists() {
        $.getJSON("/mails", function (mails) {
            let tr = "",
                i = 1;
            $.each(mails, function (key, value) {
                let {
                    usage,
                    host,
                    address,
                    password,
                    protocol,
                    port,
                    status,
                    active,
                    id,
                } = value;
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    usage +
                    "</td><td>" +
                    host +
                    "</td><td>" +
                    address +
                    "</td><td>" +
                    password +
                    "</td><td>" +
                    protocol +
                    "</td><td>" +
                    port +
                    "</td><td>" +
                    status +
                    "</td><td>" +
                    active +
                    '</td><td><a href="#" id="editMailToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteMailToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });

            $("#mailsTable").html(tr);
        });
    }

    getMailLists();

    let createMailForm = $("#createMailForm"),
        mailUsage = $("#mailUsage"),
        mailHost = $("#mailHost"),
        mailEmail = $("#mailEmail"),
        mailPassword = $("#mailPassword"),
        secureProtocol = $("#secureProtocol"),
        mailPort = $("#mailPort"),
        mailCreateID = $("#mailCreateID");
    createMailForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            usage = mailUsage.val(),
            host = mailHost.val(),
            address = mailEmail.val(),
            password = mailPassword.val(),
            protocol = secureProtocol.val(),
            port = mailPort.val(),
            mail_id = mailCreateID.val();
        let data = {
            mail_id: mail_id,
            usage: usage,
            host: host,
            address: address,
            password: password,
            protocol: protocol,
            port: port,
            status: "default",
        };
        console.log(data);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": _token,
            },
        });
        $.ajax({
            type: "POST",
            url: "/mails",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#mailsfeedback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#mailsfeedback"
                    );
                }
            },
            error: function (error) {
                console.log(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#mailsfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#mailsfeedback"
                    );
                }
            },
        });
    });
})();
