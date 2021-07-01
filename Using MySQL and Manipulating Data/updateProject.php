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
    <title>Lab 6 - Update Project</title>
	<style type="text/css">
        form { width:400px; margin:0px auto;}
        ul{ list-style:none; margin-top:5px;}
        ul li { display:block; float:left; width:100%; height:1%; }
        ul li label { float:left; padding:7px; }
		ul li span { color:#0000ff; font-weight:bold;}
		ul li span#radios { color: #000000; font-weight: normal; padding: 0px; margin-right: 130px; }
        ul li input, ul li select { float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		ul li input[type="radio"] { float: none; margin-right: 0px; padding: 0px; width: 40px; }
		input#submit {width:248px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
    </style>
</head>
 
<body>
<h1 style="text-align:center">Lab 6 - Update Project</h1>
<?php
	include("includes/menu.php");
	
	$sql = "SELECT ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate FROM Assign06Projects WHERE ProjectID=46";
	
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
		$_SESSION["errorMessage"] = "You must first insert a project with ID 46!";
	}
?>

<div style="font-style: italic; text-align: center; font-size: 9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
<form id="form0" method="post" action="doUpdateProject.php">
	<fieldset>
		<legend>Update Assign06Projects table</legend>
        <ul>
			
            <li><label title="ProjectID" for="projectIDdis">Project ID</label>
			<input name="projectIDdis" id="projectIDdis" type="text" size="20" maxlength="3" value="<?php if ($num_results != 0) { echo( trim($row["ProjectID"]) ); }?>" disabled="disabled" />
			<input name="projectID" id="projectID" type="hidden" size="20" maxlength="3" value="<?php if ($num_results != 0) { echo( trim($row["ProjectID"]) ); }?>" />
			</li>
			
			<li><label title="ProjName" for="projName">Project Name</label>
			<input name="projName" id="projName" type="text" size="20" maxlength="50" value="<?php if ($num_results != 0) { echo( trim($row["ProjName"]) ); }?>" /></li>
			
			
			
			<li><label title="ProjCategory" for="projCategory">Category</label>
				<select name="projCategory" id="projCategory">
                <option value="- Category -">- Category -</option>
                <option value="Commercial" <?php if( ($num_results != 0) && (trim ($row["ProjCategory"]) == "Commercial") ) { echo("selected='selected'"); } ?>>Commercial</option>
                <option value="Residential" <?php if( ($num_results != 0) && (trim ($row["ProjCategory"]) == "Residential") ) { echo("selected='selected'"); } ?>>Residential</option>
       			</select>
			</li>
			
			
            <li><label title="ProjDescription" for="projDescription">Description</label>
			<input name="projDescription" id="projDescription" type="text" size="20" maxlength="20" value="<?php if ($num_results != 0) { echo( trim($row["ProjDesc"]) ); }?>" /></li>
			
			<?php
				// separate StartMonth and EndMonth into 4 categories: StartMonth, EndMonth, StartDay, EndDay
				// the date is stored as Month Day: June 01
				// to get the month: get a substring of the whole string starting from position 0 and going to the space " "
				// to get the day: get a substring of the whole string starting from the space " " and going to the length (last character)
				$StartMonth = trim( substr(trim ($row["StartDate"]), 0, strpos(trim ($row["StartDate"]), " ")) );
				$StartDay = trim(substr (trim($row["StartDate"]), strpos(trim ($row["StartDate"]), " " ), strlen(trim ($row["StartDate"]))));
				$EndMonth = trim( substr(trim ($row["EndDate"]), 0, strpos(trim ($row["EndDate"]), " ")) );
				$EndDay = trim(substr (trim($row["EndDate"]), strpos(trim ($row["EndDate"]), " " ), strlen(trim ($row["EndDate"]))));
			?>
			
            <li><label title="StartMonth" for="startMonth">Start Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Month -">- Start Month -</option>
                <option value="January" <?php if( ($num_results != 0) && ($StartMonth) == "January") { echo("selected='selected'"); } ?>>January</option>
                <option value="February" <?php if( ($num_results != 0) && ($StartMonth) == "February") { echo("selected='selected'"); } ?>>February</option>
                <option value="March" <?php if( ($num_results != 0) && ($StartMonth) == "March") { echo("selected='selected'"); } ?>>March</option>
                <option value="April" <?php if( ($num_results != 0) && ($StartMonth) == "April") { echo("selected='selected'"); } ?>>April</option>
                <option value="May" <?php if( ($num_results != 0) && ($StartMonth) == "May") { echo("selected='selected'"); } ?>>May</option>
                <option value="June" <?php if( ($num_results != 0) && ($StartMonth) == "June") { echo("selected='selected'"); } ?>>June</option>
                <option value="July" <?php if( ($num_results != 0) && ($StartMonth) == "July") { echo("selected='selected'"); } ?>>July</option>
                <option value="August" <?php if( ($num_results != 0) && ($StartMonth) == "August") { echo("selected='selected'"); } ?>>August</option>
                <option value="September" <?php if( ($num_results != 0) && ($StartMonth) == "September") { echo("selected='selected'"); } ?>>September</option>
                <option value="October" <?php if( ($num_results != 0) && ($StartMonth) == "October") { echo("selected='selected'"); } ?>>October</option>
                <option value="November" <?php if( ($num_results != 0) && ($StartMonth) == "November") { echo("selected='selected'"); } ?>>November</option>
                <option value="December" <?php if( ($num_results != 0) && ($StartMonth) == "December") { echo("selected='selected'"); } ?>>December</option>
        		</select>
			</li>
			
			<li><label title="StartDay" for="startDay">Start Day</label>
				<select name="startDay" id="startDay">
                <option value="- Day -">- Start Day -</option>
                <option value="01" <?php if( ($num_results != 0) && ($StartDay) == "01") { echo("selected='selected'"); } ?>>01</option>
				<option value="02" <?php if( ($num_results != 0) && ($StartDay) == "02") { echo("selected='selected'"); } ?>>02</option>
				<option value="03" <?php if( ($num_results != 0) && ($StartDay) == "03") { echo("selected='selected'"); } ?>>03</option>
				<option value="04" <?php if( ($num_results != 0) && ($StartDay) == "04") { echo("selected='selected'"); } ?>>04</option>
				<option value="05" <?php if( ($num_results != 0) && ($StartDay) == "05") { echo("selected='selected'"); } ?>>05</option>
				<option value="06" <?php if( ($num_results != 0) && ($StartDay) == "06") { echo("selected='selected'"); } ?>>06</option>
				<option value="07" <?php if( ($num_results != 0) && ($StartDay) == "07") { echo("selected='selected'"); } ?>>07</option>
				<option value="08" <?php if( ($num_results != 0) && ($StartDay) == "08") { echo("selected='selected'"); } ?>>08</option>
				<option value="09" <?php if( ($num_results != 0) && ($StartDay) == "09") { echo("selected='selected'"); } ?>>09</option>
				<option value="10" <?php if( ($num_results != 0) && ($StartDay) == "10") { echo("selected='selected'"); } ?>>10</option>
				<option value="11" <?php if( ($num_results != 0) && ($StartDay) == "11") { echo("selected='selected'"); } ?>>11</option>
				<option value="12" <?php if( ($num_results != 0) && ($StartDay) == "12") { echo("selected='selected'"); } ?>>12</option>
				<option value="13" <?php if( ($num_results != 0) && ($StartDay) == "13") { echo("selected='selected'"); } ?>>13</option>
				<option value="14" <?php if( ($num_results != 0) && ($StartDay) == "14") { echo("selected='selected'"); } ?>>14</option>
				<option value="15" <?php if( ($num_results != 0) && ($StartDay) == "15") { echo("selected='selected'"); } ?>>15</option>
				<option value="16" <?php if( ($num_results != 0) && ($StartDay) == "16") { echo("selected='selected'"); } ?>>16</option>
				<option value="17" <?php if( ($num_results != 0) && ($StartDay) == "17") { echo("selected='selected'"); } ?>>17</option>
				<option value="18" <?php if( ($num_results != 0) && ($StartDay) == "18") { echo("selected='selected'"); } ?>>18</option>
				<option value="19" <?php if( ($num_results != 0) && ($StartDay) == "19") { echo("selected='selected'"); } ?>>19</option>
				<option value="20" <?php if( ($num_results != 0) && ($StartDay) == "20") { echo("selected='selected'"); } ?>>20</option>
				<option value="21" <?php if( ($num_results != 0) && ($StartDay) == "21") { echo("selected='selected'"); } ?>>21</option>
				<option value="22" <?php if( ($num_results != 0) && ($StartDay) == "22") { echo("selected='selected'"); } ?>>22</option>
				<option value="23"<?php if( ($num_results != 0) && ($StartDay) == "23") { echo("selected='selected'"); } ?>>23</option>
				<option value="24" <?php if( ($num_results != 0) && ($StartDay) == "24") { echo("selected='selected'"); } ?>>24</option>
				<option value="25" <?php if( ($num_results != 0) && ($StartDay) == "25") { echo("selected='selected'"); } ?>>25</option>
				<option value="26" <?php if( ($num_results != 0) && ($StartDay) == "26") { echo("selected='selected'"); } ?>>26</option>
				<option value="27" <?php if( ($num_results != 0) && ($StartDay) == "27") { echo("selected='selected'"); } ?>>27</option>
				<option value="28" <?php if( ($num_results != 0) && ($StartDay) == "28") { echo("selected='selected'"); } ?>>28</option>
				<option value="29" <?php if( ($num_results != 0) && ($StartDay) == "29") { echo("selected='selected'"); } ?>>29</option>
				<option value="30" <?php if( ($num_results != 0) && ($StartDay) == "30") { echo("selected='selected'"); } ?>>30</option>
				<option value="31" <?php if( ($num_results != 0) && ($StartDay) == "31") { echo("selected='selected'"); } ?>>31</option>
        		</select>
			</li>
			
			<li><label title="EndMonth" for="endMonth">End Month</label>
				<select name="endMonth" id="endMonth">
                <option value="- Month -">- End Month -</option>
                <option value="January" <?php if( ($num_results != 0) && ($EndMonth) == "January") { echo("selected='selected'"); } ?>>January</option>
                <option value="February" <?php if( ($num_results != 0) && ($EndMonth) == "February") { echo("selected='selected'"); } ?>>February</option>
                <option value="March" <?php if( ($num_results != 0) && ($EndMonth) == "March") { echo("selected='selected'"); } ?>>March</option>
                <option value="April" <?php if( ($num_results != 0) && ($EndMonth) == "April") { echo("selected='selected'"); } ?>>April</option>
                <option value="May" <?php if( ($num_results != 0) && ($EndMonth) == "May") { echo("selected='selected'"); } ?>>May</option>
                <option value="June" <?php if( ($num_results != 0) && ($EndMonth) == "June") { echo("selected='selected'"); } ?>>June</option>
                <option value="July" <?php if( ($num_results != 0) && ($EndMonth) == "July") { echo("selected='selected'"); } ?>>July</option>
                <option value="August" <?php if( ($num_results != 0) && ($EndMonth) == "August") { echo("selected='selected'"); } ?>>August</option>
                <option value="September" <?php if( ($num_results != 0) && ($EndMonth) == "September") { echo("selected='selected'"); } ?>>September</option>
                <option value="October" <?php if( ($num_results != 0) && ($EndMonth) == "October") { echo("selected='selected'"); } ?>>October</option>
                <option value="November" <?php if( ($num_results != 0) && ($EndMonth) == "November") { echo("selected='selected'"); } ?>>November</option>
                <option value="December" <?php if( ($num_results != 0) && ($EndMonth) == "December") { echo("selected='selected'"); } ?>>December</option>
        		</select>
			</li>
			
			<li><label title="EndDay" for="endDay">End Day</label>
				<select name="endDay" id="endDay">
                <option value="- Day -">- End Day -</option>
                <option value="01" <?php if( ($num_results != 0) && ($EndDay) == "01") { echo("selected='selected'"); } ?>>01</option>
				<option value="02" <?php if( ($num_results != 0) && ($EndDay) == "02") { echo("selected='selected'"); } ?>>02</option>
				<option value="03" <?php if( ($num_results != 0) && ($EndDay) == "03") { echo("selected='selected'"); } ?>>03</option>
				<option value="04" <?php if( ($num_results != 0) && ($EndDay) == "04") { echo("selected='selected'"); } ?>>04</option>
				<option value="05" <?php if( ($num_results != 0) && ($EndDay) == "05") { echo("selected='selected'"); } ?>>05</option>
				<option value="06" <?php if( ($num_results != 0) && ($EndDay) == "06") { echo("selected='selected'"); } ?>>06</option>
				<option value="07" <?php if( ($num_results != 0) && ($EndDay) == "07") { echo("selected='selected'"); } ?>>07</option>
				<option value="08" <?php if( ($num_results != 0) && ($EndDay) == "08") { echo("selected='selected'"); } ?>>08</option>
				<option value="09" <?php if( ($num_results != 0) && ($EndDay) == "09") { echo("selected='selected'"); } ?>>09</option>
				<option value="10" <?php if( ($num_results != 0) && ($EndDay) == "10") { echo("selected='selected'"); } ?>>10</option>
				<option value="11" <?php if( ($num_results != 0) && ($EndDay) == "11") { echo("selected='selected'"); } ?>>11</option>
				<option value="12" <?php if( ($num_results != 0) && ($EndDay) == "12") { echo("selected='selected'"); } ?>>12</option>
				<option value="13" <?php if( ($num_results != 0) && ($EndDay) == "13") { echo("selected='selected'"); } ?>>13</option>
				<option value="14" <?php if( ($num_results != 0) && ($EndDay) == "14") { echo("selected='selected'"); } ?>>14</option>
				<option value="15" <?php if( ($num_results != 0) && ($EndDay) == "15") { echo("selected='selected'"); } ?>>15</option>
				<option value="16" <?php if( ($num_results != 0) && ($EndDay) == "16") { echo("selected='selected'"); } ?>>16</option>
				<option value="17" <?php if( ($num_results != 0) && ($EndDay) == "17") { echo("selected='selected'"); } ?>>17</option>
				<option value="18" <?php if( ($num_results != 0) && ($EndDay) == "18") { echo("selected='selected'"); } ?>>18</option>
				<option value="19" <?php if( ($num_results != 0) && ($EndDay) == "19") { echo("selected='selected'"); } ?>>19</option>
				<option value="20" <?php if( ($num_results != 0) && ($EndDay) == "20") { echo("selected='selected'"); } ?>>20</option>
				<option value="21" <?php if( ($num_results != 0) && ($EndDay) == "21") { echo("selected='selected'"); } ?>>21</option>
				<option value="22" <?php if( ($num_results != 0) && ($EndDay) == "22") { echo("selected='selected'"); } ?>>22</option>
				<option value="23" <?php if( ($num_results != 0) && ($EndDay) == "23") { echo("selected='selected'"); } ?>>23</option>
				<option value="24" <?php if( ($num_results != 0) && ($EndDay) == "24") { echo("selected='selected'"); } ?>>24</option>
				<option value="25" <?php if( ($num_results != 0) && ($EndDay) == "25") { echo("selected='selected'"); } ?>>25</option>
				<option value="26" <?php if( ($num_results != 0) && ($EndDay) == "26") { echo("selected='selected'"); } ?>>26</option>
				<option value="27" <?php if( ($num_results != 0) && ($EndDay) == "27") { echo("selected='selected'"); } ?>>27</option>
				<option value="28" <?php if( ($num_results != 0) && ($EndDay) == "28") { echo("selected='selected'"); } ?>>28</option>
				<option value="29" <?php if( ($num_results != 0) && ($EndDay) == "29") { echo("selected='selected'"); } ?>>29</option>
				<option value="30" <?php if( ($num_results != 0) && ($EndDay) == "30") { echo("selected='selected'"); } ?>>30</option>
				<option value="31" <?php if( ($num_results != 0) && ($EndDay) == "31") { echo("selected='selected'"); } ?>>31</option>
        		</select>
			</li>
			
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Update Project" name="submit" id="submit" /></li>
			
        </ul>
	</fieldset>
</form>

<?php
	$_SESSION["errorMessage"] = "";
?>
	
<script type="text/javascript">
	document.getElementById("projName").focus();
</script>

</body>
</html>