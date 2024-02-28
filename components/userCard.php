<?php

function userCardComponent($title, $img, $courseId)
{
	return '
	<div class="col">
	<a class="card shadow-sm rounded-2 text-decoration-none bg-light text-dark course-card" href="/view/course/?id=' . $courseId . '">
		<img src="' . $img . '" class="bd-placeholder-img card-img-top" width="100%" height="225">
		<div class="card-body">
			<p class="card-text fw-bold h4">' . $title . '</p>
			<div class="d-flex justify-content-between align-items-center">
			<span class="fw-bold h5">12 345₸</span>
				<div class="btn-group">
					<form action="" method="post">
						<button type="button" class="btn btn-sm btn-outline-success fw-semibold">Посмотреть</button>
					</form>
				</div>
			</div>
		</div>
	</a>
</div>';
}

?>