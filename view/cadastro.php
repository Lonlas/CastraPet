<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastro de Usuario</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/cadastro.css">
    </head>
    <body>
        <div id="container">
            <center>
            <form action="<?php echo URL.'inicio'?>" method="POST">
                <table border="0">
                    <tr>
                        <td colspan="3"><h1>Cadastro de Usuário</h1></td>
                    </tr>
                    <tr>
                        <td class="span-subject"><span>Documentos:</span></td>
                        <td colspan="2"><input type="text" name="txtNome" id="txtNome" placeholder="Nome" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td class="vazio">&nbsp;</td>
                        <td><input type="text" name="txtRG" id="txtRG" placeholder="RG"/></td>
                        <td><input type="text" name="txtCPF" id="txtCPF" placeholder="CPF"/></td>
                    </tr>
                    <tr>
                        <td class="span-subject"><span>Benefícios:</span></td>
                        <td><input type="checkbox" name="chkCras" class="chkForm" id="cras"/><label for="cras">Possuo benefício<br/>social (CRAS)</label></td>
                        <td><input type="checkbox" name="chkProtetor" class="chkForm" id="protetor"/><label for="protetor">Sou protetor<br/>de animais</label></td>
                    </tr>
                    <tr>
                        <td class="span-subject"><span>Endereço:</span></td>
                        <td><input type="text" name="txtCEP" id="txtCEP" placeholder="CEP"/></td>
                        <td><input type="text" name="txtNum" id="txtNum" placeholder="Número"/></td>
                    </tr>
                    <tr>
                        <td class="vazio">&nbsp;</td>
                        <td colspan="2"><input type="text" name="txtBairro" id="txtBairro" placeholder="Bairro"/></td>
                    </tr>
                    <tr>
                        <td class="vazio">&nbsp;</td>
                        <td colspan="2"><input type="text" name="txtRua" id="txtRua" placeholder="Rua"/></td>
                    </tr>
                    <tr>
                        <td class="span-subject"><span>Contato:</span></td>
                        <td><input type="text" name="txtTel" id="txtTel" placeholder="Telefone"/></td>
                        <td><input type="text" name="txtCel" id="txtCel" placeholder="Celular"/></td>
                    </tr>
                    <tr>
                        <td class="vazio">&nbsp;</td>
                        <td colspan="2"><input type="email" name="emlEmail" id="emlEmail" placeholder="E-mail" maxlength="70"/></td>
                    </tr>
                </table> 
                <div id="button-box">
                    <input type="submit" name="btnAvancar" id="btnAvancar" value="Cadastrar">
                </div>
            </form>    
        </div>
        </center>
    </body>
</html>