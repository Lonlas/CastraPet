<?php

include_once "model/Usuario.php";
include_once "model/Login.php";
include_once "model/Animal.php";

class UsuarioController
{
    function cadastrarUsuario(){
        //Cadastro do Login
        $login = new Login();
        $login->nome = $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
        $login->nivelacesso = 0;

        //Cadastro do Usuário
        $cadastra = new Usuario();
        $cadastra->idlogin = $login->cadastrar();
        $cadastra->rg = $_POST["txtRG"];
        $cadastra->cpf = $_POST["txtCPF"];

        if($_POST["chkProtetor"] == 2)
            $cadastra->beneficio = $_POST["chkProtetor"];
        else if($_POST["chkNIS"] == 1)
            $cadastra->beneficio = $_POST["chkNIS"];
        else
            $cadastra->beneficio = 0;

        $cadastra->telefone = $_POST["txtTel"];
        $cadastra->celular = $_POST["txtCelular"];
        $cadastra->punicao = 0;
        $cadastra->usurua = $_POST["txtRua"];
        $cadastra->usubairro = $_POST["txtBairro"];
        $cadastra->usunumero = $_POST["txtNumero"];
        $cadastra->usucep = $_POST["txtCEP"];
        if(empty($_POST["txtNIS"]))
        {
            $cadastra->nis = "";
        }
        else
        {
            $cadastra->nis = $_POST["txtNIS"];
        }
        
        $cadastra->cadastrar();

        header("Location:".URL);
    }

    function solicitarCastracao()
    {
        $castracao = new Castracao();
        $castracao->idanimal = $_POST["idAnimal"];
        $castracao->observacao = $_POST["obsCastracao"];
        $castracao->status = 0;

        $castracao->cadastrar();

        echo"<script>alert('Solicitação enviada'); window.location='".URL."meus-animais'; </script>";
    }
    function logar()
    {
        $logar = new Login();
        $logar->email = $_POST["txtEmail"];
        $dadosLogin = $logar->logar();
        
        if($dadosLogin && password_verify($_POST["txtSenha"], $dadosLogin->senha))
        {
            $_SESSION["dadosLogin"] = $dadosLogin;
            
            switch($dadosLogin->nivelacesso)
            {
                //caso seja usuário
                case 0:

                    $usuario = new Login();
                    $usuario->idlogin = $dadosLogin->idlogin;
                    $dadosUsuario = $usuario->retornarUsuario();

                    $animal = new Animal();
                    $animal->idusuario = $dadosUsuario->idusuario;
                    $dadosAnimais = $animal->retornarAnimais();

                    $_SESSION["dadosUsuario"] = $dadosUsuario;
                    $_SESSION["dadosAnimais"] = $dadosAnimais;

                    echo"<script>alert('Usuário Logado'); window.location='".URL."home-usuario'; </script>";
                break;

                //caso seja clínica
                case 1:
                    //Buscando as informações da clínica
                    $clinica = new Login();
                    $clinica->idlogin = $dadosLogin->idlogin;
                    $dadosClinica = $clinica->retornarClinica();

                    //Colocando em uma Sessão
                    $_SESSION["dadosClinica"] = $dadosClinica;

                    echo"<script>alert('Usuário Clínica Logado'); window.location='".URL."home-clinica'; </script>";
                break;

                //caso seja adm
                case 2:
                    echo"<script>alert('Usuário Administrador Logado'); window.location='".URL."home-adm'; </script>";
                break;
                default:
                    header("location:".URL."login");
            }
        }
        else
        {
            echo"<script>alert('Email ou senha estão errados'); window.location='".URL."login'; </script>";
        }
    }
    function sair()
    {
        $_SESSION[] = null;
        session_destroy();
        header("Location:".URL);
    }
}
?>