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
                        <h5 class="m-0">Recuperar Senha</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form method="post" class="container p-sm-3 p-md-3 p-lg-4 p-3" action="recuperar-senha">
                            <?php
                                //exibindo mensagem de erro
                                if(isset($_COOKIE["msg"]))
                                {
                                    echo "<div class='alert alert-danger' role='alert'>
                                        ".$_COOKIE['msg']."
                                    </div>";
                                }
                                //excluindo cookie de erro
                                setcookie("msg","",time() - 3600);
                            ?>
                            
                            <div class="form-group mb-4">
                                <label for="txtEmail" class="form-label">E-mail:</label>
                                <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success mx-auto" value="Enviar">
                            </div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'login';?>" class="btn btn-success">Voltar</a>
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