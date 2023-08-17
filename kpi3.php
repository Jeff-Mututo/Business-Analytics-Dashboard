<!-- Data for KPIs-->
<?php
  $currentYear = 2021;
?>

<!-- DATA RETRIEVAL FOR KPI3a -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgResponseRate`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgResponseRate = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgResponseRate, $row['jan']);
    array_push($avgResponseRate, $row['feb']);
    array_push($avgResponseRate, $row['mar']);
    array_push($avgResponseRate, $row['apr']);
    array_push($avgResponseRate, $row['may']);
    array_push($avgResponseRate, $row['jun']);
    array_push($avgResponseRate, $row['jul']);
    array_push($avgResponseRate, $row['aug']);
    array_push($avgResponseRate, $row['sept']);
    array_push($avgResponseRate, $row['oct']);
    array_push($avgResponseRate, $row['nov']);
    array_push($avgResponseRate, $row['dece']);
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<!-- DATA RETRIEVAL FOR KPI3b -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgRetentionRate`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgRetentionRate = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgRetentionRate, $row['jan']);
    array_push($avgRetentionRate, $row['feb']);
    array_push($avgRetentionRate, $row['mar']);
    array_push($avgRetentionRate, $row['apr']);
    array_push($avgRetentionRate, $row['may']);
    array_push($avgRetentionRate, $row['jun']);
    array_push($avgRetentionRate, $row['jul']);
    array_push($avgRetentionRate, $row['aug']);
    array_push($avgRetentionRate, $row['sept']);
    array_push($avgRetentionRate, $row['oct']);
    array_push($avgRetentionRate, $row['nov']);
    array_push($avgRetentionRate, $row['dece']);
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
        KPI3a (leading): <u>User engagement ie rate percentage of active users who interact with notices</u><br>
        Target: Increase the user engagement rate by 15% compared to the previous quarter<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI3a"></canvas></div>
  </div>
</div>
<div class="col-md-6 my-1">
  <div class="card">
    <div class="card-body text-center">
      <strong>
        KPI3b (lagging): <u>User retention rate ie percentage of users who continue to use the notice board over a specified period</u><br>
        Target: maintain a user retention rate of 80% or above or increasing user retention overtime<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI3b"></canvas></div>
  </div>
</div>

<script>
  // LINE CHART
  const ctx3a = document.getElementById('KPI3a');
  var dataArray3a = [
    <?= $avgResponseRate[0]?>,
    <?= $avgResponseRate[1]?>,
    <?= $avgResponseRate[2]?>,
    <?= $avgResponseRate[3]?>,
    <?= $avgResponseRate[4]?>,
    <?= $avgResponseRate[5]?>,
    <?= $avgResponseRate[6]?>,
    <?= $avgResponseRate[7]?>,
    <?= $avgResponseRate[8]?>,
    <?= $avgResponseRate[9]?>,
    <?= $avgResponseRate[10]?>,
    <?= $avgResponseRate[11]?>
  ];

  new Chart(ctx3a, {
      type: 'line',
      data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      datasets: [{
          label: 'Average Engagement Rate(%)',
          data: dataArray3a,
          fill: false,
          borderColor: 'rgb(3, 71, 72)',
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

  // LINE CHART
  const ctx3b = document.getElementById('KPI3b');
  var dataArray3b = [
    <?= $avgRetentionRate[0]?>,
    <?= $avgRetentionRate[1]?>,
    <?= $avgRetentionRate[2]?>,
    <?= $avgRetentionRate[3]?>,
    <?= $avgRetentionRate[4]?>,
    <?= $avgRetentionRate[5]?>,
    <?= $avgRetentionRate[6]?>,
    <?= $avgRetentionRate[7]?>,
    <?= $avgRetentionRate[8]?>,
    <?= $avgRetentionRate[9]?>,
    <?= $avgRetentionRate[10]?>,
    <?= $avgRetentionRate[11]?>
  ];

  new Chart(ctx3b, {
      type: 'line',
      data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      datasets: [{
          label: 'Average Retention Rate(%)',
          data: dataArray3b,
          fill: false,
          borderColor: 'rgb(238, 150, 75)',
          tension: 0.1
      },{
        label: 'Target',
        data: [80,80,80,80,80,80,80,80,80,80,80,80],
        fill: false,
        borderColor: 'rgba(255, 0, 0, 0.5)',
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