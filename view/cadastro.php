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
    <?php include_once "menu.php";?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="row gx-3 p-3 ">
                <div class="container bg-white">
                    <form method="post" action="cadastrar-tutor">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-dark bg-dark">
                                <div class="container-fluid">
                                    <span class="text-light" ><h5>CADASTRAR</h5></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr >
                                        <td colspan="2" class="row-mb-3">
                                            <label for="txtNome" class="col-form-label">Nome:</label>
                                            <input  class="form-control" type="text" name="txtNome" id="txtNome" maxlength="70" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="txtEmail">E-mail:</label>
                                            <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <label for="txtCPF">CPF:</label>
                                            <input class="form-control" type="text" name="txtCPF" id="txtCPF" maxlength="14" required>
                                        </td>
                                        <td>
                                            <label for="txtTel">Telefone:</label>
                                            <input class="form-control" type="text" name="txtTel" id="txtTel" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="txtRG">RG:</label>
                                            <input class="form-control" type="text" name="txtRG" id="txtRG" maxlength="12" required>
                                        </td>
                                        <td>
                                            <label for="txtCelular">Celular:</label>
                                            <input class="form-control" type="text" name="txtCelular" id="txtCelular" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                            <label for="chkProtetor">Sou protetor de animais</label>
                                            &nbsp;
                                            <input type="button" value="Fazer upload" name="btnProtetorUpload">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                            <label for="chkNIS">Tenho o benefício do NIS</label>
                                            <input class="form-control" type="text" name="txtNIS" id="txtNIS">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 float-md-end mb-3 ms-md-3">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th colspan="2"><h5>Endereço</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="txtCEP">CEP:</label>
                                            <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                        </td>
                                        <td>
                                            <label for="txtNumero">Número</label>
                                            <input class="form-control" type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="txtBairro">Bairro:</label>
                                            <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="txtRua">Rua:</label>
                                            <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <label for="txtSenha">Crie uma senha:</label>
                                            <input class="form-control" type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="txtConfirmaSenha">Confirme sua senha:</label>
                                            <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!--<div class="col">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="txtSenha">Crie uma senha:</label>
                                            <input type="password" name="txtSenha" id="txtSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="txtConfirmaSenha">Confirme sua senha:</label>
                                            <input type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" maxlength="40" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>-->
                    </div>
                    <div class="row text-right">
                        <div class="col-md-12 mb-3 ms-md-3">
                            <table>
                                <tbody>
                                    <tr>
                                        <!--<td>
                                            <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                            <label for="chkProtetor">Sou protetor de animais</label>
                                            &nbsp;
                                            <input type="button" value="Fazer upload" name="btnProtetorUpload">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                            <label for="chkNIS">Tenho o benefício do NIS</label>
                                            <input type="text" name="txtNIS" id="txtNIS">
                                        </td>-->
                                        <td class="justify-content-md-end">
                                            <input type="submit" class="btn btn-success" value="Cadastrar">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>       
                    </div>  
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'inicio'; ?>">Voltar</a>
        </footer>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
</body>
</html>