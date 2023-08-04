(function () {
    $("#trafficDate").on("change", function () {
        getWebTraffic();
    });

    function getWebTraffic() {
        let date = $("#trafficDate").val();
        $.getJSON("/webtraffic/" + date, function (data) {
            console.log(data);
        });
    }

    getWebTraffic();

    $.getJSON("/admin/subscriptions", function (subscriptions) {
        let labels = [],
            data = [], active = 0;
        $.each(subscriptions, function (key, value) {
            labels.push(value.subscription);
            data.push(value.subscriptions);
            active += parseFloat(value.subscriptions);
        });
        const ctx = document.getElementById("subscriptionsgraph");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: active+" NO of active subscriptions",
                        data: data,
                        borderWidth: 1,
                        backgroundColor: ["#006544"],
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                        align: "end",
                    },
                },
            },
        });
    });

    $.getJSON("/admin/dealer/subscriptions", function (subscriptions) {
        let subscribed = parseFloat(subscriptions.acitivesubscriptions),
            unsubscribed =
                parseFloat(subscriptions.dealers) -
                parseFloat(subscriptions.acitivesubscriptions),
            labels = [
                subscribed + " Dealers subscribed ",
                unsubscribed + " Dealers not subscribed",
            ],
            data = [subscribed, unsubscribed];
        const ctx = document.getElementById("dealersgraph");
        new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [
                    {
                        label: " subscriptions",
                        data: data,
                        borderWidth: 2,
                        backgroundColor: ["#006544", "#fed945"],
                    },
                ],
                labels: labels,
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                        align: "end",
                    },
                },
            },
        });
    });

    $.getJSON("/admin/vehicles/subscriptions", function (subscriptions) {
        let sponsored = parseFloat(subscriptions.sponsored),
            unsponsored =
                parseFloat(subscriptions.vehicles) -
                parseFloat(subscriptions.sponsored),
            labels = [sponsored + " Sponsored", unsponsored + " Non Sponsored"],
            data = [sponsored, unsponsored];
        const ctx = document.getElementById("vehiclesonsubsgraph");
        new Chart(ctx, {
            type: "doughnut",
            data: {
                datasets: [
                    {
                        label: " vehicles",
                        data: data,
                        borderWidth: 2,
                        backgroundColor: ["#006544", "#fed945"],
                    },
                ],
                labels: labels,
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                        align: "end",
                    },
                },
            },
        });
    });

    function getWebTraffic() {
        let date = $("#trafficDate").val();
        $.getJSON("/webtraffic/" + date, function (data) {
            const ctx = document.getElementById("webtraffic");
            if (Chart.getChart(ctx) !== undefined) {
                Chart.getChart(ctx).destroy();
            }
            let sum = 0;
            data.forEach((value) => {
                sum += parseFloat(value.visits);
            });
            new Chart(ctx, {
                type: "bar",
                data: {
                    datasets: [
                        {
                            label: sum + " visits",
                            data: data.map((value) => value.visits),
                            borderWidth: 2,
                            backgroundColor: ["#fed945"],
                        },
                    ],
                    labels: data.map((value) => value.hour + ":00"),
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom",
                            align: "end",
                        },
                    },
                },
            });
        });
    }

    getWebTraffic();

    $("#trafficDate").on("change", function () {
        getWebTraffic();
    });

    function getRevenue() {
        let year = $("#revenueYear").val();
        $.getJSON("/admin/revenue/" + year, function (data) {
            const ctx = document.getElementById("revenuegraph");
            if (Chart.getChart(ctx) !== undefined) {
                Chart.getChart(ctx).destroy();
            }
            let total = 0;
            $.each(data, function (key, value) {
                total += parseFloat(value.income);
            });

            new Chart(ctx, {
                type: "bar",
                data: {
                    datasets: [
                        {
                            label: money(total) + " Ksh",
                            data: data.map((value) => value.income),
                            borderWidth: 2,
                            backgroundColor: ["#006544"],
                        },
                    ],
                    labels: data.map((value) => value.month),
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom",
                            align: "end",
                        },
                    },
                },
            });
        });
    }
    getRevenue();

    function money(value) {
        let actul = parseFloat(value);
        return actul.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }

    $("#revenueYear").on("change", function () {
        getRevenue();
    });
})();
