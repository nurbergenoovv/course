<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../components/notification.php';
require_once '../components/functions.php';
checkAdmin();

$id = $_GET['id'];
$information = getCourseInfo($id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$price = $_POST['price'];
	$id = $_GET['id'];
	editCourseInformation($name, $price, $id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="./css/addcourse.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../assets/js/color-modes.js"></script>
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Setting</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../assets/css/global.css">
	<link rel="stylesheet" href="./css/setting.css">
	<link rel="stylesheet" href="./css/main.css">
	<!--  -->

</head>

<body class="text-dark">
	<main class="container mt-5 mb-5 px-3">
		<?= notification(); ?>
		<h2 class="h2 fw-bold">Курс | Изменить</h2>
		<div class="btns">
			<a href="/admin/course_modules.php?id=<?=$id?>" class="btn btn-success w-100 py-3 fw-semibold">Модули</a>
			<a href="/admin/course_users.php?id=<?=$id?>" class="btn btn-success w-100 py-3 fw-semibold">Пользватели</a>
			<a href="/admin/courses.php" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<h4 class="h4 mt-3">
			Изменить
		</h4>
		<form action="" method="post" class="form-input mt-2">
			<div class="inputs">
				<div class="input-label">
					<label for="name" class="label">Названия</label>
					<input type="text" name="name" id="name" class="input-form" placeholder="Названия" required
						value="<?= $information['name'] ?>" />
				</div>
				<div class="input-label">
					<label for="price" class="label">Цена</label>
					<input type="number" name="price" id="price" class="input-form" placeholder="Цена"
						value="<?= $information['price'] ?>">
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