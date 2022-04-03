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
        //Incompleto
        $cadastra = new Usuario();
        $cadastra->idlogin = $_POST["#"];
        $cadastra->rg = $_POST["txtRG"];
        $cadastra->cpf = $_POST["txtCPF"];
        $cadastra->beneficio = $_POST["txtRG"];
        $cadastra->telefone = $_POST["txtTel"];
        $cadastra->celular = $_POST["txtCel"];
        $cadastra->punicao = $_POST["txtCEP"];
        $cadastra->usuarua = $_POST["txtRua"];
        $cadastra->usubairro = $_POST["txtBairro"];
        $cadastra->usunumero = $_POST["txtNumero"];
        $cadastra->usucep = $_POST["txtCEP"];


        $cadastra->cadastrar();
    }
}
?>