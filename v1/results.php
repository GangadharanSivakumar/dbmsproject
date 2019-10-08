<?php
	session_start();
	include("config.php");
	if((!isset($_SESSION['min']) && !isset($_SESSION['password'])) && (!isset($_SESSION['mmin']) && !isset($_SESSION['mpassword'])))
	{
		header("location:index.php");
	}
	if(isset($_SESSION['min']))
	{
		$min= $_SESSION["min"];
	}
	elseif(isset($_SESSION['mmin']))
	{
		$min= $_SESSION['mmin'];
	}
	if($min!="KOD1214003" && $min!="KOD0916006" && $min!="KOD0108001")
	{
		header("location:".$_SESSION["page"]);
	}
	$now= time();
	if($now > $_SESSION['expire'])
	{
		$_SESSION['timec']= "true";
		header("location: index.php");
	}
	$_SESSION["page"]= $_SERVER["REQUEST_URI"];
	$sql= "SELECT * FROM logs";
	$list= $con->query($sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kiss Of Death Member Portal</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="shortcut icon" type="image" href="kodlogo.png">
	</head>
	<body>
		<div id="logout">
			<a href="logout.php"><img src="logout3.png" title="Logout"></a>
		</div>
		<div id="header">
			<p>Kiss Of Death Member Portal</p>
		</div>
		<div id="content">
			<div id="contentbg"></div>
			<div id="input1" style="width: 1280px">
				<div id="input2" style="padding-bottom: 0px; width: 100%;">
					<div id="iheading" style="width: 100%">
						<p>KOD Server Head Election- 2018(Phase- 1)</p>
					</div>
					<div id="i2oc" style="width: 100%; padding-bottom: 14px;">
						<div id="i2oh" style="background: rgb(163, 29, 8); width: 100%">
							<p>Results</p>
						</div>
						<div id="i2ro">
							<div id="i2r">
								<table>
									<tr>
										<th>ID</th>
										<th>TIMESTAMP</th>
										<th>MIN</th>
										<th>3B</th>
										<th>3C</th>
										<th>3D</th>
										<th>3E</th>
										<th>3X</th>
										<th>3Z</th>
										<th>3.7</th>
										<th>MINECRAFT</th>
									</tr>
									<?php
										while($logs=mysqli_fetch_assoc($list))
										{
											echo "<tr>";
											echo "<td>".$logs['ID']."</td>";
											echo "<td>".$logs['TIMESTAMP']."</td>";
											echo "<td>".$logs['MIN']."</td>";
											echo "<td>".$logs['3B']."</td>";
											echo "<td>".$logs['3C']."</td>";
											echo "<td>".$logs['3D']."</td>";
											echo "<td>".$logs['3E']."</td>";
											echo "<td>".$logs['3X']."</td>";
											echo "<td>".$logs['3Z']."</td>";
											echo "<td>".$logs['3.7']."</td>";
											echo "<td>".$logs['MINECRAFT']."</td>";
										}
									?>
								</table>
							</div>
						</div>
					</div>
					<div id="i2controls" style="width: 1280px; margin-bottom: 10px; justify-content: center;">
						<a href="mcp.php"><button type="button" name="back" class="i2buttons">Back</button></a>					
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>Proudly presented by KOD clan Managements | &copy; 2018</p>
		</div>
	</body>
</html>