<?php
use FFI\Exception;

include_once "model/Clinica.php";
include_once "model/Castracao.php";
include_once "model/email.php";

class ClinicaController
{

    function cadastrarClinica()
    {
        $filtros = array(".", "-", "(", ")", "/", " ");
        $cnpj = str_replace($filtros,'',$_POST["txtCNPJ"]);
        $cep = str_replace($filtros,'',$_POST["txtCEP"]);
        $tel = str_replace($filtros,'',$_POST["txtTelefone"]);

        $login = new Login();
        $login->nome = $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
        $login->nivelacesso = 1;

        $clinica = new Clinica();
        $clinica->idlogin = $login->cadastrar();
        $clinica->cnpj = $cnpj;
        $clinica->clitelefone = $tel;
        $clinica->vagas = $_POST["txtVagas"];
        $clinica->clirua = $_POST["txtRua"];
        $clinica->clibairro = $_POST["txtBairro"];
        $clinica->clinumero = $_POST["txtNumero"];
        $clinica->clicep = $cep;
        $clinica->ativo = 1;

        $clinica->cadastrar();

        echo "<script>alert('Clínica cadastrada com sucesso!'); window.location='".URL."cadastra-clinica';</script>";
    }

    function atualizarClinica()
    {

        $login = new Login();
        $login->idlogin = $_POST["idLogin"];
        $login->nome = $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
        $login->nivelacesso = 1;
        $login->atualizar();

        $clinica = new Clinica();
        $clinica->idclinica = $_POST["idClinica"];
        $clinica->cnpj = $_POST["txtCNPJ"];
        $clinica->clitelefone = $_POST["txtTelefone"];
        $clinica->vagas = $_POST["txtVagas"];
        $clinica->clirua = $_POST["txtRua"];
        $clinica->clibairro = $_POST["txtBairro"];
        $clinica->clinumero = $_POST["txtNumero"];
        $clinica->clicep = $_POST["txtCEP"];
        //$clinica->ativo = $_POST["#"]; COLOCAR AQUI QUANDO ATUALIZAR A TELA DE ATUALIZAÇÃO DE CLINICA
        $clinica->atualizar();

        header("location:".URL."consulta-clinica");
    }

    function excluirClinica($idClinica, $idLogin)
    {
        $clinica = new Clinica();
        $clinica->idclinica = $idClinica;
        $clinica->excluir();

        $login = new Login();
        $login->idlogin = $idLogin;
        $login->excluir();

        header("Location:".URL."consulta-clinica");
    }

    function agendarDataCastracao()
    {
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
        $email->enviarConfirmacao();

        header("Location:".URL."lista-solicitacao");
    }
}

?>