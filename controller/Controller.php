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
}
?>