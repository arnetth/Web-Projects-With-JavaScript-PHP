<?php

session_start();

include("includes/openDbConn.php");

// get data posted from form
// addslashes will escape special characters such as an apostrophe
$ShipperID = $_POST["shipperID"];
$CompanyName = addslashes($_POST["companyName"]);
$Phone = addslashes($_POST["phone"]);

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CompanyName = str_replace($removeThese, "", $CompanyName);
$Phone = str_replace($removeThese, "", $Phone);

// if shipperID is empty, somebody typed this page in the URL, redirect them
if(empty($ShipperID))
{
	header("Location: select.php");
	
}

// prepare SQL statement
$sql = "UPDATE shippersLab5 SET CompanyName = '".$CompanyName."', Phone = '".$Phone."' WHERE ShipperID =".$ShipperID;

// execute the SQL query and store the results in $result
$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
?>