<?php
    class Login{
        //Atributos
        private $idlogin;
        private $nome;
        private $email;
        private $senha;
        private $nivelacesso;
        private $codsenha;

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
            $cmd = $con->prepare("INSERT INTO login (nome, email, senha, nivelacesso) 
                                    VALUES (:nome, :email, :senha, :nivelacesso)");
            
            //Parâmetros SQL
            $cmd->bindParam(":nome",        $this->nome);
            $cmd->bindParam(":email",       $this->email);
            $cmd->bindParam(":senha",       $this->senha);
            $cmd->bindParam(":nivelacesso", $this->nivelacesso);

            //Executando o comando SQL
            $cmd->execute();

            return $con->lastInsertId();
        }

        //Método consultar
        function consultar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para consultar
            $cmd = $con->prepare("SELECT * FROM login");
            
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
            $cmd = $con->prepare("DELETE FROM login WHERE idlogin = :idlogin");

            //Parâmetros SQL
            $cmd->bindParam(":idlogin", $this->idlogin);
            
            //Executando o comando SQL
            $cmd->execute();
        }
        
        //Método Atualizar
        function atualizar(){
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE login SET nome = :nome, email = :email, senha = :senha WHERE idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":nome",    $this->nome);
            $cmd->bindParam(":email",   $this->email);
            $cmd->bindParam(":senha",   $this->senha);
            $cmd->bindParam(":idlogin", $this->idlogin);

            //Executando o comando SQL
            $cmd->execute();
        }
        function atualizarLogin()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar o comando SQL para atualizar
            $cmd = $con->prepare("UPDATE login SET nome = :nome, email = :email WHERE idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":nome",    $this->nome);
            $cmd->bindParam(":email",   $this->email);
            $cmd->bindParam(":idlogin", $this->idlogin);

            //Executando o comando SQL
            $cmd->execute();
        }
        
        function alterarSenha()
        {
            $con = Conexao::conectar();

            $cmd = $con->prepare("UPDATE login SET senha = :senha WHERE idlogin = :idlogin");

            $cmd->bindParam(":senha",   $this->senha);
            $cmd->bindParam(":idlogin", $this->idlogin);

            $cmd->execute();
        }

        //Método Retornar
        function retornar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM login WHERE idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin", $this->idlogin);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        function logar()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM login WHERE email = :email");
            
            //Parâmetros SQL
            $cmd->bindParam(":email", $this->email);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        
        function retornarUsuario()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM usuario JOIN login ON usuario.idlogin = login.idlogin WHERE login.idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin", $this->idlogin);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        function retornarClinica()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT * FROM clinica JOIN login ON clinica.idlogin = login.idlogin WHERE login.idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin", $this->idlogin);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }
        
        function gerarCodigo()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("UPDATE login SET codsenha = :codsenha WHERE email = :email OR idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":email", $this->email);
            $cmd->bindParam(":idlogin", $this->idlogin);
            $cmd->bindParam(":codsenha", $this->codsenha);

            //Executando o comando SQL
            $cmd->execute();
        }

        function confirmarCodigo()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("SELECT idlogin, codsenha FROM login WHERE email = :email");
            
            //Parâmetros SQL
            $cmd->bindParam(":email", $this->email);

            //Executando o comando SQL
            $cmd->execute();

            return $cmd->fetch(PDO::FETCH_OBJ);
        }

        function redefinirSenha()
        {
            //Conectando ao banco de dados
            $con = Conexao::conectar();

            //Preparar comando SQL para retornar
            $cmd = $con->prepare("UPDATE login SET senha = :senha, codsenha = null WHERE idlogin = :idlogin");
            
            //Parâmetros SQL
            $cmd->bindParam(":idlogin", $this->idlogin);
            $cmd->bindParam(":senha", $this->senha);

            //Executando o comando SQL
            $cmd->execute();
        }    
    }
?>