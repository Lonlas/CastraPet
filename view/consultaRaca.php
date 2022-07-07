<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"/>

    <?php include_once "head.php";?>
</head>
<body>

    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
        <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center" style="max-width:100vw;">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Consultar Raças</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <table id="tbRaca" class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <?php
    
                                    foreach($dadosRaca as $value)
                                    {
                                        $valorEspecie = $value->tipoespecie;
                                        $value->tipoespecie = str_replace("0", "Canina", $value->tipoespecie);
                                        $value->tipoespecie = str_replace("1", "Felina", $value->tipoespecie);
                                        $value->tipoespecie = str_replace("2", "Felina/Canina", $value->tipoespecie);

                                        echo
                                        "
                                        <tr>
                                            <td>$value->idraca</td>
                                            <td>$value->raca</td>
                                            <td>$value->tipoespecie</td>
                                            <td>
                                            <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalAtualizar' data-idraca='$value->idraca' data-raca='$value->raca' data-tipoespecie='$valorEspecie'>
                                                <img src=". URL . "recursos/img/pencil-square.svg".">
                                            </button>
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
    <!-- Modal Atualizar Raça -->
    <div class="modal fade" id="modalAtualizar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL . 'atualiza-raca'; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Raça</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <input type="hidden" name="idRaca" id="idRaca">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="Especie">Espécie:</label>
                                <select name="tipoEspecie" id="Especie" class="form-select">
                                    <option value="1">Felina</option>
                                    <option value="0">Canina</option>
                                </select>
                            </div>
                            <small class="form-text text-muted">Selecione a Espécie dessa Raça</small>
                            <div class="form-group">
                                <label for="raca">Raça:</label>
                                <input type="text" id="raca" name="txtRaca" class="form-control" placeholder="ex: Siamês, Persa, Sphynx " required>
                                <small class="form-text text-muted">Informe o novo nome da raça</small>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-warning'>Editar</button>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal -->
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
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js'></script>

    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js'></script>
    
    <!-- JS SweetAlert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tbRaca').DataTable( {
                "responsive":true,
                "autoWidth":false,
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                    {
                        extend:'csv',
                        exportOptions:{
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions:{
                            columns: ':visible'
                        }  
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
                },
                "search": {
                    "search": "<?php if(!isset($cnpj)){$cnpj = '';} echo $cnpj;?>"
                },
            } );
        } );
    </script>

    <script>
        //Definindo os valores nos inputs da modal
        
        var exampleModal = document.getElementById('modalAtualizar')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idraca = button.getAttribute('data-idraca')
        var raca = button.getAttribute('data-raca')
        var tipoespecie = parseInt(button.getAttribute('data-tipoespecie'))

        $("#idRaca").val(idraca)
        $("#raca").val(raca)
        $("#Especie option").filter("[value="+tipoespecie+"]").attr("selected",true)
        })
    </script>

    <!-- SCRIPT CONFIRMAÇÃO PARA EXCLUIR A RAÇA -->
    <script>
        function confirmar(id)
        {
            Swal.fire({
                title: 'Você tem certeza que deseja excluir?',
                text: "Você não será capaz de desfazer esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Excluído!', //title:
                        'Raça apagada com sucesso.', //text:
                        'success', //icon:
                    ).then(()=> {
                        window.location='<?php echo URL;?>excluir-raca/'+id;
                        }
                    )}
            })
        }
    </script>
</body>
</html>