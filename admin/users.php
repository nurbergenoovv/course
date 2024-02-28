<?php
require_once '../components/header.php';
require_once '../components/notification.php';
require_once '../components/footer.php';
require_once '../components/functions.php';
checkAdmin();


$users = getUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Users</title>
	<?= headerHead() ?>
	<link rel="stylesheet" href="../assets/css/global.css">
	<script src="../assets/js/color-modes.js"></script>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body class="text-dark">
	<main class="container mt-5 mb-5">
		<?= notification() ?>
		<h2 class="h2 fw-bold">Пользватели</h2>
		<div class="btns">
			<a href="/admin/add_user.php" class="btn btn-success w-100 py-3 fw-semibold">Добавить пользователя</a>
			<a href="/admin" class="btn btn-primary w-100 py-3 fw-semibold">Назад</a>
		</div>
		<h3 class="h4 mt-4">Список пользватели</h3>
		<div class="tb" style='overflow-x:auto;'>
			<table class="table table-hover mt-2 table-light table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Имя</th>
						<th scope="col">Почта</th>
						<th scope="col">Удалить</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($users) {
						$count = 1;
						foreach ($users as $user) {
							echo '
							<tr>
								<th scope="row">'.$count.'</th>
								<td>'.$user['name'].'</td>
								<td>'.$user['email'].'</td>
								<td><a href="/admin/functions/deleteUser.php?id='.$user['id'].'" class="btn btn-danger">Удалить</a></td>
							</tr>
							';
							$count++;
						}
					}
					?>

				</tbody>
			</table>
		</div>
	</main>
	<div class="loader-screen" id="loader">
		<span class="loader"></span>
	</div>
	<script src="../assets/js/loader.js"></script>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>