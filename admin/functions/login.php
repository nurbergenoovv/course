<?php
require_once '../../components/functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$pass = $_POST['password'];
	adminPasswordLogin($pass);
}