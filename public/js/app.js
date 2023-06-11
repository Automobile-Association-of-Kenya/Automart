$(function () {
    "use strict";

    // Showing page loader
    $(window).on("load", function () {
        populateColorPlates();
        setTimeout(function () {
            $(".page_loader").fadeOut("fast");
        }, 100);

        if ($("body .filter-portfolio").length > 0) {
            $(function () {
                $(".filter-portfolio").filterizr({
                    delay: 0,
                });
            });
            $(".filteriz-navigation li").on("click", function () {
                $(".filteriz-navigation .filtr").removeClass("active");
                $(this).addClass("active");
            });
        }
    });

    // Made the left sidebar's min-height to window's height
    var winHeight = $(window).height();
    $(".dashboard-nav").css("min-height", winHeight);

    // Magnify activation
    $(".portfolio-item").magnificPopup({
        delegate: "a",
        type: "image",
        gallery: { enabled: true },
    });

    $(".car-magnify-gallery").lightGallery();

    $(document).on("click", ".compare-btn", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $.jnoty("Car has been removed from compare list", {
                header: "Warning",
                sticky: true,
                theme: "jnoty-warning",
                icon: "fa fa-check-circle",
            });
        } else {
            $(this).addClass("active");
            $.jnoty("Car has been added to compare list", {
                header: "Success",
                sticky: true,
                theme: "jnoty-success",
                icon: "fa fa-check-circle",
            });
        }
    });

    $(document).on("click", ".wishlist-btn", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $.jnoty("Car has been removed from wishlist list", {
                header: "Warning",
                sticky: true,
                theme: "jnoty-warning",
                icon: "fa fa-check-circle",
            });
        } else {
            $(this).addClass("active");
            $.jnoty("Car has been added to wishlist list", {
                header: "Success",
                sticky: true,
                theme: "jnoty-success",
                icon: "fa fa-check-circle",
            });
        }
    });

    // Header shrink while page scroll
    adjustHeader();
    doSticky();
    placedDashboard();
    $(window).on("scroll", function () {
        adjustHeader();
        doSticky();
        placedDashboard();
    });

    // Comon slick strat
    $(".slick").slick({
        dots: false,
        infinite: true,
        touchThreshold: 100,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: true,
        nextArrow:
            '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow:
            '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    });

    // Partners strat


    // Accordion strat
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

    // Cardetailsslider-2 strat
    $(".slider-fors").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-navs",
    });
    $(".slider-navs").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: ".slider-fors",
        dots: true,
        focusOnSelect: true,
    });

    $("a[data-slide]").click(function (e) {
        e.preventDefault();
        var slideno = $(this).data("slide");
        $(".slider-nav").slick("slickGoTo", slideno - 1);
    });

    // Banner 2 start initialization.
    if ($(document).find(".slide").length > 0) {
        function sliderPluggin(activeslide = 0) {
            const slides = document.querySelectorAll(".slide");
            slides[activeslide].classList.add("active");
            function clearActiveClasses() {
                slides.forEach((slide) => {
                    slide.classList.remove("active");
                });
            }

            for (const slide of slides) {
                slide.addEventListener("click", () => {
                    clearActiveClasses();
                    slide.classList.add("active");
                });
            }
        }

        sliderPluggin(0);
    }

    //product-slider-box
    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
    });

    $(".slider-nav").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: ".slider-for",
        dots: false,
        focusOnSelect: true,
        verticalSwiping: true,
    });

    //featured-slider
    $(".slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    //slide-container
    (function () {
        var slideContainer = $(".slide-container");
        slideContainer.slick({
            arrows: false,
            initialSlide: 0,
            centerMode: true,
            centerPadding: "40px",
            slidesToShow: 4,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1224,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: "40px",
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 1000,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: "40px",
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 900,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: "40px",
                        slidesToShow: 1,
                    },
                },
            ],
        });
    })();

    if ($(document).find(".slider-container").length > 0) {
        const sliderContainer = document.querySelector(".slider-container");
        const slideRight = document.querySelector(".right-slide");
        const slideLeft = document.querySelector(".left-slide");
        const upButton = document.querySelector(".up-button");
        const downButton = document.querySelector(".down-button");
        const slidesLength = slideRight.querySelectorAll("div").length;

        let activeSlideIndex = 0;

        slideLeft.style.top = `-${(slidesLength - 1) * 100}vh`;

        upButton.addEventListener("click", () => changeSlide("up"));
        downButton.addEventListener("click", () => changeSlide("down"));

        const changeSlide = (direction) => {
            const sliderHeight = sliderContainer.clientHeight;
            if (direction === "up") {
                activeSlideIndex++;
                if (activeSlideIndex > slidesLength - 1) {
                    activeSlideIndex = 0;
                }
            } else if (direction === "down") {
                activeSlideIndex--;
                if (activeSlideIndex < 0) {
                    activeSlideIndex = slidesLength - 1;
                }
            }

            slideRight.style.transform = `translateY(-${
                activeSlideIndex * sliderHeight
            }px)`;
            slideLeft.style.transform = `translateY(${
                activeSlideIndex * sliderHeight
            }px)`;
        };
    }

    // Header shrink while page resize
    $(window).on("resize", function () {
        adjustHeader();
        doSticky();
        placedDashboard();
    });

    function adjustHeader() {
        var windowWidth = $(window).width();
        if (windowWidth > 0) {
            if ($(document).scrollTop() >= 100) {
                if ($(".header-shrink").length < 1) {
                    $(".sticky-header").addClass("header-shrink");
                }
                if ($(".do-sticky").length < 1) {
                    $(".company-logo img").attr(
                        "src",
                        "img/logos/black-logo.png"
                    );
                }
            } else {
                $(".sticky-header").removeClass("header-shrink");
                if (
                    $(".do-sticky").length < 1 &&
                    $(".fixed-header").length == 0 &&
                    $(".fixed-header2").length == 0
                ) {
                    $(".company-logo img").attr("src", "img/logos/logo.png");
                } else {
                    $(".company-logo img").attr(
                        "src",
                        "img/logos/black-logo.png"
                    );
                }
            }
        } else {
            $(".company-logo img").attr("src", "img/logos/black-logo.png");
        }
    }

    function doSticky() {
        if ($(document).scrollTop() > 40) {
            $(".do-sticky").addClass("sticky-header");
            //$('.do-sticky').addClass('header-shrink');
        } else {
            $(".do-sticky").removeClass("sticky-header");
            //$('.do-sticky').removeClass('header-shrink');
        }
    }

    function placedDashboard() {
        var headerHeight = parseInt($(".main-header").height(), 10);
        $(".dashboard").css("top", headerHeight);
    }

    // Page scroller initialization.
    $.scrollUp({
        scrollName: "page_scroller",
        scrollDistance: 300,
        scrollFrom: "top",
        scrollSpeed: 500,
        easingType: "linear",
        animation: "fade",
        animationSpeed: 200,
        scrollTrigger: false,
        scrollTarget: false,
        scrollText: '<i class="fa fa-chevron-up"></i>',
        scrollTitle: false,
        scrollImg: false,
        activeOverlay: false,
        zIndex: 2147483647,
    });

    // Counter
    function isCounterElementVisible($elementToBeChecked) {
        var TopView = $(window).scrollTop();
        var BotView = TopView + $(window).height();
        var TopElement = $elementToBeChecked.offset().top;
        var BotElement = TopElement + $elementToBeChecked.height();
        return BotElement <= BotView && TopElement >= TopView;
    }

    $(window).on("scroll", function () {
        $(".counter").each(function () {
            var isOnView = isCounterElementVisible($(this));
            if (isOnView && !$(this).hasClass("Starting")) {
                $(this).addClass("Starting");
                $(this)
                    .prop("Counter", 0)
                    .animate(
                        {
                            Counter: $(this).text(),
                        },
                        {
                            duration: 3000,
                            easing: "swing",
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            },
                        }
                    );
            }
        });
    });

    // Countdown activation
    $(function () {
        //$.backstretch('../img/nature.jpg');
        // var endDate = "December  27, 2019 15:03:25";
        // $(".countdown.simple").countdown({ date: endDate });
        // $(".countdown.styled").countdown({
        //     date: endDate,
        //     render: function (data) {
        //         $(this.el).html(
        //             "<div>" +
        //                 this.leadingZeros(data.days, 3) +
        //                 " <span>Days</span></div><div>" +
        //                 this.leadingZeros(data.hours, 2) +
        //                 " <span>Hours</span></div><div>" +
        //                 this.leadingZeros(data.min, 2) +
        //                 " <span>Minutes</span></div><div>" +
        //                 this.leadingZeros(data.sec, 2) +
        //                 " <span>Seconds</span></div>"
        //         );
        //     },
        // });
        // $(".countdown.callback")
        //     .countdown({
        //         date: +new Date() + 10000,
        //         render: function (data) {
        //             $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
        //         },
        //         onEnd: function () {
        //             $(this.el).addClass("ended");
        //         },
        //     })
        //     .on("click", function () {
        //         $(this)
        //             .removeClass("ended")
        //             .data("countdown")
        //             .update(+new Date() + 10000)
        //             .start();
        //     });
    });

    $(".range-slider-ui").each(function () {
        var minRangeValue = $(this).attr("data-min");
        var maxRangeValue = $(this).attr("data-max");
        var minName = $(this).attr("data-min-name");
        var maxName = $(this).attr("data-max-name");
        var unit = $(this).attr("data-unit");

        $(this).append(
            "" +
                "<span class='min-value'></span> " +
                "<span class='max-value'></span>" +
                "<input class='current-min' type='hidden' name='" +
                minName +
                "'>" +
                "<input class='current-max' type='hidden' name='" +
                maxName +
                "'>"
        );
        $(this).slider({
            range: true,
            min: minRangeValue,
            max: maxRangeValue,
            values: [minRangeValue, maxRangeValue],
            slide: function (event, ui) {
                event = event;
                var currentMin = parseInt(ui.values[0], 10);
                var currentMax = parseInt(ui.values[1], 10);
                $(this)
                    .children(".min-value")
                    .text(currentMin + " " + unit);
                $(this)
                    .children(".max-value")
                    .text(currentMax + " " + unit);
                $(this).children(".current-min").val(currentMin);
                $(this).children(".current-max").val(currentMax);
            },
        });

        var currentMin = parseInt($(this).slider("values", 0), 10);
        var currentMax = parseInt($(this).slider("values", 1), 10);
        $(this)
            .children(".min-value")
            .text(currentMin + " " + unit);
        $(this)
            .children(".max-value")
            .text(currentMax + " " + unit);
        $(this).children(".current-min").val(currentMin);
        $(this).children(".current-max").val(currentMax);
    });

    // Search option's icon toggle
    $(".search-options-btn").on("click", function () {
        $(".search-section").toggleClass("show-search-area");
        $(".search-options-btn .fa").toggleClass("fa-chevron-down");
    });

    // Our Partbers toggle
    (function () {
        $(".our-partners .item").each(function () {
            var itemToClone = $(this);
            for (var i = 1; i < 4; i++) {
                itemToClone = itemToClone.next();
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(":first");
                }
                itemToClone
                    .children(":first-child")
                    .clone()
                    .addClass("cloneditem-" + i)
                    .appendTo($(this));
            }
        });
    })();

    // Background video playing script
    // $(document).ready(function () {
    //     $(".player").mb_YTPlayer({
    //         mobileFallbackImage: "img/banner/banner-1.jpg",
    //     });
    // });

    // Multilevel menuus
    $("[data-submenu]").submenupicker();

    // Expending/Collapsing advance search content
    $(".show-more-options").on("click", function () {
        if ($(this).find(".fa").hasClass("fa-minus-circle")) {
            $(document).find("#options-content").addClass("show");
            $(this).find(".fa").removeClass("fa-minus-circle");
            $(this).find(".fa").addClass("fa-plus-circle");
        } else {
            $(document).find("#options-content").removeClass("show");
            $(this).find(".fa").removeClass("fa-plus-circle");
            $(this).find(".fa").addClass("fa-minus-circle");
        }
    });

    var videoWidth = $(".sidebar-widget").width();
    var videoHeight = videoWidth * 0.61;
    $(".sidebar-widget iframe").css("height", videoHeight);

    // Megamenu activation
    $(".megamenu").on("click", function (e) {
        e.stopPropagation();
    });

    // Dropdown activation
    $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
        if (!$(this).next().hasClass("show")) {
            $(this)
                .parents(".dropdown-menu")
                .first()
                .find(".show")
                .removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass("show");

        $(this)
            .parents("li.nav-item.dropdown.show")
            .on("hidden.bs.dropdown", function (e) {
                $(".dropdown-submenu .show").removeClass("show");
            });

        return false;
    });

    // Full  Page Search Activation
    $(function () {
        $('a[href="#full-page-search"]').on("click", function (event) {
            event.preventDefault();
            $("#full-page-search").addClass("open");
            $('#full-page-search > form > input[type="search"]').focus();
        });

        $("#full-page-search, #full-page-search button.close").on(
            "click keyup",
            function (event) {
                if (
                    event.target == this ||
                    event.target.className == "close" ||
                    event.keyCode == 27
                ) {
                    $(this).removeClass("open");
                }
            }
        );
    });

    // Slick Sliders
    $(".slick-carousel").each(function () {
        var slider = $(this);
        $(this).slick({
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: "0",
        });

        $(this)
            .closest(".slick-slider-area")
            .find(".slick-prev")
            .on("click", function () {
                slider.slick("slickPrev");
            });
        $(this)
            .closest(".slick-slider-area")
            .find(".slick-next")
            .on("click", function () {
                slider.slick("slickNext");
            });
    });

    $(".dropdown.btns .dropdown-toggle").on("click", function () {
        $(this).dropdown("toggle");
        return false;
    });

    // Dropzone initialization
    Dropzone.autoDiscover = false;
    $(function () {
        $("div#myDropZone").dropzone({
            url: "/file-upload",
        });
    });

    // Filterizr initialization
    $(function () {
        //$('.filtr-container').filterizr();
    });

    function toggleChevron(e) {
        $(e.target)
            .prev(".panel-heading")
            .find(".fa")
            .toggleClass("fa-minus fa-plus");
    }

    $(".panel-group").on("shown.bs.collapse", toggleChevron);
    $(".panel-group").on("hidden.bs.collapse", toggleChevron);

    // Switching Color schema
    function populateColorPlates() {
        var plateStings =
            '<div class="option-panel option-panel-collased">\n' +
            "    <h2>Change Color</h2>\n" +
            '    <div class="color-plate default-plate" data-color="default"></div>\n' +
            '    <div class="color-plate midnight-blue-plate" data-color="midnight-blue"></div>\n' +
            '    <div class="color-plate yellow-plate" data-color="yellow"></div>\n' +
            '    <div class="color-plate blue-plate" data-color="blue"></div>\n' +
            '    <div class="color-plate green-light-plate" data-color="green-light"></div>\n' +
            '    <div class="color-plate yellow-light-plate" data-color="yellow-light"></div>\n' +
            '    <div class="color-plate green-plate" data-color="green"></div>\n' +
            '    <div class="color-plate green-light-2-plate" data-color="green-light-2"></div>\n' +
            '    <div class="color-plate red-plate" data-color="red"></div>\n' +
            '    <div class="color-plate purple-plate" data-color="purple"></div>\n' +
            '    <div class="color-plate brown-plate" data-color="brown"></div>\n' +
            '    <div class="color-plate olive-plate" data-color="olive"></div>\n' +
            '    <div class="setting-button">\n' +
            '        <i class="fa fa-gear"></i>\n' +
            "    </div>\n" +
            "</div>";
        $("body").append(plateStings);
    }

    $(document).on("click", ".color-plate", function () {
        var name = $(this).attr("data-color");
        $('link[id="style_sheet"]').attr("href", "css/skins/" + name + ".css");
    });

    $(document).on("click", ".setting-button", function () {
        $(".option-panel").toggleClass("option-panel-collased");
    });
});

