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
        adsLimit = $("#adsLimit"),
        billingCycle = $("#billingCycle"),
        createSubscriptionForm = $("#createSubscriptionForm"),
        subsDescription = $("#subsDescription"),
        _token = $("input[name=_token]").val(),
        subscriptionType = $("#subscriptionType");

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
        $.getJSON("/subscriptions", function (data) {
            let subscriptions = data.subscriptions;
            if (subscriptions.length > 0) {
                let tr = "",
                    i = 1;
                $.each(subscriptions, function (key, value) {
                    let {
                        id,
                        name,
                        type,
                        priority,
                        cost, ads_limit,
                        billingcycle,
                        properties,
                    } = value;
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
                        type +
                        "</td><td>" +
                        priority +
                        "</td><td>" +
                        toMoney(cost) +
                        "</td><td>" +
                        ads_limit +
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
            type = subscriptionType.val(),
            priority = subPriority.val(),
            cost = subCost.val(),
            ads_limit = adsLimit.val(),
            billingcycle = billingCycle.val(),
            submit = $(this).find("button[type='submit']"),
            properties = [],
            description = subsDescription.val(),
            $this = $(this);
        submit.prop("disabled", true);
        $(".subsproperty").each(function (input) {
            if ($(this).is(":checked")) {
                properties.push(parseInt($(this).val()));
            }
        });

        let data = {
            subscription_id: subscription_id,
            name: name,
            priority: priority,
            cost: cost,
            ads_limit:ads_limit,
            billingcycle: billingcycle,
            properties: properties,
            description: description,
            type: type,
        };

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
                let result = JSON.parse(params);
                submit.prop("disabled", false);
                if (result.status == "success") {
                    createSubscriptionForm.trigger("reset");
                    showSuccess(result.message, "#subscriptionfeedback");
                    $this.trigger("reset");
                    subscriptionID.val("");
                    getSubscriptions();
                } else {
                    showError(
                        "Error occured during processing",
                        "#subscriptionfeedback"
                    );
                }
            },
            error: function (error) {
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
                    subscriptionID.val(subscription.id);
                    subscriptionName.val(subscription.name);
                    subsDescription.val(subscription.description);
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
                let result = JSON.parse(params);
                if (result.status == "success") {
                    $this.trigger("reset");
                    showSuccess(result.message, "#mailsfeedback");
                    getMailLists();
                } else {
                    showError(
                        "Error occured during processing",
                        "#mailsfeedback"
                    );
                }
            },
            error: function (error) {
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

    $("body").on("click", "#editMailToggle", function (event) {
        event.preventDefault();
        let mail_id = $(this).data("id");
        if (mail_id !== null && mail_id !== undefined) {
            $.getJSON("/mails/" + mail_id, function (mail) {
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
                } = mail[0];
                $("#mailUsage option[value=" + usage + "]").prop(
                    "selected",
                    true
                );
                mailHost.val(host);
                mailEmail.val(address);
                mailPassword.val(password);
                secureProtocol.val(protocol);
                mailPort.val(port);
                mailCreateID.val(id);
            });
        }
    });

    let servicesTable = $("#servicesTable"),
        createServiceForm = $("#createServiceForm"),
        serviceCreateID = $("#serviceCreateID"),
        serviceName = $("#serviceName"),
        serviceDescription = $("#serviceDescription"),
        serviceCaret = $("#serviceCaret"),
        saveservice = $("#saveservice"),
        clearserviceform = $("#clearserviceform");

    createServiceForm.on("submit", function (event) {
        event.preventDefault();
        let service_id = serviceCreateID.val(),
            service = serviceName.val(),
            description = serviceDescription.val(),
            caret = serviceCaret.val(),
            errors = [],
            $this = $(this),
            _token = $this.find("input[name='_token']").val();

        saveservice.prop("disabled", true);

        if (service == null || service == "") {
            errors.push("Service name is required");
        }
        if (description == null || description == "") {
            errors.push("Description is required");
        }

        if (errors.length > 0) {
            let p = "";
            $.each(errors, (key, value) => {
                p == "<p>" + value + "</p>";
            });
            showError(p, "#servicesfeedback");
        } else {
            let data = {
                service_id: service_id,
                service: service,
                description: description,
                caret: caret,
            };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": _token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/services",
                data: data,
                success: function (params) {
                    saveservice.prop("disabled", false);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        serviceCreateID.val("");
                        $this.trigger("reset");
                        showSuccess(result.message, "#servicesfeedback");
                        getServices();
                    } else {
                        showError(
                            "Error occured during processing",
                            "#servicesfeedback"
                        );
                    }
                },
                error: function (error) {
                    saveservice.prop("disabled", false);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#servicesfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#servicesfeedback"
                        );
                    }
                },
            });
        }
    });

    function getServices() {
        $.getJSON("/services-get", function (services) {
            let tr = "",
                i = 1;
            $.each(services, function (key, value) {
                let { id, service, description, caret } = value;
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    service +
                    "</td><td>" +
                    description +
                    "</td><td>" +
                    caret +
                    '</td><td><a href="#" id="editServiceToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteServiceToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });
            servicesTable.html(tr);
        });
    }
    getServices();

    clearserviceform.on("click", function (event) {
        event.preventDefault();
        createServiceForm.trigger("reset");
        serviceCreateID.val("");
    });

    $("body").on("click", "#editServiceToggle", function (event) {
        let service_id = $(this).data("id");
        if (service_id !== null && service_id !== undefined) {
            $.getJSON("/services-get/" + service_id, function (service) {
                if (service.length > 0) {
                    serviceCreateID.val(service[0].id);
                    serviceName.val(service[0].service);
                    serviceDescription.val(service[0].description);
                    serviceCaret.val(service[0].caret);
                    showSuccess(
                        "Service accepted for processing",
                        "#servicesfeedback"
                    );
                } else {
                    showError(
                        "Error occured, endure you have internet connection, then retry",
                        "#servicesfeedback"
                    );
                }
            });
        }
    });

    let socialName = $("#socialName"),
        socialLink = $("#socialLink"),
        socialCreateID = $("#socialCreateID"),
        createSocialForm = $("#createSocialForm"),
        socialType = $("#socialType");
    createSocialForm.on("submit", function (event) {
        event.preventDefault();
        let name = socialName.val(),
            link = socialLink.val(),
            type = socialType.val(),
            social_id = socialCreateID.val(),
            $this = $(this);
        $.post("/socials", {
            _token: _token,
            social_id: social_id,
            name: name,
            type: type,
            link: link,
        })
            .done(function (params) {
                let result = JSON.parse(params);
                if (result.status === "success") {
                    getSocials();
                    socialCreateID.val("");
                    $this.trigger("reset");
                    showSuccess(result.message, "#socialfeedback");
                } else {
                    showError(
                        "Error occured during processing",
                        "#socialfeedback"
                    );
                }
            })
            .fail(function (error) {
                console.error(error);
                showError("Error occured during processing", "#socialfeedback");
            });
    });

    function getSocials() {
        $.getJSON("/socials", function (socials) {
            let tr = "",
                i = 1;
            $.each(socials, function (key, value) {
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    value.type +
                    "</td><td>" +
                    value.name +
                    "</td><td>" +
                    value.link +
                    '</td><td><a href="#" id="editSocialToggle" data-id=' +
                    value.id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteSocialToggle" data-id=' +
                    value.id +
                    '><i class="fas fa-trash text-danger"></i></a></tr>';
            });
            $("#socialTable").html(tr);
        });
    }

    getSocials();

    $("body").on("click", "#editSocialToggle", function (event) {
        let id = $(this).data("id");
        $.getJSON("/socials/" + id, function (social) {
            if (social.length > 0) {
                showSuccess(
                    "Request accepted for processing. Make changes then save",
                    "#socialfeedback"
                );
                $("#socialType option[value=" + social[0].type + "]").prop(
                    "selected",
                    true
                );
                socialCreateID.val(social[0].id);
                socialName.val(social[0].name);
                socialLink.val(social[0].link);
            } else {
                showError(
                    "Error occured during processing. Ensure you have internet connection then retry.",
                    "#socialfeedback"
                );
            }
        });
    });

    $("#clearsocial").on("click", function (event) {
        event.preventDefault();
        socialCreateID.val("");
        socialName.val("");
        socialLink.val("");
    });

    $("#sendRange").on("change", function (event) {
        let val = $(this).val();
        let recepient_type = $("#recepientType").val();
        if (val === "manual" && recepient_type === "customers") {
            $.getJSON("/admin/customers", function (customers) {
                let tr = "";
                $.each(customers, function (key, value) {
                    // let dealer = value.dealer?.name ?? "";
                    tr +=
                        "<tr data-id=" +
                        value.id +
                        "><td><input type='checkbox' id='selectedUser'></td><td>" +
                        value.name +
                        "</td><td>" +
                        value.email +
                        "</td><td>" +
                        value.phone +
                        "</td></tr>";
                });
                let table =
                    "<table class='table table-bordered table-sm'><thead style='position:sticky;'><th>#</th><th>User</th><th>Email</th><th>Phone</th></thead><tbody id='maualUsersSelect'>" +
                    tr +
                    "</tbody></table>";
                $("#mailingSections").html(table);
            });
        } else if (val === "manual" && recepient_type === "partners") {
            $.getJSON("/partners", function (partners) {
                let tr = "",
                    partner = value.partner?.name ?? "";
                $.each(partners, function (key, value) {
                    tr +=
                        "<tr data-id=" +
                        value.id +
                        "><td><input type='checkbox' id='selectedUser'></td><td>" +
                        value.name +
                        "</td><td>" +
                        value.email +
                        "</td><td>" +
                        value.phone +
                        "</td><td>" +
                        partner +
                        "</td></tr>";
                });
                let table =
                    "<table class='table table-bordered table-sm'><thead><th>#</th><th>User</th><th>Email</th><th>Phone</th><th>Dealer</th></thead><tbody>" +
                    tr +
                    "</tbody></table>";
                $("#mailingSections").html(table);
            });
        }
    });

    let sendMailForm = $("#sendMailForm"),
        sendMailUsage = $("#sendMailUsage"),
        recepientType = $("#recepientType"),
        sendRange = $("#sendRange"),
        mailMessage = $("#mailMessage");
    sendMailForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this), usage = sendMailUsage.val(),
            recipient_type = recepientType.val(),
            sendrange = sendRange.val(),
            message = mailMessage.val(), token = $this.find("input[name='_token']").val(), users = [];
        if (sendrange == "manual") {
            $("#maualUsersSelect > tr").each(function (row) {
                if ($(row).children().find("#selectedUser").is(':checked')) {
                    console.log($(row).find("#selectedUser").is(":checked"));
                    users.push($(row).children().find("#selectedUser").data('id'));
                }
            });
        }
        let data = {
            _token: token,
            usage: usage,
            recipient_type: recipient_type,
            sendrange: sendrange,
            message: message,
            users: users,
        };
        console.log(data);
        $.post('/bulk-mail').done(function(params) {
            console.log(params);
        }).fail(function (error) {
            console.error(error);
        });

    });

    function toMoney(number) {
        let actul = parseFloat(number);
        return actul.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }

    // selectedUser;
})();
