<?php

include_once "model/Clinica.php";

class ClinicaController
{

    function cadastrarClinica()
    {
        $login = new Login();
        $login->nome =  $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
        $login->nivelacesso = 1;

        $clinica = new Clinica();
        $clinica->idlogin = $login->cadastrar();
        $clinica->cnpj =        $_POST["txtCNPJ"];
        $clinica->clitelefone = $_POST["txtTelefone"];
        $clinica->vagas =       $_POST["txtVagas"];
        $clinica->clirua =      $_POST["txtRua"];
        $clinica->clibairro =   $_POST["txtBairro"];
        $clinica->clinumero =   $_POST["txtNumero"];
        $clinica->clicep =      $_POST["txtCEP"];

        $clinica->cadastrar();

        echo "<script>alert('Clínica cadastrada com sucesso!'); window.location='".URL."cadastra-clinica';</script>";
    }
}

?>