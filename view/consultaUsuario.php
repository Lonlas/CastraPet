<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
        </style>
    <!-- CSS DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <?php include_once "head.php";?>
    
</head>
<body>
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
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
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Consultar Usuários</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white table-responsive">
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
                                            <td>
                                                <a href='". URL. "consulta-animais/$value->idusuario' class='btn btn-success col-auto'>
                                                    <img src='". URL ."recursos/img/Logo-Castra-Pet.svg' alt='Animais cadastrados' width='30' class='aling-itens-center white justify-content-center'>
                                                </a>
                                            </td>
                                            <td>
                                                <button class='btn btn-warning btn-md text-light' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal'><i class='fa fa-edit'></i>Editar</button>
                                                <a href='".URL."excluir-tutor/$value->idusuario/$value->idlogin' class='btn btn-danger btn-md' onClick='return confirm(\"Tem certeza que deseja excluir o usuário $value->nome?\")'>Excluir</a>
                                            </td>
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
                    <a href="<?php echo URL.'home-adm';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>

    <!-- MODAL: editar usuário -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL . 'atualizar-usuario'; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="hidden" name="idusuario" value="<?php echo $dadosusuario->idusuario;?>">-->
                        
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="form-label">Nome:</label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome"  maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail" class="form-label">Email:</label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF" class="form-label">CPF:</label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF"  maxlength="14" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel" class="form-label">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel"  maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG" class="form-label">RG:</label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG"  maxlength="12" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular" class="form-label">Celular:</label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular"  maxlength="15">
                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP" class="form-label">CEP:</label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero" class="form-label">Número:</label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero"  maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro" class="form-label">Bairro:</label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua" class="form-label">Rua:</label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                        <label for="chkNIS" class="form-label">Tenho o benefício do NIS</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="text" name="txtNIS" id="txtNIS" >
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="checkbox" name="chkProtetor" id="chkProtetor" value="1">
                                    <label for="chkProtetor">Sou protetor de animais</label>
                                    &nbsp;
                                    <input class="btn btn-success" type="button" value="Fazer upload" name="btnProtetorUpload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Alterar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL -->

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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

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