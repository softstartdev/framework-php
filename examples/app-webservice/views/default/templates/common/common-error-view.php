<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?>

<div id='js-pnl-commonError' class='css-bg-content container-fluid'>
	<div class='css-content container'>
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

				<ul class="breadcrumb">
				  <li><a href="#">Inicio</a></li>
				  <li><a href="#">Error</a></li>
				  <li class="active">Error controlado</li>
				</ul>

				<h3>Error controlado!</h3>
				
				<?php
				if ($error !== "") {
					echo "<div class='alert alert-danger' role='alert'>$error</div>";
				}
				?>

				<p>Para continuar haga click <a href='./index.php'>aqu&iacute;</a></p>
				
			</div>
		</div>
	</div>
</div>

<!-- Javascript aquí abajo -->

<!--
<script>
	$(document).ready(function() {
		var scope = $("#js-pnl-commonError");

		//Your code here...
		
	});
</script>
-->