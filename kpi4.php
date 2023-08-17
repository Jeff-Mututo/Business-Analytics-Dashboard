<!-- Data for KPIs-->
<?php
  $currentYear = 2021;
?>

<!-- DATA RETRIEVAL FOR KPI4a -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgMonthlyCost`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgMonthlyCost = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgMonthlyCost, $row['jan']);
    array_push($avgMonthlyCost, $row['feb']);
    array_push($avgMonthlyCost, $row['mar']);
    array_push($avgMonthlyCost, $row['apr']);
    array_push($avgMonthlyCost, $row['may']);
    array_push($avgMonthlyCost, $row['jun']);
    array_push($avgMonthlyCost, $row['jul']);
    array_push($avgMonthlyCost, $row['aug']);
    array_push($avgMonthlyCost, $row['sept']);
    array_push($avgMonthlyCost, $row['oct']);
    array_push($avgMonthlyCost, $row['nov']);
    array_push($avgMonthlyCost, $row['dece']);
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<!-- DATA RETRIEVAL FOR KPI4b -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgRevenueGenerated`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgRevGenerated = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgRevGenerated, $row['avgQ1']);
    array_push($avgRevGenerated, $row['avgQ2']);
    array_push($avgRevGenerated, $row['avgQ3']);
    array_push($avgRevGenerated, $row['avgQ4']);
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<div class="col-md-6 my-1">
  <div class="card">
    <div class="card-body text-center">
      <strong>
        KPI4a (leading): <u>Monthly cost per user for maintaining the notice board platform</u><br>
        Target: Reduce the monthly cost per user by 10% compared to the previous quarter<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI4a"></canvas></div>
  </div>
</div>
<div class="col-md-6 my-1">
  <div class="card">
    <div class="card-body text-center">
      <strong>
        KPI4b (lagging): <u>Revenue generated through advertising or sponsorships</u><br>
        Target: Increase revenue by 15% compared to the previous year<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI4b"></canvas></div>
  </div>
</div>

<script>
  // BAR CHART
  const ctx4a = document.getElementById('KPI4a');
  var dataArray4a = [
    <?= $avgMonthlyCost[0]?>,
    <?= $avgMonthlyCost[1]?>,
    <?= $avgMonthlyCost[2]?>,
    <?= $avgMonthlyCost[3]?>,
    <?= $avgMonthlyCost[4]?>,
    <?= $avgMonthlyCost[5]?>,
    <?= $avgMonthlyCost[6]?>,
    <?= $avgMonthlyCost[7]?>,
    <?= $avgMonthlyCost[8]?>,
    <?= $avgMonthlyCost[9]?>,
    <?= $avgMonthlyCost[10]?>,
    <?= $avgMonthlyCost[11]?>
  ];

  new Chart(ctx4a, {
      type: 'bar',
      data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      datasets: [{
          label: 'Average Monthly Cost per User',
          data: dataArray4a,
          borderWidth: 1,
          backgroundColor: [
              'rgb(58, 46, 57)',
              'rgb(30, 85, 92)',
              'rgb(244, 216, 205)',
              'rgb(237, 177, 131)',
              'rgb(241, 81, 82)',
              'rgb(13, 19, 33)'
          ]
      }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // LINE CHART
  const ctx4b = document.getElementById('KPI4b');
  var dataArray4b = [
    <?= $avgRevGenerated[0]?>,
    <?= $avgRevGenerated[1]?>,
    <?= $avgRevGenerated[2]?>,
    <?= $avgRevGenerated[3]?>
  ];

  new Chart(ctx4b, {
      type: 'line',
      data: {
      labels: ['Q1', 'Q2', 'Q3', 'Q4'],
      datasets: [{
          label: 'Revenue Generated(in Thousands)',
          data: dataArray4b,
          fill: false,
          borderColor: 'rgb(255, 0, 0)',
          tension: 0.1
      }]
      },
      options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
      }
  });
</script>