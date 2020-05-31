$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {
        $.post("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Charts/Drone/Drone_Data.php",
            function (data)
            {
                console.log(data);
                var dates = [];
                var Runtime = [];

                for (var i in data) {
                    dates.push(data[i].Date);
                    Runtime.push(data[i].Device_Runtime);
                }

                var alldata = {
                    labels: dates,
                    datasets: [{
                        // Database
                        label: 'Drone',
                        data: Runtime,dates,
                        borderColor: "green",
                        backgroundColor: "#9ce29c",
                        fill: "1"
                    }
                    ]
                };
                var graphTarget = $("#Drone-Chart");

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
                    options: {
                        animation: {
                            duration: 1000 * 2,
                            easing: 'linear'
                        }
                    },
                    data: alldata
                });
            });
    }
}