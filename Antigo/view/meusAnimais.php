<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Meus Animais</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="recursos/css/root.css">
        <link rel="stylesheet" href="recursos/css/meusAnimais.css">
    </head>
    <body>
        <div class="container">
            <div id="pets">
                <h1>Meus Animais</h1>
                <div id="tabela">
                    <div class="obj a"><a class="link" href="<?php echo URL.'info-animal'?>">Loki</a></div>
                            
                    <div class="obj b"><a class="link" href="<?php echo URL.'info-animal'?>">Thor</a></div>
                    <div class="separador"></div>
                    <div class="obj c"><a class="link" href="<?php echo URL.'info-animal'?>">Odin</a></div>

                    <div class="obj d"><a class="link" href="<?php echo URL.'info-animal'?>">Valquíria</a></div>
                </div>
            </div>
            <div id="boxbtn">
                <div id="boxesc">
                    <a href="<?php echo URL.'perfil';?>" class="btn esc">Voltar</a>
                </div>
                <div id="boxdir">
                    <a href="<?php echo URL.'cadastra-animal';?>" class="btn dir">Cadastrar Animal</a>
                </div>
            </div>
        </div>
    </body>
</html>