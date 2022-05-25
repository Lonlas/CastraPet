<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>
    <!-- CORPO -->
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

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3 ">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Recuperação de senha
                </div>
                <div class="container bg-white">
                    <form method="post" action="recuperar-senha">
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center">
                            <table class="table table-borderless">
                                    <tr>
                                        <td class="row-mb-1">
                                            <label for="txtEmail">E-mail:</label>
                                        </td> 
                                        <td class="row-mb-5"> 
                                            <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4 ms-md-3 text-center">
                            <input type="submit" class="btn btn-success mx-auto" value="Enviar">
                        </div>       
                    </div>  
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'login'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
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