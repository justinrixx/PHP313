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

if ($edit) {

  // get the category
  $stmt = $db->prepare('SELECT id,name,amount,last_refresh,user_id FROM category WHERE id=:id');
  $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
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
  <script src="js/edit-category.js"></script>

  <title>Edit Category</title>

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
      <?php if(!isset($_GET['id'])){echo "Add";}else{echo "Edit";} echo " a Category";?>
    </h3>

      <form action="edit-category-handler.php" method="POST" onsubmit="return validateForm()">
        <!-- Pass the ID to the form processor. -1 means a new category, not an edit -->
        <input type="hidden" name="id"
          <?php if($edit){echo 'value="' . $category['id'] . '"';}else{echo 'value="-1"';}?>>
        <div class="row">
          <div class="input-field col s6">
            <input id="category_name" name="category_name" type="text" 
              <?php if($edit){echo 'value="' . $category['name'] . '"';} ?>>
            <label for="category_name">Category Name</label>
          </div>

          <div class="input-field col s6">
            <select id="refresh_code" name="refresh_code">
              <option value="1">2 Weeks</option>
              <option value="0" selected>Month</option>
            </select>
            <label for="refresh_code">Refresh Every</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="amount" name="amount" type="number" min="0.01" step="0.01"
              <?php if($edit){echo 'value="'; printf("%.2f", $category['amount'] / 100.0); echo '"';} ?>>
            <label for="amount">Amount</label>
          </div>
          <div class="col s6">
            <label for="next_refresh">Starting</label>
            <input id="next_refresh" name="next_refresh" type="date" class="datepicker"
              <?php if($edit){echo 'value="' . $category['last_refresh'] . '"';} ?>>
          </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light" type="submit">Submit
            <i class="material-icons right">send</i>
          </button>
          <?php if($edit){ ?>
          <button class="btn waves-effect waves-light" type="submit" name="delete">Delete
            <i class="material-icons right">delete</i>
          </button>
          <?php } ?>
        </div>
      </form>

    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <!-- This has to be run to initialize the select -->
  <script>$(document).ready(function(){$('#refresh_code').material_select();});</script>

  </body>
</html>
