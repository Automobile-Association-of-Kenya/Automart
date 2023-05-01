(function () {
    let addNewVehicle = $("#addNewVehicle"),
        newVehicleForm = $("#newVehicleForm"),
        vehicleDealer = $("#vehicleDealer"),
        vehicleType = $("#vehicleType"),
        vehicleMake = $("#vehicleMake"),
        vehicleModel = $("#vehicleModel"),
        countryofOrigin = $("#countryofOrigin"),
        shippingTo = $("#shippingTo"),
        countyID = $("#countyID"),
        filterlistmake = $("#filterlistmake"),
        filterlistdealer = $("#filterlistdealer"),
        filterlistmodel = $("#filterlistmodel"),
        locationInput = $(".locationInput"),
        yardInput = $(".yardInput"),
        yardToggle = $("#yardToggle"),
        modelMakeID = $("#modelMakeID"),
        makeCreateForm = $("#makeCreateForm"),
        modelCreateForm = $("#modelCreateForm"),
        featureCreateForm = $("#featureCreateForm"),
        makeName = $("#makeName"),
        makeCreateID = $("#makeCreateID"),
        modelName = $("#modelName"),
        modelID = $("#modelID"),
        featureCreateID = $("#featureCreateID"),
        featureName = $("#featureName"),
        featureDescription = $("#featureDescription");

    yardInput.hide();

    addNewVehicle.on("click", function () {
        newVehicleForm.trigger("reset");
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

    function getDealers() {
        $.getJSON("/dealers", function (dealers) {
            var option = '<option value="0">Select One</option>';
            $.each(dealers, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleDealer.html(option);
            filterlistdealer.html(option);
            $("#dealerYardID").html(option);
        });
    }

    getDealers();

    function getVehicleTypes() {
        $.getJSON("/types", function (types) {
            var option = '<option value="0">Select One</option>';
            let tr = "",
                i = 1;
            $.each(types, (key, value) => {
                let { id, type } = value;
                option += "<option value=" + id + ">" + type + "</option>";
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    type +
                    '</td><td><a href="#" id="editTypeToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteTypeToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });
            vehicleType.html(option);
            let table =
                '<table class="hover typesDataTable"><thead><th>#</th><th>Type</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#typesSection").html(table);
            if ($.fn.DataTable.isDataTable(".typesDataTable")) {
                $(".typesDataTable").destroy();
                $(".typesDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            } else {
                $(".typesDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            }
        });
    }
    getVehicleTypes();

    function getVehicleMakes() {
        $.getJSON("/makes", function (makes) {
            var option = '<option value="0">Select One</option>',
                tr = "",
                i = 1;
            $.each(makes, (key, value) => {
                let { id, make } = value;
                option += "<option value=" + id + ">" + make + "</option>";
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    make +
                    '</td><td><a href="#" id="editMakeToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteMakeToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });
            vehicleMake.html(option);
            filterlistmake.html(option);
            modelMakeID.html(option);
            let table =
                '<table class="hover  makesDataTable"><thead><th>#</th><th>Make</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#makesTableSection").html(table);
            if ($.fn.DataTable.isDataTable(".makesDataTable")) {
                $(".makesDataTable").destroy();
                $(".makesDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            } else {
                $(".makesDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            }
            // $("#makesTableSection").DataTable();
        });
    }
    getVehicleMakes();

    function getCountries() {
        $.getJSON("/countries", function (countries) {
            var option = '<option value="0">Select One</option>';
            var option1 = '<option value="global">Global</option>';
            $.each(countries, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
                option1 += "<option value=" + id + ">" + name + "</option>";
            });
            countryofOrigin.html(option);
        });
    }

    getCountries();

    function getCounties(country_id) {
        $.getJSON("/counties/" + country_id, function (counties) {
            var option = '<option value="0">Select One</option>';
            $.each(counties, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            countyID.html(option);
        });
    }

    function getVehicleModels(make_id = null) {
        $.getJSON("/models/" + make_id, function (models) {
            var option = '<option value="0">Select One</option>',
                tr = "",
                i = "";
            $.each(models, (key, value) => {
                let { id, make, model } = value;
                option += "<option value=" + id + ">" + model + "</option>";

                if (make_id == null) {
                    tr +=
                        "<tr><td>" +
                        i++ +
                        "</td><td>" +
                        make.make +
                        "</td><td>" +
                        model +
                        '</td><td><a href="#" id="editModelToggle" data-id=' +
                        id +
                        '><i class="fas fa-edit text-warning" id="editVehicleModelToggle" data-id=' +
                        id +
                        '></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteModelToggle" data-id=' +
                        id +
                        '><i class="fas fa-trash text-danger"></i></a></td></tr>';
                }
            });
            vehicleModel.html(option);
            if (make_id == null) {
                let table =
                    "<table class='hover  modelsDataTable'><thead><th>#</th><th>Make</th><th>Model</th><th>Action</th></thead><tbody>" +
                    tr +
                    "</tbody></table>";
                $("#modelsTableSection").html(table);
                if ($.fn.DataTable.isDataTable(".modelsDataTable")) {
                    $(".modelsDataTable").destroy();
                    $(".modelsDataTable").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            "copyHtml5",
                            "excelHtml5",
                            "csvHtml5",
                            "pdfHtml5",
                        ],
                    });
                } else {
                    $(".modelsDataTable").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            "copyHtml5",
                            "excelHtml5",
                            "csvHtml5",
                            "pdfHtml5",
                        ],
                    });
                }
                // $("#Section").DataTable();
            }
        });
    }

    getVehicleModels();

    function getVehicleFilterModels(make_id) {
        $.getJSON("/models/" + make_id, function (models) {
            var option = '<option value="0">Select One</option>';
            $.each(models, (key, value) => {
                let { id, model } = value;
                option += "<option value=" + id + ">" + model + "</option>";
            });
            filterlistmodel.html(option);
        });
    }

    function getVehicleFeatures() {
        $.getJSON("/features", function (features) {
            let label = "",
                tr = "",
                i = 1;
            $.each(features, function (key, value) {
                let { id, feature, description } = value;
                let descript =
                    description !== undefined && description !== null
                        ? description
                        : "";
                label +=
                    '<div class="col-md-3"><label for=""><input type="checkbox" value=' +
                    id +
                    ' class="vehicleFeatures" name="vehiclefeatures">&nbsp;&nbsp;&nbsp;' +
                    feature +
                    "</label></div>";
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    feature +
                    "</td><td>" +
                    descript +
                    '</td><td><a href="#" id="editFeatureToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteFeatureToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });

            $("#featuresSection").html(label);
            let table =
                '<table class="hover  featuresDataTable"><thead><th>#</th><th>Feature</th><th>Description</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";

            $("#featureseSection").html(table);

            if ($.fn.DataTable.isDataTable(".featuresDataTable")) {
                $(".featuresDataTable").destroy();
                $(".featuresDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            } else {
                $(".featuresDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            }
            // $("#featureseSection").DataTable();
        });
    }

    getVehicleFeatures();

    function getDealerYards(dealer_id) {
        $.getJSON("dealer-yards/" + dealer_id, function (yards) {
            let option = '<option value="">Select One</option>';
            $.each(yards, function (key, value) {
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.name +
                    "</option>";
            });
            $("#yardID").html(option);
        });
    }

    // countryLocated.on("change", function () {
    //     let country_id = $(this).val();
    //     if (country_id !== "") {
    //         getCounties(country_id);
    //     }
    // });

    function getVehicles() {
        $.getJSON("/list-vehicles", function (vehicles) {
            let tr = "",
                option = "",
                i = 1;
            $.each(vehicles, function (key, value) {
                let {
                    id,
                    vehicle_no,
                    dealer,
                    make,
                    model,
                    year,
                    prices,
                    enginecc,
                    color,
                    interior,
                    miles,
                    fuel_type,
                    transmission,
                    status,
                } = value;
                option =
                    +"<option value=" +
                    id +
                    ">" +
                    vehicle_no +
                    make.make.model.model +
                    "</option>";
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    vehicle_no +
                    "</td><td>" +
                    dealer.name +
                    "</td><td>" +
                    make.make +
                    "</td><td>" +
                    model.model +
                    "</td><td>" +
                    year +
                    "</td><td>" +
                    prices.price +
                    "</td><td>" +
                    enginecc +
                    "</td><td>" +
                    color +
                    "</td><td>" +
                    interior +
                    "</td><td>" +
                    miles +
                    "</td><td>" +
                    fuel_type +
                    "</td><td>" +
                    transmission +
                    "</td><td>" +
                    status +
                    "</td><td>" +
                    created_at +
                    "</td><td></td></tr>";
            });
            let table =
                '<table class="hover vehicleDataTable "><thead><th>#</th><th>NO</th><th>Dealer</th><th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>CC</th><th>Color</th><th>Interior</th><th>Mileage</th><th>F Type</th><th>Transmission</th><th>Status</th><th>Added at</th><th>Action</th></thead><tbody' +
                tr +
                "</tbody></table>";
            $("#vehicleslist").html(option);
            $("#vehicleListTab").html(table);
            if ($.fn.DataTable.isDataTable(".vehicleDataTable")) {
                $(".vehicleDataTable").destroy();
                $(".vehicleDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            } else {
                $(".vehicleDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            }
        });
    }

    getVehicles();

    vehicleMake.on("change", function () {
        let make_id = $(this).val();
        if (make_id !== "") {
            getVehicleModels(make_id);
        }
    });

    vehicleMake.on("change", function () {
        let make_id = $(this).val();
        if (make_id !== "") {
            getVehicleModels(make_id);
        }
    });

    filterlistmake.on("change", function () {
        let make_id = $(this).val();
        if (make_id !== 0) {
            getVehicleFilterModels(make_id);
        }
    });

    yardToggle.on("change", function () {
        console.log("thssrs");
        if ($(this).is(":checked")) {
            locationInput.hide();
            yardInput.show();
        } else {
            locationInput.show();
            yardInput.hide();
        }
    });

    vehicleDealer.on("change", function () {
        let id = $(this).val();
        getDealerYards(id);
    });

    makeCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $("input[name='_token']").val(),
            submit = $this.find("button[type='submit']"),
            make_id = makeCreateID.val(),
            make = makeName.val();

        submit.prop({ disabled: true });
        let data = { make_id: make_id, make: make };
        console.log(data);
        if (make !== "" && make !== undefined) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/makes",
                data: data,
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#makefeedback");
                        makeCreateID.val("");
                        $this.trigger("reset");
                        getVehicleMakes();
                    } else {
                        showError(result.error, "#makefeedback");
                    }
                    submit.prop({ disabled: false });
                },
                error: function (error) {
                    console.log(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#makefeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#modelfeedback"
                        );
                    }
                    submit.prop({ disabled: false });
                },
            });
        }
    });

    modelCreateForm.on("submit", function (event) {
        event.preventDefault();

        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']");

        submit.prop({ disabled: true });

        let data = {
            model_id: modelID.val(),
            make_id: modelMakeID.val(),
            model: modelName.val(),
        };

        if (data.model !== "" && data.model !== undefined) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });

            $.ajax({
                type: "POST",
                url: "/models",
                data: data,
                success: function (params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#modelfeedback");
                        modelID.val("");
                        $this.trigger("reset");
                        getVehicleModels();
                    } else {
                        showError(result.error, "#modelfeedback");
                    }
                    submit.prop({ disabled: false });
                },
                error: function (error) {
                    console.error(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#modelfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#modelfeedback"
                        );
                    }
                },
            });
        }
    });

    featureCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            feature_id = featureCreateID.val(),
            featureName = $("#featureName").val(),
            submit = $this.find("input[type='submit']"),
            featureDescription = $("#featureDescription").val(),
            token = $this.find("input[name='_token']").val();

        let data = {
            feature_id: feature_id,
            feature: featureName,
            description: featureDescription,
        };

        console.log(data);
        if (data.feature !== null) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/features",
                data: data,
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#featurefeedback");
                        featureCreateID.val("");
                        $this.trigger("reset");
                        getVehicleFeatures();
                    } else {
                        showError(result.error, "#featurefeedback");
                    }
                    submit.prop({ disabled: false });
                },
                error: function (error) {
                    console.error(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#featurefeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#featurefeedback"
                        );
                    }
                },
            });
        }
    });

    $("body").on("click", "#editFeatureToggle", function (event) {
        event.preventDefault();
        let feature_id = $(this).data("id");
        console.log(feature_id);
        console.log("htsgghd");
        $.getJSON("/features/" + feature_id, function (features) {
            var feature = features[0];
            if (feature.id !== null && feature.id !== undefined) {
                showSuccess(
                    "Edit enabled, make changes then save.",
                    "#featurefeedback"
                );
                $("#featureCreateID").val(feature.id);
                $("#featureName").val(feature.feature);
                $("#featureDescription").text(feature.description);
            } else {
                showError(
                    "Request failed, ensure you have internet connection then retry.",
                    "#featurefeedback"
                );
            }
        });
    });

    $("body").on("click", "#editVehicleModelToggle", function (event) {
        event.preventDefault();
        let model_id = $(this).data("id");
        if (model_id !== "" && model_id !== undefined) {
            $.getJSON("/model/" + model_id, function (model) {
                if (typeof model !== undefined && model !== "") {
                    showSuccess(
                        "Edit enabled, make changes then save.",
                        "#modelfeedback"
                    );
                    modelID.val(model.id);
                    modelName.val(model.model);
                    $(
                        "#modelMakeID option[value='" + model.make.id + "']"
                    ).prop("selected", true);
                } else {
                    showError(
                        "Request failed, ensure you have internet connection then retry.",
                        "#featurefeedback"
                    );
                }
            });
        } else {
            showError(
                "Request failed, ensure you have internet connection then retry.",
                "#featurefeedback"
            );
        }
    });
    // deleteModelToggle;

    // deleteMakeToggle;
    $("body").on("click", "#editMakeToggle", function (event) {
        event.preventDefault();
        console.log("here");
        let make_id = $(this).data("id");
        if (make_id !== "" && make_id !== undefined) {
            $.getJSON("/makes/" + make_id, function name(makes) {
                if ($.isArray(makes)) {
                    showSuccess(
                        "Edit enabled, make changes then save.",
                        "#makefeedback"
                    );
                    let make = makes[0];
                    console.log(make);
                    makeCreateID.val(make.id);
                    makeName.val(make.make);
                } else {
                    showError(
                        "Error occured during processing, Check you have internet connection then retry. ",
                        "#makefeedback"
                    );
                }
            });
        } else {
            showError(
                "Error occured during processing, Check you have internet connection then retry. ",
                "#makefeedback"
            );
        }
    });

    let typeCreateForm = $("#typeCreateForm"),
        typeCreateID = $("#typeCreateID"),
        typeName = $("#typeName");

    typeCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            type_id = typeCreateID.val(),
            name = typeName.val(),
            submit = $this.find("button[type='submit']");
        let data = { type_id: type_id, type: name };
        if (data.type !== undefined && data.type !== null) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $this.find("input[name='_token']").val(),
                },
            });
            $.ajax({
                type: "POST",
                url: "/types",
                data: data,
                success: function (params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#typefeedback");
                        typeCreateID.val("");
                        $this.trigger("reset");
                        getVehicleTypes();
                    } else {
                        showError(result.error, "#typefeedback");
                    }
                    submit.prop({ disabled: false });
                },
                error: function (error) {
                    console.log(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#typefeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#typefeedback"
                        );
                    }
                    submit.prop({ disabled: false });
                },
            });
        }
    });

    $("body").on("click", "#editTypeToggle", function (event) {
        event.preventDefault();
        let type_id = $(this).data("id");
        if (type_id !== "" && type_id !== null) {
            $.getJSON("/types/" + type_id, function (types) {
                if (types !== undefined && types !== null) {
                    let type = types[0];
                    typeCreateID.val(type.id);
                    typeName.val(type.type);
                    showSuccess(
                        "Request accepted for editing. Make changes and save",
                        "#typefeedback"
                    );
                } else {
                    showSuccess(
                        "Error occured during processing. Ensure you are connected to the internet and retry.",
                        "#typefeedback"
                    );
                }
            });
        } else {
            showSuccess(
                "Error occured during processing. Ensure you are connected to the internet and retry.",
                "#typefeedback"
            );
        }
    });

    let yardCreateForm = $("#yardCreateForm"),
        yardCreateID = $("#yardCreateID"),
        dealerYardID = $("#dealerYardID"),
        yardName = $("#yardName");
    yardCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            yard_id = yardCreateID.val(),
            dealer_id = dealerYardID.val(),
            yard = yardName.val(),
            submit = $this.find("button[type='submit']");
        submit.prop({ disabled: true });

        let data = { yard_id: yard_id, dealer_id: dealer_id, yard: yard };

        if (data.yard !== "" && data.yard !== null && data.yard !== undefined) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/yards",
                data: data,
                success: function (params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#yardfeedback");
                        yardCreateID.val("");
                        $this.trigger("reset");
                        getVehicleMakes();
                    } else {
                        showError(result.error, "#yardfeedback");
                    }
                    submit.prop({ disabled: false });
                },
                error: function (error) {
                    console.error(error);
                    if (error.status == 422) {
                        var errors = "";
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                errors += value + "!";
                            }
                        );
                        showError(errors, "#yardfeedback");
                    } else {
                        showError(
                            "Error occurred during processing",
                            "#yardfeedback"
                        );
                    }
                    submit.prop({ disabled: false });
                },
            });
        }
    });

    let clearMake = $("#clearMake"),
        clearModel = $("#clearModel"),
        clearFeature = $("#clearFeature"),
        clearType = $("#clearType"),
        clearYard = $("#clearYard");
    clearMake.on("click", function (event) {
        event.preventDefault();
        makeCreateID.val("");
        makeName.val("");
    });
    clearModel.on("click", function (event) {
        event.preventDefault();
        modelID.val("");
        modelMakeID.find("option");
        modelName.val("");
    });

    clearFeature.on("click", function (event) {
        event.preventDefault();
        featureCreateID.val("");
        featureName.value("");
        featureDescription.val("");
    });
    clearType.on("click", function (event) {
        event.preventDefault();
        typeCreateID.val("");
        typeName.val("");
    });

    clearYard.on("click", function (event) {
        event.preventDefault();
        yardCreateID.val("");
        yardName.val("");
    });
})();
