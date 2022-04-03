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
        case "cadastra-tutor";
            $usu = new UsuarioController();
            $usu->abrirCadastro();
        break;
        case "cadastrar-tutor";
            $usu = new UsuarioController();
            $usu->cadastrarUsuario();
        break;
        case "login":
            $direciona = new UsuarioController();
            $direciona->abrirLogin();
        break;
        case "esqueci-a-senha":
            $direciona = new Controller();
            $direciona->abrirEsqSenha();
        break;
        case "perfil":
            $direciona = new Controller();
            $direciona->abrirPerfil();
        break;
        case "meus-animais":
            $Animal = new AnimalController();
            $Animal->abrirMeusAnimais();
        break;
        case "cadastrar-animal":
            $Animal = new AnimalController();
            $Animal->abrirCadAnimal();
        break;
        case "cadastrar-animal":
            $Animal = new AnimalController();
            $Animal->cadastrarAnimal();
        break;
        case "info-animal":
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