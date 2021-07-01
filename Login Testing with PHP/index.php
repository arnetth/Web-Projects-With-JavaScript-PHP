<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lab 02 - Login</title>
	<style type="text/css">
		ul {
			list-style: none;
			margin-top: 5px;
		}
		
		ul li {
			display: block;
			float: left;
			width: 100%;
			height: 1%;
		}
		
		ul li label {
			float: left;
			padding: 7px;
			color: #6666ff;
		}
		
		ul li input {
			float: right;
			margin-right: 10px;
			border: 1px solid #ccc;
			padding: 3px;
			font-family: Georgia, "Times New Roman", Times, serif;
			width: 60%;
		}
		
		li input:focus {
			border: 1px solid #666;
		}
		
		fieldset {
			padding: 10px;
			border: 1px solid #ccc;
			width: 400px;
			overflow: auto;
			margin: 10px;
		}
		
		legend {
			color: #000099;
			margin: 0 10px 0 0;
			padding: 0 5px;
			font-size: 11pt;
			font-weight: bold;
		}
		
		label span {
			color: #ff0000;
		}
		
		fieldset#info {
			position: absolute;
			top: 60px;
			left: 20px;
			width: 460px;
		}
		
		fieldset#submit {
			position: absolute;
			top: 200px;
			left: 20px;
			width: 460px;
			text-align: center;
		}
		
		fieldset input#SubmitBtn {
			background: #E5E5E5;
			color: #000099;
			border: 1px solid #ccc;
			padding: 5px;
			width: 150px;
		}
	</style>
</head>
<body>
	<h1 style="font-size:14pt;text-indent:360px;">Lab 02 - Login</h1>
		
	<form id="form0" action="login.php" method="post">
		<fieldset id="info">
			<legend>Login</legend>
			<ul>
				<li>
					<label title="userID" for="userID">User ID <span>*</span></label>
					<input type="text" name="userID" id="userID" size="30" maxlength="30" />
				</li>
				<li>
					<label title="passwd" for="passwd">Password <span>*</span></label>
					<input type="password" name="passwd" id="passwd" size="30" maxlength="30" />
				</li>
			</ul>
		</fieldset>
		<fieldset id="submit">
			<input id="SubmitBtn" name="SubmitBtn" type="submit" value="Login" />
		</fieldset>
	</form>
	<script type="text/javascript">
		document.getElementById("userID").focus();
	</script>
</body>
</html>