// mCustomScrollbar initialization
(function ($) {
    $(window)
        .resize(function () {
            $("#map").css("height", $(this).height() - 110);
            if ($(this).width() > 768) {
                $(".map-content-sidebar").mCustomScrollbar({
                    theme: "minimal-dark",
                });
                $(".map-content-sidebar").css("height", $(this).height() - 110);
            } else {
                $(".map-content-sidebar").mCustomScrollbar("destroy"); //destroy scrollbar
                $(".map-content-sidebar").css("height", "100%");
            }
        })
        .trigger("resize");
})(jQuery);



(function () {
    function slidePartners() {
        $(".custom-slider").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                    },
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                    },
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                    },
                },
            ],
        });
    }


    function getTypesWithVehicle() {
        $.getJSON("/types-with-vehicles", function (makes) {
            let item = "",
                option = '<option value="">All</option>';
            $.each(makes, function (key, value) {
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
            $("#filterVehicleType").html(option);
            let currenttype = $("#currentType").val();
            $("#filterVehicleType option[value=" + currenttype + "]").prop(
                "selected",
                true
            );
        });
    }
    getTypesWithVehicle();

    function vehicleMakesWithVehicles() {
        $.getJSON("/makes-with-vehicles", function (vehicles) {
            let item = "",
                option = "<option value=''>All</option>", brand = "";
            $.each(vehicles, function (key, value) {
                item +=
                    '<a class="dropdown-item" href="/make-vehicles/' +
                    value.id +
                    '">' +
                    value.make +
                    "</a>";
                option +=
                    "<option value=" +
                    value.id +
                    ">" +
                    value.make +
                    "</option>";
                brand += "<div class=\"custom-box\"><img src=\"/images/brands/" + value.logo + "\" alt=\"brand\" class=\"img-fluid\"></div>";
            });
            $("#vehicleGroupandMakes").append(item);
            $("#filterMakesID").html(option);
            $("#brands-section").html(brand);
            slidePartners();
        });
    }
    
    vehicleMakesWithVehicles();

    function getCounties() {
        $.getJSON("/counties/110", function (counties) {
            var option = '<option value="">All</option>';
            $.each(counties, (key, value) => {
                let { id, name } = value;
                option += "<option value=" + id + ">" + name + "</option>";
            });
            $("#countiesID").html(option);
        });
    }

    getCounties();

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
                            '<a href="/vehicleimages/' +
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
                        tags[0] +
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

    $("body").on("click", "#vehicleDetailsModalToggle", function (event) {
        let vehicle_id = $(this).data("id");
        console.log(vehicle_id);
        $.getJSON("/vehicle-detail/" + vehicle_id, function (vehicle) {
            let features = "",
                price = parseFloat(vehicle.price),
                vehiclePrice = price.toFixed(2),
                location =
                    vehicle.yard !== null && vehicle.yard !== []
                        ? vehicle.yard.address
                        : vehicle.location;
            $.each(vehicle.features, function (key, value) {
                features += "<li>" + value.feature + "</li>";
            });
            let images = JSON.parse(vehicle.images);

            let vehicledata =
                '<div class="modal-header"><div class="modal-title"><h4 id="vehicleName">' +
                vehicle.make.make +
                "" +
                vehicle.model.model +
                '</h4><h5 id="vehicleLocation"><i class="flaticon-pin"></i> &nbsp;' +
                location +
                '</h5></div><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="row modal-raw"><div class="col-lg-6 modal-left"><div class="item active"><img src="/vehicleimages/' +
                images[0] +
                '" alt="best-car" class="img-fluid"><div class="sobuz"><div class="price-box"><span class="del-2">Kes. ' +
                vehiclePrice +
                '</span></div></div></div></div><div class="col-lg-6 modal-right"><div class="modal-right-content"><section><h3>Features</h3><div class="features"><ul class="bullets">' +
                features +
                '</ul></div></section><section><h3>Overview</h3><ul class="bullets"><li>Model</li><li>Year</li><li>Condition</li><li>Price</li><li>' +
                vehicle.model.model +
                "</li><li>" +
                vehicle.year +
                "</li><li>" +
                vehicle.usage +
                "</li><li>" +
                vehicle.price +
                '</li></ul></section><div class="description"><h3>Description</h3><p>' +
                vehicle.description +
                '</p><a href="/vehicle-details/' +
                vehicle.id +
                '" class="btn btn-md btn-round btn-theme">Show Detail</a></div></div></div></div></div>';
            $("#vehiclePreviewSection").html(vehicledata);
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
                        : value.yard !== undefined
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

                // let img =
                //     '<a href="/vehicleimages/' +
                //     value.cover_photo +
                //     '" class="overlap-btn" data-sub-html="<h4>' +
                //     value.model.model +
                //     "</h4><p>" +
                //     value.description +
                //     '</p>"><i class="fa fa-expand"></i><img class="hidden" src="/vehicleimages/' +
                //     value.cover_photo +
                //     '" alt="hidden-img"></a>';
                // $.each(images, function (key, image) {
                //     img +=
                //         '<a href="/vehicleimages/' +
                //         image +
                //         '" class="hidden" data-sub-html="<h4>' +
                //         value.model.model +
                //         "</h4><p>" +
                //         value.description +
                //         '</p>"><img src="/vehicleimages/' +
                //         image +
                //         '" alt="hidden-img"></a>';
                // });

                // vehicle +=
                //     '<div class="col-lg-4 col-md-4"><div class="car-box-3"><div class="car-thumbnail"><a href="/vehicle-details/' +
                //     value.id +
                //     '" class="car-img" ><div class="tag-2 bg-active">' +
                //     tags[0] +
                //     '</div><div class="price-box"><span><span>Kes: ' +
                //     price.toLocaleString("en-US", {
                //         style: "currency",
                //         currency: "KSH",
                //     }) +
                //     '</span></div><img class="d-block w-100" src="/vehicleimages/' +
                //     value.cover_photo +
                //     '" alt="car"></a><div class="carbox-overlap-wrapper"><div class="overlap-box"><div class="overlap-btns-area"><a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal" id="vehicleDetailsModalToggle" data-id="' +
                //     value.id +
                //     '"><i class="fa fa-eye-slash"></i></a><a class="overlap-btn wishlist-btn" data-id="vehicleLike" id="' +
                //     value.id +
                //     '"><i class="fa fa-heart-o"></i></a><div class="car-magnify-gallery">' +
                //     img +
                //     '</div></div></div></div></div><div class="detail"><h1 class="title"><a href="/vehicle-details/' +
                //     value.id +
                //     '">' +
                //     value.make.make +
                //     " " +
                //     value.model.model +
                //     " " +
                //     value.year +
                //     '</a></h1><ul class="custom-list"><li><a href="#">' +
                //     value.usage +
                //     '</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li><li><a href="#">' +
                //     value.transmission +
                //     '</a>&nbsp;&nbsp;|</li><li><a href="#">' +
                //     value.type.type +
                //     '</a></li></ul><ul class="facilities-list clearfix"><li><i class="flaticon-fuel"></i>' +
                //     value.fuel_type +
                //     '</li><li><i class="flaticon-way"></i>&nbsp;' +
                //     mileage +
                //     ' km</li><li><i class="flaticon-gear"></i>&nbsp;' +
                //     value.color +
                //     "</li></ul></div></div></div>";
            });
            $("#latestCarsSection").html(vehicle);
            $("#latestCarsSection").append(
                '<div class="col-lg-12 text-center"><a  class="btn-9 btn" href="new-vehicles">&nbsp;Learn More</a></div>'
            );
        });
    }
    getLatestCars();

    function getVehiclesOnOffer() {
        $.getJSON("/vehicle-discounts", function (params) {});
    }

    function getSocials() {
        $.getJSON("/socials", function (socials) {
            let li = "";
            $.each(socials, function (key, value) {
                if (value.type === "address") {
                    $("#contact-info").append(
                        '<li><i class="flaticon-pin"></i>' +
                            value.address +
                            "</li>"
                    );
                } else {
                    if (value.type == "mail") {
                        li +=
                            '<li><i class="flaticon-mail"></i><a  href="mailto:' +
                            value.link +
                            '">' +
                            value.link +
                            "</a></li>";
                    } else if (value.type === "phone") {
                        $("#contact-info").append(
                            '<li><i class="flaticon-phone"></i><a href="tel:' +
                                value.link +
                                '">' +
                                value.link +
                                "</a></li>"
                        );
                    } else if (
                        value.type === "social" &&
                        value.name === "facebook"
                    ) {
                        li +=
                            '<div class="icon facebook"><div class="tooltip">Facebook</div><a href=\'' +
                            value.link +
                            "' target='_blank'><span><i class=\"fa fa-facebook\"></i></span></a></div>";
                    } else if (
                        value.type == "social" &&
                        value.name == "twitter"
                    ) {
                        li +=
                            '<div class="icon twitter"><div class="tooltip">Twitter</div><a href=\'' +
                            value.link +
                            "' target='_blank'><span><i class=\"fa fa-twitter\"></i></span></a></div>";
                    } else if (
                        value.type === "social" &&
                        value.name === "instagram"
                    ) {
                        li +=
                            '<div class="icon instagram"><div class="tooltip">Instagram</div><a href=\'' +
                            value.link +
                            "' target='_blank'><span><i class=\"fa fa-instagram\"></i></span></div>";
                    } else if (
                        value.type === "social" &&
                        value.name === "whatsapp"
                    ) {
                        li +=
                            '<div class="icon whatsapp"><div class="tooltip">Whatsapp</div><a href=\'' +
                            value.link +
                            "' target='_blank'><span><i class=\"fa fa-whatsapp\"></i></span></div>";
                    }
                }
            });
            $(".social-list").html(li);
        });
    }

    function getPartners() {
        $.getJSON("/partners", function (partners) {
            let option = "<option value=''>Select One</option>";
            $.each(partners, function (key, value) {
                option +=
                    "<option value='" +
                    value.id +
                    "'>" +
                    value.name +
                    "</option>";
            });
            $("#partnerID").append(option);
        });
    }
    getPartners();
    let makeID = $("#makeID"),
        vehicleModelID = $("#vehicleModelID");

    function getVehicleMakes() {
        $.getJSON("/makes", function (makes) {
            let option = "<option value=''>Select One</option>";

            $.each(makes, function (key, value) {
                option +=
                    "<option value='" +
                    value.id +
                    "'>" +
                    value.make +
                    "</option>";
            });
            makeID.html(option);
        });
    }

    getVehicleMakes();

    function getVehicleModels(make_id) {
        $.getJSON("/models/" + make_id, function (models) {
            let option = "<option value=''>Select One</option>";
            $.each(models, function (key, value) {
                option +=
                    "<option value='" +
                    value.id +
                    "'>" +
                    value.model +
                    "</option>";
            });
            vehicleModelID.html(option);
        });
    }

    makeID.on("change", function () {
        let make_id = $(this).val();
        console.log(make_id);
        if (make_id !== "" && make_id !== null) {
            getVehicleModels(make_id);
        }
    });

})(jQuery);
