<?php
// if the user isn't logged in, send them back to the login page
session_start();
if (!isset($_SESSION['userId'])) {
  header('Location: login.html');
  die();
}

// should I pre-fill the form?
$edit = false;
if (isset($_GET['id'])) {
  $edit = true;
}

require "load-db.php";
$db = loadDatabase();
$transaction = null;

// make sure the user owns the category that the transaction applies to
if ($edit) {
        
  // get the transaction
  $stmt = $db->prepare('SELECT * FROM transaction WHERE id=:id');
  $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $transaction = $transactions[0];

  $stmt = $db->prepare('SELECT * FROM category WHERE id=:id');
  $stmt->bindValue(':id', $transaction['category_id'], PDO::PARAM_INT);
  $stmt->execute();
  $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $category = $categories[0];

  // make sure the user owns the requested category
  if ($_SESSION['userId'] != $category['user_id']) {
    header('Location: home.php');
    die();
  }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title><?php if ($edit){echo "Edit";}else{echo "New";} ?> Transaction</title>

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

      <form>
        <!-- Pass the ID to the form processor. -1 means a new transaction, not an edit -->
        <input type="hidden" name="id" 
          <?php if($edit){echo 'value="'.$transaction['id'].'"';}else{echo 'value="-1"';} ?> >
        <div class="row">
          <div class="input-field col s6">
            <select id="category" name="category">

            <?php
            // get all the user's categories
            $stmt = $db->prepare('SELECT id,name FROM category WHERE user_id=:id');
            $stmt->bindValue(':id', $_SESSION['userId'], PDO::PARAM_INT);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $category) {
              echo '<option value="' . $category['id'] . '">' . $category['name']
                   . '</option>';
            }
            ?>

            </select>
            <label for="category">Category</label>
          </div>
          <div class="input-field col s6">
            <input id="amount" name="amount" type="number" min="0.01" step="0.01"
              <?php if($edit){printf("value=\"%.2f\"", $transaction['amount'] / 100.0);} ?>>
            <label for="amount">Amount</label>
          </div>
        </div>
        <div class="row">          
          <div class="col s6">
            <label for="transaction_date">Transaction Date</label>
            <input id="transaction_date" name="transaction_date" type="date" class="datepicker"
              <?php if($edit){printf("value=%s", $transaction['date']);} ?>>
          </div>
          <div class="input-field col s6">
            <textarea id="comments" name="comments" class="materialize-textarea"><?php
              if ($edit) {
                echo $transaction['comments'];
              }
              ?></textarea>
            <label for="comments">Comments (Optional)</label>
          </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light" type="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>

    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <!-- This has to be run to initialize the select -->
  <script>$(document).ready(function(){$('#category').material_select();});</script>

  </body>
</html>
