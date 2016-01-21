<?php
session_start();

// I'm going to use this to display the correct names
$answers = array
  (
  array("Rainbow", "My team's colors", "Some light, some dark", "Black"),
  array("English", "C", "Haskell", "My mission language"),
  array("Windows", "Mac", "Linux", "Emacs"),
  array("Pepperoni", "Hawaiian", "Anchovies", "Mushroom"),
  array("Spring", "Summer", "Fall", "Winter")
  );

$questions = array
  ( "Favorite color scheme",
    "Favorite language",
    "Favorite operating system",
    "Favorite pizza",
    "Favorite season"
  );

$FILENAME = "results.txt";

// the results
$results = array();
$exists = false;

// Read the file if it exists
if (file_exists($FILENAME)) {

  $exists = true;

  $resultsstring = file_get_contents("results.txt");

  $results = json_decode($resultsstring);
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Survey Results</title>

  <!-- CSS
       I'm using CSS from the Materialize project in order to make my site conform to
       material design -->

  <!-- This one is for the material design icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- For the main materialize stuff -->
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- For my own stuff -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!-- javascript for the pie charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">The results</h1>

      <?php

      // show no results if there are none
      if (!$exists) {
        ?>
        <div class="row center">
        <h5 class="header col s12 light">There appear to be no results at this time</h5>
        </div>
        <?php
      } else {
        // draw some pretty pie charts
        ?>
        <div class="row center">
        <h5 class="header col s12 light">The results are in!</h5>
        </div>

        <?php
        // output divs to hold the pie charts. one for each question
        $i = 0;
        foreach ($results as $row) {
          echo '<div id="pie' . $i . '" style="width: 900px; height: 500px;"></div>';
          $i++;
        }

        ?>
        
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data;
          var chart;
          var options;

        <?php
        $i = 0;
        foreach ($results as $row) {

          // initialize the chart data
          echo "data = google.visualization.arrayToDataTable([\n";
          echo "['Question', 'Answers'],\n";

          $j = 0;
          foreach ($row as $answer) {
            echo "[\"" . $answers[$i][$j] ."\", " . $results[$i][$j] . "],\n";
            $j++;
          }

          echo "]);\n";

          echo "options = {title: '" . htmlspecialchars($questions[$i]) . "'};\n";

          echo "chart = new google.visualization.PieChart(document.getElementById('pie" . $i . "'));\n";

          echo "chart.draw(data, options);\n";

          $i++;
        }

        echo "}\n
        </script>\n";
      }

      ?>

    </div>
  </div>

</body>
</html>