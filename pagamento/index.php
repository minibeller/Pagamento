<?php
session_start();
if (empty($_SESSION['email'])) {
  header('location:login.php');
}
include_once 'menu.php';
include_once 'config.php';
$sql = "SELECT *
FROM solicitacao_pagamento.solicitacao as s
INNER JOIN solicitacao_pagamento.favorecido as f ON s.favorecido_id_favorecido = f.id_favorecido
INNER JOIN solicitacao_pagamento.aprovacao as a
ON s.id_solicitacao = a.solicitacao_id_solicitacao LIMIT 5";
$result = $link->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
      ]);
      var options = {
          title: 'My Daily Activities',
          is3D: true,
        },
        chartArea = {
          backgroundColor: '#000000',
        };


      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);

    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>


<body style="width: 100%; background-color:black;">
  <div class="row" style="width: 100%;">
    <div class='col-12'>
      <img alt="W3Schools" src="img\fundo.png">
    </div>    
  </div>
  <div class="row" style="width: 100%;">
    <div class="col-3">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
              <div class="text-white-75 small">Earnings (Monthly)</div>
              <div class="text-lg font-weight-bold">$40,000</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-white-50">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="#">View Report</a>
          <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
              <path fill="black" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
            </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-dark text-white mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
              <div class="text-white-75 small">Earnings (Annual)</div>
              <div class="text-lg font-weight-bold">$215,000</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign feather-xl text-white-50">
              <line x1="12" y1="1" x2="12" y2="23"></line>
              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="#">View Report</a>
          <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
              <path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
            </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
              <div class="text-white-75 small">Task Completion</div>
              <div class="text-lg font-weight-bold">24</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square feather-xl text-white-50">
              <polyline points="9 11 12 14 22 4"></polyline>
              <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="#">View Tasks</a>
          <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
              <path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
            </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card bg-dark text-white mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
              <div class="text-white-75 small">Pending Requests</div>
              <div class="text-lg font-weight-bold">17</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle feather-xl text-white-50">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="#">View Requests</a>
          <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
              <path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
            </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class='row' style="width: 100%;">
    <div class='col-6'>
      <div class="badge bg-dark" style="width: 100%;border: 1px solid white;">
        <h1>SOLICITAÇÕES.</h1>
      </div>
      <table class="table table-hover">
        <thead style="border: 1px solid white; border-radius: 20px">
          <tr class="table-active borda" style="color:white;border-color: white;" style="width: 100% !important;">
            <th scope="col">Número Protocolo</th>
            <th scope="col">Favorecido</th>
            <th scope="col">Data Solicitação</th>
            <th scope="col">Vencimento</th>
          </tr>
        </thead>
        <tbody style="width: 100% !important;">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr class='table-primary'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
              echo "<th>" . $row['nome_favorecido'] . "</th>";
              echo "<th>" . date('d/m/Y', strtotime($row['data_solicitacao'])) . "</th>";
              echo "<th>" . date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class='col-6' style="height:100px !important;">
      <canvas class='line-chart' style="position: relative; height:103vh; width:80vw" style="background-color: rgb(0,0,0);color:rgb(255, 255, 255);"></canvas>
      <script>
        var ctx = document.getElementsByClassName('line-chart');
        var chartGraph = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: "Solicitações Por Ano 2020",
                data: [5, 10, 5, 14, 10, 3, 7, 13, 5, 7, 11, 15, 2],
                borderWidth: 6,
                borderColor: 'rgba(0, 191, 255)',
                backgroundColor: 'rgba(0, 191, 255)',
                color: 'rgb(255, 255, 255)',
              },
              {
                label: "Solicitações Por Ano 2021",
                data: [15, 1, 7, 12, 19, 8, 6, 11, 15, 4, 1, 11, 5],
                borderWidth: 6,
                borderColor: 'rgba(0, 253, 211)',
                backgroundColor: 'rgba(0, 253, 211)',
                color: 'rgb(255, 255, 255)',
              },
            ]
          },
          options: {
            title: {
              display: true,
              fontSize: 20,
              text: "Título gráfico",

            },
          },
          chartArea: {
            backgroundColor: 'rgba(0, 0, 0)',
          },
        });
      </script>
    </div>
  </div>
  <div class='row' style="width: 100%;">
    <div class='col-6'>
      <canvas class='line-chart' style="background-color: rgb(0,0,0);color:rgb(255, 255, 255);"></canvas>
      <script>
        var ctx = document.getElementsByClassName('line-chart');
        var chartGraph = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: "Solicitações Por Ano 2020",
                data: [5, 10, 5, 14, 10, 3, 7, 13, 5, 7, 11, 15, 2],
                borderWidth: 6,
                borderColor: 'rgba(0, 191, 255)',
                backgroundColor: 'rgba(0, 191, 255)',
                color: 'rgb(255, 255, 255)',
              },
              {
                label: "Solicitações Por Ano 2021",
                data: [15, 1, 7, 12, 19, 8, 6, 11, 15, 4, 1, 11, 5],
                borderWidth: 6,
                borderColor: 'rgba(0, 253, 211)',
                backgroundColor: 'rgba(0, 253, 211)',
                color: 'rgb(255, 255, 255)',
              },
            ]
          },
          options: {
            title: {
              display: true,
              fontSize: 20,
              text: "Título Grafico",

            },
          },
          chartArea: {
            backgroundColor: 'rgba(0, 0, 0)',
          },
        });
      </script>
    </div>
  </div>
</body>