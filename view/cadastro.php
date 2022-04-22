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
                    <div class="row">
                        <div class="col-6 float-md-end mb-3 ms-md-3">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="row-mb-1">
                                            <label for="txtNome" class="col-form-label">Nome:</label>
                                        </td>
                                        <td colspan="3" class="row-mb-5">
                                            <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="row-mb-2">
                                            <label for="txtEmail">Email:</label>
                                        </td> 
                                        <td colspan="3" class="row-mb-5"> 
                                            <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td class="row-mb-1">
                                            <label for="txtCPF">CPF:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" required>
                                        </td>
                                        <td class="row-mb-1">
                                            <label for="txtTel">Telefone:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtTel" id="txtTel" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="row-mb-1">
                                            <label for="txtRG">RG:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" required>
                                        </td>
                                        <td class="row-mb-1">
                                            <label for="txtCelular">Celular:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtCelular" id="txtCelular" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="row-mb-3">
                                            <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                            <label for="chkProtetor">Sou protetor de animais</label>
                                        </td>
                                        <td colspan="2" class="row-mb-3">
                                            &nbsp;
                                            <input class="btn btn-success" type="button" value="Fazer upload" name="btnProtetorUpload">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="row-mb-3">
                                            <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                            <label for="chkNIS">Tenho o benefício do NIS</label>
                                        </td>
                                        <td colspan="2" class="row-mb-3">
                                            <input class="form-control" type="text" name="txtNIS" id="txtNIS">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 float-md-end mb-3 ms-md-3">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th colspan="4"><h5>Endereço</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="row-mb-1">
                                            <label for="txtCEP">CEP:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                        </td>
                                        <td class="row-mb-1">
                                            <label for="txtNumero">Número:</label>
                                        </td>
                                        <td class="row-mb-2">
                                            <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="row-mb-2">
                                            <label for="txtBairro">Bairro:</label>
                                        </td>
                                        <td colspan="3" class="row-mb-4">
                                            <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="row-mb-2" >
                                            <label for="txtRua">Rua:</label>
                                        </td>
                                        <td colspan="3" class="row-mb-4">
                                            <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="row-mb-2">
                                            <label for="txtSenha">Crie uma senha:</label>
                                        </td>
                                        <td colspan="3" class="row-mb-4">
                                            <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="row-mb-2">
                                            <label for="txtConfirmaSenha">Confirme sua senha:</label>
                                        </td>
                                        <td colspan="2" class="row-mb-4">
                                            <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4 ms-md-3 text-right">
                            <input type="submit" class="btn btn-success justify-content-md-end col-2 mx-auto" value="Cadastrar">
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
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>