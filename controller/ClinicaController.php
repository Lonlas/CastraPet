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

        $clinica->cadastrar();

        echo "<script>alert('Clínica cadastrada com sucesso!'); window.location='".URL."cadastra-clinica';</script>";
    }
}

?>