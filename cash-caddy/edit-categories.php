<?php
// if the user isn't logged in, send them back to the login page
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.html');
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Edit Categories</title>

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

    <?php
      require "load-db.php";
      $db = loadDatabase();
      
      // get all the user's categories
      $stmt = $db->prepare('SELECT name,amount,refresh_code,id FROM category WHERE user_id=:id');
      $stmt->bindValue(':id', $_SESSION['userId'], PDO::PARAM_INT);
      $stmt->execute();
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (empty($categories)) {
        echo '<br /><br /><h5 class="header col s12 light center">You don\'t seem to have any categories at this time.</h5>';
      } else {
    ?>

      <table class="striped centered">
        <thead>
          <tr>
              <th>Category</th>
              <th>Amount</th>
              <th>Refreshes</th>
          </tr>
        </thead>

        <tbody>
        <?php
        
        // output the category as a row
        foreach ($categories as $category) {
          echo "<tr><td>" . $category['name'] . "</td><td>";
          printf("$%.2f", $category['amount'] / 100.0);
          echo "</td><td>";
          if ($category['refresh_code'] == 0) {
            echo "Monthly";
          } else if ($category['refresh_code'] == 1) {
            echo "Every 2 Weeks";
          } else {
            echo "SHOULDN'T BE HERE";
            die();
          }
          echo '</td><td><a href="edit-category.php?id=' . $category['id'] . '">'
               . '<i class="material-icons right grey-text">edit</i></a></td></tr>';
        }

      } // end of the else from above

        ?>

        </tbody>
      </table>

    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light orange" href="edit-category.php">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>

  </body>
</html>
