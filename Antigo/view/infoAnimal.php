<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>@NomeAnimal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/infoAnimal.css">
    </head>
    <body>
        <div id="container">
            <table id="tbInfoAnimal1">
                <tbody>
                    <tr>
                        <td><span>Nome: @Animal--</span></td>
                    </tr>
                    <tr>
                        <td><span>Espécie: Canina/Felina</span></td>
                    </tr>
                    <tr>
                        <td><span>Sexo: Mach/Fem</span></td>
                    </tr>
                    <tr>
                        <td><span>Idade: 5</span></td>
                    </tr>
                </tbody>
            </table>
            <table id="tbInfoAnimal2">
                <tbody>
                    <tr>
                        <td><span>Cor: Cor Exemplo</span></td>
                    </tr>
                    <tr>
                        <td><span>Raça: Raça Exemplo</span></td>
                    </tr>
                    <tr>
                        <td><span>Porte: Peq/Med/Gra</span></td>
                    </tr>
                    <tr>
                        <td><span>Pelagem: Cur/Med/Alt</span></td>
                    </tr>
                </tbody>
            </table>
            <table id="tbInfoAnimal3">
                <tbody>
                    <tr>
                        <td><span>Animal Comunitário: Sim/Não</span></td>
                    </tr>
                    <tr>
                        <td><span>Foto do Animal:</span></td>
                    </tr>
                    <tr>
                        <td><img src="recursos/img/imagem_exemplo.jpg" alt="imagem de exemplo"/></td>
                    </tr>
                </tbody>
            </table>
            <div id="button-box">
                <a href="<?php echo URL.'meus-animais'?>" id="btnVoltar">Voltar</a>
            </div>
        </div>
    </body>
</html>