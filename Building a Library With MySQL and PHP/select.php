<?php
session_start();
include("includes/openDbConn.php");
$_SESSION["errorMessage"] = "";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project1 - Select</title>
<style type="text/css">

	body { background-color: #e6fff2; font-family: "Book Antiqua", "Bookman Old Style", "Century Schoolbook", "Times New Roman", serif; color: #09671D; }
	
	td { text-align: center; background-color: #c2ffe9; padding: 0px 5px; }
	
	th { background-color: #70debe; font-weight: bold; padding: 5px 10px; }
	
</style>
</head>

<body>
	<?php
	// prepare my sql statement
	$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books ORDER BY BookID ASC";
	// execute the sql query and store the result of the execution into $result
	$result = mysqli_query($db, $sql);
	
	// check to see if there are records in the result, if not set the number of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Select a book</h1>
	<?php
	include("includes/menu.php");
	?>
	<table style="border: 0px; width: 700px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Library of Books">
		<thead>
			<tr>
				<th colspan="8" style="font-weight: bold; background-color: #2fd0a2; text-align: center; text-decoration: underline; padding: 10px;">Library of Books</th>
			</tr>
			<tr>
				<th>Book ID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Topic</th>
				<th>Genre</th>
				<th>ISBN</th>
				<th>Date Published</th>
				<th>Hardcover</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8" style="text-align: center; font-style: italic;">Information pulled from MySQL database</td>
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
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BookID"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Title"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Author"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Topic"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Genre"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ISBN"]) ); ?></td>
				<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["DatePublished"]) ); ?></td>
				<td><?php echo( trim( $row["Hardcover"]) ); ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<?php 
		// close database connection
		include("includes/closeDbConn.php");
	?>
</body>
</html>