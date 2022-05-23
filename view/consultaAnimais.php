<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
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
        <div class="container-fluid bg-danger">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Animais cadastrados
                </div>
                <div class="container bg-white">
                <?php     
                    foreach ($dadosanimal as $value)
                    {
                        echo 
                        "<!-- Começo de um animal -->
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
                                    <button class='btn btn-warning btn-md' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' ><i class='fa fa-edit'></i>Editar</button>
                                    <a href='".URL."excluir-animal/$value->idanimal' class='btn btn-danger float-end w-100' onclick='return confirm(\"Deseja realmente excluir?\")'><i class='fa fa-trash'></i> Excluir</a>    
                                </div>
                            </div>
                            <hr>
                        <!-- Fim de um animal -->";
                        }
                    ?>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'consulta-usuario'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- MODAL: editar animal-->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?php echo URL.'atualizar-animal';?>">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="hidden" name="idusuario" value="<?php echo $dadosanimal->idanimal;?>">-->

                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="txtNome" class="form-label">Nome do Animal:</label>
                                        <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="slcEspecie" class="form-label">Espécie:</label>
                                        <select id="slcEspecie" name="slcEspecie" class="form-select" required>
                                            <option value="1">Canina</option>
                                            <option value="2">Felina</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="numIdade" class="form-label">Idade:</label>
                                        <input type="number" class="form-control" id="numIdade" name="numIdade" min="0" max="100" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="slcSexo" class="form-label">Sexo:</label>
                                        <select id="slcSexo" name="slcSexo" class="form-select" required>
                                            <option value="1">Macho</option>
                                            <option value="2">Fêmea</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcPelagem" class="form-label">Pelagem:</label>
                                        <select id="slcPelagem" name="slcPelagem" class="form-select" required>
                                            <option value="1">Curta</option>
                                            <option value="2">Média</option>
                                            <option value="3">Alta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="txtCor" class="form-label">Cor:</label>
                                        <input type="text" class="form-control" id="txtCor" name="txtCor" maxlength="30" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcPorte" class="form-label">Porte:</label>
                                        <select id="slcPorte" name="slcPorte" class="form-select" required>
                                            <option value="1">Pequeno</option>
                                            <option value="2">Médio</option>
                                            <option value="3">Grande</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="listRaca" class="form-label">Raça:</label>
                                        <input list="racas" name="listRaca" id="listRaca" class="form-control" maxlength="30" required>
                                        <datalist id="racas">
                                            <?php
                                                foreach($dadosRaca as $value)
                                                {
                                                    echo "<option value='$value->raca'>";
                                                }
                                            ?>
                                        </datalist>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcComunitario" class="form-label">Animal Comunitário:</label>
                                        <select id="slcComunitario" name="slcComunitario" class="form-select" required>
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mt-2">
                                <div class="row text-center mb-3">
                                    <label>Foto do animal:</label>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <input type="file" role="button" name="imgAnimal" id="inputImgAnimal" class="btn popover-test" accept="image/*" hidden>
                                    <label id="labelImgAnimal" for="inputImgAnimal" style="background-color: 0;"></label>
                                    <img src="recursos/img/imagem_exemplo.jpg" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal">
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

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>

    <!-- Abrir modal -->
    <script>
        
        function mostrarModal(){
            let minhaModal = new bootstrap.Modal(document.getElementById('#modalEditar')).show();
        }
            
            $("#btnEditar").click(function(){
                $("#modalEditar").modal();
            });

    </script>

</body>
</html>