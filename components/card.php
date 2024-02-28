<?php
function cardComponent($title, $price, $img, $id)
{
	$formatted_price = number_format($price, 0, '', ' ');
	return '
		<div class="col">
						<a class="card shadow-sm rounded-2 text-decoration-none bg-light text-dark course-card" href="/?buy='.$id.'">
							<img src="' . $img . '"
								class="bd-placeholder-img card-img-top" width="100%" height="225">
							<div class="card-body">
								<p class="card-text fw-bold h4">' . $title . '</p>
								<div class="d-flex justify-content-between align-items-center">
								<span class="fw-bold h5">' . $formatted_price . '₸</span>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-outline-success fw-semibold">Купить</button>
									</div>
								</div>
							</div>
						</a>
					</div>
					';
}
?>