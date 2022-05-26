<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">

    <?php include_once"head.php";?>

</head>
<body>
    <!-- CORPO -->

    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case 0:
                        include_once "menuLogado.php";
                    break;
                    //caso tenha nível de acesso de clínica
                    case 1:
                        include_once "menuClinica.php";
                    break;
                    //caso tenha nível de acesso de Administrador
                    case 2:
                        include_once "menuADM";
                    break;
                }
            }
        else{
            include_once "menu.php";
        }
    ?>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL;?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>