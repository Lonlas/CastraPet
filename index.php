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
        // PÁGINA INICIAL
        case "inicio":
            $direciona = new Controller();
            $direciona->abrirInicio();
        break;

        // CADASTRO TUTOR
        case "cadastra-tutor";
            $direciona = new Controller();
            $direciona->abrirCadastro();
        break;
        case "cadastrar-tutor";
            $direciona = new UsuarioController();
            $direciona->cadastrarUsuario();
        break;
        
        // PÁGINAS IMPORTANTES
        case "sobre":
            $teste = new Controller();
            $teste->abrirSobre();
        break;

        // LOGIN 
        case "login": 
            $direciona = new Controller();
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

        // USUÁRIO
        case "home-usuario":
            $usuario = new Controller();
            $usuario->abrirHomeUsuario();
        break;
        case "perfil":
            $usuario = new Controller();
            $usuario->abrirPerfil();
        break;
        case "alterar-senha":
            $usuario = new Controller();
            $usuario->abrirAlterarSenha();
        break;
        case "cadastra-animal":
            $animal = new Controller();
            $animal->abrirCadAnimal();
        break;
        case "carregar-raca":
            $raca = new AnimalController();
            $raca->carregarRaca($url[1]);    
        break;
        case "cadastrar-animal":
            $animal = new AnimalController();
            $animal->cadastrarAnimal();
        break;
        case "meus-animais":
            $usuario = new Controller();
            $usuario->abrirMeusAnimais();
        break;
        case "atualizar-animal":
            $usuario = new AnimalController();
            $usuario->atualizarAnimal($url[1]);
        break;
        case "excluir-animal":
            $usuario = new AnimalController();
            $usuario->excluirAnimal($url[1]);
        break;
        case "solicitar-castracao":
            $usuario = new UsuarioController();
            $usuario->solicitarCastracao();
        break;
        case"excluir-tutor":
            $usuario = new UsuarioController();
            $usuario->excluir($url["1"],$url["2"]);
        break;

        // ADM
        case "home-adm":
            $adm = new Controller();
            $adm->abrirHomeAdm();
        break;
        #CADASTROS
        case "cadastra-raca":
            $raca = new Controller();
            $raca->abrirCadRaca();
        break;
        case "cadastrar-raca":
            $raca = new AnimalController();
            $raca->cadastrarRaca();
        break;
        case "cadastra-clinica":
            $clinica = new Controller();  
            $clinica->abrirCadClinica();
        break;
        case "cadastrar-clinica":
            $clinica = new ClinicaController();  
            $clinica->cadastrarClinica();
        break;
        #ATUALIZAÇÕES
        case "atualiza-tutor":
            $usuario = new UsuarioController();
            $usuario->atualizarUsuario($url[1]);
        break;
        #CONSULTAS
        case "consulta-usuario":
            $adm = new Controller();
            $adm->abrirConsultaUsuario($url[1]);
        break;
        case "consulta-clinica":
            $adm = new Controller();
            $adm->abrirConsultaClinica($url[1]);
        break;
        case "consulta-castracao":
            $adm = new Controller();
            $adm->abrirConsultaCastracao();
        break;
        case "consulta-animais":
            $adm = new Controller();
            $adm->abrirConsultaAnimais($url[1]);    
        break;
        #CASTRAÇÃO - vizualização, confirmação e atualização
        case "lista-solicitacao":
            $adm = new Controller();
            $adm->abrirListaSolicitacao();   
        break;
        case "agendamento":
            $adm = new Controller();
            $adm->abrirAgendamento($url[1]);
        break;
        case "agendar":
            $castracao = new UsuarioController();
            $castracao->agendarCastracao();
        break;
        case "atualizar-castracao":
            $castracao = new UsuarioController();
            $castracao->atualizarCastracao();
        break;

        // CLÍNICA
        case "home-clinica":
            $clinica = new Controller();
            $clinica->abrirHomeClinica();
        break;
        case "atualizar-clinica":
            $clinica = new ClinicaController();
            $clinica->atualizarClinica();
        break;
        case "excluir-clinica":
            $clinica = new ClinicaController();
            $clinica->excluirClinica($url[1], $url[2]);
        break;

        // LOGOUT
        case "encerrar-sessao":
            $login = new UsuarioController();
            $login->sair();
        break;

        // TESTE
        case "vazio":
            $teste = new Controller();
            $teste->abrirTeste();
        break;

        default:
            // URL INVÁLIDA
            $direciona = new Controller();
            $direciona->paginaNaoEncontrada();
    }
}
else
{
    //testee
    //ABRIR PÁGINA INICIAL
    $direciona = new Controller();
    $direciona->abrirInicio();
}
?>