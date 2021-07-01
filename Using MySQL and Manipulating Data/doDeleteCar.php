<?php

session_start();

include("includes/openDbConn.php");

$sql = "DELETE FROM Assign06Cars WHERE CarID=23";

$result = mysqli_query($db, $sql);
	
include("includes/closeDbConn.php");
header("Location: select.php");
?>