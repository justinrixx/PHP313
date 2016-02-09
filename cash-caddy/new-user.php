<?php

// check for valid data
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	header('Location: login.html');
	die();
}

// check if that username already exists
require "load-db.php";
$db = loadDatabase();

$stmt = $db->prepare('SELECT id FROM user WHERE email=:email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// go back if that user exists already
if (!empty($rows)) {
	header('Location: login.html');
	die();
}

// TODO hash the password
$hash = $_POST['password'];
$salt = "";

// Add the user's info TODO
$stmt = $db->prepare('INSERT INTO user (email, hash, salt) VALUES(:email, :hash, :salt)');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':hash', $hash, PDO::PARAM_STR);
$stmt->bindValue(':salt', $salt, PDO::PARAM_STR);
$stmt->execute();

$id = $db->lastInsertId();

// send the user to the home page
session_start();
$_SESSION['userId'] = $id;
header('Location: home.php');
?>
