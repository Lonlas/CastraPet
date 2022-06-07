<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-primary container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Entrar na minha conta</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form action="logar" class="container p-sm-3 p-md-3 p-lg-4 p-3" method="POST">
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="txtEmail" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group my-4">
                                <label for="senha">Senha:</label>
                                <input type="password" id="senha" name="txtSenha" class="form-control" placeholder="" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" value="Entrar">
                            </div>
                        </form>
                        <div class="row px-4 py-3">
                            <a href="<?php echo URL.'cadastra-tutor';?>" class="col-6 text-center">Cadastrar-se</a>
                            <a href="<?php echo URL.'esqueci-a-senha';?>" class="col-6 text-center">Esqueci minha senha</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'#inicio';?>" class="btn btn-success">Voltar</a>
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