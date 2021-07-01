<?php
session_start();

if(empty($_SESSION["errorMessage"]))
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
    <title>Project 1 - Delete a Book</title>
	<style type="text/css">
        body { background-color: #e6fff2; font-family: "Book Antiqua", "Bookman Old Style", "Century Schoolbook", "Times New Roman", serif; color: #09671D; }
		
        form { width:400px; margin:0px auto;}
		
		legend { margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		
        ul{ list-style:none; margin-top:5px;}
		
        ul li { display:block; float:left; width:100%; height:1%; }
		
        ul li label { float:left; padding:7px; }
		
		ul li span { font-weight:bold;}
		
		ul li span#radios { font-weight: normal; padding: 0px; margin-left: 30px; }
		
		ul li span#published { font-size: 11pt; }
		
        ul li input, ul li select, span.values { float:right; margin: 7px 10px; border:1px solid #09671D; padding:3px; width:240px;}
		
		ul li input[type="radio"], ul li input[type="checkbox"] { float: none; margin-right: 0px; padding: 0px; width: 40px; }
		
		input#submit { width:70%; float: none; margin: 10px 0px 10px 30px; background-color: #09671D; padding: 7px; color: white; cursor: pointer; border: none; }
		
		input#submit:hover { background-color: #13ab33; }
		
		li input:focus { border:1px solid #09671D; }
		
		fieldset{ padding:10px; border:1px solid #09671D; width:400px; overflow:auto; margin:10px;}
    </style>
</head>
 
<body>
<h1 style="text-align:center">Delete a Book</h1>
<?php
	include("includes/menu.php");
	
	$sql = "SELECT BookID, Title, Author, Topic, Genre, ISBN, DatePublished, Hardcover FROM P1Books WHERE BookID=20";
	
	$result = mysqli_query($db, $sql); 
	
	if(empty($result)) {
		$num_results = 0;
	}
	else {
		$num_results = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
	}
	
	if ($num_results == 0)
	{
		$_SESSION["errorMessage"] = "You must first insert a book with ID 20!";
	}
?>
	
<form id="form0" method="post" action="doDelete.php">
	<fieldset>
		<legend>Are you sure you want to delete this book from the library?</legend>
        <ul>
			
            <li><label title="BookID" for="bookIDdis">Book ID</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["BookID"]) ); }?></span>
			</li>
			
			<li><label title="Title" for="title">Title</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["Title"]) ); }?></span>
			</li>
			
			
			
			<li><label title="Author" for="author">Author</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["Author"]) ); }?></span>
			</li>
			
			
            <li><label title="Topic" for="topic">Topic</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["Topic"]) ); }?></span>
			</li>
			
            <li><label title="Genre" for="genre">Genre</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["Genre"]) ); }?></span>
			</li>
			
			<li><label title="ISBN" for="isbn">ISBN</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["ISBN"]) ); }?></span>
			</li>
			
			<li><label title="DatePublished" for="datePublished">Date <br />Published</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["DatePublished"]) ); }?></span>
			</li>
			
			<li><label title="Hardcover" for="hardcover">Hardcover</label>
				<span class="values"><?php if ($num_results != 0) { echo( trim($row["Hardcover"]) ); }?></span>
			</li>
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Delete Book" name="submit" id="submit" /></li>
			
        </ul>
	</fieldset>
</form>

<?php
	$_SESSION["errorMessage"] = "";
?>

</body>
</html>