<?php

include_once "model/Usuario.php";
include_once "model/Login.php";

class UsuarioController
{
    function abrirCadastro(){
        include "view/cadastro.php";
    }
    function abrirLogin(){
        include "view/login.php";
    }
    function abrirSolicitacao(){
        include "view/solicitaCastra.php";
    }
    function cadastrarUsuario(){
        //Cadastro do Login
        $login = new Login();
        $login->nome = $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
        $login->nivelacesso = 0;

        //Cadastro do Usuário
        $cadastra = new Usuario();
        $cadastra->idlogin = $login->cadastrar();
        $cadastra->rg = $_POST["txtRG"];
        $cadastra->cpf = $_POST["txtCPF"];

        if($_POST["chkProtetor"] == 1)
            $cadastra->beneficio = $_POST["chkProtetor"];
        else if($_POST["chkNIS"] == 2)
            $cadastra->beneficio = $_POST["chkNIS"];
        else
            $cadastra->beneficio = 0;

        $cadastra->telefone = $_POST["txtTel"];
        $cadastra->celular = $_POST["txtCelular"];
        $cadastra->punicao = 0;
        $cadastra->usurua = $_POST["txtRua"];
        $cadastra->usubairro = $_POST["txtBairro"];
        $cadastra->usunumero = $_POST["txtNumero"];
        $cadastra->usucep = $_POST["txtCEP"];
        if(empty($_POST["txtNIS"]))
        {
            $cadastra->nis = "";
        }
        else
        {
            $cadastra->nis = $_POST["txtNIS"];
        }
        
        $cadastra->cadastrar();

        header("Location:".URL);
    }
    function logar()
    {
        $logar = new Login();
        $logar->email = $_POST["txtEmail"];
        $dadosUsuario = $logar->logar();
        
        if($dadosUsuario && password_verify($_POST["txtSenha"], $dadosUsuario->senha))
        {
            $_SESSION["dadosUsu"] = $dadosUsuario;
            
            switch($dadosUsuario->nivelacesso)
            {
                case '0':
                    echo"<script>alert('Usuário Logado'); window.location='".URL."home-usuario'; </script>";
                break;
                case '1':
                    echo"<script>alert('Usuário Clínica Logado'); window.location='".URL."home-clinica'; </script>";
                break;
                case '2':
                    echo"<script>alert('Usuário Administrador Logado'); window.location='".URL."home-adm'; </script>";
                break;
                default:
                    echo"<script>alert('Email ou senha estão errados'); window.location='".URL."login'; </script>";
            }
        }
        else
        {
            echo"<script>alert('Email ou senha estão errados'); window.location='".URL."login'; </script>";
        }

    }
    function abrirHomeClinica()
    {
        include "view/homeClinica.php";
    }
    function abrirHomeAdm()
    {
        include "view/homeAdm.php";
    }
    function abrirHomeUsuario(){
        include "view/homeUsuario.php";
    }
}
?>