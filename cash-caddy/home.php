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

      <table class="striped centered">
        <thead>
          <tr>
              <th>Category</th>
              <th>Net</th>
          </tr>
        </thead>

        <tbody>

          <!-- TODO make dynamic -->
          <tr>
            <td>Grocery</td>
            <td class="green-text">$0.87</td>
            <td><a href="#"><i class="material-icons right grey-text">list</i></a></td>
          </tr>
          <tr>
            <td>Gas</td>
            <td class="red-text">$3.76</td>
            <td><a href="#"><i class="material-icons right grey-text">list</i></a></td>
          </tr>
          <tr>
            <td>Other</td>
            <td class="green-text">$7.00</td>
            <td><a href="#"><i class="material-icons right grey-text">list</i></a></td>
          </tr>
          <!-- Done dynamic -->

        </tbody>
      </table>
    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light orange" href="#">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>

  </body>
</html>
