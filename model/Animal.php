<?php
    class Animal{
        //Atributos
        private $idanimal;
        private $idusuario;
        private $idraca;
        private $aninome;
        private $especie;
        private $sexo;
        private $cor;
        private $pelagem;
        private $porte;
        private $idade;
        private $comunitario;

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
            $cmd = $con->prepare("INSERT INTO animal (idusuario, idraca, aninome, especie, sexo, cor, pelagem, porte, idade, comunitario) VALUES (:idusuario, :idraca, :aninome, :especie, :sexo, :cor, :pelagem, :porte, :idade, :comunitario)");
            
            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);
            $cmd->bindParam(":idraca", $this->idraca);
            $cmd->bindParam(":aninome", $this->aninome);
            $cmd->bindParam(":especie", $this->especie);
            $cmd->bindParam(":sexo", $this->sexo);
            $cmd->bindParam(":cor", $this->cor);
            $cmd->bindParam(":pelagem", $this->pelagem);
            $cmd->bindParam(":porte", $this->porte);
            $cmd->bindParam(":idade", $this->idade);
            $cmd->bindParam(":comunitario", $this->comunitario);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT * FROM animal");
            
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
            $cmd = $con->prepare("DELETE FROM animal WHERE idanimal = :idanimal");

            //Parâmetros SQL
            $cmd->bindParam(":idanimal", $this->idanimal);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE animal SET idusuario = :idusuario, idraca = :idraca, aninome = :aninome, especie = :especie, sexo = :sexo, cor = :cor, pelagem = :pelagem, porte = :porte, idade = :idade, comunitario = :comunitario WHERE idanimal = :idanimal");
            
            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);
            $cmd->bindParam(":idraca", $this->idraca);
            $cmd->bindParam(":aninome", $this->aninome);
            $cmd->bindParam(":especie", $this->especie);
            $cmd->bindParam(":sexo", $this->sexo);
            $cmd->bindParam(":cor", $this->cor);
            $cmd->bindParam(":pelagem", $this->pelagem);
            $cmd->bindParam(":porte", $this->porte);
            $cmd->bindParam(":idade", $this->idade);
            $cmd->bindParam(":comunitario", $this->comunitario);
            $cmd->bindParam(":idanimal", $this->idanimal);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM animal WHERE idanimal = :idanimal");
            
            //Parâmetros SQL
            $cmd->bindParam(":idanimal", $this->idanimal);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    }
?>