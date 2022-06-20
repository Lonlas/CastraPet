<?php

include_once "model/Usuario.php";
include_once "model/Login.php";
include_once "model/Animal.php";
include_once "model/Castracao.php";
include_once "model/Email.php";
include_once "model/Clinica.php";

class UsuarioController
{
    function novoMes(){

        $tutores = new Usuario();
        $dadosTutor = $tutores->consultar();
        
        foreach($dadosTutor as $tutor)
        {
            switch($tutor->beneficio){
                case 0:
                    $tutores->quantcastracoes = 1;
                    if($tutor->punicao > 0)
                    {
                        $tutores->punicao = $tutor->punicao - 1; 
                    }
                    else
                        $tutores->punicao = 0;
                    $tutores->idusuario = $tutor->idusuario;
                    $tutores->novoMes();
                break;
                case 1:
                        $tutores->quantcastracoes = 2;
                    if($tutor->punicao > 0)
                    {
                        $tutores->punicao = $tutor->punicao - 1; 
                    }
                    else
                        $tutores->punicao = 0;
                    $tutores->idusuario = $tutor->idusuario;
                    $tutores->novoMes();
                break;
                case 2:
                    $tutores->quantcastracoes = 5;
                    if($tutor->punicao > 0)
                    {
                        $tutores->punicao = $tutor->punicao - 1; 
                    }
                    else
                        $tutores->punicao = 0;
                    $tutores->idusuario = $tutor->idusuario;
                    $tutores->novoMes();
                break;
                case 3:
                    if(strlen($tutor->nis) == 11)
                    {
                        $tutores->quantcastracoes = 2;
                        if($tutor->punicao > 0)
                        {
                            $tutores->punicao = $tutor->punicao - 1; 
                        }
                        else
                            $tutores->punicao = 0;
                        $tutores->idusuario = $tutor->idusuario;
                        $tutores->novoMes();
                    }
                    else
                    {
                        $tutores->quantcastracoes = 1;
                        if($tutor->punicao > 0)
                        {
                            $tutores->punicao = $tutor->punicao - 1; 
                        }
                        else
                            $tutores->punicao = 0;
                        $tutores->idusuario = $tutor->idusuario;
                        $tutores->novoMes();
                    } 
                break;
            }
        }
        echo"<script>alert('Novo mês iniciado com sucesso!'); window.location='".URL."home-adm'; </script>";
    }


