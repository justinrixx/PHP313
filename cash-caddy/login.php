<?php
// check if the user logged in correctly
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	header('Location: login.html');
}

// now check the database for the user record
// TODO require db.php


// if they got in, then send them to the home page
header('Location: home.php');
?>
