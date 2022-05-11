<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">

</head>
<body>
    <!-- CORPO -->
    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado e exista uma sessão
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case '0':
                        include_once "menuLogado.php";
                    break;
                    //caso tenha nível de acesso de clínica
                    case '1':
                        include_once "menuClinica.php";
                    break;
                    //caso tenha nível de acesso de Administrador
                    case '2':
                        include_once "menuADM.php";
                    break;
                    
                }
            }
        else{
            include_once "menu.php";
        }
    ?>

    <div class="container-fluid">
        <div class="container-fluid bg-danger">
            <div class="container mx-auto row p-3">
                <table class="table table-hover bg-white align-items-center">
                    <thead class="table-dark mb-3">
                        <tr>
                            <th><h5>Solicitações</h5></th>    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?php echo URL.'agendamento';?>" class="link-dark text-decoration-none">Solicitação 1</a></td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo URL.'agendamento';?>" class="link-dark text-decoration-none">Solicitação 2</a></td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo URL.'agendamento';?>" class="link-dark text-decoration-none">Solicitação 3</a></td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo URL.'agendamento';?>" class="link-dark text-decoration-none">Solicitação 4</a></td>
                        </tr>
                        
                        
                        <!--
                            <?php
                            foreach ($dadosSolicitacao as $value)
                            {
                                echo"<tr>
                                        <td>
                                            <a href='".URL."agendamento' class='link-dark text-decoration-none'>$value->solicitacao</a>
                                        </td>
                                    </tr>";
                            }
                        ?>-->
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>