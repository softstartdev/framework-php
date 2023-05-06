<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?>

<div id='js-pnl-commonFooter' class="css-bg-footer container-fluid">
    <div class='css-footer container'>
        
        <!--
        <div class="css-logos row">
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                <a href="https://www.facebook.com/softstarttechnologies"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                <h5>Direccion de nuestras oficinas</h5>
                <span>C. 37 diagonal Num 392 por 20 y 18A, Ciudad
            industrial, Alvaro Torre Diaz, Merida, Yucatán, Mexico</span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                <h5>Telefono</h5>
                <p>044 999 203 0603</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                <h5>Correo electronico</h5>
                <p><b>manuel.varguez@softstart.mx</b></p>
            </div>
        </div>
        -->
        
        <div class="row">
            <div class="css-copy col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= date('Y') ?> &copy; Copyright todos los derechos reservados <a href='http://softstart.mx' target='_blank'>softstart.mx</a>
            </div>
            <div class="css-privacy col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href='' target='_blank'>Aviso de privacidad</a>
            </div>
        </div>
    </div>
</div>

<!-- Javascript aquí abajo -->

<!--
<script>
	$(document).ready(function() {
		var scope = $("#js-pnl-commonFooter");
        
		//Your code here...
        
	});
</script>
-->