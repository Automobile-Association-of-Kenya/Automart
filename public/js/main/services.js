(function() {
    function getServices() {
        $.getJSON('/services', function(services) {
            if (services.length > 0) {
                let service = "";
                $.each(services, function (key, value) {
                    service += "<div class=\"col-lg-3 col-md-6 col-sm-6\"><div class=\"service-info-2\"><div class=\"icon\">" + value.caret + "</div><div class=\"detail\"><h3><a href=\"service/" + value.id + "" > "" + value.service + "</a></h3><p>" + value.service + "</p><a href=\"service/" + value.id + "\" class=\"read-more\">Read more...</a></div></div></div>";
                });
                $("#servicesSection").html(service);
            }
        })
    }

    getServices();

    
})()
