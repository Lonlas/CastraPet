
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
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
            <div class="container mx-auto py-3">
                <div class="container bg-dark p-2">
                    <h5 class="h5 text-white ms-3">Consultar Clínicas</h5>
                </div>
                <div class="bg-white p-3">
                    <div class="table-responsive">
                        <table id="tbClinica" class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Vagas</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <?php
    
                                    foreach($dadosClinica as $value)
                                    {
                                        $value->clitelefone = preg_replace("/^$/", "-", $value->clitelefone);

                                        echo
                                        "
                                        <tr>
                                            <td>$value->idclinica</td>
                                            <td>$value->nome</td>
                                            <td>$value->email</td>
                                            <td>$value->cnpj</td>
                                            <td>$value->clitelefone</td>
                                            <td>$value->clicep</td>
                                            <td>$value->clibairro</td>
                                            <td>$value->clirua</td>
                                            <td>$value->clinumero</td>
                                            <td>$value->vagas</td>
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
    <!--
    <div class="container-fluid">
        <div class="bg-danger">
            <div class="container mx-auto row p-3">
                <form action="" class="container bg-dark text-light font-weight-bold p-3 mb-0">
                    <div>
                        <label for="buscaClinica">Consultar Clínica</label>
                        <input type="number" name="buscaClinica" id="buscaClinica">
                    </div>
                </form>
                <div class="container bg-white p-0">
                    <div class="row p-4">
                        <div class="col-md-5">
                            <div class="row">
                                <p>
                                    Nome:
                                    <?php echo"xxxxxxxxxxxxx";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    E-mail:
                                    <?php echo"xxxxxxxxxxxxx";?>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        CNPJ:
                                        <?php echo"xxxxxxxxxxxxx";?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        Telefone:
                                        <?php echo"xxxxxxxxxxxxx";?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <h4>
                                    Endereço
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        CEP:
                                        <?php echo"xxxxxxxxxxxxx";?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        Número:
                                        <?php echo"xxxxxxxxxxxxx";?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <p>
                                    Bairro:
                                    <?php echo"xxxxxxxxxxxxx";?>
                                </p>
                            </div>
                            <div class="row">
                                <p>
                                    Rua:
                                    <?php echo"xxxxxxxxxxxxx";?>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <p>
                                    Vagas: <?php echo"xxxxxxxxxxxxx";?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="float-end">
                            <button class="btn btn-warning btn-md" id="btnEditar" type="button" data-bs-target="#modalEditar" data-bs-toggle="modal" ><i class='fa fa-edit'></i>Editar</button>

                            <a href="#" class="btn btn-danger">
                                Excluir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    -->
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

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
            $('#tbClinica').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'print'
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                },
                "search": {
                    "search": "<?php echo "$cnpj";?>"
                }
            } );
        } );
    </script>
</body>
</html>