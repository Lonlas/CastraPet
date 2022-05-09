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
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">

</head>
<body>
    <!-- CORPO -->
    <?php include_once "menuLogado.php";?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Meus Animais
                </div>
                <div class="container bg-white p-3">
                    <!-- Componentes aqui -->
                    <div class="row px-3">
                        <div class="col-md-3">
                            <div style="align-items:center !important;">
                                <img src="<?php echo URL.'recursos/img/cachorro.jpg'?>" alt="Imagem" width="100%">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <p>
                                    Nome:
                                    <?php echo"Alfredo";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Espécie:
                                    <?php echo"Canina";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Sexo:
                                    <?php echo"Macho";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Pelagem:
                                    <?php echo"Média";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Porte:
                                    <?php echo"Grande";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Animal Comunitário:
                                    <?php echo"Não";?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="<?php echo URL.'solicita-castracao'; ?>" class="btn btn-success">Solicitar castração</a>
                        </div>
                    </div><hr class="mx-auto my-3" style="width:98%;">
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo URL.'cadastra-animal'; ?>" class="btn btn-success mb-3">Cadastrar Animal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'perfil'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>