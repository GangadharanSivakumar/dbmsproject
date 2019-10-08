<?php
$con= new mysqli("localhost", "root", "", "kodportal");
//servername, username, password, databasename
if($con->connect_error){
	echo $con->connect_error;
}
?>