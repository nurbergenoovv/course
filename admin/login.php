<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../components/notification.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>ADMIN LOGIN</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../assets/css/global.css">
	<link rel="stylesheet" href="../assets/css/sign-in.css">
	<script src="../assets/js/color-modes.js"></script>
</head>

<body class="text-dark">
	<main class="w-100 m-auto">
		<?=notification()?>
		<form class='form' method='POST' action="/admin/functions/login.php">
			<h1 class="h3 mb-3 fw-normal text-center">Админ</h1>
			<div class="inputs">
			<div class="form-input">
				<input type="password" class="input-form border border-primary rounded-2" placeholder="Password" name="password">
			</div>
			</div>
			<button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
		</form>
	</main>
	<div class="loader-screen" id="loader">
	<span class="loader"></span>
	</div>
	<script src="../assets/js/loader.js"></script>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>