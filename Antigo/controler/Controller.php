<?php
class Controler
{
    function abrirInicio(){
        include "view/home.php";
    }
    function abrirCadastro(){
        include "view/cadastro.php";
    }
    function abrirLogin(){
        include "view/login.php";
    }
    function abrirEsqSenha(){
        include "view/esqSenha.php";
    }
    function abrirPerfil(){
        include "view/infoUsuario.php";
    }
    function abrirMeusAnimais(){
        include "view/meusAnimais.php";
    }
    function abrirCadAnimal(){
        include "view/cadAnimal.php";
    }
    function abrirInfoAnimal(){
        include "view/infoAnimal.php";
    }


}
?>