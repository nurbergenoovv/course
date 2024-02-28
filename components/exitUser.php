<?php
	setcookie('token', '', time()-3600, '/');
	header('location:/view/sign-in/?notify=Вы вышли с аккаунта');
	exit();
?>