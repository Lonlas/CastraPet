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
    function abrirRecuperacao($email)
    {
        include_once "view/confirmarCodigoSenha.php";
    }

    // USUÁRIO
    function abrirHomeUsuario(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if ($_SESSION["dadosLogin"]->nivelacesso == 0) {
            include_once "view/homeUsuario.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    function abrirCadastro(){
        include_once "view/cadastro.php";
    }
    function abrirPerfil(){  
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //Controle de privilégio
        if ($_SESSION["dadosLogin"]->nivelacesso == 0) {
            $login = new Login();
            $login->idlogin = $_SESSION["dadosLogin"]->idlogin;
            $dadosUsuario = $login->retornarUsuario();
            include_once "view/infoUsuario.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    function abrirAlterarSenha($idlogin){
        //só abrir a tela alterar senha se existir sessão de usuário ou se confirmar login for igual ao login retornado pelo banco
        if(isset($_SESSION["dadosUsuario"]) || $_SESSION["idlogin"] == $idlogin){
            include_once "view/alterarSenha.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    function abrirCadAnimal(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if ($_SESSION["dadosLogin"]->nivelacesso == 0) {
            $animal = new Raca();
            $dadosRacaAnimal = $animal->consultarRaca();

            include_once "view/cadAnimal.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    function abrirMeusAnimais(){
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0) {
            $animal = new Animal();
            $animal->idusuario = $_SESSION["dadosUsuario"]->idusuario;
            $dadosAnimais = $animal->retornarAnimais();

            $usuario = new Usuario();
            $usuario->idusuario = $_SESSION["dadosUsuario"]->idusuario;
            $quantcastracoes = $usuario->retornarQuantCastracao();

            include_once "view/meusAnimais.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
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
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) { include_once "view/homeAdm.php"; }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    #CADASTROS
    function abrirCadRaca(){
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) { include_once "view/cadRaca.php"; }
        else{ include_once "view/paginaNaoEncontrada.php"; }
          
    }
    function abrirCadClinica(){
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) { include_once "view/cadClinica.php"; }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }    
    #CONSULTAS
    function abrirConsultaUsuario($cpf){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //caso não tenha privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
            $usuario = new Usuario();
            $dadosUsuario = $usuario->consultar();

            include_once "view/consultaUsuario.php"; 
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    function abrirConsultaClinica($cnpj){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //caso não tenha privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
            $clinica = new Clinica();

            $dadosClinica = $clinica->consultar();
            include_once "view/consultaClinica.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }
    function abrirConsultaCastracao(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return;}

        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
            
            $castracao = new Castracao();
            $dadosCastracao = $castracao->consultar();
            
            include_once "view/consultaCastracao.php";
        }
        else if($_SESSION["dadosLogin"]->nivelacesso == 1){
            $castracao = new Castracao();
            $castracao->idclinica = $_SESSION["dadosClinica"]->idclinica;
            $dadosCastracaoClinica = $castracao->consultarPraClinica();
            include_once "view/consultaCastracao.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }

    function abrirConsultaAnimais($idusuario){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //caso não tenha privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2){
            
            $animal = new Animal();
            $animal->idusuario = $idusuario;
            $dadosAnimal = $animal->retornarAnimais();

            $raca = new Raca();
            $dadosRaca = $raca->consultar();

            include_once "view/consultaAnimais.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }

    function abrirConsultaRaca(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        //caso não tenha privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
            $raca = new Raca();
            $dadosRaca = $raca->consultar();
            include_once "view/consultaRaca.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    #AGENDAMENTO
    function abrirListaSolicitacao(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
   
        if($_SESSION["dadosLogin"]->nivelacesso == 2) { 
            $castracao = new Castracao();
            $dadosSolicitacao = $castracao->consultarSolicitacao();
            include_once "view/listaSolicitacao.php";
        }
        else if($_SESSION["dadosLogin"]->nivelacesso == 1){
            $castracao = new Castracao();
            $castracao->idclinica = $_SESSION["dadosClinica"]->idclinica;
            $dadosSolicitacao = $castracao->clinicaConsultarSolicitacao();
            include_once "view/listaSolicitacao.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }   
    }
    function abrirAgendamento($id){
        //Caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
   
        if ($_SESSION["dadosLogin"]->nivelacesso > 0) {
            $agendamento = new Castracao();
            $agendamento->idcastracao = $id;
            $dadosCastracao = $agendamento->retornar();

            $clinica = new Clinica();
            $dadosClinicas = $clinica->consultarComVagas();

            include_once "view/confirmaSolicitacao.php";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    
    // CLÍNICA
    function abrirHomeClinica(){
        //caso o usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }
        
        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 1) { include_once "view/homeClinica.php"; }
        else{ include_once "view/paginaNaoEncontrada.php"; }
    }
    
    // TESTE
    function abrirTeste(){
        include_once "view/Teste.php";
    }
}
?>