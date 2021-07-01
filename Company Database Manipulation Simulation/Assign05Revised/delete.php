<?php

session_start();

include("includes/openDbConn.php");

$id = $_GET["id"];

$sql = "DELETE FROM shippersLab5 WHERE ShipperID=".$id;

$result = mysqli_query($db, $sql);
	
include("includes/closeDbConn.php");
header("Location: select.php");
?>