<?php

include_once "model/Usuario.php";
include_once "model/Login.php";

class UsuarioController
{
    function abrirCadastro(){
        include "view/cadastro.php";
    }
    function abrirLogin(){
        include "view/login.php";
    }
    function abrirSolicitacao(){
        include "view/solicitaCastra.php";
    }
    function cadastrarUsuario(){
        //Cadastro do Login
        $login = new Login();
        $login->nome = $_POST["txtNome"];
        $login->email = $_POST["txtEmail"];
        $login->senha = $_POST["txtSenha"];

        //Cadastro do Usuário
        $cadastra = new Usuario();
        $cadastra->idlogin = $login->cadastrar();
        $cadastra->rg = $_POST["txtRG"];
        $cadastra->cpf = $_POST["txtCPF"];
        if($_POST["chkProtetor"] == 1)
        {
            $cadastra->beneficio = $_POST["chkProtetor"];
        }
        else if($_POST["chkNIS"] == 2)
        {
            $cadastra->beneficio = $_POST["chkNIS"];
        }
        else
        {
            $cadastra->beneficio = 0;
        }
        
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
        
        $cadastra->cadastrar();
    }
    function teste()
    {
        echo 
        "<table border=1>
            <tr>
                <th>
                    <h1>tbLogin</h1>
                </th>
            </tr>
            <tr>
                <td> Nome: ";
                    if(strlen($_POST["txtNome"]) <= 10 && !empty($_POST["txtNome"]))
                    {
                        echo $_POST["txtNome"];
                    }
                    else
                    {
                        echo "<script>
                                alert('Ocorreu um erro, tente cadastrar novamente!');
                                window.location='" . URL . "cadastro-usuario';
                            </script>";
                    }
                echo "</td>
            </tr>
            <tr>
                <td>
                    Email: ". $_POST["txtEmail"] ."
                </td>
            </tr>
            <tr>
                <td>
                    Senha: ". $_POST["txtSenha"] ."
                </td>
            </tr>
        </table>";

        echo "<br/>";

        echo 
        "<table border=1>
            <tr>
                <th>
                    <h1>tbUsuario</h1>
                </th>
            </tr>
            <tr>
                <td>
                idLogin: 
                </td>
            </tr>
            <tr>
                <td>
                RG: ". $_POST["txtRG"] ."
                </td>
            </tr>
            <tr>
                <td>
                CPF: ". $_POST["txtCPF"] ."
                </td>
            </tr>
            <tr>
                <td>
                Benefício: ";
                if($_POST["chkProtetor"] == 1)
                {
                    echo "Protetor";
                }
                else if($_POST["chkNIS" == 2])
                {
                    echo $_POST["chkNIS"];
                }
                else
                {
                    echo 0;
                }
                echo "</td>
            </tr>
            <tr>
                <td>
                    Telefone: ". $_POST["txtTel"] ."
                </td>
            </tr>
            <tr>
                <td>
                    Celular: ". $_POST["txtCelular"] ."
                </td>
            </tr>
            <tr>
                <td>
                    Punicao: 0
                </td>
            </tr>
            <tr>
                <td>
                    Rua: ". $_POST["txtRua"] ."
                </td>
            </tr>
            <tr>
                <td>
                    Bairro : ". $_POST["txtBairro"] ."
                </td>
            </tr>
            <tr>
                <td>
                    CEP: ". $_POST["txtCEP"] ."
                </td>
            </tr>
        </table>";
    }
}
?>