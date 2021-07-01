<?php

session_start();

include("includes/openDbConn.php");

$sql = "DELETE FROM P1Books WHERE BookID=20";

$result = mysqli_query($db, $sql);
	
include("includes/closeDbConn.php");
header("Location: select.php");
?>