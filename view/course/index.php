<?php
require_once '../../components/header.php';
require_once '../../components/footer.php';
require_once '../../components/notification.php';
require_once '../../components/functions.php';
$id = $_GET['id'];
$course = getCourseInfo($id);
$result = getSiteInformation();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title><?=$result['name']?> | <?= $course['name'] ?></title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../../assets/css/global.css">
	<link rel="stylesheet" href="../../assets/css/course.css">
	<script src="../../assets/js/color-modes.js"></script>
</head>

<body class="text-dark">
	<?= headerNav() ?>
	<main class="w-100 mt-4">
		<div class="container">
			<h1 class="h4">
				<a href="/view/profile" class="text-decoration-none text-dark">Курсы</a> →
				<a href="/view/course/?id=<?= $course['id'] ?>" class="text-decoration-none text-dark">
					<?= $course['name'] ?>
				</a>
			</h1>
			<h6 class="h4 mt-3">Темы курса</h6>
			<ul class="topics mt-4">
				<?php
				$topics = getModulesCourse($course['id']);
				if ($topics) {
					foreach ($topics as $topic) {
						echo '<li class="topic">
							<a href="/view/course-topic/?id=' . $topic['id'] . '" class="fs-4">
								' . $topic['name'] . '
							</a>
						</li>';
					}
				}
				?>

			</ul>
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