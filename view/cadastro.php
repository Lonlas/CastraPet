<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>

    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
        <?php /*Controle de menu!*/ include_once "menuControle.php";?>
        
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
                                    <label for="txtNome" class="form-label">Nome:<font color="red"> *</font></label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:<font color="red"> *</font></label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                    <p class="form-text">
                                    Insira um email que possa receber emails.
                                    </p>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <label for="txtCPF" class="form-label">CPF:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" minlength="11" placeholder="000.000.000-00" required>
                                        <div class="invalid-feedback" id="cpfInvalido" style="display:none;">CPF Inválido</div>
                                        <div class="valid-feedback" id="cpfValido" style="display:none;">CPF Válido</div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel" placeholder="(00) 0000-0000" maxlength="10">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <label for="txtRG" class="form-label">RG:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" placeholder="00.000.000-X" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="txtCelular" class="form-label">Celular:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular" placeholder="(00) 00000-0000" maxlength="15" required>
                                        <div class="form-group" style="margin-bottom: -10px;">
                                            <input type="checkbox" name="chkWhats" id="chkWhats" value="sim">
                                            <label for="chkWhats" class="form-label">O número é Whatsapp?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <label for="btnComprovante" class="form-label">Comprovante de residência:<font color="red"> *</font></label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="file" value="Fazer upload do documento" accept="image/*" name="btnComprovante" id="btnComprovante" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="sim">
                                        <label for="chkNIS" class="form-label">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="text" name="txtNIS" id="txtNIS" placeholder="Número do NIS" maxlength="11" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 ps-md-3">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" placeholder="00000-000" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:<font color="red"> *</font></label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="11" required>
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
                                <div class="form-group mb-3">
                                    <label for="txtSenha" class="form-label">Crie uma senha:<font color="red"> *</font></label>
                                    <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtConfirmaSenha" class="form-label">Confirme sua senha:<font color="red"> *</font></label>
                                    <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                    <div class="invalid-feedback" id="avisoIgualdade" style="display:none;">As senhas devem ser iguais*</div>
                                    <div class="invalid-feedback" id="avisoComprimento" style="display:none;">A senha deve conter mais que 5 dígitos*</div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success float-end" value="Cadastrar">
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
            $("#txtRG").mask('00.000.000-X', {'translation': {X: {pattern: /[0-9xX]/}}});
            $("#txtTel").mask('(00) 0000-0000');
            $("#txtCelular").mask('(00) 00000-0000');
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
    <!-- VALIDADOR DE CPF -->
    <script src="https://cdn.jsdelivr.net/npm/js-brasil/js-brasil.js"></script>
    <script>
        $("#txtCPF").on("blur", function(){
            let cpf_value = $(this).val();
            
            if(jsbrasil.validateBr.cpf(cpf_value)) {
                $("#cpfValido").show();
                $("#cpfInvalido").hide();
            } else {
                $("#cpfInvalido").show();
                $("#cpfValido").hide();
            }
        });
    </script>
    <script type="text/javascript">
        //confirme a senha
        $("form").submit(function(event){
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

            if(!jsbrasil.validateBr.cpf($("#txtCPF").val()))
            {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>