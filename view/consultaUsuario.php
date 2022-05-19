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
                                            <button class="btn btn-warning btn-md" id="btnEditar" data-target="#mostrarModal" data-toggle="modal">Editar</button>
                                            
                                            <button class="btn btn-danger btn-md">Excluir</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fulano</td>
                                        <td>Fulano7777@gamil.com</td>
                                        <td>12345678910</td>
                                        <td>11987546321</td>
                                        <td>
                                            <a href="<?php echo URL.'consulta-animais';?>" class="btn btn-success col-auto">
                                            <img src="recursos/img/Logo Castra Pet1.png" alt="Animais cadastrados" width="30" class="aling-itens-center justify-content-center"></a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-md">Editar</a>
                                            
                                            <a href="" class="btn btn-danger btn-md">Excluir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fulano</td>
                                        <td>Fulano7777@gamil.com</td>
                                        <td>12345678910</td>
                                        <td>11987546321</td>
                                        <td>
                                            <a href="<?php echo URL.'consulta-animais';?>" class="btn btn-success col-auto">
                                                <img src="recursos/img/Logo Castra Pet1.png" alt="Animais cadastrados" width="30" class="aling-itens-center justify-content-center">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-md">Editar</a>
                                            
                                            <a href="" class="btn btn-danger btn-md">Excluir</a>
                                        </td>
                                    </tr>
    
                                    <!--<?php
                                        /*foreach ($dadosUsuario as $value)
                                        {
                                            echo"<tr>
                                                    <td>$value->nome</td>
                                                    <td>$value->email</td>
                                                    <td>$value->cpf</td>
                                                    <td>$value->telefone</td>
                                                    <td>
                                                        <a href="<?php echo URL.'consulta-animais';?>" class="btn btn-success col-auto">
                                                            <img src="recursos/img/Logo Castra Pet1.png" alt="Animais cadastrados" width="30" class="aling-itens-center justify-content-center">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href='".URL."editar-usuario/$value->idUsuario' class='btn btn-warning btn-sm'>Editar</a>
                                                        
                                                        <a href='".URL."excluir-usuario/$value->idUsuario' class='btn btn-danger btn-sm' 
                                                        onclick='return confirm(\"Deseja realmente excluir?\")'>Excluir</a>
                                                    </td>
                                                </tr>";
                                        }*/
                                    ?>-->   
                                </tbody>
                            </table>
                        </div>


                        <!-- <div class="row align-items-center justify-content-center">
                            <div class="col-sm-5 mb-3 form-group ps-4">
                                <div class="row">
                                    <p>Nome:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                <div class="row">
                                    <p>E-mail:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>CPF:<?php echo" xxxxxxxxxxx";?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Telefone:<?php echo" xxxxxxxxxxx";?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>RG:<?php echo" xxxxxxxxxxx";?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Celular:<?php echo" xxxxxxxxxxx";?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <p>
                                        <input type="checkbox" name="chkProtetor" id="chkProtetor" checked disabled>
                                        Tenho benefício NIS: <?php echo" xxxxxxxx"?>
                                    </p>
                                </div>
                                
                                <div class="row ">
                                    <p>
                                        <input type="checkbox" name="chkProtetor" id="chkProtetor" checked disabled>
                                        Sou protetor de animais
                                        &nbsp;
                                        <input class="btn btn-success col-auto" type="button" value="Visualizar documento" name="btnProtetorDoc"> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-7 mb-3 form-group ps-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p>CEP:<?php echo" xxxxxxxxx";?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Número:<?php echo" xxxxx";?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <p>Bairro:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                <div class="row mb-5">
                                    <p>Rua:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-6">
                                             Acessar animais cadastrados do usuário 
                                            <a href="<?php echo URL.'consulta-animais';?>" class="btn btn-success col-auto">Animais Cadastrados</a>
                                    </div>
                                    <div class="col-6 justify-content-end">
                                         Botão editar usuário 
                                        <button class="btn btn-success" onclick="mostrarModal();">
                                            Editar
                                        </button>
                                         Botão excluir usuário 
                                        <?php /*echo"
                                            <a href='".URL."excluir-usuario' class='btn btn-danger ' 
                                            onclick='return confirm(\"Deseja realmente excluir esse usuário?\")'>Excluir</a>"*/
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </form>                    
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- MODAL: editar usuário -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nomeUsuario">@usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Alterar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!--/MODAL -->

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>

    <!-- Abrir modal -->
    <script>
        
        function mostrarModal(){
            let minhaModal = new bootstrap.Modal(document.getElementById('#modalEditar')).show();
        }
            
            $("#btnEditar").click(function(){
                $("#modalEditar").modal();
            });

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