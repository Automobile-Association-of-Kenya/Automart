(function () {
    let addNewVehicle = $("#addNewVehicle"),
        newVehicleForm = $("#newVehicleForm"),
        vehicleDealer = $("#vehicleDealer"),
        vehicleType = $("#vehicleType"),
        vehicleMake = $("#vehicleMake"),
        vehicleModel = $("#vehicleModel"),
        countryofOrigin = $("#countryofOrigin"),
        countryLocated = $("#countryLocated"),
        countyID = $("#countyID"),
        filterlistmake = $("#filterlistmake"),
        filterlistdealer = $("#filterlistdealer"),
        filterlistmodel = $("#filterlistmodel");

    addNewVehicle.on("click", function () {
        newVehicleForm.trigger("reset");
    });

    function getDealers() {
        $.getJSON("/vehicles/dealers").done((dealers) => {
            console.log(dealers);
            var option = "<option value=\"0\">Select One</option>";
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
        $.getJSON("/vehicles/types").done((types) => {
            console.log(types);
            console.log("here");
            var option = "<option value=\"0\">Select One</option>";
            $.each(types, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleType.html(option);
        });
    }
    getVehicleTypes();

    function getVehicleMakes() {
        $.getJSON("/vehicles/makes", function(makes) {
            console.log(makes);
            var option = "<option value=\"0\">Select One</option>";
            $.each(makes, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleMake.html(option);
            filterlistmake.html(option);
        });
    }

    getVehicleMakes();

    function getCountries() {
        $.getJSON("/countries").done((countries) => {
            var option = "<option value=\"0\">Select One</option>";
            $.each(countries, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            countryofOrigin.html(option);
            countryLocated.html(option);
        });
    }

    getCountries();

    function getCounties(country_id) {
        $.getJSON("/counties/" + country_id).done((counties) => {
            var option = "<option value=\"0\">Select One</option>";
            $.each(counties, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            countyID.html(option);
        });
    }

    function getVehicleModels(make_id) {
        $.getJSON("/vehicles/models/" + make_id).done((models) => {
            var option = "<option value=\"0\">Select One</option>";
            $.each(models, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            vehicleModel.html(option);
        });
    }

    function getVehicleFilterModels(make_id) {
        $.getJSON("/vehicles/models/" + make_id).done((models) => {
            var option = "<option value=\"0\">Select One</option>";
            $.each(models, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            filterlistmodel.html(option);
        });
    }

    countryLocated.on("change", function () {
        let country_id = $(this).val();
        if (country_id !== "") {
            getCounties(country_id);
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

    filterlistmake.on('change', function () {
        let make_id = $(this).val();
        if (make_id !== 0) {
            getVehicleFilterModels(make_id);
        }
    });


})();
