<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Castra Pet</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="recursos//css//root.css">
        <link rel="stylesheet" href="recursos//css//home.css">
    </head>
    <body>
        <div id="pagina">
            <div id="header">
                <div class="box">
                    <h1>Protótipo</h1>
                </div>
            </div>
            <div id="navbar">
                <div class="box navbox">
                    <div id="navbuttons">
                        <!--<h1 contentEditable="true">NAVBAR</h1>           NAVBAR-->
                        <!--<a href="antigo.php" class="menubutton">Index Base</a>-->
                        <a href="#" class="navbutton"><small>O redirecionamento do botão 'perfil' 👉<br>entrará no lugar do botão 'Logar / Cadastrar'<br>quando o login já tiver sido feito</small></a>
                        <a href="<?php echo URL.'perfil';?>" class="navbutton">Perfil</a>
                    </div>
                </div>           
                <div id="login">    
                <a id="btnlogin" href="<?php echo URL.'login';?>" title="Logar"> 
                    Logar / Cadastrar
                </a>
                </div>
            </div>
            <div class="container"> 
                <div id="menu">
                    <button id="btnmenu"></button>
                    <div id="menu-content">
                        <a href="<?php echo URL.'login';?>" class="menubutton">Login</a>
                        <!--<a href="antigo.php" class="menubutton">Index Base</a>-->
                        <a href="<?php echo URL.'perfil';?>" class="menubutton">Perfil</a>
                    </div>
                </div>
                <div id="sidebar">
                    <div class="box sidebox">
                        <!--<h1 contentEditable="true">SIDE BAR</h1>            SIDEBAR-->
                        <div class="sidebar-links">
                            <a class="sidebar-link" href="https://g1.globo.com/sp/sao-paulo/noticia/2021/11/17/prefeitura-de-sp-passa-a-emitir-rg-digital-para-pets-veja-como-solicitar.ghtml">
                                <img class="sidebar-img" src="recursos/img/d1.jpg">
                                <p class="side-text">Prefeitura de SP passa a emitir RG digital para pets; veja como fazer</p>
                            </a>
                        </div>
                        <div class="sidebar-links">
                            <a class="sidebar-link" href="https://tvjaguari.com.br/beneficios-da-castracao-para-caes-e-gatos-46154">
                                <img class="sidebar-img" src="recursos/img/d2.jpg">
                                <p class="side-text">Benefícios da castração para cães e gatos</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="corpo">
                    <div class="box">
                        <!--<h1 contentEditable="true">CORPO</h1>               CORPO-->
                        <img id="img-cachorro" src="recursos/img/como-fazer-seu-cachorro-feliz.jpg" title="cachorro feliz">
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
