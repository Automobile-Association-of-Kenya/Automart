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
})();
