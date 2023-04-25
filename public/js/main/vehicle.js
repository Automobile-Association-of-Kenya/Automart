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
        modelMakeID = $("#modelMakeID");
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
        });
    }

    getDealers();

    function getVehicleTypes() {
        $.getJSON("/types", function (types) {
            var option = '<option value="0">Select One</option>';
            $.each(types, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleType.html(option);
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
                '<table class="table table-sm table-bordered table-striped mt-2"><thead><th>#</th><th>Make</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#makesTableSection").html(table);
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
                        '><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteModelToggle" data-id=' +
                        id +
                        '><i class="fasfa-trash text-danger"></i></a></td></tr>';
                }
            });
            vehicleModel.html(option);
            if (make_id == null) {
                let table =
                    "<table class='table table-bordered table-sm table-striped mt-2'><thead><th>#</th><th>Make</th><th>Model</th><th>Action</th></thead><tbody>" +
                    tr +
                    "</tbody></table>";
                $("#modelsTableSection").html(table);
                // $("#modelsTableSection").DataTable();
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
                let descript = description !== undefined ? description : "";
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
                    '</td><td><a href="#" id="editFeatureToggle"><i class="fas fa-edit text-warning"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" id="deleteFeatureToggle"><i class="fas fa-trash text-danger"></i></a></td></tr>';
            });

            $("#featuresSection").html(label);
            let table =
                '<table class="table table-sm table-bordered table-striped mt-2"><thead><th>#</th><th>Feature</th><th>Description</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#featureseSection").html(table);
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
            let tr = "", option ="",
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
                    transmission, status
                } = value;
                option =+ "<option value="+id+">"+vehicle_no+make.make.model.model+"</option>"
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
                '<table class="table table-bordered table-striped table-sm dataTable mt-2"><thead><th>#</th><th>NO</th><th>Dealer</th><th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>Engine CC</th><th>Color</th><th>Interior</th><th>Mileage</th><th>F Type</th><th>Transmission</th><th>Status</th><th>Added at</th><th>Action</th></thead><tbody' +
                tr +
                "</tbody></table>";
            $("#vehicleslist").html(option);
            $("#vehicleListTab").html(table);
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

    let makeCreateForm = $("#makeCreateForm"),
        modelCreateForm = $("#modelCreateForm"),
        featureCreateForm = $("#featureCreateForm");

    makeCreateForm.on("submit", function (event) {
        event.preventDefault();
        let $this = $(this),
            makeName = $("#makeName"),
            token = $("input[name='_token']").val(),
            submit = $this.find("button[type='submit']"),
            make_id = $("#makeCreateID").val();

        submit.prop({ disabled: true });

        if (make !== "" && make !== undefined) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            $.ajax({
                type: "POST",
                url: "/makes",
                data: { make_id: make_id, make: makeName.val() },
                success: function (params) {
                    console.log(params);
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#makefeedback");
                    } else {
                        showError(result.error, "#makefeedback");
                    }
                    $this.trigger("reset");
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
            modelMakeID = $("#modelMakeID"),
            modelName = $("#modelName"),
            token = $this.find("input[name='_token']").val(),
            submit = $this.find("button[type='submit']"),
            modelID = $("#modelID");
        submit.prop({ disabled: true });

        let data = {
            model_id: modelID.val(),
            make_id: modelMakeID.val(),
            model: modelName.val(),
        };

        if (model !== "" && model !== undefined) {
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
                    } else {
                        showError(result.error, "#modelfeedback");
                    }
                    $this.trigger("reset");
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
            feature_id = $("#featureCreateID"),
            featureName = $("#featureName"),
            submit = $this.find("input[type='submit']");
        let data = {
            feature_id: feature_id.val(),
            feature: featureName.val(),
        };
        if (data.feature !== null) {
            $.ajaxSetup({
                type: "POST",
                url: "/features",
                data: data,
                success: function (params) {
                    let result = JSON.parse(params);
                    if (result.status == "success") {
                        showSuccess(result.message, "#featurefeedback");
                    } else {
                        showError(result.error, "#featurefeedback");
                    }
                    $this.trigger("reset");
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
})();
