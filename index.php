<?php

include "controler/Controller.php";
include "controler/UsuarioController.php";
include "controler/AnimalController.php";
include "controler/RacaController.php";

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
        case "cadastratutor";
            $usu = new UsuarioController();
            $usu->abrirCadastro();
        break;
        case "cadastrartutor";
            $usu = new UsuarioController();
            $usu->cadastrarUsuario();
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
            $Animal = new AnimalController();
            $Animal->abrirMeusAnimais();
        break;
        case "cadastraanimal":
            $Animal = new AnimalController();
            $Animal->abrirCadAnimal();
        break;
        case "cadastraranimal":
            $Animal = new AnimalController();
            $Animal->cadastrarAnimal();
        break;
        case "infoanimal":
            $Animal = new AnimalController();
            $Animal->abrirInfoAnimal();
        break;
        case "cadastra-raca":
            $raca = new RacaController();
            $raca->abrirCadRaca();
        break;
        case "cadastrar-raca":
            $raca = new RacaController();
            $raca->cadastrarRaca();
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