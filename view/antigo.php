<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Castra Pet</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
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
                --preto:#282828;
                --margem: 15px;
            }
            *{
                margin: 0;
                font-family: 'Montserrat',arial;
                font-weight: 600;
                box-sizing: border-box;
            }
            h1{
                font-size: 30px;    
            }
            body{
                min-height: 100vh;
                background: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            #header{grid-area: h;}
            #navbar{grid-area: n;}
            #login{grid-area: l;}
            #sidebar{grid-area: s;}
            #corpo{grid-area: c;}
            #footer{grid-area: f;}
            .container{
                margin: 10px !important;
                min-height: 100%;
                max-width: 1000px !important;
                display: grid;
                grid-template-areas:'h h h h'
                                    'n n n l'
                                    's c c c'
                                    'f f f f';
                grid-template-columns: 20fr 20fr 20fr 9fr !important;
                grid-template-rows: 130px 60px minmax(630px, auto) minmax(100px, auto) !important;
                
                background-color: white;
            }
            div{    
                color: white;
            }
            .box{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                overflow: hidden;
                padding: 20px;
                line-height: 1.5;
            }
            #header{
                margin: 0 0 var(--margem) 0;
                background: var(--azulclaro);
            }
            .navbox{padding: 0 !important;}
            #navbar{
                margin: 0 var(--margem) 0 0;
                background: var(--azul);
            }
            #navbuttons{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%; 
            }
            .navbutton{
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                height: 100%;
                padding: 0 15px;
                margin: 0 5px;
                
                background-color: var(--azulclaro);
                text-decoration: none;
            }
            .navbutton:hover{
                background: var(--azulmaisclaro);
            }
            #login{
                text-decoration: none;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #sidebar{
                margin: var(--margem) var(--margem) var(--margem) 0;
                background: var(--vermelho);
            }
            #corpo{
                margin: var(--margem) 0 var(--margem) 0;
                background: var(--amarelo);
            }
            #footer{
                margin: 0 0 0 0;
                background: var(--preto);
            }
            #botao{
                display: flex !important;
                justify-content: center;
                text-align: center;           
                align-items: center;
                color: white;
                background: var(--verde);
                height: 100%;
                width: 100%;
                text-decoration: none;
            }
            #botao:hover{
                background: var(--verdeclaro);
            }
            #botao:active{
                transform: scale(90%);
            }
            a{
                display:none;
                color: white;
            }
            @media screen and (max-width: 1200px){
                h1{
                    font-size: 20px;
                }
                :root{
                    --margem:7px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <div class="box">
                    <h1>HEADER</h1>
                </div>
            </div>
            <div id="navbar">
                <div class="box navbox">
                    <div id="navbuttons">
                        <!--<h1 contentEditable="true">NAVBAR</h1>-->
                        <a href="#" class="navbutton">BOTÃO</a>
                        <a href="Index.php" class="navbutton">Index Novo</a>
                        <a href="cadAnimal.html" class="navbutton">Cadastrar Animal</a>
                    </div>
                </div>
            </div>
            <div id="login">    
                <a id="botao" href="login.php" title="Logar"> 
                    Logar / Cadastrar
                </a>
            </div>
            <div id="sidebar">
                <div class="box" >
                    <h1 contentEditable="true">SIDE BAR</h1>
                </div>
            </div>
            <div id="corpo"> 
                <div class="box">
                    <h1 contentEditable="true">CORPO</h1>
                </div>
            </div>
            <div id="footer">
                <div class="box">
                    <h1>FOOTER</h1>
                </div>
            </div>
        </div>
    </body>
</html>