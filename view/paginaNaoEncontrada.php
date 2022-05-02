<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <?php include_once "favicon.php"?>
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL;?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">

</head>
<body>
    <!-- CORPO -->
        <?php include_once "menu.php";?>

        <div class="container-fluid">
            <div class="bg-primary">
                <div class="container mx-auto row p-3">
                    <div class="bg-dark text-light font-weight-bold">
                        <h4 class="p-3"> 
                            Ops... Parece que esta página não existe
                        </h4>
                    </div>
                    <div class="bg-white" style="height:500px; display:flex; justify-content:center; align-items:center;">
                        <a href="<?php echo URL;?>">
                            <p class="btn btn-link">
                                Voltar para a página principal
                            </p>
                        </a>
                    </div>
                </div>
                <footer class="text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
                    <a href="<?php echo URL.'inicio'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
                </footer>
            </div>
        </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>/recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>/recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>