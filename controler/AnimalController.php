<?php

include_once "model/Animal.php";

class AnimalController
{
    function abrirMeusAnimais(){
        include "view/meusAnimais.php";
    }
    function abrirCadAnimal(){
        include "view/cadAnimal.php";
    }
    function abrirInfoAnimal(){
        include "view/infoAnimal.php";
    }
    function cadastrarAnimal(){
        $cadastra = new Animal();
        $cadastra->idusuario = $_POST["#"];
        $cadastra->idraca = $_POST["listRaca"];
        $cadastra->aninome = $_POST["txtAniNome"];
        $cadastra->especie = $_POST["rdbEspecie"];
        $cadastra->sexo = $_POST["rdbSexo"];
        $cadastra->cor = $_POST["txtCor"];
        $cadastra->pelagem = $_POST["rdbPelagem"];
        $cadastra->idade = $_POST["numIdade"];
        $cadastra->comunitario = $_POST["rdbComunitario"];
        $cadastra->foto = $_POST["#"];
        $cadastra->porte = $_POST["rdbPorte"];

        $cadastra->cadastrar();

        echo "<script>alert('Animal cadastrado com sucesso!'); window.location='".URL."meusanimais';</script>";
    }



}
?>