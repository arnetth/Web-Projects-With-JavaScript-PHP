<?php

session_start();

include("includes/openDbConn.php");

// get data posted from form
// addslashes will escape special characters such as an apostrophe
$UserID = $_POST["userID"];
$LastName = addslashes($_POST["lastName"]);
$FirstName = addslashes($_POST["firstName"]);
$Title = addslashes($_POST["title"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$LastName = str_replace($removeThese, "", $LastName);
$FirstName = str_replace($removeThese, "", $FirstName);
$Title = str_replace($removeThese, "", $Title);

// if shipperID is empty, somebody typed this page in the URL, redirect them
if(empty($UserID))
{
	header("Location: select.php");
	
}

// prepare SQL statement
$sql = "UPDATE usersLab5 SET LastName = '".$LastName."', FirstName = '".$FirstName."', Title = '".$Title."' WHERE UserID =".$UserID;

// execute the SQL query and store the results in $result
$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
?>