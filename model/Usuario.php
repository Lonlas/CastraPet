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
            $cmd = $con->prepare("INSERT INTO usuario (idlogin, rg, cpf, beneficio, telefone, celular, punicao, usurua, usubairro, usunumero, usucep, nis) 
            VALUES (:idlogin, :rg, :cpf, :beneficio, NULLIF(:telefone,''), :celular, :punicao, :usurua, :usubairro, :usunumero, :usucep, NULLIF(:nis,''))");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin",   $this->idlogin);
            $cmd->bindParam(":rg",        $this->rg);
            $cmd->bindParam(":cpf",       $this->cpf);
            $cmd->bindParam(":beneficio", $this->beneficio);
            $cmd->bindParam(":telefone",  $this->telefone);
            $cmd->bindParam(":celular",   $this->celular);
            $cmd->bindParam(":punicao",   $this->punicao);
            $cmd->bindParam(":usurua",    $this->usurua);
            $cmd->bindParam(":usubairro", $this->usubairro);
            $cmd->bindParam(":usunumero", $this->usunumero);
            $cmd->bindParam(":usucep",    $this->usucep);
            $cmd->bindParam(":nis",       $this->nis);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT idusuario, nome, email, cpf, beneficio, nis, telefone, celular, usucep, usubairro, usurua, usunumero, punicao FROM usuario JOIN login ON usuario.idlogin = login.idlogin");
            
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
            $cmd = $con->prepare("UPDATE usuario SET idlogin = :idlogin, rg = :rg, cpf = :cpf, beneficio = :beneficio, telefone = NULLIF(:telefone,''), celular = :celular, punicao = :punicao,
                                         usurua = :usurua, usubairro = :usubairro, usunumero = :usunumero, usucep = :usucep, nis = NULLIF(:nis,'') WHERE idusuario = :idusuario");
                
            //Parâmetros SQL
            $cmd->bindParam(":idlogin",   $this->idlogin);
            $cmd->bindParam(":rg",        $this->rg);
            $cmd->bindParam(":cpf",       $this->cpf);
            $cmd->bindParam(":beneficio", $this->beneficio);
            $cmd->bindParam(":telefone",  $this->telefone);
            $cmd->bindParam(":celular",   $this->celular);
            $cmd->bindParam(":punicao",   $this->punicao);
            $cmd->bindParam(":usurua",    $this->usurua);
            $cmd->bindParam(":usubairro", $this->usubairro);
            $cmd->bindParam(":usunumero", $this->usunumero);
            $cmd->bindParam(":usucep",    $this->usucep);
            $cmd->bindParam(":nis",       $this->nis);
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM usuario WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        function aplicarPunicao()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("UPDATE usuario SET punicao = :punicao WHERE idusuario = :idusuario");
            
            //Parâmetros SQL
            $cmd->bindParam(":punicao", $this->punicao);
            $cmd->bindParam(":idusuario", $this->idusuario);

            //Executando o comando SQL
            $cmd->execute();
        }
    }
?>