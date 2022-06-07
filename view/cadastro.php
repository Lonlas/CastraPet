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
        <div class="bg-primary container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">CADASTRAR</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form method="post" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0" action="cadastrar-tutor" enctype="multipart/form-data">
                            <div class="col-md-6 mb-lg-0 mb-5 p-0 pe-md-3">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="form-label">Nome:<font color="red">*</font></label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:<font color="red">*</font></label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF" class="form-label">CPF:<font color="red">*</font></label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" minlength="11" placeholder="000.000.000-00" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel" placeholder="(00) 0000 0000" maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG" class="form-label">RG:<font color="red">*</font></label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" placeholder="00.000.000-0" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular" class="form-label">Celular:<font color="red">*</font></label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular" placeholder="(00) 00000 0000" maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <label for="chkProtetor" class="form-label">Comprovante de residência:<font color="red">*</font></label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="btn btn-success" type="file" value="Fazer upload do documento" accept="image/*" name="btnComprovante" id="btnComprovante" hidden>
                                        <label id="labelComprovante" for="btnComprovante" class="btn btn-success" style="background-color: 0;">Enviar comprovante de residência</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                        <label for="chkNIS" class="form-label">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="text" name="txtNIS" id="txtNIS" placeholder="Número do NIS" maxlength="14" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                        <label for="chkProtetor" class="form-label">Sou protetor de animais</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="btn btn-success" type="file" value="Fazer upload do documento" accept="image/*" name="btnProtetorUpload" id="btnProtetorUpload" hidden disabled>
                                        <label id="labelProtetor" for="btnProtetorUpload" class="btn btn-success disabled" style="background-color: 0;">Fazer upload do documento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 ps-md-3">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:<font color="red">*</font></label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" placeholder="00000-000" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:<font color="red">*</font></label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro" class="form-label">Bairro:<font color="red">*</font></label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua" class="form-label">Rua:<font color="red">*</font></label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtSenha" class="form-label">Crie uma senha:<font color="red">*</font></label>
                                    <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtConfirmaSenha" class="form-label">Confirme sua senha:<font color="red">*</font></label>
                                    <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                    <div class="text-danger" id="avisoIgualdade" style="display:none;">as Senhas devem ser iguais*</div>
                                    <div class="text-danger" id="avisoComprimento" style="display:none;">A senha deve conter mais que 5 dígitos*</div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success float-end" onclick="confirmasenha()" value="Cadastrar">
                                    </div>        
                                </div>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'login';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- EXTENSÃO JQUERY DAS MASCARAS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <script>
        //Adicionar Máscaras
        $(document).ready(function (){
            $("#txtCPF").mask('000.000.000-00');
            $("#txtCEP").mask('00000-000');
            $("#txtRG").mask('00.000.000-0');
            $("#txtTel").mask('(00) 0000 0000');
            $("#txtCelular").mask('(00) 00000 0000');
            $("#txtNIS").mask('000.00000.00-0');
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
    <script>
        //NIS
        $('#chkNIS').change(function() {
            if(this.checked) 
            {
                $('#txtNIS').prop('disabled',false);
            } 
            else 
            {
                $('#txtNIS').prop('disabled',true);
                $('#txtNIS').val(null);
            }
        });
    </script>
    <script>
        //Protetor de Animais
        $('#chkProtetor').change(function()
        {
            if(this.checked) 
            {
                $('#btnProtetorUpload').prop('disabled', false);
                $('#labelProtetor').removeClass("disabled");
            } 
            else 
            {
                $('#btnProtetorUpload').prop('disabled', true);
                $('#labelProtetor').addClass("disabled");
            }
        });
    </script>
    <script type="text/javascript">
        //confirme a senha
        $("form").submit(function(){
            if($("#txtSenha").val() != $("#txtConfirmaSenha").val())
            {
                event.preventDefault();
                $("#avisoIgualdade").show();
            }
            else{$("#avisoIgualdade").hide();}

            if(($("#txtSenha").val().length <= 5) && ($("#txtConfirmaSenha").val().length <= 5))
            {
                event.preventDefault();
                $("#avisoComprimento").show();
            }
            else {$("#avisoComprimento").hide();}
        });
    </script>
    
</body>
</html>