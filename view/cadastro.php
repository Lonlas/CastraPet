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
                        <form method="post" class="row p-sm-3 p-md-3 p-lg-4 p-3" action="cadastrar-tutor">
                            <div class="col-lg-6 mb-lg-0 mb-5">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="form-label">Nome:</label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:</label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF" class="form-label">CPF:</label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel" maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG" class="form-label">RG:</label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular" class="form-label">Celular:</label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular" maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                        <label for="chkNIS" class="form-label">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="text" name="txtNIS" id="txtNIS" placeholder="Número do NIS" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                        <label for="chkProtetor" class="form-label">Sou protetor de animais</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="btn btn-success" type="button" value="Fazer upload" name="btnProtetorUpload">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:</label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:</label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro" class="form-label">Bairro:</label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua" class="form-label">Rua:</label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtSenha" class="form-label">Crie uma senha:</label>
                                    <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtConfirmaSenha" class="form-label">Confirme sua senha:</label>
                                    <input class="form-control" type="password" onchange="confirmasenha()" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                    <div class="text-danger" id="senhaigual" style="display:none;">Senha não é igual*</div>
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
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    
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
                $('#btnProtetor').prop('disabled', false);
            } 
            else 
            {
                $('#btnProtetor').prop('disabled', true);
            }
        });
    </script>
    <script>
       /* function confirmasenha()
        {

            var confirmaSenha = document.getElementById("txtConfirmaSenha");
            var senha = document.getElementById("txtSenha");
            var erro = document.getElementById("senhaigual");
            if(confirmaSenha.value == senha.value)
            {
                erro.style = "display:none;";
            }
            else{
                erro.style = "display:inline;";
                event.preventDefault();
            }
        }*/
    </script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>