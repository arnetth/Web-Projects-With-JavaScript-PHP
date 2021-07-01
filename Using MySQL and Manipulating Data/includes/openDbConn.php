<?php
@ $db = mysqli_connect("goss.tech.purdue.edu", "cgt356web1c", "Secretly1c7929");
mysqli_select_db($db, "cgt356web1c") or die(mysqli_error());

// check to see if connection successful
if(!$db) {
	echo "Error: Could not connect to database. Please try again later.";
	exit;
}
?>