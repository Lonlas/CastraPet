<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login - Castra Pet</title>
        <!--<meta name="description" content="Descrição do conteúdo da página"/>-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/login.css">
    </head>
    <body>
        <form id="caixa" action="<?php echo URL.'inicio'?>" method="POST">
            <table id="inputs">
                <tr>
                    <td>
                    <label for="inputcpf">CPF</label><br>
                    <input type="text" placeholder="00000000000" id="inputcpf" name="cpf">   
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="inputsenha">Senha</label><br>
                        <input type="password" id="inputsenha" name="senha">
                        <!--<ion-icon name="eye"></ion-icon>-->
                    </td>
                </tr>    
            </table>
                <a href="<?php echo URL.'cadastro';?>" id="nplink">Não possuo uma conta</a>
                <a href="<?php echo URL.'esqueci-a-senha';?>" id="esqlink">Esqueci a senha</a>
            <div id="boxbtn">
                <input type="submit" name="btnlogin" id="btnloga" value="Entrar">
            </div>
        </form>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>