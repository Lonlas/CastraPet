<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>

</head>
<body>      
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="container-fluid">
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3" style="grid-area:corpo;">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Meus Animais
                    </div>
                    <div class="container bg-white pt-3">
                    <!-- Componentes aqui -->
                        <?php
                        foreach ($dadosAnimais as $value)
                        {
                            //Reescrevendo a espécie
                            $value->especie = str_replace("0","Canina", $value->especie);
                            $value->especie = str_replace("1","Felina", $value->especie);

                            //Reescrevendo o sexo
                            $value->sexo = str_replace("0","Fêmea", $value->sexo);
                            $value->sexo = str_replace("1","Macho", $value->sexo);

                            //Reescrevendo a pelagem
                            $value->pelagem = str_replace("0","Curta", $value->pelagem);
                            $value->pelagem = str_replace("1","Média", $value->pelagem);
                            $value->pelagem = str_replace("2","Alta", $value->pelagem);
                            
                            //Reescrevendo o porte
                            $value->porte = str_replace("0","Pequeno", $value->porte);
                            $value->porte = str_replace("1","Médio", $value->porte);
                            $value->porte = str_replace("2","Grande", $value->porte);

                            //Reescrevendo o Comunitário
                            $value->comunitario = str_replace("0","Não", $value->comunitario);
                            $value->comunitario = str_replace("1","Sim", $value->comunitario);

                            echo
                            "
                            <!-- Começo de um animal -->
                                <div class='row align-items-center'>
                                    <div class='col-md-3 d-flex align-items-center'>
                                        <img src='".URL."recursos/img/Animais/$value->foto' alt='Imagem' class='mw-100'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='row'>
                                            <div class='col-md-9'>
                                                <div class='row'>
                                                    <p>
                                                        Nome:
                                                        ".$value->aninome."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Espécie:
                                                        ".$value->especie."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Sexo:
                                                        ".$value->sexo."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Pelagem:
                                                        ".$value->pelagem."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Porte:
                                                        ".$value->porte."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p class='mb-md-0'>
                                                        Animal Comunitário:
                                                        ".$value->comunitario."
                                                    </p>
                                                </div>
                                            </div>
                                            <div class='col-md-3'>
                                                <div class='row'>
                                                    <p>
                                                        Idade:
                                                        ".$value->idade."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p>
                                                        Cor:
                                                        ".$value->cor."
                                                    </p>
                                                </div>
                                                <div class='row'>
                                                    <p class='mb-0'>
                                                        Raça:
                                                        ".$value->raca."
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col'></div>
                                    </div>
                                    <div class='col-md-2 mt-2 mt-md-0'>
                                    ";
                                    if(!isset($value->status))
                                    {

                                        if($_SESSION["dadosUsuario"]->quantcastracoes > 0 && $_SESSION["dadosUsuario"]->punicao == 0)
                                        {
                                            echo "
                                            <button type='button' class='btn btn-success w-100 mb-2' data-bs-toggle='modal' data-bs-target='#modalSolicitar' data-idanimal='$value->idanimal'>
                                                Solicitar castração
                                            </button>
                                            ";
                                        }
                                        else if($_SESSION["dadosUsuario"]->punicao == 1)
                                        {
                                            echo "<span class='btn bg-danger w-100 mb-2 text-white' style='cursor: default;'>Solicitação Bloqueada</span> ";
                                        }
                                        echo "
                                        <a href='".URL."atualizar-animal/$value->idanimal' class='btn btn-warning w-100 mb-2 text-white' >Editar animal</a>
                                        <a href='".URL."excluir-animal/$value->idanimal' class='btn btn-danger w-100'>Excluir animal</a>
                                        ";
                                    }
                                    else
                                    {
                                        switch($value->status)
                                        {
                                            case 0:
                                                echo "<span class='btn btn-sm bg-warning w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação em análise</span>";
                                            break;
                                            case 1:
                                                echo "<span class='btn btn-sm bg-success w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação aprovada</span>";
                                            break;
                                            case 2:
                                                echo "<span class='btn btn-sm bg-success w-100 my-3 text-white fw-bold' style='cursor: default;'>Animal Castrado</span>";
                                            break;
                                            case 3:
                                                echo "<span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação recusada</span>";
                                            break;
                                            case 4:
                                                echo "<span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Tutor não compareceu</span>";
                                            break;
                                            case 5:
                                                echo "<span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação cancelada</span>";
                                            break;
                                            case 6:
                                                echo "<span class='btn btn-sm bg-success w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação reagendada</span>";
                                            break;
                                            case 7:
                                                echo "<span class='btn btn-sm bg-dark w-100 my-3 text-white fw-bold' style='cursor: default;'>Animal foi a óbito</span>";
                                            break;
                                            default:
                                                echo "<span class='btn btn-sm bg-secondary w-100 my-3 text-white fw-bold' style='cursor: default;'>Ocorreu um erro</span>";
                                            break;
                                        }
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
                            <input type='hidden' id='idAnimal' name='idAnimal'>
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