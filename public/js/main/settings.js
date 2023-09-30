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
                        cost,
                        ads_limit,
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
                        '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteSubscriptionToggle" data-id=' +
                        id +
                        '><i class="fa fa-trash text-danger"></i></a></td></tr>';
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
            ads_limit: ads_limit,
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
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteMailToggle" data-id=' +
                    id +
                    '><i class="fa fa-trash text-danger"></i></a></td></tr>';
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
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteServiceToggle" data-id=' +
                    id +
                    '><i class="fa fa-trash text-danger"></i></a></td></tr>';
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
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteSocialToggle" data-id=' +
                    value.id +
                    '><i class="fa fa-trash text-danger"></i></a></tr>';
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

    $("body").on("click", "#deleteSocialToggle", function(event) {
        event.preventDefault();
        let social_id = $(this).data('id');
        if (social_id !== "") {
            $.post("/social-delete", { _token: $("input[name='_token']").val(), id: social_id})
                .done(function (params) {
                    let result = JSON.parse(params);
                    if (result.status === "success") {
                        getSocials();
                        showSuccess(result.message, "#socialfeedback");
                    } else {
                        showError(
                            "Error occured during processing",
                            "#socialfeedback"
                        );
                    }
                })
                .fail(function (error) {
                    showError(
                        "Error occured during processing",
                        "#socialfeedback"
                    );
                });
        }
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
                        "><td><input type='checkbox' name='selected_user' data-value=" +
                        value.id +
                        "></td><td>" +
                        value.name +
                        "</td><td>" +
                        value.email +
                        "</td><td>" +
                        value.phone +
                        "</td></tr>";
                });
                let table =
                    "<table class='table table-bordered table-sm'><thead style='position:sticky;'><th>#</th><th>User</th><th>Email</th><th>Phone</th></thead><tbody id='manualUsersSelect'>" +
                    tr +
                    "</tbody></table>";
                $("#mailingSections").html(table);
            });
        } else if (val === "manual" && recepient_type === "partners") {
            $.getJSON("/partners", function (partners) {
                let tr = "";
                $.each(partners, function (key, value) {
                    var partner = value.partner?.name ?? "";
                    tr +=
                        "<tr data-id=" +
                        value.id +
                        "><td><input type='checkbox' name='selected_user'></td><td>" +
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

    $("#emailAttachements").on("change", function () {
        const files = $("#emailAttachements")[0].files;
        const allowedTypes = ["image/jpeg", "image/png"]; // Add other allowed MIME types here
        const maxFileSize = 5 * 1024 * 1024;
        const errorMessages = [];
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!allowedTypes.includes(file.type)) {
                errorMessages.push(
                    `File "${file.name}" is not an allowed type.`
                );
            }
            if (file.size > maxFileSize) {
                errorMessages.push(
                    `File "${file.name}" exceeds the maximum size of 5 MB.`
                );
            }
        }
        const errorMessageContainer = $("#errorMessages");
        if (errorMessages.length > 0) {
            errorMessageContainer.html("");
            $("#emailAttachements").val("");
            errorMessageContainer.html(errorMessages.join("<br>"));
        }
    });

    let sendMailForm = $("#sendMailForm"),
        sendMailUsage = $("#sendMailUsage"),
        recepientType = $("#recepientType"),
        sendRange = $("#sendRange"),
        mailSubject = $("#mailSubject"),
        mailMessage = $("#mailMessage");
    sendMailForm.on("submit", function (event) {
        $(".lds-roller").show();
        event.preventDefault();
        $("#sendmail").prop("disabled", true);
        let $this = $(this),
            usage = sendMailUsage.val(),
            recipient_type = recepientType.val(),
            sendrange = sendRange.val(),
            message = mailMessage.val(),
            subject = mailSubject.val(),
            token = $this.find("input[name='_token']").val(),
            users = [];
        var formData = new FormData();

        if (sendrange == "manual") {
            $("input[name='selected_user']:checked").each(function (
                key,
                checkbox
            ) {
                formData.append("users[]", $(checkbox).data("value"));
            });
        }

        var files = $("#emailAttachements")[0].files;
        for (var i = 0; i < files.length; i++) {
            formData.append("attachments[]", files[i]);
        }
        formData.append("usage", usage);
        formData.append("recipient_type", recipient_type);
        formData.append("sendrange", sendrange);
        formData.append("message", message);
        formData.append("subject", subject);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });

        $.ajax({
            type: "POST",
            url: "/bulk-mail",
            data: formData,
            processData: false,
            contentType: false,
            success: function (params) {
                console.log(params);
                $(".lds-roller").hide();
                $("#sendmail").prop("disabled", false);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#mailfeedback");
                    $this.trigger("reset");
                } else {
                    showError(result.error, "#mailfeedback");
                }
            },
            error: function (error) {
                console.error(error);
                $(".lds-roller").hide();
                $("#sendmail").prop("disabled", false);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#mailfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#mailfeedback"
                    );
                }
            },
        });
    });

    function toMoney(number) {
        let actul = parseFloat(number);
        return actul.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }

    function getVisits() {
        let start_date = $("#startDate").val(), end_date = $('#endDate').val();
        $.getJSON("/visits/" + start_date+"/"+end_date, function (visitors) {
            let tr = "",
                i = 1;
            $.each(visitors, function (key, value) {
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    value.url +
                    "</td><td>" +
                    value.user_agent +
                    "</td><td>" +
                    value.platform +
                    "</td><td>" +
                    moment(value.created_at).format("D MMM, YYYY H:mm:s") +
                    "</td></tr>";
            });
            let table =
                "<table class='table table-bordered table-sm' id='visitstable'><thead><th>#</th><th>Page</th><th>Origin</th><th>Device</th><th>Visited at</th></thead><tbody>" +
                tr +
                "</tbody></table>";
            $("#visitsSection").html(table);
            if ($.fn.DataTable.isDataTable("#visitstable")) {
                $("#visitstable").destroy();
                $("#visitstable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Visitors",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart_isitors_csv",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Visitors",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                    ],
                });
            } else {
                $("#visitstable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Visitors",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart_visitors_csv",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Visitors",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4],
                            },
                        },
                    ],
                });
            }
        });
    }
    // getVisits();

    $("#filterVisitorsForm").on('submit', function(event) {
        event.preventDefault();
        console.log("teher");
        getVisits();
    });

})();
