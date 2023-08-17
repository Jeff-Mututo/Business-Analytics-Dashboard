<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KPI Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
      <div class="col-md-2 bg-light bg-gradient">
        <h1>Business-Facing Analytics Dashboard</h1>
        <br />
        <strong>Menu<br>
        Kaplan and Norton’s Balanced Scorecard</strong>
          <ul>
            <li>Financial Perspective (KPI1a and KPI1b)</li>
            <li>Customer Perspective (KPI2a and KPI2b)</li>
            <li>Internal Business Processes Perspective (KPI3a and KPI3b)</li>
            <li>Innovation and Learning Perspective (KPI4a and KPI4b)</li>
          </ul>
      </div>
      <div class="col-md-10 row">

    <!-- Start of Key Metrics -->
    <?php
    function humanize_number($input){
      $input = number_format($input);
      $input_count = substr_count($input, ',');
      if($input_count != '0'){
          if($input_count == '1'){
              return substr($input, 0, -4).'K';
          } else if($input_count == '2'){
              return substr($input, 0, -8).'M';
          } else if($input_count == '3'){
              return substr($input, 0,  -12).'B';
          } else {
              return;
          }
      } else {
          return $input;
      }
    }
    ?>
    <?php
      $currentYear = 2021;
    ?>

    <!-- DATA RETRIEVAL FOR Key Metric 1 -->
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
      $keyMetric_Satisfaction = 0;
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $keyMetric_Satisfaction += $row['avgQ1'];
        $keyMetric_Satisfaction += $row['avgQ2'];
        $keyMetric_Satisfaction += $row['avgQ3'];
        $keyMetric_Satisfaction += $row['avgQ4'];
      }
      $keyMetric_Satisfaction = round($keyMetric_Satisfaction / 4, 1);
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>

    <!-- DATA RETRIEVAL FOR Key Metric 2 -->
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
      $keyMetric_TimeTaken = 0;
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $keyMetric_TimeTaken += $row['avgWeek1'];
        $keyMetric_TimeTaken += $row['avgWeek2'];
        $keyMetric_TimeTaken += $row['avgWeek3'];
        $keyMetric_TimeTaken += $row['avgWeek4'];
        $keyMetric_TimeTaken += $row['avgWeek5'];
        $keyMetric_TimeTaken += $row['avgWeek6'];
        $keyMetric_TimeTaken += $row['avgWeek7'];
        $keyMetric_TimeTaken += $row['avgWeek8'];
        $keyMetric_TimeTaken += $row['avgWeek9'];
        $keyMetric_TimeTaken += $row['avgWeek10'];
        $keyMetric_TimeTaken += $row['avgWeek11'];
        $keyMetric_TimeTaken += $row['avgWeek12'];
      }
      $keyMetric_TimeTaken = round($keyMetric_TimeTaken / 12, 1);
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>

    <!-- DATA RETRIEVAL FOR Key Metric 3 -->
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
      $keyMetric_RetentionRate = 0;
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $keyMetric_RetentionRate += $row['jan'];
        $keyMetric_RetentionRate += $row['feb'];
        $keyMetric_RetentionRate += $row['mar'];
        $keyMetric_RetentionRate += $row['apr'];
        $keyMetric_RetentionRate += $row['may'];
        $keyMetric_RetentionRate += $row['jun'];
        $keyMetric_RetentionRate += $row['jul'];
        $keyMetric_RetentionRate += $row['aug'];
        $keyMetric_RetentionRate += $row['sept'];
        $keyMetric_RetentionRate += $row['oct'];
        $keyMetric_RetentionRate += $row['nov'];
        $keyMetric_RetentionRate += $row['dece'];
      }
      $keyMetric_RetentionRate = round($keyMetric_RetentionRate / 12, 1);
    } else {
      echo "0 results";
    }

    $conn->close();
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
      $keyMetric_MonthlyCost = 0;
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $keyMetric_MonthlyCost += $row['jan'];
        $keyMetric_MonthlyCost += $row['feb'];
        $keyMetric_MonthlyCost += $row['mar'];
        $keyMetric_MonthlyCost += $row['apr'];
        $keyMetric_MonthlyCost += $row['may'];
        $keyMetric_MonthlyCost += $row['jun'];
        $keyMetric_MonthlyCost += $row['jul'];
        $keyMetric_MonthlyCost += $row['aug'];
        $keyMetric_MonthlyCost += $row['sept'];
        $keyMetric_MonthlyCost += $row['oct'];
        $keyMetric_MonthlyCost += $row['nov'];
        $keyMetric_MonthlyCost += $row['dece'];
      }
      $keyMetric_MonthlyCost = round($keyMetric_MonthlyCost / 12, 2);
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>

    <div class="col-md-3 my-1">
            <div class="card">
                <div class="card-body text-center">
                <strong>User Satisfaction</strong><hr>
                <h1>
                    <?= $keyMetric_Satisfaction?>/5
                </h1>
                </div>
            </div>
    </div>
    <div class="col-md-3 my-1">
            <div class="card">
                <div class="card-body text-center">
                <strong>Response Time</strong><hr>
                <h1>
                  <?= $keyMetric_TimeTaken?>mins
                </h1>
                </div>
            </div>
    </div>
    <div class="col-md-3 my-1">
            <div class="card">
                <div class="card-body text-center">
                <strong>Retention Rate</strong><hr>
                <h1>
                  <?= $keyMetric_RetentionRate?>%
                </h1>
                </div>
            </div>
    </div>
    <div class="col-md-3 my-1">
            <div class="card">
                <div class="card-body text-center">
                <strong>Monthly Cost Per User</strong><hr>
                <h1>
                  Ksh. <?= $keyMetric_MonthlyCost?>
                </h1>
                </div>
            </div>
    </div>
    <!-- End of Key Metrics -->

    <!-- Start of KPI DIVs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include 'kpi1.php'; ?>
    <?php include 'kpi2.php'; ?>
    <?php include 'kpi3.php'; ?>
    <?php include 'kpi4.php'; ?>
    <!-- End of KPI DIVs -->
  </body>
</html>