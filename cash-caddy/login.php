<?php

require("password.php");

// check if the user logged in correctly
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	header('Location: login.html');
	die();
}

// now check the database for the user record
require "load-db.php";
$db = loadDatabase();

// Get the user (if any) with that username
$stmt = $db->prepare('SELECT hash,id FROM user WHERE email=:email');
$stmt->bindValue(':email', strtolower($_POST['email']), PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// no user with that email address
if (empty($rows)) {
	header('Location: login.html');
	die();
}

// wrong password
if (!password_verify($_POST['password'], $rows[0]['hash'])) {
	header('Location: login.html');
	die();
}

// if they got in, then save their id and send them to the home page
session_start();
$_SESSION['userId'] = $rows[0]['id'];
header('Location: home.php');
?>
