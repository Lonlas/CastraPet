<?php
    class RacaController
    {
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