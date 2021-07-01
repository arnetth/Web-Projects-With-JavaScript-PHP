<?php 
session_start();
header("Cache-Control: no cache");
if (!empty($_POST["name"]))
	$_SESSION["name"] = $_POST["name"];

if (!empty($_POST["address"]))
	$_SESSION["address"] = $_POST["address"];

if (!empty($_POST["city"]))
	$_SESSION["city"] = $_POST["city"];

if (!empty($_POST["state"]))
	$_SESSION["state"] = $_POST["state"];

if (!empty($_POST["zip"]))
	$_SESSION["zip"] = $_POST["zip"];

if (!empty($_POST["country"]))
	$_SESSION["country"] = $_POST["country"];

if (!empty($_POST["phone"]))
	$_SESSION["phone"] = $_POST["phone"];

if (!empty($_POST["email"]))
	$_SESSION["email"] = $_POST["email"];

if (!empty($_POST["comments"]))
	$_SESSION["comments"] = $_POST["comments"];

if (
	(empty($_POST["name"])) || (empty($_POST["address"])) || (empty($_POST["city"])) || (empty($_POST["state"])) || (empty($_POST["zip"])) || (empty($_POST["country"])) || (empty($_POST["phone"])) || (empty($_POST["email"])) || (empty($_POST["comments"]))
)
	{
	$_SESSION["errorMessage"] = "* Please fill out all of the required form elements";
	header("Location:index.php");
	exit;
}

if (empty($_POST["Sname"]))
{
	$_SESSION["Sname"] = $_SESSION["name"];
	$_SESSION["Saddress"] = $_SESSION["address"];
	$_SESSION["Scity"] = $_SESSION["city"];
	$_SESSION["Sstate"] = $_SESSION["state"];
	$_SESSION["Szip"] = $_SESSION["zip"];
	$_SESSION["Scountry"] = $_SESSION["country"];
}

else
{
	$_SESSION["Sname"] = $_POST["Sname"];
	$_SESSION["Saddress"] = $_POST["Saddress"];
	$_SESSION["Scity"] = $_POST["Scity"];
	$_SESSION["Sstate"] = $_POST["Sstate"];
	$_SESSION["Szip"] = $_POST["Szip"];
	$_SESSION["Scountry"] = $_POST["Scountry"];
}

header("Location: displayInfo.php");
?>