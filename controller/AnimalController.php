<?php
include_once "model/Animal.php";
include_once "model/Raca.php";

class AnimalController
{
    function cadastrarAnimal()
    {
        $direciona = new Raca();
        $dadosRaca = $direciona->consultar();
        //Gambiarra para pegar o ID da raça - Melhorar o código depois
        foreach($dadosRaca as $value)
        {
            if($_POST["listRaca"] == $value->raca)
            {
                $raca = $value->idraca;
            }
        }
        $animal = new Animal();
        $animal->idusuario = $_SESSION["dadosUsuario"]->idusuario;
        $animal->idraca = $raca;
        $animal->aninome = $_POST["txtNome"];
        $animal->especie = $_POST["slcEspecie"];
        $animal->sexo = $_POST["slcSexo"];
        $animal->porte = $_POST["slcPorte"];
        $animal->cor = $_POST["txtCor"];
        $animal->pelagem = $_POST["slcPelagem"];
        $animal->idade = $_POST["numIdade"];
        $animal->comunitario = $_POST["slcComunitario"];

        //Tratar o envio da imagem
        $nomeArquivo = $_FILES["imgAnimal"]["name"];       //Nome do arquivo
        $nomeTemp = $_FILES["imgAnimal"]["tmp_name"];      //nome temporário
        
        //pegar a extensão do arquivo
        $info = new SplFileInfo($nomeArquivo);
        $extensao = $info->getExtension();
        
        //gerar novo nome
        $novoNome = md5(microtime()) . ".$extensao";
        
        $pastaDestino = "recursos/img/Animais/$novoNome";    //pasta destino
        move_uploaded_file($nomeTemp, $pastaDestino);       //mover o arquivo 
        
        $animal->foto = $novoNome; //Nome do arquivo para o banco de dados

        $animal->cadastrar();

        header("Location:".URL."meus-animais");
    }

    function EditarAnimal()
    {
        $animal = new Animal();
        $animal->idanimal = $_POST["idanimal"];

        $direciona = new Raca();
        $dadosRaca = $direciona->consultar();
        foreach($dadosRaca as $value)
        {
            if($_POST["listRaca"] == $value->raca)
            {
                $raca = $value->idraca;
            }
        }
        $animal->idraca = $raca;
        $animal->aninome = $_POST["txtNome"];
        $animal->especie = $_POST["slcEspecie"];
        $animal->sexo = $_POST["slcSexo"];
        $animal->porte = $_POST["slcPorte"];
        $animal->cor = $_POST["txtCor"];
        $animal->pelagem = $_POST["slcPelagem"];
        $animal->idade = $_POST["numIdade"];
        $animal->comunitario = $_POST["slcComunitario"];
        $animal->atualizar();

        header("Location:".URL."consulta-animais/".$_POST["idusuario"]);
    }

    function excluirAnimal($idanimal,$idusuario,$foto)
    {
        try{
            $animal = new Animal();
            $animal->idanimal = $idanimal;
            $animal->excluir();
        }
        catch(Exception $e){
            if($_SESSION["dadosLogin"]->nivelacesso == 2)
            {
                echo "<script>alert('Erro ao excluir o animal'); window.location='".URL."consulta-animais/$idusuario'; </script>";
            }
            else
            {
                echo "<script>alert('Erro ao excluir o animal'); window.location='".URL."meus-animais'; </script>";
            }
            return;
        }
        if(is_file("recursos/img/Animais/$foto"))
        {
            unlink("recursos/img/Animais/$foto");
        }
        header("Location:".URL."consulta-animais/$idusuario");
    }
    
    function cadastrarRaca()
    {
        try
        {
            $cadastra = new Raca();
            $cadastra->raca = $_POST["txtRaca"];
            $cadastra->tipoespecie = $_POST["tipoEspecie"];
            $cadastra->cadastrar();

            echo"<script>alert('Raça cadastrada com sucesso'); window.location='".URL."cadastra-raca'; </script>";
        }
        catch(Exception $e)
        {
            echo"<script>alert('Erro: $e'); window.location='".URL."cadastra-raca'; </script>";
        }
    }
}
?>