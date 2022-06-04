<?php

include_once "model/Clinica.php";

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

        echo "<script>alert('Clínica Atualizada com sucesso!'); window.location='".URL."consulta-clinica';</script>";
    }

    function excluirClinica($idClinica)
    {
        $clinica = new Clinica();
        $clinica->idclinica = $idClinica;
        $clinica->excluir();
    }
}

?>