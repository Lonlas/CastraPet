    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <?php include_once "favicon.php"?>
    <!-- /Favicon-->

    <title>PetCastra</title>
    <!-- EXTENSÃO CSS -->
    <link rel="stylesheet" href="<?php echo URL;?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>recursos/css/root.css">
    <!-- /EXTENSÃO CSS -->

    <!-- Grid da tela -->
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
        </style>
    <!-- /Grid da tela -->