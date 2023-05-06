<?php 
//security
if(!defined('IS_INDEX') || IS_INDEX !== true){
    exit();
}
?>

<div id='bg_content' class='container-fluid'>
    <div id='content' class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

                <ul class="breadcrumb">
                  <li class="active"><a href="#">Inicio</a></li>
                  <li>Bienvenido</li>
                </ul>

                <h3>Bienvenido</h3>
                
                <p><?= $l['hello_world'] ?></p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                
            </div>
        </div>
    </div>
</div>

<!-- Javascript aquí abajo -->

<script type="text/javascript">
    $(document).ready(function(){
        alert("¡Hola mundo!");
    });
</script>