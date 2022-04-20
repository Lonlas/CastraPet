<?php
class Controller
{
    function abrirInicio(){
        include "view/home.php";
    }
    function abrirEsqSenha(){
        include "view/esqSenha.php";
    }
    function abrirPerfil(){
        include "view/infoUsuario.php";
    }
    function abrirADM(){
        //Função criada para visualizar as diferentes telas de níveis de acesso
        //include "view/homeClinica.php";
        include "view/homeAdm.php";
    }
}
?>