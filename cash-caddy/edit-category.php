<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

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

      <form>
        <div class="row">
          <div class="input-field col s6">
            <input id="category_name" name="category_name" type="text">
            <label for="category_name">Category Name</label>
          </div>

          <div class="input-field col s6">
            <select id="refresh_code" name="refresh_code">
              <option value="0">2 Weeks</option>
              <option value="1" selected>Month</option>
            </select>
            <label for="refresh_code">Refresh Every</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="amount" name="amount" type="number" min="0.01" step="0.01">
            <label for="amount">Amount</label>
          </div>
          <div class="col s6">
            <label for="next_refresh">Starting</label>
            <input id="next_refresh" name="next_refresh" type="date" class="datepicker">
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
  <script>$(document).ready(function(){$('#refresh_code').material_select();});</script>

  </body>
</html>
