<?php
require_once './components/header.php';
require_once './components/footer.php';
require_once './components/courses.php';
$result = getSiteInformation();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>
		<?= $result['name'] ?> | Courses
	</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="./assets/css/global.css">
	<link rel="stylesheet" href="./assets/css/main.css">
	<link rel="stylesheet" href="./assets/css/modal.css">
	<script src="./assets/js/color-modes.js"></script>
	<style>
		.modal_window {
			width: 70%;
			height: 75%;
			background: white;
			z-index: 10;
			position: relative;
			display: flex;
			border-radius: 11px;
			align-items: center;
			justify-content: center;
		}

		.btnBack {
			width: 40px;
			height: 40px;
			position: absolute;
			top: -20px;
			right: -20px;
			color: white;
			background: red;
			border-radius: 20px;
			z-index: 11;
		}

		.wrapper {
			position: absolute;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			display: flex;
			z-index: 2;
			align-items: center;
			justify-content: center;
			transition: all 0.5s ease-in-out;
			opacity: 1;
		}

		.modal_bg {
			opacity: 0.4;
			background-color: black;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 3;
		}

		.modal_window h3 {
			font-weight: bold;
		}

		.modal_window form {
			display: flex;
			flex-direction: column;
			gap: 15px;
			width: 70%;
		}

		.modal_window form .input__modal,
		button {
			width: 100%;
			height: 45px;
			outline: none;
			border: none;
			font-size: 24px;
			padding-inline: 10px;
		}

		@media screen and (max-width: 769px) {
			.modal_window {
				min-width: 85%;
				height: 75%;
			}

			.btnBack {
				width: 30px;
				height: 30px;
				top: -15px;
				right: -15px;
				font-size: 14px;
			}

			.modal_window form .input__modal,
			button {
				font-size: 18px;
			}
		}
	</style>
</head>

<body class="text-dark">
	<?php if (isset($_GET['buy'])) {
		$info = getCourseInfo($_GET['buy']);
		$funtion = "document.getElementById('modalWindow').style.display ='none'";
		echo '
		<div class="wrapper" id="modalWindow">
			<div class="modal_window">
				<button class="btnBack" id="close-btn"
					onclick="' . $funtion . '">✖</button>
				<form action="/">
					<h3>' . $info['name'] . '</h3>
					<input type="text" name="" id="" class="input__modal" placeholder="Имя" required>
					<input type="email" name="" id="" class="input__modal" placeholder="Почта" required>
					<input type="number" name="" id="" class="input__modal" placeholder="Номер телефона" required>
					<button class="btn btn-success">Купить</button>
				</form>
			</div>
			<div class="modal_bg"></div>
		</div>';
	} ?>

	<?= headerNav() ?>
	<div class="loader-screen" id="loader">
		<span class="loader"></span>
	</div>
	<main class='mt-4 w-100'>
		<div class="px-4">
			<h1 class="h1 ml-5">Курсы</h1>
			<?= coursesList() ?>
		</div>
	</main>
	<?= footer() ?>
	<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/loader.js"></script>

</body>

</html>