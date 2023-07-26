(function(){
    $("#trafficDate").on('change', function() {
        getWebTraffic();
    });
    function getWebTraffic() {
        let date = $("#trafficDate").val();
        $.getJSON('/webtraffic/' + date, function (data) {
            console.log(data);
        });
    }

    getWebTraffic();

    $.getJSON("/admin/subscriptions", function (subscriptions) {
        let labels = [],
            data = [];
        $.each(subscriptions, function (key, value) {
            labels.push(value.subscription);
            data.push(value.subscriptions);
        });
        const ctx = document.getElementById("subscriptionsgraph");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "# of subscriptions",
                        data: data,
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });

    $.getJSON("/admin/dealer/subscriptions", function (subscriptions) {
        console.log(subscriptions);
        // let labels = [],
        //     data = [];
        // $.each(subscriptions, function (key, value) {
        //     labels.push(value.subscription);
        //     data.push(value.subscriptions);
        // });
        // const ctx = document.getElementById("subscriptionsgraph");
        // new Chart(ctx, {
        //     type: "bar",
        //     data: {
        //         labels: labels,
        //         datasets: [
        //             {
        //                 label: "# of subscriptions",
        //                 data: data,
        //                 borderWidth: 1,
        //             },
        //         ],
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //             },
        //         },
        //     },
        // });
    });


})()
