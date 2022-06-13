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
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white text-center">
                        <div class="container-fluid p-5">
                            <h2 class="display-6"> Sobre o projeto PetCastra</h2>
                        </div>
                        <div class="">
                            PetCastra é um projeto feito por alunos da escola técnica "ETEC Dr. Emílio Hernandez Aguilar" em parceria com a Prefeitura de Franco da Rocha.
                            <br>
                            <br>
                            O Projeto tem como objetivo trazer maior conforto e segurança ao tutor do animal na hora de cadastrar seu animalzinho no programa de castração da prefeitura, fazendo isso através da tecnologia, evitando assim ir presencialmente à clínica apenas para cadastrar o animal na castração.
                            <br>
                            <br>
                            <b>Realizado por:</b>
                            <br>
                            Ketlyn Cestari <div class="vr"></div> Matheus Pereira <div class="vr"></div> Miguel Henrique <div class="vr"></div> Mylena Kelly <div class="vr"></div> Nicolas Longo <div class="vr"></div> Sophia Rosario <div class="vr"></div> Ticyanne Barbosa
                        </div>
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
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>