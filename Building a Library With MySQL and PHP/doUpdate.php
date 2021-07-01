<?php

session_start();

$BookID = $_POST["bookID"];
$Title = addslashes($_POST["title"]);
$Author = addslashes($_POST["author"]);
$Topic = $_POST["topic"];
$Genre = $_POST["genre"];
$ISBN = addslashes($_POST["isbn"]);
$MonthPublished = $_POST["monthPublished"];
$DayPublished = $_POST["dayPublished"];
$YearPublished = $_POST["yearPublished"];
$Hardcover = $_POST["hardcover"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Title = str_replace($removeThese, "", $Title);
$Author = str_replace($removeThese, "", $Author);
$ISBN = str_replace($removeThese, "", $ISBN);

if(($BookID == "") || ($Title == "") || ($Author == "") || ($Topic == "- Topic -")  || ($Genre == "") || ($ISBN == "") || ($MonthPublished == "- Month -") || ($DayPublished == "- Day -") || ($YearPublished == "- Year -")  || ($Hardcover == ""))
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: update.php");
	exit;
}
else if(!is_numeric($BookID))
{
	// make sure book ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for BookID!";
	header("Location: update.php");
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

$DatePublished = $MonthPublished." ".$DayPublished.", ".$YearPublished;

// prepare SQL statement
$sql = "UPDATE P1Books SET Title='".$Title."', Author='".$Author."', Topic='".$Topic."', Genre='".$Genre."', ISBN='".$ISBN."', DatePublished='".$DatePublished."', Hardcover='".$Hardcover."' WHERE BookID=".$BookID;

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	