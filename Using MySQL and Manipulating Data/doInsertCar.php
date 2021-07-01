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

if(($CarID == "") || ($CarMake == "- Make -") || ($CarModel == "")  || ($CarYear == "- Year -") || ($CarColor == "") || ($CarHybrid == ""))
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertCar.php");
	exit;
}
else if(!is_numeric($CarID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for CarID!";
	header("Location: insertCar.php");
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
$sql = "SELECT CarID FROM Assign06Cars WHERE CarID = ".$CarID;

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
	$_SESSION["errorMessage"] = "The CarID you entered already exists!";
	header("Location: insertCar.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

// prepare SQL statement
$sql = "INSERT INTO Assign06Cars(CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid) VALUES(".$CarID.", '".$CarMake."', '".$CarModel."', '".$CarYear."', '".$CarColor."', '".$CarHybrid."')";

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	