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
	$now= time();
	if($now > $_SESSION['expire'])
	{
		$_SESSION['timec']= "true";
		header("location: index.php");
	}
	$_SESSION["page"]= $_SERVER["REQUEST_URI"];
	if(isset($_POST["next"]))
	{
		if(isset($_POST["z"]))
		{
			$z= $_POST["z"];
			$_SESSION["z"]= $z;
			header("location: 37.php");
		}
		else
		{
			$z= "";
			$_SESSION["z"]= $z;
			header("location: 37.php");
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
							<p>3z</p>
						</div>
						<div id="i2o">
							<form method="post" action="3z.php">
								<div class="i2ot">
									<label class="label"><p class="labelstyle">[KOD]Blocked[RY]</p>
									<input type="radio" name="z" value="[KOD]Blocked[RY]">
									<span class="checkmark">
										<div class="clickeffect"></div>
									</span>
									</label>
								</div>
								<div class="i2ot">
									<label class="label"><p class="labelstyle">[KOD]Khan[MI6]</p>
									<input type="radio" name="z" value="[KOD]Khan[MI6]">
									<span class="checkmark">
										<div class="clickeffect"></div>
									</span>
									</label>
								</div>
								<div class="i2ot">
									<label class="label"><p class="labelstyle">[KOD]Roak[Ds]</p>
									<input type="radio" name="z" value="[KOD]Roak[Ds]">
									<span class="checkmark">
										<div class="clickeffect"></div>
									</span>
									</label>
								</div>
								<div class="i2ot">
									<label class="label"><p class="labelstyle">[KOD]Notorious42O[MI6]</p>
									<input type="radio" name="z" value="[KOD]Notorious42O[MI6]">
									<span class="checkmark">
										<div class="clickeffect"></div>
									</span>
									</label>
								</div>
						</div>
					</div>
					<div id="i2controls">
							<a href="3x.php"><button type="button" name="back" class="i2buttons">Back</button></a>					
							<button type="submit" name="next" class="i2buttons">Next</button>								
							<button type="reset" name="clear" class="i2buttons">Clear</button>				
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