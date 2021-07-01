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
	header("Location: updateProject.php");
	exit;
}
else if(!is_numeric($ProjectID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for ProjectID!";
	header("Location: updateProject.php");
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

$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;

// prepare SQL statement
$sql = "UPDATE Assign06Projects SET ProjName='".$ProjName."', ProjCategory='".$ProjCategory."', ProjDesc='".$ProjDescript."', StartDate='".$StartDate."', EndDate='".$EndDate."' WHERE ProjectID=".$ProjectID;

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	