<?php
	session_start();
	include("config.php");
	$_SESSION['page']= $_SERVER['REQUEST_URI'];
	if(isset($_SESSION['timec']))
	{
		session_destroy();
		echo "<div id='voteerrorb'><div id='voteerror'><p>*Your session has expired please login here</p></div></div>";
	}
	if(isset($_POST["submit"]))
	{
		$status= "SELECT STATUS FROM login WHERE login.ID= 1";
		$sresult= mysqli_fetch_assoc($con->query($status));
		$min=$_POST["min"];
		$password=$_POST["password"];
		$sql="SELECT MIN, PASSWORD FROM login WHERE BINARY MIN=BINARY '$min' AND BINARY PASSWORD=BINARY '$password'";
		$sql2="SELECT MIN FROM logs WHERE BINARY MIN=BINARY '$min'";
		$result=$con->query($sql);
		$result2=$con->query($sql2);
		if($result->num_rows==1)
		{
			if(!$result2->num_rows==1)
			{
				if($min=="KOD1214003" || $min=="KOD0916006" || $min=="KOD0108001")
				{
					$_SESSION['min']= $min;
					$_SESSION['password']= $password;
					$_SESSION['start']= time();
					$_SESSION['expire']= $_SESSION['start'] + (60 * 60);
					header("location: mcp.php");
				}
				elseif($sresult['STATUS']== "Opened")
				{
					$_SESSION['min']= $min;
					$_SESSION['password']= $password;
					$_SESSION['start']= time();
					$_SESSION['expire']= $_SESSION['start'] + (60 * 60);
					header("location: 3b.php");
				}
				elseif($sresult['STATUS']== "Closed")
				{
					echo "<div id='voteerrorb'><div id='voteerror'><p>*Election is closed</p></div></div>";
				}
			}
			elseif($min=="KOD1214003" || $min=="KOD0916006" || $min=="KOD0108001")
			{
				$_SESSION['mmin']= $min;
				$_SESSION['mpassword']= $password;
				$_SESSION['start']= time();
				$_SESSION['expire']= $_SESSION['start'] + (60 * 60);
				header("location: mcp.php");
			}
			elseif($sresult['STATUS']== "Closed")
			{
				echo "<div id='voteerrorb'><div id='voteerror'><p>*Election is closed</p></div></div>";
			}
			else
			{
				echo "<div id='voteerrorb'><div id='voteerror'><p>*You already submitted your vote</p></div></div>";
			}
		}
		else 
		{
			echo "<p id='nrerror'>*Invalid Password</p>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Kiss Of Death Member Portal
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" type="image" href="kodlogo.png">
	</head>
	<body>
		<div id="image"></div>
		<div id="bluur"></div>
		<div class="login">
			<form method="post" action="index.php">
				<div class="box" id="minbox">
					<select name="min" required selected>
						<option id="opt" selected></option>
						<option>KOD0108001</option>
						<option>KOD0816002</option>
						<option>KOD1214003</option>
						<option>KOD0916006</option>
						<option>KOD0916007</option>
						<option>KOD0112010</option>
						<option>KOD0516012</option>
						<option>KOD0815017</option>
						<option>KOD1016025</option>
						<option>KOD0516026</option>
						<option>KOD0516027</option>
						<option>KOD0616028</option>
						<option>KOD0616029</option>
						<option>KOD0716030</option>
						<option>KOD0716031</option>
						<option>KOD0816032</option>
						<option>KOD0816033</option>
						<option>KOD0816034</option>
						<option>KOD0816035</option>
						<option>KOD0916036</option>
						<option>KOD1016037</option>
						<option>KOD1016038</option>
						<option>KOD1116039</option>
						<option>KOD1116040</option>
						<option>KOD1216041</option>
						<option>KOD0117042</option>
						<option>KOD0117043</option>
						<option>KOD0117044</option>
						<option>KOD0117045</option>
						<option>KOD0117046</option>
						<option>KOD0117047</option>
						<option>KOD0117048</option>
						<option>KOD0217049</option>
						<option>KOD0318050</option>
						<option>KOD0317051</option>
						<option>KOD0317052</option>
						<option>KOD0317053</option>
						<option>KOD0417054</option>
						<option>KOD0517055</option>
						<option>KOD0118056</option>
						<option>KOD0617057</option>
						<option>KOD0717058</option>
						<option>KOD0717059</option>
						<option>KOD0717060</option>
						<option>KOD0817061</option>
						<option>KOD0817062</option>
						<option>KOD0917063</option>
						<option>KOD0318064</option>
						<option>KOD0917065</option>
						<option>KOD0917066</option>
						<option>KOD0118067</option>
						<option>KOD1117068</option>
						<option>KOD1217069</option>
						<option>KOD0118070</option>
						<option>KOD0118071</option>
						<option>KOD0218072</option>
						<option>KOD0218073</option>
						<option>KOD0218074</option>
						<option>KOD0418075</option>
						<option>KOD0418076</option>
						<option>KOD0418077</option>
						<option>KOD0418078</option>
						<option>KOD0418079</option>
						<option>KOD0418080</option>
						<option>KOD0418081</option>
						<option>KOD0518082</option>
						<option>KOD0518083</option>
						<option>KOD0518084</option>
						<option>KOD0518085</option>
						<option>KOD0518086</option>
						<option>KOD0518087</option>
						<option>KOD0518088</option>
						<option>KOD0518089</option>
						<option>KOD0618090</option>
						<option>KOD0618091</option>
						<option>KOD0618092</option>
						<option>KOD0618093</option>
					</select>
					<p>Member Identification Number</p>
					<span class="minspan">MIN</span>
				</div>
				<div class="box" id="pswbox">	
					<input type="password" id="psw" name="password" required>
					<p>Password</p>
				</div>
				<button type="submit" name="submit" id="butt">Authenticate</button>
			</form>
		</div>
		<div id="titleb"></div>
		<div id="title">
			<p>Kiss Of Death Member Portal</p>
		</div>
		<div id="footerb"></div>
		<div id="footer">
			<p>Proudly presented by KOD clan Managements | &copy; 2018</p>
		</div>
	</body>
</html>