<?php
require_once '../../components/header.php';
require_once '../../components/footer.php';
require_once '../../components/notification.php';
require_once '../../components/functions.php';
$id = $_GET['id'];
$course = getCourseInfo(getModuleInformation($id)['course_id']);
$topic = getModuleInformation($id);
$result = getSiteInformation();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title><?= $course['name'] ?> | <?= $topic['name'] ?></title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../../assets/css/global.css">
	<link rel="stylesheet" href="../../assets/css/topic.css">
	<script src="../../assets/js/color-modes.js"></script>
</head>

<body class="text-dark">

	<div class="loader-screen" id="loader">
		<span class="loader"></span>
	</div>

	<?= headerNav() ?>
	<main class="w-100 mt-4 h-100 mb-5">
		<div class="container">
			<h1 class="h4">
				<a href="/view/profile" class="text-decoration-none text-dark">Курсы</a> →
				<a href="/view/course/?id=<?= $course['id'] ?>" class="text-decoration-none text-dark">
					<?= $course['name'] ?>
				</a>→
				<a href="/view/course-topic/?id=<?= $course['id'] ?>" class="text-decoration-none text-dark">
					<?= $topic['name'] ?>
				</a>
			</h1>
			<div class="video mt-3">
				<center>
					<iframe src="https://drive.google.com/file/d/1E2PkuSr5VeOaM6TSuaas8n6kI9FMlMtd/preview" width="90%"
						style="aspect-ratio:16/9;" allow="autoplay" allowfullscreen></iframe>
				</center>
				<div class="btns mt-2">
					<a href="" class="btn btn-success">
						←
					</a>
					<a href="" class="btn btn-success">
						→
					</a>
				</div>
			</div>

	</main>


	<?= footer() ?>
	<script src="../../assets/js/loader.js"></script>
	<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>