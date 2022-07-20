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
                            //Reescrevendo a foto
                            $valorFoto = $value->foto;
                            $value->foto == '' ? $value->foto = "Animal_sem_imagem.png" : $value->foto = $value->foto ;

                            //Reescrevendo a espécie
                            $valorEspecie = $value->especie;
                            $value->especie = str_replace("0","Canina", $value->especie);
                            $value->especie = str_replace("1","Felina", $value->especie);

                            //Reescrevendo o sexo
                            $valorSexo = $value->sexo;
                            $value->sexo = str_replace("0","Fêmea", $value->sexo);
                            $value->sexo = str_replace("1","Macho", $value->sexo);

                            //Reescrevendo a pelagem
                            $valorPelagem = $value->pelagem;
                            $value->pelagem = str_replace("0","Curta", $value->pelagem);
                            $value->pelagem = str_replace("1","Média", $value->pelagem);
                            $value->pelagem = str_replace("2","Alta", $value->pelagem);
                            
                            //Reescrevendo o porte
                            $valorPorte = $value->porte;
                            $value->porte = str_replace("0","Pequeno", $value->porte);
                            $value->porte = str_replace("1","Médio", $value->porte);
                            $value->porte = str_replace("2","Grande", $value->porte);

                            //Reescrevendo o Comunitário
                            $valorComunitario = $value->comunitario;
                            $value->comunitario = str_replace("0","Não", $value->comunitario);
                            $value->comunitario = str_replace("1","Sim", $value->comunitario);

                            echo
                            "
                            <!-- Começo de um animal -->
                                <div class='row align-items-center'>
                                    <div class='col-md-3 d-flex align-items-center'>
                                        <img src='".URL."recursos/img/Animais/$value->foto' alt='Imagem' class='mw-100' style='height: 200px; width: 300px;'>
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='row'>
                                            <div class='col-md-7'>
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
                                            <div class='col-md-5'>
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
                                        if($quantcastracoes->quantcastracoes > 0 && $_SESSION["dadosUsuario"]->punicao == 0)
                                        {
                                            echo "
                                            <button class='btn btn-success w-100 mb-2' id='btnSolicitar' type='button' data-bs-target='#modalSolicitar' data-bs-toggle='modal' data-idanimal='$value->idanimal' data-idusuario='$value->idusuario'>
                                                Solicitar castração
                                            </button>
                                            ";
                                        }
                                        else if($_SESSION["dadosUsuario"]->punicao != 0)
                                        {
                                            echo "<span class='btn bg-danger w-100 mb-2 text-white' style='cursor: default;'>Solicitação Bloqueada</span> ";
                                        }
                                        echo "
                                        <button class='btn btn-warning w-100 mb-2' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' 
                                                data-idanimal='$value->idanimal' data-idusuario='$value->idusuario' data-nome='$value->aninome' data-especie='$valorEspecie' 
                                                data-sexo='$valorSexo' data-cor='$value->cor' data-raca='$value->idraca' data-idade='$value->idade' data-pelagem='$valorPelagem' 
                                                data-porte='$valorPorte' data-comunitario='$valorComunitario' data-foto='$valorFoto'>
                                                Editar
                                        </button>
                                        <a class='btn btn-danger w-100' onclick='confirmar($value->idanimal)'>Excluir</a>
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
                                                echo "
                                                <button class='btn btn-warning w-100 mb-2' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' 
                                                    data-idanimal='$value->idanimal' data-idusuario='$value->idusuario' data-nome='$value->aninome' data-especie='$valorEspecie' 
                                                    data-sexo='$valorSexo' data-cor='$value->cor' data-raca='$value->idraca' data-idade='$value->idade' data-pelagem='$valorPelagem' 
                                                    data-porte='$valorPorte' data-comunitario='$valorComunitario' data-foto='$valorFoto'>
                                                    Editar
                                                </button>
                                                <span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação recusada</span>
                                                ";
                                                if(isset($value->msgrecusa))
                                                {
                                                    echo "
                                                    <div class='alert alert-danger p-1'>$value->msgrecusa Para fazer uma nova solicitação, edite as informações do animal</div>
                                                    ";
                                                }

                                            break;
                                            case 4:
                                                echo "<span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Tutor não compareceu</span>";
                                            break;
                                            case 5:
                                                echo "<span class='btn btn-sm bg-danger w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação cancelada</span>";
                                            break;
                                            case 6:
                                                echo "<span class='btn btn-sm bg-warning w-100 my-3 text-white fw-bold' style='cursor: default;'>Solicitação em análise</span>";
                                            break;
                                            case 7:
                                                echo "<span class='btn btn-sm bg-dark w-100 my-3 text-white fw-bold' style='cursor: default;'>Animal foi a óbito</span>";
                                            break;
                                            case 8:
                                                echo "<span class='btn btn-sm bg-success w-100 my-3 text-white fw-bold' style='cursor: default;'>Animal Castrado</span>";
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
        
        <!-- MODAL: solicitar castração -->
        <div class='modal fade' id='modalSolicitar' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <form action="<?php echo URL.'solicitar-castracao';?>" method='post'>
                        <input type='hidden' id='idAnimalSolicita' name='idAnimal'>
                        <input type="hidden" name="idusuario" id="idusuario">

                        <div class='modal-header'>
                            <h5 class='modal-title' id='staticBackdropLabel'>Solicitar castração</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <label class='form-label' for='obsCastr'>Observação: (opcional)</label>
                            <textarea name='obsCastracao' id='obsCastr' rows='5' class='form-control' placeholder="Ex: tem alegria a dipirona"></textarea>
                            <p class="form-text">
                                Você não poderá excluir ou editar esse animal após o envio da solicitação!
                            </p>
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
        <!-- MODAL: editar animal-->
        <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="post" id="formEdita" action="<?php echo URL.'atualizar-animal';?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                        </div>
                        <div class="modal-body">
                            
                            <input type="hidden" name="idanimal" id="idanimal">
                            <input type="hidden" name="idusuario" id="idusuario">

                            <div class="row">
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="txtNome" class="form-label">Nome do Animal:</label>
                                            <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="tipoEspecie" class="form-label">Espécie:</label>
                                            <select id="tipoEspecie" name="tipoEspecie" class="form-select" onchange="carregarRaca(this)" required>
                                                <option>... SELECIONE A ESPÉCIE ...</option>
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
                                                <option value="0">Fêmea</option>
                                                <option value="1">Macho</option>
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
                                    <div class="row mb-2">
                                        <div class="col-md-6 mb-2">
                                            <label for="listRaca" class="form-label">Raça:</label>
                                            <select name="racas" id="racas" class="form-select" required>
                                                <option value="">... SELECIONE A RAÇA ...</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="slcComunitario" class="form-label">Animal Comunitário:</label>
                                            <select id="slcComunitario" name="slcComunitario" class="form-select" required>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row text-center mb-3 aling-content-center">
                                        <div class="col-lg-6 justify-content-center aling-content-center">
                                            <label>Foto do animal:</label>
                                            <label id="labelImgAnimal" for="inputImgAnimal" class="form-label"></label>
                                            <img src="recursos/img/" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal" style="width:100%;">
                                        </div>
                                        <div class="col-lg-6 justify-content-center aling-content-center">
                                            <label id="labelImgAnimal" for="inputImgAnimal" class="form-label">Trocar foto:</label>
                                            <input type="file" name="foto" id="inputImgAnimal" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Editar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        <!--/MODAL -->
        <!-- /CORPO -->
    </div>

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
    <!-- EXTENSÃO JQUERY PARA O AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JS SweetAlert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <!-- ABRIR MODAL SOLICITAR -->
    <script>
        var exampleModal = document.getElementById('modalSolicitar')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var idanimal = button.getAttribute('data-idanimal')
            var idusuario = button.getAttribute('data-idusuario')

            $("#idAnimalSolicita").val(idanimal);
            $("#idusuario").val(idusuario)
        });
    </script>  

    <!-- ABRIR MODAL EDITAR -->
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
            var especie = parseInt(button.getAttribute('data-especie'))
            var sexo = parseInt(button.getAttribute('data-sexo'))
            var cor = button.getAttribute('data-cor')
            
            var idade = button.getAttribute('data-idade')
            var pelagem = parseInt(button.getAttribute('data-pelagem'))
            var foto = button.getAttribute('data-foto')
            if (foto == "")
            {
                foto = "imagem_exemplo.jpg";
            }
            $(document).ready(function()
            {
                $("#racas").empty(); //limpar todos antes de carregar
                $.ajax({
                    url: '<?php echo URL;?>carregar-raca/'+ especie,
                    success: function(data) {
                        $("#racas").append(data);
                        try{
                            $("#racas option").filter("[value="+raca+"]").attr("selected",true)
                        }
                        catch{}
                    }
                });
            })
            
            var raca = button.getAttribute('data-raca')
            var porte = button.getAttribute('data-porte')
            var comunitario = button.getAttribute('data-comunitario')

            $("#idusuario").val(idusuario)
            $("#idanimal").val(idanimal)
            $("#txtNome").val(nome)
            $("#tipoEspecie option").filter("[value="+especie+"]").attr("selected",true)
            $("#slcSexo option").filter("option[value="+sexo+"]").attr("selected",true)
            $("#slcPelagem option").filter("option[value="+pelagem+"]").attr("selected",true)
            $("#slcPorte option").filter("option[value="+porte+"]").attr("selected",true)
            $("#slcComunitario option").filter("option[value="+comunitario+"]").attr("selected",true)
            $("#txtCor").val(cor)
            $("#numIdade").val(idade)
            $("#imgAnimal").prop("src","<?php echo URL.'recursos/img/Animais/';?>"+foto);
        })
    </script>
    <script>
        //Carregar raças
        function carregarRaca(id)
        {
            //limpar todos antes de carregar
            $("#racas").empty();
            $.ajax({
                url: '<?php echo URL;?>carregar-raca/'+ id.value,
                success: function(data) {
                    $("#racas").append(data);
                }
            });
        }
    </script>

    <!-- SCRIPT PARA MOSTRAR AS FOTOS EM TEMPO REAL -->
    <script>
        inputImgAnimal.onchange = evt => {
            const [file] = inputImgAnimal.files
            if (file) {
                var url = URL.createObjectURL(file);
                imgAnimal.src = url;
            }
        }
    </script>

    <!-- SCRIPT CONFIRMAÇÃO PARA EXCLUIR O ANIMAL -->
    <script>
        function confirmar(id)
        {
            Swal.fire({
                title: 'Você tem certeza que deseja excluir?',
                text: "Você não será capaz de desfazer esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Excluído!', //title:
                        'Animal apagado com sucesso.', //text:
                        'success', //icon:
                    ).then(()=> {
                        window.location='<?php echo URL;?>excluir-animal/'+id;
                        }
                    )}
            })
        }
    </script>
    
</body>
</html>