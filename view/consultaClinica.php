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
                    <div class="container-fluid bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Consultar Clínica</h5>
                    </div>
                    <div class="container-fluid p-sm-3 bg-white">
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
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php
        
                                        foreach($dadosClinica as $value)
                                        {
                                            $value->clitelefone = preg_replace("/^$/", "-", $value->clitelefone);
                                            $valorAtivo = $value->ativo;
                                            $value->ativo = str_replace("1", "Ativo", $value->ativo);
                                            $value->ativo = str_replace("0", "Inativo", $value->ativo);
    
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
                                                <td>$value->ativo</td>
                                                <td>
                                                <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalAtualizar' data-idclinica='$value->idclinica' 
                                                        data-idlogin='$value->idlogin' data-nome='$value->nome' data-email='$value->email' data-cnpj='$value->cnpj' data-telefone='$value->clitelefone' 
                                                        data-vagas='$value->vagas' data-cep='$value->clicep' data-numero='$value->clinumero' data-bairro='$value->clibairro' data-rua='$value->clirua' data-ativo='$valorAtivo'>
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
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-adm';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>
    <!-- Modal Atualizar Clinica -->
    <div class="modal fade" id="modalAtualizar" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL . 'atualizar-clinica'; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar clínica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <input type="hidden" name="idClinica" id="idClinica">
                    <input type="hidden" name="idLogin" id="idLogin">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="form-group row-3">
                                    <label for="txtNome">Nome:</label>
                                    <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtEmail">E-mail:</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtCNPJ">CNPJ:</label>
                                    <input type="text" id="txtCNPJ" name="txtCNPJ" class="form-control" placeholder="" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtTelefone">Telefone:</label>
                                            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtVagas">Vagas:</label>
                                            <input type="number" id="txtVagas" name="txtVagas" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="chkAtivo" class="form-label">Ativo:</label>
                                    <input type="checkbox" name="chkAtivo" id="chkAtivo" value="1" class="form-check">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtCEP">CEP:</label>
                                            <input type="text" id="txtCEP" name="txtCEP" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtNumero">Número:</label>
                                            <input type="text" id="txtNumero" name="txtNumero" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="txtBairro">Bairro:</label>
                                    <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtRua">Rua:</label>
                                    <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtSenha">Crie uma Senha:</label>
                                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtConfSenha">Confirme a Senha</label>
                                    <input type="password" id="txtConfSenha" name="txtConfSenha" class="form-control" placeholder="" required>
                                    <div class="text-danger" id="avisoIgualdade" style="display:none;">as Senhas devem ser iguais*</div>
                                    <div class="text-danger" id="avisoComprimento" style="display:none;">A senha deve conter mais que 5 dígitos*</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-primary'>Editar</button>
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
            $('#tbClinica').DataTable( {
                'responsive': true,
                'autoWidth':false,
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
        var idclinica = button.getAttribute('data-idclinica')
        var idLogin = button.getAttribute('data-idLogin')
        var email = button.getAttribute('data-email')
        var cnpj = button.getAttribute('data-cnpj')
        var telefone = button.getAttribute('data-telefone')
        var nome = button.getAttribute('data-nome')
        var vagas = button.getAttribute('data-vagas')
        var cep = button.getAttribute('data-cep')
        var numero = button.getAttribute('data-numero')
        var bairro = button.getAttribute('data-bairro')
        var rua = button.getAttribute('data-rua')
        var ativo = button.getAttribute('data-ativo')

        $("#idClinica").val(idclinica)
        $("#idLogin").val(idLogin)
        $("#txtNome").val(nome)
        $("#txtEmail").val(email)
        $("#txtCNPJ").val(cnpj)
        $("#txtTelefone").val(telefone)
        $("#txtVagas").val(vagas)
        $("#txtCEP").val(cep)
        $("#txtNumero").val(numero)
        $("#txtBairro").val(bairro)
        $("#txtRua").val(rua)
        if(ativo == 1)
        {
            $("#chkAtivo").prop("checked", true);
        }
        else 
            $("#chkAtivo").prop("checked", false);
        })
    </script>
    <script type="text/javascript">
        //confirme a senha
        $("form").submit(function(){
            if($("#txtSenha").val() != $("#txtConfSenha").val())
            {
                event.preventDefault();
                $("#avisoIgualdade").show();
            }
            else{$("#avisoIgualdade").hide();}

            if(($("#txtSenha").val().length <= 5) && ($("#txtConfSenha").val().length <= 5))
            {
                event.preventDefault();
                $("#avisoComprimento").show();
            }
            else {$("#avisoComprimento").hide();}
        });
    </script>

    <!-- SCRIPT CONFIRMAÇÃO PARA EXCLUIR A CLÍNICA -->
    <script>
        function confirmar(idcli, idlog)
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
                        'Clínica apagado com sucesso.', //text:
                        'success', //icon:
                    ).then(()=> {
                        window.location='<?php echo URL;?>excluir-clinica/'+idcli+'/'+idlog;
                        }
                    )}
            })
        }
    </script>
</body>
</html>