<?php
function footer()
{
	return '<div class="d-flex justify-content-between py-3 footer">
		<div class="col-md-4 d-flex align-items-center">
			<a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
			</a>
			<span class="mb-3 mb-md-0 text-dark">&copy; 2024 Company, Inc</span>
		</div>

		<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
			<li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
						<use xlink:href="#twitter" />
					</svg></a></li>
			<li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
						<use xlink:href="#instagram" />
					</svg></a></li>
			<li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
						<use xlink:href="#facebook" />
					</svg></a></li>
		</ul>
	</div>';
}
?>