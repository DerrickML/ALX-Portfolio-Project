function getChartData() {

    $(document).ready(function () {
        showGraph();
    });

    function showGraph() {

        $.post("data2.php",
            function (data2) {
                console.log(data2);
                var timestamp = [];
                var moisture = [];
                var LightIntensity = [];
                var Temperature = [];
                var Humidity = [];

                for (var i in data2) {
                    timestamp.push(data2[i].timestamp);
                    moisture.push(data2[i].moisture);
                    LightIntensity.push(data2[i].LightIntensity);
                    Temperature.push(data2[i].Temperature);
                    Humidity.push(data2[i].Humidity);
                }

                var chartdata = {
                    labels: timestamp,
                    datasets: [
                        {
                            label: 'Moisture Levels',
                            //backgroundColor: 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.2)',
                            borderColor: 'blue',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            fill: true,
                            data: moisture,
                            borderWidth: 2
                        },
                        {
                            label: 'Light Intensity',
                            //backgroundColor: 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.2)',
                            borderColor: 'red',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            lineTension: 0.3,
                            fill: true,
                            data: LightIntensity,
                            borderWidth: 2
                        },
                        {
                            label: 'Temperature (C)',
                            //backgroundColor: 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.2)',
                            borderColor: 'green',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            lineTension: 0.3,
                            fill: true,
                            data: Temperature,
                            borderWidth: 2
                        },
                        {
                            label: 'Humidity',
                            //backgroundColor: 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.2)',
                            borderColor: 'black',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            lineTension: 0.3,
                            fill: true,
                            data: Humidity,
                            borderWidth: 2
                        }

                    ]

                };

                var graphTarget = $("#graphCanvas");

                var LineGraph = new Chart(graphTarget, {
                    type: 'line',
                    // data: moisture
                    data: chartdata,

                    //configuration options
                    options: {
                        animation: false,
                        legend: {
                            display: true,
                            position: 'top',
                            // labels: {
                            //     fontcolor: 'rgb(255,99,132)'
                            // }
                        }
                    }
                }

                );
            });
        //chartdata.update();

    }
    setInterval(showGraph, 3000); //milisecond
};
getChartData();