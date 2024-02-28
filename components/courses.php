<?php
require_once 'card.php';
require_once 'functions.php';
$courses = getCourses();

function coursesList()
{
    global $courses; // Делаем массив $courses доступным внутри функции
    $output = '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    
    foreach ($courses as $course) {
        $output .= CardComponent($course['name'], $course['price'], $course['img'], $course['id']);
    }
    
    $output .= '</div>';
    
    return $output;
}

?>
