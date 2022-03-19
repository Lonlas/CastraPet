<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastro de Usuario</title>
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
                border: 0;
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
                margin: 10px;
                overflow: hidden;
                height: auto;
                width: 950px;
                border-radius: 5px;
            }
            #button-box
            {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: var(--preto);
                padding: 50px 0px 50px 0px;
                height: auto;
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
            .chkForm:not(:checked), .chkForm:checked 
            {
                display: none;
            }
            .chkForm + label
            {
                display: inline-block;
                background-color: var(--verde);
                height: 100%;
                padding: 5px 0px 5px 0px;
                width: 100%;
                border: solid;
                border-color: white;
                border-radius: 5px;
                font-size: 1.3em;
                font-weight: 600;
                cursor: pointer;
                text-align: center;
            }
            .chkForm:checked + label 
            {
                border-color: black;
                color: black;
                background-color: var(--verdeclaro);
            }
            label
            {
                user-select: none;
                padding: 2px;
            }

            table
            {
                width: 100%;
                height: 100%;
                padding: 50px;
            }
            span
            {
                font-size: 1.34em;
                font-weight: 600;
            }
            input
            {
                height: 48px;
                width: 100%;
                border-radius: 3px;
                color: black;
                padding: 3px;
                font-size: 1.2em;
            }

            input::-webkit-input-placeholder
            {
                font-size: 1.1em;
            }
            h1
            {
                text-align: center;
                height: 80px;
            }
            td
            {
                padding: 2px;
            }
            .vazio
            {
                user-select: none;
            }
            a{
                display:none;
            }

            /* Responsividade Antiga */

            /*
            @media screen and (max-width:652px) 
            {
                .chkForm + label{
                    height: 90px;
                }
            }
            @media screen and (max-width:559px) 
            {
                .chkForm + label{
                    height: 115px;
                }
            }
            @media screen and (max-width:500px) 
            {
                #container
                {
                    transform: scale(65%);
                    width: 600px;
                    height: 600px;
                }
                .chkForm + label{
                    font-size: 1em;
                    height: 50px;
                }
                span
                {
                    font-size: 1em;
                }
                input
                {
                    height: 30px;
                }
                input::-webkit-input-placeholder
                {
                    font-size: 0.9em;
                }
                h1
                {
                    text-align: center;
                    height: 100px;
                }
                table
                {
                    width: 500px;
                    height: 100%;
                    padding: 20px;
                }
                #botao
                {
                    height: 150px;
                }
                #btnAvancar
                {
                    transform: scale(90%);
                }
                #btnAvancar:active{
                    transform: scale(80%);
                }
            }
            @media screen and (max-width:320px)
            {
                #container
                {
                    transform: scale(60%);
                }
            }
            */
            
            /* Responsividade Nova */

            @media(max-width: 550px)
            {
                td, tr
                {
                    display: block;
                }
                .vazio
                {
                    display: none;
                }
                .span-subject
                {
                    margin: 20px 0px 0px 0px;
                }
                table
                {
                    padding: 20px;
                }
                h1
                {
                    margin-bottom: -10px;
                    margin-top: 20px;
                }
                input
                {
                    height: 38px;
                    font-size: 1em;
                }
                input::-webkit-input-placeholder
                {
                    font-size: 1em;
                }
                .chkForm + label
                {
                    height: auto;
                    padding: 5px 0px 5px 0px;
                    font-size: 1em;
                }
                span
                {
                    font-size: 1.2em;
                }
                #btnAvancar
                {
                    transform: scale(85%);
                }
                #btnAvancar:active{
                    transform: scale(75%);
                }
            }
        </style>
    </head>
    <body>
        <div id="container">
            <center>
            <form action="index.php">
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
                    <button name="btnAvancar" id="btnAvancar">Cadastrar</button>
                </div>
            </form>    
        </div>
        </center>
    </body>
</html>