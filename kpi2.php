<!-- Data for KPIs-->
<?php
  $currentYear = 2021;
?>

<!-- DATA RETRIEVAL FOR KPI2a -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgTimeTaken`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgTimeTaken = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgTimeTaken, $row['avgWeek1']);
    array_push($avgTimeTaken, $row['avgWeek2']);
    array_push($avgTimeTaken, $row['avgWeek3']);
    array_push($avgTimeTaken, $row['avgWeek4']);
    array_push($avgTimeTaken, $row['avgWeek5']);
    array_push($avgTimeTaken, $row['avgWeek6']);
    array_push($avgTimeTaken, $row['avgWeek7']);
    array_push($avgTimeTaken, $row['avgWeek8']);
    array_push($avgTimeTaken, $row['avgWeek9']);
    array_push($avgTimeTaken, $row['avgWeek10']);
    array_push($avgTimeTaken, $row['avgWeek11']);
    array_push($avgTimeTaken, $row['avgWeek12']);
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<!-- DATA RETRIEVAL FOR KPI2b -->
<?php
include 'dbconfig.php';

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL `AvgRelevanceScore`($currentYear)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $avgRelevance = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($avgRelevance, $row['avgQ1']);
    array_push($avgRelevance, $row['avgQ2']);
    array_push($avgRelevance, $row['avgQ3']);
    array_push($avgRelevance, $row['avgQ4']);
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
        KPI2a (leading): <u>Average time taken to review and approve a notice</u><br>
        Target: Reduce the average review and approval time by 10-20% compared to the previous month<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI2a"></canvas></div>
  </div>
</div>
<div class="col-md-6 my-1">
  <div class="card">
    <div class="card-body text-center">
      <strong>
        KPI2b (lagging): <u>Notice relevance score based on user feedback or engagement</u><br>
        Target: Achieve an average relevance score of 4 or above<br>
        Current Year: <?= $currentYear?><br>
      </strong>
    </div>
    <div class="card-body"><canvas id="KPI2b"></canvas></div>
  </div>
</div>

<script>
  // LINE CHART
  const ctx2a = document.getElementById('KPI2a');
  var dataArray2a = [
    <?= $avgTimeTaken[0]?>,
    <?= $avgTimeTaken[1]?>,
    <?= $avgTimeTaken[2]?>,
    <?= $avgTimeTaken[3]?>,
    <?= $avgTimeTaken[4]?>,
    <?= $avgTimeTaken[5]?>,
    <?= $avgTimeTaken[6]?>,
    <?= $avgTimeTaken[7]?>,
    <?= $avgTimeTaken[8]?>,
    <?= $avgTimeTaken[9]?>,
    <?= $avgTimeTaken[10]?>,
    <?= $avgTimeTaken[11]?>
  ];

  new Chart(ctx2a, {
      type: 'line',
      data: {
      labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6', 'Week7', 'Week8', 'Week9', 'Week10', 'Week11', 'Week12'],
      datasets: [{
          label: 'Average Time Taken(mins)',
          data: dataArray2a,
          fill: false,
          borderColor: 'rgb(8, 61, 119)',
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

  // RADAR/BAR CHART
  const ctx2b = document.getElementById('KPI2b');
  var dataArray2b = [
    <?= $avgRelevance[0]?>,
    <?= $avgRelevance[1]?>,
    <?= $avgRelevance[2]?>,
    <?= $avgRelevance[3]?>
  ];

  new Chart(ctx2b, {
      type: 'bar',
      data: {
      labels: ['Q1', 'Q2', 'Q3', 'Q4'],
      datasets: [{
          label: 'Average Relevance Score',
          data: dataArray2b,
          borderWidth: 1,
          backgroundColor: [
              'rgb(88, 139, 139)',
              'rgb(52, 0, 104)',
              'rgb(255, 213, 194)',
              'rgb(242, 143, 59)'
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
</script>