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
    <style type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
        .vazio
        {
            width: 100px;
        }
        #inputImgAnimal + label
        {
            position: absolute;
            height: 250px; 
            width: 375px;
            border: solid;
            border-color: #198754;
            cursor: pointer;
        }
        #imgAnimal
        {
            height: 250px;
            width: 399px;
        }

        @media screen and (max-width: 1199px)
        {
            #inputImgAnimal + label
            {
                width: 355px;
            }
        }

        @media screen and (max-width: 992px)
        {
            #inputImgAnimal + label
            {
                height: 200px;
                width: 255px;
            }
            #imgAnimal
            {
                height: 200px;
            }
        }

        @media screen and (max-width: 767px)
        {
            #imgAnimal
            {
                width: 275px;
            }
        }
        
        @media screen and (max-width: 336px)
        {
            #inputImgAnimal + label
            {
                height: 175px;
                width: 200px;
            }
            #imgAnimal
            {
                height: 175px;
                width: 220px;
            }
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
                                <div class='row align-items-center'>
                                    <div class='col-md-3 d-flex align-items-center'>
                                        <img src='".URL."recursos/img/Animais/$values->foto' alt='Imagem' class='mw-100'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='row'>
                                            <div class='col-md-7'>
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
                                            <div class='col-md-5'>
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
                                    if(!isset($values->status))
                                    {
                                        $beneficio = str_replace(0,1,$_SESSION["dadosUsuario"]->beneficio);
                                        $beneficio = str_replace(1,2,$_SESSION["dadosUsuario"]->beneficio);
                                        $beneficio = str_replace(2,5,$_SESSION["dadosUsuario"]->beneficio);

                                        if($quantidadeCastracoes < $beneficio)
                                        {
                                            echo "
                                            <button type='button' class='btn btn-success w-100 mb-2' data-bs-toggle='modal' data-bs-target='#modalSolicitar' data-idanimal='$values->idanimal'>
                                                Solicitar castração
                                            </button>
                                            ";
                                            }
                                            echo "
                                            <button  class='btn btn-warning w-100 mb-2 text-white'  data-bs-toggle='modal' data-bs-target='#modalEditar' data-idanimal='$values->idanimal'>Editar animal</button>
                                            <!--<a href='".URL."atualizar-animal/$values->idanimal' class='btn btn-warning w-100 mb-2 text-white' >Editar animal</a>-->
                                            <a href='".URL."excluir-animal/$values->idanimal' class='btn btn-danger w-100' onclick='return confirm(\'Deseja realmente excluir?\')'>Excluir animal</a>
                                            ";
                                        }
                                    else
                                    {
                                        switch($values->status)
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
 
        <!-- MODAL: editar animal-->
        <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="post" action="<?php echo URL.'atualizar-animal';?>">
                        <div class="modal-header">
                            <h5 class="modal-title">Atualizar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                        </div>
                        <div class="modal-body">
                            
                            <input type="text" name="idusuario" value="<?php echo $dadosAnimal->idanimal;?>">

                            <div class="row">
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="txtNome" class="form-label">Nome do Animal:</label>
                                            <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="50" value="<?php echo $dadosAnimal->aninome;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="tipoEspecie" class="form-label">Espécie:</label>
                                            <select id="tipoEspecie" name="tipoEspecie" class="form-select"  onchange="carregarRaca(this)" value="<?php echo $dadosAnimal->especie;?>" required>
                                                <option value="">... SELECIONE A ESPÉCIE ...</option>
                                                <option value="0">Canina</option>
                                                <option value="1">Felina</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="numIdade" class="form-label">Idade:</label>
                                            <input type="number" class="form-control" id="numIdade" name="numIdade" min="0" max="100" value="<?php echo $dadosAnimal->idade;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="slcSexo" class="form-label">Sexo:</label>
                                            <select id="slcSexo" name="slcSexo" class="form-select" value="<?php echo $dadosAnimal->sexo;?>" required>
                                                <option value="1">Macho</option>
                                                <option value="2">Fêmea</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcPelagem" class="form-label">Pelagem:</label>
                                            <select id="slcPelagem" name="slcPelagem" class="form-select" value="<?php echo $dadosAnimal->pelagem;?>" required>
                                                <option value="1">Curta</option>
                                                <option value="2">Média</option>
                                                <option value="3">Alta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="txtCor" class="form-label">Cor:</label>
                                            <input type="text" class="form-control" id="txtCor" name="txtCor" maxlength="30" value="<?php echo $dadosAnimal->cor;?>" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcPorte" class="form-label">Porte:</label>
                                            <select id="slcPorte" name="slcPorte" class="form-select" value="<?php echo $dadosAnimal->porte;?>" required>
                                                <option value="1">Pequeno</option>
                                                <option value="2">Médio</option>
                                                <option value="3">Grande</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6 mb-2">
                                            <label for="listRaca" class="form-label">Raça:</label>
                                            <select name="racas" id="racas" class="form-select" value="<?php echo $dadosAnimal->idraca;?>" required>
                                                <option value="">... SELECIONE A RAÇA ...</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcComunitario" class="form-label">Animal Comunitário:</label>
                                            <select id="slcComunitario" name="slcComunitario" class="form-select" value="<?php echo $dadosAnimal->comunitario;?>" required>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row text-center mb-3 aling-content-center">
                                        <div class="col-md-6 justify-content-center aling-content-center">
                                            <label>Foto do animal:</label>
                                            <?php if($dadosAnimal->foto == "") $dadosAnimal->foto = "...img/imagem_exemplo.jpg"; ?>
                                            <label id="labelImgAnimal" for="inputImgAnimal" style="background-color: 0;"></label>
                                            <img src="<?php echo URL."recursos/img/$dadosAnimal->foto";?>" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal">
                                        </div>
                                        <div class="col-md-6 justify-content-center aling-content-center">
                                            <label>Trocar foto:</label>
                                            <input type="file" role="button" name="imgAnimal" id="inputImgAnimal" class="btn popover-test" accept="image/*" hidden>
                                            <label id="labelImgAnimal" for="inputImgAnimal" style="background-color: 0;"></label>
                                            <img src="recursos/img/imagem_exemplo.jpg" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Alterar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        <!--/MODAL -->
        
        <!-- MODAL: solicitar castração -->
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
    <!-- EXTENSÃO JQUERY PARA O AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <!-- ABRIR MODAL EDITAR -->
    <script>
        var exampleModal = document.getElementById('modalEditar')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idanimal = button.getAttribute('data-idanimal')

        $("#idAnimal").val(idanimal);
        })
    </script>

    <!-- ABRIR MODAL SOLICITAR -->
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
    
    <!-- SCRIPT PARA POPULAR SELECT racas -->
    <script>
        function carregarRaca($id = document.getElementById("tipoEspecie"))
        {
            //limpar todos antes de carregar (pesquisar)
            $.ajax({
                url: '<?php echo URL;?>carregar-raca/'+ $id.value,
                success: function(data) {
                    $("#racas").append(data)
                    //$("#teste").html(data);
                }
            });
        }
    </script>  
</body>
</html>