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
    <title>Lab 6 - Insert Car</title>
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
<h1 style="text-align:center">Lab 6 - Insert Car</h1>
<?php
	include("includes/menu.php");
?>

<div style="font-style: italic; text-align: center; font-size: 9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
<form id="form0" method="post" action="doInsertCar.php">
	<fieldset>
		<legend>Insert into Assign06Cars table</legend>
        <ul>
			
            <li><label title="CarID" for="carID">Car ID</label>
			<input name="carID" id="carID" type="text" size="20" maxlength="3"/></li>
			
			<li><label title="CarMake" for="carMake">Make</label>
				<select name="carMake" id="carMake">
                <option value="- Make -">- Make -</option>
                <option value="ACURA">ACURA</option>
                <option value="ASTON MARTIN">ASTON MARTIN</option>
                <option value="AUDI">AUDI</option>
                <option value="BENTLEY">BENTLEY</option>
                <option value="BMW">BMW</option>
                <option value="BUICK">BUICK</option>
                <option value="CADILLAC">CADILLAC</option>
                <option value="CHEVROLET">CHEVROLET</option>
                <option value="CHRYSLER">CHRYSLER</option>
                <option value="DODGE">DODGE</option>
                <option value="FERRARI">FERRARI</option>
                <option value="FORD">FORD</option>
                <option value="GMC">GMC</option>
                <option value="HONDA">HONDA</option>
                <option value="HUMMER">HUMMER</option>
                <option value="HYUNDAI">HYUNDAI</option>
                <option value="INFINITI">INFINITI</option>
                <option value="ISUZU">ISUZU</option>
                <option value="JAGUAR">JAGUAR</option>
                <option value="JEEP">JEEP</option>
                <option value="KIA">KIA</option>
                <option value="LAMBORGHINI">LAMBORGHINI</option>
                <option value="LAND ROVER">LAND ROVER</option>
                <option value="LEXUS">LEXUS</option>
                <option value="LINCOLN">LINCOLN</option>
                <option value="LOTUS">LOTUS</option>
                <option value="MASERATI">MASERATI</option>
                <option value="MAYBACH">MAYBACH</option>
                <option value="MAZDA">MAZDA</option>
                <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                <option value="MERCURY">MERCURY</option>
                <option value="MINI">MINI</option>
                <option value="MITSUBISHI">MITSUBISHI</option>
                <option value="NISSAN">NISSAN</option>
                <option value="PONTIAC">PONTIAC</option>
                <option value="PORSCHE">PORSCHE</option>
                <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>
                <option value="SAAB">SAAB</option>
                <option value="SATURN">SATURN</option>
                <option value="SUBARU">SUBARU</option>
                <option value="SUZUKI">SUZUKI</option>
                <option value="TOYOTA">TOYOTA</option>
                <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                <option value="VOLVO">VOLVO</option>
       			</select>
			</li>
			
			
            <li><label title="CarModel" for="carModel">Model</label>
			<input name="carModel" id="carModel" type="text" size="20" maxlength="20"/></li>
			
            <li><label title="CarYear" for="carYear">Year</label>
				<select name="carYear" id="carYear">
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
                <option value="1960">1960</option>
        		</select>
			</li>
			
			<li><label title="CarColor" for="carColor">Color</label>
			<input name="carColor" id="carColor" type="text" size="20" maxlength="20"/></li>
			
			<li><label title="CarHybrid" for="carHybrid">Hybrid</label>
				<span id="radios" style="float: right;">
					<input name="carHybrid" id="carHybrid" type="radio" value="Yes" />Yes
					<input name="carHybrid" id="carHybrid" type="radio" value="No" />No
				</span>
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