<?php

session_start();

include("includes/openDbConn.php");

$id = $_GET["id"];

$sql = "DELETE FROM usersLab5 WHERE UserID=".$id;

$result = mysqli_query($db, $sql);
	
include("includes/closeDbConn.php");
header("Location: select.php");
?>