<?php

include_once "model/Castracao.php";
include_once "model/Usuario.php";
include_once "model/Clinica.php";

class Controller
{
    function abrirInicio(){
        include "view/home.php";
    }
    function abrirEsqSenha(){
        include "view/esqSenha.php";
    }
    function abrirPerfil(){
        
        include "view/infoUsuario.php";
    }
    function abrirADM(){
        include "view/homeAdm.php";
    }
    function paginaNaoEncontrada(){
        include "view/paginaNaoEncontrada.php";
    }
    function abrirSobre(){
        include "view/sobre.php";
    }
    function abrirConsultaUsuario($cpf){
        $direciona = new Usuario();
        $dadosUsuario = $direciona->consultar();
        include_once "view/consultaUsuario.php";
    }
    function abrirConsultaClinica($cnpj){
        $direciona = new Clinica();
        $dadosClinica = $direciona->consultar();
        include_once "view/consultaClinica.php";
    }
    function abrirConsultaCastracao()
    {
        $direciona = new Castracao();
        $dadosCastracao = $direciona->consultar();
        include_once "view/consultaCastracao.php";
    }
    function abrirCadRaca()
    {
        include"view/cadRaca.php";
    }
    function abrirAlterarSenha(){
        include "view/alterarSenha.php";
    }
    function abrirAgendamento(){
        include "view/confirmaSolicitacao.php";
    }
    function abrirTeste(){
        include "view/Teste.php";
    }
}
?>