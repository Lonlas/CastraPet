<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">

</head>
<body>
    <!-- CORPO -->
        <?php include_once "menuADM.php";?>

        <div class="container-fluid">
        <div class="bg-danger">
            <div class="row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Cadastrar Clínica
                </div>
                <div class="container bg-white p-0">
                    <form action="cadastrar-clinica" class="p-sm-2 py-sm-3 p-md-3 p-lg-4 py-3" method="POST">
                        <div class="container row m-0">
                            <div class="col-6">
                                <div class="form-group row-3">
                                    <label for="txtNome">Nome:</label>
                                    <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtEmail">E-mail:</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtCNPJ">CNPJ:</label>
                                    <input type="text" id="txtCNPJ" name="txtCNPJ" class="form-control" placeholder="" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtTelefone">Telefone:</label>
                                            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtVagas">Vagas:</label>
                                            <input type="number" id="txtVagas" name="txtVagas" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtCEP">CEP:</label>
                                            <input type="number" id="txtCEP" name="txtCEP" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtNumero">Número:</label>
                                            <input type="number" id="txtNumero" name="txtNumero" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div> 
                                    <div class="form-group">
                                        <label for="txtBairro">Bairro:</label>
                                        <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtRua">Rua:</label>
                                        <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtSenha">Crie uma Senha:</label>
                                        <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtConfSenha">Confirme a Senha</label>
                                        <input type="password" id="txtConfSenha" name="txtConfSenha" class="form-control" placeholder="" required>
                                    </div>
                            </div>
                        </div>
                        <div class="row ">
                            <input type="submit" class="btn btn-success align-center mx-auto" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'inicio'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
</body>
</html>