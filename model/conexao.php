<?php
class Conexao{

    static function conectar(){
        //Informações para acessar o servidor do banco de dados
        $localhost = "mysql:host=localhost;port=3306;dbname=bdpetcastra";
        $usuario = "root";
        $senha = "usbw";
        
        $con = new PDO($localhost,$usuario,$senha);
        
        //Ativando recurso de exibição de erro
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $con;//Retorna conexão para uso
    }
}
?>