<?php
	session_start();
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
	include("config.php");
	$status= "SELECT STATUS FROM login WHERE login.ID= 1";
	$sresult= mysqli_fetch_assoc($con->query($status));
	if($sresult['STATUS']== "Closed")
	{
		$_SESSION['estatus']= "closed";
	}
	if($sresult['STATUS']== "Opened")
	{
		$_SESSION['estatus']= "opened";
	}
	if(isset($_POST['voteb']))
	{
		$sql2= "SELECT MIN FROM logs WHERE MIN='$min'";
		$result2= $con->query($sql2);
		if(!$result2->num_rows==1)
		{
			$_SESSION['mcpback']= "back";
			header("location: 3b.php");
			
		}
		else
		{
			$mcperror= "*You already submitted your vote";
		}
	}
	if(isset($_POST['closeb']))
	{
		if($_SESSION['estatus']=="opened")
		{
			$_SESSION['estatus']="closed";
			$con->query("UPDATE login SET STATUS= 'Closed' WHERE login.ID= 1");
		}
		elseif($_SESSION['estatus']=="closed")
		{
			$_SESSION['estatus']="opened";
			$con->query("UPDATE login SET STATUS= 'Opened' WHERE login.ID= 1");
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
		<div id="logout">
			<a href="logout.php"><img src="logout3.png" title="Logout"></a>
		</div>
		<div id="header">
			<p>Kiss Of Death Member Portal</p>
		</div>
		<div id="content">
			<div id="contentbg"></div>
			<div id="input1">
				<div id="input2" style="padding-bottom: 0px; width: 100%;">
					<div id="iheading" style="width: 100%">
						<p>KOD Server Head Election- 2018(Phase- 1)</p>
					</div>
					<div id="i2oc" style="width: 100%">
						<div id="i2oh" style="background: rgb(163, 29, 8); width: 100%">
							<p>Management Control Panel</p>
						</div>
						<?php
							if($_SESSION['estatus']== "closed")
							{
								$warning= "&#9888 WARNING: Election is closed";
								echo "<div id='i2noti'>";
									echo "<p>"; echo $warning; echo "</p>";
								echo "</div>";
							}
						?>
						<div id="i2mcpo">
							<div id="i2mcp">
								<form method="post" action="mcp.php">
									<table>
										<tr>
											<th>
												Participate in voting<br>
												<span>
													<?php
													if(isset($mcperror))
													{
														echo $mcperror; 
													}
													?>
												</span>
											</th>
											<td>
												<button type="submit" name="voteb" class="i2buttons">Vote</button>
											</td>
										</tr>
										<tr>
											<th>View results</th>
											<td>
												<a href="results.php"><button type="button" name="voter" class="i2buttons">Results</button></a>
											</td>
										</tr>
										<tr>
											<th>
												Close the election<br>
												<span>*Use it with caution</span>
											</th>
											<td>
												<button type="submit" name="closeb" class="i2buttons" style="background: rgb(163, 29, 8);">
													<?php
														if($_SESSION['estatus']=="closed")
														{
															echo "Reopen";
														}
														else
														{
															echo "Terminate";
														}
													?>
												</button>
											</td>
										</tr>
									</table>
								</form>
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