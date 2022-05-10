<?php
    class Raca
    {
        //Atributos
        private $idraca;
        private $raca;

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

        //Método Cadastrar
        function cadastrar()
        {
            $con = Conexao::conectar();

            //Preparar comando SQL para cadastrar
            $cmd = $con->prepare("INSERT INTO raca (raca) VALUES (:raca)");
            
            //Parâmetros SQL
            $cmd->bindParam(":raca", $this->raca);

            //executa o comando SQL
            $cmd->execute();
        }

        //Método Consultar
        function consultar()
        {
            //Conectar
            $con = Conexao::conectar();

            //Preparar o comando SQL para cadastrar
            $cmd = $con->prepare("SELECT * FROM raca");

            //Executando o comando SQL
            $cmd->execute();
            
            //Retorna os usuários em forma de objeto de dentro de uma matriz
            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }

        //Método Excluir
        function excluir()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para deletar
            $cmd = $con->prepare("DELETE FROM raca WHERE idraca = :idraca");

            //Parâmetros SQL
            $cmd->bindParam(":idraca", $this->idraca);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE raca SET raca = :raca WHERE idraca = :idraca");
            
            //Parâmetros SQL
            $cmd->bindParam(":raca", $this->raca);
            $cmd->bindParam(":idraca", $this->idraca);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM raca WHERE idraca = :idraca");
            
            //Parâmetros SQL
            $cmd->bindParam(":idraca", $this->idraca);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    }
?>