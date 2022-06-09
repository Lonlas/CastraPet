<?php
/* USADO PARA ABRIR TODAS AS PÁGINAS */

include_once "model/Animal.php";
include_once "model/Castracao.php";
include_once "model/Clinica.php";
include_once "model/Login.php";
include_once "model/Raca.php";
include_once "model/Usuario.php";

class Controller
{
    // PÁGINA INCIAL
    function abrirInicio(){
        include_once "view/home.php";
    }

    // PÁGINAS IMPORTANTES
    function abrirSobre(){
        include_once "view/sobre.php";
    }
    function paginaNaoEncontrada(){
        include_once "view/paginaNaoEncontrada.php";
    }

    // LOGIN
    function abrirLogin(){
        include_once "view/login.php";
    }
    function abrirEsqSenha(){
        include_once "view/esqSenha.php";
    }

    function abrirRecuperacao()
    {
        include_once "view/confirmarCodigoSenha.php";
    }

    // USUÁRIO
    function abrirHomeUsuario(){
        include_once "view/homeUsuario.php";
    }
    function abrirCadastro(){
        include_once "view/cadastro.php";
    }
    function abrirPerfil(){   
        include_once "view/infoUsuario.php";
    }
    function abrirAlterarSenha($idlogin){
        //só abrir a tela alterar senha se existir sessão de usuário ou se confirmar login for igual ao login retornado pelo banco
        if(isset($_SESSION["dadosUsuario"]) || $_SESSION["idlogin"] == $idlogin){
            include_once "view/alterarSenha.php";
        }
        else
            include_once "view/paginaNaoEncontrada.php";
    }
    function abrirCadAnimal(){
        $animal = new Raca();
        $dadosRacaAnimal = $animal->consultarRaca();

        include_once "view/cadAnimal.php";
    }
    function abrirMeusAnimais(){
        $animal = new Animal();
        $animal->idusuario = $_SESSION["dadosUsuario"]->idusuario;
        $dadosAnimais = $animal->retornarAnimais();

        include_once "view/meusAnimais.php";
    }

    /*function abrirAtualizaAnimal($id){
        $animal = new Animal();
        $animal->idanimal = $id;
        $dadosAnimal = $animal->retornar();

        $raca = new Raca();
        $dadosRacaCanino = $raca->consultarCanino();
        $dadosRacaFelino = $raca->consultarFelino();
        
        include_once "view/editaAnimal.php";
    }*/
    
    // ADMINISTRADOR
    function abrirHomeAdm(){
        include_once "view/homeAdm.php";
    }
    #CADASTROS
    function abrirCadRaca(){
        include_once "view/cadRaca.php";
    }
    function abrirCadClinica(){
        include_once "view/cadClinica.php";
    }    
    #CONSULTAS
    function abrirConsultaUsuario(){
        $usuario = new Usuario();
        $dadosUsuario = $usuario->consultar();

        include_once "view/consultaUsuario.php";
    }
    function abrirConsultaClinica(){
        $clinica = new Clinica();
        $dadosClinica = $clinica->consultar();
        include_once "view/consultaClinica.php";
    }
    function abrirConsultaCastracao(){
        $castracao = new Castracao();
        if($_SESSION["dadosLogin"]->nivelacesso == 2){
            $dadosCastracao = $castracao->consultar();
        } else {
            $castracao->idclinica = $_SESSION["dadosClinica"]->idclinica;
            $dadosCastracaoClinica = $castracao->consultarPraClinica();
        }
        include_once "view/consultaCastracao.php";
    }

    function abrirConsultaAnimais($idusuario){
        $animal = new Animal();
        $animal->idusuario = $idusuario;
        $dadosAnimal = $animal->retornarAnimais();

        $raca = new Raca();
        $dadosRaca = $raca->consultar();

        include_once "view/consultaAnimais.php";
    }
    #AGENDAMENTO
    function abrirListaSolicitacao(){
        $castracao = new Castracao();
        if($_SESSION["dadosLogin"]->nivelacesso == 2)
        {
            $dadosSolicitacao = $castracao->consultarSolicitacao();
        } else {
            $castracao->idclinica = $_SESSION["dadosClinica"]->idclinica;
            $dadosSolicitacao = $castracao->clinicaConsultarSolicitacao();
        }

        include_once "view/listaSolicitacao.php";
    }
    function abrirAgendamento($id){
        $agendamento = new Castracao();
        $agendamento->idcastracao = $id;
        $dadosCastracao = $agendamento->retornar();

        $clinica = new Clinica();
        $dadosClinicas = $clinica->consultarComVagas();

        include_once "view/confirmaSolicitacao.php";
    }
    
    // CLÍNICA
    function abrirHomeClinica(){
        include_once "view/homeClinica.php";
    }
    
    // TESTE
    function abrirTeste(){
        include_once "view/Teste.php";
    }
}
?>