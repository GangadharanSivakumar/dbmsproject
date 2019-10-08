<?php
	session_start();
	include("kodcpconfig.php");
	/*if((!isset($_SESSION['min']) && !isset($_SESSION['password'])) && (!isset($_SESSION['mmin']) && !isset($_SESSION['mpassword'])))
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
	$_SESSION["page"]= $_SERVER["REQUEST_URI"];*/
	$kick= "SELECT * FROM KODKICK";
  $left= "SELECT * FROM KODLEFT";
  $member= "SELECT * FROM KODCP";
	$kicklist= $con->query($kick);
  $leftlist= $con->query($left);
  $memberlist= $con->query($member);
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
						<div class="i2ro">
							<div class="i2r">
								<table>
									<tr>
										<th>Name</th>
										<th>Reason</th>
										<th>Date</th>
									</tr>
									<?php
										while($kick=mysqli_fetch_assoc($kicklist))
										{
											echo "<tr>";
											echo "<td>".$kick['KickMemberN']."</td>";
											echo "<td>".$kick['KickMemberR']."</td>";
											echo "<td>".$kick['KickMemberD']."</td>";
										}
									?>
								</table>
							</div>
            </div>
          </div>
          <div id="i2oc" style="width: 100%; padding-bottom: 14px;">
						<div id="i2oh" style="background: rgb(163, 29, 8); width: 100%">
							<p>Results</p>
						</div>
              <div class="i2ro">
                <div class="i2r">
  								<table>
  									<tr>
                      <th>Name</th>
  										<th>Reason</th>
  										<th>Date</th>
  									</tr>
  									<?php
  										while($left=mysqli_fetch_assoc($leftlist))
  										{
  											echo "<tr>";
  											echo "<td>".$left['LeftMemberN']."</td>";
  											echo "<td>".$left['LeftMemberR']."</td>";
  											echo "<td>".$left['LeftMemberD']."</td>";
  										}
  									?>
  								</table>
  							</div>
              </div>
            </div>
            <div id="i2oc" style="width: 100%; padding-bottom: 14px;">
  						<div id="i2oh" style="background: rgb(163, 29, 8); width: 100%">
  							<p>Results</p>
  						</div>
              <div class="i2ro">
                <div class="i2r">
  								<table>
  									<tr>
  										<th>Name</th>
  										<th>Rank</th>
  										<th>Join Date</th>
  										<th>Warn</th>
  										<th>MIN</th>
  									</tr>
  									<?php
  										while($member=mysqli_fetch_assoc($memberlist))
  										{
  											echo "<tr>";
  											echo "<td>".$member['MEMBRNAME']."</td>";
  											echo "<td>".$member['MEMBRRANK']."</td>";
  											echo "<td>".$member['MEMBRWARN']."</td>";
  											echo "<td>".$member['MJOINDATE']."</td>";
  											echo "<td>".$member['MIDN']."</td>";
  										}
  									?>
  								</table>
  							</div>
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
