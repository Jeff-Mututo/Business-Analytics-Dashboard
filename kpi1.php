<!-- Data for KPIs-->
<?php
  $currentYear = 2021;
?>

<!-- DATA RETRIEVAL FOR KPI1a -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `TotalFeedbackThisYear`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $sumQ1 = array();
  $sumQ2 = array();
  $sumQ3 = array();
  $sumQ4 = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($sumQ1, $row['sumQ1']);
    array_push($sumQ2, $row['sumQ2']);
    array_push($sumQ3, $row['sumQ3']);
    array_push($sumQ4, $row['sumQ4']);
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<!-- DATA RETRIEVAL FOR KPI1b -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgUserSatisfaction`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgQ1 = array();
  $avgQ2 = array();
  $avgQ3 = array();
  $avgQ4 = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgQ1, $row['avgQ1']);
    array_push($avgQ2, $row['avgQ2']);
    array_push($avgQ3, $row['avgQ3']);
    array_push($avgQ4, $row['avgQ4']);
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
        KPI1a (leading): <u>Number of user suggestions or feedback received for notice board improvements</u><br>
        Target: increase by 10% compared to the previous quarter<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI1a"></canvas></div>
  </div>
</div>
<div class="col-md-6 my-1">
  <div class="card">
    <div class="card-body text-center">
      <strong>
        KPI1b (lagging): <u>Average user satisfaction rating with notice board updates</u><br>
        Target: Maintain an average satisfaction rating of 4 or above<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI1b"></canvas></div>
  </div>
</div>

<script>
  // BAR CHART
  const ctx1a = document.getElementById('KPI1a');
  var dataArray1a = [<?= $sumQ1[0]?>, <?= $sumQ2[0]?>, <?= $sumQ3[0]?>, <?= $sumQ4[0]?>];

  new Chart(ctx1a, {
      type: 'bar',
      data: {
      labels: ['Q1', 'Q2', 'Q3', 'Q4'],
      datasets: [{
          label: 'Total User Feedback',
          data: dataArray1a,
          borderWidth: 1,
          backgroundColor: [
              'rgb(33, 79, 75)',
              'rgb(220, 73, 58)',
              'rgb(106, 15, 73)',
              'rgb(167, 196, 194)'
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
  const ctx1b = document.getElementById('KPI1b');
  var dataArray1b = [<?= $avgQ1[0]?>, <?= $avgQ2[0]?>, <?= $avgQ3[0]?>, <?= $avgQ4[0]?>];

  new Chart(ctx1b, {
      type: 'line',
      data: {
      labels: ['Q1', 'Q2', 'Q3', 'Q4'],
      datasets: [{
          label: 'Average User Satisfaction',
          data: dataArray1b,
          fill: false,
          borderColor: 'rgb(8, 61, 119)',
          tension: 0.1
      },{
        label: 'Target',
        data: [4,4,4,4],
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