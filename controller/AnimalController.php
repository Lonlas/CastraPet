<?php
include_once "model/Animal.php";
include_once "model/Raca.php";
include_once "model/Castracao.php";

class AnimalController
{
    function abrirMeusAnimais(){
        $animal = new Animal();
        $animal->idusuario = $_SESSION["dadosUsuario"]->idusuario;
        $dadosAnimais = $animal->retornarAnimais();

        include "view/meusAnimais.php";
    }
    function abrirCadAnimal(){
        $raca = new Raca();
        $dadosRaca = $raca->consultar();
        include "view/cadAnimal.php";
    }
    function abrirInfoAnimal(){
        include "view/infoAnimal.php";
    }
    function cadastrarAnimal()
    {
        $direciona = new Raca();
        $dadosRaca = $direciona->consultar();
        //Gambiarra para pegar o ID da raça - Melhorar o código depois
        foreach($dadosRaca as $value)
        {
            if($_POST["listRaca"] == $value->raca)
            {
                $raca = $value->idraca;
            }
        }
        $animal = new Animal();
        $animal->idusuario = $_SESSION["dadosUsuario"]->idusuario;
        //$animal->idusuario = $_POST["idUsuario"];
        $animal->idraca = $raca;
        $animal->aninome = $_POST["txtNome"];
        $animal->especie = $_POST["slcEspecie"];
        $animal->sexo = $_POST["slcSexo"];
        $animal->porte = $_POST["slcPorte"];
        $animal->cor = $_POST["txtCor"];
        $animal->pelagem = $_POST["slcPelagem"];
        $animal->idade = $_POST["numIdade"];
        $animal->comunitario = $_POST["slcComunitario"];
        $animal->foto = $_POST["imgAnimal"];

        $animal->cadastrar();

        header("Location:".URL."meus-animais");
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
    
    function cadastrarRaca()
    {
        try
        {
            $cadastra = new Raca();
            $cadastra->raca = $_POST["txtRaca"];
            $cadastra->tipoespecie = $_POST["tipoEspecie"];
            $cadastra->cadastrar();

            echo"<script>alert('Raça cadastrada com sucesso'); window.location='".URL."cadastra-raca'; </script>";
        }
        catch(Exception $e)
        {
            echo"<script>alert('Erro: $e'); window.location='".URL."cadastra-raca'; </script>";
        }

    }
}
?>