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
    <title>Project 1 - Update a Book</title>
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
		
        ul li input, ul li select { float:right; margin: 7px 10px; border:1px solid #09671D; padding:3px; width:240px;}
		
		ul li input[type="radio"], ul li input[type="checkbox"] { float: none; margin-right: 0px; padding: 0px; width: 40px; }
		
		input#submit { width:70%; float: none; margin: 10px 0px 10px 30px; background-color: #09671D; padding: 7px; color: white; cursor: pointer; border: none; }
		
		input#submit:hover { background-color: #13ab33; }
		
		li input:focus { border:1px solid #09671D; }
		
		fieldset{ padding:10px; border:1px solid #09671D; width:400px; overflow:auto; margin:10px;}
    </style>
</head>
 
<body>
<h1 style="text-align:center">Update a Book</h1>
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
		$_SESSION["errorMessage"] = "You must first insert a book ID of 20!";
	}
?>
	
<form id="form0" method="post" action="doUpdate.php">
	<fieldset>
		<legend>Update Library</legend>
        <ul>
			
            <li><label title="BookID" for="bookIDdis">Book ID</label>
			<input name="bookIDdis" id="bookIDdis" type="text" size="20" maxlength="3" value="<?php if ($num_results != 0) { echo( trim($row["BookID"]) ); }?>" disabled="disabled" />
			<input name="bookID" id="bookID" type="hidden" size="20" maxlength="3" value="<?php if ($num_results != 0) { echo( trim($row["BookID"]) ); }?>" />
			</li>
			
			<li><label title="Title" for="title">Title</label>
			<input name="title" id="title" type="text" size="20" maxlength="50" value="<?php if ($num_results != 0) { echo( trim($row["Title"]) ); }?>" /></li>
			
			<li><label title="Author" for="author">Author</label>
			<input name="author" id="author" type="text" size="20" maxlength="50" value="<?php if ($num_results != 0) { echo( trim($row["Author"]) ); }?>" /></li>
			
			<li><label title="Topic" for="topic">Topic</label>
				<select name="topic" id="topic">
                <option value="- Topic -" >- Topic -</option>
                <option value="Holiday Romance" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Holiday Romance") ) { echo("selected='selected'"); } ?>>Holiday Romance</option>
                <option value="Murder Mystery" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Murder Mystery") ) { echo("selected='selected'"); } ?>>Murder Mystery</option>
                <option value="Aliens" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Aliens")) { echo("selected='selected'"); } ?>>Aliens</option>
                <option value="Adventure" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Adventure")) { echo("selected='selected'"); } ?>>Adventure</option>
                <option value="Superheros" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Superheros")) { echo("selected='selected'"); } ?>>Superheros</option>
                <option value="Survival" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Survival")) { echo("selected='selected'"); } ?>>Survival</option>
                <option value="Drama" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Drama")) { echo("selected='selected'"); } ?>>Drama</option>
                <option value="Children" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Children")) { echo("selected='selected'"); } ?>>Children</option>
                <option value="Romantic Comedy" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Romantic Comedy")) { echo("selected='selected'"); } ?>>Romantic Comedy</option>
                <option value="Mermaids" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Mermaids")) { echo("selected='selected'"); } ?>>Mermaids</option>
                <option value="Futuristic" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Futuristic")) { echo("selected='selected'"); } ?>>Futuristic</option>
                <option value="Dogs" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Dogs")) { echo("selected='selected'"); } ?>>Dogs</option>
                <option value="Poems" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Poems")) { echo("selected='selected'"); } ?>>Poems</option>
                <option value="Dinosaurs" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Dinosaurs")) { echo("selected='selected'"); } ?>>Dinosaurs</option>
                <option value="Autobiographies" <?php if( ($num_results != 0) && (trim($row["Topic"]) == "Autobiographies")) { echo("selected='selected'"); } ?>>Autobiographies</option>
       			</select>
			</li>
			
			<li><label title="Genre" for="genre">Genre</label>
				<span id="radios">
					<input name="genre" id="genre" type="radio" value="Fiction" <?php if( ($num_results != 0) && (trim($row["Genre"]) == "Fiction") ) { echo("checked='checked'"); } ?> />Fiction
					<input name="genre" id="genre" type="radio" value="Non-Fiction" <?php if( ($num_results != 0) && (trim($row["Genre"]) == "Non-Fiction") ) { echo("checked='checked'"); } ?> />Non-Fiction
				</span>
			</li>
			
			<li><label title="ISBN" for="isbn">ISBN</label>
			<input name="isbn" id="isbn" type="text" size="20" maxlength="13" value="<?php if ($num_results != 0) { echo( trim($row["ISBN"]) ); }?>" /></li>
			
			<li><span id="published">Date Published:</span></li>
			
			<?php
				$MonthPublished = trim( substr(trim ($row["DatePublished"]), 0, strpos(trim ($row["DatePublished"]), " ")) );
			
				$DayPublished = trim( substr (trim($row["DatePublished"]), strpos(trim ($row["DatePublished"]), " " ), 3));
			
				$YearPublished = trim( substr (trim($row["DatePublished"]), strrpos(trim ($row["DatePublished"]), " " ), strlen(trim ($row["DatePublished"]))));
			
				//echo ($DayPublished);
				//exit;
			?>
			
            <li><label title="MonthPublished" for="monthPublished">Month</label>
				<select name="monthPublished" id="monthPublished">
                <option value="- Month -">- Month -</option>
                <option value="January" <?php if( ($num_results != 0) && ($MonthPublished) == "January") { echo("selected='selected'"); } ?>>January</option>
                <option value="February" <?php if( ($num_results != 0) && ($MonthPublished) == "February") { echo("selected='selected'"); } ?>>February</option>
                <option value="March" <?php if( ($num_results != 0) && ($MonthPublished) == "March") { echo("selected='selected'"); } ?>>March</option>
                <option value="April" <?php if( ($num_results != 0) && ($MonthPublished) == "April") { echo("selected='selected'"); } ?>>April</option>
                <option value="May" <?php if( ($num_results != 0) && ($MonthPublished) == "May") { echo("selected='selected'"); } ?>>May</option>
                <option value="June" <?php if( ($num_results != 0) && ($MonthPublished) == "June") { echo("selected='selected'"); } ?>>June</option>
                <option value="July" <?php if( ($num_results != 0) && ($MonthPublished) == "July") { echo("selected='selected'"); } ?>>July</option>
                <option value="August" <?php if( ($num_results != 0) && ($MonthPublished) == "August") { echo("selected='selected'"); } ?>>August</option>
                <option value="September" <?php if( ($num_results != 0) && ($MonthPublished) == "September") { echo("selected='selected'"); } ?>>September</option>
                <option value="October" <?php if( ($num_results != 0) && ($MonthPublished) == "October") { echo("selected='selected'"); } ?>>October</option>
                <option value="November" <?php if( ($num_results != 0) && ($MonthPublished) == "November") { echo("selected='selected'"); } ?>>November</option>
                <option value="December" <?php if( ($num_results != 0) && ($MonthPublished) == "December") { echo("selected='selected'"); } ?>>December</option>
        		</select>
			</li>
			
			<li><label title="DayPublished" for="dayPublished">Day</label>
				<select name="dayPublished" id="dayPublished">
                <option value="- Day -">- Day -</option>
                <option value="01" <?php if( ($num_results != 0) && ($DayPublished) == "01") { echo("selected='selected'"); } ?>>01</option>
				<option value="02" <?php if( ($num_results != 0) && ($DayPublished) == "02") { echo("selected='selected'"); } ?>>02</option>
				<option value="03" <?php if( ($num_results != 0) && ($DayPublished) == "03") { echo("selected='selected'"); } ?>>03</option>
				<option value="04" <?php if( ($num_results != 0) && ($DayPublished) == "04") { echo("selected='selected'"); } ?>>04</option>
				<option value="05" <?php if( ($num_results != 0) && ($DayPublished) == "05") { echo("selected='selected'"); } ?>>05</option>
				<option value="06" <?php if( ($num_results != 0) && ($DayPublished) == "06") { echo("selected='selected'"); } ?>>06</option>
				<option value="07" <?php if( ($num_results != 0) && ($DayPublished) == "07") { echo("selected='selected'"); } ?>>07</option>
				<option value="08" <?php if( ($num_results != 0) && ($DayPublished) == "08") { echo("selected='selected'"); } ?>>08</option>
				<option value="09" <?php if( ($num_results != 0) && ($DayPublished) == "09") { echo("selected='selected'"); } ?>>09</option>
				<option value="10" <?php if( ($num_results != 0) && ($DayPublished) == "10") { echo("selected='selected'"); } ?>>10</option>
				<option value="11" <?php if( ($num_results != 0) && ($DayPublished) == "11") { echo("selected='selected'"); } ?>>11</option>
				<option value="12" <?php if( ($num_results != 0) && ($DayPublished) == "12") { echo("selected='selected'"); } ?>>12</option>
				<option value="13" <?php if( ($num_results != 0) && ($DayPublished) == "13") { echo("selected='selected'"); } ?>>13</option>
				<option value="14" <?php if( ($num_results != 0) && ($DayPublished) == "14") { echo("selected='selected'"); } ?>>14</option>
				<option value="15" <?php if( ($num_results != 0) && ($DayPublished) == "15") { echo("selected='selected'"); } ?>>15</option>
				<option value="16" <?php if( ($num_results != 0) && ($DayPublished) == "16") { echo("selected='selected'"); } ?>>16</option>
				<option value="17" <?php if( ($num_results != 0) && ($DayPublished) == "17") { echo("selected='selected'"); } ?>>17</option>
				<option value="18" <?php if( ($num_results != 0) && ($DayPublished) == "18") { echo("selected='selected'"); } ?>>18</option>
				<option value="19" <?php if( ($num_results != 0) && ($DayPublished) == "19") { echo("selected='selected'"); } ?>>19</option>
				<option value="20" <?php if( ($num_results != 0) && ($DayPublished) == "20") { echo("selected='selected'"); } ?>>20</option>
				<option value="21" <?php if( ($num_results != 0) && ($DayPublished) == "21") { echo("selected='selected'"); } ?>>21</option>
				<option value="22" <?php if( ($num_results != 0) && ($DayPublished) == "22") { echo("selected='selected'"); } ?>>22</option>
				<option value="23" <?php if( ($num_results != 0) && ($DayPublished) == "23") { echo("selected='selected'"); } ?>>23</option>
				<option value="24" <?php if( ($num_results != 0) && ($DayPublished) == "24") { echo("selected='selected'"); } ?>>24</option>
				<option value="25" <?php if( ($num_results != 0) && ($DayPublished) == "25") { echo("selected='selected'"); } ?>>25</option>
				<option value="26" <?php if( ($num_results != 0) && ($DayPublished) == "26") { echo("selected='selected'"); } ?>>26</option>
				<option value="27" <?php if( ($num_results != 0) && ($DayPublished) == "27") { echo("selected='selected'"); } ?>>27</option>
				<option value="28" <?php if( ($num_results != 0) && ($DayPublished) == "28") { echo("selected='selected'"); } ?>>28</option>
				<option value="29" <?php if( ($num_results != 0) && ($DayPublished) == "29") { echo("selected='selected'"); } ?>>29</option>
				<option value="30" <?php if( ($num_results != 0) && ($DayPublished) == "30") { echo("selected='selected'"); } ?>>30</option>
				<option value="31" <?php if( ($num_results != 0) && ($DayPublished) == "31") { echo("selected='selected'"); } ?>>31</option>
        		</select>
			</li>
			
			<li><label title="YearPublished" for="yearPublished">Year</label>
				<select name="yearPublished" id="yearPublished">
                <option value="- Year -">- Year -</option>
                <option value="2020" <?php if( ($num_results != 0) && ($YearPublished) == "2020") { echo("selected='selected'"); } ?>>2020</option>
                <option value="2019" <?php if( ($num_results != 0) && ($YearPublished) == "2019") { echo("selected='selected'"); } ?>>2019</option>
                <option value="2018" <?php if( ($num_results != 0) && ($YearPublished) == "2018") { echo("selected='selected'"); } ?>>2018</option>
                <option value="2017" <?php if( ($num_results != 0) && ($YearPublished) == "2017") { echo("selected='selected'"); } ?>>2017</option>
                <option value="2016" <?php if( ($num_results != 0) && ($YearPublished) == "2016") { echo("selected='selected'"); } ?>>2016</option>
                <option value="2015" <?php if( ($num_results != 0) && ($YearPublished) == "2015") { echo("selected='selected'"); } ?>>2015</option>
                <option value="2014" <?php if( ($num_results != 0) && ($YearPublished) == "2014") { echo("selected='selected'"); } ?>>2014</option>
                <option value="2013" <?php if( ($num_results != 0) && ($YearPublished) == "2013") { echo("selected='selected'"); } ?>>2013</option>
                <option value="2012" <?php if( ($num_results != 0) && ($YearPublished) == "2012") { echo("selected='selected'"); } ?>>2012</option>
                <option value="2011" <?php if( ($num_results != 0) && ($YearPublished) == "2011") { echo("selected='selected'"); } ?>>2011</option>
                <option value="2010" <?php if( ($num_results != 0) && ($YearPublished) == "2010") { echo("selected='selected'"); } ?>>2010</option>
                <option value="2009" <?php if( ($num_results != 0) && ($YearPublished) == "2009") { echo("selected='selected'"); } ?>>2009</option>
                <option value="2008" <?php if( ($num_results != 0) && ($YearPublished) == "2008") { echo("selected='selected'"); } ?>>2008</option>
                <option value="2007" <?php if( ($num_results != 0) && ($YearPublished) == "2007") { echo("selected='selected'"); } ?>>2007</option>
                <option value="2006" <?php if( ($num_results != 0) && ($YearPublished) == "2006") { echo("selected='selected'"); } ?>>2006</option>
                <option value="2005" <?php if( ($num_results != 0) && ($YearPublished) == "2005") { echo("selected='selected'"); } ?>>2005</option>
                <option value="2004" <?php if( ($num_results != 0) && ($YearPublished) == "2004") { echo("selected='selected'"); } ?>>2004</option>
                <option value="2003" <?php if( ($num_results != 0) && ($YearPublished) == "2003") { echo("selected='selected'"); } ?>>2003</option>
                <option value="2002" <?php if( ($num_results != 0) && ($YearPublished) == "2002") { echo("selected='selected'"); } ?>>2002</option>
                <option value="2001" <?php if( ($num_results != 0) && ($YearPublished) == "2001") { echo("selected='selected'"); } ?>>2001</option>
                <option value="2000" <?php if( ($num_results != 0) && ($YearPublished) == "2000") { echo("selected='selected'"); } ?>>2000</option>
                <option value="1999" <?php if( ($num_results != 0) && ($YearPublished) == "1999") { echo("selected='selected'"); } ?>>1999</option>
                <option value="1998" <?php if( ($num_results != 0) && ($YearPublished) == "1998") { echo("selected='selected'"); } ?>>1998</option>
                <option value="1997" <?php if( ($num_results != 0) && ($YearPublished) == "1997") { echo("selected='selected'"); } ?>>1997</option>
                <option value="1996" <?php if( ($num_results != 0) && ($YearPublished) == "1996") { echo("selected='selected'"); } ?>>1996</option>
                <option value="1995" <?php if( ($num_results != 0) && ($YearPublished) == "1995") { echo("selected='selected'"); } ?>>1995</option>
                <option value="1994" <?php if( ($num_results != 0) && ($YearPublished) == "1994") { echo("selected='selected'"); } ?>>1994</option>
                <option value="1993" <?php if( ($num_results != 0) && ($YearPublished) == "1993") { echo("selected='selected'"); } ?>>1993</option>
                <option value="1992" <?php if( ($num_results != 0) && ($YearPublished) == "1992") { echo("selected='selected'"); } ?>>1992</option>
                <option value="1991" <?php if( ($num_results != 0) && ($YearPublished) == "1991") { echo("selected='selected'"); } ?>>1991</option>
                <option value="1990" <?php if( ($num_results != 0) && ($YearPublished) == "1990") { echo("selected='selected'"); } ?>>1990</option>
                <option value="1989" <?php if( ($num_results != 0) && ($YearPublished) == "1989") { echo("selected='selected'"); } ?>>1989</option>
                <option value="1988" <?php if( ($num_results != 0) && ($YearPublished) == "1988") { echo("selected='selected'"); } ?>>1988</option>
                <option value="1987" <?php if( ($num_results != 0) && ($YearPublished) == "1987") { echo("selected='selected'"); } ?>>1987</option>
                <option value="1986" <?php if( ($num_results != 0) && ($YearPublished) == "1986") { echo("selected='selected'"); } ?>>1986</option>
                <option value="1985" <?php if( ($num_results != 0) && ($YearPublished) == "1985") { echo("selected='selected'"); } ?>>1985</option>
                <option value="1984" <?php if( ($num_results != 0) && ($YearPublished) == "1984") { echo("selected='selected'"); } ?>>1984</option>
                <option value="1983" <?php if( ($num_results != 0) && ($YearPublished) == "1983") { echo("selected='selected'"); } ?>>1983</option>
                <option value="1982" <?php if( ($num_results != 0) && ($YearPublished) == "1982") { echo("selected='selected'"); } ?>>1982</option>
                <option value="1981" <?php if( ($num_results != 0) && ($YearPublished) == "1981") { echo("selected='selected'"); } ?>>1981</option>
                <option value="1980" <?php if( ($num_results != 0) && ($YearPublished) == "1980") { echo("selected='selected'"); } ?>>1980</option>
                <option value="1979" <?php if( ($num_results != 0) && ($YearPublished) == "1979") { echo("selected='selected'"); } ?>>1979</option>
                <option value="1978" <?php if( ($num_results != 0) && ($YearPublished) == "1978") { echo("selected='selected'"); } ?>>1978</option>
                <option value="1977" <?php if( ($num_results != 0) && ($YearPublished) == "1977") { echo("selected='selected'"); } ?>>1977</option>
                <option value="1976" <?php if( ($num_results != 0) && ($YearPublished) == "1976") { echo("selected='selected'"); } ?>>1976</option>
                <option value="1975" <?php if( ($num_results != 0) && ($YearPublished) == "1975") { echo("selected='selected'"); } ?>>1975</option>
                <option value="1974" <?php if( ($num_results != 0) && ($YearPublished) == "1974") { echo("selected='selected'"); } ?>>1974</option>
                <option value="1973" <?php if( ($num_results != 0) && ($YearPublished) == "1973") { echo("selected='selected'"); } ?>>1973</option>
                <option value="1972" <?php if( ($num_results != 0) && ($YearPublished) == "1972") { echo("selected='selected'"); } ?>>1972</option>
                <option value="1971" <?php if( ($num_results != 0) && ($YearPublished) == "1971") { echo("selected='selected'"); } ?>>1971</option>
                <option value="1970" <?php if( ($num_results != 0) && ($YearPublished) == "1970") { echo("selected='selected'"); } ?>>1970</option>
                <option value="1969" <?php if( ($num_results != 0) && ($YearPublished) == "1969") { echo("selected='selected'"); } ?>>1969</option>
                <option value="1968" <?php if( ($num_results != 0) && ($YearPublished) == "1968") { echo("selected='selected'"); } ?>>1968</option>
                <option value="1967" <?php if( ($num_results != 0) && ($YearPublished) == "1967") { echo("selected='selected'"); } ?>>1967</option>
                <option value="1966" <?php if( ($num_results != 0) && ($YearPublished) == "1966") { echo("selected='selected'"); } ?>>1966</option>
                <option value="1965" <?php if( ($num_results != 0) && ($YearPublished) == "1965") { echo("selected='selected'"); } ?>>1965</option>
                <option value="1964" <?php if( ($num_results != 0) && ($YearPublished) == "1964") { echo("selected='selected'"); } ?>>1964</option>
                <option value="1963" <?php if( ($num_results != 0) && ($YearPublished) == "1963") { echo("selected='selected'"); } ?>>1963</option>
                <option value="1962" <?php if( ($num_results != 0) && ($YearPublished) == "1962") { echo("selected='selected'"); } ?>>1962</option>
                <option value="1961" <?php if( ($num_results != 0) && ($YearPublished) == "1961") { echo("selected='selected'"); } ?>>1961</option>
                <option value="1960 and older" <?php if( ($num_results != 0) && ($YearPublished) == "1960 and older") { echo("selected='selected'"); } ?>>1960 and older</option>
        		</select>
			</li>
			
			<li><label title="Hardcover" for="hardcover">Hardcover</label>
			<input name="hardcover" id="hardcover" type="checkbox" value="Yes" <?php if( ($num_results != 0) && (trim($row["Hardcover"]) == "Yes") ) { echo("checked='checked'"); } ?> />Yes
			<input name="hardcover" id="hardcover" type="checkbox" value="No" <?php if( ($num_results != 0) && (trim($row["Hardcover"]) == "No") ) { echo("checked='checked'"); } ?> />No
			</li>
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Update Library" name="submit" id="submit" /></li>
			
        </ul>
	</fieldset>
</form>

<?php
	$_SESSION["errorMessage"] = "";
?>
	
<script type="text/javascript">
	document.getElementById("title").focus();
</script>

</body>
</html>