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
    <div class="container">
        <form method="post" action="#">
            <h1>CADASTRAR</h1>
            <table>
                <tbody>
                    <tr colspan="2">
                        <td>
                            <label for="txtNome">Nome:</label>
                            <input type="text" name="txtNome" id="txtNome" maxlength="70" required>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td>
                            <label for="txtEmail">E-mail:</label>
                            <input type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label for="txtCPF">CPF:</label>
                            <input type="text" name="txtCPF" id="txtCPF" maxlength="14" required>
                        </td>
                        <td>
                            <label for="txtTel">Telefone:</label>
                            <input type="text" name="txtTel" id="txtTel" maxlength="15">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="txtRG">RG:</label>
                            <input type="text" name="txtRG" id="txtRG" maxlength="12" required>
                        </td>
                        <td>
                            <label for="txtCelular">Celular:</label>
                            <input type="text" name="txtCelular" id="txtCelular" maxlength="15" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th><h2>Endereço</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label for="txtCEP">CEP:</label>
                            <input type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                        </td>
                        <td>
                            <label for="txtNumero">Número</label>
                            <input type="text" name="txtNumero" id="txtNumero" maxlength="5" required>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td>
                            <label for="txtBairro">Bairro:</label>
                            <input type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td>
                            <label for="txtRua">Rua:</label>
                            <input type="text" name="txtRua" id="txtRua" maxlength="50" required>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <table>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" name="chkProtetor" id="chkProtetor">
                            <label for="chkProtetor">Sou protetor de animais</label>
                            &nbsp;
                            <input type="button" value="Fazer upload" name="btnProtetorUpload">
                        </td>
                        <td>
                            <input type="checkbox" name="chkNIS" id="chkNIS">
                            <label for="chkNIS">Tenho o benefício do NIS</label>
                            <input type="text" name="txtNIS" id="txtNIS" disabled>
                        </td>
                        <td>
                            <input type="submit" value="Cadastrar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div>
            <a href="#">Voltar</a>
        </div>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
</body>
</html>