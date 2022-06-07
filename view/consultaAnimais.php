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
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">
                            Animais do tutor
                        </h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                    <?php     
                        

                        foreach ($dadosAnimal as $value)
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
                            "<!-- Começo de um animal -->
                                <div class='row mt-3'>
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
                                        <button class='btn btn-warning btn-md' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' data-idanimal='$value->idanimal' data-idusuario='$value->idusuario' data-nome='$value->aninome' data-especie='$value->especie' data-sexo='$value->sexo' data-cor='$value->cor' data-raca='$value->raca' data-idade='$value->idade' data-pelagem='$value->pelagem' data-porte='$value->porte' data-comunitario='$value->comunitario' data-foto='$value->foto' >Editar</button>
                                        
                                        <a href='".URL."excluir-animal/$value->idanimal/$value->idusuario/$value->foto' class='btn btn-danger float-end w-100' onclick='return confirm(\"Deseja realmente excluir?\")'><i class='fa fa-trash'></i> Excluir</a>    
                                    </div>
                                </div>
                                <hr>
                            <!-- Fim de um animal -->
                            ";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'consulta-usuario';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- MODAL: editar animal-->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?php echo URL.'editar-animal';?>">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idanimal" id="idanimal">
                        <input type="hidden" name="idusuario" id="idusuario">
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
                                            <option value="0">Canina</option>
                                            <option value="1">Felina</option>
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
                                            <option value="0">Fêmea</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcPelagem" class="form-label">Pelagem:</label>
                                        <select id="slcPelagem" name="slcPelagem" class="form-select" required>
                                            <option value="0">Curta</option>
                                            <option value="1">Média</option>
                                            <option value="2">Alta</option>
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
                                            <option value="0">Pequeno</option>
                                            <option value="1">Médio</option>
                                            <option value="2">Grande</option>
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
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- Abrir modal -->
    <script>
        //Definindo os valores nos inputs da modal

        var modal = document.getElementById('modalEditar')
        modal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idusuario = button.getAttribute('data-idusuario')
        var idanimal = button.getAttribute('data-idanimal')
        var nome = button.getAttribute('data-nome')
        var especie = button.getAttribute('data-especie')
        var sexo = button.getAttribute('data-sexo')
        var cor = button.getAttribute('data-cor')

        var idade = button.getAttribute('data-idade')
        var pelagem = button.getAttribute('data-pelagem')
        var foto = button.getAttribute('data-foto')
        
        $("#idusuario").val(idusuario)
        $("#idanimal").val(idanimal)
        $("#txtNome").val(nome)
        if(especie == "Felina"){$("#slcEspecie option").filter("[value=1]").attr("selected",true)}
        if(sexo == "Fêmea"){$("#slcSexo option").filter("[value=0]").attr("selected",true)}
        $("#txtCor").val(cor)
        
        $("#numIdade").val(idade)
        $("#imgAnimal").prop("src","<?php echo URL.'recursos/img/Animais/'?>"+foto);
        
        console.log($("#slcSexo option").filter("[value=1]"));
        })
    </script>
</body>
</html>