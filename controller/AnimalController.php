<?php
include_once "model/Animal.php";
include_once "model/Raca.php";

class AnimalController
{
    function abrirMeusAnimais(){
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
        $animal->idusuario = $_POST["idUsuario"];
        $animal->idraca = $raca;
        $animal->aninome = $_POST["txtNome"];
        $animal->especie = $_POST["rdbEspecie"];
        $animal->sexo = $_POST["rdbSexo"];
        $animal->sexo = $_POST["rdbPorte"];
        $animal->cor = $_POST["txtCor"];
        $animal->pelagem = $_POST["rdbPelagem"];
        $animal->idade = $_POST["numIdade"];
        $animal->comunitario = $_POST["rdbComunitario"];
        $animal->foto = $_POST["imgAnimal"];
    }

    function abrirCadRaca()
    {
        include"view/cadRaca.php";
    }
    
    function cadastrarRaca()
    {
        $cadastra = new Raca();
        $cadastra->raca = $_POST["txtRaca"];
        $cadastra->cadastrar();
    }

}
?>