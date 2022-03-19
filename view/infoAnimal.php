<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>@NomeAnimal</title>
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
               /*border: 0;*/
               text-align: left;
           }
           body
           {
               display: flex;
               justify-content: center;
               align-items: center;
               min-height: 100vh;
           }
           a{
               display:none;
           }
           #container
           {
               display: grid;
               background-color: var(--azul);
               height: auto;
               width: 1400px;
               overflow: hidden;
               border-radius: 5px;
               margin: 10px;
               grid-template-columns: 1fr 1fr 1fr;
               grid-template-rows: 2fr 1fr;
               grid-template-areas: 
               "tb1         tb2         tb3"
               "button-box  button-box  button-box";
           }
           #button-box
            {
                grid-area: button-box;
                display: flex;
                justify-content: left;
                align-items: center;
                align-self: end;
                background-color: var(--preto);
                height: 180px;
                width: 100%;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
            #btnVoltar
            {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: var(--verde);
                font-size: 1.5em;
                height: 85px;
                font-weight: bold;
                width: 180px;
                border-radius: 5px;
                margin-left: 10%;
                cursor: pointer;
                text-decoration: none;
                text-align: center;
            }
            #btnVoltar:hover
            {
                background-color: var(--verdeclaro);
            }
            #btnVoltar:active
            {
                transform: scale(90%);
            }
            table
            {
                margin: 90px 0px 0px 35px;
                max-height: 10px;
                width: 85%;
                border-spacing: 0;
                border-collapse: collapse;
                table-layout: fixed;
            }
            #tbInfoAnimal1
            {
                grid-area: tb1;
            }
            #tbInfoAnimal2
            {
                grid-area: tb2;
            }
            #tbInfoAnimal3
            {
                grid-area: tb3;
            }
            #tbInfoAnimal3 tr:last-child td
            {
                border: 0;
            }
            span
            {
                font-size: 1em;
                font-weight: 600;
            }
            td
            {
                width: 100%;
                padding: 25px 10px 25px 10px;
                border-top: solid;
                border-bottom: solid;
                border-width: 1px;
            }
            img
            {
                margin-left: 15%;
                max-height: 210px;
                max-width: 260px;
                height: auto;
                width: 75%;
                border-radius: 5px;
            }

            /* Responsividade Nova */

            @media(max-width: 750px)
            {
                body
                {
                    min-height: 0;
                }
                #container
                {
                    grid-template-columns: 100%;
                    grid-template-rows: auto;
                    grid-template-areas: 
                    "tb1"
                    "tb2"
                    "tb3"
                    "button-box";
                }
                table
                {
                    width: 92%;
                    margin: 55px 0px 0px 25px;
                }
                #tbInfoAnimal1
                {
                    margin-top: 100px;
                }
                #tbInfoAnimal2, #tbInfoAnimal3
                {
                    margin-top: 0;
                }
                #tbInfoAnimal1 tr:last-child td, #tbInfoAnimal2 tr:last-child td
                {
                    border: 0;
                }
                img
                {
                    margin-left: 10%;
                }
            }
            
            @media(max-width: 500px)
            {
                span
                {
                    font-size: 0.9em;
                }
                table
                {
                    margin-left: 20px;
                    width: 90%;
                }
                img
                {
                    transform: scale(90%);
                }
                #btnVoltar
                {
                    margin-left: 5%;
                    transform: scale(75%);
                }
                #btnVoltar:active
                {
                    transform: scale(65%);
                }
            }

        </style>
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
                <a href="<?php echo URL.'meusanimais'?>" id="btnVoltar">Voltar</a>
            </div>
        </div>
    </body>
</html>