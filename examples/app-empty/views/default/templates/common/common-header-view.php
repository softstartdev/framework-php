<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?>

<?php
	print_r($l);
?>

<img  src="<?= $c->getResource('img', 'LOGO_BLACK.png') ?>" style="position: relative; height: 42px; top: -9px;">

<!-- Javascript aquí abajo -->

<!--
<script>
	$(document).ready(function() {
		var scope = $("#...");
                
		//Your code here...
        
	});
</script>
-->