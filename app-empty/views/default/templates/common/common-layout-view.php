<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}

print_r($invokerController);
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
        
        <title><?= $c->getConfig("APP.NAME") ?></title>
        <link href="<?= $c->getResource('img', 'FAVICON.png') ?>" rel="shortcut icon" />
        
        <!-- css -->
        <link href='<?= $c->getResource('css', 'base') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= $c->getResource('css', 'theme') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= $c->getResource('css', $ic->getCode()) ?>' rel='stylesheet' type='text/css' />
        
        <!-- js -->
        <script src="<?= $c->getResource('js', 'scripts') ?>" type="text/javascript"></script>
        <script src="<?= $c->getResource('js', $c->getParameter('r')) ?>" type="text/javascript" st="cef790e9fae132ea821a22d651c0145f"></script>

        <base href="<?= $c->getConfig("ENVIRONMENT.URL") ?>" />
    </head>
    <body>
        
        <?php
        print_r($l);
        ?>

        <?= $header ?>
        <?= $content ?>
        <?= $footer ?>
        
        <!-- Javascript aquí abajo -->
        
        <!--
        <script>
            $(document).ready(function() {
                var scope = $("#js-pnl-page");
                
                //Your code here...
                
            });
        </script>
        -->
        </div>
    </body>
</html>