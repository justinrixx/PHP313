<?php

// make sure all the data was sent
if (!isset($_POST["q1"]) || !isset($_POST["q2"]) || !isset($_POST["q3"])
	|| !isset($_POST["q4"]) || !isset($_POST["q5"])) {
	die("You shouldn't be here.\n");
}

$COOKIE_NAME = "quiz_done";
$FILENAME = "results.txt";

// the results
$results = array();

// Read the file if it exists
if (file_exists($FILENAME)) {

	$resultsstring = file_get_contents("results.txt");

	$results = json_decode($resultsstring);
	
} else {
	// otherwise the data is all zeros
	$results = array(
		array("0", "0", "0", "0"),
		array("0", "0", "0", "0"),
		array("0", "0", "0", "0"),
		array("0", "0", "0", "0"),
		array("0", "0", "0", "0")
	);
}

// update the data structure
for ($i = 0; $i < 5; $i++) {

	$index = "q" . ($i + 1);

	// add in the user's choices
	$jndex = (int)($_POST[$index]);
		
	$newval = (string)((int)($results[$i][$jndex]) + 1);
	$results[$i][$jndex] = $newval;
}

// write the file
$json = json_encode($results);
$file = fopen($FILENAME, "w");

fwrite($file, $json);

// set a cookie
setcookie($COOKIE_NAME, "value", time() + (86400 * 30), "/"); // 86400 = 1 day

// redirect to results
header('Location: results.php');
?>