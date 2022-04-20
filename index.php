<?php

//Importando arquivos da pasta Controller
include "controller/Controller.php";
include "controller/UsuarioController.php";
include "controller/AnimalController.php";
include "controller/RacaController.php";

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
        case "esqueci-a-senha":
            $direciona = new Controller();
            $direciona->abrirEsqSenha();
        break;
        case "perfil":
            $direciona = new Controller();
            $direciona->abrirPerfil();
            break;
        case "meus-animais":
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
        case "info-animal":
            $direciona = new AnimalController();
            $direciona->abrirInfoAnimal();
            break;
        case "cadastro-raca":
            $raca = new RacaController();
            $raca->abrirCadRaca();
            break;
        case "cadastrar-raca":
            $raca = new RacaController();
            $raca->cadastrarRaca();
            break;
        case "teste":
            $direciona = new UsuarioController();
            $direciona->teste();
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