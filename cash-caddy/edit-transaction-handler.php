<?php
session_start();

require "load-db.php";
$db = loadDatabase();
$transaction = null;
$category = null;

// make sure the user owns the category that the transaction applies to
if ($_POST['id'] != -1) {
        
  // get the transaction
  $stmt = $db->prepare('SELECT * FROM transaction WHERE id=:id');
  $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
  $stmt->execute();
  $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $transaction = $transactions[0];

  $stmt = $db->prepare('SELECT * FROM category WHERE id=:id');
  $stmt->bindValue(':id', $transaction['category_id'], PDO::PARAM_INT);
  $stmt->execute();
  $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $category = $categories[0];

  // make sure the user owns the requested category
  if ($_SESSION['userId'] != $category['user_id']) {
    header('Location: home.php');
    die();
  }
}

// are we doing a delete?
if (isset($_POST['delete'])) {

	// all we need is the ID
	if (!isset($_POST['id'])) {
		header('Location: home.php');
		die();
	}

	$stmt = $db->prepare('DELETE FROM transaction WHERE id=:id');
	$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$stmt->execute();
	header('Location: home.php');
	die();
} // end delete

// make sure all the data got here
if (!isset($_POST['id']) || !isset($_POST['category']) ||
	!isset($_POST['amount']) || !isset($_POST['transaction_date']) ||
	!isset($_POST['comments'])) {
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

if ($edit) {

	$sql = "UPDATE transaction SET amount=:amount, `date`=:transaction_date, comments=:comments, category_id=:category_id WHERE id=:id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':amount', $amount_int, PDO::PARAM_INT);
	$stmt->bindValue(':transaction_date', $_POST['transaction_date'], PDO::PARAM_STR);
	$stmt->bindValue(':comments', $_POST['comments'], PDO::PARAM_STR);
	$stmt->bindValue(':category_id', $_POST['category'], PDO::PARAM_INT);
	$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$stmt->execute();
} else {

	$sql = "INSERT INTO transaction (amount,`date`,comments,category_id)
	VALUES(:amount, :transaction_date, :comments, :category_id)";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':amount', $amount_int, PDO::PARAM_INT);
	$stmt->bindValue(':transaction_date', $_POST['transaction_date'], PDO::PARAM_STR);
	$stmt->bindValue(':comments', $_POST['comments'], PDO::PARAM_STR);
	$stmt->bindValue(':category_id', $_POST['category'], PDO::PARAM_INT);
	$stmt->execute();
}

header('Location: view-transactions.php?id=' . $_POST['category']);
?>
