<?php
function notification()
{
	if(isset($_GET['notify'])){
		return '<div class="push-notification">
		<div class="notification">
		<h7 class="h7">
			<span class="text">' . $_GET['notify'] . '</span>
		</h7>
		</div>
	</div>';
	}
}
?>