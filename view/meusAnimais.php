<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Meus Animais</title>
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
                --preto:#282828;
                --cinza:#eee;
                --margem: 12px;
                --borda: 1px solid white;
            }
            *{
                margin: 0;
                font-family: 'montserrat',Verdana, Arial, Helvetica, sans-serif;
                font-weight: 600;
                box-sizing: border-box;
                line-height: 1.5;
                color: white;
            }
            body{
                min-height: 100vh;
                background: white;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            a{
                display: none;
                text-decoration: none;
            }
            h1{
                text-transform: capitalize;
                margin-bottom: 50px;
                font-weight: 800;
            }
            .container{
                margin: var(--margem);
                display: grid;
                grid-template-areas:'p'
                                    'b';
                grid-template-columns: 100%;
                grid-template-rows: auto 150px;
                width: 1000px;
                height: auto;
                background: var(--azulclaro);
                border-radius: 5px;
                overflow: hidden;
            }
            #pets{
                grid-area: p;
                width: 100%;
                height: 100%;
                padding: 50px;
            }
            #tabela{
                width: auto;
                height: 300px;
                display: grid;
                grid-template-areas:'a sa b'
                                    'c sa d';
                grid-template-columns: 50fr 50px 50fr;
                grid-template-rows: 50px 50px;
            }
            .obj{
                display: flex;
                align-items: center;
                border-top: var(--borda);
                min-width: 200px;
                height: 50px;
            }
            .a{grid-area: a;}
            .b{grid-area: b;}
            .c{grid-area: c; border-bottom: var(--borda);}
            .d{grid-area: d; border-bottom: var(--borda);}
            .separador{
                grid-area: sa;
                min-width: 50px !important;
                border: none;
            }
            .link{
                display: inline;
                text-decoration: underline;
            }
            #boxbtn{                               /*BOTÃO*/
                grid-area: b;
                background: var(--preto);
                width: 100%;
                height: 100%;
                display: grid;
                grid-template-areas: 'e d';
                align-items: center;
            }
            .btn{
                height: 80px;
                width: 150px;
                font-size: 1.3em;
                background: var(--verde);
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                position: relative;
                border-radius: 5px;
            }
            .btn:hover{
                cursor: pointer;
                background: var(--verdeclaro);
            }
            .btn:active{
                transform: scale(90%);
            }
            #boxesc{
                display: block;
                grid-area: e;
            }
            .esc{
                float: left;
                left: 30%;
            }
            #boxdir{
                display: block;
                grid-area: d;
            }
            .dir{
                float: right;
                right: 30%;
            }
            @media screen and (max-width:600px){
                h1{
                    font-size: 30px;
                }
                .btn{
                    height: 60px;
                    width: 110px;
                    font-size: 100%;
                }
                .esc{
                    left: 20px;
                }
                .dir{
                    right: 20px;
                }
                .separador{display: none;}
                .c{grid-area: c; border-bottom: none;}
                .d{grid-area: d; border-bottom: var(--borda);}
                #tabela{
                    grid-template-areas:'a'
                                        'b'
                                        'c'
                                        'd';
                    grid-template-columns: 100%;
                    grid-template-rows: min-content min-content min-content min-content;
                }
                .obj{
                    min-width: auto;
                }
            }
            @media screen and (max-width: 315px)
            {
                .esc{
                    left: 10px;
                }
                .dir{
                    right: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="pets">
                <h1>Meus Animais</h1>
                <div id="tabela">
                    <div class="obj a"><a class="link" href="infoAnimal.php">Loki</a></div>
                            
                    <div class="obj b"><a class="link" href="infoAnimal.php">Thor</a></div>
                    <div class="separador"></div>
                    <div class="obj c"><a class="link" href="infoAnimal.php">Odin</a></div>

                    <div class="obj d"><a class="link" href="infoAnimal.php">Valquíria</a></div>
                </div>
            </div>
            <div id="boxbtn">
                <div id="boxesc">
                    <a href="infoUsuario.php" class="btn esc">Voltar</a>
                </div>
                <div id="boxdir">
                    <a href="cadAnimal.php" class="btn dir">Cadastrar Animal</a>
                </div>
            </div>
        </div>
    </body>
</html>