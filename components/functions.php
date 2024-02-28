<?php
require_once 'db.php';
global $mysqli;


function generateToken($length = 32)
{
	return bin2hex(random_bytes($length));
}
function generatePassword($length = 12)
{
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

	$chars_length = strlen($chars);

	$password = '';

	for ($i = 0; $i < $length; $i++) {
		$password .= $chars[rand(0, $chars_length - 1)];
	}

	return $password;
}
function getSiteInformation()
{
	global $mysqli;
	$sql = 'SELECT * FROM setting WHERE id=0';
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}
function getContact()
{
	global $mysqli;
	$sql = 'SELECT * FROM contacts WHERE id=0';
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}

function addNewCourse($name, $price, $imageDir)
{
	global $mysqli;
	$url = substr($imageDir, 2);
	$sql = "INSERT INTO courses (name, price, img) VALUES ('$name', '$price', '$url')";
	$result = $mysqli->query($sql);
	if ($result) {
		header("Location:/admin/courses.php?notify=Курс $name успешно добавлен");
		exit();
	} else {
		echo $result;
	}
}
function getCourses()
{
	global $mysqli;
	$sql = "SELECT * FROM courses";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return [];
	}
}

function deleteCourse($id)
{
	global $mysqli;
	$name = $mysqli->query("SELECT name FROM courses WHERE id='$id'")->fetch_assoc()['name'];
	$sql = "DELETE FROM courses WHERE id='$id'";
	$mysqli->query($sql);
	$sql = "DELETE FROM modules WHERE course_id='$id'";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/courses.php?notify=Курс $name успешно удален");
		exit();
	}
}
function deleteModule($id)
{
	global $mysqli;
	$name = $mysqli->query("SELECT name FROM modules WHERE id='$id'")->fetch_assoc()['name'];
	$course_id = $mysqli->query("SELECT course_id FROM modules WHERE id='$id'")->fetch_assoc()['course_id'];
	$sql = "DELETE FROM modules WHERE id='$id'";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/course_modules.php?id=$course_id&notify=Модуль $name успешно удален");
		exit();
	}
}
function getCourseInfo($id)
{
	global $mysqli;
	$sql = "SELECT * FROM courses WHERE id=$id";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}
function editCourseInformation($name, $price, $id)
{
	global $mysqli;
	$sql = "UPDATE courses SET name='$name', price='$price' WHERE id='$id'";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/course.php?id=$id&notify=Курс $name успешно отредактирован!");
		exit();
	}
}
function getModulesCourse($course_id)
{
	global $mysqli;
	$sql = "SELECT * FROM modules WHERE course_id='$course_id' ORDER BY id ASC";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return null;
	}
}
function addNewModule($course_id, $name, $video_url)
{
	global $mysqli;
	$sql = "INSERT INTO modules (name, video_url, course_id) VALUES ('$name', '$video_url', '$course_id')";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/course_modules.php?id=$course_id&notify=Модуль $name успешно добавлен");
		exit();
	}
}
function getModuleInformation($id)
{
	global $mysqli;
	$course_id = $mysqli->query("SELECT course_id FROM modules WHERE id='$id'")->fetch_assoc()['course_id'];
	$sql = "SELECT * FROM modules WHERE id=$id";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}
function editModule($id, $name, $video_url)
{
	global $mysqli;
	$course_id = $mysqli->query("SELECT course_id FROM modules WHERE id='$id'")->fetch_assoc()['course_id'];
	$sql = "UPDATE modules SET name='$name', video_url='$video_url' WHERE id=$id";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/course_modules.php?id=$course_id&notify=Модуль $name успешно отредактирован");
		exit();
	}
}

function signup($name, $email)
{
	global $mysqli;
	// $password = generatePassword();
	$password = "Aktau7292";
	$token = generateToken();
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO users (name, email, token, password) VALUES ('$name', '$email', '$token', '$hashPassword')";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/users.php?notify=Пользватель $name успешно зарегистрирован");
		exit();
	}
}
function getUsers()
{
	global $mysqli;
	$sql = "SELECT * FROM users";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return [];
	}
}
function deleteUser($id)
{
	global $mysqli;
	$name = $mysqli->query("SELECT name FROM users WHERE id=$id")->fetch_assoc()['name'];
	$sql = "DELETE FROM users WHERE id=$id";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/users.php?notify=Пользватель $name успешно удален");
		exit();
	}
}

