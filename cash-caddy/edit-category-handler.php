<?php

session_start();

// make sure all the data is set
if (!isset($_POST['category_name']) || !isset($_POST['refresh_code']) ||
	!isset($_POST['amount']) || !isset($_POST['next_refresh']) ||
	!isset($_POST['id']) || !isset($_SESSION['userId'])) {
	header('Location: home.php');
	die();
}
$amount_int = floatval($_POST['amount']);
$amount_int = intval($amount_int * 100.0);

// now find out if we're updating or adding
$edit = false;
if ($_POST['id'] != "-1") {
	$edit = true;
}

require "load-db.php";
$db = loadDatabase();

// different sql statements for updating or adding
if ($edit) {
	$sql = "UPDATE category SET name=:name, amount=:amount, refresh_code=:refresh_code, last_refresh=:last_refresh WHERE id=:id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':name', $_POST['category_name'], PDO::PARAM_STR);
	$stmt->bindValue(':amount', $amount_int, PDO::PARAM_INT);
	$stmt->bindValue(':refresh_code', $_POST['refresh_code'], PDO::PARAM_INT);
	$stmt->bindValue(':last_refresh', $_POST['next_refresh'], PDO::PARAM_STR);
	$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$stmt->execute();
} else {
	$sql = "INSERT INTO category (name, amount, refresh_code, last_refresh, user_id) VALUES(:name, :amount, :refresh_code, :last_refresh, :id)";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':name', $_POST['category_name'], PDO::PARAM_STR);
	$stmt->bindValue(':amount', $amount_int, PDO::PARAM_INT);
	$stmt->bindValue(':refresh_code', $_POST['refresh_code'], PDO::PARAM_INT);
	$stmt->bindValue(':last_refresh', $_POST['next_refresh'], PDO::PARAM_STR);
	$stmt->bindValue(':id', $_SESSION['userId'], PDO::PARAM_INT);
	$stmt->execute();
}

// get out of dodge
header('Location: edit-categories.php');
?>
