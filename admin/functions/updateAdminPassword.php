<?php
	require_once '../../components/functions.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$correct_password = $_POST['correct-pass'];
		$new_password = $_POST['new-password'];
		updateAdminPassword($correct_password, $new_password);
	}
?>