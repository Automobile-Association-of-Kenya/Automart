$(function () {
    "use strict";

    // Showing page loader
    $(window).on("load", function () {
        // populateColorPlates();
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
        // Add background image
        //$.backstretch('../img/nature.jpg');
        var endDate = "December  27, 2019 15:03:25";
        $(".countdown.simple").countdown({ date: endDate });
        $(".countdown.styled").countdown({
            date: endDate,
            render: function (data) {
                $(this.el).html(
                    "<div>" +
                        this.leadingZeros(data.days, 3) +
                        " <span>Days</span></div><div>" +
                        this.leadingZeros(data.hours, 2) +
                        " <span>Hours</span></div><div>" +
                        this.leadingZeros(data.min, 2) +
                        " <span>Minutes</span></div><div>" +
                        this.leadingZeros(data.sec, 2) +
                        " <span>Seconds</span></div>"
                );
            },
        });
        $(".countdown.callback")
            .countdown({
                date: +new Date() + 10000,
                render: function (data) {
                    $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
                },
                onEnd: function () {
                    $(this.el).addClass("ended");
                },
            })
            .on("click", function () {
                $(this)
                    .removeClass("ended")
                    .data("countdown")
                    .update(+new Date() + 10000)
                    .start();
            });
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
    $(document).ready(function () {
        $(".player").mb_YTPlayer({
            mobileFallbackImage: "img/banner/banner-1.jpg",
        });
    });

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

    $("#searchMake").on("change", function () {
        let car_make_id = $(this).val();
        let _token = $("input[name='_token']").val();
        let data = { car_make_id: car_make_id, _token: _token };
        if (car_make_id !== "") {
            $.post("/fetch/car-models", data).done(function (params) {
                // let models = JSON.parse(params);
                let models = JSON.parse(params);
                let option = '<option value="">Select Model</option>';
                $.each(models, function (key, value) {
                    option +=
                        "<option value=" +
                        value.car_model_id +
                        ">" +
                        value.car_model_name +
                        "</option>";
                });
                $("#selectModel").html(option);
            });
        }
    });

    function formatNumber(phone) {
        if (phone !== null && phone.length <= 10) {
            return "+254" + phone;
        } else {
            return phone;
        }
    }

    function asMoney(number) {
        let amount = parseFloat(number);
        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    }

    let searchMake = $("#searchMake"),
        selectModel = $("#selectModel"),
        searchYear = $("#searchYear"),
        searchType = $("#searchType"),
        searchPrice = $("#searchPrice");

    $("#vehicleSearchForm").on("submit", function (event) {
        event.preventDefault();

        let make = searchMake.val(),
            model = selectModel.val(),
            year = searchYear.val(),
            type = searchType.val(),
            price = searchPrice.val(),
            $this = $(this);
        let data = {
            make: make,
            model: model,
            year: year,
            type: type,
            price: price,
        };
        if (
            make == "" &&
            model == "" &&
            year == "" &&
            type == "" &&
            price == ""
        ) {
            $("#searchArea").html(
                '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Oops!      </strong>No search parameter has been selected!</div>'
            );
        } else {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $this.find("input[name='_token']").val(),
                },
            });
            $.ajax({
                type: "POST",
                url: "/vehicle/search",
                data: data,
                success: function (params) {
                    let vehicles = JSON.parse(params);
                    var car = "";
                    console.log(vehicles);
                    if (vehicles.length <= 0) {
                        $("#searchArea").html(
                            '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Oops!      </strong>No results were found fr your search!</div>'
                        );
                    } else {
                        $.each(vehicles, function (key, value) {
                            let images = JSON.parse(value.images);
                            car +=
                                '<div class="col-lg-4 col-md-6"><div class="car-box-3"><div class="car-thumbnail"><a href="Available/Details' +
                                value.id +
                                '" class="car-img"><div class="for">' +
                                value.title +
                                '</div><div class="price-box"><span>' +
                                value.price +
                                '</span></div><img class="d-block w-100" height="260px" src="/images/' +
                                value.cover_photo +
                                '" alt="car"></a></div><div class="detail"><h1 class="title"><a href="Available/Details' +
                                value.id +
                                '"><span style="font-size:15px;color:#333;">' +
                                value.make?.car_make_name +
                                "</span>&nbsp;" +
                                value.model?.car_model_name +
                                '</a></h1><ul class="custom-list"></ul><ul class="facilities-list clearfix"><li><i class="flaticon-fuel"></i> ' +
                                value.fuel_type +
                                '</li><li><i class="flaticon-way"></i> ' +
                                value.miles +
                                ' kms &nbsp;<i class="flaticon-manual-transmission"></i> ' +
                                value.transmission +
                                '</li><li>YOM &nbsp;&nbsp;<i class="flaticon-calendar-1"></i>&nbsp;&nbsp; ' +
                                value.year +
                                "&nbsp;&nbsp;" +
                                value.enginecc +
                                '&nbsp;<i>cc</i></li></ul></div><div class="footer clearfix bg-main row" style ="padding: .8em 0; background:#00472F;"><div class="col-md-6"><span class="text-white">WhatsApp the owner</span></div><div class="col-md-6 text-center"><a href="https://wa.me/' +
                                formatNumber(value.phone) +
                                '" target="_blank" class="text-right"><i class="fa fa-whatsapp text-warning"></i></a></div></div></div></div>';
                            // car += "<div class=\"col-lg-4 col-md-6\"><div class=\"car-box-3\"><div class=\"car-thumbnail\"><a href=\"Available/Details" + value.id + "\" class=\"car-img\"><div class=\"for\">" + value.title + "</div><div class=\"price-box\"><span>Ksh. " + value.price + "</span></div><img class=\"d-block w-100\" src=\"{{ asset('images/'"+value.images[0]+") }} \" alt=\"car\"></div><div class=\"detail\"><h1 class=\"title\"><a href=\"Available/Details>"+value.makes.car_make_name+"></a></h1><ul class=\"custom-list\"><li><a href=\"#\">" + value.title + "</a></li><li><a href=\"#\">" + value.vehicle_type + "</a></li></ul><ul class=\"facilities-list clearfix\"><li><i class=\"flaticon-fuel\"></i>" + value.fuel_type + "</li><li><i class=\"flaticon-way\"></i>" + value.miles + "</li><li><i class=\"flaticon-manual-transmission\"></i>" + value.transmission + "</li><li><i class=\"flaticon-car\"></i>" + value.vehicle_type + "</li><li><i class=\"flaticon-gear\"></i>" + value.exterior + "</li><li><i class=\"flaticon-calendar-1\"></i>" + value.year + "</li></ul></div></div></div>";
                        });
                        let html =
                            '<div class="featured-car content-area"><div class="container"><div class="section-header d-flex"><h2> Search Results</h2></div><div class="row">' +
                            car +
                            "</div></div></div>";
                        $("#searchArea").html(html);
                    }
                },
                error: function (error) {
                    console.error(error);
                },
            });
        }
    });

    function getTrendingVehicles() {
        $.getJSON("/trending", function (vehicles) {
            let car = "";
            $.each(vehicles, function (key, value) {
                let model = (value.model !== null) ? value.model.car_model_name : "";
                let make = (value.make !== null) ? value.make.car_make_name : "";
                car +=
                    '<div class="col-lg-4 col-md-6"><div class="car-box-3"><div class="car-thumbnail"><a href="Available/Details' +
                    value.id +
                    '" class="car-img"><div class="for">' +
                    value.title +
                    '</div><div class="price-box"><span>' +
                    value.price +
                    '</span></div><img class="d-block w-100" height="260px" src="/images/' +
                    value.cover_photo +
                    '" alt="car"></a></div><div class="detail"><h1 class="title"><a href="Available/Details' +
                    value.id +
                    '"><span style="font-size:15px;color:#333;">' +
                    value.make?.car_make_name +
                    "</span>&nbsp;" +
                    value.model?.car_model_name +
                    '</a></h1><ul class="custom-list"></ul><ul class="facilities-list clearfix"><li><i class="flaticon-fuel"></i> ' +
                    value.fuel_type +
                    '</li><li><i class="flaticon-way"></i> ' +
                    value.miles +
                    ' kms &nbsp;<i class="flaticon-manual-transmission"></i> ' +
                    value.transmission +
                    '</li><li>YOM &nbsp;&nbsp;<i class="flaticon-calendar-1"></i>&nbsp;&nbsp; ' +
                    value.year +
                    "&nbsp;&nbsp;" +
                    value.enginecc +
                    '&nbsp;<i>cc</i></li></ul></div><div class="footer clearfix bg-main row" style ="padding: .8em 0; background:#00472F;"><div class="col-md-6"><span class="text-white">WhatsApp the owner</span></div><div class="col-md-6 text-center"><a href="https://wa.me/' +
                    formatNumber(value.phone) +
                    '" target="_blank" class="text-right"><i class="fa fa-whatsapp text-warning"></i></a></div></div></div></div>';

            });
            $("#trendingCarsSection").html(car);
        });
    }
    getTrendingVehicles();
})(jQuery);
