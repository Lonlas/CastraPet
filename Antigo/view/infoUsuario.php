<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Minhas Informações</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/infoUsuario.css">
    </head>
    <body>
        <div id="container">
            <table border="0" id="tbInfoPessoal1">
                <h1>Olá, @---</h1>
                <tbody>
                    <tr>
                        <td><span>Nome: @---</span></td>
                    </tr>
                    <tr>
                        <td><span>RG: 00.000.000-0</span></td>
                    </tr>
                    <tr>
                        <td><span>CPF: 000.000.000-00</span></td>
                    </tr>
                    <tr>
                        <td><span>Benefício: Protetor de Animais/CRAS</span></td>
                    </tr>
                </tbody>
            </table>
            <table id="tbInfoPessoal2">
                <tbody>
                    <tr>
                        <td><span>Telefone: (00) 0000-0000</span></td>
                    </tr>
                    <tr>
                        <td><span>Celular: (00) 90000-0000</span></td>
                    </tr>
                    <tr>
                        <td><span>E-mail: emailexemplo@gmail.com</span></td>
                    </tr>
                    <tr>
                        <td class="vazio">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table id="tbEndereco">
                <thead>
                    <tr>
                        <th><h2>Endereço:</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>CEP: 00000-000</span></td>
                    </tr>
                    <tr>
                        <td><span>Número: 000</span></td>
                    </tr>
                    <tr>
                        <td><span>Bairro: Bairro Exemplo</span></td>
                    </tr>
                    <tr>
                        <td><span>Rua: Avenida de Exemplo</span></td>   
                    </tr>
                </tbody>
            </table>
            <div id="button-box">
                <a href="<?php echo URL.'meus-animais'?>" class="btnAnimais">Animais<br/>cadastrados</a>
            </div>
        </div>
    </body>
</html>