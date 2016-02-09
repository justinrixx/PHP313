<?php

// check for valid data
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	header('Location: login.html');
	die();
}

// now check the database for the user record
require "load-db.php";
$db = loadDatabase();

// hash the password

// Add the user's info TODO
$stmt = $db->prepare('INSERT INTO user TODO');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// send the user to the home page
session_start();
$_SESSION['userId'] = $id;
header('Location: home.php');
?>
