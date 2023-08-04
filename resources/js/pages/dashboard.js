// import Chart from "chart.js/auto";
// import axios from "axios";

window.DashboardPage = function (url) {
    "use strict";

    let registeredData, myChart;

    // Chart widget page
    if ($("#myChart").length) {
        let ctx = $("#myChart")[0].getContext("2d");
        const date = new Date();
        $.ajax({
            url,
            type: 'GET',
            // data : { id : id },
            success: function(data){
                console.log(data.data[0][0]["value"]);
                myChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: 'Clock In',
                                data:data.data[0][0]["value"],
                                borderWidth: 1,
                                backgroundColor: '#9BD0F5',

                            },
                            {
                                label: 'Clock Out',
                                data:data.data[0][1]["value"],
                                borderWidth: 1,
                                backgroundColor: '#000',

                            }
                    ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                    },
                });
            },
            error: function(data){
                alert('gagal melakukan proses!');
            }
        })


    }


}
