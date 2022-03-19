<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastro do Animal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/cadAnimal.css">
    </head>
    <body>
        <div id="container">
            <center>
                <form action="<?php echo URL.'inicio'?>" method="POST">
                    <table border="0">
                        <tr>
                            <td colspan="4"><h1>Informações do Animal</h1></td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Nome:</span></td>
                            <td colspan="3"><input type="text" name="txtNomeAni" id="txtNomeAni" maxlength="30" placeholder="Nome"/></td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Espécie:</span></td>
                            <td>
                                <input type="radio" name="rdbEspecie" class="rdbForm" id="canina"/><label for="canina">Canina</label>
                                <input type="radio" name="rdbEspecie" class="rdbForm" id="felina"/><label for="felina">Felina</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Sexo:</span></td>
                            <td>
                                <input type="radio" name="rdbSexo" class="rdbForm" id="macho"/><label for="macho">Macho</label>
                                <input type="radio" name="rdbSexo" class="rdbForm" id="femea"/><label for="femea">Fêmea</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Cor:</span></td>
                            <td colspan="3"><input type="text" name="txtCor" id="txtCor" placeholder="Coloração do animal"/></td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Raça:</span></td>
                            <td colspan="3"><input type="text" name="txtRaca" id="txtRaca" placeholder="Digite S.R.D caso não tenha uma raça definida"/></td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Porte:</span></td>
                            <td>
                                <input type="radio" name="rdbPorte" class="rdbForm" id="pequeno"/><label for="pequeno">Pequeno</label>
                                <input type="radio" name="rdbPorte" class="rdbForm" id="medio"/><label for="medio">Médio</label>
                                <input type="radio" name="rdbPorte" class="rdbForm" id="grande"/><label for="grande">Grande</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Pelagem:</span></td>
                            <td>
                                <input type="radio" name="rdbPelo" class="rdbForm" id="curta"/><label for="curta">Curta</label>
                                <input type="radio" name="rdbPelo" class="rdbForm" id="media"/><label for="media">Média</label>
                                <input type="radio" name="rdbPelo" class="rdbForm" id="alta"/><label for="alta">Alta</label>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="file" name="fileFotoAni" id="img" accept="image/*"/><label id="fileImgText" for="img">Imagem do Animal</label></td>
                            <td>
                                <img src="recursos/img/imagem_exemplo.jpg" alt="imagem de exemplo"/>
                                <img src="recursos/img/imagem_exemplo.jpg" alt="imagem de exemplo"/>
                                <img src="recursos/img/imagem_exemplo.jpg" alt="imagem de exemplo"/>
                            </td>
                            <!--
                            <td><div class="imgEx">Imagem de Exemplo</div></td>
                            <td><div class="imgEx">Imagem de Exemplo</div></td>
                            <td><div class="imgEx">Imagem de Exemplo</div></td>
                            -->
                        </tr>
                        <tr>
                            <td class="span-subject"><span>Anos de idade:</span></td>
                            <td colspan="3"><input type="number" name="numIdade" id="numidade" placeholder="1, 2, 3..." min="0" max="99"/></td>
                        </tr>
                        <tr>
                            <td class="span-subject"><span>O animal é comunitário?</span></td>
                            <td colspan="3"><input type="radio" name="rdbComun" class="rdbForm" id="sim"/><label for="sim">Sim</label>&nbsp;<input type="radio" name="rdbComun" class="rdbForm" id="nao"/><label for="nao">Não</label></td>
                        </tr>
                    </table>
                    <div id="button-box">
                        <input type="submit" name="btnAvancar" id="btnAvancar" value="Cadastrar">
                    </div>
                </form>
            </center>
        </div>
    </body>
</html>