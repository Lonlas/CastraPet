<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Minhas Informações</title>
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
           #container
            {
                display: grid;
                background-color: var(--azul);
                height: auto;
                width: auto;
                border-radius: 5px;
                margin: 10px;
                overflow: hidden;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr 2fr 1fr;
                grid-template-areas: 
                "hello      hello      hello"
                "pessoal1   pessoal2   endereco"
                "button-box button-box button-box";
            }
           #button-box
            {
                display: flex;
                justify-content: left;
                align-items: center;
                align-self: end;
                background-color: var(--preto);
                height: 180px;
                width: auto;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
                grid-area: button-box;
            }
            .btnAnimais
            {
                display: inherit;
                background-color: var(--verde);
                font-size: 1.5em;
                height: 85px;
                font-weight: bold;
                width: 180px;
                border-radius: 5px;
                margin-left: 120px;
                padding: 12px;
                cursor: pointer;
                text-decoration: none;
                text-align: center;
            }
            .btnAnimais:hover
            {
                background-color: var(--verdeclaro);
            }
            
            .btnAnimais:active{
                transform: scale(90%);
            }
            #tbInfoPessoal1
            {
                grid-area: pessoal1;
            }
            #tbInfoPessoal2
            {
                grid-area: pessoal2;
            }
            #tbEndereco
            {
                grid-area: endereco;
                width: 85%;
            }
            #tbInfoPessoal1, #tbInfoPessoal2, #tbEndereco
            {
                margin-left: 30px;
                margin-right: 100px;
            }
            td
            {
                padding: 20px 10px 20px 10px;
                border-top: solid;
                border-bottom: solid;
                border-width: 1px;
            }
            h2
            {
                position: absolute;
                margin-top: -45px;
                font-size: 1.8em;
            }
            table
            {
                width: 90%;
                height: 270px;
                border-spacing: 0px;
                border-collapse: collapse;
                table-layout: auto;
            }
            span
            {
                font-size: 1em;
                font-weight: 600;
            }
            .vazio
            {
                border: 0;
                user-select: none;
            }

            h1
            {
                font-size: 4em;
                margin: 50px 0px 0px 50px;
                grid-area: hello;
            }
            a
            {
                display:none;
            }

            /* Responsividade Nova */

            @media(max-width: 920px)
            {
                body
                {
                    min-height: 0;
                }
                #container
                {
                    max-height: 1250px;
                    width: 100%;
                    grid-template-columns: 100%;
                    grid-template-rows: 1fr 2fr 2fr 2fr 1fr;
                    grid-template-areas:
                    "hello"
                    "pessoal1"
                    "pessoal2"
                    "endereco"
                    "button-box";
                }
                #tbInfoPessoal1, #tbInfoPessoal2, #tbEndereco
                {
                    width: 95%;
                    margin-left: 2%;
                }
                #tbInfoPessoal1
                {
                   
                    align-self: end;
                }
                #tbInfoPessoal1 tr:last-child td
                {
                    border: 0;
                }
                #tbEndereco
                {
                    margin-top: 35px;
                    margin-bottom: 70px;
                }
                h1
                {
                    margin: 40px 0px 40px 30px;
                }
                h2
                {
                    margin-left: 5px;
                }
                .btnAnimais
                {
                    margin-left: 60px;
                }
            }
            @media(max-width: 500px)
            {
                #tbInfoPessoal1, #tbInfoPessoal2, #tbEndereco
                {
                    margin-left: 3%;
                }

                span
                {
                    font-size: 0.9em;
                }
                h1
                {
                    font-size: 2.9em;
                    margin-left: 15px;
                    margin-top: 50px;
                }
                h2
                {
                    font-size: 1.6em;
                }
                .btnAnimais
                {
                    margin-left: 25px;
                    transform: scale(80%);
                }
                .btnAnimais:active
                {
                    transform: scale(70%);
                }
            }
        </style>
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
                <a href="meusAnimais.php" class="btnAnimais">Animais<br/>cadastrados</a>
            </div>
        </div>
    </body>
</html>