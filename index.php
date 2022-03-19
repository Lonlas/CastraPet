<?php

include "controler/Controller.php";
define("URL","http://localhost/ProjetoCastraPet/");
if($_GET)
{
    $url = $_GET["url"];
    $url = explode("/",$url);

    switch($url[0])
    {   
        case "inicio":
           $direciona = new Controler();
           $direciona->abrirInicio();
        break;
        case "cadastro";
            $direciona = new Controler();
            $direciona->abrirCadastro();
        break;
        case "login":
            $direciona = new Controler();
            $direciona->abrirLogin();
        break;
        default:
            echo "Página não encontrada";
    }
}
else
{
    $direciona = new Controler();
    $direciona->abrirInicio();
}



?>