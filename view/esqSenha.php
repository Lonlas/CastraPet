<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Esqueci a Senha</title>
        <!--<meta name="description" content="Descrição do conteúdo da página"/>-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <style type="text/css">
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            :root{
            --azul:#0281c6;
            --azulclaro:#00aff0;
            --azulmaisclaro: #42c0ee;
            --verde:#00b48c;
            --verdeclaro:#5edabf;
            --amarelo:#f8b32a;
            --vermelho:#ed323d;
            --vermelhoclaro: #ff767f;
            --preto:#282828;
            --margem: 15px;
            --tamanhoquadrado:700px;
            --borderradius:5px;
            }
            *{
                margin: 0;
                box-sizing: border-box;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                line-height: 1.5;
            }
            #caixa{
                margin: 5px;
                height: var(--tamanhoquadrado);
                width: var(--tamanhoquadrado);
                background: var(--azulclaro);
                display: grid;
                grid-template-areas:'i i'
                                    'n s'
                                    'b b';
                grid-template-columns: 50% 50%;
                grid-template-rows: 65fr 5fr 30fr;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                border-radius: var(--borderradius);
                overflow: hidden;
            }
            #inputs{grid-area: i;
                margin: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #esqlink{grid-area: s;}
            #nplink{grid-area: n;}
            #boxbtn{
                height: 100%;
                grid-area: b;  
                background: var(--preto);
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .btnloga{
                height: 80px;
                width: 200px;
                font-size: 2em;
                background: var(--verde);
                margin: 0 20px;
            }
            .btnloga:hover{
                cursor: pointer;
                background: var(--verdeclaro);
            }
            .btnloga:active{
                transform: scale(90%);
            }
            input{
                border: none;
                border-radius: var(--borderradius);
            }
            ::placeholder{
                font-weight:300;
            }
            td{
                align-items: center;
            }
            #inputcpf,#inputemail{
                padding: 0 50px 0 10px;
                font-size: 30px;
                background: white;
                color: var(--preto);
                width: auto;
                height: 50px;
                text-align: center;
            }
            #inputcpf:focus,#inputemail:focus{
                background: rgb(210,210,210);
                outline: none;
            }
            #inputemail::before{
                content:'';
            }
            label, .btnloga, input, #esqlink, #nplink{
                color: white;
                font-family: 'Montserrat';
                font-weight: 600;
            }
            label{
                font-size: 25px;
            }
            ::-webkit-inner-spin-button,
            ::-webkit-outer-spin-button{
                display: none;
            }
            ion-icon{
                position: relative;
                color: var(--preto);
                font-size: 1.5em;
                right: 40px;
            }
            #esqlink, #nplink{
                display: inline!important;
                color: var(--verdeclaro);
                font-size: 20px;
                justify-self: center;
                text-align: center;
            }
            a{
                display:none;
            }
            @media screen and (max-width: 700px){
                #esqlink, #nplink{
                    font-size:15px;
                }
                #inputcpf,#inputemail{
                    padding: 0 50px 0 10px;
                    font-size: 30px;
                    background: white;
                    color: var(--preto);
                    width: 100%;
                    height: 50px;
                }
                .btnloga{
                    height: 50px;
                    width: 150px;
                    font-size: 1.5em;
                }
                #caixa{
                    height:calc(var(--tamanhoquadrado) - 200px);
                }
            }
        </style>
    </head>
    <body>
        <form id="caixa" action="index.php" method="POST">
            <table id="inputs">
                <tr>
                    <td>
                        <label for="inputemail">E-mail de recuperação</label><br>
                        <input type="email" id="inputemail" name="senha">
                        <!--<ion-icon name="eye"></ion-icon>-->
                    </td>
                </tr>    
            </table>
                <a href="cadastro.php" id="nplink">Não possuo uma conta</a>
            <div id="boxbtn">
                <input type="submit" name="btnlogin" class="btnloga" value="Voltar">
                <input type="submit" name="btnlogin" class="btnloga" value="Enviar">
            </div>
        </form>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>