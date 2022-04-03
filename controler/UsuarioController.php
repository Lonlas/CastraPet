<?php

include_once "model/Usuario.php";

class UsuarioController
{
    function abrirCadastro(){
        include "view/cadastro.php";
    }
    function abrirLogin(){
        include "view/login.php";
    }
    function cadastrarUsuario(){
        $cadastra = new Usuario();
        $cadastra->idusuario = $_POST["nome"];
    }
}
?>