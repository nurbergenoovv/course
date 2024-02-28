<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once "../components/functions.php";

checkAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$price = $_POST['price'];
	$uploaddir = "../assets/images/";
	$uploadfile = $uploaddir . basename($_FILES['image']['name']);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		addNewCourse($name, $price, $uploadfile);
	} else {
		echo "Possible file upload attack!\n";
	}
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
		<h2 class="h2 fw-bold">Добавить курс</h2>
		<div class="btns">
			<a href="/admin/courses.php" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<form action="" enctype='multipart/form-data' method="post" class="form-input mt-3">
			<div class="inputs">
				<div class="input-label">
					<label for="name" class="label">Названия</label>
					<input type="text" name="name" id="name" class="input-form" placeholder="Названия" required />
				</div>
				<div class="input-label">
					<label for="price" class="label">Цена</label>
					<input type="number" name="price" id="price" class="input-form" placeholder="Цена">
				</div>
				<!--  -->
				<div class="input-label">
					<label for="formFileMultiple" class="label">Обложка</label>
					<input class="form-control bg-light text-dark" type="file" id="formFileMultiple" accept="image/*"
						name="image">
				</div>
				<!--  -->
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