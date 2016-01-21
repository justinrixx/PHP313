<?php

$COOKIE_NAME = "quiz_done";

// check for cookie -- redirect if necessary
if (isset($_COOKIE[$COOKIE_NAME])) {
  header('Location: results.php');
} 

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
        <input class="with-gap" name="q1" type="radio" id="rainbow" value="0" checked />
        <label for="rainbow">Rainbow</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="team-colors" value="1" />
        <label for="team-colors">My team's colors</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="light-dark" value="2" />
        <label for="light-dark">Some light, some dark</label>
      </p>
      <p>
        <input class="with-gap" name="q1" type="radio" id="black" value="3" />
        <label for="black">Black</label>
      </p> <br />

      <!-- Question 2 -->
      <h5 class="light">Favorite language</h5>
      <p>
        <input class="with-gap" name="q2" type="radio" id="english" value="0" checked />
        <label for="english">English</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="c" value="1" />
        <label for="c">C</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="haskell" value="2" />
        <label for="haskell">Haskell</label>
      </p>
      <p>
        <input class="with-gap" name="q2" type="radio" id="mission" value="3" />
        <label for="mission">My mission language</label>
      </p> <br />

      <!-- Question 3 -->
      <h5 class="light">Favorite operating system</h5>
      <p>
        <input class="with-gap" name="q3" type="radio" id="windows" value="0" checked />
        <label for="windows">Windows</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="mac" value="1" />
        <label for="mac">Mac</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="linux" value="2" />
        <label for="linux">Linux</label>
      </p>
      <p>
        <input class="with-gap" name="q3" type="radio" id="emacs" value="3" />
        <label for="emacs">Emacs</label>
      </p> <br />

      <!-- Question 4 -->
      <h5 class="light">Favorite pizza</h5>
      <p>
        <input class="with-gap" name="q4" type="radio" id="pepperoni" value="0" checked />
        <label for="pepperoni">Pepperoni</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="hawaiian" value="1" />
        <label for="hawaiian">Hawaiian</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="anchovies" value="2" />
        <label for="anchovies">Anchovies</label>
      </p>
      <p>
        <input class="with-gap" name="q4" type="radio" id="mushroom" value="3" />
        <label for="mushroom">Mushroom</label>
      </p> <br />

      <!-- Question 5 -->
      <h5 class="light">Favorite season</h5>
      <p>
        <input class="with-gap" name="q5" type="radio" id="spring" value="0" checked />
        <label for="spring">Spring</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="summer" value="1" />
        <label for="summer">Summer</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="fall" value="2" />
        <label for="fall">Fall</label>
      </p>
      <p>
        <input class="with-gap" name="q5" type="radio" id="winter" value="3" />
        <label for="winter">Winter</label>
      </p> <br />

      <br />
      <!-- Submit Button -->
      <button class="btn waves-effect waves-light" type="submit">Submit
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
