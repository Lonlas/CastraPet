<?php

session_start();

include_once "controller/Controller.php";
include_once "controller/AnimalController.php";
include_once "controller/UsuarioController.php";
include_once "controller/ClinicaController.php";

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
        case "login": 
            $direciona = new UsuarioController();
            $direciona->abrirLogin();
        break;
        case "logar": 
            $usuario = new UsuarioController();
            $usuario->logar();
        break;
        case "esqueci-a-senha": 
            $direciona = new Controller();
            $direciona->abrirEsqSenha();
        break;    
        case "cadastra-tutor":
            $usu = new UsuarioController();
            $usu->abrirCadastro();
        break;
        case "cadastrar-tutor":
            $usu = new UsuarioController();
            $usu->cadastrarUsuario();
        break;
        case "perfil":
            $direciona = new Controller();
            $direciona->abrirPerfil();
        break;
        case "meus-animais":
            $animal = new AnimalController();
            $animal->abrirMeusAnimais();
        break;
        case "cadastra-animal":
            $animal = new AnimalController();
            $animal->abrirCadAnimal();
        break;
        case "cadastrar-animal":
            $animal = new AnimalController();
            $animal->cadastrarAnimal();
        break;
        case "cadastra-raca":
            $raca = new AnimalController();
            $raca->abrirCadRaca();
        break;
        case "cadastrar-raca":
            $raca = new AnimalController();
            $raca->cadastrarRaca();
        break;
        case "cadastra-clinica":
            $clinica = new ClinicaController();  
            $clinica->abrirCadClinica();
        break;
        case "cadastrar-clinica":
            $clinica = new ClinicaController();  
            $clinica->cadastrarClinica();
        break;
        case "solicita-castracao":
            $usuario = new UsuarioController();
            $usuario->abrirSolicitacao();
        break;
        case "home-adm":
            $adm = new UsuarioController();
            $adm->abrirHomeAdm();
        break;
        case "home-clinica":
            $clinica = new UsuarioController();
            $clinica->abrirHomeClinica();
        break;
        case "home-usuario":
            $usuario = new UsuarioController();
            $usuario->abrirHomeUsuario();
        break;
        case "sobre":
            $teste = new Controller();
            $teste->abrirSobre();
        break;

        // Telas consulta
        case "consulta-usuario":
            $adm = new Controller();
            $adm->abrirConsultaUsuario();
        break;
        case "consulta-clinica":
            $adm = new Controller();
            $adm->abrirConsultaClinica();
        break;
        case "consulta-castracao":
            $adm = new AnimalController();
            $adm->abrirConsultaCastracao();
        break;
        case "alterar-senha":
            $usuario = new Controller();
            $usuario->abrirAlterarSenha();
        break;
        case "lista-solicitacao":
            // Colocar na Navbar ADM - feito para vizualizar - Mylena
            include "view/listaSolicitacao.php";    
        break;
        case "agendamento":
            $adm = new Controller();
            $adm->abrirAgendamento();
        break;
        case "encerrarSessao":
            $login = new UsuarioController();
            $login->sair();
        break;
        case "vazio":
            $teste = new Controller();
            $teste->abrirTeste();
        break;
        
        default:
            //Mostrando um aviso de erro para caso entre em uma URL inválida
            $pagina = new Controller();
            $pagina->paginaNaoEncontrada();
    }
}a
else
{
    //Abrindo página inicial do site 
    $direciona = new Controller();
    $direciona->abrirInicio();
}
?>