<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?>

<?php
	print_r($l);
?>

<ul>
	<li><a href="#">Inicio</a></li>
	<li><a href="#">Error</a></li>
	<li>Error controlado</li>
</ul>

<h3>Error controlado!</h3>

<?php
	if ($error !== "") {
		echo "<div class='alert alert-danger' role='alert'>$error</div>";
	}
?>

<p>Para continuar haga click <a href='./index.php'>aqu&iacute;</a></p>

<!-- Javascript aquí abajo -->

<!--
<script>
	$(document).ready(function() {
		var scope = $("#...");

		//Your code here...

	});
</script>
-->