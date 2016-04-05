<?php
// if the user isn't logged in, send them back to the login page
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.html');
  die();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Cash Caddy</title>

  <!-- CSS
       I'm using CSS from the Materialize project in order to make my site conform to
       material design -->

  <!-- This one is for the material design icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- For the main materialize stuff -->
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>

  <!-- Navigation bar -->
  <?php include 'nav.php' ?>

  <div class="container">
    <div class="section">
    <h3 class="header col s12 light center">Balances</h3>

      <?php
      require "load-db.php";
      $db = loadDatabase();
        
      // get all the user's categories
      $stmt = $db->prepare('SELECT * FROM category WHERE user_id=:id');
      $stmt->bindValue(':id', $_SESSION['userId'], PDO::PARAM_INT);
      $stmt->execute();
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (empty($categories)) {
        echo '<br /><br /><h5 class="header col s12 light center">You don\'t seem to have any categories at this time.</h5>';
      }
      else {
      ?>

      <table class="striped centered">
        <thead>
          <tr>
              <th>Category</th>
              <th>Net</th>
          </tr>
        </thead>

        <tbody>

        <?php

          foreach ($categories as $category) {

          // default date -- the beginning of time :)
          $date = "1970-01-01";

          // what's the refresh code?
          if ($category['refresh_code'] == 0) { // 0-> monthly
            $date = date('Y-m-d', strtotime("+1 month", strtotime($category['last_refresh'])));
          } else if ($category['refresh_code'] == 1) { // 1-> every two weeks
            $date = date('Y-m-d', strtotime("+2 weeks", strtotime($category['last_refresh'])));
          }

          echo '<h1>Date: ' . $date . '</h1>';

          // get the total by summing
          $stmt = $db->prepare('SELECT SUM(amount) FROM `transaction` WHERE `category_id`=:id AND `date`>=' . strval($date));
          $stmt->bindValue(':id', $category['id'], PDO::PARAM_INT);
          $stmt->execute();
          $sum = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $total = intval($sum[0] ["SUM(amount)"]);


          echo "<tr><td>" . htmlspecialchars($category['name']) . "</td>";
          echo '<td class="';

          $net = ($category['amount'] - $total) / 100.0;

          // green if positive
          if ($net >= 0) {
            echo 'green-text';
          } else {
            echo 'red-text';
          }

          echo '">';
          printf("$%.2f", $net);
          echo "</td>";
          echo '<td><a href="view-transactions.php?id=' . $category['id'] . '">'
                . '<i class="material-icons right grey-text">list</i></a></td></tr>';
        }
      } // end the else from the above php block

        ?>

        </tbody>
      </table>
    </div>
  </div>

  <?php
  // only show the floating action button if the user has categories
  if (!empty($categories)) { ?>

  <!-- Floating Action Button -->
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light orange" href="edit-transaction.php">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <?php } ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script>$(".button-collapse").sideNav();</script>

  </body>
</html>
