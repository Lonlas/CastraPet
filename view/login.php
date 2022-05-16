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

    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
    </style>

</head>
<body>
    <div class="container-fluid d-grid min-vh-100 corpo">
        <!-- CORPO -->
        <?php //CONTROLE DE MENU
            if($_SESSION) //caso esteja logado e exista uma sessão
                {
                    switch($_SESSION["dadosLogin"]->nivelacesso)
                    {
                        //caso tenha nível de acesso de usuário
                        case '0':
                            include_once "menuLogado.php";
                        break;
                        //caso tenha nível de acesso de clínica
                        case '1':
                            include_once "menuClinica.php";
                        break;
                        //caso tenha nível de acesso de Administrador
                        case '2':
                            include_once "menuADM.php";
                        break;
                        
                    }
                }
            else{
                include_once "menu.php";
            }
        ?>
        <div class="container-fluid">
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3" style="grid-area: corpo;">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Entrar na minha conta 
                    </div>
                    <div class="container bg-white">
                        <form action="logar" class="p-5" method="POST">
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="txtEmail" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label for="senha">Senha:</label>
                                <input type="password" id="senha" name="txtSenha" class="form-control" placeholder="" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success align-middle" value="Entrar">
                            </div>
                        </form>
                        <div class="row pb-4">
                            <a href="<?php echo URL.'cadastra-tutor';?>" class="col-6 text-center">Cadastrar-se</a>
                            <a href="<?php echo URL.'esqueci-a-senha';?>" class="col-6 text-center">Esqueci minha senha</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area:footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'inicio'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
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