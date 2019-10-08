<?php
	session_start();
	include("config.php");
	if(isset($_SESSION['mmin']) && isset($_SESSION['mpassword']))
	{
		header("location:".$_SESSION["page"]);
	}
	elseif(!isset($_SESSION['min']) && !isset($_SESSION['password']))
	{
		header("location:index.php");
	}
	$now= time();
	if($now > $_SESSION['expire'])
	{
		$_SESSION['timec']= "true";
		header("location: index.php");
	}
	$_SESSION["page"]= $_SERVER["REQUEST_URI"];
	if(isset($_POST["submit"]))
	{
		if(isset($_POST["mc"]))
		{
			$mc= $_POST["mc"];
			$_SESSION["mc"]= $mc;
		}
		else
		{
			$mc= "";
			$_SESSION["mc"]= $mc;
		}
		$min= $_SESSION["min"];
		$b= $_SESSION["b"];
		$c= $_SESSION["c"];
		$d= $_SESSION["d"];
		$e= $_SESSION["e"];
		$x= $_SESSION["x"];
		$z= $_SESSION["z"];
		$point= $_SESSION["point"];
		$sql="INSERT INTO logs(MIN, 3B, 3C, 3D, 3E, 3X, 3Z, `3.7`, MINECRAFT) 
				VALUES('$min', '$b', '$c', '$d', '$e', '$x', '$z', '$point', '$mc')";
		if($con->query($sql))
		{
			$submit=  $_POST["submit"];
			$_SESSION["submit"]= $submit;
			header("location: success.php");
		}
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
				<div id="input2">
					<div id="iheading">
						<p>KOD Server Head Election- 2018(Phase- 1)</p>
					</div>
					<div id="i2oc">
						<div id="i2oh">
							<p>Minecraft</p>
						</div>
						<div id="i2o">
							<form method="post" action="minecraft.php">
						</div>
					</div>
					<div id="i2controls">
							<a href="37.php"><button type="button" name="back" class="i2buttons">Back</button></a>																				
							<button type="reset" name="clear" class="i2buttons">Clear</button>
							<button type="submit" name="submit" id="submitb" class="i2buttons" style="background: rgb(163, 29, 8); margin-left: 321px;">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>Proudly presented by KOD clan Managements | &copy; 2018</p>
		</div>
	</body>
</html>