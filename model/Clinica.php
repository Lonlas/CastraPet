<?php
    class Clinica{
        //Atributos
        private $idclinica;
        private $idlogin;
        private $cnpj;
        private $clitelefone;
        private $vagas;
        private $clirua;
        private $clibairro;
        private $clinumero;
        private $clicep;
        private $ativo;

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
            $cmd = $con->prepare("INSERT INTO clinica (idlogin, cnpj, clitelefone, vagas, clirua, clibairro, clinumero, clicep, ativo) 
                                        VALUES (:idlogin, :cnpj, :clitelefone, :vagas, :clirua, :clibairro, :clinumero, :clicep, :ativo)");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin",     $this->idlogin);
            $cmd->bindParam(":cnpj",        $this->cnpj);
            $cmd->bindParam(":clitelefone", $this->clitelefone);
            $cmd->bindParam(":vagas",       $this->vagas);
            $cmd->bindParam(":clirua",      $this->clirua);
            $cmd->bindParam(":clibairro",   $this->clibairro);
            $cmd->bindParam(":clinumero",   $this->clinumero);
            $cmd->bindParam(":clicep",      $this->clicep);
            $cmd->bindParam("ativo",        $this->ativo);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idclinica, login.idlogin, nome, email, cnpj, clitelefone, vagas, clirua, clibairro, clinumero, clicep, ativo
                                    FROM clinica JOIN login ON clinica.idlogin = login.idlogin");
            
            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }
        function consultarComVagas()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idclinica, nome, email, cnpj, clitelefone, vagas, clirua, clibairro, clinumero, clicep 
                                    FROM clinica JOIN login ON clinica.idlogin = login.idlogin WHERE clinica.vagas > 0 and clinica.ativo = 1");
            
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
            $cmd = $con->prepare("DELETE FROM clinica WHERE idclinica = :idclinica");

            //Parâmetros SQL
            $cmd->bindParam(":idclinica", $this->idclinica);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE clinica SET cnpj = :cnpj, clitelefone = :clitelefone, vagas = :vagas, clirua = :clirua, 
                                    clibairro = :clibairro, clinumero = :clinumero, clicep = :clicep, ativo = :ativo WHERE idclinica = :idclinica");
            
            //Parâmetros SQL
            $cmd->bindParam(":cnpj",        $this->cnpj);
            $cmd->bindParam(":clitelefone", $this->clitelefone);
            $cmd->bindParam(":vagas",       $this->vagas);
            $cmd->bindParam(":clirua",      $this->clirua);
            $cmd->bindParam(":clibairro",   $this->clibairro);
            $cmd->bindParam(":clinumero",   $this->clinumero);
            $cmd->bindParam(":clicep",      $this->clicep);
            $cmd->bindParam(":idclinica",   $this->idclinica);
            $cmd->bindParam(":ativo",       $this->ativo);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT clinica.*, nome FROM clinica join login on login.idlogin = clinica.idlogin WHERE idclinica = :idclinica");
            
            //Parâmetros SQL
            $cmd->bindParam(":idclinica", $this->idclinica);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        
        function alterarVagas()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("UPDATE clinica SET vagas = :vagas WHERE idclinica = :idclinica");
            
            //Parâmetros SQL
            $cmd->bindParam(":vagas",     $this->vagas);
            $cmd->bindParam(":idclinica", $this->idclinica);

            //Executando o comando SQL
            $cmd->execute();
        }
    }
?>