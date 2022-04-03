<?php
    class Raca
    {
        //Atributos
        private $idRaca;
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
    }
?>