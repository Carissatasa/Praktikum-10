<?php
include('conn_covid.php');

$query = mysqli_query($conn,"select country, totRecover from covid");
while ($row = mysqli_fetch_assoc($query)) {
    $country[] = $row['country'];
    $totRecover[] = $row['totRecover'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
 
<div class="container">
  <h2><b>TOTAL RECOVERED</h2><br>

  <!-- LINE CHART -->
  <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Line Chart</div>
          <div class="panel-body">
            <canvas id="lineChart" width="100%" height="100"></canvas>
            <!-- <iframe src="linechart.php" width="100%" height="400"></iframe> -->
            <script>
              var ctx = document.getElementById("lineChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: <?php echo json_encode($country); ?>,
                  datasets: [{
                    label: 'Grafik angka kesembuhan penderita Covid-19 pada 10 negara Asia',
                    data: <?php echo json_encode($totRecover); ?>,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero:true
                      }
                    }]
                  }
                }
              });
            </script>   
          </div>
        </div>
      </div>
    </div>
      
    <!-- BAR CHART -->
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Bar Chart</div>
          <div class="panel-body">
            <!-- <iframe src="barchartsjs.php" width="100%" height="400"></iframe> -->
            <canvas id="barChart" width="100%" height="100"></canvas>
            <script>
              var ctx = document.getElementById("barChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: <?php echo json_encode($country); ?>,
                  datasets: [{
                    label: 'Grafik angka kesembuhan penderita Covid-19 pada 10 negara Asia',
                    data: <?php echo json_encode($totRecover); ?>,
                    borderWidth: 1,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(128, 128, 128, 0.2)',
                      'rgba(255, 0, 255, 0.2)',
                      'rgba(0, 255, 255, 0.2)',
                      'rgba(255, 0, 0, 0.2)',
                      'rgba(255, 255, 0, 0.2)',
                      'rgba(128, 0, 128, 0.2)'
                    ]
                  }]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero:true
                      }
                    }]
                  }
                }
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PIE CHART -->
  <div class="row">
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Pie Chart</div>
          <div class="panel-body">
            <!-- <iframe src="pie.php" width="100%" height="400"></iframe> -->
            <canvas id="pieChart" width="100%" height="100"></canvas>
            <script>
              var pieConfig = {
                type: 'pie',
                data: {
                  datasets: [{
                    data:<?php echo json_encode($totRecover); ?>,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(128, 128, 128, 0.2)',
                      'rgba(255, 0, 255, 0.2)',
                      'rgba(0, 255, 255, 0.2)',
                      'rgba(255, 0, 0, 0.2)',
                      'rgba(255, 255, 0, 0.2)',
                      'rgba(128, 0, 128, 0.2)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(128, 128, 128, 0.2)',
                      'rgba(255, 0, 255, 0.2)',
                      'rgba(0, 255, 255, 0.2)',
                      'rgba(255, 0, 0, 0.2)',
                      'rgba(255, 255, 0, 0.2)',
                      'rgba(128, 0, 128, 0.2)'
                    ],
                    label: 'Presentase angka kesembuhan penderita Covid-19 pada 10 negara Asia'
                  }],
                  labels: <?php echo json_encode($country); ?>
                },
                options: {
                  responsive: true
                }
              };

              var pieCtx = document.getElementById('pieChart').getContext('2d');
              window.myPie = new Chart(pieCtx, pieConfig);
            </script>

          </div>
        </div>
      </div>
    </div>

    <!-- DOUGHNUT CHART -->
    <div class="col-sm-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Doughnut Chart</div>
          <div class="panel-body">
            <!-- <iframe src="doughnut.php" width="100%" height="400"></iframe> -->
            <canvas id="donChart" width="100%" height="100"></canvas>
            <script>
              var donConfig = {
                type: 'doughnut',
                data: {
                  datasets: [{
                    data: <?php echo json_encode($totRecover); ?>,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(128, 128, 128, 0.2)',
                      'rgba(255, 0, 255, 0.2)',
                      'rgba(0, 255, 255, 0.2)',
                      'rgba(255, 0, 0, 0.2)',
                      'rgba(255, 255, 0, 0.2)',
                      'rgba(128, 0, 128, 0.2)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(128, 128, 128, 0.2)',
                      'rgba(255, 0, 255, 0.2)',
                      'rgba(0, 255, 255, 0.2)',
                      'rgba(255, 0, 0, 0.2)',
                      'rgba(255, 255, 0, 0.2)',
                      'rgba(128, 0, 128, 0.2)'
                    ],
                    label: 'Presentase angka kesembuhan penderita Covid-19 pada 10 negara Asia'
                  }],
                  labels: <?php echo json_encode($country); ?>
                },
                options: {
                  responsive: true
                }
              };

              var donCtx = document.getElementById('donChart').getContext('2d');
              window.myDonut = new Chart(donCtx, donConfig);
            </script>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
