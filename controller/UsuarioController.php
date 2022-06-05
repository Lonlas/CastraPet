<?php

include_once "model/Usuario.php";
include_once "model/Login.php";
include_once "model/Animal.php";
include_once "model/Castracao.php";
include_once "model/Email.php";
include_once "model/Clinica.php";

class UsuarioController
{
    function cadastrarUsuario(){
        //Cadastro do Login

        $filtros = array(".", "-", "(", ")", " ");
        $cpf = str_replace($filtros,'',$_POST["txtCPF"]);
        $cep = str_replace($filtros,'',$_POST["txtCEP"]);
        $rg = str_replace($filtros,'',$_POST["txtRG"]);
        $tel = str_replace($filtros,'',$_POST["txtTel"]);
        $celular = str_replace($filtros,'',$_POST["txtCelular"]);

        $consultarEmail = new Login();
        $consultarEmail->email = $_POST["txtEmail"];
        $dadosLogin = $consultarEmail->logar();
        if($dadosLogin->email == null)
        {
            $login = new Login();
            $login->nome = $_POST["txtNome"];
            $login->email = $_POST["txtEmail"];
            $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
            $login->nivelacesso = 0;

            //Cadastro do Usuário
            $cadastra = new Usuario();
            $cadastra->idlogin = $login->cadastrar();
            $cadastra->rg = $rg;
            $cadastra->cpf = $cpf;

            if($_POST["chkProtetor"] == 2 && $_FILES["btnProtetorUpload"]["error"] == 0)
                $cadastra->beneficio = $_POST["chkProtetor"];
            else if($_POST["chkNIS"] == 1 && strlen($_POST["txtNIS"]) == 1)
                $cadastra->beneficio = $_POST["chkNIS"];
            else
                $cadastra->beneficio = 0;

            $cadastra->telefone = $tel;
            $cadastra->celular = $celular;
            $cadastra->punicao = 0;
            $cadastra->usurua = $_POST["txtRua"];
            $cadastra->usubairro = $_POST["txtBairro"];
            $cadastra->usunumero = $_POST["txtNumero"];
            $cadastra->usucep = $cep;
            /*
            COLOCAR AQUI O POST QUANDO ATUALIZAR A PÁGINA DE CADASTRO DE USUÁRIO

            $cadastra->whatsapp = $_POST["#"];
            $cadastra->docprotetor = $_POST["#"];
            $cadastra->doccomprovante = $_POST["#"];
            $cadastra->quantcastracoes = 1;
            */
            if(empty($_POST["txtNIS"]))
            {
                $cadastra->nis = "";
            }
            else
            {
                $cadastra->nis = $_POST["txtNIS"];
            }
            
            $cadastra->cadastrar();
            $this->logar();
            header("Location:".URL);
        }
        else
        {
            echo"<script>alert('Já existe um perfil com esse e-mail'); window.location='".URL."cadastra-tutor'; </script>";
        }
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

    function agendarClinicaCastracao()
    {   
        $idcastracao = $_POST["idcastracao"];

        //Caso o botão recusado não seja apertado
        if(!isset($_POST["btnRecusa"]))
        {
            if($_POST["selectClinica"] != 0)
            {
                $castracao = new Castracao();
    
                $castracao->idclinica = $_POST["selectClinica"];
                $castracao->status = 1;
                $castracao->idcastracao = $idcastracao;
                $castracao->aprovarCastracao();

                $clinica = new Clinica();
                $clinica->idclinica = $_POST["selectClinica"];
                $dadosClinica = $clinica->retornar();
                $clinica->vagas = $dadosClinica->vagas - 1;
                $clinica->subtrairVagas();
    
                header("Location:".URL."lista-solicitacao");
            }
            else
            {
                echo "<script>alert('Selecione a clínica e/ou a data'); window.location='".URL."agendamento/$idcastracao'; </script>";
            }
        }
        else if($_POST["btnRecusa"] == "Recusar")
        {
            $castracao = new Castracao();

            $castracao->idcastracao = $idcastracao;
            $castracao->status = 3;

            $castracao->recusarCastracao();

            header("Location:".URL."lista-solicitacao");
        }
    }

    function atualizarCastracao()
    {
        $castracao = new Castracao();
        $castracao->idcastracao = $_POST["idCastracao"];
        if($_POST["statusAtualizado"] == "Castrado")
        {
            $castracao->status = 2;
            $castracao->atualizar();

            if($_POST["status"] == "Não compareceu")
            {
                //Liberar a vaga de castração para a clínica
                $clinica = new Clinica();
                $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                $dadosClinica = $clinica->retornar();
                $clinica->vagas = $dadosClinica->vagas - 1;
                $clinica->subtrairVagas();
            }
        }
        else if($_POST["statusAtualizado"] == "nCompareceu")
        {
            //Adicionar o status de que o animal não compareceu à castração
            $castracao->status = 4;
            $castracao->atualizar();

            //Aplicar uma punição ao tutor que não compareceu à castração
            $usuario = new Usuario();
            $usuario->idusuario = $_POST["idTutor"];
            $usuario->punicao = 1;
            $usuario->aplicarPunicao();    
            
            //Enviar aviso ao usuário dizendo que não compareceu à castração
            $email = new Email();
            $email->emailDestinatario = $_POST["emailTutor"];
            $email->nomeDestinatario = $_POST["nomeTutor"];
            $email->nomeAnimal = $_POST["nomeAnimal"];
            $email->data = $_POST["dataCastracao"];
            $email->enviarAviso();

            if($_POST["status"] != "Não compareceu")
            {
                //Liberar a vaga de castração para a clínica
                $clinica = new Clinica();
                $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                $dadosClinica = $clinica->retornar();
                $clinica->vagas = $dadosClinica->vagas + 1;
                $clinica->adicionarVagas();
            }
            
        }
        else if($_POST["statusAtualizado"] == "emAnalise")
        {
            //Adicionar o status de que o animal retornou para a análise da castração
            $castracao->status = 0;
            $castracao->atualizarEmAnalise();

            if($_POST["status"] != "Não compareceu")
            {
                //Liberar a vaga de castração para a clínica
                $clinica = new Clinica();
                $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                $dadosClinica = $clinica->retornar();
                $clinica->vagas = $dadosClinica->vagas + 1;
                $clinica->adicionarVagas();
            }
        }
        else {echo"<script>alert('Insira um valor válido'); window.location='".URL."consulta-castracao'; </script>"; return;}

        header("Location:".URL."consulta-castracao");
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
    function excluir($idUsuario, $idLogin)
    {
        $usuario = new Usuario();
        $usuario->idusuario = $idUsuario;
        $usuario->excluir();

        $login = new Login();
        $login->idlogin = $idLogin;
        $login->excluir();

        header("location:".URL."consulta-usuario");
    }
}
?>