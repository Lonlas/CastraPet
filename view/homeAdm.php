<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>

</head>
<body>

    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">

        <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">   
                        <p>
                            <h4>Olá Administrador(a)!</h4>
                            <br>
                            O administrador pode acessar as opções no menu acima para cadastrar clínicas e raças, consultar usuários e seus animais, 
                            raças, clínicas e castrações, onde poderá editar ou excluir um registro deles caso seja necessário. Também há a opção de 
                            aprovar as castrações, onde poderá analisar as informações do usuário e verificar se está tudo certo para escolher qual 
                            clínica será a responsável por definir um dia e horário para realizar a castração.
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
    <script src="<?php echo URL;?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL;?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL;?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>