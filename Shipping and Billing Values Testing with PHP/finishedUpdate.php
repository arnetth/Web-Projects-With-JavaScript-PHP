<?php
session_start();

$_SESSION["name"] = "";
$_SESSION["name"] = "";
$_SESSION["address"] = "";
$_SESSION["city"] = "";
$_SESSION["state"] = "";
$_SESSION["zip"] = "";
$_SESSION["country"] = "";
$_SESSION["phone"] = "";
$_SESSION["email"] = "";
$_SESSION["comments"] = "";
$_SESSION["Sname"] = "";
$_SESSION["Saddress"] = "";
$_SESSION["Scity"] = "";
$_SESSION["Sstate"] = "";
$_SESSION["Szip"] = "";
$_SESSION["Scountry"] = "";
$_SESSION["errorMessage"] = "";

session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lab 04 - finishedUpdate Page</title>
	<meta charset="utf-8" />
</head>
<body>
	<h1 style="font-size:14pt; text-indent:360px;">Lab 04 - finishedUpdate page</h1>
	<p>Your information has been successfully updated in our database.</p>
	
</body>


</html>