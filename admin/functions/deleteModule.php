<?php
	require_once "../../components/functions.php";
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(!empty($_GET['id'])){
			deleteModule($_GET['id']);
		}else{
			echo "Parametr id dont find";
		}
	}

?>