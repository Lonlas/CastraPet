<?php
    class Castracao{
        //Atributos
        private $idcastracao;
        private $idanimal;
        private $idclinica;
        private $horario;
        private $status;
        private $observacao;

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
            $cmd = $con->prepare("INSERT INTO castracao (idanimal, idclinica, horario, status, observacao) 
            VALUES (:idanimal, :idclinica, NULLIF(:horario,''), :status, :observacao)");
            
            //Parâmetros SQL
            $cmd->bindParam(":idanimal", $this->idanimal);
            $cmd->bindParam(":idclinica", $this->idclinica);
            $cmd->bindParam(":horario", $this->horario);
            $cmd->bindParam(":status", $this->status);
            $cmd->bindParam(":observacao", $this->observacao);

            //Executando o comando SQL
            $cmd->execute();
        }
        function consultarSolicitacao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("SELECT idcastracao, aninome, nome FROM castracao join animal on animal.idanimal = castracao.idanimal join usuario on usuario.idusuario = animal.idusuario join login on login.idlogin = usuario.idlogin WHERE status = 'null' ");
        
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }

        function aprovarCastracao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("UPDATE castracao SET idclinica = :idclinica, horario = :horario, status = :status WHERE idcastracao = :idcastracao");

            $cmd->bindParam(":idclinica", $this->idclinica);
            $cmd->bindParam(":horario", $this->horario);
            $cmd->bindParam(":status", $this->status);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            $cmd->execute();
        }

        function recusarCastracao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("UPDATE castracao SET status = :status WHERE idcastracao = :idcastracao");

            $cmd->bindParam(":status", $this->status);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            $cmd->execute();
        }
        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idcastracao, aninome, horario, status, observacao, cpf, cnpj, nome as 'nomeclinica' FROM castracao join animal on castracao.idanimal = animal.idanimal join usuario on animal.idusuario = usuario.idusuario left join clinica on castracao.idclinica = clinica.idclinica join login on login.idlogin = clinica.idlogin");
            
            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }

        function consultarPraClinica()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            //$cmd = $con->prepare("SELECT * FROM castracao");
            $cmd = $con->prepare("SELECT idcastracao, aninome, horario, status, observacao, cpf FROM castracao JOIN animal ON castracao.idanimal = animal.idanimal JOIN usuario ON animal.idusuario = usuario.idusuario JOIN clinica ON castracao.idclinica = clinica.idclinica WHERE clinica.idclinica = :idclinica ORDER BY horario DESC");
            
            $cmd->bindParam(":idclinica", $this->idclinica);

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
            $cmd = $con->prepare("DELETE FROM castracao WHERE idcastracao = :idcastracao");

            //Parâmetros SQL
            $cmd->bindParam(":idcastracao", $this->idcastracao);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE castracao SET idanimal = :idanimal, idclinica = :idclinica, horario = :horario, status = :status, observacao = :observacao WHERE idcastracao = :idcastracao");
            
            //Parâmetros SQL
            $cmd->bindParam(":idanimal", $this->idanimal);
            $cmd->bindParam(":idclinica", $this->idclinica);
            $cmd->bindParam(":horario", $this->horario);
            $cmd->bindParam(":status", $this->status);
            $cmd->bindParam(":observacao", $this->observacao);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT idcastracao, aninome, cpf, observacao, status, email, nome from castracao join animal on animal.idanimal = castracao.idanimal join usuario on usuario.idusuario = animal.idusuario join login on usuario.idlogin = login.idlogin WHERE castracao.idcastracao = :idcastracao");
            
            //Parâmetros SQL
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    }
?>