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
    <div class="container-fluid" style="height:100vh;">
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
        <div class="bg-danger" style="height:auto;">
            <div class="container mx-auto row align-middle p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Cadastro de Raça
                </div>
                <div class="container bg-white">
                    <form action="cadastrar-raca" class="p-sm-2 py-sm-3 p-md-3 p-lg-4 py-3 " method="POST">
                        <label for="Especie">Espécie:</label>
                        <select name="tipoEspecie" id="Especie" class="form-select">
                            <option value="1">Felina</option>
                            <option value="0">Canina</option>
                        </select>
                        <small class="form-text text-muted">Selecione a Espécie dessa Raça</small>
                        <div class="form-group">
                            <label for="raca">Raça:</label>
                            <input type="text" id="raca" name="txtRaca" class="form-control" placeholder="ex: Siamês, Persa, Sphynx " required>
                            <small class="form-text text-muted">Informe o nome da raça que deseja cadastrar</small>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success align-middle" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark align-text-bottom" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
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