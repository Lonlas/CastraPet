<?php

include "controler/Controller.php";
define("URL","http://localhost/CastraPet/Antigo");
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
        case "esqueciasenha":
            $direciona = new Controler();
            $direciona->abrirEsqSenha();
        break;
        case "perfil":
            $direciona = new Controler();
            $direciona->abrirPerfil();
            break;
        case "meusanimais":
            $direciona = new Controler();
            $direciona->abrirMeusAnimais();
            break;
        case "cadastraanimal":
            $direciona = new Controler();
            $direciona->abrirCadAnimal();
            break;
        case "infoanimal":
            $direciona = new Controler();
            $direciona->abrirInfoAnimal();
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