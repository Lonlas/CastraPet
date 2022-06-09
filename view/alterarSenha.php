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
                        <h5 class="m-0">Alterar minha senha</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <form action="<?php echo URL.'redefinir-senha'; ?>" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 m-0" method="post">
                            <div class="row align-items-center justify-content-center m-0">
                                <input type="hidden" name="idlogin" value="<?php echo $idlogin;?>">
                                <div class="form-group">
                                    <label class="form-label" for="novaSenha">Insira uma nova senha:</label>
                                    <input type="password" name="novaSenha" id="novaSenha" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="novaSenha">Confirme sua senha:</label>
                                    <input type="password" name="confSenha" id="confSenha" required  class="form-control">
                                </div>
                                <div class="text-danger" id="avisoIgualdade" style="display:none;">as Senhas devem ser iguais*</div>
                                <div class="text-danger" id="avisoComprimento" style="display:none;">A senha deve conter mais que 5 dígitos*</div>
                                <div>
                                    <input type="submit" value="Alterar" class="btn btn-success col-auto mt-3 float-end" name="alterarSenha">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-usuario';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        //confirme a senha
        $("form").submit(function(){
            if($("#novaSenha").val() != $("#confSenha").val())
            {
                event.preventDefault();
                $("#avisoIgualdade").show();
            }
            else{$("#avisoIgualdade").hide();}

            if(($("#novaSenha").val().length <= 5) && ($("#confSenha").val().length <= 5))
            {
                event.preventDefault();
                $("#avisoComprimento").show();
            }
            else {$("#avisoComprimento").hide();}
        });
    </script>


</body>
</html>