<?php
use FFI\Exception;

include_once "model/Usuario.php";
include_once "model/Clinica.php";
include_once "model/Castracao.php";
include_once "model/email.php";

class ClinicaController
{    

    function cadastrarClinica()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            $filtros = array(".", "-", "(", ")", "/", " ");
            $cnpj = str_replace($filtros,'',$_POST["txtCNPJ"]);
            $cep = str_replace($filtros,'',$_POST["txtCEP"]);
            $tel = str_replace($filtros,'',$_POST["txtTelefone"]);

            $login = new Login();
            $login->nome =  $_POST["txtNome"];
            $login->email = $_POST["txtEmail"];
            $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
            $login->nivelacesso = 1;

            $clinica = new Clinica();
            $clinica->idlogin = $login->cadastrar();
            $clinica->cnpj = $cnpj;
            $clinica->clitelefone = $tel;
            $clinica->vagas =       $_POST["txtVagas"];
            $clinica->clirua =      $_POST["txtRua"];
            $clinica->clibairro =   $_POST["txtBairro"];
            $clinica->clinumero =   $_POST["txtNumero"];
            $clinica->clicep = $cep;
            $clinica->ativo = 1;

            $clinica->cadastrar();

            echo "<script>alert('Clínica cadastrada com sucesso!'); window.location='".URL."cadastra-clinica';</script>";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function atualizarClinica()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            $login = new Login();
            $login->idlogin = $_POST["idLogin"];
            $login->nome = $_POST["txtNome"];
            $login->email = $_POST["txtEmail"];
            $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
            $login->nivelacesso = 1;
            $login->atualizar();

            $clinica = new Clinica();
            $clinica->idclinica =   $_POST["idClinica"];
            $clinica->cnpj =        $_POST["txtCNPJ"];
            $clinica->clitelefone = $_POST["txtTelefone"];
            $clinica->vagas =       $_POST["txtVagas"];
            $clinica->clirua =      $_POST["txtRua"];
            $clinica->clibairro =   $_POST["txtBairro"];
            $clinica->clinumero =   $_POST["txtNumero"];
            $clinica->clicep =      $_POST["txtCEP"];
            if($_POST["chkAtivo"] == 1)
            {
                $clinica->ativo = 1;
            }
            else
            $clinica->ativo = 0;
            $clinica->atualizar();

            header("location:".URL."consulta-clinica");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function excluirClinica($idClinica, $idLogin)
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            $clinica = new Clinica();
            $clinica->idclinica = $idClinica;
            $clinica->excluir();

            $login = new Login();
            $login->idlogin = $idLogin;
            $login->excluir();

            header("Location:".URL."consulta-clinica");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function agendarDataCastracao()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 1) {

            $castracao = new Castracao();
            $castracao->idcastracao = $_POST["idcastracao"];
            $castracao->idclinica = $_SESSION["dadosClinica"]->idclinica;
            $castracao->status = 1;
            $castracao->horario = $_POST["horario"];

            $castracao->aprovarCastracao();

            //enviar o email
            $email = new Email();
            $email->data = $_POST["horario"];
            $email->nomeClinica = $_SESSION["dadosClinica"]->nome;
            $email->ruaClinica = $_SESSION["dadosClinica"]->clirua;
            $email->bairroClinica = $_SESSION["dadosClinica"]->clibairro;
            $email->numeroClinica = $_SESSION["dadosClinica"]->clinumero;
            $email->emailDestinatario = $_POST["emailDestinatario"];
            $email->nomeDestinatario = $_POST["nomeDestinatario"];
            $email->nomeAnimal = $_POST["aninome"];
            $email->clitelefone = $_SESSION["dadosClinica"]->clitelefone;

            header("Location:".URL."lista-solicitacao");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }
}

?>