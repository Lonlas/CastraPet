<?php

include_once "model/Login.php";

class LoginController
{
    function logar()
    {
        echo"<script>alert('Usuário Logado'); window.location='".URL."login'; </script>";
    }
}

?>