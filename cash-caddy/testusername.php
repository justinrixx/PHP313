<?php
/***************************************************************
* This script is meant to be called from AJAX in order to find
* out if an email is in use already. It expects the email to be
* passed in a POST request with the name 'email'.
***************************************************************/

header('Content-type: application/json');

$result = array('available' => false);

// quit if the username wasn't passed in
if (!isset($_REQUEST['email'])) {
	echo json_encode($result);
	die();
}

// query the user
require "load-db.php";
$db = loadDatabase();
$stmt = $db->prepare('SELECT id FROM user WHERE email=:email');
$stmt->bindValue(':email', $_REQUEST['email'], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($rows)) {
	// 1 -> available
	$result['available'] = true;
}

echo json_encode($result);
?>