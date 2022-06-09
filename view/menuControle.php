<?php
//CONTROLE DE MENU
if(isset($_SESSION["dadosLogin"])) //caso esteja logado e exista uma sessão
{
    switch($_SESSION["dadosLogin"]->nivelacesso)
    {
        //caso tenha nível de acesso de usuário
        case 0: include_once "menuLogado.php"; break;
        //caso tenha nível de acesso de clínica
        case 1: include_once "menuClinica.php"; break;
        //caso tenha nível de acesso de Administrador
        case 2: include_once "menuADM.php"; break;   
    }
}
else{ include_once "menu.php"; }
?>