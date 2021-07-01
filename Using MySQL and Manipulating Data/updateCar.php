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
    <title>Lab 6 - Update Car</title>
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
<h1 style="text-align:center">Lab 6 - Update Car</h1>
<?php
	include("includes/menu.php");
	
	// select car id = 23
	$sql = "SELECT CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid FROM Assign06Cars WHERE CarID=23";
	
	$result = mysqli_query($db, $sql);
	
	if (empty($result)) {
		$num_results = 0;
	}
	else {
		$num_results = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
	}
	
	if ($num_results == 0) {
		$_SESSION["errorMessage"] = "You must first enter a Car with ID 23!";
	}
	
	// the carID field below is disabled... the hidden one is sent to the next page and disabled one is NOT
?>

<div style="font-style: italic; text-align: center; font-size: 9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
<form id="form0" method="post" action="doUpdateCar.php">
	<fieldset>
		<legend>Update Assign06Cars table</legend>
        <ul>
			
            <li><label title="CarID" for="carIDdis">Car ID</label>
			<input name="carIDdis" id="carIDdis" type="text" size="20" maxlength="3" disabled="disabled" value="<?php if($num_results != 0) { 
				echo(trim($row["CarID"]));
			} ?>"/>
			<input name="carID" id="carID" type="hidden" size="20" maxlength="3" value="<?php if($num_results != 0) { 
				echo(trim($row["CarID"]));
			} ?>"/>
			</li>
			
			<li><label title="CarMake" for="carMake">Make</label>
				<select name="carMake" id="carMake">
                <option value="- Make -">- Make -</option>
                <option value="ACURA" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "ACURA") ) { echo("selected='selected'"); } ?>>ACURA</option>
                <option value="ASTON MARTIN" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "ASTON MARTIN") ) { echo("selected='selected'"); } ?>>ASTON MARTIN</option>
                <option value="AUDI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "AUDI") ) { echo("selected='selected'"); } ?>>AUDI</option>
                <option value="BENTLEY" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "BENTLEY") ) { echo("selected='selected'"); } ?>>BENTLEY</option>
                <option value="BMW" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "BMW") ) { echo("selected='selected'"); } ?>>BMW</option>
                <option value="BUICK" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "BUICK") ) { echo("selected='selected'"); } ?>>BUICK</option>
                <option value="CADILLAC" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "CADILLAC") ) { echo("selected='selected'"); } ?>>CADILLAC</option>
                <option value="CHEVROLET" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "CHEVROLET") ) { echo("selected='selected'"); } ?>>CHEVROLET</option>
                <option value="CHRYSLER" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "CHRYSLER") ) { echo("selected='selected'"); } ?>>CHRYSLER</option>
                <option value="DODGE" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "DODGE") ) { echo("selected='selected'"); } ?>>DODGE</option>
                <option value="FERRARI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "FERRARI") ) { echo("selected='selected'"); } ?>>FERRARI</option>
                <option value="FORD" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "FORD") ) { echo("selected='selected'"); } ?>>FORD</option>
                <option value="GMC" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "GMC") ) { echo("selected='selected'"); } ?>>GMC</option>
                <option value="HONDA" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "HONDA") ) { echo("selected='selected'"); } ?>>HONDA</option>
                <option value="HUMMER" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "HUMMER") ) { echo("selected='selected'"); } ?>>HUMMER</option>
                <option value="HYUNDAI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "HYUNDAI") ) { echo("selected='selected'"); } ?>>HYUNDAI</option>
                <option value="INFINITI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "INFINITI") ) { echo("selected='selected'"); } ?>>INFINITI</option>
                <option value="ISUZU" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "ISUZU") ) { echo("selected='selected'"); } ?>>ISUZU</option>
                <option value="JAGUAR" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "JAGUAR") ) { echo("selected='selected'"); } ?>>JAGUAR</option>
                <option value="JEEP" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "JEEP") ) { echo("selected='selected'"); } ?>>JEEP</option>
                <option value="KIA" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "KIA") ) { echo("selected='selected'"); } ?>>KIA</option>
                <option value="LAMBORGHINI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "LAMBORGHINI") ) { echo("selected='selected'"); } ?>>LAMBORGHINI</option>
                <option value="LAND ROVER" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "LAND ROVER") ) { echo("selected='selected'"); } ?>>LAND ROVER</option>
                <option value="LEXUS" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "LEXUS") ) { echo("selected='selected'"); } ?>>LEXUS</option>
                <option value="LINCOLN" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "LINCOLN") ) { echo("selected='selected'"); } ?>>LINCOLN</option>
                <option value="LOTUS" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "LOTUS") ) { echo("selected='selected'"); } ?>>LOTUS</option>
                <option value="MASERATI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MASERATI") ) { echo("selected='selected'"); } ?>>MASERATI</option>
                <option value="MAYBACH" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MAYBACH") ) { echo("selected='selected'"); } ?>>MAYBACH</option>
                <option value="MAZDA" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MAZDA") ) { echo("selected='selected'"); } ?>>MAZDA</option>
                <option value="MERCEDES-BENZ" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MERCEDES-BENZ") ) { echo("selected='selected'"); } ?>>MERCEDES-BENZ</option>
                <option value="MERCURY" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MERCURY") ) { echo("selected='selected'"); } ?>>MERCURY</option>
                <option value="MINI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MINI") ) { echo("selected='selected'"); } ?>>MINI</option>
                <option value="MITSUBISHI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "MITSUBISHI") ) { echo("selected='selected'"); } ?>>MITSUBISHI</option>
                <option value="NISSAN" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "NISSAN") ) { echo("selected='selected'"); } ?>>NISSAN</option>
                <option value="PONTIAC" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "PONTIAC") ) { echo("selected='selected'"); } ?>>PONTIAC</option>
                <option value="PORSCHE" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "PORSCHE") ) { echo("selected='selected'"); } ?>>PORSCHE</option>
                <option value="ROLLS-ROYCE" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "ROLLS-ROYCE") ) { echo("selected='selected'"); } ?>>ROLLS-ROYCE</option>
                <option value="SAAB" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "SAAB") ) { echo("selected='selected'"); } ?>>SAAB</option>
                <option value="SATURN" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "SATURN") ) { echo("selected='selected'"); } ?>>SATURN</option>
                <option value="SUBARU" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "SUBARU") ) { echo("selected='selected'"); } ?>>SUBARU</option>
                <option value="SUZUKI" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "SUZUKI") ) { echo("selected='selected'"); } ?>>SUZUKI</option>
                <option value="TOYOTA" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "TOYOTA") ) { echo("selected='selected'"); } ?>>TOYOTA</option>
                <option value="VOLKSWAGEN" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "VOLKSWAGEN") ) { echo("selected='selected'"); } ?>>VOLKSWAGEN</option>
                <option value="VOLVO" <?php if( ($num_results != 0) && (trim($row["CarMake"]) == "VOLVO") ) { echo("selected='selected'"); } ?>>VOLVO</option>
       			</select>
			</li>
			
			
            <li><label title="CarModel" for="carModel">Model</label>
			<input name="carModel" id="carModel" type="text" size="20" maxlength="20" value="<?php if ($num_results != 0){ echo(trim ($row["CarModel"]) ); }?>"/></li>
			
            <li><label title="CarYear" for="carYear">Year</label>
				<select name="carYear" id="carYear">
                <option value="- Year -">- Year -</option>
                <option value="2020" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2020") ) { echo("selected='selected'"); } ?>>2020</option>
                <option value="2019" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2019") ) { echo("selected='selected'"); } ?>>2019</option>
                <option value="2018" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2018") ) { echo("selected='selected'"); } ?>>2018</option>
                <option value="2017" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2017") ) { echo("selected='selected'"); } ?>>2017</option>
                <option value="2016" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2016") ) { echo("selected='selected'"); } ?>>2016</option>
                <option value="2015" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2015") ) { echo("selected='selected'"); } ?>>2015</option>
                <option value="2014" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2014") ) { echo("selected='selected'"); } ?>>2014</option>
                <option value="2013" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2013") ) { echo("selected='selected'"); } ?>>2013</option>
                <option value="2012" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2012") ) { echo("selected='selected'"); } ?>>2012</option>
                <option value="2011" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2011") ) { echo("selected='selected'"); } ?>>2011</option>
                <option value="2010" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2010") ) { echo("selected='selected'"); } ?>>2010</option>
                <option value="2009" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2009") ) { echo("selected='selected'"); } ?>>2009</option>
                <option value="2008" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2008") ) { echo("selected='selected'"); } ?>>2008</option>
                <option value="2007" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2007") ) { echo("selected='selected'"); } ?>>2007</option>
                <option value="2006" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2006") ) { echo("selected='selected'"); } ?>>2006</option>
                <option value="2005" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2005") ) { echo("selected='selected'"); } ?>>2005</option>
                <option value="2004" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2004") ) { echo("selected='selected'"); } ?>>2004</option>
                <option value="2003" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2003") ) { echo("selected='selected'"); } ?>>2003</option>
                <option value="2002" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2002") ) { echo("selected='selected'"); } ?>>2002</option>
                <option value="2001" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2001") ) { echo("selected='selected'"); } ?>>2001</option>
                <option value="2000" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "2000") ) { echo("selected='selected'"); } ?>>2000</option>
                <option value="1999" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1999") ) { echo("selected='selected'"); } ?>>1999</option>
                <option value="1998" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1998") ) { echo("selected='selected'"); } ?>>1998</option>
                <option value="1997" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1997") ) { echo("selected='selected'"); } ?>>1997</option>
                <option value="1996" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1996") ) { echo("selected='selected'"); } ?>>1996</option>
                <option value="1995" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1995") ) { echo("selected='selected'"); } ?>>1995</option>
                <option value="1994" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1994") ) { echo("selected='selected'"); } ?>>1994</option>
                <option value="1993" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1993") ) { echo("selected='selected'"); } ?>>1993</option>
                <option value="1992" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1992") ) { echo("selected='selected'"); } ?>>1992</option>
                <option value="1991" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1991") ) { echo("selected='selected'"); } ?>>1991</option>
                <option value="1990" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1990") ) { echo("selected='selected'"); } ?>>1990</option>
                <option value="1989" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1989") ) { echo("selected='selected'"); } ?>>1989</option>
                <option value="1988" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1988") ) { echo("selected='selected'"); } ?>>1988</option>
                <option value="1987" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1987") ) { echo("selected='selected'"); } ?>>1987</option>
                <option value="1986" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1986") ) { echo("selected='selected'"); } ?>>1986</option>
                <option value="1985" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1985") ) { echo("selected='selected'"); } ?>>1985</option>
                <option value="1984" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1984") ) { echo("selected='selected'"); } ?>>1984</option>
                <option value="1983" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1983") ) { echo("selected='selected'"); } ?>>1983</option>
                <option value="1982" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1982") ) { echo("selected='selected'"); } ?>>1982</option>
                <option value="1981" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1981") ) { echo("selected='selected'"); } ?>>1981</option>
                <option value="1980" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1980") ) { echo("selected='selected'"); } ?>>1980</option>
                <option value="1979" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1979") ) { echo("selected='selected'"); } ?>>1979</option>
                <option value="1978" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1978") ) { echo("selected='selected'"); } ?>>1978</option>
                <option value="1977" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1977") ) { echo("selected='selected'"); } ?>>1977</option>
                <option value="1976" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1976") ) { echo("selected='selected'"); } ?>>1976</option>
                <option value="1975" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1975") ) { echo("selected='selected'"); } ?>>1975</option>
                <option value="1974" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1974") ) { echo("selected='selected'"); } ?>>1974</option>
                <option value="1973" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1973") ) { echo("selected='selected'"); } ?>>1973</option>
                <option value="1972" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1972") ) { echo("selected='selected'"); } ?>>1972</option>
                <option value="1971" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1971") ) { echo("selected='selected'"); } ?>>1971</option>
                <option value="1970" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1970") ) { echo("selected='selected'"); } ?>>1970</option>
                <option value="1969" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1969") ) { echo("selected='selected'"); } ?>>1969</option>
                <option value="1968" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1968") ) { echo("selected='selected'"); } ?>>1968</option>
                <option value="1967" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1967") ) { echo("selected='selected'"); } ?>>1967</option>
                <option value="1966" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1966") ) { echo("selected='selected'"); } ?>>1966</option>
                <option value="1965" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1965") ) { echo("selected='selected'"); } ?>>1965</option>
                <option value="1964" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1964") ) { echo("selected='selected'"); } ?>>1964</option>
                <option value="1963" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1963") ) { echo("selected='selected'"); } ?>>1963</option>
                <option value="1962" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1962") ) { echo("selected='selected'"); } ?>>1962</option>
                <option value="1961"  <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1961") ) { echo("selected='selected'"); } ?>>1961</option>
                <option value="1960" <?php if( ($num_results != 0) && (trim($row["CarYear"]) == "1960") ) { echo("selected='selected'"); } ?>>1960</option>
        		</select>
			</li>
			
			<li><label title="CarColor" for="carColor">Color</label>
			<input name="carColor" id="carColor" type="text" size="20" maxlength="20" value="<?php if ($num_results != 0){ echo(trim ($row["CarColor"]) ); }?>" /></li>
			
			<li><label title="CarHybrid" for="carHybrid">Hybrid</label>
				<span id="radios" style="float: right;">
					<input name="carHybrid" id="carHybrid" type="radio" value="Yes" <?php if( ($num_results != 0) && (trim($row["CarHybrid"]) == "Yes") ) { echo("checked='checked'"); } ?> />Yes
					<input name="carHybrid" id="carHybrid" type="radio" value="No" <?php if( ($num_results != 0) && (trim($row["CarHybrid"]) == "No") ) { echo("checked='checked'"); } ?> />No
				</span>
			</li>
			
            <li><span><?php echo($_SESSION["errorMessage"]); ?></span></li>
            <li><input type="submit" value="Update Car" name="submit" id="submit" /></li>
			
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