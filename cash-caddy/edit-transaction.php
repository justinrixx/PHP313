<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Edit Transaction</title>

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
        <div class="row">
          <div class="input-field col s6">
            <select id="category" name="category">

              <!-- TODO make dynamic -->
              <option value="0">Gas</option>
              <option value="1">Grocery</option>
              <option value="2">Entertainment</option>
              <option value="3">Other</option>
              <!-- End dynamic -->

            </select>
            <label for="category">Category</label>
          </div>
          <div class="input-field col s6">
            <input id="amount" name="amount" type="number" min="0.01" step="0.01">
            <label for="amount">Amount</label>
          </div>
        </div>
        <div class="row">          
          <div class="col s6">
            <label for="transaction_date">Transaction Date</label>
            <input id="transaction_date" name="transaction_date" type="date" class="datepicker">
          </div>
          <div class="input-field col s6">
            <textarea id="comments" name="comments" class="materialize-textarea"></textarea>
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
