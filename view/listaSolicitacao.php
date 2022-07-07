<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"/>

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
            <div class="row h-100 align-items-center" style="max-width:100vw;">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Solicitações</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <table id="tbLista" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Animal</td>
                                    <td>Tutor</td>
                                    <td>Solicitação</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($dadosSolicitacao as $value)
                                    {
                                        echo"
                                            <tr>
                                                <td>Solicitação $value->idcastracao</td>
                                                <td>$value->aninome</td>
                                                <td>$value->nome</td>
                                                <td><a href='".URL."agendamento/$value->idcastracao' class='btn btn-info'>Analisar</a></td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                <?php if($_SESSION["dadosLogin"]->nivelacesso == 1){echo "<a href='".URL."home-clinica' class='btn btn-success'>Voltar</a>";}?>
                    <?php if($_SESSION["dadosLogin"]->nivelacesso == 2){echo "<a href='".URL."home-adm' class='btn btn-success'>Voltar</a>";}?>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->



    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js'></script>

    <script>
        $(document).ready(function () {
            $('#tbLista').DataTable({
                "responsive":true,
                "autoWidth":false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                }
            });
        });
    </script>
</body>
</html>