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
                        <h5 class="m-0">Codigo de recuperação</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <form action="<?php echo URL.'confirmar-recuperacao';?>" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0" method="post">
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
                            
                            <input type="hidden" name="txtEmail" value="<?php echo $email;?>">
                            <div class="form-group mb-3">
                                <label for="txtCod" class="form-label">Codigo de confirmação:</label>
                                <input type="text" name="txtCod" id="txtCod" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success float-end" value="Confirmar">
                            </div>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'#';?>" class="btn btn-success">Voltar</a>
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