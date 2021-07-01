<?php

session_start();

$ShipperID = $_POST["shipperID"];
$CompanyName = addslashes($_POST["companyName"]);
$Phone = addslashes($_POST["phone"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CompanyName = str_replace($removeThese, "", $CompanyName);
$Phone = str_replace($removeThese, "", $Phone);

if(($ShipperID == "") || ($CompanyName == "") || ($Phone == ""))
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insert.php");
	exit;
}
else if(!is_numeric($ShipperID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for ShipperID!";
	header("Location: insert.php");
	exit;
}
else
{
	// everything is okay so far
	$_SESSION["errorMessage"] = "";
}

// Open DB connection 
// Wait until after potential redirects to open DB connections
include("includes/openDbConn.php");

// Prepare SQL statement - determine if ShipperID already exists in database
$sql = "SELECT ShipperID FROM shippersLab5 WHERE ShipperID = ".$ShipperID;

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);
	
// Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
{
	$num_results = 0;
}
else
{
	$num_results = mysqli_num_rows($result);
}
	
// check to see if ShipperID from form is already in db
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The ShipperID you entered already exists!";
	header("Location: insert.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

// prepare SQL statement
$sql = "INSERT INTO shippersLab5(ShipperID, CompanyName, Phone) VALUES(".$ShipperID.", '".$CompanyName."', '".$Phone."')";

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	