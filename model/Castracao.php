<?php
    class Castracao{
        //Atributos
        private $idcastracao;
        private $idanimal;
        private $idclinica;
        private $horario;
        private $status;
        private $observacao;
        private $obsclinica;
        private $msgrecusa;

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
            $cmd->bindParam(":idanimal",   $this->idanimal);
            $cmd->bindParam(":idclinica",  $this->idclinica);
            $cmd->bindParam(":horario",    $this->horario);
            $cmd->bindParam(":status",     $this->status);
            $cmd->bindParam(":observacao", $this->observacao);

            //Executando o comando SQL
            $cmd->execute();
        }
        function consultarSolicitacao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("SELECT idcastracao, aninome, nome FROM castracao 
                                        JOIN animal ON animal.idanimal = castracao.idanimal 
                                        JOIN usuario ON usuario.idusuario = animal.idusuario 
                                        JOIN login ON login.idlogin = usuario.idlogin 
                                    WHERE status in('null', 6) ");
        
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }
        function clinicaConsultarSolicitacao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("SELECT idcastracao, aninome, nome FROM castracao 
                                        join animal on animal.idanimal = castracao.idanimal 
                                        join usuario on usuario.idusuario = animal.idusuario 
                                        join login on login.idlogin = usuario.idlogin 
                                    WHERE castracao.idclinica = :idclinica AND horario IS NULL");

            $cmd->bindParam(":idclinica", $this->idclinica);
        
            $cmd->execute();

            return $cmd->fetchAll(PDO::FETCH_OBJ);
        }

        function aprovarCastracao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("UPDATE castracao SET idclinica = :idclinica, horario = nullif(:horario,''), status = :status WHERE idcastracao = :idcastracao");

            $cmd->bindParam(":idclinica",   $this->idclinica);
            $cmd->bindParam(":horario",     $this->horario);
            $cmd->bindParam(":status",      $this->status);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            $cmd->execute();
        }

        function recusarCastracao()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("UPDATE castracao SET status = :status, msgrecusa = nullif(:msgrecusa,'') WHERE idcastracao = :idcastracao");

            $cmd->bindParam(":status",      $this->status);
            $cmd->bindParam(":msgrecusa", $this->msgrecusa);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            $cmd->execute();
        }
        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idcastracao, foto, aninome, horario, status, observacao, cpf, usubairro, usurua, usunumero, cnpj, nome AS 'nomeclinica', obsclinica, animal.idanimal FROM castracao 
                                    JOIN animal ON castracao.idanimal = animal.idanimal 
                                    JOIN usuario ON animal.idusuario = usuario.idusuario  
                                    LEFT JOIN clinica ON castracao.idclinica = clinica.idclinica 
                                    JOIN login ON login.idlogin = clinica.idlogin");
            
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
            $cmd = $con->prepare("SELECT idcastracao, clinica.idclinica, animal.foto, animal.aninome, nome AS 'nometutor', horario, status, observacao, cpf, usuario.idusuario, email, rg, telefone, celular, whatsapp, animal.idanimal 
                                    FROM castracao 
                                        JOIN animal ON castracao.idanimal = animal.idanimal 
                                        JOIN usuario ON animal.idusuario = usuario.idusuario 
                                        JOIN login ON login.idlogin = usuario.idlogin 
                                        JOIN clinica ON castracao.idclinica = clinica.idclinica 
                                    WHERE clinica.idclinica = :idclinica and horario <> 'null' ORDER BY horario DESC");
            
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
            $cmd = $con->prepare("UPDATE castracao SET status = :status, obsclinica = NULLIF(:obsclinica, '') WHERE idcastracao = :idcastracao");
            
            //Parâmetros SQL
            $cmd->bindParam(":status",      $this->status);
            $cmd->bindParam(":obsclinica",  $this->obsclinica);
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            //Executando o comando SQL
            $cmd->execute();
        }
        function reagendar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE castracao SET idclinica = null, horario = null, status = :status, obsclinica = :obsclinica WHERE idcastracao = :idcastracao");
            
            //Parâmetros SQL
            $cmd->bindParam(":status",      $this->status);
            $cmd->bindParam(":obsclinica",  $this->obsclinica);
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
            $cmd = $con->prepare("SELECT idcastracao, aninome, cpf, observacao, status, foto, email, nome, animal.idanimal FROM castracao 
                                        JOIN animal ON animal.idanimal = castracao.idanimal 
                                        JOIN usuario ON usuario.idusuario = animal.idusuario
                                        JOIN login ON usuario.idlogin = login.idlogin 
                                    WHERE castracao.idcastracao = :idcastracao");
            
            //Parâmetros SQL
            $cmd->bindParam(":idcastracao", $this->idcastracao);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        function retornarid()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT idcastracao FROM castracao WHERE castracao.idanimal = :idanimal");
            
            //Parâmetros SQL
            $cmd->bindParam(":idanimal", $this->idanimal);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
    }
?>