<?php
    class Usuario{
        //Atributos
        private $idusuario;
        private $idlogin;
        private $rg;
        private $cpf;
        private $beneficio;
        private $telefone;
        private $celular;
        private $punicao;
        private $usurua;
        private $usubairro;
        private $usunumero;
        private $usucep;
        private $nis;
        private $whatsapp;
        private $doccomprovante;
        //private $docprotetor;
        private $quantcastracoes;
        //Método get
        function __get($atributo)
        {
            return $this->$atributo;
        }

        //Método set
        function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        //Método construtor
        function __construct()
        {
            //Importando arquivo de conexão com banco de dados
            include_once "Conexao.php";
        }


        //Método cadastrar
        function cadastrar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para cadastrar
            $cmd = $con->prepare("INSERT INTO usuario (idlogin, rg, cpf, beneficio, telefone, celular, punicao, usurua, usubairro, usunumero, usucep, nis, whatsapp, doccomprovante, quantcastracoes) 
                                    VALUES (:idlogin, :rg, :cpf, :beneficio, NULLIF(:telefone,''), :celular, :punicao, :usurua, :usubairro, :usunumero, :usucep, NULLIF(:nis,''), :whatsapp, :doccomprovante, :quantcastracoes)");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin",         $this->idlogin);
            $cmd->bindParam(":rg",              $this->rg);
            $cmd->bindParam(":cpf",             $this->cpf);
            $cmd->bindParam(":beneficio",       $this->beneficio);
            $cmd->bindParam(":telefone",        $this->telefone);
            $cmd->bindParam(":celular",         $this->celular);
            $cmd->bindParam(":punicao",         $this->punicao);
            $cmd->bindParam(":usurua",          $this->usurua);
            $cmd->bindParam(":usubairro",       $this->usubairro);
            $cmd->bindParam(":usunumero",       $this->usunumero);
            $cmd->bindParam(":usucep",          $this->usucep);
            $cmd->bindParam(":nis",             $this->nis);
            $cmd->bindParam(":whatsapp",        $this->whatsapp);
            $cmd->bindParam(":doccomprovante",  $this->doccomprovante);
            //$cmd->bindParam(":docprotetor",     $this->docprotetor);
            $cmd->bindParam(":quantcastracoes", $this->quantcastracoes);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idusuario, login.idlogin, doccomprovante, nome, email, cpf, rg, beneficio, nis, telefone, celular, whatsapp, usucep, usubairro, usurua, usunumero, punicao 
                                    FROM usuario JOIN login ON usuario.idlogin = login.idlogin");
            
            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }

        //Método excluir
        function excluir()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para deletar
            $cmd = $con->prepare("DELETE FROM usuario WHERE idusuario = :idusuario");

            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
           /* $cmd = $con->prepare("UPDATE usuario SET 
                                                    rg = :rg, 
                                                    cpf = :cpf, 
                                                    beneficio = :beneficio, 
                                                    telefone = NULLIF(:telefone,''), 
                                                    celular = :celular, 
                                                    punicao = :punicao, 
                                                    usurua = :usurua, 
                                                    usubairro = :usubairro, 
                                                    usunumero = :usunumero, 
                                                    usucep = :usucep, 
                                                    nis = NULLIF(:nis,''), 
                                                    whatsapp = :whatsapp, 
                                                    doccomprovante = :doccomprovante, 
                                                    docprotetor = NULLIF(:docprotetor,''), 
                                                    quantcastracoes = :quantcastracoes
                                      WHERE idusuario = :idusuario");*/
            $cmd = $con->prepare("UPDATE usuario SET 
                                                rg = :rg, 
                                                cpf = :cpf,
                                                beneficio = :beneficio,
                                                telefone = NULLIF(:telefone,''), 
                                                celular = :celular,
                                                usurua = :usurua, 
                                                usubairro = :usubairro, 
                                                usunumero = :usunumero, 
                                                usucep = :usucep, 
                                                nis = NULLIF(:nis,''),
                                                whatsapp = :whatsapp,
                                                punicao = :punicao
                                            WHERE idusuario = :idusuario");
                
            //Parâmetros SQL
            $cmd->bindParam(":rg",              $this->rg);
            $cmd->bindParam(":cpf",             $this->cpf);
            $cmd->bindParam(":beneficio",       $this->beneficio);
            $cmd->bindParam(":telefone",        $this->telefone);
            $cmd->bindParam(":celular",         $this->celular);
            $cmd->bindParam(":usurua",          $this->usurua);
            $cmd->bindParam(":usubairro",       $this->usubairro);
            $cmd->bindParam(":usunumero",       $this->usunumero);
            $cmd->bindParam(":usucep",          $this->usucep);
            $cmd->bindParam(":nis",             $this->nis);
            $cmd->bindParam(":whatsapp",        $this->whatsapp);
            $cmd->bindParam(":punicao",         $this->punicao);
            $cmd->bindParam(":idusuario",       $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método atualizar dados usuario
        function atualizarDadosUsuario()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE usuario SET 
                                                    rg = :rg, 
                                                    telefone = NULLIF(:telefone,''), 
                                                    celular = :celular,
                                                    nis = NULLIF(:nis,''), 
                                                    beneficio = :beneficio, 
                                                    whatsapp = :whatsapp
                                      WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":rg",              $this->rg);
            $cmd->bindParam(":telefone",        $this->telefone);
            $cmd->bindParam(":celular",         $this->celular);
            $cmd->bindParam(":nis",             $this->nis);
            $cmd->bindParam(":beneficio",       $this->beneficio);
            $cmd->bindParam(":whatsapp",        $this->whatsapp);
            $cmd->bindParam(":idusuario",       $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método atualizar endereço usuario
        function atualizarEnderecoUsuario()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE usuario SET 
                                                    usurua = :usurua, 
                                                    usubairro = :usubairro, 
                                                    usunumero = :usunumero, 
                                                    usucep = :usucep,
                                                    doccomprovante = :doccomprovante
                                      WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":usurua",          $this->usurua);
            $cmd->bindParam(":usubairro",       $this->usubairro);
            $cmd->bindParam(":usunumero",       $this->usunumero);
            $cmd->bindParam(":usucep",          $this->usucep);
            $cmd->bindParam(":doccomprovante",  $this->doccomprovante);
            $cmd->bindParam(":idusuario",       $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM usuario JOIN login ON usuario.idlogin = login.idlogin WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        function verificarNis()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT nis FROM usuario WHERE nis = :nis");
            
            //Parâmetros SQL
            $cmd->bindParam(":nis", $this->nis);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        function verificarCPF()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT cpf FROM usuario WHERE cpf = :cpf");
            
            //Parâmetros SQL
            $cmd->bindParam(":cpf", $this->cpf);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        //Método para punição
        function aplicarPunicao()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("UPDATE usuario SET punicao = :punicao WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":punicao",   $this->punicao);
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        function retornarQuantCastracao()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT quantcastracoes FROM usuario WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        //Atualizar quantidade de castrações
        function atualizarQuantCastracoes()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para atualizar
            $cmd = $con->prepare("UPDATE usuario SET quantcastracoes = :quantcastracoes WHERE idusuario = :idusuario");
                
            //Parâmetros SQL
            $cmd->bindParam(":quantcastracoes", $this->quantcastracoes);
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        function novoMes()
        {
           //Conectando ao banco de dados
           $con = Conexao::conectar();

           //Preparar comando SQL para retornar
           $cmd = $con->prepare("UPDATE usuario SET quantcastracoes = :quantcastracoes, punicao = :punicao WHERE idusuario = :idusuario");
            
           //Parâmetros SQL
           $cmd->bindParam(":quantcastracoes",   $this->quantcastracoes);
           $cmd->bindParam(":punicao",           $this->punicao);
           $cmd->bindParam(":idusuario",           $this->idusuario);
           //Executando o comando SQL
           $cmd->execute();
        }
    }
?>