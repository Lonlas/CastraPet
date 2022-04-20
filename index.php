<?php

include "controler/Controller.php";
include "controler/UsuarioController.php";
include "controler/AnimalController.php";

define("URL","http://localhost/CastraPet/");
if($_GET)
{
    $url = $_GET["url"];
    $url = explode("/",$url);

    switch($url[0])
    {   
        case "inicio":
           $direciona = new Controller();
           $direciona->abrirInicio();
        break;
        case "cadastro-tutor";
            $direciona = new UsuarioController();
            $direciona->abrirCadastro();
        break;
        case "cadastrar-tutor";
            $direciona = new UsuarioController();
            $direciona->cadastrarUsuario();
        break;
        case "login":
            $direciona = new UsuarioController();
            $direciona->abrirLogin();
        break;
        case "esqueciasenha":
            $direciona = new Controller();
            $direciona->abrirEsqSenha();
        break;
        case "perfil":
            $direciona = new Controller();
            $direciona->abrirPerfil();
            break;
        case "meusanimais":
            $direciona = new AnimalController();
            $direciona->abrirMeusAnimais();
            break;
        case "cadastro-animal":
            $direciona = new AnimalController();
            $direciona->abrirCadAnimal();
            break;
        case "cadastrar-animal":
            $direciona = new AnimalController();
            $direciona->cadastrarAnimal();
            break;
        case "infoanimal":
            $direciona = new AnimalController();
            $direciona->abrirInfoAnimal();
            break;
        case "teste":
            $direciona = new UsuarioController();
            $direciona->teste();
            break;
        default:
            echo "Página não encontrada";
    }
}
else
{
    $direciona = new Controller();
    $direciona->abrirInicio();
}



?>