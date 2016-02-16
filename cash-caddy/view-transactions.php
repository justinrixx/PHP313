<?php
// if the user isn't logged in, send them back to the login page
session_start();
if (!isset($_SESSION['userId']) || !isset($_GET['id'])) {
  header('Location: login.html');
  die();
}

require "load-db.php";
$db = loadDatabase();
      
// get the category
$stmt = $db->prepare('SELECT user_id,name FROM category WHERE id=:id');
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
$category = $categories[0];

// make sure the user owns the requested category
if ($_SESSION['userId'] != $category['user_id']) {
  header('Location: home.php');
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
    <h3 class="header col s12 light center">
      <?php echo "Transactions for " . htmlspecialchars($category['name']);?>
    </h3>

      <table class="striped centered">
        <thead>
          <tr>
              <th>Date</th>
              <th>Amount</th>
              <th>Comments</th>
          </tr>
        </thead>

        <tbody>

        <?php
        $stmt = $db->prepare('SELECT id,`date`,amount,comments FROM transaction WHERE category_id=:id');
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($transactions as $transaction) {
          echo "<tr><td>" . $transaction['date'] . "</td><td>";
          printf("$%.2f", $transaction['amount'] / 100.0); 
          echo "</td><td>" . htmlspecialchars($transaction['comments']) . "</td><td>" .
           '<a href="edit-transaction.php?id=' . $transaction['id'] . '">'
                . '<i class="material-icons right grey-text">edit</i></a></td></tr>';
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>

  </body>
</html>
