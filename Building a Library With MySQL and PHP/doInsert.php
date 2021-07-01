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

if (($BookID == "") || ($Title == "") || ($Author == "") || ($Topic == "- Topic -")  || ($Genre == "") || ($ISBN == "") || ($MonthPublished == "- Month -") || ($DayPublished == "- Day -") || ($YearPublished == "- Year -")  || ($Hardcover == ""))
{
	// check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insert.php");
	exit;
}
else if(!is_numeric($BookID))
{
	// make sure shipper ID is a number
	$_SESSION["errorMessage"] = "You must enter a number for Book ID!";
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
$sql = "SELECT BookID FROM P1Books WHERE BookID = ".$BookID;

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
	$_SESSION["errorMessage"] = "The Book ID you entered already exists!";
	header("Location: insert.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

$DatePublished = $MonthPublished." ".$DayPublished.", ".$YearPublished;

// prepare SQL statement
$sql = "INSERT INTO P1Books(BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover) VALUES(".$BookID.", '".$Title."', '".$Author."', '".$Topic."', '".$Genre."', '".$ISBN."', '".$DatePublished."', '".$Hardcover."')";

// execute the SQL query and store the result of the execution in $result
$result = mysqli_query($db, $sql);

// clean up

include("includes/closeDbConn.php");

// redirect to default
header("Location: select.php");
exit;
?>

	
	