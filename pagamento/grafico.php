<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Document</title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>
<body>
    <canvas class='line-chart' style="background-color: rgb(0,0,0);color:rgb(255, 255, 255);"></canvas>
    <script>
    var ctx = document.getElementsByClassName('line-chart');

    var chartGraph = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            datasets:[{
                label: "Solicitações Por Ano 2020",
                data:[5,10,5,14,10,3,7,13,5,7,11,15,2],
                borderWidth: 6,
                borderColor:'rgba(0, 191, 255)',
                backgroundColor: 'rgba(0, 191, 255)',
                color: 'rgb(255, 255, 255)',
            },
            {
                label: "Solicitações Por Ano 2021",
                data:[15,1,7,12,19,8,6,11,15,4,1,11,5],
                borderWidth: 6,
                borderColor:'rgba(0, 253, 211)',
                backgroundColor: 'rgba(0, 253, 211)',
                color: 'rgb(255, 255, 255)',
            },
        ]
        },
        options:{
            title:{
                display: true,
                fontSize: 20,
                text: "TITULO GAFICO",
               
            },
        },
        chartArea: {
            backgroundColor: 'rgba(0, 0, 0)',
        },
    });
    </script>
</body>
</html>
