import Chart from "chart.js/auto";
import axios from "axios";

async function DashboardPage() {
    "use strict";

    let registeredData, myChart;

    // Chart widget page
    if ($("#myChart").length) {
        let ctx = $("#myChart")[0].getContext("2d");
        const date = new Date();
        registeredData = await getDataChart();
        myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: registeredData.labels,
                datasets: [
                    {
                        label: 'Clock In',
                        data:registeredData.data[0][0]["value"],
                        borderWidth: 1,
                        backgroundColor: '#9BD0F5',

                    },
                    {
                        label: 'Clock Out',
                        data:registeredData.data[0][1]["value"],
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
    }



    async function getDataChart() {
        try {
            const response = await axios.get(window.location.origin + "/dashboard-chart");

            // $("#load-graph").addClass("hidden").removeClass("flex");
            return response.data;
        } catch (error) {
            console.error(error);
        }
    }

}

(function () {
    DashboardPage();
})();

window.DashboardPage = DashboardPage;
