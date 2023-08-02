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
                        label: " NO of subscriptions",
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
            new Chart(ctx, {
                type: "bar",
                data: {
                    datasets: [
                        {
                            label: " Ksh",
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

    $("#revenueYear").on("change", function () {
        getRevenue();
    });
    // const config = {
    //     type: "pie",
    //     data: data,
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 position: "top",
    //             },
    //             title: {
    //                 display: true,
    //                 text: "Chart.js Pie Chart",
    //             },
    //         },
    //     },
    // };
    // const DATA_COUNT = 5;
    // const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 100 };

    // const data = {
    //     labels: ["Red", "Orange", "Yellow", "Green", "Blue"],
    //     datasets: [
    //         {
    //             label: "Dataset 1",
    //             data: Utils.numbers(NUMBER_CFG),
    //             backgroundColor: Object.values(Utils.CHART_COLORS),
    //         },
    //     ],
    // };

    // const actions = [
    //     {
    //         name: "Randomize",
    //         handler(chart) {
    //             chart.data.datasets.forEach((dataset) => {
    //                 dataset.data = Utils.numbers({
    //                     count: chart.data.labels.length,
    //                     min: 0,
    //                     max: 100,
    //                 });
    //             });
    //             chart.update();
    //         },
    //     },
    //     {
    //         name: "Add Dataset",
    //         handler(chart) {
    //             const data = chart.data;
    //             const newDataset = {
    //                 label: "Dataset " + (data.datasets.length + 1),
    //                 backgroundColor: [],
    //                 data: [],
    //             };

    //             for (let i = 0; i < data.labels.length; i++) {
    //                 newDataset.data.push(
    //                     Utils.numbers({ count: 1, min: 0, max: 100 })
    //                 );

    //                 const colorIndex =
    //                     i % Object.keys(Utils.CHART_COLORS).length;
    //                 newDataset.backgroundColor.push(
    //                     Object.values(Utils.CHART_COLORS)[colorIndex]
    //                 );
    //             }

    //             chart.data.datasets.push(newDataset);
    //             chart.update();
    //         },
    //     },
    //     {
    //         name: "Add Data",
    //         handler(chart) {
    //             const data = chart.data;
    //             if (data.datasets.length > 0) {
    //                 data.labels.push("data #" + (data.labels.length + 1));

    //                 for (let index = 0; index < data.datasets.length; ++index) {
    //                     data.datasets[index].data.push(Utils.rand(0, 100));
    //                 }

    //                 chart.update();
    //             }
    //         },
    //     },
    //     {
    //         name: "Remove Dataset",
    //         handler(chart) {
    //             chart.data.datasets.pop();
    //             chart.update();
    //         },
    //     },
    //     {
    //         name: "Remove Data",
    //         handler(chart) {
    //             chart.data.labels.splice(-1, 1); // remove the label first

    //             chart.data.datasets.forEach((dataset) => {
    //                 dataset.data.pop();
    //             });

    //             chart.update();
    //         },
    //     },
    // ];
})();
