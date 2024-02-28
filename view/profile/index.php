<?php
require_once '../../components/header.php';
require_once '../../components/footer.php';
require_once '../../components/notification.php';
require_once '../../components/functions.php';
require_once '../../components/usercourses.php';

checkAutorize();

$courses = getUserCourses($_COOKIE['token']);
$result = getSiteInformation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title><?=$result['name']?> | Profile</title>
	<?= headerHead()?>
	<link rel="stylesheet" href="../../assets/css/global.css">
	<link rel="stylesheet" href="../../assets/css/profile.css">
	<script src="../../assets/js/color-modes.js"></script>
</head>

<body class="text-dark">
	<?= headerNav() ?>
	<main class="w-100 mt-4">
		<div class="container">
		<h1 class="h2">
			<?=getUserInfo($_COOKIE['token'])['name']?>
		</h1>
		<div class="btns">
		<a href="" class="btn border-none outline-none text-light" style="background-color: var(--color1);">Изменить пароль</a>
		<a href="/components/exitUser.php" class="btn border-none outline-none text-light btn-danger">Выйти</a>
		</div>
		<h6 class="h4 mt-5">Ваши курсы</h6>
		<?php if($courses){echo userCoursesList(); }else{echo "У вас нет доступных курсов";} ?>
		</div>
		
	</main>
	<div class="loader-screen" id="loader">
	<span class="loader"></span>
	</div>
	<?= footer() ?>
	<script src="../../assets/js/loader.js"></script>
	<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>