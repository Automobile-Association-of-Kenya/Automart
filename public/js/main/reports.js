(function () {

    $("#filterReportsForm").on('submit',function(event) {
        event.preventDefault();
        let $this = $(this),
            report = $("#reportName").val(),
            start = $("#reportStart").val(),
            end = $("#reportEnd").val(),
            token = $this.find("input[name='_token']").val();
        $this.find("#filtergradealoanreport").prop('disabled', true);
        $.post("/reports-filter", {
            _token:token,
            report: report,
            start: start,
            end: end,
        })
            .done(function (params) {
                let data = JSON.parse(params);
                $.each(data, function (key, value) {

                });
                // if (report === "quote") {
                //     $
                // }
                // if (report === "sale") {
                // }
                // if (report === "loan") {
                // }
                // if (report === "tradeins") {
                // }
                console.log(params);
            })
            .fail(function (error) {
                console.error(error);
            });
    });

})()
