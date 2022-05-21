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
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
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
    <!--/MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- Abrir modal -->
    <script>
        
        /*function mostrarModal(){
            let minhaModal = new bootstrap.Modal(document.getElementById('modalEditar')).show();
        }
            
        $("#btnEditar").click(function(){
            $("#modalEditar").modal();
        });*/

    </script>

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

    <script>
        $(document).ready(function() {
            $('#dadosUsuario').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]        
            }
            );
        } );
    </script>

</body>
</html>