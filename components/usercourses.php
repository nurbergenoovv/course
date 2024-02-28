<?php
require_once 'userCard.php';
require_once 'functions.php';

function userCoursesList()
{
	$courses = getUserCourses($_COOKIE['token']);


	$output = '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
	foreach ($courses as $courseId) {
		$course = getCourseInfo($courseId['course_id']);
		$output .= userCardComponent($course['name'], $course['img'], $course['id']);
	}


	$output .= '</div>';

	return $output;
}

?>