<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../components/functions.php';
require_once '../components/notification.php';
checkAdmin();
$information =getSiteInformation();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../assets/js/color-modes.js"></script>
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Setting</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../assets/css/global.css">
	<link rel="stylesheet" href="./css/setting.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">


</head>

<body class="text-dark">
	<main class="container mt-5 mb-5 px-3">
		<?=notification()?>
		<h2 class="h2 fw-bold">Настройка сайта</h2>
		<div class="btns">
			<a href="/admin" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<form action="./functions/updateSetting.php" method="post" class="form-input mt-3">
			<div class="inputs">
				<div class="input-label">
					<label for="name">Названия сайта</label>
					<input type="text" name="name" id="name" class="input-form" placeholder="Названия сайта" required value="<?=$information['name']?>">
				</div>
				<div class="input-label">
					<label for="domain">Домен</label>
					<input type="text" name="domain" id="domain" class="input-form" placeholder='Домен'required value="<?=$information['url']?>">
				</div>
				<div class="input-label">
					<label for="email" class="label">Эл.почта</label>
					<input type="email" name="email" id="email" class="input-form" placeholder="Эл.почта" required value="<?=$information['admin_email']?>">

				</div>
				<button type="submit" class="btn btn-success mt-3 py-3">Применить</button>
			</div>
		</form>
		<h4 class="h4 mt-3">
			Изменить пароль
		</h4>
		<form action="./functions/updateAdminPassword.php" method="POST" class="form-input mt-3">
			<div class="inputs">
				<div class="input-label">
					<label for="correct-password" class="label">Текущий пароль</label>
					<input type="password" name="correct-pass" id="correct-pass" class="input-form" placeholder="Текущий пароль" required/>
				</div>
				<div class="input-label">
					<label for="new-password" class="label">Новый пароль</label>
				<input type="password" name="new-password" id="new-password" class="input-form"
					placeholder="Новый пароль" required>
				</div>
				<button type="submit" class="btn btn-success mt-3 py-3">Изменить</button>
			</div>
		</form>

	</main>
	<div class="loader-screen" id="loader">
		<span class="loader"></span>
	</div>
	<script src="../assets/js/loader.js"></script>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>