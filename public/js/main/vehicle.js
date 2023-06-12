(function () {
    $(".chzn-select").select2({ allowClear: true });

    $("#vehicleTags").select2({
        tags: true,
        tokenSeparators: [",", " "],
        maximumSelectionLength: 4,
    });
    let addNewVehicle = $("#addNewVehicle"),
        newVehicleForm = $("#newVehicleForm"),
        vehicleDealer = $("#vehicleDealer"),
        vehicleType = $("#vehicleType"),
        vehicleMake = $("#vehicleMake"),
        vehicleModel = $("#vehicleModel"),
        countryofOrigin = $("#countryofOrigin"),
        shippingTo = $("#shippingTo"),
        countyID = $("#countyID"),
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
        featureDescription = $("#featureDescription"),
        vehicleTags = $("#vehicleTags"),
        filterdealerID = $("#filterDealerID"),
        filterMakeID = $("#filterMakeID"),
        filtermodelID = $("#filterModelID"),
        filterVehiclesID = $("#filterVehiclesID"),
        filterVehicleYardID = $("#filterVehicleYardID"),
        filterListDealerID = $("#filterListDealerID"),
        filterListMakeID = $("#filterListMakeID"),
        filterListModelID = $("#filterListModelID"),
        filterListVehicleYardID = $("#filterListVehicleYardID"),
        gear = $("#gear"),
        speed = $("#speed"),
        terrain = $("#terrain"),
        engine = $("#engine"),
        horsepower = $("#horsepower");

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
        $.getJSON("/admin-dealers", function (dealers) {
            var option = '<option value="">Select One</option>';
            $.each(dealers, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleDealer.html(option);
            filterdealerID.html(option);
            filterListDealerID.html(option);
            $("#dealerYardID").html(option);
        });
    }
    getDealers();

    function getVehicleTypes() {
        $.getJSON("/types", function (types) {
            var option = '<option value="">Select One</option>';
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
                '<table class="table table-bordered table-sm hover typesDataTable"><thead><th>#</th><th>Type</th><th>Action</th></thead><tbody>' +
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

    function getVehicleYards() {
        $.getJSON("/yards", function (types) {
            var option = '<option value="">Select One</option>';
            let tr = "",
                i = 1;
            $.each(types, (key, value) => {
                let { id, yard, address, email, phone } = value;
                tr +=
                    "<tr><td>" +
                    i++ +
                    "</td><td>" +
                    yard +
                    "</td><td>" +
                    address +
                    "</td><td>" +
                    email +
                    "</td><td>" +
                    phone +
                    '</td><td><a href="#" id="editYardToggle" data-id=' +
                    id +
                    '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteYardToggle" data-id=' +
                    id +
                    '><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });
            let table =
                '<table class="table table-bordered table-sm hover yardsDataTable"><thead><th>#</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#yardsSection").html(table);
            if ($.fn.DataTable.isDataTable(".yardsDataTable")) {
                $(".yardsDataTable").destroy();
                $(".yardsDataTable").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        "copyHtml5",
                        "excelHtml5",
                        "csvHtml5",
                        "pdfHtml5",
                    ],
                });
            } else {
                $(".yardsDataTable").DataTable({
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

    getVehicleYards();

    function getVehicleMakes() {
        $.getJSON("/makes", function (makes) {
            var option = '<option value="">Select One</option>',
                option1 = '<option value="">All</option>',
                tr = "",
                i = 1;
            $.each(makes, (key, value) => {
                let { id, make } = value;
                option += "<option value=" + id + ">" + make + "</option>";
                option1 += "<option value=" + id + ">" + make + "</option>";
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
            filterMakeID.html(option1);
            filterListMakeID.html(option1);
            modelMakeID.html(option);

            let table =
                '<table class="table table-bordered table-sm hover makesDataTable"><thead><th>#</th><th>Make</th><th>Action</th></thead><tbody>' +
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
            var option = '<option value="">Select One</option>';
            var option1 = '<option value="global">Global</option>';
            $.each(countries, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
                option1 += "<option value=" + id + ">" + name + "</option>";
            });
            countryofOrigin.html(option);
            shippingTo.html(option1);
        });
    }

    getCountries();

    function getCounties(country_id) {
        $.getJSON("/counties/" + country_id, function (counties) {
            var option = '<option value="">Select One</option>';
            var option1 = '<option value="Global">Global</option>';
            $.each(counties, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
                option1 += "<option value=" + id + ">" + name + "</option>";
            });
            countyID.html(option);
        });
    }

    function getVehicleModels(make_id = null) {
        $.getJSON("/models/" + make_id ?? "", function (models) {
            var option = '<option value="">Select One</option>',
                option1 = '<option value="">All</option>',
                tr = "",
                i = "";
            $.each(models, (key, value) => {
                let { id, make, model } = value;
                option += "<option value=" + id + ">" + model + "</option>";
                option1 += "<option value=" + id + ">" + model + "</option>";

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
            filtermodelID.html(option1);
            filterListModelID.html(option1);
            let table =
                "<table class='table table-bordered table-sm hover modelsDataTable'><thead><th>#</th><th>Make</th><th>Model</th><th>Action</th></thead><tbody>" +
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
        });
    }

    getVehicleModels();

    function getVehicleFilterModels(make_id) {
        $.getJSON("/models/" + make_id, function (models) {
            var option = '<option value="">All</option>';
            $.each(models, (key, value) => {
                let { id, model } = value;
                option += "<option value=" + id + ">" + model + "</option>";
            });
            filtermodelID.html(option);
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
                    '<div class="col-md-3"><label class="custom-control custom-radio"><input type="checkbox" value=' +
                    id +
                    ' class="vehicleFeatures" name="vehiclefeatures"><span>&nbsp;&nbsp;&nbsp;' +
                    feature +
                    "</span></label></div>";
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
                '<table class="table table-bordered table-sm hover featuresDataTable"><thead><th>#</th><th>Feature</th><th>Description</th><th>Action</th></thead><tbody>' +
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

    function getDealerYards(dealer_id = null) {
        $url =
            dealer_id == null ? "/dealer-yards/" : "/dealer-yards/" + dealer_id;
        $.getJSON($url, function (yards) {
            let option1 = '<option value="">All</option>';
            let option = '<option value="">Select One</option>';
            $.each(yards, function (key, value) {
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.yard +
                    "</option>";
            });
            $("#yardID").html(option);
            filterVehicleYardID.html(option);
            $("#filterListVehicleYardID").html(option1);
        });
    }

    getDealerYards();

    // countryLocated.on("change", function () {
    //     let country_id = $(this).val();
    //     if (country_id !== "") {
    //         getCounties(country_id);
    //     }
    // });

    // function getVehicles() {
    //     $.getJSON("/list-vehicles", function (vehicles) {
    //         let tr = "",
    //             option = "",
    //             li = "",
    //             i = 1;
    //         $("#listcount").text(vehicles.length);
    //         $.each(vehicles, function (key, value) {
    //             let {
    //                 id,
    //                 vehicle_no,
    //                 dealer,
    //                 make,
    //                 model,
    //                 year,
    //                 prices,
    //                 enginecc,
    //                 // color,
    //                 // interior,
    //                 mileage,
    //                 fuel_type,
    //                 transmission,
    //                 status,
    //                 created_at,
    //             } = value;

    //             option +=
    //                 '<option value="' +
    //                 id +
    //                 '">' +
    //                 vehicle_no +
    //                 " -" +
    //                 model.model +
    //                 "</option>";
    //             li +=
    //                 '<label class="custom-control custom-radio"><input type="checkbox" value=' +
    //                 id +
    //                 ' class="vehicleoptionid" name="vehicleoptionid"><span>&nbsp;&nbsp;&nbsp;' +
    //                 vehicle_no +
    //                 " - " +
    //                 model.model +
    //                 "</span></label>";
    //             // <td>" +
    //             // color +
    //             // "</td><td>" +
    //             // interior +
    //             // "</td>
    //             tr +=
    //                 "<tr><td>" +
    //                 i++ +
    //                 "</td><td>" +
    //                 vehicle_no +
    //                 "</td><td>" +
    //                 dealer.name +
    //                 "</td><td>" +
    //                 make.make +
    //                 "</td><td>" +
    //                 model.model +
    //                 "</td><td>" +
    //                 year +
    //                 "</td><td>" +
    //                 prices[0]?.price +
    //                 "</td><td>" +
    //                 enginecc +
    //                 "</td><td>" +
    //                 mileage +
    //                 "</td><td>" +
    //                 fuel_type +
    //                 "</td><td>" +
    //                 transmission +
    //                 "</td><td>" +
    //                 status +
    //                 "</td><td>" +
    //                 moment(new Date(created_at)).format("DD-MM-YYYY") +
    //                 "</td><td></td></tr>";
    //         });
    //         // <th>Color</th><th>Interior</th>
    //         let table =
    //             '<table class="table table-bordered hover vehicleDataTable "><thead><th>#</th><th>NO</th><th>Dealer</th><th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>CC</th><th>Mileage</th><th>Fuel</th><th>Trans</th><th>Status</th><th>created</th><th>Action</th></thead><tbody' +
    //             tr +
    //             "</tbody></table>";
    //         $("#vehicledatasection").html(table);

    //         if ($.fn.DataTable.isDataTable(".vehicleDataTable")) {
    //             $(".vehicleDataTable").destroy();
    //             $(".vehicleDataTable").DataTable({
    //                 dom: "Bfrtip",
    //                 buttons: [
    //                     "copyHtml5",
    //                     "excelHtml5",
    //                     "csvHtml5",
    //                     "pdfHtml5",
    //                 ],
    //             });
    //         } else {
    //             $(".vehicleDataTable").DataTable({
    //                 dom: "Bfrtip",
    //                 buttons: [
    //                     "copyHtml5",
    //                     "excelHtml5",
    //                     "csvHtml5",
    //                     "pdfHtml5",
    //                 ],
    //             });
    //         }
    //     });
    // }

    // getVehicles();

    var fileInput = document.getElementById("addionalImages");
    var maxFiles = 20; // Set the maximum file limit

    fileInput.addEventListener("change", function () {
        var selectedFiles = fileInput.files.length;
        if (selectedFiles > maxFiles) {
            // Reset the file input value and display an error message
            fileInput.value = "";
            alert(
                "Maximum file limit exceeded. Please select up to " +
                    maxFiles +
                    " files."
            );
        }
    });

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

    filterMakeID.on("change", function () {
        let make_id = $(this).val();
        if (make_id !== 0 && make_id !== null) {
            getVehicleFilterModels(make_id);
        }
    });

    yardToggle.on("change", function () {
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
            make = makeName.val(),
            errors = [];

        var formData = new FormData();
        var fileInput = document.getElementById("makeLogo");
        var file = fileInput.files[0];
        formData.append("logo", file);
        formData.append("make", make);
        formData.append("make_id", make_id);
        formData.append("_token", token);
        submit.prop({ disabled: true });
        let size = file.size;
        console.log(size);
        if (size > (1024 * 1024) / 2) {
            errors.push("Logo size cannot be more than 500kb");
        }
        if (make == "" && make == undefined) {
            errors.push("Make is required");
        }
        if (errors.length > 0) {
            var p = "";
            $.each(errors, function (key, value) {
                p += "<p>" + value + "</p>";
            });
            showError(p, "#makefeedback");
        } else {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/makes",
                data: formData,
                processData: false,
                contentType: false,
                success: function (params) {
                    submit.prop({ disabled: false });

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
                },
                error: function (error) {
                    submit.prop({ disabled: false });

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
        let make_id = $(this).data("id");
        if (make_id !== "" && make_id !== undefined) {
            $.getJSON("/makes/" + make_id, function name(makes) {
                if ($.isArray(makes)) {
                    showSuccess(
                        "Edit enabled, make changes then save.",
                        "#makefeedback"
                    );
                    let make = makes[0];
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
        yardName = $("#yardName"),
        yardAddress = $("#yardAddress"),
        yardEmail = $("#yardEmail"),
        yardPhone = $("#yardPhone");

    yardCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            token = $this.find("input[name='_token']").val(),
            yard_id = yardCreateID.val(),
            dealer_id = dealerYardID.val(),
            yard = yardName.val(),
            address = yardAddress.val(),
            email = yardEmail.val(),
            phone = yardPhone.val(),
            submit = $this.find("button[type='submit']");
        submit.prop({ disabled: true });

        let data = {
            yard_id: yard_id,
            dealer_id: dealer_id,
            yard: yard,
            address: address,
            email: email,
            phone: phone,
        };

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
                        getVehicleYards();
                        getDealerYards();
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

    $("body").on("click", "#editYardToggle", function (event) {
        event.preventDefault();
        let yard_id = $(this).data("id");
        if (yard_id !== "" && yard_id !== undefined) {
            $.getJSON("/yards/" + yard_id, function (yards) {
                let yard = yards[0];
                if (yard !== null) {
                    showSuccess(
                        "Yard accepted for editing. Make changes then save.",
                        "#yardfeedback"
                    );

                    yardCreateID.val(yard.id);
                    $(
                        "#dealerYardID option[value=" + yard.dealer.id + "]"
                    ).prop("selected", true);
                    yardName.val(yard.yard);
                    yardAddress.val(yard.address);
                    yardEmail.val(yard.email);
                    yardPhone.val(yard.phone);
                } else {
                    showError(
                        "Error occured during processing. Ensure you have internet connection then retry.",
                        "#yardfeedback"
                    );
                }
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

    $("#coverPhoto").on("change", function () {
        var input = $(this)[0];

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#coverPhotoPreview").append(
                    '<img src="' +
                        e.target.result +
                        '"width="100%" height="200px" alt="Image Preview">'
                );
                $("#coverPhotoPreview").append(
                    '<button class="btn btn-outline-danger"><i class="fal fa-trash btn-danger" id="coverPhotoRemve"></i></button>'
                );
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    // addionalImages;

    $(document).on("click", "#coverPhotoRemve", function () {
        $("#coverPhoto").val("");
        $("#coverPhotoPreview").html("");
    });

    $("#addionalImages").on("change", function () {
        const previewContainer = $("#image-preview");
        var vehicleID = $("#vehicleID").val();
        if (vehicleID == undefined && vehicleID == null) {
            previewContainer.empty();
        }
        const $this = $(this),
            files = Array.from($this[0].files);
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = $("<img>")
                    .attr("src", e.target.result)
                    .attr("width", "100%")
                    .attr("height", "200px");
                const preview = $('<div class="col-md-3">')
                    .addClass("image-preview")
                    .append(img);
                previewContainer.append(preview);
                const removeButton = $(
                    "<button class='btn btn-outline-danger'>"
                ).html("<i class='fal fa-trash btn-danger'></i>");
                removeButton.on("click", function () {
                    preview.remove();
                    files.splice(i, 1);
                    const remainingFiles = new DataTransfer();
                    for (let j = 0; j < files.length; j++) {
                        remainingFiles.items.add(files[j]);
                    }
                    $("#addionalImages").prop("files", remainingFiles.files);
                });
                preview.append(removeButton);
            };
            reader.readAsDataURL(file);
        }

        previewContainer.sortable({
            containment: "parent",
            axis: "y",
            update: function (event, ui) {
                const newOrder = previewContainer.sortable();
                const newFiles = new DataTransfer();
                // for (let i = 0; i < newOrder.length; i++) {
                //     const index = parseInt(newOrder[i].split("-")[1]);
                //     newFiles.items.add(files[index]);
                // }

                // const newFileList = new DataTransfer();
                // for (let i = 0; i < newFiles.length; i++) {
                //     newFileList.items.add(newFiles[i]);
                // }
                // $("#addionalImages").prop("files", newFiles.files);
            },
        });
    });

    let vehicleID = $("#vehicleID"),
        vehicleCreateForm = $("#vehicleCreateForm"),
        uniqueStrID = $("#uniqueStrID"),
        locationHtm = $("#location"),
        yardID = $("#yardID"),
        yearOfManufacture = $("#yearOfManufacture"),
        mileAge = $("#mileAge"),
        vehicleColor = $("#vehicleColor"),
        vehiclePrice = $("#vehiclePrice"),
        engineCC = $("#engineCC"),
        interiorHtm = $("#interior"),
        fuelType = $("#fuelType"),
        transmissionHtm = $("#transmission"),
        descriptionHtm = $("#description"),
        savevehicle = $("#savevehicle"),
        clearvehicle = $("#clearvehicle"),
        input = document.getElementById("coverPhoto"),
        token = $("input[name='_token']").val(),
        usage = $("#usage"),
        multiImagesUpload = document.getElementById("addionalImages");

    $("#vehicleImagesUpload").on("click", function (event) {
        event.preventDefault();

        // var file = input.files[0];
        // if (input.files.length > 0) {
        //     var reader = new FileReader();
        //     reader.onload = function () {
        //         var img = new Image();
        //         img.onload = function () {
        //             var width = 850;
        //             var height = 500;
        //             var canvas = document.createElement("canvas");
        //             canvas.width = width;
        //             canvas.height = height;
        //             canvas.getContext("2d").drawImage(img, 0, 0, width, height);
        //             var compressedFile = canvas.toDataURL("image/jpeg", 0.8);
        //             $.post("/upload", {
        //                 _token: token,
        //                 str_id: uniqueStrID.val(),
        //                 image: compressedFile,
        //                 vehicle_id: vehicleID.val(),
        //                 cover_image: true,
        //             })
        //                 .done(function (params) {
        //                     if (params == "success") {
        //                         $("#coverPhotoPreview").children().remove();
        //                     }
        //                 })
        //                 .fail(function (error) {
        //                 });
        //         };
        //         img.src = reader.result;
        //     };
        //     reader.readAsDataURL(file);
        // }

        // var files = multiImagesUpload.files;
        // if (multiImagesUpload.files.length > 0) {
        //     for (var i = 0; i < files.length; i++) {
        //         var file = files[i];
        //         var read = new FileReader();
        //         read.onload = function (e) {
        //             var img = new Image();
        //             img.src = e.target.result;
        //             img.onload = function () {
        //                 var canvas = document.createElement("canvas");
        //                 var ctx = canvas.getContext("2d");
        //                 canvas.width = 800;
        //                 canvas.height = 500;
        //                 let leet = "image_" + i;
        //                 ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        //                 var compressedDataUrl = canvas.toDataURL(
        //                     "image/jpeg",
        //                     0.5
        //                 );
        //                 $.post("/upload", {
        //                     _token: token,
        //                     str_id: uniqueStrID.val(),
        //                     vehicle_id: vehicleID.val(),
        //                     image: compressedDataUrl,
        //                 })
        //                     .done(function (params) {

        //                         if (params == "success") {
        //                             $('img[src="' + img.src + '"]')
        //                                 .parent()
        //                                 .remove();
        //                             if (
        //                                 $("#image-preview").children().length ==
        //                                     0 &&
        //                                 $("#coverPhotoPreview").children()
        //                                     .length == 0
        //                             ) {
        //                                 showSuccess(
        //                                     "Images uploaded successfully. Complete filling this form and click on save. ",
        //                                     "#imageFeedback"
        //                                 );
        //                             }
        //                         }
        //                     })
        //                     .fail(function (error) {
        //                     });
        //             };
        //         };
        //         read.readAsDataURL(file);
        //     }
        // }
    });

    vehicleCreateForm.on("submit", function (event) {
        event.preventDefault();
        savevehicle.prop("disabled", true);
        let features = [];

        $(".vehicleFeatures").each(function (key, input) {
            if ($(input).is(":checked")) {
                features.push($(input).val());
            }
        });

        let $this = $(this),
            vehicle_id = vehicleID.val(),
            dealer_id = vehicleDealer.val(),
            type = vehicleType.val(),
            make = vehicleMake.val(),
            model = vehicleModel.val(),
            country_of_origin = countryofOrigin.val(),
            shipping_to = shippingTo.val(),
            str_id = uniqueStrID.val(),
            location = locationHtm.val(),
            yard_id = yardID.val(),
            year = yearOfManufacture.val(),
            mileage = mileAge.val(),
            color = vehicleColor.val(),
            price = vehiclePrice.val(),
            enginecc = engineCC.val(),
            interior = interiorHtm.val(),
            fuel_type = fuelType.val(),
            transmission = transmissionHtm.val(),
            tags = vehicleTags.val(),
            description = descriptionHtm.val(),
            usage = $("#usage").val(),
            gear = $("#gear").val(),
            speed = $("#speed").val(),
            terrain = $("#terrain").val(),
            engine = $("#engine").val(),
            horsepower = $("#horsepower").val(),
            errors = [];

        savevehicle.prop("disabled", true);

        let data = {
            vehicle_id: vehicle_id,
            dealer_id: dealer_id,
            type_id: type,
            make_id: make,
            vehicle_model_id: model,
            country_of_origin: country_of_origin,
            shipping_to: shipping_to,
            str_id: str_id,
            location: location,
            yard_id: yard_id,
            year: year,
            mileage: mileage,
            color: color,
            price: price,
            enginecc: enginecc,
            interior: interior,
            fuel_type: fuel_type,
            transmission: transmission,
            usage: usage,
            tags: tags,
            description: description,
            features: features,
            gear: gear,
            speed: speed,
            terrain: terrain,
            engine: engine,
            horsepower: horsepower,
        };

        var files = multiImagesUpload.files,
            imagesUploadPromises = [];

        if (multiImagesUpload.files.length <= 0) {
            errors.push("Images ae required");
        }
        if (make == "" && make == undefined) {
            errors.push("Make is required");
        }
        if (model == "" && model == undefined) {
            errors.push("Model is required");
        }
        if (year == "" && year == undefined) {
            errors.push("Year of manufacture is required");
        }

        if (color == "" && color == undefined) {
            errors.push("Vehicle color is required");
        }
        if (price == "" && price == undefined) {
            errors.push("Vehicle price is required");
        }
        if (errors.length > 0) {
            p = "";
            $.each(errors, (key, value) => {
                p += value + "\n";
            });
            showError("" + p + "", "#vehiclefeedback");
        } else {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageUploadPromise = new Promise(function (
                    resolve,
                    reject
                ) {
                    var read = new FileReader();
                    read.onload = function (e) {
                        var img = new Image();
                        img.src = e.target.result;
                        img.onload = function () {
                            var canvas = document.createElement("canvas");
                            var ctx = canvas.getContext("2d");
                            canvas.width = 600;
                            canvas.height = 450;
                            let leet = "image_" + i;
                            ctx.drawImage(
                                img,
                                0,
                                0,
                                canvas.width,
                                canvas.height
                            );
                            var compressedDataUrl = canvas.toDataURL(
                                "image/jpeg",
                                0.5
                            );
                            console.log(compressedDataUrl);

                            $.post("/upload", {
                                _token: token,
                                str_id: uniqueStrID.val(),
                                vehicle_id: vehicleID.val(),
                                image: compressedDataUrl,
                            })
                                .done(function (params) {
                                    console.log(params);
                                    if (params == "success") {
                                        resolve();
                                        $('img[src="' + img.src + '"]')
                                            .parent()
                                            .remove();
                                        if (
                                            $("#image-preview").children()
                                                .length == 0 &&
                                            $("#coverPhotoPreview").children()
                                                .length == 0
                                        ) {
                                            // showSuccess(
                                            //     "Images uploaded successfully. Complete filling this form and click on save. ",
                                            //     "#imageFeedback"
                                            // );
                                        }
                                    }
                                })
                                .fail(function (error) {
                                    reject();
                                });
                        };
                    };
                    read.readAsDataURL(file);
                });
                imagesUploadPromises.push(imageUploadPromise);
            }

            console.log(imagesUploadPromises);
            Promise.all(imagesUploadPromises)
                .then((result) => {
                    console.log("heresggsg");
                    console.log(result);
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                    });

                    $.ajax({
                        method: "POST",
                        url: "/vehicles",
                        data: data,
                        success: function (params) {
                            console.log(params);

                            savevehicle.prop("disabled", false);
                            let result = JSON.parse(params);
                            if (result.status == "success") {
                                showSuccess(result.message, "#vehiclefeedback");
                                yardCreateID.val("");
                                $this.trigger("reset");
                                $("#coverPhotoPreview").children().remove();
                                $("#image-preview").children().remove();
                                // getVehicles();
                                $(".chzn-select").select2({
                                    allowClear: true,
                                });
                            } else {
                                showError(result.error, "#vehiclefeedback");
                            }
                        },

                        error: function (error) {
                            console.log(error);
                            savevehicle.prop("disabled", false);

                            if (error.status == 422) {
                                var errors = "";
                                $.each(
                                    error.responseJSON.errors,
                                    function (key, value) {
                                        errors += value + "!";
                                    }
                                );
                                showError(errors, "#vehiclefeedback");
                            } else {
                                showError(
                                    "Error occurred during processing",
                                    "#vehiclefeedback"
                                );
                            }
                        },
                    });
                })
                .catch((errors) => {
                    console.log(errors);
                });
        }
    });

    /** Toggle vehicle for editing */

    filterVehiclesID.on("change", function () {
        let vehicle_id = $(this).val();
        if (vehicle_id !== null) {
            $("#image-preview").children().remove();
            $("#coverPhotoPreview").children().remove();

            $.getJSON("/vehicles/" + vehicle_id, function (vehicle) {
                if (vehicle !== null && vehicle !== []) {
                    showSuccess(
                        "Vehicle accepted for editing, You can make changes and click save to save changes",
                        "#vehiclefeedback"
                    );

                    $(
                        "#vehicleDealer option[value='" +
                            vehicle.dealer?.id +
                            "']"
                    ).prop("selected", true);

                    $(
                        "#vehicleType option[value='" + vehicle.type?.id + "']"
                    ).prop("selected", true);

                    $(
                        "#vehicleMake option[value='" + vehicle.make?.id + "']"
                    ).prop("selected", true);

                    $("#vehicleModel").html(
                        "<option value='" +
                            vehicle.model?.id +
                            "'>" +
                            vehicle.model?.model +
                            "</option>"
                    );
                    $(
                        "#countryofOrigin option[value='" +
                            vehicle.country_of_origin +
                            "']"
                    ).prop("selected", true);

                    $(
                        "#shippingTo option[value='" +
                            vehicle.shipping_to +
                            "']"
                    ).prop("selected", true);

                    vehicleID.val(vehicle.id);
                    uniqueStrID.val(vehicle.vehicle_no);
                    locationHtm.val(vehicle.location);
                    mileAge.val(vehicle.mileage);
                    vehiclePrice.val(vehicle.price);
                    engineCC.val(vehicle.enginecc);
                    descriptionHtm.val(vehicle.description);
                    gear.val(vehicle.gear);
                    speed.val(vehicle.speed);
                    terrain.val(vehicle.terrain);
                    engine.val(vehicle.engine);
                    horsepower.val(vehicle.horsepower);

                    if (vehicle.yard !== null) {
                        yardID.html(
                            "<option value='" +
                                vehicle.yard?.id +
                                "'>" +
                                vehicle.yard?.yard +
                                "</option>"
                        );
                    }

                    $(
                        "#yearOfManufacture option[value='" +
                            vehicle.year +
                            "']"
                    ).prop("selected", true);

                    $(
                        "#vehicleColor option[value='" + vehicle.color + "']"
                    ).prop("selected", true);

                    $(
                        "#interiorHtm option[value='" + vehicle.interior + "']"
                    ).prop("selected", true);
                    $(
                        "#fuelType option[value='" + vehicle.fuel_type + "']"
                    ).prop("selected", true);
                    $(
                        "#transmissionHtm option[value='" +
                            vehicle.transmission +
                            "']"
                    ).prop("selected", true);

                    $.each(JSON.parse(vehicle.tags), function (key, value) {
                        if (value !== null) {
                            $(
                                "#vehicleTags option[value='" + value + "']"
                            ).prop("selected", true);
                        }
                    });

                    $(".chzn-select").select2({ allowClear: true });

                    $("#vehicleTags").select2({
                        tags: true,
                        tokenSeparators: [",", " "],
                        maximumSelectionLength: 4,
                    });

                    let featuressss = [];

                    if (vehicle.features !== null && vehicle.features !== []) {
                        $.each(vehicle.features, function (key, value) {
                            featuressss.push(value.id);
                        });
                    }

                    $(".vehicleFeatures").each(function (key, input) {
                        let value = parseInt($(input).val());
                        if ($(input).is(":checked")) {
                            $(input).prop("checked", false);
                        }
                        if ($.inArray(value, featuressss) !== -1) {
                            $(input).prop("checked", true);
                        }
                    });

                    /** Preview Images on edit */
                    // if (
                    //     vehicle.cover_photo !== "" &&
                    //     vehicle.cover_photo !== null
                    // ) {
                    //     let preview = $("#coverPhotoPreview");
                    //     const coverImage = $("<img>")
                    //         .attr(
                    //             "src",
                    //             "/vehicleimages/" + vehicle.cover_photo
                    //         )
                    //         .attr("width", "100%")
                    //         .attr("height", "200px");
                    //     preview.append(coverImage);
                    //     const removeButton = $(
                    //         "<button class='btn btn-outline-danger' id='coverPhotoDelete' data-id='" +
                    //             vehicle.id +
                    //             "'>"
                    //     )
                    //         .html("<i class='fal fa-trash btn-danger'></i>")
                    //         .on("click", function (event) {
                    //             event.preventDefault();
                    //             let $this = $(this),
                    //                 data = {
                    //                     _token: token,
                    //                     vehicle_id: vehicle.id,
                    //                     cover_photo_delete: true,
                    //                 };
                    //             $.post("/image-delete", data).done(function (
                    //                 params
                    //             ) {
                    //                 console.log(params);
                    //                 let result = JSON.parse(params);
                    //                 if (result.status == "success") {
                    //                     preview.remove();
                    //                 }
                    //             }).fail(function(error) {
                    //                 console.log(error);
                    //             });
                    //         });
                    //     preview.append(removeButton);
                    // }

                    if (vehicle.images !== "[]" && vehicle.images !== null) {
                        let previewContainer = $("#image-preview");
                        $.each(
                            JSON.parse(vehicle.images),
                            function (key, value) {
                                let image = $("<img>")
                                    .attr("src", "/vehicleimages/" + value)
                                    .attr("width", "100%")
                                    .attr("height", "200px");
                                let imgpreview = $('<div class="col-md-3">')
                                    .addClass("image-preview")
                                    .append(image);
                                previewContainer.append(imgpreview);
                                const removeButton = $(
                                    "<button class='btn btn-outline-danger' id='imgDeleteBtn' data-id='" +
                                        vehicle.id +
                                        "' data-image='" +
                                        value +
                                        "'>"
                                )
                                    .html(
                                        "<i class='fal fa-trash btn-danger'></i>"
                                    )
                                    .on("click", function (event) {
                                        event.preventDefault();
                                        let $this = $(this),
                                            data = {
                                                _token: token,
                                                vehicle_id: vehicle.id,
                                                image: value,
                                                photo_delete: true,
                                            };
                                        console.log(data);
                                        $.post("/image-delete", data)
                                            .done(function (params) {
                                                console.log(params);
                                                let result = JSON.parse(params);
                                                if (
                                                    result.status == "success"
                                                ) {
                                                    imgpreview.remove();
                                                }
                                            })
                                            .fail(function (error) {
                                                console.error(error);
                                            });
                                    });
                                imgpreview.append(removeButton);
                            }
                        );

                        previewContainer.sortable({
                            containment: "parent",
                            axis: "y",
                            update: function (event, ui) {
                                const newOrder = previewContainer.sortable();
                                const newFiles = new DataTransfer();
                            },
                        });
                    } else {
                    }
                } else {
                    showError(
                        "Error occured when fetching data. Ensure you have internet connection then try agaain.",
                        "#vehiclefeedback"
                    );
                }
            });
        }
    });

    /** Clear form fields */
    clearvehicle.on("click", function (event) {
        event.preventDefault();
        vehicleCreateForm.trigger("reset");
        $(".chzn-select").select2({ allowClear: true });
        $("#image-preview").children().remove();
        $("#coverPhotoPreview").children().remove();

        $("#vehicleTags").select2({
            tags: true,
            tokenSeparators: [",", " "],
            maximumSelectionLength: 4,
        });
    });
    /** Filter Images */

    $("#filterVehiclesForm").on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            dealer_id = filterdealerID.val(),
            token = $this.find("input[name='_token']").val(),
            make_id = filterMakeID.val(),
            model_id = filtermodelID.val(),
            yard_id = filterVehicleYardID.val();
        let data = {
            _token: token,
            dealer_id: dealer_id,
            make_id: make_id,
            model_id: model_id,
            yard_id: yard_id,
        };
        $.post("/vehicles-filter", data)
            .done(function (params) {
                let vehicles = JSON.parse(params);
                let option = "<option value=''>Select One</option>";
                $.each(vehicles, function (key, value) {
                    let { id, vehicle_no, make, model } = value;
                    option +=
                        "<option value='" +
                        id +
                        "'>" +
                        vehicle_no +
                        " " +
                        make.make +
                        " - " +
                        model.model +
                        "</option>";
                });
                filterVehiclesID.html(option);
            })
            .fail(function (error) {
                console.error(error);
            });
    });

    $("#filterVehiclesListForm").on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            dealer_id = filterListDealerID.val(),
            token = $this.find("input[name='_token']").val(),
            make_id = filterListMakeID.val(),
            model_id = filterListModelID.val(),
            yard_id = filterListVehicleYardID.val();
        let data = {
            _token: token,
            dealer_id: dealer_id,
            make_id: make_id,
            model_id: model_id,
            yard_id: yard_id,
        };
        $.post("/vehicles-filter", data, function (params) {
            let vehicles = JSON.parse(params);
            let tr = "",
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
                    // color,
                    // interior,
                    mileage,
                    fuel_type,
                    transmission,
                    status,
                    created_at,
                } = value;
                tr +=
                    "<tr><td><input type='checkbox' class='vehicleselect' id='vehicleSelect' data-id=" +
                    id +
                    "></td><td>" +
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
                    prices[0]?.price +
                    "</td><td>" +
                    enginecc +
                    "</td><td>" +
                    mileage +
                    "</td><td>" +
                    fuel_type +
                    "</td><td>" +
                    transmission +
                    "</td><td>" +
                    moment(new Date(created_at)).format("DD-MM-YYYY") +
                    "</td><td></td></tr>";
            });
            let table =
                '<table class="table table-bordered hover vehicleDataTable "><thead><th>#</th><th>#</th><th>NO</th><th>Dealer</th><th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>CC</th><th>Mileage</th><th>Fuel</th><th>Trans</th><th>created</th><th>Action</th></thead><tbody' +
                tr +
                "</tbody></table>";
            $("#vehicledatasection").html(table);

            if ($.fn.DataTable.isDataTable(".vehicleDataTable")) {
                $(".vehicleDataTable").destroy();
                $(".vehicleDataTable").DataTable({
                    // dom: "Bfrtip",
                    // buttons: [
                    //     "copyHtml5",
                    //     "excelHtml5",
                    //     "csvHtml5",
                    //     "pdfHtml5",
                    // ],
                    sDom: 'T<"clear">Bfrtilp',
                    oTableTools: {
                        sRowSelect: "multi",
                    },
                    select: {
                        style: "multi", // Enable multi-row selection
                        selector: "td:first-child", // Use the first column as the checkbox column
                    },
                });
            } else {
                $(".vehicleDataTable").DataTable({
                    // dom: "Bfrtip",
                    // buttons: [
                    //     "copyHtml5",
                    //     "excelHtml5",
                    //     "csvHtml5",
                    //     "pdfHtml5",
                    // ],
                    sDom: 'T<"clear">Bfrtilp',
                    oTableTools: {
                        sRowSelect: "multi",
                    },
                    select: {
                        style: "multi", // Enable multi-row selection
                        selector: "td:first-child", // Use the first column as the checkbox column
                    },
                });
            }
        });
    });
})();