function signin($email, $password)
{
	global $mysqli;
	$sql = "SELECT password FROM users WHERE email='$email'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		$pass = $result->fetch_assoc()['password'];
		if (password_verify($password, $pass)) {
			$token = generateToken();
			$sql = "UPDATE users SET token='$token' WHERE email='$email'";
			$result = $mysqli->query($sql);
			if ($result) {
				setcookie("token", $token, time() + 3600, "/");
				header("location:/view/profile");
				exit();
			}

		} else {
			header("location:/view/sign-in/index.php?notify=Пароль неверный");
			exit();
		}
	} else {
		header("location:/view/sign-in/index.php?notify=Пользватель с таким почтой не найден");
		exit();
	}
}
function checkAutorize()
{
	global $mysqli;
	if (isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		$sql = "SELECT * FROM users WHERE token='$token'";
		$result = $mysqli->query($sql);
		if ($result->num_rows == 0) {
			header("location:/view/sign-in");
			exit();
		} else {
			null;
		}

	} else {
		header("location:/view/sign-in");
		exit();
	}
}
function addCourseUser($email, $course_id)
{
	global $mysqli;
	$result = $mysqli->query("SELECT id FROM users WHERE email='$email'");
	if ($result->num_rows > 0) {
		$user_id = $result->fetch_assoc()['id'];
		$sql = "INSERT INTO course_users (course_id, user_id) VALUES ('$course_id', '$user_id')";
		$result = $mysqli->query($sql);
		if ($result) {
			header("location:/admin/course_users.php?id=$course_id&notify=Пользватель успешно добавлен");
			exit();
		}
	}else{
		header("location:/admin/add_course_user.php?id=$course_id&notify=Пользватель с такой почтой не найден");
		exit();
	}

}
function getCourseUsers($id)
{
	global $mysqli;
	$sql = "SELECT * FROM course_users WHERE course_id='$id'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	} else {
		return [];
	}
}
function getUserById($id){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE id=$id";
	$result = $mysqli->query($sql);
	if($result->num_rows>0){
		return $result->fetch_assoc();
	}
}
function deleteCourseUser($id)
{
	global $mysqli;
	$sql = "DELETE FROM course_users WHERE id='$id'";
	$result = $mysqli->query($sql);
	if ($result) {
		header("location:/admin/course_users.php?notify=Пользватель успешно удален");
		exit();
	}
}
function getUserInfo($token){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE token='$token'";
	$result = $mysqli->query($sql);
	if($result->num_rows>0){
		return $result->fetch_assoc();
	}else{
		null;
	}
}
function getUserCourses($token){
	global $mysqli;
	$sql = "SELECT id FROM users WHERE token='$token'";
	$user_id = $mysqli->query($sql)->fetch_assoc()['id'];
	$sql = "SELECT * FROM course_users WHERE user_id='$user_id'";
	$res = $mysqli->query($sql);
	if($res->num_rows>0){
		return $res;
	}else{
		return [];
	}
}

function adminPasswordLogin($password){
	global $mysqli;	
	$sql = "SELECT password from `admin` WHERE id=1";
	$result = $mysqli->query($sql);
	if($result->num_rows>0){
		$pass = $result->fetch_assoc()['password'];
		$token = generateToken();
		if($pass == $password){
			setcookie("admin", $token, time()+3600, "/");
			header("location:/admin/");
			exit();
		}else{
			header("location:/admin/login.php?notify?Неверный пароль!");
			exit();
		}
	}
}
function checkAdmin(){
		if(!isset($_COOKIE['admin'])){
			header('location:/admin/login.php?notify=Войдите в аккаунт');
			exit();
		}
}
function editInformationSite($name, $domain, $admin_email){
	global $mysqli;
	$sql = "UPDATE setting SET name='$name', url='$domain', admin_email='$admin_email' WHERE id=0";
	$result = $mysqli->query($sql);
	if($result){
		header('location:/admin/setting.php?notify=Информация сайта успешно обновлено!');
		exit();
	}
}

function updateAdminPassword($correct_pass, $new_password){
	global $mysqli;
	$sql = "SELECT password FROM `admin` WHERE id=1";
	$correct_password = $mysqli->query($sql)->fetch_assoc()['password'];
	if($correct_pass == $correct_password){
		$sql = "UPDATE `admin` SET password='$new_password' WHERE id=1";
		$result = $mysqli->query($sql);
		if($result){
			setcookie('admin', '', time()-3600, '/');
			header("location:/admin/login.php?notify=Ваш пароль был успешно обновлен");
			exit();
		}
	}	
}

function exitAdmin(){
	setcookie('admin', '', time()-3600, '/');
	header('location:/admin/login.php?notify=Вы вышли с аккаунта');
	exit();
}
?>