<?php
	session_start();
	if(isset($_SESSION['mmin']) && isset($_SESSION['mpassword']))
	{
		header("location:".$_SESSION["page"]);
	}
	elseif(!isset($_SESSION['min']) && !isset($_SESSION['password']))
	{
		header("location:index.php");
	}
	if(!isset($_SESSION["submit"]))
	{
		header("location:".$_SESSION['page']);
	}
	else
	{
		header("refresh: 5; url=logout.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kiss Of Death Member Portal</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="shortcut icon" type="image" href="kodlogo.png">
	</head>
	<body>
		<div id="header">
			<p>Kiss Of Death Member Portal</p>
		</div>
		<div id="content">
			<div id="contentbg"></div>
			<div id="input1">
				<div id="input2" style="padding-bottom: 0px;">
					<div id="iheading">
						<p>KOD Server Head Election- 2018(Phase- 1)</p>
					</div>
					<div id="i2oc">
						<div id="i2oh" style="background: rgb(34, 139, 34)">
							<p>Successful!</p>
						</div>
						<div id="i2smsgo">
							<div class="i2smsg">
								<p>Thanks for submitting your vote!</p>
							</div>
							<div class="i2smsg">
								<p>You will now be logged out and redirected to the login page.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>Proudly presented by KOD clan Managements | &copy; 2018</p>
		</div>
	</body>
</html>