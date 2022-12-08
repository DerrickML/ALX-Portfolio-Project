var CType;
CType = 'line';

function getChartData() {

    $(document).ready(function () {
        showGraph();
    });

    function showGraph() {

        $.post("data.php",
            function (data) {
                console.log(data);
                var timestamp = [];
                var moisture = [];

                for (var i in data) {
                    timestamp.push(data[i].timestamp);
                    moisture.push(data[i].moisture);
                }

                var chartdata = {
                    labels: timestamp,
                    datasets: [
                        {
                            label: 'Moisture (%)',
                            //backgroundColor: 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.2)',
                            borderColor: 'green',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            lineTension: 0.3,
                            fill: true,
                            data: moisture,
                            borderWidth: 2
                        }
                    ]

                };

                var graphTarget = $("#graphCanvas");

                var LineGraph = new Chart(graphTarget, {
                    type: CType,
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

$("#renderBtnBubble").click(
    function(){
        CType = 'bubble';
        //$("#loadingMessage").html('<img src="tenor.gif" alt="" srcset="">');
        getChartData();
    }
);

$("#renderBtnLine").click(
    function(){
        CType = 'line';
        //$("#loadingMessage").html('<img src="tenor.gif" alt="" srcset="">');
        getChartData();
    }
);

$("#renderBtnRadar").click(
    function(){
        CType = 'radar';
        //$("#loadingMessage").html('<img src="tenor.gif" alt="" srcset="">');
        getChartData();
    }
);
$("#renderBtnBar").click(
    function(){
        CType = 'bar';
        //$("#loadingMessage").html('<img src="tenor.gif" alt="" srcset="">');
        getChartData();
    }
);
//type:line/bar/radar/doughnut & pie/ polar area/bubble/scatter