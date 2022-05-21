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

</head>
<body>
    <!-- CORPO -->
    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado e exista uma sessão
        {
            switch($_SESSION["dadosLogin"]->nivelacesso)
            {
                //caso tenha nível de acesso de usuário
                case 0: include_once "menuLogado.php"; break;
                //caso tenha nível de acesso de clínica
                case 1: include_once "menuClinica.php"; break;
                //caso tenha nível de acesso de Administrador
                case 2: include_once "menuADM.php"; break;   
            }
        }
        else{ include_once "menu.php"; }
    ?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Meus Animais
                </div>
                <div class="container bg-white">
                <!-- Componentes aqui -->
                    <?php
                        foreach ($dadosAnimais as $values)
                        {
                            //Reescrevendo a espécie
                            $values->especie = str_replace("0","Canina", $values->especie);
                            $values->especie = str_replace("1","Felina", $values->especie);

                            //Reescrevendo o sexo
                            $values->sexo = str_replace("0","Fêmea", $values->sexo);
                            $values->sexo = str_replace("1","Macho", $values->sexo);

                            //Reescrevendo a pelagem
                            $values->pelagem = str_replace("1","Curta", $values->pelagem);
                            $values->pelagem = str_replace("2","Média", $values->pelagem);
                            $values->pelagem = str_replace("3","Alta", $values->pelagem);
                            
                            //Reescrevendo o porte
                            $values->porte = str_replace("1","Pequeno", $values->porte);
                            $values->porte = str_replace("2","Médio", $values->porte);
                            $values->porte = str_replace("3","Grande", $values->porte);

                            //Reescrevendo o Comunitário
                            $values->comunitario = str_replace("0","Não", $values->comunitario);
                            $values->comunitario = str_replace("1","Sim", $values->comunitario);



                            echo 
                            "
                            <!-- Começo de um animal -->
                                <div class='row mt-3'>
                                    <div class='col-md-3 d-flex align-items-center'>
                                        <img src='".URL."recursos/img/imagem_cachorro.jpg' alt='Imagem' class='mw-100'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='row'>
                                            <div class='col-md-9'>
                                                <div class='row'>
                                                    <p>
                                                        Nome:
                                                        ".$values->aninome."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Espécie:
                                                        ".$values->especie."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Sexo:
                                                        ".$values->sexo."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Pelagem:
                                                        ".$values->pelagem."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Porte:
                                                        ".$values->porte."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p class='mb-md-0'>
                                                        Animal Comunitário:
                                                        ".$values->comunitario."
                                                    </p>
                                                </div>
                                            </div>
                                            <div class='col-md-3'>
                                                <div class='row'>
                                                    <p>
                                                        Idade:
                                                        ".$values->idade."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Cor:
                                                        ".$values->cor."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p class='mb-0'>
                                                        Raça:
                                                        ".$values->raca."
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col'></div>
                                    </div>
                                    <div class='col-md-2 mt-2 mt-md-0'>  
                                        <a href='".URL."solicita-castracao' class='btn btn-success float-end w-100 mb-2'>Solicitar castração</a>
                                        <a href='"."#' class='btn btn-warning float-end w-100 mb-2'>Editar animal</a>
                                        <a href='"."#' class='btn btn-danger float-end w-100'>Excluir animal</a>
                                    </div>
                                    
                                </div>
                                <hr>
                            <!-- Fim de um animal -->";
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col">
                            <a href="<?php echo URL.'cadastra-animal';?>" class="btn btn-success float-end">Cadastrar Animal</a>
                        </div>
                    </div>
                <!-- Fim dos componentes -->
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'perfil'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
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