(function () {
    function numberFormat(number, decimals) {
        decimals = decimals || 0;

        var parts = number.toFixed(decimals).split(".");
        var integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        var formattedNumber = integerPart;

        if (parts.length > 1) {
            var decimalPart = parts[1];
            formattedNumber += "." + decimalPart;
        }
        return formattedNumber;
    }

   

    // let filterVehicleType = $("#filterVehicleType"),
    //     filterMakesID = $("#filterMakesID"),
    //     usageID = $("#usage"),
    //     filterYear = $("#filterYear"),
    //     countiesID = $("#countiesID"),
    //     filterTransmission = $("#filterTransmission");
    // $("#vehiclesSearchForm").on("submit", function (event) {
    //     event.preventDefault();
    //     let price = $("#priceSlider").slider("values");
    //     let type_id = filterVehicleType.val(),
    //         make_id = filterMakesID.val(),
    //         usage = usageID.val(),
    //         year = filterYear.val(),
    //         county_id = countiesID.val(),
    //         transmission = filterTransmission.val(),
    //         $this = $(this);
    //     let data = {
    //         _token: $this.find("input[name='_token']").val(),
    //         type_id: type_id,
    //         make_id: make_id,
    //         usage: usage,
    //         year: year,
    //         county_id: county_id,
    //         transmission: transmission,
    //         price: price,
    //     };
    //     console.log(data);
    //     $.getJSON("/vehicles-search", data)
    //         .done(function (data) {
    //             let vehicles = data.data;
    //             $("#countResults").html(vehicles.length);
    //             $("#pagination").html(data.links);

    //             let vehicle = "";
    //             $.each(vehicles, function (key, value) {
    //                 let images = JSON.parse(value.images),
    //                     tags = JSON.parse(value.tags);
    //                 var price =
    //                     value.price !== null
    //                         ? parseFloat(value.price).toFixed(2)
    //                         : 0;
    //                 var mileage = value.mileage !== null ? value.mileage : 0;

    //                 let img =
    //                     '<a href="#' +
    //                     images[0] +
    //                     '" class="overlap-btn" data-sub-html="<h4>' +
    //                     value.model.model +
    //                     "</h4><p>" +
    //                     value.description +
    //                     '</p>"><i class="fa fa-expand"></i><img class="hidden" src="/vehicleimages/' +
    //                     images[0] +
    //                     '" alt="hidden-img"></a>';
    //                 $.each(images, function (key, image) {
    //                     img +=
    //                         '<a href="//' +
    //                         image +
    //                         '" class="hidden" data-sub-html="<h4>' +
    //                         value.model.model +
    //                         "</h4><p>" +
    //                         value.description +
    //                         '</p>"><img src="/vehicleimages/' +
    //                         image +
    //                         '" alt="hidden-img"></a>';
    //                 });

    //                 vehicle +=
    //                     '<div class="col-lg-4 col-md-4"><div class="car-box-3"><div class="car-thumbnail"><a href="/vehicle-details/' +
    //                     value.id +
    //                     '" class="car-img" ><div class="tag-2 bg-active">' +
    //                     value.usage +
    //                     '</div><div class="price-box"><span><span>Kes: ' +
    //                     price.toLocaleString("en-US", {
    //                         style: "currency",
    //                         currency: "KSH",
    //                     }) +
    //                     '</span></div><img class="d-block w-100" src="/vehicleimages/' +
    //                     images[0] +
    //                     '" alt="car"></a><div class="carbox-overlap-wrapper"><div class="overlap-box"><div class="overlap-btns-area"><a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal" id="vehicleDetailsModalToggle" data-id="' +
    //                     value.id +
    //                     '"><i class="fa fa-eye-slash"></i></a><a class="overlap-btn wishlist-btn" data-id="vehicleLike" id="' +
    //                     value.id +
    //                     '"><i class="fa fa-heart-o"></i></a><div class="car-magnify-gallery">' +
    //                     img +
    //                     '</div></div></div></div></div><div class="detail"><h1 class="title"><a href="/vehicle-details/' +
    //                     value.id +
    //                     '">' +
    //                     value.make.make +
    //                     " " +
    //                     value.model.model +
    //                     " " +
    //                     value.year +
    //                     '</a></h1><ul class="custom-list"><li><a href="#">' +
    //                     value.usage +
    //                     '</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li><li><a href="#">' +
    //                     value.transmission +
    //                     '</a>&nbsp;&nbsp;|</li><li><a href="#">' +
    //                     value.type.type +
    //                     '</a></li></ul><ul class="facilities-list clearfix"><li><i class="flaticon-fuel"></i>' +
    //                     value.fuel_type +
    //                     '</li><li><i class="flaticon-way"></i>&nbsp;' +
    //                     mileage +
    //                     ' km</li><li><i class="flaticon-gear"></i>&nbsp;' +
    //                     value.color +
    //                     "</li></ul></div></div></div>";
    //             });
    //             $("#vehiclesection").html(vehicle);
    //         })
    //         .fail(function (error) {
    //             console.log(error);
    //         });
    // });

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

        var parts = parseFloat(number).toFixed(decimals).split(".");
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

    // function getLatestCars() {
    //     $.getJSON("/new-arrivals", function (data) {
    //         let div = "",
    //             vehicles = data.data;
    //         $.each(vehicles, function (key, vehicle) {
    //             let images = JSON.parse(vehicle.images),
    //                 mileage = vehicle.mileage !== null ? vehicle.mileage : 0;
    //             let imagessection = "";
    //             var price = vehicle.price !== null ? vehicle.price : 0;
    //             $.each(images, function (key, value) {
    //                 imagessection +=
    //                     '<a href="#' +
    //                     value +
    //                     '" class="hidden" data-sub-html="<h4>' +
    //                     vehicle.model.model +
    //                     "</h4><p>" +
    //                     vehicle.description +
    //                     '</p>"><img src="/vehicleimages/' +
    //                     vehicle.description +
    //                     '" alt="hidden-img"></a>';
    //             });
    //             div +=
    //                 '<div class="col-lg-4 col-md-6"><div class="car-box-3"><div class="car-thumbnail"><a href="/vehicle-details/' +
    //                 vehicles.id +
    //                 '" class="car-img"><div class="for">' +
    //                 vehicle.usage +
    //                 '</div><div class="price-box"><span class="del"><del></del></span><br><span class="text text-warning">Kes:' +
    //                 numberFormat(price, 2) +
    //                 '</span></div><img class="d-block w-100" src="/vehicleimages/' +
    //                 images[0] +
    //                 '" alt="car"></a><div class="carbox-overlap-wrapper"><div class="overlap-box"><div class="overlap-btns-area"><a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal" data-id="' +
    //                 vehicle.id +
    //                 '" id="vehicleDetailsModalToggle"><i class="fa fa-eye-slash"></i></a><a class="overlap-btn wishlist-btn"><i class="fa fa-heart-o"></i></a><div class="car-magnify-gallery"><a href="/vehicleimages/' +
    //                 vehicle.id +
    //                 '" class="overlap-btn" data-sub-html="<h4>' +
    //                 vehicle.model.model +
    //                 "</h4><p>" +
    //                 vehicle.description +
    //                 '</p>"><i class="fa fa-expand"></i> <img class="hidden" src="/vehicleimages/' +
    //                 images[0] +
    //                 '" alt="hidden-img"> </a>' +
    //                 imagessection +
    //                 '</div></div></div></div></div> <div class="detail"><h1 class="title"><a href="/vehicle-details/' +
    //                 vehicle.id +
    //                 '">' +
    //                 vehicle.year +
    //                 " " +
    //                 vehicle.make.make +
    //                 " " +
    //                 vehicle.model.model +
    //                 '</a></h1><ul class="custom-list"><li><a href="+vehicles/' +
    //                 vehicle.id +
    //                 ">" +
    //                 vehicle.usage +
    //                 '</a>&nbsp;|&nbsp;</li> <li><a href="#">' +
    //                 vehicle.transmission +
    //                 '</a> &nbsp;|&nbsp;</li> <li><a href="#">' +
    //                 vehicle.fuel_type +
    //                 '</a></li></ul> <ul class="facilities-list clearfix"><li><i class="flaticon-way"></i>' +
    //                 mileage +
    //                 ' km </li><li><i class="flaticon-gear"></i> ' +
    //                 vehicle.enginecc +
    //                 ' cc</li></ul></div><div class="footer"><div class="row mb-2 mt-2"><div class="col-md-3 col-md-3 text-center"><a href="#" id="whatsappToggle"><i class="fa fa-whatsapp text-success fa-2x"></i></a></div><div class="col-md-3 col-md-3 text-center"><a href="/buy/' +
    //                 vehicle.id +
    //                 '" class="btn btn-outline-warning text-success"><i class="fa fa-hand-heart"></i> Buy</a></div><div class="col-md-6 col-md-6 text-center"><a href="/loan/' +
    //                 vehicle.id +
    //                 '" class="btn btn-outline-warning text-success"><i class="fa fa-hand-heart"></i> Apply Loan</a></div></div></div></div></div>';
    //         });
    //         $("#latestCarsSection").html(div);
    //         $("#latestCarsSection").append(
    //             '<div class="col-lg-12 text-center"><a class="btn-9 btn bg-white" href="new-vehicles"><span></span><span></span><span></span><span></span><strong>View More</strong></a></div>'
    //         );
    //     });
    // }
    // getLatestCars();

    // function getDiscountedVehicles() {
    //     $.getJSON("/discounts", function (vehicles) {
    //         let div = "";
    //         $.each(vehicles, function (key, vehicle) {
    //             let images = JSON.parse(vehicle.images),
    //                 mileage = vehicle.mileage !== null ? vehicle.mileage : 0;
    //             let imagessection = "";
    //             $.each(images, function (key, value) {
    //                 imagessection +=
    //                     '<a href="#' +
    //                     value +
    //                     '" class="hidden" data-sub-html="<h4>' +
    //                     vehicle.model.model +
    //                     "</h4><p>" +
    //                     vehicle.description +
    //                     '</p>"> <img src="/vehicleimages/' +
    //                     vehicle.description +
    //                     '" alt="hidden-img"></a>';
    //             });
    //             div +=
    //                 '<div class="col-lg-4 col-md-6"><div class="car-box-3"><div class="car-thumbnail"><a href="/vehicle-details/' +
    //                 vehicles.id +
    //                 '" class="car-img"><div class="for">' +
    //                 vehicle.usage +
    //                 '</div><div class="price-box"><span class="del"><del>' +
    //                 numberFormat(vehicle.initial_price, 2) +
    //                 "</del></span><br><span>Kes: " +
    //                 numberFormat(vehicle.current_price, 2) +
    //                 '</span></div><img class="d-block w-100" src="/vehicleimages/' +
    //                 images[0] +
    //                 '" alt="car"></a><div class="carbox-overlap-wrapper"><div class="overlap-box"><div class="overlap-btns-area"><a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal" data-id="' +
    //                 vehicle.id +
    //                 '" id="vehicleDetailsModalToggle"><i class="fa fa-eye-slash"></i></a><a class="overlap-btn wishlist-btn"><i class="fa fa-heart-o"></i></a><div class="car-magnify-gallery"><a href="/vehicleimages/' +
    //                 vehicle.id +
    //                 '" class="overlap-btn" data-sub-html="<h4>' +
    //                 vehicle.model.model +
    //                 "</h4><p>" +
    //                 vehicle.description +
    //                 '</p>"><i class="fa fa-expand"></i> <img class="hidden" src="/vehicleimages/' +
    //                 images[0] +
    //                 '" alt="hidden-img"> </a>' +
    //                 imagessection +
    //                 '</div></div></div></div></div> <div class="detail"><h1 class="title"><a href="/vehicle-details/' +
    //                 vehicle.id +
    //                 '">' +
    //                 vehicle.year +
    //                 " " +
    //                 vehicle.make.make +
    //                 " " +
    //                 vehicle.model.model +
    //                 '</a></h1><ul class="custom-list"><li><a href="+vehicles/' +
    //                 vehicle.id +
    //                 ">" +
    //                 vehicle.usage +
    //                 '</a>&nbsp;|&nbsp;</li> <li><a href="#">' +
    //                 vehicle.transmission +
    //                 '</a> &nbsp;|&nbsp;</li> <li><a href="#">' +
    //                 vehicle.fuel_type +
    //                 '</a></li></ul> <ul class="facilities-list clearfix"><li><i class="flaticon-way"></i>' +
    //                 mileage +
    //                 ' km </li><li><i class="flaticon-gear"></i> ' +
    //                 vehicle.enginecc +
    //                 ' cc</li></ul></div><div class="footer"><div class="row mb-2 mt-2"><div class="col-md-3 col-md-3 text-center"><a href="#" id="whatsappToggle"><i class="fa fa-whatsapp text-success fa-2x"></i></a></div><div class="col-md-3 col-md-3 text-center"><a href="/buy/' +
    //                 vehicle.id +
    //                 '" class="btn btn-outline-warning text-success"><i class="fa fa-hand-heart"></i> Buy</a></div><div class="col-md-6 col-md-6 text-center"><a href="/loan/' +
    //                 vehicle.id +
    //                 '" class="btn btn-outline-warning text-success"><i class="fa fa-hand-heart"></i> Apply Loan</a></div></div></div></div></div>';
    //         });
    //         // for (let i = 0; i < vehicles.length; i++) {
    //         //     let vehicle = vehicles[i];
    //         //     console.log(vehicle);
    //         // }

    //         $("#vehiclesonoffer").html(div);
    //     });
    // }

    // getDiscountedVehicles();
    // function discounts() {
    //     $.getJSON("/discounts", function (vehicles) {
    //         let div = "";
    //         $.each(vehicles, function (index, item) {
    //             var images = JSON.parse(item.images);
    //             var colDiv = $("<div>").addClass("col-lg-4 col-md-6");
    //             var carBox = $("<div>").addClass("car-box-3");
    //             var carThumbnail = $("<div>").addClass("car-thumbnail");
    //             var carImg = $("<a>")
    //                 .attr("href", "/vehicle-details/" + item.id)
    //                 .addClass("car-img");
    //             var forDiv = $("<div>").addClass("for").text(item.usage);
    //             var priceBox = $("<div>").addClass("price-box");
    //             var delSpan = $("<span>")
    //                 .addClass("del")
    //                 .html("<del>" + item.initial_price.toFixed(2) + "</del>");
    //             var br = $("<br>");
    //             var kesSpan = $("<span>").text(
    //                 "Kes: " + item.current_price.toFixed(2)
    //             );
    //             var img = $("<img>")
    //                 .addClass("d-block w-100")
    //                 .attr("src", "/vehicleimages/" + (images[0] || ""));
    //             var carboxOverlapWrapper = $("<div>").addClass(
    //                 "carbox-overlap-wrapper"
    //             );
    //             var overlapBox = $("<div>").addClass("overlap-box");
    //             var overlapBtnsArea = $("<div>").addClass("overlap-btns-area");
    //             var eyeBtn = $("<a>")
    //                 .addClass("overlap-btn")
    //                 .attr({
    //                     "data-bs-toggle": "modal",
    //                     "data-bs-target": "#carOverviewModal",
    //                     "data-id": item.id,
    //                     id: "vehicleDetailsModalToggle",
    //                 })
    //                 .html('<i class="fa fa-eye-slash"></i>');
    //             var wishlistBtn = $("<a>")
    //                 .addClass("overlap-btn wishlist-btn")
    //                 .html('<i class="fa fa-heart-o"></i>');
    //             var carMagnifyGallery = $("<div>").addClass(
    //                 "car-magnify-gallery"
    //             );

    //             var firstImageLink = $("<a>")
    //                 .attr("href", "/vehicleimages/" + (images[0] || ""))
    //                 .addClass("overlap-btn")
    //                 .attr(
    //                     "data-sub-html",
    //                     "<h4>" +
    //                         item.model.model +
    //                         "</h4><p>" +
    //                         item.description +
    //                         "</p>"
    //                 )
    //                 .html(
    //                     '<i class="fa fa-expand"></i><img class="hidden" src="/vehicleimages/' +
    //                         (images[0] || "") +
    //                         '" alt="hidden-img">'
    //                 );
    //             carMagnifyGallery.append(firstImageLink);

    //             $.each(images, function (index, image) {
    //                 var imageLink = $("<a>")
    //                     .attr("href", "/vehicleimages/" + image)
    //                     .addClass("hidden")
    //                     .attr(
    //                         "data-sub-html",
    //                         "<h4>" +
    //                             item.model.model +
    //                             "</h4><p>" +
    //                             item.description +
    //                             "</p>"
    //                     )
    //                     .html(
    //                         '<img src="/vehicleimages/' +
    //                             image +
    //                             '" alt="hidden-img">'
    //                     );
    //                 carMagnifyGallery.append(imageLink);
    //             });

    //             overlapBtnsArea.append(eyeBtn, wishlistBtn, carMagnifyGallery);
    //             overlapBox.append(overlapBtnsArea);
    //             carboxOverlapWrapper.append(overlapBox);
    //             carThumbnail.append(carImg, carboxOverlapWrapper);
    //             priceBox.append(delSpan, br, kesSpan);
    //             carImg.append(forDiv, priceBox, img);
    //             carBox.append(carThumbnail);

    //             $.each(images, function (index, image) {
    //                 // Code inside this loop doesn't seem to have any specific functionality in the provided code.
    //                 // It can be removed unless there is some additional logic you want to implement.
    //             });

    //             var detailDiv = $("<div>").addClass("detail");
    //             var titleH1 = $("<h1>").addClass("title");
    //             var titleLink = $("<a>")
    //                 .attr("href", "/vehicle-details/" + item.id)
    //                 .text(
    //                     item.year +
    //                         " " +
    //                         item.make.make +
    //                         " " +
    //                         item.model.model
    //                 );
    //             titleH1.append(titleLink);
    //             var customList = $("<ul>").addClass("custom-list");
    //             var usageItem = $("<li>").append(
    //                 $("<a>")
    //                     .attr("href", "/vehicles/show/" + item.id)
    //                     .text(item.usage),
    //                 " | "
    //             );
    //             var transmissionItem = $("<li>").append(
    //                 $("<a>").attr("href", "#").text(item.transmission),
    //                 " | "
    //             );
    //             var fuelTypeItem = $("<li>").append(
    //                 $("<a>").attr("href", "#").text(item.fuel_type)
    //             );
    //             customList.append(usageItem, transmissionItem, fuelTypeItem);
    //             var facilitiesList = $("<ul>").addClass(
    //                 "facilities-list clearfix"
    //             );
    //             var mileageItem = $("<li>").html(
    //                 '<i class="flaticon-way"></i> ' +
    //                     (item.mileage || 0) +
    //                     " km"
    //             );
    //             var engineCCItem = $("<li>").html(
    //                 '<i class="flaticon-gear"></i> ' + item.enginecc + " cc"
    //             );
    //             facilitiesList.append(mileageItem, engineCCItem);
    //             detailDiv.append(titleH1, customList, facilitiesList);

    //             var footerDiv = $("<div>").addClass("footer");
    //             var dFlexDiv = $("<div>").addClass("d-flex mb-2 mt-2");
    //             var colMd3_1 = $("<div>").addClass("col-md-3 text-center");
    //             var whatsappToggleLink = $("<a>")
    //                 .attr("href", "#")
    //                 .attr("id", "whatsappToggle")
    //                 .append(
    //                     $("<i>").addClass("fa fa-whatsapp text-success fa-2x")
    //                 );
    //             var colMd3_2 = $("<div>").addClass("col-md-3 text-center");
    //             var buyLink = $("<a>")
    //                 .attr("href", "/buy/" + (item.vehicle_no || item.id))
    //                 .addClass("btn btn-outline-warning text-success")
    //                 .html('<i class="fa fa-hand-heart"></i> Buy');
    //             var colMd6 = $("<div>").addClass("col-md-6 text-center");
    //             var applyLoanLink = $("<a>")
    //                 .attr("href", "/loan/" + (item.vehicle_no || item.id))
    //                 .addClass("btn btn-outline-warning text-success")
    //                 .html('<i class="fa fa-hand-heart"></i> Apply Loan');
    //             colMd3_1.append(whatsappToggleLink);
    //             colMd3_2.append(buyLink);
    //             colMd6.append(applyLoanLink);
    //             dFlexDiv.append(colMd3_1, colMd3_2, colMd6);
    //             footerDiv.append(dFlexDiv);

    //             colDiv.append(carBox);
    //             $("#vehiclesonoffer").find("#offerloader").remove();
    //             $("#vehiclesonoffer").append(colDiv);
    //         });
    //     });
    // }
    // discounts();
})();
