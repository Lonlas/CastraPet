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
        <div class="bg-danger">
            <div class="container mx-auto py-3">
                <div class="container bg-dark p-2">
                    <h1 class="h4 text-white ms-3">Consultar Usuários</h1>
                </div>
                <div class="bg-white p-3">
                    <div class="table-responsive">
                        <table id="tbUsuario" class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Benefício</th>
                                <th>NIS</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Punição</th>
                                <th>Animais</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <?php
    
                                    foreach($dadosUsuario as $value)
                                    {
                                        $value->beneficio = str_replace("0", "-", $value->beneficio);
                                        $value->beneficio = str_replace("1", "Benefício Social", $value->beneficio);
                                        $value->beneficio = str_replace("2", "Protetor de Animais", $value->beneficio);
                                        
                                        $value->telefone = preg_replace("/^$/", "-", $value->telefone);
                                        $value->nis = preg_replace("/^$/", "-", $value->nis);

                                        $value->punicao = str_replace("0", "-", $value->punicao);
                                        $value->punicao = str_replace("1", "<span class='badge bg-danger'>Punido</span>", $value->punicao);

                                        //Testar depois:
                                        //$number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);

                                        echo
                                        "
                                        <tr>
                                            <td>$value->idusuario</td>
                                            <td>$value->nome</td>
                                            <td>$value->cpf</td>
                                            <td>$value->beneficio</td>
                                            <td>$value->nis</td>
                                            <td>$value->email</td>
                                            <td>$value->telefone</td>
                                            <td>$value->celular</td>
                                            <td>$value->punicao</td>
                                            <td>Animais</td>
                                            <td>Editar Excluir</td>
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
                <a href="<?php echo URL.'home-adm'; ?>" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
            </div>
        </div>
    </div>

    <!-- MODAL: editar usuário
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                Conseguiu!!!
            </div>
        </div>
    </div>
    MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>

    <!-- Abrir modal
    <script>
        function mostrarModal(){
            /*let el = document.getElementById('modalEditar');
            let minhaModal = new bootstrap.Modal(el);
            minhaModal.show();*/

            let minhaModal = new bootstrap.Modal(document.getElementById('modalEditar')).show();
        }

    </script>    
     -->
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
            $('#tbUsuario').DataTable( {
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'csv', 'excel', 'print'
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                },
                "search": {
                    "search": "<?php echo "$cpf";?>"
                }
            } );
        } );
    </script>
</body>
</html>