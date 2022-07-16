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
        
        <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="container-fluid">
            
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3"style="grid-area:corpo;">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Olá <?php echo $dadosUsuario->nome."!"; ?>
                    </div>
                    <div class="container bg-white">
                        <form action="<?php echo URL.'perfil'; ?>" class="p-sm-3 p-md-3 p-lg-3 p-3 px-0 row m-0 justify-items-center" method="POST">
                            <div class="form-text text-secondary">
                                DADOS PESSOAIS 
                                <img src="<?php echo URL.'recursos/img/pencil.svg';?>" class="btn btn-secudary" id='btnEditar' type='button'
                                    data-bs-target='#modalEditar' data-bs-toggle='modal' 
                                        data-idusuario='<?php echo $dadosUsuario->idusuario?>'
                                        data-idlogin='<?php echo $dadosUsuario->idlogin;?>' 
                                        data-nome='<?php echo $dadosUsuario->nome;?>'
                                        data-email='<?php echo $dadosUsuario->email;?>'
                                        data-rg='<?php echo $dadosUsuario->rg;?>'
                                        data-cpf='<?php echo $dadosUsuario->cpf;?>'
                                        data-telefone='<?php echo $dadosUsuario->telefone;?>' 
                                        data-celular='<?php echo $dadosUsuario->celular;?>'
                                        data-whatsapp='<?php echo $dadosUsuario->whatsapp?>'
                                        data-beneficio='<?php echo $dadosUsuario->beneficio;?>'
                                        data-nis='<?php echo $dadosUsuario->nis;?>' >
                                <hr>
                            </div>
                            <div class="col-md-7 form-group">
                                <div class="row">
                                    <p>Nome: <?php echo $dadosUsuario->nome;?></p>
                                </div>
                                <div class="row">
                                    <p>E-mail: <?php echo $dadosUsuario->email;?></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            //Formatando o CPF
                                            $bloco1 = substr($dadosUsuario->cpf,0,3);
                                            $bloco2 = substr($dadosUsuario->cpf,3,3);
                                            $bloco3 = substr($dadosUsuario->cpf,6,3);
                                            $digverificador = substr($dadosUsuario->cpf,-2);
                                            $CPF_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
                                        ?>
                                        <p>CPF: <?php echo $CPF_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            //Formatando o Telefone
                                            $ddd = substr($dadosUsuario->telefone,0,2);
                                            $bloco1 = substr($dadosUsuario->telefone,2,4);
                                            $bloco2 = substr($dadosUsuario->telefone,6,4);
                                            $Telefone_Formatado = "(".$ddd.") ".$bloco1."-".$bloco2;

                                        ?>
                                        <p>Telefone: <?php if(empty($dadosUsuario->telefone)) echo "-"; else echo $Telefone_Formatado;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            //Formatando o RG
                                            $bloco1 = substr($dadosUsuario->rg,0,2);
                                            $bloco2 = substr($dadosUsuario->rg,2,3);
                                            $bloco3 = substr($dadosUsuario->rg,5,3);
                                            $digverificador = substr($dadosUsuario->rg,-1);
                                            $RG_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
                                        ?>
                                        <p>RG: <?php echo $RG_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            //Formatando o Celular
                                            $ddd = substr($dadosUsuario->celular,0,2);
                                            $bloco1 = substr($dadosUsuario->celular,2,5);
                                            $bloco2 = substr($dadosUsuario->celular,7,4);
                                            $Celular_Formatado = "(".$ddd.") ".$bloco1."-".$bloco2;
                                        ?>
                                        <p>Celular: <?php echo $Celular_Formatado;?></p>
                                    </div>    
                                </div>
                                <div class="row mt-2">
                                    <div class="form-text text-secondary">
                                        ENDEREÇO
                                        <img src="<?php echo URL.'recursos/img/pencil.svg';?>" class="btn btn-secudary" id='btnEditar' type='button'
                                            data-bs-target='#modalEditarEndereco' data-bs-toggle='modal' 
                                                data-idusuario='<?php echo $dadosUsuario->idusuario;?>'
                                                data-idlogin='<?php echo $_SESSION["dadosLogin"]->idlogin;?>'
                                                data-cep='<?php echo $dadosUsuario->usucep;?>'
                                                data-rua='<?php echo $dadosUsuario->usurua;?>'
                                                data-numero='<?php echo $dadosUsuario->usunumero;?>'
                                                data-bairro='<?php echo $dadosUsuario->usubairro;?>'>
                                        <hr>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            //Formatando o CEP
                                            $bloco1 = substr($dadosUsuario->usucep,0,5);
                                            $bloco2 = substr($dadosUsuario->usucep,-3);
                                            $CEP_Formatado = $bloco1."-".$bloco2;
                                        ?>
                                        <p>CEP: <?php echo $CEP_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Número: <?php echo $dadosUsuario->usunumero;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <p>Bairro: <?php echo $dadosUsuario->usubairro;?></p>
                                </div>
                                <div class="row">
                                    <p>Rua: <?php echo $dadosUsuario->usurua;?></p>
                                </div>
                            </div>
                            <div class="col-md-5 form-group mt-4">
                                <div class="form-text text-secundary">
                                    MEUS BENEFÍCIOS
                                    <hr>
                                </div>
                                <div class="row">
                                    <p>
                                        <?php 
                                            if(empty($dadosUsuario->nis))
                                            {
                                                echo "<input type='checkbox' disabled>";
                                                echo " Tenho benefício NIS: - ";
                                            }
                                            else
                                            {
                                                echo "<input type='checkbox' checked disabled>";
    
                                                //Formatando o NIS
                                                $bloco1 = substr($dadosUsuario->nis,0,3);
                                                $bloco2 = substr($dadosUsuario->nis,3,5);
                                                $bloco3 = substr($dadosUsuario->nis,8,2);
                                                $digverificador = substr($dadosUsuario->nis,-1);
                                                $NIS_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
    
                                                echo " Tenho benefício NIS: $NIS_Formatado";
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <p>
                                        <?php 
                                            if(empty($dadosUsuario->beneficio == 2)){
                                                echo "<input type='checkbox' disabled>";  
                                                echo " Sou protetor de animais";
                                            }
                                            else{
                                                echo "<input type='checkbox' checked disabled>";
                                                echo " Sou protetor de animais";
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div class="row mt-5 mx-2 justify-content-end">
                                    <div class="col-sm-7 mb-5">
                                        <a href="<?php echo URL.'alterar-senha/'.$_SESSION["dadosLogin"]->idlogin; ?>" class="link-dark">Alterar minha senha</a>
                                    </div>
                                    <div class="col-sm-5">
                                        <a href="<?php echo URL.'meus-animais'; ?>" class="btn btn-success col-12">Meus animais</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area:footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-usuario'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL: imagem protetor-->
    <div class="modal fade" id="modalImagem" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Documento Comprovante de protetor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="img">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>    
    </div>
    <!--/MODAL -->

    <!-- MODAL: editar dados usuário -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL.'atualiza-perfil';?>" method="post" id="formDadosUsuario" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar dados pessoais</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col mb-4">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="form-label">Nome:<font color="red"> *</font></label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:<font color="red"> *</font></label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF" class="form-label">CPF:</label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" readonly>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel" maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG" class="form-label">RG:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular" class="form-label">Celular:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular" maxlength="15" required>
                                        <div class="form-group" style="margin-bottom: -10px;">
                                            <input type="checkbox" name="chkWhats" id="chkWhats" value="sim">
                                            <label for="chkWhats" class="form-label">O número é Whatsapp?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-4">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="sim">
                                        <label for="chkNIS" class="form-label">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <input class="form-control col-6" type="text" name="txtNIS" id="txtNIS" placeholder="Número do NIS" maxlength="11" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <!-- MODAL: editar endereço -->
    <div class="modal fade" id="modalEditarEndereco" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL.'atualiza-endereco';?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar endereço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col mb-4">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero"  maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro" class="form-label">Bairro:<font color="red"> *</font></label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua" class="form-label">Rua:<font color="red"> *</font></label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-4">
                                        <label for="btnComprovante" class="form-label">Comprovante de residência:<font color="red"> *</font></label>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <input class="form-control" type="file" value="Fazer upload do documento" accept="image/*" name="btnComprovante" id="btnComprovante" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
    
    <!-- ABRIR MODAL editar dados usuário -->
    <script>
        var modalEditar = document.getElementById('modalEditar')
        modalEditar.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget

            var idusuario = button.getAttribute('data-idusuario')
            var idlogin = button.getAttribute('data-idlogin')
            var nome = button.getAttribute('data-nome')
            var beneficio = button.getAttribute('data-beneficio')
            var nis = button.getAttribute('data-nis')
            var email = button.getAttribute('data-email')
            var telefone = button.getAttribute('data-telefone')
            var celular = button.getAttribute('data-celular')
            var rg = button.getAttribute('data-rg')
            var cpf = button.getAttribute('data-cpf')
            var whatsapp = button.getAttribute('data-whatsapp')

            $("#idusuario").val(idusuario);
            $("#idlogin").val(idlogin);
            $("#txtNome").val(nome);
            if(beneficio == 2)
            {
                $("#chkProtetor").prop("checked", true);
            }
            else{
                $("#chkProtetor").prop("checked", false);
            }
            if(nis.length == 11)
            {
                $("#chkNIS").prop("checked", true);
            }
            else{
                $("#chkNIS").prop("checked", false);
            }
            $("#txtNIS").val(nis);
            $("#txtEmail").val(email);
            $("#txtTel").val(telefone);   
            $("#txtCelular").val(celular).mask('(00) 00000-0000');  
            if(whatsapp == 1)
            {
                $("#chkWhats").prop("checked", true);
            }
            else{
                $("#chkWhats").prop("checked", false);
            }
            $("#txtRG").val(rg).mask('00.000.000-X', {'translation': {X: {pattern: /[0-9xX]/}}});
            $("#txtCPF").val(cpf).mask('000.000.000-00');
            
        });
    </script>

    <!-- ABRIR MODAL editar endereço usuário -->
    <script>
        var modalEditarEndereco = document.getElementById('modalEditarEndereco')
        modalEditarEndereco.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget

            var idusuario = button.getAttribute('data-idusuario')
            var idlogin = button.getAttribute('data-idlogin')
            var cep = button.getAttribute('data-cep')
            var numero = button.getAttribute('data-numero')
            var bairro = button.getAttribute('data-bairro')
            var rua = button.getAttribute('data-rua')

            $("#idusuario2").val(idusuario);
            $("#idlogin2").val(idlogin);
            $("#txtCEP").val(cep).mask('00000-000');
            $("#txtNumero").val(numero);
            $("#txtBairro").val(bairro);
            $("#txtRua").val(rua);
            
        });
    </script>

    <!-- ABRIR MODAL comprovante -->
    <script>
        //Definindo os valores nos inputs da modal
        var modal = document.getElementById('modalImagem')
        modal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes

            var img = button.getAttribute('data-bs-imagem')

            $("#img").prop("src","<?php echo URL.'recursos/img/docProtetores/'?>"+img);
        })
    </script>

    <script>
        //NIS
        $('#chkNIS').change(function() {
            if(this.checked) 
            {
                $('#txtNIS').prop('disabled',false);
                $('#txtNIS').prop('required',true);
            } 
            else 
            {
                $('#txtNIS').prop('disabled',true);
                $('#txtNIS').prop('required',false);
                $('#txtNIS').val(null);
            }
        });
    </script>

    <script>
        //Consultar CEP
            const $campoCEP = document.getElementById("txtCEP");
            const $campoBairro = document.getElementById("txtBairro");
            const $campoRua = document.getElementById("txtRua");

            $campoCEP.addEventListener("blur", infosDoEvento => {
                const cep = infosDoEvento.target.value;
                if($campoCEP.value != '')
                {
                    fetch('https://viacep.com.br/ws/'+cep+'/json/')
                    .then((RetornoDoServidor) => {
                        return RetornoDoServidor.json();
                    })
                    .then((objJS) => {
                        if(objJS.erro == 'true')
                        {
                            $campoBairro.value = '';
                            $campoRua.value = '';
                        }else
                        {
                            //07868150
                        console.log(objJS);
                        $campoBairro.value = objJS.bairro;
                        $campoRua.value = objJS.logradouro;
                        }
                    })
                }
                else
                {
                    $campoBairro.value = '';
                    $campoRua.value = '';
                }
            });
    </script>
     <!-- EXTENSÃO JQUERY DAS MASCARAS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        //Adicionar Máscaras
        $(document).ready(function (){
            $("#txtCPF").mask('000.000.000-00');
            $("#txtCEP").mask('00000-000');
            $("#txtRG").mask('00.000.000-X', {'translation': {X: {pattern: /[0-9xX]/}}});
            $("#txtTel").mask('(00) 0000-0000');
            $("#txtCelular").mask('(00) 00000-0000');
            $("#txtNIS").mask('000.00000.00-0');
        });
    </script>

</body>
</html>