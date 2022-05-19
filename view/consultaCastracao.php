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
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>
<body>
    <!-- CORPO -->
    <?php //CONTROLE DE MENU
        if($_SESSION) //caso esteja logado e exista uma sessão
        {
            switch($_SESSION["dadosLogin"]->nivelacesso)
            {
                //caso tenha nível de acesso de usuário
                case 0:
                    include_once "menuLogado.php";
                break;
                //caso tenha nível de acesso de clínica
                case 1:
                    include_once "menuClinica.php";
                break;
                //caso tenha nível de acesso de Administrador
                case 2:
                    include_once "menuADM.php";
                break;
                
            }
        }
        else{ include_once "menu.php"; }
    ?>
    <div class="container-fluid">
        <div class="bg-danger">
            <div class="container mx-auto p-3">
                <div class="container bg-dark p-2">
                    <h1 class="h4 text-white ms-3">Consultar Castrações</h1>
                </div>
                <div class="bg-white p-3">
                    <div class="table-responsive">
                        <table id="tbCastracao" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Animal</th>
                                    <th>CPF do Responsável</th>
                                    <th>Clínica</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Status</th>
                                    <th>Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($dadosCastracao as $value)
                                {
                                    echo 
                                    "
                                    <tr>
                                        <td>$value->idcastracao</td>
                                        <td>$value->aninome</td>
                                        <td>$value->cpf</td>
                                        <td>$value->nomeclinica</td>
                                        <td>". date('d/m/Y',strtotime($value->horario)) ."</td>
                                        <td>". date('H:i',strtotime($value->horario)) ."</td>
                                        <td>$value->status</td>
                                        <td>$value->observacao</td>
                                    </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px; overflow: hidden;">
                <a href="#" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
            </div>
            <div class="container">
                
            </div>
        </div>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tbCastracao').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'print'
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                }
            } );
        } );
        </script>
    <!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"></script>-->

</body>
</html>