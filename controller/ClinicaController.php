<?php

include_once "model/Clinica.php";

class ClinicaController
{
    function abrirCadClinica()
    {
        include_once "view/cadClinica.php";
    }
    function cadastrarClinica()
    {
        $clinica = new Clinica();
        $clinica->idlogin = $_POST["#"];
        $clinica->cnpj = $_POST["txtCNPJ"];
        $clinica->clitelefone = $_POST["txtTelefone"];
        $clinica->vagas = $_POST["txtVagas"];
        $clinica->clirua = $_POST["txtRua"];
        $clinica->clibairro = $_POST["txtBairro"];
        $clinica->clinumero = $_POST["txtNumero"];
        $clinica->clicep = $_POST["txtCEP"];

        $clinica->cadastrar();
    }
}

?>