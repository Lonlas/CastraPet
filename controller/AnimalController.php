<?php
include_once "model/Animal.php";
include_once "model/Raca.php";

class AnimalController
{
    function carregarRaca($id){
        $raca = new Raca();
        $raca->tipoespecie = $id;
        $dadosRacaAnimal = $raca->consultarRaca();

        $options = "";
        foreach ($dadosRacaAnimal as $value){
            $options .= "<option value='$value->idraca'>$value->raca</option>";
        }
        echo $options;
    }

    function cadastrarAnimal()
    {
        $animal = new Animal();
        $animal->idusuario =   $_SESSION["dadosUsuario"]->idusuario;
        $animal->especie =     $_POST["tipoEspecie"];
        $animal->idraca =      $_POST["racas"];
        $animal->aninome =     $_POST["txtNome"];
        $animal->sexo =        $_POST["slcSexo"];
        $animal->porte =       $_POST["slcPorte"];
        $animal->cor =         $_POST["txtCor"];
        $animal->pelagem =     $_POST["slcPelagem"];
        $animal->idade =       $_POST["numIdade"];
        $animal->comunitario = $_POST["slcComunitario"];

        /* UPLOAD IMAGEM */
        if($_FILES["foto"]["error"] == 0)
        {
            $nomeArquivo = $_FILES["imgAnimal"]["name"];    //Nome do arquivo
            $nomeTemp =    $_FILES["imgAnimal"]["tmp_name"];   //nome temporário
            
            //pegar a extensão do arquivo
            $info = new SplFileInfo($nomeArquivo);
            $extensao = $info->getExtension();
            
            //gerar novo nome
            $novoNome = md5(microtime()) . ".$extensao";
            
            $pastaDestino = "recursos/img/Animais/$novoNome";   //pasta destino
            move_uploaded_file($nomeTemp, $pastaDestino);       //mover o arquivo 
            
            //enviando para o banco de dados
            $animal->foto = $novoNome;
        }

        $animal->cadastrar();

        header("Location:".URL."meus-animais");
    }

    function atualizarAnimal($id)
    {
        $animal = new Animal();
        $animal->idanimal =    $id;
        $animal->aninome =     $_POST["txtNome"];
        $animal->especie =     $_POST["tipoEspecie"];
        $animal->idade =       $_POST["numIdade"];
        $animal->sexo =        $_POST["slcSexo"];
        $animal->pelagem =     $_POST["slcPelagem"];
        $animal->cor =         $_POST["txtCor"];
        $animal->porte =       $_POST["slcPorte"];
        $animal->idraca =      $_POST["racas"];
        $animal->comunitario = $_POST["slcComunitario"];

        /* UPLOAD IMAGEM */
        if($_FILES["foto"]["error"] == 0 && $animal->foto != "")
        {
            $nomeTemp =      $_FILES["foto"]["tmp_name"];
            $pastaDestino = "recursos/img/Animal/".$animal->foto;
            move_uploaded_file($nomeTemp, $pastaDestino);
        }
        else {
            $nomeArquivo = $_FILES["imgAnimal"]["name"];       //Nome do arquivo
            $nomeTemp =    $_FILES["imgAnimal"]["tmp_name"];      //nome temporário
            
            //pegar a extensão do arquivo
            $info = new SplFileInfo($nomeArquivo);
            $extensao = $info->getExtension();
            
            //gerar novo nome
            $novoNome = md5(microtime()) . ".$extensao";
            
            $pastaDestino = "recursos/img/Animais/$novoNome";    //pasta destino
            move_uploaded_file($nomeTemp, $pastaDestino);       //mover o arquivo 
            
            //enviando para o banco
            $animal->foto = $novoNome;
        }   

        $animal->atualizar();

        header("Location:".URL."meus-animais");
    }

    function excluirAnimal($idanimal,$idusuario,$foto)
    {
        try{
            $animal = new Animal();
            $animal->idanimal = $idanimal;

            //removendo imagem
            $dadosAnimal = $animal->retornar();
            if(is_file("recursos/img/$dadosAnimal->foto")) //verificar se o arquivo existe
            {
                unlink("recursos/img/$dadosAnimal->foto"); //excluir o arquivo
            }
            
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