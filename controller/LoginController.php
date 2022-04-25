<?php

include_once "model/Login.php";

class LoginController
{
    function logar()
    {
        $email = $_POST["txtEmail"];
        $senha = $_POST["txtSenha"];

        switch([$email, $senha])
        {
            case [$email == "user@user.com" , $senha == "123"]:
                echo"<script>alert('Usuário Logado'); window.location='".URL."home-usuario'; </script>";
            break;
            case [$email == "clinica@clinica.com" , $senha == "123"]:
                echo"<script>alert('Usuário Clínica Logado'); window.location='".URL."home-clinica'; </script>";
            break;
            case [$email == "adm@adm.com" , $senha == "123"]:
                echo"<script>alert('Usuário Administrador Logado'); window.location='".URL."home-adm'; </script>";
            break;
            default:
            echo"<script>alert('Usuário não encontrado'); window.location='".URL."login'; </script>";
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