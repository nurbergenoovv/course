<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once "../components/functions.php";

checkAdmin();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$email = $_POST['email'];
	signup($name, $email);
}
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
		<h2 class="h2 fw-bold">Добавить пользвателя</h2>
		<div class="btns">
			<a href="/admin/users.php" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<form action="" method="post" class="form-input mt-3">
			<div class="inputs">
				<div class="input-label">
					<label for="name" class="label">Имя</label>
					<input type="text" name="name" id="name" class="input-form" placeholder="Имя" required/>
				</div>
				<div class="input-label">
					<label for="email" class="label">Эл.почта</label>
				<input type="email" name="email" id="email" class="input-form"
					placeholder="Эл.почта">
				</div>
				<button type="submit" class="btn btn-success mt-3 py-3">Добавить</button>
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