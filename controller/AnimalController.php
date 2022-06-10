<?php
include_once "model/Animal.php";
include_once "model/Raca.php";

class AnimalController
{
    function carregarRaca($id){
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

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
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0) {
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
            if($_FILES["imgAnimal"]["error"] == 0)
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
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }

    function atualizarAnimal()
    {

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0 || $_SESSION["dadosLogin"]->nivelacesso == 2) {

            $animal = new Animal();
            $animal->idanimal =    $_POST["idanimal"];
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
            $infoanimal = new Animal();
            $infoanimal->idanimal = $_POST["idanimal"];
            $dadosAnimal = $infoanimal->retornar();
            if($_FILES["foto"]["error"] == 0)
            {
                
                if(empty($dadosAnimal->foto))
                {
                    $nomeArquivo = $_FILES["foto"]["name"];       //Nome do arquivo
                    $nomeTemp =    $_FILES["foto"]["tmp_name"];      //nome temporário
                    
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
                else {
                    unlink("recursos/img/Animais/$dadosAnimal->foto"); //excluir o arquivo
    
                    $nomeArquivo = $_FILES["foto"]["name"];       //Nome do arquivo
                    $nomeTemp =    $_FILES["foto"]["tmp_name"];      //nome temporário
                    
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
            }
            else
            $animal->foto = $dadosAnimal->foto;
    
            $animal->atualizar();

            if($_SESSION["dadosLogin"]->nivelacesso == 0){ header("Location:".URL."meus-animais"); }
            else{ header("Location:".URL."consulta-animais/".$_POST['idusuario']);}
           
        }
    }

    function excluirAnimal($idanimal,$idusuario,$foto)
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 0 || $_SESSION["dadosLogin"]->nivelacesso == 2) {

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
            if($_SESSION["dadosLogin"]->nivelacesso == 0){ header("Location:".URL."meus-animais"); }
            else{ header("Location:".URL."consulta-animais/$idusuario");}
        }
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }
    
    function cadastrarRaca()
    {
        //caso não usuário não esteja logado
        if(!isset($_SESSION["dadosLogin"])) { header("Location:".URL."login"); return; }

        //Controle de privilégio
        if($_SESSION["dadosLogin"]->nivelacesso == 2) {
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
        else{ include_once "view/paginaNaoEncontrada.php"; } 
    }
}
?>