<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
    </style>
</head>
<body>
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        <?php //CONTROLE DE MENU
            if($_SESSION) //caso esteja logado e exista uma sessão
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case 0: include_once "menuLogado.php"; break;
                    //caso tenha nível de acesso de clínica
                    case 1: include_once "menuClinica.php"; break;
                    //caso tenha nível de acesso de Administrador
                    case 2: include_once "menuADM.php"; break;   
                }
            }
            else{ include_once "menu.php"; }
        ?>
        <div class="bg-primary container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Sobre a castração em Franco da Rocha</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <h3>
                            Título
                        </h3>
                        <p>
                            Texto
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">

                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>