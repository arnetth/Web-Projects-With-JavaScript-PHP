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
    <title>Lab 6 - Insert Project</title>
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
<h1 style="text-align:center">Lab 6 - Insert Project</h1>
<?php
	include("includes/menu.php");
?>

<div style="font-style: italic; text-align: center; font-size: 9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
<form id="form0" method="post" action="doInsertProject.php">
	<fieldset>
		<legend>Insert into Assign06Projects table</legend>
        <ul>
			
            <li><label title="ProjectID" for="projectID">Project ID</label>
			<input name="projectID" id="projectID" type="text" size="20" maxlength="3"/></li>
			
			<li><label title="ProjName" for="projName">Project Name</label>
			<input name="projName" id="projName" type="text" size="20" maxlength="50"/></li>
			
			
			
			<li><label title="ProjCategory" for="projCategory">Category</label>
				<select name="projCategory" id="projCategory">
                <option value="- Category -">- Category -</option>
                <option value="Commercial">Commercial</option>
                <option value="Residential">Residential</option>
       			</select>
			</li>
			
			
            <li><label title="ProjDescription" for="projDescription">Description</label>
			<input name="projDescription" id="projDescription" type="text" size="20" maxlength="20"/></li>
			
            <li><label title="StartMonth" for="startMonth">Start Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Month -">- Start Month -</option>
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
			
			<li><label title="StartDay" for="startDay">Start Day</label>
				<select name="startDay" id="startDay">
                <option value="- Day -">- Start Day -</option>
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
			
			<li><label title="EndMonth" for="endMonth">End Month</label>
				<select name="endMonth" id="endMonth">
                <option value="- Month -">- End Month -</option>
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
			
			<li><label title="EndDay" for="endDay">End Day</label>
				<select name="endDay" id="endDay">
                <option value="- Day -">- End Day -</option>
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
			
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Insert Info" name="submit" id="submit" /></li>
			
        </ul>
	</fieldset>
</form>

<?php
	$_SESSION["errorMessage"] = "";
?>
	
<script type="text/javascript">
	document.getElementById("carID").focus();
</script>

</body>
</html>