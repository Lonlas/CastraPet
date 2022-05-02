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
    <?php include_once "menu.php";?>

    <div class="container-fluid">
        <div class="bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Entrar na minha conta 
                </div>
                <div class="container bg-white">
                    <form action="logar" class="p-5" method="POST">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" name="txtEmail" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group my-4">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="txtSenha" class="form-control" placeholder="" required>
                        </div>
                        <div class="text-center ">
                            <input type="submit" class="btn btn-success align-middle" value="Entrar">
                        </div>
                    </form>
                    <div class="row mb-4">
                        <a href="<?php echo URL.'cadastra-tutor';?>" class="col-6 text-center">Não possuo cadastro</a>
                        <a href="<?php echo URL.'esqueci-a-senha';?>" class="col-6 text-center">Esqueci minha senha</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'inicio'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
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