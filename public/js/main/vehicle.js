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
        yardToggle = $("#yardToggle");
    yardInput.hide();

    addNewVehicle.on("click", function () {
        newVehicleForm.trigger("reset");
    });

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
                    '</td><td><i class="fa fa-edit text-warning" id="editMakeToggle"></i><i class="fa fa-trash text-danger" id="deleteMakeToggle"></i></td></tr>';
            });
            vehicleMake.html(option);
            filterlistmake.html(option);
            let table =
                '<table class="table table-sm"><thead><th>#</th><th>Make</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#MakesTableSectiontion").html(table);
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
            shippingTo.html(option1);
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
                let { id, model } = value;
                option += "<option value=" + id + ">" + model + "</option>";

                if (make_id == null) {
                    tr +=
                        "<tr><td>" +
                        i++ +
                        "</td><td>" +
                        make +
                        "</td><td>" +
                        model +
                        '</td><td><i class="fa fa-edit text-warning" id="editModelToggle"></i><i class="fa fa-trash text-danger" id="deleteModelToggle"></i></td></tr>';
                }
            });
            vehicleModel.html(option);
        });
    }

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
        $.getJSON("features", function (features) {
            let label = "",
                tr = "",
                i = 1;
            $.each(features, function (key, value) {
                let { id, feature, description } = value;
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
                    description +
                    '</td><td><i class="fa fa-edit text-warning" id="editFeatureToggle"></i><i class="fa fa-trash text-danger" id="deleteFeatureToggle"></i></td></tr>';
            });
            $("#featuresSection").html(label);
            let table =
                '<table class="table table-sm"><thead><th>#</th><th>Feature</th><th>Description</th><th>Action</th></thead><tbody>' +
                tr +
                "</tbody></table>";
            $("#featuresTab").html(table);
        });
    }

    getVehicleFeatures();

    function getDealerYards(dealer_id) {
        $.getJSON('dealer-yards/' + dealer_id, function (yards) {
            let option = "<option value=\"\">Select One</option>";
            $.each(yards, function (key, value) {
                option += "<option value=" + value.id + ">" + value.name + "</option>"
            });
            $("#yardID").html(option);
        })
    }

    // countryLocated.on("change", function () {
    //     let country_id = $(this).val();
    //     if (country_id !== "") {
    //         getCounties(country_id);
    //     }
    // });

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

    yardToggle.on('change', function () {
        console.log("thssrs");
        if ($(this).is(':checked')) {
            locationInput.hide();
            yardInput.show();
        } else {
            locationInput.show();
            yardInput.hide();
        }
    });

    vehicleDealer.on('change', function() {
        let id = $(this).val();
        getDealerYards(id);
    });

})();