    function cadastrarUsuario(){
        //Cadastro do Login

        //verificando se o comprovante de endereço foi enviado corretamente
        if($_FILES["btnComprovante"]["error"] == 0)
        {
              
            //filtrando a mascara dos inputs
            $filtros = array(".", "-", "(", ")", " ");
            $cpf = str_replace($filtros,'',$_POST["txtCPF"]);
            $cep = str_replace($filtros,'',$_POST["txtCEP"]);
            $rg = str_replace($filtros,'',$_POST["txtRG"]);
            $tel = str_replace($filtros,'',$_POST["txtTel"]);
            $celular = str_replace($filtros,'',$_POST["txtCelular"]);
            $nis = str_replace($filtros,'',$_POST["txtNIS"]);
            
            $consultarEmail = new Login();
            $consultarEmail->email = $_POST["txtEmail"];

            $consultarCPF = new Usuario();
            $consultarCPF->cpf = $cpf;

            //Verificando o NIS
            if($_POST["chkNIS"] == "sim" && isset($nis))
            {
                if(strlen($nis) == 11)
                {
                    $consultarNIS = new Usuario();
                    $consultarNIS->nis = $nis;
                    $dadosConsultaNIS = $consultarNIS->verificarNis();
                }
                else
                {
                    echo"<script>alert('Digite um NIS válido'); window.location='".URL."cadastra-tutor'; </script>";
                    return;
                }
            }
            else
                $dadosConsultaNIS = null;
            
            //verificando se o email ou cpf ou nis já existem no banco ou não     
            if($consultarEmail->logar() == null && $consultarCPF->verificarCPF() == null && $dadosConsultaNIS == null)
            {
                $login = new Login();
                $login->nome =  $_POST["txtNome"];
                $login->email = $_POST["txtEmail"];
                $login->senha = password_hash($_POST["txtSenha"], PASSWORD_DEFAULT);
                $login->nivelacesso = 0;
    
                //Cadastro do Usuário
                $cadastra = new Usuario();
                $cadastra->rg = strtoupper($rg);
                if(!$this->validaCPF($cpf))
                {
                    echo"<script>alert('Digite um CPF válido'); window.location='".URL."cadastra-tutor'; </script>";
                    return;
                }
                $cadastra->cpf = $cpf;
                $cadastra->beneficio = 0;
                $cadastra->telefone = $tel;
                if(strlen($celular) != 11)
                {
                    echo"<script>alert('Digite um celular válido'); window.location='".URL."cadastra-tutor'; </script>";
                    return;
                }
                $cadastra->celular = $celular;
                $cadastra->punicao = 0;
                $cadastra->usurua =    $_POST["txtRua"];
                $cadastra->usubairro = $_POST["txtBairro"];
                $cadastra->usunumero = $_POST["txtNumero"];
                $cadastra->usucep = $cep;
                if($_POST["chkWhats"] == "sim")
                $cadastra->whatsapp = 1;
                else
                    $cadastra->whatsapp = 0;

                //TRATANDO O COMPROVANTE DE ENDEREÇO
                //Tratar o envio da imagem
                $docComprovante = $_FILES["btnComprovante"]["name"];       //Nome do arquivo
                $docComprovanteTemp = $_FILES["btnComprovante"]["tmp_name"];      //nome temporário
                
                //pegar a extensão do arquivo
                $info = new SplFileInfo($docComprovante);
                $extensao = $info->getExtension();

                if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
                {
                    echo"<script>alert('O comprovante de endereço deve ser enviado em formato jpg, png ou jpeg'); window.location='".URL."cadastra-tutor'; </script>";
                    return;
                }
                //gerar novo nome
                $novoNomeComprovante = md5(microtime()) . ".$extensao";
                
                $pastaDestino = "recursos/img/docComprovantes/$novoNomeComprovante";    //pasta destino
                move_uploaded_file($docComprovanteTemp, $pastaDestino);       //mover o arquivo 
                $cadastra->doccomprovante = $novoNomeComprovante;
                
                $cadastra->quantcastracoes = 1;
                
                if(empty($nis))
                {
                    $cadastra->nis = "";
                }
                else
                {
                    $cadastra->nis = $nis;
                    $cadastra->beneficio = 1;
                    $cadastra->quantcastracoes = 2;
                }
                
                $cadastra->idlogin = $login->cadastrar();
                $cadastra->cadastrar();
                $this->logar();
                header("Location:".URL);
            }
            else
            {
                echo"<script>alert('Já existe um perfil com esse e-mail, CPF ou NIS cadastrados'); window.location='".URL."cadastra-tutor'; </script>";
                return;
            }
        }
        else
        {
            echo"<script>alert('Houve um erro ao enviar o comprovante de residência'); window.location='".URL."cadastra-tutor'; </script>";
            return;
        }
    }

    function validaCPF($cpf) {
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
    
    
    function atualizarUsuario()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            //filtrando a mascara dos inputs
            $filtros = array(".", "-", "(", ")", " ");
            $cpf = str_replace($filtros,'',$_POST["txtCPF"]);
            $cep = str_replace($filtros,'',$_POST["txtCEP"]);
            $rg = str_replace($filtros,'',$_POST["txtRG"]);
            $tel = str_replace($filtros,'',$_POST["txtTel"]);
            $celular = str_replace($filtros,'',$_POST["txtCelular"]);
            $nis = str_replace($filtros,'',$_POST["txtNIS"]);

            $login = new Login();
            $login->idlogin = $_POST["idlogin"]; 
            $login->nome =    $_POST["txtNome"];
            $login->email =   $_POST["txtEmail"];
            $login->atualizarLogin();


            $usu = new Usuario();
            $usu->rg =        strtoupper($rg);
            $usu->cpf =       $cpf;

            // Que tipo de benefício tem
            if (isset($_POST["chkProtetor"])) {
                $usu->beneficio = $_POST["chkProtetor"];
            }
            else if(isset($_POST["chkNIS"])){
                $usu->beneficio = $_POST["chkNIS"];
            }
            else{ $usu->beneficio = 0; }

            $usu->telefone =  $tel;
            $usu->celular =   $celular;
            $usu->usurua =    $_POST["txtRua"];
            $usu->usubairro = $_POST["txtBairro"];
            $usu->usunumero = $_POST["txtNumero"];
            $usu->usucep =    $cep;
            
                // NIS
                if(empty($nis)){
                    $usu->nis = "";
                }
                else{ $usu->nis = $nis;}

            $usu->idusuario = $_POST["idusuario"];
            if(isset($_POST["chkPunicao"]))
            {
                $usu->punicao = $_POST["chkPunicao"];
            }else{
                $usu->punicao = 0;
            }
            $usu->atualizar();

            echo "<script>
                    alert('Dados alterados com sucesso!');
                    window.location='".URL."consulta-usuario/';
                </script>";
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }
    
