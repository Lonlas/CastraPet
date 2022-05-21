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
    <!-- CSS DataTables-->
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
                                            <td>
                                                <a href='". URL. "consulta-animais' class='btn btn-success col-auto'>
                                                    <img src='recursos/img/Logo Castra Pet1.png' alt='Animais cadastrados' width='30' class='aling-itens-center justify-content-center'>
                                                </a>
                                            </td>
                                            <td>
                                                <button class='btn btn-warning btn-md' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal' ><i class='fa fa-edit'></i>Editar</button>
                                                <button class='btn btn-danger btn-md'>Excluir</button>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
        <!--
        <div class="bg-danger" >
            <div class="container mx-auto row p-3">
                <div class="container bg-white p-0">   
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Consultar Usuário
                    </div>
                    <form action="consulta-usuario">
                        <div class="table-responsive-md">
                            <table class="table table-sm table-hover ps-3 mb-3 me-5" id="dadosUsuario">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Animais</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Fulano Fulano Fulano Fulano</td>
                                        <td>Fulano7777@gamil.com</td>
                                        <td>12345678910</td>
                                        <td>11987546321</td>
                                        <td>
                                            <a href="<?php echo URL.'consulta-animais';?>" class="btn btn-success col-auto">
                                                <img src="recursos/img/Logo Castra Pet1.png" alt="Animais cadastrados" width="30" class="aling-itens-center justify-content-center">
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-md" id="btnEditar" type="button" data-bs-target="#modalEditar" data-bs-toggle="modal" ><i class='fa fa-edit'></i>Editar</button>
                                            <button class="btn btn-danger btn-md">Excluir</button>
                                    </tr>
    
                                    <?php
                                        /*foreach ($dadosUsuario as $value)
                                        {
                                            echo"<tr>
                                                    <td>$value->nome</td>
                                                    <td>$value->email</td>
                                                    <td>$value->cpf</td>
                                                    <td>$value->telefone</td>
                                                    <td>
                                                        <a href=".URL."consulta-animais' class='btn btn-success col-auto'>
                                                            <img src='recursos/img/Logo Castra Pet1.png' alt='Animais cadastrados' width='30' class='aling-itens-center justify-content-center'>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class='btn btn-warning btn-md' id='btnEditar' type='button' data-bs-target='#modalEditar' data-bs-toggle='modal'>
                                                            <i class='fa fa-edit'></i>Editar</button>
                                                        <a href=".URL."excluir-usuario/$value->idusuario' class='btn btn-danger btn-md' 
                                                        onclick='return confirm(\"Deseja realmente excluir?\")'>Excluir</a>
                                                    </td>
                                                </tr>";
                                        }*/
                                    ?>   
                                </tbody>
                            </table>
                        </div>
                    </form>                    
                </div>
            </div>
            <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px; overflow: hidden;">
                <a href="<?php echo URL.'home-adm'; ?>" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
            </div>
        </div>
    </div>
    -->:
    <!-- MODAL:EDITAR USUÁRIO -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
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
                            <div class="col-sm-6 mb-4 align-self-center">
                                <div class="form-group row-6 mb-3">
                                    <label for="txtNome" class="col-form-label">Nome:</label>
                                    <input  class="form-control" type="text" name="txtNome" id="txtNome"  maxlength="70" required>
                                </div>
                                <div class="form-group row-6 mb-3">
                                    <label for="txtEmail">Email:</label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" maxlength="100" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCPF">CPF:</label>
                                        <input class="form-control" type="text" name="txtCPF" id="txtCPF"  maxlength="14" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtTel">Telefone:</label>
                                        <input class="form-control" type="text" name="txtTel" id="txtTel"  maxlength="15">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtRG">RG:</label>
                                        <input class="form-control" type="text" name="txtRG" id="txtRG"  maxlength="12" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtCelular">Celular:</label>
                                        <input class="form-control" type="text" name="txtCelular" id="txtCelular"  maxlength="15">
                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-6 mb-4 align-self-center justify-content-evenly">
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="txtCEP">CEP:</label>
                                        <input class="form-control" type="text" name="txtCEP" id="txtCEP" maxlength="9" required> 
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="txtNumero">Número:</label>
                                        <input class="form-control" type="text" name="txtNumero" id="txtNumero"  maxlength="5" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtBairro">Bairro:</label>
                                    <input class="form-control" type="text" name="txtBairro" id="txtBairro" maxlength="50" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="txtRua">Rua:</label>
                                    <input class="form-control" type="text" name="txtRua" id="txtRua" maxlength="50" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <input type="checkbox" name="chkNIS" id="chkNIS" value="2">
                                        <label for="chkNIS">Tenho o benefício do NIS</label>
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
    MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- Abrir modal
    <script>
        
        /*function mostrarModal(){
            let minhaModal = new bootstrap.Modal(document.getElementById('modalEditar')).show();
        }
            
        $("#btnEditar").click(function(){
            $("#modalEditar").modal();
        });*/

    </script>
    -->

    <!-- JS DataTables--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/jquery.dataTables.js"></script>
    <!-- JS DataTables Buttons--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/dataTables.buttons.min.js"></script>
    <!-- JS DataTables Zip--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/jszip.min.js"></script>
    <!-- JS DataTables PDF MAKE--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/pdfmake.min.js"></script>
    <!-- JS DataTables PDF FONT--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/vfs_fonts.js"></script>
    <!-- JS DataTables PDF HTML5--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/buttons.html5.min.js"></script>
    <!-- JS DataTables PDF BUTTONS PRINT--> 
    <script type="text/javascript" charset="utf8" src="<?php echo URL;?>recursos/js/buttons.print.min.js"></script>

    <!-- DataTables
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    -->

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