<?php
// TODO check for cookie
// redirect if necessary
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Survey</title>

  <!-- This one is for the material design icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- For the main materialize stuff -->
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- For my own stuff -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
<div class="section">
  <div class="container">
    <h1 class="header center orange-text">A few questions . . .</h1>
    
    <div class="center">
      <a href="results.php" class="center">Or you can just see the results</a>
    </div>

    <form action="saveresults.php" method="POST">

      <!-- Question 1 -->
      <h5 class="light">Favorite color scheme</h5>
      <p>
        <input class="with-gap" name="q1" type="radio" id="rainbow" value="Rainbow" checked />
        <label for="rainbow">Rainbow</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="team-colors" value="My team's colors" />
        <label for="team-colors">My team's colors</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="light-dark" value="Some light, some dark" />
        <label for="light-dark">Some light, some dark</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="black" value="Black" />
        <label for="black">Black</label>
      </p> <br />

      <!-- Question 2 -->
      <h5 class="light">Favorite language</h5>
      <p>
        <input class="with-gap" name="q2" type="radio" id="english" value="English" checked />
        <label for="english">English</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="c" value="C" />
        <label for="c">C</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="haskell" value="Haskell" />
        <label for="haskell">Haskell</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="mission" value="My mission language" />
        <label for="mission">My mission language</label>
      </p> <br />

      <!-- Question 3 -->
      <h5 class="light">Favorite operating system</h5>
      <p>
        <input class="with-gap" name="q3" type="radio" id="windows" value="Windows" checked />
        <label for="windows">Windows</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="mac" value="Mac" />
        <label for="mac">Mac</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="linux" value="Linux" />
        <label for="linux">Linux</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="emacs" value="Emacs" />
        <label for="emacs">Emacs</label>
      </p> <br />

      <!-- Question 4 -->
      <h5 class="light">Favorite pizza</h5>
      <p>
        <input class="with-gap" name="q4" type="radio" id="pepperoni" value="Pepperoni" checked />
        <label for="pepperoni">Pepperoni</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="hawaiian" value="Hawaiian" />
        <label for="hawaiian">Hawaiian</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="anchovies" value="Anchovies" />
        <label for="anchovies">Anchovies</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="mushroom" value="Mushroom" />
        <label for="mushroom">Mushroom</label>
      </p> <br />

      <!-- Question 5 -->
      <h5 class="light">Favorite season</h5>
      <p>
        <input class="with-gap" name="q5" type="radio" id="pepperoni" value="Pepperoni" checked />
        <label for="pepperoni">Pepperoni</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="hawaiian" value="Hawaiian" />
        <label for="hawaiian">Hawaiian</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="anchovies" value="Anchovies" />
        <label for="anchovies">Anchovies</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="mushroom" value="Mushroom" />
        <label for="mushroom">Mushroom</label>
      </p> <br />

      <br />
      <!-- Submit Button -->
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
</div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>

  </body>
</html>
