<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Lab 04 - Index Page</title> 
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#billing {position:absolute; top:60px; left:20px; }
		fieldset#shipping {position:absolute; top:60px; left:460px; }
		fieldset#submit {position:absolute; top:540px; left:20px; width:840px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg {color: #FF0000; font-weight: bold; font-size: 12pt; position: absolute; top: 420px; left: 480px;}
	</style>
</head>
<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 04 - Index Page</h1>

<form id="form0" method="post" action="storeInfo.php"> 
    <fieldset id="billing">
        <legend>Billing Information</legend>
        <ul>
            <li> <label title="Name" for="name">Name <span>*</span></label> <input type="text" name="name" id="name" size="30" maxlength="30" 
			value="<?php 
				if (!empty($_SESSION["name"])) { 
					echo($_SESSION["name"]);
				} ?>" /></li>
			
            <li> <label title="Address" for="address">Address <span>*</span></label> <input type="text" name="address" id="address" size="30" maxlength="30"
			value="<?php if (!empty($_SESSION["address"])) { echo($_SESSION["address"]);} ?>" /></li>
			
            <li> <label title="City" for="city">City <span>*</span></label> <input type="text" name="city" id="city" size="30" maxlength="30"
			value="<?php if (!empty($_SESSION["city"])) { echo($_SESSION["city"]);} ?>" /></li>
			
            <li> <label title="State" for="state">State <span>*</span></label> <input type="text" name="state" id="state" size="30" maxlength="30"
			value="<?php if (!empty($_SESSION["state"])) { echo($_SESSION["state"]);} ?>" /></li>
			
            <li> <label title="Zip" for="zip">Zip Code <span>*</span></label> <input type="text" name="zip" id="zip" size="7" maxlength="5" 
			value="<?php if (!empty($_SESSION["zip"])) { echo($_SESSION["zip"]);} ?>" /></li>
			
            <li> <label title="Country" for="country">Country <span>*</span></label> <input type="text" name="country" id="country" size="30" maxlength="30" 
			value="<?php if (!empty($_SESSION["country"])) { echo($_SESSION["country"]);} ?>" /></li>
			
            <li> <label title="Phone" for="phone">Phone <span>*</span></label> <input type="text" name="phone" id="phone" size="30" maxlength="30"
			value="<?php if (!empty($_SESSION["phone"])) { echo($_SESSION["phone"]);} ?>" /></li>
			
            <li> <label title="Email" for="email">Email <span>*</span></label> <input type="text" name="email" id="email" size="30" maxlength="30" 
			value="<?php if (!empty($_SESSION["email"])) { echo($_SESSION["email"]);} ?>" /></li>
			
            <li> <label title="Comments" for="comments">Questions or Comments <span>*</span></label> <textarea rows="5" cols="40" name="comments" id="comments"><?php if (!empty($_SESSION["comments"])) { echo($_SESSION["comments"]);} ?></textarea></li>
			
        </ul>
    </fieldset>
    <fieldset id="shipping">
        <legend>Shipping Information (if different from billing)</legend>
        <ul>
            <li> <label title="SName" for="Sname">Name </label> <input type="text" name="Sname" id="Sname" size="30" maxlength="30" 
			value="<?php if (!empty($_SESSION["Sname"])) { echo($_SESSION["Sname"]);} ?>"/></li>
			
            <li> <label title="SAddress" for="Saddress">Address </label> <input type="text" name="Saddress" id="Saddress" size="30" maxlength="30" 
			value="<?php if (!empty($_SESSION["Saddress"])) { echo($_SESSION["Saddress"]);} ?>"/></li>
			
            <li> <label title="SCity" for="Scity">City </label> <input type="text" name="Scity" id="Scity" size="30" maxlength="30" 
			value="<?php if (!empty($_SESSION["Scity"])) { echo($_SESSION["Scity"]);} ?>"/></li>
			
            <li> <label title="SState" for="Sstate">State </label> <input type="text" name="Sstate" id="Sstate" size="30" maxlength="30"   
			value="<?php if (!empty($_SESSION["Sstate"])) { echo($_SESSION["Sstate"]);} ?>"/></li>
			
            <li> <label title="SZip" for="Szip">Zip Code </label> <input type="text" name="Szip" id="Szip" size="7" maxlength="5" 
			value="<?php if (!empty($_SESSION["Szip"])) { echo($_SESSION["Szip"]);} ?>"/></li>
			
            <li> <label title="SCountry" for="Scountry">Country </label> <input type="text" name="Scountry" id="Scountry" size="30" maxlength="30" value="<?php if (!empty($_SESSION["Scountry"])) { echo($_SESSION["Scountry"]);} ?>" /></li>
			
			
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input id="SubmitBtn" name="SubmitBtn" type="submit" value="Proceed" />
    </fieldset>
</form>

<div id="errorMsg"><?php if (!empty($_SESSION["errorMessage"])){ echo($_SESSION["errorMessage"]);} ?></div>
	
<script type="text/javascript">
	document.getElementById("name").focus();
</script>

</body>
</html>
