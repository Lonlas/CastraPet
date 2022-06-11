<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>

</head>
<body>
    
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-warning container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">   
                        <p>
                            <h4>Bem-vindo(a) <?php echo $_SESSION["dadosLogin"]->nome;?> !</h4>
                            <br>
                            A clínica poderá acessar no menu uma lista de castrações designadas e aprovadas pelo administrador para definir um dia e horário para sua realização.
                            Também há uma consulta de castrações que já têm seu dia e horário definidos, nessa tela a clínica deverá atualizar os <span class="fw-bold">status</span> da castração e colocar uma 
                            <span class="fw-bold">observação</span>, caso seja necessário, conforme as seguintes situações:
                            <br><br>   
                            <ul>
                                <li>“Animal Castrado”, caso tudo tenha ocorrido bem e o cirurgia foi bem sucedida;</li>
                                <li>“Tutor não compareceu”, caso o tutor não apareça no dia e horário marcado;</li>
                                <li>“Castração cancelada”, caso algum problema grave tenha acontecido antes da cirurgia e a castração tenha que ser cancelada;</li>
                                <li>“Castração remarcada”, caso algum problema tenha acontecido antes da cirurgia e a castração tenha que ser remarcada para um outro dia;</li>
                                <li>“Óbito”, caso o animal tenha falecido durante a cirurgia.</li>
                            </ul>
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
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>