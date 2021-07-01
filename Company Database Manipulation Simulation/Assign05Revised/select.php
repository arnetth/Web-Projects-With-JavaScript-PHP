<?php
session_start();
include("includes/openDbConn.php");
$_SESSION["errorMessage"] = "";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lab05 - Select</title>
</head>

<body>
	<?php
	// prepare my sql statement
	$sql = "SELECT UserID, LastName, FirstName, Title FROM usersLab5";
	// execute the sql query and store the result of the execution into $result
	$result = mysqli_query($db, $sql);
	
	// check to see if there are records in the result, if not set the number of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Lab05 - Select</h1>
	<?php
	include("includes/menu.php");
	?>
	<table style="border: 0px; width: 500px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Users">
		<thead>
			<tr>
				<th colspan="4" style="font-weight: bold; background-color: #b1946c; text-align: center; text-decoration: underline;">usersLab5 table</th>
			</tr>
			<tr>
				<th style="background-color: #b1946c; font-weight: bold;">UserID</th>
				<th style="background-color: #b1946c; font-weight: bold;">LastName</th>
				<th style="background-color: #b1946c; font-weight: bold;">FirstName</th>
				<th style="background-color: #b1946c; font-weight: bold;">Title</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="4" style="text-align: center; font-style: italic;">Information pulled from MySQL database</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				// loop through the results
				for ($i = 0; $i < $num_results; $i++) {
					// store a single record out of $result into $row
					$row = mysqli_fetch_array($result);
					
					// below ALWAYS use trim() on data pulled from the database
			?>
			<tr>
				<td style="border-right: 1px solid #000000;">
					<a href="updateUser.php?id=<?php echo( trim( $row["UserID"]) ); ?>">edit</a> | <a href="deleteUser.php?id=<?php echo( trim( $row["UserID"]) ); ?>">delete</a>
					</td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["LastName"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["FirstName"]) ); ?></td>
				<td><?php echo(trim ($row["Title"]) ); ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	
	<p>&nbsp;</p>
	<!-- everything below here is copied from above and modified to pull the shipperslab5 table-->
	<?php
	// prepare my sql statement
	$sql = "SELECT ShipperID, CompanyName, Phone FROM shippersLab5";
	// execute the sql query and store the result of the execution into $result
	$result = mysqli_query($db, $sql);
	
	// check to see if there are records in the result, if not set the number of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	
	?>
	<table style="border: 0px; width: 500px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Users">
		<thead>
			<tr>
				<th colspan="3" style="font-weight: bold; background-color: #b1946c; text-align: center; text-decoration: underline;">shippersLab5 table</th>
			</tr>
			<tr>
				<th style="background-color: #b1946c; font-weight: bold;">ShipperID</th>
				<th style="background-color: #b1946c; font-weight: bold;">CompanyName</th>
				<th style="background-color: #b1946c; font-weight: bold;">Phone</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align: center; font-style: italic;">Information pulled from MySQL database</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				// loop through the results
				for ($i = 0; $i < $num_results; $i++) {
					// store a single record out of $result into $row
					$row = mysqli_fetch_array($result);
					
					// below ALWAYS use trim() on data pulled from the database
			?>
			<tr>
				<td style="border-right: 1px solid #000000;">
					<a href="update.php?id=<?php echo( trim( $row["ShipperID"]) ); ?>">edit</a> | <a href="delete.php?id=<?php echo( trim( $row["ShipperID"]) ); ?>">delete</a>
				</td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CompanyName"]) ); ?></td>
				<td><?php echo(trim ($row["Phone"]) ); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<?php 
		// close database connection
		include("includes/closeDbConn.php");
	?>
</body>
</html>