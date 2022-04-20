<?php

include_once "controller/Controller.php";
include_once "controller/UsuarioController.php";
include_once "controller/AnimalController.php";
include_once "controller/RacaController.php";
include_once "controller/LoginController.php";

//Definindo uma constante para a URL do site
define("URL","http://localhost/CastraPet/");
if($_GET)
{
    //Pegando a URL e apagando a "/" no final dela.
    $url = $_GET["url"];
    $url = explode("/",$url);

    //Definindo os nomes das telas que vão aparecer na URL
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
        case "logar":
            $usuario = new LoginController();
            $usuario->logar();
        break;
        case "esqueci-a-senha":
            $direciona = new Controller();
            $direciona->abrirEsqSenha();
        break;
        case "recuperar-senha":
            $direciona = new Controller();
            //$direciona->abrirRecuperaSenha();     
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
        case "teste":
            $teste = new UsuarioController();
            $teste->teste();
            break;
        default:
            //Mostrando um aviso de erro para caso entre em uma URL inválida
            echo "Página não encontrada";
    }
}
else
{
    //Abrindo página inicial do site 
    $direciona = new Controller();
    $direciona->abrirInicio();
}



?>