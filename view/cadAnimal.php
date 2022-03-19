<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastro do Animal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <style type="text/css">
             @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            :root
            {
                --azul:#00aff0;
                --azulclaro:#0281c6;
                --verde:#00b48c;
                --verdeclaro:#5edabf;
                --amarelo:#f8b32a;
                --vermelho:#ed323d;
                --preto:#282828;
            }
            *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                color: white;
                font-family: 'Montserrat', Verdana, Arial, Helvetica, sans-serif;
            }
            body
            {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            #container
            {
                background-color: var(--azul);
                height: auto;
                width: 950px;
                border-radius: 5px;
                overflow: hidden;
                margin: 10px;
            }
            #button-box
            {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: var(--preto);
                height: 180px;
                width: 100%;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
            #btnAvancar
            {
                background-color: var(--verde);
                font-size: 1.6em;
                height: 70px;
                font-weight: bold;
                width: 200px;
                border: 0;
                border-radius: 5px;
                cursor: pointer;
            }
            #btnAvancar:hover
            {
                background-color: var(--verdeclaro);
            }
            #btnAvancar:active{
                transform: scale(90%);
            }
            .rdbForm:not(:checked), .rdbForm:checked, #img 
            {
                display: none;
            }
            .rdbForm + label
            {
                display: inline-block;
                background-color: var(--verde);
                height: 40px;
                width: 100px;
                border: solid;
                padding: 7px 0px 7px 0px;
                border-color: white;
                border-radius: 5px;
                font-size: 1em;
                font-weight: 600;
                cursor: pointer;
                text-align: center;
            }
            .rdbForm:checked + label 
            {
                border-color: black;
                color: black;
                background-color: var(--verdeclaro);
            }
            label
            {
                display: flex;
                user-select: none;
            }
            input[type="text"], #numidade
            {
                height: 40px;
                width: 100%;
                border-radius: 3px;
                color: black;
                padding: 3px;
                font-size: 1em;
                border: 0;
            }

            input::-webkit-input-placeholder
            {
                font-size: 1em;
            }

            span
            {
                font-size: 1.34em;
                font-weight: 600;
            }
            table
            {
                width: 100%;
                height: auto;
                padding: 50px 20px 50px 20px;
            }
            h1
            {
                text-align: center;
                height: 75px;
            }
            td
            {
                padding-top: 7px;
            }
            tr td:first-child
            {
                width: 300px;
            }
            /*
            .imgEx
            {
                text-align: center;
                background-color: white;
                color: gray;
                height: 95px;
                width: 110px;
                border-radius: 5px;
                padding-top: 10px;
                user-select: none;
            }
            */
            img
            {
                height: auto;
                width: 120px;
                border-radius: 5px;
            }
            #numidade::-webkit-inner-spin-button, ::-webkit-outer-spin-button
            {
                display: none;
            }
            #img + label
            {
                display: inline-block;
                background-color: var(--verde);
                height: 50px;
                width: 200px;
                border: solid;
                border-color: white;
                border-radius: 5px;
                font-size: 1.1em;
                font-weight: 600;
                cursor: pointer;
                text-align: center;
            }
            #fileImgText
            {
                padding-top: 10px;
            }
            a{
                display:none;
            }

            /* Responsividade Antiga */

            /*
            @media screen and (max-width: 600px)
            {
                #container
                {
                    transform: scale(70%);
                }
            }
            @media screen and (max-width: 414px)
            {
                #container
                {
                    transform: scale(55%) !important;
                }
                body
                {
                    margin-top: -140px;
                    margin-bottom: -300px;
                }
            }
            @media screen and (max-width: 280px)
            {
                #container
                {
                    transform: scale(45%) !important;
                }
            }
            */

            /* Responsividade Nova */

            @media(max-width: 740px)
            {
                body
                {
                    min-height: 0;
                }
                table
                {
                    padding: 20px;
                    max-width: auto;
                }
                td
                {
                    display: block;
                    padding-bottom: 10px;
                    width: 100% !important;
                }
                .span-subject
                {
                    padding: 0;
                    margin-top: 7px;
                    margin-bottom: -5px;
                }

                td input + label
                {
                    float: left;
                    margin-right: 7px;
                }
                tr:nth-last-child(3)
                {
                    margin-top: 30px;
                    display: grid;
                    align-items: center;
                    
                }
            }

            @media(max-width: 445px)
            {
                h1
                {
                    margin-bottom: -15px;
                    font-size: 1.75em;
                }
                input[type="text"], #numidade
                {
                    height: 38px;
                    font-size: 0.8em;
                }
                span
                {
                    font-size: 1em;
                }
                .rdbForm + label
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 30px;
                    width: 80px;
                    font-size: 0.8em;
                }
                #img + label
                {
                    height: 40px;
                    width: 150px; 
                    font-size: 0.8em;
                }
                #btnAvancar
                {
                    transform: scale(85%);
                }
                #btnAvancar:active
                {
                    transform: scale(75%);
                }
            }

            @media(max-width: 330px)
            {
                tr:nth-child(7) .rdbForm + label, tr:nth-child(8) .rdbForm + label
                {
                    float: none;
                    margin-top: 5px;
                }
            }
        </style>
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
                                <img src="view/Documentos/imagem_exemplo.jpg" alt="imagem de exemplo"/>
                                <img src="view/Documentos/imagem_exemplo.jpg" alt="imagem de exemplo"/>
                                <img src="view/Documentos/imagem_exemplo.jpg" alt="imagem de exemplo"/>
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