<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../components/functions.php';

checkAdmin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Document</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../assets/css/global.css">
	<script src="../assets/js/color-modes.js"></script>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body class="text-dark">
	<main class="container mt-5 mb-5">
		<h2 class="h2 fw-bold">Админ панель</h2>
		<div class="btns">
		<a href="/admin/setting.php" class="btn btn-success w-100 py-3 fw-semibold">Настройка сайта</a>
		<a href="/admin/users.php" class="btn btn-success w-100 py-3 fw-semibold">Пользватели</a>
		<a href="/admin/courses.php" class="btn btn-success w-100 py-3 fw-semibold">Курсы</a>					
		<a href="/admin/functions/exitAdmin.php" class="btn btn-danger w-100 py-3 fw-semibold">Выйти</a>
		</div>
	</main>
	<div class="loader-screen" id="loader">
	<span class="loader"></span>
	</div>
	<script src="../assets/js/loader.js"></script>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>