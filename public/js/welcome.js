(function () {
    function getTypesWithVehicle() {
        $.getJSON("/types-with-vehicles", function (makes) {
            let item = "",
                option = '<option value="">All</option>',
                li = "";
            $.each(makes, function (key, value) {
                li +=
                    '<li><a href="/type-vehicles/' +
                    value.id +
                    '">' +
                    value.type +
                    "</a></li>";
                item +=
                    '<a class="dropdown-item" href="/type-vehicles/' +
                    value.id +
                    '">' +
                    value.type +
                    "</a>";
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.type +
                    "</option>";
            });
            $("#filterMakesID").html(option);
            $("#vehicleGroupTypes").append(item);
            $("#vehicleGroupType").append(li);
            $("#filterVehicleType").html(option);
            let currenttype = $("#currentType").val();
            $("#filterVehicleType option[value=" + currenttype + "]").prop(
                "selected",
                true
            );
        });
    }
    getTypesWithVehicle();



    let filterVehicleType = $("#filterVehicleType"),
        filterMakesID = $("#filterMakesID"),
        usageID = $("#usage"),
        filterYear = $("#filterYear"),
        countiesID = $("#countiesID"),
        filterTransmission = $("#filterTransmission");
    $("#vehiclesSearchForm").on("submit", function (event) {
        event.preventDefault();
        let price = $("#priceSlider").slider("values");
        let type_id = filterVehicleType.val(),
            make_id = filterMakesID.val(),
            usage = usageID.val(),
            year = filterYear.val(),
            county_id = countiesID.val(),
            transmission = filterTransmission.val(),
            $this = $(this);
        let data = {
            _token: $this.find("input[name='_token']").val(),
            type_id: type_id,
            make_id: make_id,
            usage: usage,
            year: year,
            county_id: county_id,
            transmission: transmission,
            price: price,
        };
        console.log(data);
        $.getJSON("/vehicles-search", data)
            .done(function (data) {
                let vehicles = data.data;
                $("#countResults").html(vehicles.length);
                $("#pagination").html(data.links);

                let vehicle = "";
                $.each(vehicles, function (key, value) {
                    let images = JSON.parse(value.images),
                        tags = JSON.parse(value.tags);
                    var price =
                        value.price !== null
                            ? parseFloat(value.price).toFixed(2)
                            : 0;
                    var mileage = value.mileage !== null ? value.mileage : 0;

                    let img =
                        '<a href="/vehicleimages/' +
                        images[0] +
                        '" class="overlap-btn" data-sub-html="<h4>' +
                        value.model.model +
                        "</h4><p>" +
                        value.description +
                        '</p>"><i class="fa fa-expand"></i><img class="hidden" src="/vehicleimages/' +
                        images[0] +
                        '" alt="hidden-img"></a>';
                    $.each(images, function (key, image) {
                        img +=
                            '<a href="//' +
                            image +
                            '" class="hidden" data-sub-html="<h4>' +
                            value.model.model +
                            "</h4><p>" +
                            value.description +
                            '</p>"><img src="/vehicleimages/' +
                            image +
                            '" alt="hidden-img"></a>';
                    });

                    vehicle +=
                        '<div class="col-lg-4 col-md-4"><div class="car-box-3"><div class="car-thumbnail"><a href="/vehicle-details/' +
                        value.id +
                        '" class="car-img" ><div class="tag-2 bg-active">' +
                        value.usage +
                        '</div><div class="price-box"><span><span>Kes: ' +
                        price.toLocaleString("en-US", {
                            style: "currency",
                            currency: "KSH",
                        }) +
                        '</span></div><img class="d-block w-100" src="/vehicleimages/' +
                        images[0] +
                        '" alt="car"></a><div class="carbox-overlap-wrapper"><div class="overlap-box"><div class="overlap-btns-area"><a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal" id="vehicleDetailsModalToggle" data-id="' +
                        value.id +
                        '"><i class="fa fa-eye-slash"></i></a><a class="overlap-btn wishlist-btn" data-id="vehicleLike" id="' +
                        value.id +
                        '"><i class="fa fa-heart-o"></i></a><div class="car-magnify-gallery">' +
                        img +
                        '</div></div></div></div></div><div class="detail"><h1 class="title"><a href="/vehicle-details/' +
                        value.id +
                        '">' +
                        value.make.make +
                        " " +
                        value.model.model +
                        " " +
                        value.year +
                        '</a></h1><ul class="custom-list"><li><a href="#">' +
                        value.usage +
                        '</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li><li><a href="#">' +
                        value.transmission +
                        '</a>&nbsp;&nbsp;|</li><li><a href="#">' +
                        value.type.type +
                        '</a></li></ul><ul class="facilities-list clearfix"><li><i class="flaticon-fuel"></i>' +
                        value.fuel_type +
                        '</li><li><i class="flaticon-way"></i>&nbsp;' +
                        mileage +
                        ' km</li><li><i class="flaticon-gear"></i>&nbsp;' +
                        value.color +
                        "</li></ul></div></div></div>";
                });
                $("#vehiclesection").html(vehicle);
            })
            .fail(function (error) {
                console.log(error);
            });
    });



    function getServices() {
        $.getJSON("/services-get", function (services) {
            let service = "",
                i = 1;
            $.each(services, function (key, value) {
                service +=
                    '<div class="col-lg-6 col-md-6 col-sm-12"><div class="single-info"><div class="number">' +
                    i++ +
                    '</div><div class="icon"><div class="icon-inner"><i class="flaticon-shield"></i></div></div><h2><a href="/service/' +
                    value.id +
                    '">' +
                    value.service +
                    "</a></h2><p>" +
                    value.description +
                    "</p></div></div>";
            });
            $("#servicesSection").html(service);
        });
    }
    getServices();



     function numberFormat(
         number,
         decimals,
         decimalSeparator,
         thousandSeparator
     ) {
         decimals = decimals || 0;
         decimalSeparator = decimalSeparator || ".";
         thousandSeparator = thousandSeparator || ",";

         var parts = number.toFixed(decimals).split(".");
         var integerPart = parts[0].replace(
             /\B(?=(\d{3})+(?!\d))/g,
             thousandSeparator
         );
         var formattedNumber = integerPart;

         if (parts.length > 1) {
             var decimalPart = parts[1];
             formattedNumber += decimalSeparator + decimalPart;
         }

         return formattedNumber;
     }


    function getLatestCars() {
        $.getJSON("/new-arrivals", function (data) {
            let vehicle = "",
                vehicles = data.data;
            $.each(vehicles, function (key, value) {
                let images = JSON.parse(value.images),
                    tags = JSON.parse(value.tags);
                var price =
                    value.price !== null
                        ? parseFloat(value.price).toFixed(2)
                        : 0;
                var mileage = value.mileage !== null ? value.mileage : 0;
                var location =
                    value.location !== null
                        ? value.location
                        : value.yard !== null
                        ? value.yard.address
                        : "";
                vehicle +=
                    '<div class="col-md-4 slide slide-box"><div class="car-box"><div class="car-image"><img class="d-block w-100" src="vehicleimages/' +
                    images[0] +
                    '" alt="car-photo"><div class="tag">' +
                    value.usage +
                    '</div><div class="facilities-list clearfix"><ul><li><i class="flaticon-way"></i>' +
                    value.mileage +
                    'km</li><li><i class="flaticon-calendar-1"></i>' +
                    value.year +
                    '</li><li><i class="flaticon-manual-transmission"></i>' +
                    value.transmission +
                    '</li></ul></div></div><div class="detail"><h1 class="title"><a href="vehicle-details/' +
                    value.id +
                    '">' +
                    value.make.make +
                    " " +
                    value.model.model +
                    '</a></h1><div class="' +
                    location +
                    '"><a href="/vehicle-details/' +
                    value.id +
                    '"><i class="flaticon-pin"></i>' +
                    location +
                    '</a></div></div><div class="footer"><div class="pull-right"><p class="price"><span>Kes: </span>' +
                    numberFormat(parseFloat(value.price), 2, ".", ",") +
                    "</p></div></div></div></div>";
            });
            $("#latestCarsSection").html(vehicle);

            $("#latestCarsSection").append(
                '<div class="col-lg-12 text-center"><a class="btn-9 btn bg-white" href="new-vehicles"><span></span><span></span><span></span><span></span><strong>View More</strong></a></div>'
            );
        });
    }
    getLatestCars();

     function getVehiclesOnOffer() {
         $.getJSON("/discounts", function (vehicles) {
             let div = "";
             for (let i = 0; i < 9; i++) {
                 div += ""
             }
         });
     }

    getVehiclesOnOffer();
})();
