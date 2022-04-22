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
        include "view/homeAdm.php";
    }
    function paginaNaoEncontrada(){
        include "view/paginaNaoEncontrada.php";
    }
    function abrirSobre(){
        include "view/sobre.php";
    }
    function abrirConsultaUsuario(){
        include "view/consultaUsuario.php";
    }
    function abrirConsultaClinica(){
        include "view/consultaClinica.php";
    }
    function abrirConsultaCastracao(){
        include "view/consultaCastracao.php";
    }
}
?>