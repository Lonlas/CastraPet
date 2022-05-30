<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
    </style>

</head>
<body>      
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
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
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3" style="grid-area:corpo;">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Meus Animais
                    </div>
                    <div class="container bg-white pt-3">
                    <!-- Componentes aqui -->
                        <?php
                        foreach ($dadosAnimais as $values)
                        {
                            //Reescrevendo a espécie
                            $values->especie = str_replace("1","Canina", $values->especie);
                            $values->especie = str_replace("2","Felina", $values->especie);

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

                            //Reescrevendo o Status
                            $values->status = str_replace("0","<span class='badge bg-warning'>Em análise</span>", $values->status);
                            $values->status = str_replace("1","<span class='badge bg-success'>Aprovado</span>", $values->status);
                            $values->status = str_replace("2","<span> class='badge bg-success'>Castrado</span>", $values->status);
                            $values->status = str_replace("3","<span class='badge bg-danger'>Reprovado</span>", $values->status);
                            $values->status = str_replace("4","<span class='badge bg-danger'>Não compareceu</span>", $values->status);


                            echo
                            "
                            <!-- Começo de um animal -->
                                <div class='row align-items-center'>
                                    <div class='col-md-3 d-flex align-items-center'>
                                        <img src='".URL."recursos/img/Animais/$values->foto' alt='Imagem' class='mw-100'>
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
                                    ";
                                    if(Empty($values->status))
                                    {
                                        echo "
                                        <button type='button' class='btn btn-success w-100 mb-2' data-bs-toggle='modal' data-bs-target='#modalSolicitar' data-idanimal='$values->idanimal'>
                                            Solicitar castração
                                        </button>
                                        <a href='".URL."atualizar-animal/$values->idanimal' class='btn btn-warning w-100 mb-2 text-white' >Editar animal</a>
                                        <a href='".URL."excluir-animal/$values->idanimal' class='btn btn-danger w-100'>Excluir animal</a>
                                        ";
                                    }
                                    else
                                    {
                                        echo 
                                        "
                                            $values->status
                                        ";  
                                    }
                                    echo "
                                    </div>
                                </div>
                                <hr>
                            <!-- Fim de um animal -->
                            ";
                        }
                        ?>
                        <div class="row align-items-center p-3">
                            <div class="col">
                                <a href="<?php echo URL.'cadastra-animal';?>" class="btn btn-success float-end">Cadastrar Animal</a>
                            </div>
                        </div>
                    <!-- Fim dos componentes -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area:footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'perfil'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
                </div>
            </div>
        </div>

        
        <!-- MODAL -->
        <div class='modal fade' id='modalSolicitar' data-bs-keyboard='true' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <form action="<?php echo URL.'solicitar-castracao';?>" method='post'>
                        <input type='text' id='idAnimal' name='idAnimal'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='staticBackdropLabel'>Solicitar castração</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <label class='form-label' for='obhsCastracao'>Observação: (opcional)</label>
                            <textarea name='obsCastracao' id='obsCastr' rows='5' class='form-control'></textarea>
                        </div>
                        <div class='modal-footer'>
                            <button type='submit' class='btn btn-primary'>Enviar Solicitação</button>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /MODAL -->
        <!-- /CORPO -->
    </div>

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <script>
        var exampleModal = document.getElementById('modalSolicitar')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idanimal = button.getAttribute('data-idanimal')

        $("#idAnimal").val(idanimal);
        })
    </script>
</body>
</html>