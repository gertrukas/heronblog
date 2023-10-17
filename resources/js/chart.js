import helper from "./helper";
// import colors from "./colors";
import chart from "chart.js/auto";

(function (cash) {
    "use strict";
    window.chartsInits = []

    window.initializeCharts = () => {

        window.chartsInits.forEach((datePicker) => datePicker.destroy());

        // Chart
        if (cash("#report-line-chart").length) {
            let ctx = cash("#report-line-chart")[0].getContext("2d");
            const data = cash("#report-line-chart").data('data');
            // console.log('data', data);
            let myChart = new chart(ctx, {
                type: "line",
                data,
                options: {
                    legend: {
                        display: false,
                    },
                    scales: {
                        x:
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#777777",
                            },
                            gridLines: {
                                display: false,
                            },
                        },

                        y:
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#777777",
                                callback: function (value, index, values) {
                                    return value;
                                },
                            },
                            gridLines: {
                                color: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                                zeroLineColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                                borderDash: [2, 2],
                                zeroLineBorderDash: [2, 2],
                                drawBorder: false,
                            },
                        },

                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                },
            });
            window.chartsInits.push(myChart);
        }
        // Chart
        if (cash("#report-line-chart_two").length) {
            let ctx = cash("#report-line-chart_two")[0].getContext("2d");
            const data = cash("#report-line-chart_two").data('data');
            // console.log('data', data);
            let myChart = new chart(ctx, {
                type: "bar",
                data,
                options: {
                    legend: {
                        display: false,
                    },
                    scales: {
                        x:
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#777777",
                            },
                            gridLines: {
                                display: false,
                            },
                        },

                        y:
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#777777",
                                callback: function (value, index, values) {
                                    return viewer(value) ;
                                },
                            },
                            gridLines: {
                                color: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                                zeroLineColor: cash("html").hasClass("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                            },
                        },

                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                },
            });
            window.chartsInits.push(myChart);
        }






      
    };

    initializeCharts();

})(cash);
