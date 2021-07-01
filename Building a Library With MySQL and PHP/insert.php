<?php
session_start();

if(empty($_SESSION["errorMessage"]))
{
	$_SESSION["errorMessage"] = "";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
    <title>Project 1 - Insert Book</title>
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
<h1 style="text-align:center">Insert a Book</h1>
<?php
	include("includes/menu.php");
?>
	
<form id="form0" method="post" action="doInsert.php">
	<fieldset>
		<legend>Insert into Library</legend>
        <ul>
			
            <li><label title="BookID" for="bookID">Book ID</label>
			<input name="bookID" id="bookID" type="text" size="20" maxlength="3"/></li>
			
			<li><label title="Title" for="title">Title</label>
			<input name="title" id="title" type="text" size="20" /></li>
			
			<li><label title="Author" for="author">Author</label>
			<input name="author" id="author" type="text" size="20" /></li>
			
			<li><label title="Topic" for="topic">Topic</label>
				<select name="topic" id="topic">
                <option value="- Topic -">- Topic -</option>
                <option value="Holiday Romance">Holiday Romance</option>
                <option value="Murder Mystery">Murder Mystery</option>
                <option value="Aliens">Aliens</option>
                <option value="Adventure">Adventure</option>
                <option value="Superheros">Superheros</option>
                <option value="Survival">Survival</option>
                <option value="Drama">Drama</option>
                <option value="Children">Children</option>
                <option value="Romantic Comedy">Romantic Comedy</option>
                <option value="Mermaids">Mermaids</option>
                <option value="Futuristic">Futuristic</option>
                <option value="Dogs">Dogs</option>
                <option value="Poems">Poems</option>
                <option value="Dinosaurs">Dinosaurs</option>
                <option value="Autobiographies">Autobiographies</option>
       			</select>
			</li>
			
			<li><label title="Genre" for="genre">Genre</label>
				<span id="radios">
					<input name="genre" id="genre" type="radio" value="Fiction" />Fiction
					<input name="genre" id="genre" type="radio" value="Non-Fiction" />Non-Fiction
				</span>
			</li>
			
            <li><label title="ISBN" for="isbn">ISBN</label>
			<input name="isbn" id="isbn" type="text" size="20" maxlength="13"/></li>
			
			<li><span id="published">Date Published:</span></li>
			
			<li>
				<label title="MonthPublished" for="monthPublished">Month</label>
				<select name="monthPublished" id="monthPublished">
                <option value="- Month -">- Month -</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
        		</select>
			</li>
			
			<li><label title="DayPublished" for="dayPublished">Day</label>
				<select name="dayPublished" id="dayPublished">
                <option value="- Day -">- Day -</option>
                <option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
        		</select>
			</li>
			
            <li><label title="YearPublished" for="yearPublished">Year</label>
				<select name="yearPublished" id="yearPublished">
                <option value="- Year -">- Year -</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960 and older">1960 and older</option>
        		</select>
			</li>
			
			
			<li><label title="Hardcover" for="hardcover">Hardcover</label>
			<input name="hardcover" id="hardcover" type="checkbox" value="Yes"/>Yes
			<input name="hardcover" id="hardcover" type="checkbox" value="No"/>No
			</li>
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Insert Book" name="submit" id="submit" /></li>
			
        </ul>
	</fieldset>
</form>

<?php
	$_SESSION["errorMessage"] = "";
?>
	
<script type="text/javascript">
	document.getElementById("bookID").focus();
</script>

</body>
</html>