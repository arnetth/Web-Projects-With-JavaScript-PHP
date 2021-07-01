<?php

session_start();

$ProjectID = $_POST["projectID"];
$ProjName = addslashes($_POST["projName"]);
$ProjCategory = $_POST["projCategory"];
$ProjDescript = addslashes($_POST["projDescription"]);
$StartMonth = $_POST["startMonth"];
$StartDay = $_POST["startDay"];
$EndMonth = $_POST["endMonth"];
$EndDay = $_POST["endDay"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ProjName = str_replace($removeThese, "", $ProjName);
$ProjDescript = str_replace($removeThese, "", $ProjDescript);

if( ($ProjectID == "") || ($ProjName == "") || ($ProjCategory == "- Category -")  || ($ProjDescript == "") || ($StartMonth == "- Month -") || ($StartDay == "- Day -") || ($EndMonth == "- Month -") || ($EndDay == "- Day -") )
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertProject.php");
	exit;
}
else if(!is_numeric($ProjectID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for ProjectID!";
	header("Location: insertProject.php");
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

// Prepare SQL statement - determine if ProjectID already exists in database
$sql = "SELECT ProjectID FROM Assign06Projects WHERE ProjectID = ".$ProjectID;

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
	$_SESSION["errorMessage"] = "The ProjectID you entered already exists!";
	header("Location: insertProject.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;

// prepare SQL statement
$sql = "INSERT INTO Assign06Projects(ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate) VALUES(".$ProjectID.", '".$ProjName."', '".$ProjCategory."', '".$ProjDescript."', '".$StartDate."', '".$EndDate."')";

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	