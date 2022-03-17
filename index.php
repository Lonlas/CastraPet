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
                --cinza:#eee;
                --margem: 12px;
                --borda: /*1px dotted black*/ none;
            }
            *{
                margin: 0;
                font-family: 'montserrat',Verdana, Arial, Helvetica, sans-serif;
                font-weight: 600;
                box-sizing: border-box;
                line-height: 1.5;
            }
            h1{
                font-size: 30px;
                color: white;
            }
            body{
                min-height: 100vh;
                background: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            div{    
                color: black;
            }                               
                                                        /*RETIRANDO A MARCA D'ÁGUA DO 000WEBSERVER*/
            a{
                display:none;
                color: var(--preto);
                text-decoration: none;
                font-size: 15px;
            }
            p{
                font-weight: 500;
                color: (var(--preto));
            }
            /*p, h2{
                color: black !important;
            }*/
            #pagina{
                margin: var(--margem);
                min-height: 100%;
                max-width: 1000px !important;
                position: relative;
            }                               
                                                        /*DEFININDO OS NOMES DO GRID*/
            #navbar{grid-area: n;}
            #sidebar{grid-area: s;}
            #corpo{grid-area: c;}
            #footer{grid-area: f;}
            #menu{grid-area: m;}

                                                        /*GRID*/
            
            .container{                                 
                display: grid;
                grid-template-areas:'m m'
                                    's c'
                                    'f f';
                grid-template-columns: 20fr 80fr !important;
                grid-template-rows: 0 minmax(620px, auto) minmax(150px, auto) !important;
                background: white;
            }
            .box{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: justify;
                flex-direction: column;
                overflow: hidden;
            }                                           
                                                        /*HEADER*/
            #header{
                background: var(--azulclaro);
                height: 120px;
            }                                           
                                                        /*NAVBAR*/
            #navbar{
                position: sticky;
                position: -webkit-sticky;
                top: var(--margem);
                margin: var(--margem) 0;
                height: 60px;
                display: grid;
                grid-template-areas:'nb l';
                grid-template-columns: 85fr 15fr;
            }
            .navbox{
                background: var(--azul);
            }
            #navbuttons{
                grid-area: nb;
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
                color: white;
                font-size: 1em !important;
                background: var(--azulclaro);
                text-decoration: none;
            }
            .navbutton:hover{
                background: var(--azulmaisclaro);
            }                                           
                                                        /*LOGIN BUTTON*/
            #login{
                margin-left: var(--margem);
                grid-area: l;
                text-decoration: none;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #btnlogin{
                display: flex !important;
                justify-content: center;
                text-align: center;           
                align-items: center;
                font-size: 1em !important;
                color: white;
                background: var(--verde);
                height: 100%;
                width: 100%;
                text-decoration: none;
                padding: 5px;
            }
            #btnlogin:hover{
                background: var(--verdeclaro);
            }
            #btnlogin:active{
                transform: scale(90%);
            }                                           
                                                        /*BTN MENU*/
            #btnmenu{
                display: none;
                height: 45px;
                width: 45px;
                background: var(--verde);
                border: white solid 3px;
                border-radius: 50%;
                float: right;
                top: 10px;
                right: 10px;
                position: relative;
            }
            #btnmenu:active{
                background: var(--verdeclaro);
            }
            #menu-content{
                display: none;
            }                                                        
                                                        /*SIDEBAR*/
            #sidebar{
                /*background: var(--vermelho);*/
                border: var(--borda);
            }
            .sidebox{
                justify-content: start;
            }
            .sidebar-links{
                margin:  0 0 var(--margem) 0;
                border: var(--borda);
                padding: var(--margem);
                background: var(--vermelho);
                border-radius: 10px;
            }
            .sidebar-link{
                display: inline-block;
                width: 100%;
                font-size: 1em;
            }
            .sidebar-img{
                width: 100%;
                border-radius: 10px;
            }
            .side-text{
                font-size: 0.9em !important;
                color: white;
            }                                           
                                                        /*CORPO*/
            #corpo{
                margin: 0 0 0 var(--margem);
                background: var(--amarelo);
                border: var(--borda);
                border-radius: 10px;
                padding: var(--margem);
            }
            #img-cachorro{
                width: 100%;
                display: inline-block;
                border-radius: 10px;
            }
            .corpo-titulo{
                font-size: 22px;
                font-weight: 800;
                margin-top: 15px;
                color: white;
            }
            .corpo-texto{
                font-size: 18px;
                color: white;
                padding: var(--margem);
            }
                                                        /*FOOTER*/
            #footer{
                margin: var(--margem) 0 0 0;
                background: var(--preto);
                border: var(--borda);       
            }
                                                        /*RESPONSIVO*/
            @media screen and (max-width: 900px){
                h1{
                    font-size: 20px;
                }
                p{
                    font-size: 1.2em;
                    font-weight: 500;
                }
                :root{
                    --margem:7px;
                }
                .container{
                    grid-template-areas:'m'
                                        'c'
                                        's'
                                        'f';
                    grid-template-columns: 100fr !important;
                    grid-template-rows: 0 minmax(300px, auto) minmax(150px, auto) minmax(150px, auto) !important;
                }
                /*#navbar,#login{
                    display: none;
                }*/
                /*#menu{
                    z-index: 1;
                    background-color: #00b48c;
                    display: none;
                }
                #btnmenu{
                    display: none;
                }*/
                .navbutton, #btnlogin{
                    font-size: 0.6em !important;
                }
                #corpo{
                    margin: var(--margem) 0;
                }
                .sidebox{
                    flex-direction: row !important; 
                    justify-content: center;
                }
                .sidebar-links{
                    margin: 0 var(--margem);
                    width: 100px;
                    height: 250px;;
                }
                .side-text
                {
                    font-size: 0.8em !important;
                    color: white;
                }
            }
        </style> 
    </head>
    <body>
        <div id="pagina">
            <div id="header">
                <div class="box">
                    <h1>Protótipo Github</h1>
                </div>
            </div>
            <div id="navbar">
                <div class="box navbox">
                    <div id="navbuttons">
                        <!--<h1 contentEditable="true">NAVBAR</h1>           NAVBAR-->
                        <!--<a href="antigo.php" class="menubutton">Index Base</a>-->
                        <a href="#" class="navbutton"><small>O redirecionamento do botão 'perfil' 👉<br>entrará no lugar do botão 'Logar / Cadastrar'<br>quando o login já tiver sido feito</small></a>
                        <a href="infoUsuario.php" class="navbutton">Perfil</a>
                    </div>
                </div>           
                <div id="login">    
                <a id="btnlogin" href="login.php" title="Logar"> 
                    Logar / Cadastrar
                </a>
                </div>
            </div>
            <div class="container"> 
                <div id="menu">
                    <button id="btnmenu"></button>
                    <div id="menu-content">
                        <a href="Login.php" class="menubutton">Login</a>
                        <!--<a href="antigo.php" class="menubutton">Index Base</a>-->
                        <a href="infoUsuario.php" class="menubutton">Perfil</a>
                    </div>
                </div>
                <div id="sidebar">
                    <div class="box sidebox">
                        <!--<h1 contentEditable="true">SIDE BAR</h1>            SIDEBAR-->
                        <div class="sidebar-links">
                            <a class="sidebar-link" href="https://g1.globo.com/sp/sao-paulo/noticia/2021/11/17/prefeitura-de-sp-passa-a-emitir-rg-digital-para-pets-veja-como-solicitar.ghtml">
                                <img class="sidebar-img" src="Documentos/d1.jpg">
                                <p class="side-text">Prefeitura de SP passa a emitir RG digital para pets; veja como fazer</p>
                            </a>
                        </div>
                        <div class="sidebar-links">
                            <a class="sidebar-link" href="https://tvjaguari.com.br/beneficios-da-castracao-para-caes-e-gatos-46154">
                                <img class="sidebar-img" src="Documentos/d2.jpg">
                                <p class="side-text">Benefícios da castração para cães e gatos</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="corpo">
                    <div class="box">
                        <!--<h1 contentEditable="true">CORPO</h1>               CORPO-->
                        <img id="img-cachorro" src="Documentos/como-fazer-seu-cachorro-feliz.jpg">
                        <h2 class="corpo-titulo">POR QUE DEVO CASTRAR MEU PET?</h2>
                        <p class="corpo-texto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue sapien non tortor ultricies, vitae auctor leo pulvinar. Donec a tincidunt augue. Nulla egestas purus eget lorem congue feugiat. Donec sollicitudin ut tellus eu tincidunt. Nam congue ligula vel tincidunt pellentesque. Maecenas sed diam vitae elit luctus vehicula ac at nunc. Mauris nec libero sed nisi vulputate tincidunt. Proin a est finibus, feugiat risus id, convallis nulla. Mauris eget eros ut sem mattis finibus quis quis est. Aliquam consectetur, elit ac molestie rhoncus, libero eros mollis metus, feugiat pharetra elit erat quis ex. Morbi augue est, molestie non pellentesque ac, gravida vitae nibh. Ut auctor nisl id venenatis elementum. Curabitur quis mauris vitae lacus tincidunt dapibus tincidunt nec est. In in massa sed nunc commodo bibendum. Mauris quis orci sed magna commodo ultrices eu a mauris. 
                        </p>
                        <h2 class="corpo-titulo">COMO FUNCIONA?</h2>
                        <p class="corpo-texto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue sapien non tortor ultricies, vitae auctor leo pulvinar. Donec a tincidunt augue. Nulla egestas purus eget lorem congue feugiat. Donec sollicitudin ut tellus eu tincidunt. Nam congue ligula vel tincidunt pellentesque. Maecenas sed diam vitae elit luctus vehicula ac at nunc. Mauris nec libero sed nisi vulputate tincidunt. Proin a est finibus, feugiat risus id, convallis nulla. Mauris eget eros ut sem mattis finibus quis quis est. Aliquam consectetur, elit ac molestie rhoncus, libero eros mollis metus, feugiat pharetra elit erat quis ex. Morbi augue est, molestie non pellentesque ac, gravida vitae nibh. Ut auctor nisl id venenatis elementum. Curabitur quis mauris vitae lacus tincidunt dapibus tincidunt nec est. In in massa sed nunc commodo bibendum. Mauris quis orci sed magna commodo ultrices eu a mauris. 
                        </p>
                        <h2 class="corpo-titulo">RESULTADOS</h2>
                        <p class="corpo-texto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue sapien non tortor ultricies, vitae auctor leo pulvinar. Donec a tincidunt augue. Nulla egestas purus eget lorem congue feugiat. Donec sollicitudin ut tellus eu tincidunt. Nam congue ligula vel tincidunt pellentesque. Maecenas sed diam vitae elit luctus vehicula ac at nunc. Mauris nec libero sed nisi vulputate tincidunt. Proin a est finibus, feugiat risus id, convallis nulla. Mauris eget eros ut sem mattis finibus quis quis est. Aliquam consectetur, elit ac molestie rhoncus, libero eros mollis metus, feugiat pharetra elit erat quis ex. Morbi augue est, molestie non pellentesque ac, gravida vitae nibh. Ut auctor nisl id venenatis elementum. Curabitur quis mauris vitae lacus tincidunt dapibus tincidunt nec est. In in massa sed nunc commodo bibendum. Mauris quis orci sed magna commodo ultrices eu a mauris. 
                        </p>
                        <h2 class="corpo-titulo">FINALIZAÇÃO</h2>
                        <p class="corpo-texto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin congue sapien non tortor ultricies, vitae auctor leo pulvinar. Donec a tincidunt augue. Nulla egestas purus eget lorem congue feugiat. Donec sollicitudin ut tellus eu tincidunt. Nam congue ligula vel tincidunt pellentesque. Maecenas sed diam vitae elit luctus vehicula ac at nunc. Mauris nec libero sed nisi vulputate tincidunt. Proin a est finibus, feugiat risus id, convallis nulla. Mauris eget eros ut sem mattis finibus quis quis est. Aliquam consectetur, elit ac molestie rhoncus, libero eros mollis metus, feugiat pharetra elit erat quis ex. Morbi augue est, molestie non pellentesque ac, gravida vitae nibh. Ut auctor nisl id venenatis elementum. Curabitur quis mauris vitae lacus tincidunt dapibus tincidunt nec est. In in massa sed nunc commodo bibendum. Mauris quis orci sed magna commodo ultrices eu a mauris.
                        </p>
                    </div>
                </div>
                <div id="footer">
                    <div class="box">
                        <h1>FOOTER</h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
