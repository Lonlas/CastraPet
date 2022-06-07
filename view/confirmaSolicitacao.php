<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>

    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">

    <?php /*Controle de menu!*/ include_once "menuControle.php";?>

        <?php
            if($_SESSION["dadosLogin"]->nivelacesso == 2){echo"<div class='bg-danger container-fluid' style='grid-area: corpo;''>";}
            else{echo"<div class='bg-warning container-fluid' style='grid-area: corpo;''>";}
        ?>  
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Solicitação</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <?php 
                        if($_SESSION["dadosLogin"]->nivelacesso == 2){echo"<form action='".URL."agendar-clinica' class='p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0' method='post'>";}
                        else{echo"<form action='".URL."agendar' class='p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0' method='post'>";}?>
                        
                            <input type="hidden" name="emailDestinatario" id="emailDestinatario" value="<?php echo $dadosCastracao->email;?>">
                            <input type="hidden" name="nomeDestinatario" id="nomeDestinatairio" value="<?php echo $dadosCastracao->nome;?>">
                            <div class="col-sm-6 px-3">
                                <div class="row container-fluid p-0 m-0 form-group mb-2">
                                    <label for="" class="form-label">Número da solicitação:</label>
                                    <input type="text" name="idcastracao" readonly class="form-control" value="<?php echo $dadosCastracao->idcastracao;?>">
                                </div>
                                <div class="row container-fluid p-0 m-0 form-group mb-2">
                                    <label for="" class="form-label">Nome do animal: </label>
                                    <input type="text" name="aninome" readonly class="form-control" value="<?php echo $dadosCastracao->aninome;?>">
                                </div>
                                <div class="row container-fluid p-0 m-0 form-group mb-2">
                                    <label for="" class="form-label">CPF do responsável:</label>
                                    <input type="text" name="cpf" readonly class="form-control" value="<?php echo $dadosCastracao->cpf;?>"> 
                                </div>
                                <div class="row container-fluid p-0 m-0 form-group mb-2 ">
                                    <label for="" class="form-label">Observações do tutor: </label>
                                    <textarea class="form-control" name="txtarea" readonly><?php echo $dadosCastracao->observacao;?></textarea>  
                                </div>
                            </div>
                            <div  class="col-sm-6 px-3">
                                <div class="row w-100 justify-content-center m-0">
                                    <img src="<?php echo URL."recursos/img/Animais/$dadosCastracao->foto";?>" class="mb-3" style="max-height:200px; width:auto;">
                                    <div class="form-group p-0">
                                        <?php
                                        if($_SESSION["dadosLogin"]->nivelacesso == 2)
                                        {
                                            echo"
                                                <label for='selectClinica' class='form-label'>Selecione a Clínica</label>
                                                <select name='selectClinica' id='selectClinica' class='form-select'>
                                                    <option value='0' selected>-- SELECIONE UMA CLÍNICA --</option>
                                                        ";
                                                            foreach($dadosClinicas as $values)
                                                            {
                                                                echo "<option value='$values->idclinica'>$values->nome - Vagas Disponíveis: $values->vagas</option>";
                                                            }
                                            echo"</select>";
                                        }
                                        else
                                        {
                                            echo"
                                                <label for='horario' class='form-label'>Selecione a data e hora da castracao</label>
                                                <input type='datetime-local' name='horario' id='horario' class='form-control' required>
                                            ";
                                        }
                                        ?>
                                   </div>    
                                </div>
                                <div class="row float-end my-3">
                                    <div class="">

                                        <?php
                                            if($_SESSION["dadosLogin"]->nivelacesso == 2)
                                            {
                                                echo"<!-- Botão recusar solicitação -->
                                                <input type='submit' id='btnrecusa' value='Recusar' name='btnRecusa' class='btn btn-danger float-end me-3'>";

                                                echo"
                                                <!-- Botão confirmar solicitação -->
                                                <input type='submit' value='Confirmar' class='btn btn-success float-end me-1'>";
                                            
                                            }
                                            else
                                            {
                                                echo"
                                                <!-- Botão confirmar solicitação -->
                                                <input type='submit' value='Confirmar' class='btn btn-success float-end me-1'>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'lista-solicitacao';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
       
</body>
</html>