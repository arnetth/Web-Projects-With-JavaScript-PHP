<?php

session_start();

$CarID = $_POST["carID"];
$CarMake = $_POST["carMake"];
$CarModel = addslashes($_POST["carModel"]);
$CarYear = $_POST["carYear"];
$CarColor = addslashes($_POST["carColor"]);
$CarHybrid = $_POST["carHybrid"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CarModel = str_replace($removeThese, "", $CarModel);
$CarColor = str_replace($removeThese, "", $CarColor);

// if this is empty someone typed this page into the url so redirect them

if (empty($CarID)) {
	header("Location:select.php");
}

if(($CarID == "") || ($CarMake == "- Make -") || ($CarModel == "")  || ($CarYear == "- Year -") || ($CarColor == "") || ($CarHybrid == ""))
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateCar.php");
	exit;
}
else if(!is_numeric($CarID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for CarID!";
	header("Location: updateCar.php");
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

// prepare SQL statement
$sql = "UPDATE Assign06Cars SET CarMake='".$CarMake."', CarModel='".$CarModel."', CarYear='".$CarYear."', CarColor='".$CarColor."', CarHybrid='".$CarHybrid."' WHERE CarID=".$CarID;

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	