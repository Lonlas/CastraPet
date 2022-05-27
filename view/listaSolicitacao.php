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
        <div class="container-fluid bg-danger">
            <div class="container mx-auto row p-3">
                <table class="table table-hover bg-white align-items-center">
                    <thead class="table-dark mb-0 mt-4 my-4">
                        <tr>
                            <td><h5>Solicitações</h5></td>    
                        </tr>
                    </thead>
                    <tbody>                        
                        
                        <?php
                            foreach ($dadosSolicitacao as $value)
                            {
                                echo"<tr>
                                        <td>
                                            <a href='".URL."agendamento/$value->idcastracao' class='link-dark text-decoration-none'>Solicitação $value->idcastracao</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
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