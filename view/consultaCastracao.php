<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
        </style>
    <!-- DataTables -->
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
        <?php
            if($_SESSION["dadosLogin"]->nivelacesso == 1)
            {
                echo "<div class='bg-warning container-fluid' style='grid-area: corpo;'>";
            } 
            else 
            {
                echo "<div class='bg-danger container-fluid' style='grid-area: corpo;'>";
            }
        ?>
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Consultar Castrações</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white table-responsive">
                        <table id="tbCastracao" class="table table-hover">
                            <?php
                                if($_SESSION["dadosLogin"]->nivelacesso == 2)
                                {
                                    echo"
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
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                    foreach($dadosCastracao as $value)
                                    {
                                        $value->status = str_replace("0", "Em análise", $value->status);
                                        $value->status = str_replace("1", "Aprovado", $value->status);
                                        $value->status = str_replace("2", "Castrado", $value->status);
                                        $value->status = str_replace("3", "Reprovado", $value->status);
                                        $value->status = str_replace("4", "Não compareceu", $value->status);

                                        $value->observacao = preg_replace("/^$/", "-", $value->observacao);
                                        
                                        echo
                                        "
                                        <tr>
                                            <td>$value->idcastracao</td>
                                            <td>$value->aninome</td>
                                            <td><a href=". URL . "consulta-usuario/$value->cpf" .">$value->cpf</a></td>
                                            <td><a href=". URL . "consulta-clinica/$value->cnpj" . ">$value->nomeclinica</a></td>
                                            <td>". date('d/m/Y',strtotime($value->horario)) ."</td>
                                            <td>". date('H:i',strtotime($value->horario)) ."</td>
                                            <td>$value->status</td>
                                            <td>$value->observacao</td>
                                            <td>
                                            <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalAtualizar' data-idcastracao='$value->idcastracao'>Atualizar</button>
                                            <a href='".URL."' class='btn btn-danger'>Excluir</a>
                                            </td>
                                            
                                        </tr>
                                        ";
                                    }
                                }
                                else if ($_SESSION["dadosLogin"]->nivelacesso == 1)
                                {
                                    echo"
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Animal</th>
                                                <th>CPF do Responsável</th>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Status</th>
                                                <th>Observação</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";

                                    foreach($dadosCastracaoClinica as $value)
                                    {
                                        $value->status = str_replace("0", "Em análise", $value->status);
                                        $value->status = str_replace("1", "Aprovado", $value->status);
                                        $value->status = str_replace("2", "Castrado", $value->status);
                                        $value->status = str_replace("3", "Reprovado", $value->status);
                                        $value->status = str_replace("4", "Não compareceu", $value->status);
                                        
                                        $value->observacao = preg_replace("/^$/", "-", $value->observacao);
                                        
                                        echo
                                        "
                                        <tr>
                                            <td>$value->idcastracao</td>
                                            <td>$value->aninome</td>
                                            <td>$value->cpf</td>
                                            <td>". date('d/m/Y',strtotime($value->horario)) ."</td>
                                            <td>". date('H:i',strtotime($value->horario)) ."</td>
                                            <td>$value->status</td>
                                            <td>$value->observacao</td>
                                            <td>
                                                <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalAtualizar' data-idcastracao='$value->idcastracao' data-emailTutor='$value->email' data-idTutor='$value->idusuario' data-nomeTutor='$value->nome' data-nomeAnimal='$value->aninome' data-status='$value->status'>Atualizar</button>
                                            </td>
                                        </tr>
                                        ";
                                    }
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
        <?php
        //MODAL DA CLÍNICA
            if($_SESSION["dadosLogin"]->nivelacesso == 1){
                echo"
                <div class='modal fade' id='modalAtualizar' data-bs-keyboard='true' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <form action='".URL."atualizar-castracao' method='post'>
                                <input type='hidden' id='idCastracao' name='idCastracao'>
                                <input type='hidden' id='status' name='status'>
                                <input type='hidden' id='idTutor' name='idTutor'>
                                <input type='hidden' id='emailTutor' name='emailTutor'>
                                <input type='hidden' id='nomeAnimal' name='nomeAnimal'>
                                <input type='hidden' id='nomeTutor' name='nomeTutor'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Atualizar castração</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='form-group'>
                                        <label for='status' class='label-form'>Status da castração</label>
                                        <select name='statusAtualizado' id='status' class='form-select'>
                                            <option value=''>-- Atualize o status --</option>
                                            <option value='Castrado'>Castrado</option>
                                            <option value='nCompareceu'>Não compareceu</option>
                                            <option value='emAnalise'>Em Análise</option>
                                        </select>
                                        <small class='form-text text-muted'>Coloque em \"Em Análise\" apenas em caso da clínica não poder castrar o animal</small>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-primary'>Atualizar Castração</button>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
            }
        //MODAL DO ADM
            else if($_SESSION["dadosLogin"]->nivelacesso == 2){
                echo"
                <div class='modal fade' id='modalAtualizar' data-bs-keyboard='true' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <form action='".URL."atualizar-castracao' method='post'>
                                <input type='hidden' id='idCastracao' name='idCastracao'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Atualizar castração</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <label class='form-label' for='obhsCastracao'>Observação: (opcional)</label>
                                    <textarea name='obsCastracao' id='obsCastr' rows='5' class='form-control'></textarea>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-primary'>Atualizar Castração</button>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
            }
        ?>
        <!-- MODAL -->
            <!-- /MODAL -->
            <!-- /CORPO -->
    </div>

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
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
    <script>
        var exampleModal = document.getElementById('modalAtualizar')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idCastracao = button.getAttribute('data-idcastracao')
        var emailTutor = button.getAttribute('data-emailTutor')
        var idTutor = button.getAttribute('data-idTutor')
        var nomeAnimal = button.getAttribute('data-nomeAnimal')
        var nomeTutor = button.getAttribute('data-nomeTutor')
        var status = button.getAttribute('data-status')

        $("#idCastracao").val(idCastracao);
        $("#emailTutor").val(emailTutor);
        $("#idTutor").val(idTutor);
        $("#nomeAnimal").val(nomeAnimal);
        $("#nomeTutor").val(nomeTutor);
        $("#status").val(status);
        })
    </script>

</body>
</html>