    function alterarSenha()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0) {

            $alterar = new Login();
            $alterar->senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
            $alterar->alterarSenha();

            header("Location:".URL."perfil");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function solicitarCastracao()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0) {
            $castracao = new Castracao();
            $usuario = new Usuario();
            $usuario->idusuario = $_SESSION["dadosUsuario"]->idusuario;
            $dadosUsuario = $usuario->retornar();
            
            if($dadosUsuario->quantcastracoes >= 0)
            {
                $castracao->idusuario = $usuario->idusuario;
                $castracao->idanimal = $_POST["idAnimal"];
                $castracao->observacao = $_POST["obsCastracao"];
                $castracao->status = 0;
                $_SESSION["dadosUsuario"]->quantcastracoes--;
                $usuario->quantcastracoes = $_SESSION["dadosUsuario"]->quantcastracoes;
    
                $usuario->atualizarQuantCastracoes();
                $castracao->cadastrar();
    
                echo"<script>alert('Solicitação enviada'); window.location='".URL."meus-animais'; </script>";
            }
            else
            {
                echo"<script>alert('Seu limite de castrações foi atingido'); window.location='".URL."meus-animais'; </script>";
            }
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function agendarClinicaCastracao()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
   
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
                    $clinica->alterarVagas();
        
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
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function atualizarCastracao()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 1) {

            $castracao = new Castracao();
            $castracao->idcastracao = $_POST["idCastracao"];

            switch($_POST["statusAtualizado"])
            {
                case 2:
                    // Animal castrado

                    $castracao->status = 2;  
                    $castracao->atualizar();

                    $animal = new Animal();
                    $animal->idanimal = $_POST["idAnimal"];
                    $animal->codchip = $_POST["codChip"];
                    $animal->atualizarCastrado();
                    
                    if($_POST["status"] == 4 || $_POST["status"] == 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas - 1;
                        $clinica->alterarVagas();
                    }
                break;
                case 4:
                    // Não compareceu 

                    //Adicionar o status de que o animal não compareceu à castração
                    $castracao->status = 4;
                    $castracao->atualizar();

                    //Aplicar uma punição ao tutor que não compareceu à castração
                    $usuario = new Usuario();
                    $usuario->idusuario = $_POST["idTutor"];
                    $usuario->punicao = 2;
                    $usuario->aplicarPunicao();    
                    
                    //Enviar aviso ao usuário dizendo que não compareceu à castração
                    $email = new Email();
                    $email->emailDestinatario = $_POST["emailTutor"];
                    $email->nomeDestinatario =  $_POST["nomeTutor"];
                    $email->nomeAnimal =        $_POST["nomeAnimal"];
                    $email->data =              $_POST["dataCastracao"];
                    $email->enviarAviso();

                    if($_POST["status"] != 4 && $_POST["status"] != 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas + 1;
                        $clinica->alterarVagas();
                    }
                break; 
                case 5:
                    // Castração cancelada

                    $castracao->status = 5;
                    $castracao->excluir();

                    if($_POST["status"] != 4 && $_POST["status"] != 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas + 1;
                        $clinica->alterarVagas();
                    }
                break; 
                case 6:
                    // Reagendar castração

                    //Adicionar o status de que o animal retornou para a análise da castração
                    $castracao->status = 6;
                    $castracao->obsclinica = $_POST["obsClinica"];
                    $castracao->reagendar();

                    if($_POST["status"] != 4 && $_POST["status"] != 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas + 1;
                        $clinica->alterarVagas();
                    }
                break; 
                case 7:
                    // Animal veio a óbito

                    $castracao->status = 7;
                    $castracao->atualizar();

                    if($_POST["status"] != 4 && $_POST["status"] != 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas + 1;
                        $clinica->alterarVagas();
                    }
                break; 
                case 8:
                    // Animal castrado(mas com alterações)

                    $castracao->status = 8;
                    $castracao->obsclinica = $_POST["obsClinica"];
                    $castracao->atualizar();

                    $animal = new Animal();
                    $animal->idanimal = $_POST["idAnimal"];
                    $animal->codchip = $_POST["codChip"];
                    $animal->atualizarCastrado();

                    if($_POST["status"] == 4 || $_POST["status"] == 7)
                    {
                        //Liberar a vaga de castração para a clínica
                        $clinica = new Clinica();
                        $clinica->idclinica = $_SESSION["dadosClinica"]->idclinica;
                        $dadosClinica = $clinica->retornar();
                        $clinica->vagas = $dadosClinica->vagas - 1;
                        $clinica->alterarVagas();
                    }
                break;
                default:
                    echo"<script>alert('Insira um valor válido'); window.location='".URL."consulta-castracao'; </script>"; return; 
            }
            
            header("Location:".URL."consulta-castracao");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    //Excluir Castração
    function excluirCastracao($id)
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            $castracao = new Castracao();
            $castracao->idcastracao = $id;
            $castracao->excluir();

            header("Location:".URL."consulta-castracao");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
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
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {

            $usuario = new Usuario();
            $usuario->idusuario = $idUsuario;
            $usuario->excluir();

            $login = new Login();
            $login->idlogin = $idLogin;
            $login->excluir();

            header("location:".URL."consulta-usuario/");
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function recuperarSenha()
    {
        $login = new Login();
        $login->email = $_POST["txtEmail"];
        $dadosRecuperacao = $login->logar();
        if($dadosRecuperacao && $dadosRecuperacao->nivelacesso == 0)
        {
            $codigo = rand(100000,999999);
    
            $email = new Email();
            $email->emailDestinatario = $_POST["txtEmail"];
            $email->codsenha = $codigo;
            $email->enviarRecuperacao();
            
            $login->codsenha = $codigo;
            $login->gerarCodigo();

            header("Location:".URL."codigo-de-recuperacao/$dadosRecuperacao->email");
        }
        else
        {
            setcookie("msg","Parece que esse E-mail não existe no sistema");
            header("Location:".URL."esqueci-a-senha");
        }
    }
    function confirmarCodigo()
    {
        $login = new Login();
        $login->email = $_POST["txtEmail"];
        $dadosConfirmacao = $login->confirmarCodigo();

        $_SESSION["idlogin"] = $dadosConfirmacao->idlogin;
        $codigo = $_POST["txtCod"];

        
        if(empty($_COOKIE["tentativas"])){setcookie("tentativas", 1, time() + 3600, "/");}
        

        //RESETAR O COOKIE QUE LIMITA A QUANTITADE DE TENTATIVAS PARA O CÓDIGO. USAR PARA DEBUGAR
        //setcookie("tentativas", "", time() - 1000, "/");

        if($_COOKIE["tentativas"] < 5)
        {
            if(isset($codigo) && strlen($codigo) === 6 && $codigo === $dadosConfirmacao->codsenha)
            { 
                //cookie para permitir o usuário de abrir a tela alterarsenha
                setcookie("tentativas", "", time() - 1000, "/");
                setcookie("confirmacao",$dadosConfirmacao->idlogin);
                header("Location:".URL."alterar-senha/$dadosConfirmacao->idlogin");
                return;
            }
            else
            {
                setcookie("tentativas", 1 + $_COOKIE["tentativas"], time() + 3600, "/");
                setcookie("msg","Codigo inválido! Tente novamente");
                header("Location:".URL."codigo-de-recuperacao/".$_POST["txtEmail"]);
                return;
            }
        }
        else
        {
            echo"<script>alert('Você fez muitas tentativas, tente novamente mais tarde'); window.location='".URL."login'; </script>";
        }
    }

    function redefinirSenha()
    {

        if(isset($_SESSION["dadosLogin"]) && $_SESSION["dadosLogin"]->nivelacesso == 0)
        {
            //redefinir senha e limpar o campo codsenha
            $login = new Login();
            $login->idlogin = $_SESSION["dadosLogin"]->idlogin;
            $login->senha = password_hash($_POST["confSenha"], PASSWORD_DEFAULT);
            $login->redefinirSenha();

            $_SESSION["idlogin"] = null;
            $this->sair();

            header("Location:".URL."login");
        }
        else if(!isset($_SESSION["dadosLogin"]) && $_COOKIE["confirmacao"] == $_SESSION["idlogin"])
        {
            //redefinir senha e limpar o campo codsenha
            $login = new Login();
            $login->idlogin = $_SESSION["idlogin"];
            $login->senha = password_hash($_POST["confSenha"], PASSWORD_DEFAULT);
            $login->redefinirSenha();

            setcookie("confirmacao","", time() - 3600);

            $_SESSION["idlogin"] = null;
            $this->sair();

            header("Location:".URL."login");
        }
        else
        echo"<script>alert('Erro ao alterar a senha'); window.location='".URL."alterar-senha'; </script>";
    }
}
?>