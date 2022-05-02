<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">

</head>
<body>
    <!-- CORPO -->
    <?php include_once "menu.php";?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    CADASTRAR
                </div>
                <div class="container bg-white">
                    <form method="post" action="cadastrar-tutor">
                    <div class="row m-0 align-items-center">
                        <div class="col-md-6 mb-4 align-self-center">
                            <div class="form-group row-6 mb-3">
                                <label for="txtNome" class="col-form-label">Nome:</label>
                                <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                            </div>
                            <div class="form-group row-6 mb-3">
                                <label for="txtEmail">Email:</label>
                                <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-6">
                                    <label for="txtCPF">CPF:</label>
                                    <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="txtTel">Telefone:</label>
                                    <input class="form-control" type="text" name="txtTel" id="txtTel" maxlength="15">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-6">
                                    <label for="txtRG">RG:</label>
                                    <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="txtCelular">Celular:</label>
                                    <input class="form-control" type="text" name="txtCelular" id="txtCelular" maxlength="15">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-6">
                                    <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                    <label for="chkNIS">Tenho o benefício do NIS</label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" type="text" name="txtNIS" id="txtNIS">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                <label for="chkProtetor">Sou protetor de animais</label>
                                &nbsp;
                                <input class="btn btn-success" type="button" value="Fazer upload" name="btnProtetorUpload">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 align-self-center justify-content-evenly">
                            <div class="row mb-3">
                                <div class="form-group col-6">
                                    <label for="txtCEP">CEP:</label>
                                    <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                </div>
                                <div class="form-group col-6">
                                    <label for="txtNumero">Número:</label>
                                    <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txtBairro">Bairro:</label>
                                <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txtRua">Rua:</label>
                                <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txtSenha">Crie uma senha:</label>
                                <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="txtConfirmaSenha">Confirme sua senha:</label>
                                <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                            </div>
                            <div class="row mb-1">
                                <div class="col-9"></div>
                                <div class=" form-group col-3">
                                    <input type="submit" class="btn btn-success" value="Cadastrar">
                                </div>        
                            </div>
                        </div>     
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'login'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>