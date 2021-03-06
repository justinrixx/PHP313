<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <!-- javascript functions called by the page -->
  <script src="js/index.js"></script>

  <title>Justin Ricks</title>

  <!-- CSS
       I'm using CSS from the Materialize project in order to make my site conform to
       material design -->

  <!-- This one is for the material design icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- For the main materialize stuff -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- For my own stuff -->
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
  <nav class="light-blue lighten-1" role="navigation">
  <!--
    Empty, just because I want the blue bar across the top
    -->
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Justin Ricks</h1>
      <div class="row center">
        <h5 class="header col s12 light">A little about myself</h5>
      </div>
      <div class="row center">
        <a href="assignments.html" id="download-button" class="btn-large waves-effect waves-light orange">Assignments</a>
      </div>
      <br><br>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">code</i></h2>
            <h5 class="center">Computer Science major</h5>

            <p class="light">I'm a student studying computer science at BYU-Idaho. I'm actually from Rexburg,
            and enjoy it here. I really enjoy tackling hard problems, and the more I learn about computer
            science, the more I want to learn.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">ac_unit</i></h2>
            <h5 class="center">Canadian missionary</h5>

            <p class="light">I served in the Canada Edmonton Mission from 2012 to 2014. It was cold, but a
            great time of my life. It's true, Canadians are very polite, and they say "sorry" a whole lot.</p>
            <p class="light">All jokes aside, Canada is a really great place, at least in the summer :)</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">person_add</i></h2>
            <h5 class="center">Taken</h5>

            <p class="light">My wife and I have been happily married since May. I've got to say, married
            life is way better than single life! My wife works as a nurse full-time to put me through
            school. She naturally has a degree in nursing.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Android Apps</h5>
          <p class="grey-text text-lighten-4">If you're interested in looking at some of the Android apps
          I've built myself and with others, check these out.</p>
          <a class="waves-effect waves-light btn" id="app-button" onclick="showAppLinks()">
            <i class="material-icons right">android</i>See my apps</a>


        </div>
        <div class="col l3 s12 hidden" id="app-links">
          <ul>
            <li><a class="white-text" href="https://play.google.com/store/apps/details?id=com.gmail.rixx.justin.envelopebudget">Cash Caddy</a></li>
            <li><a class="white-text" href="https://play.google.com/store/apps/details?id=com.gmail.app.studios.on.game">Game On</a></li>
            <li><a class="white-text" href="https://play.google.com/store/apps/details?id=com.gmail.rixx.justin.sieveoferatosthenes">Sieve of Eratosthenes</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
