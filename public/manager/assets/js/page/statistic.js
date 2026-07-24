const View = {
    nav: {
        render(data) {
            $(".data-prices").text(
                IndexView.Config.formatPrices(data.total_prices) + " đ"
            );
            $(".data-orders").text(
                IndexView.Config.formatPrices(data.total_orders)
            );
            $(".data-customers").text(
                IndexView.Config.formatPrices(data.total_customers)
            );
            $(".data-products").text(
                IndexView.Config.formatPrices(data.total_products)
            );
        },
    },
    prices_chart: {
        render(data) {
            const revenueChartConfig = new Chart(
                document.getElementById("revenue-chart").getContext("2d"),
                {
                    type: "line",
                    data: {
                        // Lấy số ngày trong tháng hiện tại để tạo nhãn động cho trục x
                        labels: (function () {
                            const now = new Date();
                            const year = now.getFullYear();
                            const month = now.getMonth(); // 0-indexed
                            const lastDay = new Date(
                                year,
                                month + 1,
                                0
                            ).getDate();
                            let arr = [];
                            for (let i = 1; i <= lastDay; i++) {
                                arr.push(i + "th");
                            }
                            return arr;
                        })(),
                        datasets: [
                            {
                                label: "Series A",
                                backgroundColor: "#00000000",
                                borderColor: "#3f87f5",
                                pointBackgroundColor: "#3f87f5",
                                pointBorderColor: "#ffffff",
                                pointHoverBackgroundColor: "#3f87f5",
                                pointHoverBorderColor: "#3f87f5",
                                data: data,
                            },
                        ],
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        hover: {
                            mode: "nearest",
                            intersect: true,
                        },
                        tooltips: {
                            mode: "index",
                        },
                        scales: {
                            xAxes: [
                                {
                                    gridLines: [
                                        {
                                            display: false,
                                        },
                                    ],
                                    ticks: {
                                        display: true,
                                        fontColor: "#77838f",
                                        fontSize: 13,
                                        padding: 10,
                                    },
                                },
                            ],
                            yAxes: [
                                {
                                    gridLines: {
                                        drawBorder: false,
                                        drawTicks: false,
                                        borderDash: [3, 4],
                                        zeroLineWidth: 1,
                                        zeroLineBorderDash: [3, 4],
                                    },
                                    ticks: {
                                        display: true,
                                        stepSize: 1000000,
                                        fontColor: "#77838f",
                                        fontSize: 13,
                                        padding: 10,
                                    },
                                },
                            ],
                        },
                    },
                }
            );
        },
    },
    orders_chart: {
        render(data) {
            const avgProfitChartConfig = new Chart(
                document.getElementById("avg-profit-chart").getContext("2d"),
                {
                    type: "bar",
                    data: {
                        labels: [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ],
                        datasets: [
                            {
                                label: "Series A",
                                backgroundColor: "#3f87f5",
                                borderWidth: 0,
                                data: data,
                            },
                            {
                                label: "Series B",
                                backgroundColor: "#3f87f5",
                                borderWidth: 0,
                                data: data,
                            },
                        ],
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scaleShowVerticalLines: false,
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [
                                {
                                    categoryPercentage: 0.35,
                                    barPercentage: 0.3,
                                    display: true,
                                    stacked: true,
                                    scaleLabel: {
                                        display: false,
                                        labelString: "Month",
                                    },
                                    gridLines: false,
                                    ticks: {
                                        display: true,
                                        beginAtZero: true,
                                        fontSize: 13,
                                        padding: 10,
                                    },
                                },
                            ],
                            yAxes: [
                                {
                                    categoryPercentage: 0.35,
                                    barPercentage: 0.3,
                                    display: true,
                                    stacked: true,
                                    scaleLabel: {
                                        display: false,
                                        labelString: "Value",
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                        offsetGridLines: false,
                                        drawTicks: false,
                                        borderDash: [3, 4],
                                        zeroLineWidth: 1,
                                        zeroLineBorderDash: [3, 4],
                                    },
                                    ticks: {
                                        stepSize: 10,
                                        display: true,
                                        beginAtZero: true,
                                        fontSize: 13,
                                        padding: 10,
                                    },
                                },
                            ],
                        },
                    },
                }
            );
        },
    },
    orders_status_chart: {
        render(data) {
            $(".data-finished").text(data[2]);
            $(".data-processing").text(data[1]);
            $(".data-waiting").text(data[0]);
            const customersChartConfig = new Chart(
                document.getElementById("customers-chart").getContext("2d"),
                {
                    type: "doughnut",
                    data: {
                        labels: ["Đang chờ", "Đang xử lí", "Đã hoàn thiện"],
                        datasets: [
                            {
                                label: "Series A",
                                backgroundColor: [
                                    "#3f87f5",
                                    "#886cff",
                                    "#ffc107",
                                ],
                                pointBackgroundColor: [
                                    "#3f87f5",
                                    "#886cff",
                                    "#ffc107",
                                ],
                                data: data,
                            },
                        ],
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        cutoutPercentage: 75,
                        maintainAspectRatio: false,
                    },
                }
            );
        },
    },
    init() {},
};
(() => {
    View.init();
    function init() {
        getNavData();
        getPricesChart();
        getOrdersChart();
        getOrdersStatusChart();
    }

    function getNavData() {
        Api.Statistic.getNavData()
            .done((res) => {
                View.nav.render(res.data);
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    function getPricesChart() {
        Api.Statistic.getPricesChart()
            .done((res) => {
                View.prices_chart.render(res.data);
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }
    function getOrdersChart() {
        Api.Statistic.getOrdersChart()
            .done((res) => {
                View.orders_chart.render(res.data);
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }
    function getOrdersStatusChart() {
        Api.Statistic.getOrdersStatusChart()
            .done((res) => {
                View.orders_status_chart.render(res.data);
            })
            .fail((err) => {
                IndexView.helper.showToastError("Error", "Có lỗi sảy ra");
            })
            .always(() => {});
    }

    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function (item) {
            if (!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function () {
                isLock = false;
            }, timeout);
        };
    }
    init();
})();
