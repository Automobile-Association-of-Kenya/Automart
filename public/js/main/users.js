(function () {
    let usersTableSection = $("#usersTableSection"),
        createUserForm = $("#createUserForm"),
        userName = $("#userName"),
        userEmail = $("#userEmail"),
        userPhone = $("#userPhone"),
        altUserPhone = $("#altUserPhone"),
        userRole = $("#userRole"),
        saveuser = $("#saveuser"),
        clearuser = $("#clearuser"),
        userCreateID = $("#userCreateID"),
        createDealerForm = $("#createDealerForm"),
        dealerCreateID = $("#dealerCreateID"),
        dealerName = $("#dealerName"),
        dealerEmail = $("#dealerEmail"),
        dealerPhone = $("#dealerPhone"),
        altDealerPhone = $("#altDealerPhone"),
        dealerAddress = $("#dealerAddress"),
        dealerUserID = $("#dealerUserID"),
        createPartnerForm = $("#createPartnerForm"),
        partnerCreateID = $("#partnerCreateID"),
        partnerName = $("#partnerName"),
        partnerEmail = $("#partnerEmail"),
        partnerPhone = $("#partnerPhone"),
        altPartnerPhone = $("#altPartnerPhone"),
        partnerAddress = $("#partnerAddress"),
        partnerUserID = $("#partnerUserID");

    function getUsers() {
        $.getJSON("/list", function (users) {
            let tr = "",
                i = 1,
                dealeroption = "<option value=''>Select one</option>",
                partneroption = "<option value=''>Select one</option>";
            $.each(users, function (key, value) {
                let { id, name, email, phone, alt_phone, role, created_at } =
                    value;
                if (role === "dealer") {
                    dealeroption +=
                        "<option value=" + id + ">" + name + "</option>";
                }
                if (role === "partner") {
                    partneroption +=
                        "<option value=" + id + ">" + name + "</option>";
                }
                let date = moment(new Date(created_at));

                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    name +
                    "</td><td>" +
                    email +
                    "</td><td>" +
                    phone +
                    "</td><td>" +
                    alt_phone +
                    "</td><td>" +
                    role +
                    "</td><td>" +
                    date.format("D MMM, YYYY") +
                    '</td><td><a href="#" id="editUserToggle" data-id=' +
                    id +
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteUserToggle" data-id=' +
                    id +
                    '><i class="fa fa-trash text-danger"></i></a></td></tr>';
            });
            let table =
                '<table class="usersDataTable"><thead><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Alt phone</th><th>Role</th><th>Joined on</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            usersTableSection.html(table);
            dealerUserID.html(dealeroption);
            partnerUserID.html(partneroption);

            if ($.fn.DataTable.isDataTable(".usersDataTable")) {
                $(".usersDataTable").destroy();
                $(".usersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                    ],
                });
            } else {
                $(".usersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                    ],
                });
            }
        });
    }

    getUsers();

    function getDealers() {
        $.getJSON("/dealers-get", function (dealers) {
            let tr = "",
                i = 1;
            $.each(dealers, function (key, value) {
                let {
                    id,
                    name,
                    email,
                    phone,
                    alt_phone,
                    address,
                    vehicles_count,
                    users,
                    created_at,
                } = value;
                // let user = (users[0] !== null && users[0] !== undefined) ? users[0].name : "";
                {
                    /* <td>" + user + '"</td>; */
                }
                tr +=
                    "<tr><td>" +
                    id +
                    "</td><td>" +
                    name +
                    "</td><td>" +
                    email +
                    "</td><td>" +
                    phone +
                    "</td><td>" +
                    alt_phone +
                    "</td><td>" +
                    address +
                    "</td><td>" +
                    vehicles_count +
                    "</td><td>" +
                    moment(created_at).format("D MMM, YYYY H:mm:s") +
                    '</td><td><a href="#" id="editDealerToggle" data-id=' +
                    id +
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteDealerToggle" data-id=' +
                    id +
                    '><i class="fa fa-trash text-danger"></i></a></td></tr>';
            });
            let table =
                '<table class="dealersDataTable"><thead><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Alt Phone</th><th>Address</th><th>Vehicles</th><th>Created</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#dealersTableSection").html(table);

            if ($.fn.DataTable.isDataTable(".dealersDataTable")) {
                $(".dealersDataTable").destroy();
                $(".dealersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                    ],
                });
            } else {
                $(".dealersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Vehicle Dealers",
                            titleAttr: "Automart Vehicle Dealers",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            },
                        },
                    ],
                });
            }
        });
    }

    getDealers();

    function getPartners() {
        $.getJSON("/partners", function (partners) {
            console.log(partners);
            let tr = "",
                i = 1;
            $.each(partners, function (key, value) {
                let { id, name, email, phone, alt_phone, address, users } =
                    value;
                // let user = (users[0] !== null && users[0] !== undefined) ? users[0].name : "";
                {
                    /* <td>" + user + '"</td>; */
                }
                tr +=
                    "<tr><td>" +
                    id +
                    "</td><td>" +
                    name +
                    "</td><td>" +
                    email +
                    "</td><td>" +
                    phone +
                    "</td><td>" +
                    alt_phone +
                    "</td><td>" +
                    address +
                    '</td><td><a href="#" id="editPartnerToggle" data-id=' +
                    id +
                    '><i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deletePartnerToggle" data-id=' +
                    id +
                    '><i class="fa fa-trash text-danger"></i></a></td></tr>';
            });
            let table =
                '<table class="partnersDataTable"><thead><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Alt Phone</th><th>Address</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#partnerTableSection").html(table);

            if ($.fn.DataTable.isDataTable(".partnersDataTable")) {
                $(".partnersDataTable").destroy();
                $(".partnersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                    ],
                });
            } else {
                $(".partnersDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "excel",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "csv",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                        {
                            extend: "pdf",
                            filename: "Automart Partners",
                            titleAttr: "Automart Partners",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                        },
                    ],
                });
            }
        });
    }

    getPartners();

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
    createUserForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            user_id = userCreateID.val(),
            name = userName.val(),
            email = userEmail.val(),
            phone = userPhone.val(),
            role = userRole.val(),
            alt_phone = altUserPhone.val(),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("input[type='submit']");
        let data = {
            user_id: user_id,
            name: name,
            email: email,
            phone: phone,
            role: role,
            alt_phone: alt_phone,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });

        $.ajax({
            type: "POST",
            url: "/users",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#usersfeedback");
                    userCreateID.val("");
                    $this.trigger("reset");
                    getUsers();
                } else {
                    showError(result.error, "#usersfeedback");
                }
                submit.prop({ disabled: false });
            },

            error: function (error) {
                console.error(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#usersfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#usersfeedback"
                    );
                }
                submit.prop({ disabled: false });
            },
        });
    });

    clearuser.on("click", function (event) {
        event.preventDefault();
        userCreateID.val("");
        userName.val("");
        userEmail.val("");
        userPhone.val("");
        userRole.val("");
        altUserPhone.val("");
    });

    $("body").on("click", "#editUserToggle", function (event) {
        event.preventDefault();
        let user_id = $(this).data("id");
        if (user_id !== null && user_id !== "") {
            $.getJSON("/list/" + user_id, function (users) {
                if (users.length > 0) {
                    let user = users[0];
                    showSuccess(
                        "User accepted for edit. Make changes then save",
                        "#usersfeedback"
                    );
                    userCreateID.val(user.id);
                    userName.val(user.name);
                    userEmail.val(user.email);
                    userPhone.val(user.phone);
                    altUserPhone.val(user.alt_phone);
                    $("#userRole option[value='" + user.role + "']").prop(
                        "selected",
                        true
                    );
                } else {
                    showError(
                        "Error occurred during processing. Endure your connected to internet and retry.",
                        "#usersfeedback"
                    );
                }
            });
        }
    });

    createDealerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            dealer_id = dealerCreateID.val(),
            name = dealerName.val(),
            email = dealerEmail.val(),
            phone = dealerPhone.val(),
            alt_phone = altDealerPhone.val(),
            address = dealerAddress.val(),
            user_id = dealerUserID.val(),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("input[type='submit']");
        submit.prop({ disabled: true });
        let data = {
            dealer_id: dealer_id,
            name: name,
            email: email,
            phone: phone,
            alt_phone: alt_phone,
            address: address,
            user_id: user_id,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });
        $.ajax({
            type: "POST",
            url: "/admin-dealers",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#dealersfeedback");
                    dealerCreateID.val("");
                    $this.trigger("reset");
                    getDealers();
                } else {
                    showError(result.error, "#dealersfeedback");
                }
                submit.prop({ disabled: false });
            },

            error: function (error) {
                console.error(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#dealersfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#dealersfeedback"
                    );
                }
                submit.prop({ disabled: false });
            },
        });
    });

    $("#cleardealer").on("click", function (event) {
        event.preventDefault();
        createDealerForm.trigger("reset");
        dealerCreateID.val("");
    });

    $("body").on("click", "#editDealerToggle", function (event) {
        event.preventDefault();
        let dealer_id = $(this).data("id");
        console.log("there");
        if (dealer_id !== "" && dealer_id !== null) {
            $.getJSON("/admin-dealers/" + dealer_id, function (dealers) {
                console.log(dealers);
                let dealer = dealers[0];
                if (dealer !== null) {
                    dealerCreateID.val(dealer.id);
                    dealerName.val(dealer.name);
                    dealerEmail.val(dealer.email);
                    dealerPhone.val(dealer.phone);
                    altDealerPhone.val(dealer.alt_phone);
                    dealerAddress.val(dealer.address);
                    let user = dealer.users[0];
                    if (user !== null && user !== undefined) {
                        $("#dealerUserID option[value=" + user.id + "]").prop(
                            "selected",
                            true
                        );
                    }
                    showSuccess(
                        "Dealer accepted for editing. Please fill the form and save.",
                        "#dealersfeedback"
                    );
                } else {
                    showError(
                        "Error occured during processing. Ensure you have internet connection and retry",
                        "#dealersfeedback"
                    );
                }
            });
        }
    });
    // editPartnerToggle;
    $("body").on("click", "#editPartnerToggle", function (event) {
        event.preventDefault();
        let partner_id = $(this).data("id");

        if (partner_id !== "" && partner_id !== null) {
            $.getJSON("/partners/" + partner_id, function (partners) {
                console.log(partners);
                let partner = partners[0];
                if (partner !== null) {
                    let { id, name, email, phone, alt_phone, address, users } =
                        partner;
                    partnerCreateID.val(id);
                    partnerName.val(name);
                    partnerEmail.val(email);
                    partnerPhone.val(phone);
                    altPartnerPhone.val(alt_phone);
                    partnerAddress.val(address);
                    let user = users[0];
                    if (user !== null && user !== undefined) {
                        $("#partnerUserID option[value=" + user.id + "]").prop(
                            "selected",
                            true
                        );
                    }
                    showSuccess(
                        "Dealer accepted for editing. Please fill the form and save.",
                        "#dealersfeedback"
                    );
                } else {
                    showError(
                        "Error occured during processing. Ensure you have internet connection and retry",
                        "#dealersfeedback"
                    );
                }
            });
        }
    });

    createPartnerForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            partner_id = partnerCreateID.val(),
            name = partnerName.val(),
            email = partnerEmail.val(),
            phone = partnerPhone.val(),
            alt_phone = altPartnerPhone.val(),
            address = partnerAddress.val(),
            user_id = partnerUserID.val(),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("input[type='submit']");

        submit.prop({ disabled: true });
        let data = {
            partner_id: partner_id,
            name: name,
            email: email,
            phone: phone,
            alt_phone: alt_phone,
            address: address,
            user_id: user_id,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": token,
            },
        });

        $.ajax({
            type: "POST",
            url: "/partners",
            data: data,
            success: function (params) {
                console.log(params);
                let result = JSON.parse(params);
                if (result.status == "success") {
                    showSuccess(result.message, "#partnersfeedback");
                    partnerCreateID.val("");
                    $this.trigger("reset");
                    getPartners();
                } else {
                    showError(result.error, "#partnersfeedback");
                }
                submit.prop({ disabled: false });
            },

            error: function (error) {
                console.error(error);
                if (error.status == 422) {
                    var errors = "";
                    $.each(error.responseJSON.errors, function (key, value) {
                        errors += value + "!";
                    });
                    showError(errors, "#partnersfeedback");
                } else {
                    showError(
                        "Error occurred during processing",
                        "#partnersfeedback"
                    );
                }
                submit.prop({ disabled: false });
            },
        });
    });
})();
