<?php
	require_once '../../components/functions.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$domain = $_POST['domain'];
		$email = $_POST['email'];
		editInformationSite($name, $domain, $email);
	}

?>