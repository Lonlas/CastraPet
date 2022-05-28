<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>
    <!-- CORPO -->
    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado e exista uma sessão
        {
            switch($_SESSION["dadosLogin"]->nivelacesso)
            {
                //caso tenha nível de acesso de usuário
                case 0: include_once "menuLogado.php"; break;
                //caso tenha nível de acesso de clínica
                case 1: include_once "menuClinica.php"; break;
                //caso tenha nível de acesso de Administrador
                case 2: include_once "menuADM.php"; break;   
            }
        }
        else{ include_once "menu.php"; }
    ?>
    <div class="container-fluid">
        <div class="bg-danger">
            <div class="container mx-auto row p-3">
                <div class="container bg-white p-0">  
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Solicitação
                    </div>
                    <div>
                        <form action="<?php echo URL.'agendar';?>" method="POST" class="container row mx-0 py-3 px-0">
                            <input type="hidden" name="emailDestinatario" id="emailDestinatairio" value="<?php echo $dadosCastracao->email;?>">
                            <input type="hidden" name="nomeDestinatairio" id="nomeDestinatairio" value="<?php echo $dadosCastracao->nome;?>">
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
                                <div class="row container-fluid p-0 m-0 form-group">
                                    <label for="" class="form-label">Observações: </label>
                                    <textarea class="form-control" name="txtarea" readonly><?php echo $dadosCastracao->observacao;?></textarea>  
                                </div>
                            </div>
                            <div  class="col-sm-6 px-3 mt-5 mt-sm-0">
                                <div class="row w-100 m-0">
                                    <div class="form-group p-0 mb-2">
                                       <label for="dataHora" class="form-label">Data e Hora:</label>
                                       <input type="datetime-local" name="dataHora" id="dataHora" class="form-control">
                                    </div>
                                    <div class="form-group p-0">
                                        <label for="selectClinica" class="form-label">Selecione a Clínica</label>
                                       <select name="selectClinica" id="selectClinica" class="form-select">
                                           <option value="0" selected>-- SELECIONE UMA CLÍNICA --</option>
                                            <?php
                                                foreach($dadosClinicas as $values)
                                                {
                                                    echo "<option value='$values->idclinica'>$values->nome - Vagas Disponíveis: $values->vagas</option>";
                                                }
                                            ?>
                                       </select>
                                   </div>    
                                </div>
                                <div class="row float-end my-3">
                                    <div class="">
                                        <!-- Botão recusar solicitação -->
                                        <input type="submit" id="btnrecusa" value="Recusar" class="btn btn-danger float-end me-3">
                                    
                                        <!-- Botão confirmar solicitação -->
                                        <input type="submit" value="Confirmar" class="btn btn-success float-end me-1">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'lista-solicitacao'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    <!-- /CORPO -->


    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
       
</body>
</html>