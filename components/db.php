<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = 'root';
	$dbname = 'course';
	$mysqli = new mysqli($hostname, $username, $password, $dbname);
	if($mysqli->connect_error){
		echo $mysqli->connect_error;
	}
?>