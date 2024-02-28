<?php
require_once '../components/header.php';
require_once '../components/footer.php';
require_once '../components/notification.php';
require_once '../components/functions.php';
checkAdmin();

$module_id = $_GET['id'];
$course_id = $_GET['cid'];
$module = getModuleInformation($module_id);
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$url = $_POST['url'];
	$id = $_GET['id'];
	editModule($id,	$name, $url);
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
		<?=notification()?>
		<h2 class="h2 fw-bold">
			| Изменить модуль</h2>
		<div class="btns">
			<a href="/admin/course_modules.php?id=<?=$course_id?>" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<form action="" method="post" class="form-input mt-3">
			<div class="inputs">
				<div class="input-label">
					<label for="name" class="label">Названия</label>
					<input type="text" name="name" id="name" class="input-form" placeholder="Названия" required value="<?=$module['name']?>"/>
				</div>
				<div class="input-label">
					<label for="url" class="label">Ссылка на видео (Google Drive)</label>
					<input type="text" name="url" id="url" class="input-form" placeholder="Ссылка" value="<?=$module['video_url']?>">
				</div>
				<input type="hidden" name="course_id">
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