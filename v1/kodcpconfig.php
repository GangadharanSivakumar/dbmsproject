<?php
$con= new mysqli("sql7.freemysqlhosting.net", "sql7258326", "afEfJ5kFtn", "sql7258326");
//servername, username, password, databasename
if($con->connect_error){
	echo $con->connect_error;
}
?>