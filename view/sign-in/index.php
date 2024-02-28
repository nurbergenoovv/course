<?php
require_once '../../components/header.php';
require_once '../../components/footer.php';
require_once '../../components/functions.php';
require_once '../../components/notification.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = $_POST['email'];
	$password = $_POST['password'];
	signin($email, $password);
}
$result = getSiteInformation();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title><?=$result['name']?> | Sign-in</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../../assets/css/global.css">
	<link rel="stylesheet" href="../../assets/css/sign-in.css">
	<script src="../../assets/js/color-modes.js"></script>
</head>

<body class="text-dark">
	<?= headerNav() ?>
	<main class="w-100 m-auto">
		<?=notification()?>
		<form class='form' method='POST' action="">
			<h1 class="h3 mb-3 fw-normal text-center">Войти</h1>
			<div class="inputs">
			<div class="form-input">
				<input type="email" class="input-form border border-primary rounded-2"
				placeholder="name@example.com" name="email">
			</div>
			<div class="form-input">
				<input type="password" class="input-form border border-primary rounded-2" placeholder="Password" name="password">
			</div>
			</div>
			<button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
			<div class="my-2">
				<a href="/view/forget-password" class="text-decoration-none text-primary text-right fw-medium">Востановить пароль</a>
			</div>
		</form>
	</main>
	<?= footer() ?>
	<div class="loader-screen" id="loader">
	<span class="loader"></span>
	</div>
	<script src="../../assets/js/loader.js"></script>
	<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>