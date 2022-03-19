<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Esqueci a Senha</title>
        <!--<meta name="description" content="Descrição do conteúdo da página"/>-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/esqSenha.css">
    </head>
    <body>
        <form id="caixa" action="<?php echo URL.'inicio'?>" method="POST">
            <table id="inputs">
                <tr>
                    <td>
                        <label for="inputemail">E-mail de recuperação</label><br>
                        <input type="email" id="inputemail" name="senha">
                        <!--<ion-icon name="eye"></ion-icon>-->
                    </td>
                </tr>    
            </table>
                <a href="<?php echo URL.'cadastro';?>" id="nplink">Não possuo uma conta</a>
            <div id="boxbtn">
                <a href="<?php echo URL.'inicio';?>" name="btnlogin" class="btnloga" value="Voltar">Voltar</a>
                <input type="submit" name="btnlogin" class="btnloga" value="Enviar">
            </div>
        </form>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>