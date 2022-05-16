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
            <div class="container mx-auto row p-3">
                <div class="container bg-white p-0">  
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Solicitação
                    </div>
                    <form action="confirmar-agendamento">
                        <div class="row align-items-center justify-content-center me-2">
                            <div class="col-sm-6 mb-3 ps-4">
                                <div class="row">
                                    <p>Número da solicitação:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                <div class="row">
                                    <p>Nome do animal:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>
                                </div>
                                <div class="row">
                                    <p>CPF do responsável:<?php echo" xxxxxxxxxxx";?></p>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <p>Observações:<?php echo" xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\nxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";?></p>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 ps-4">
                                <div class="row">
                                   <div class="form-group">
                                       <label for="dataHora" class="form-label">Data e Hora:</label>
                                       <input type="datetime-local" name="dataHora" id="dataHora" class="form-control mb-4" >

                                       <select name="selectClinica" id="selectClinica" class="form-select mb-4">
                                           <option selected> ... SELECIONE A CLÍNICA ... </option>
                                           <option value="<?php ?>">Clínica 1</option>
                                           <option value="<?php ?>">Clínica 2</option>
                                       </select>
                                   </div>    
                                </div>
                                
                                <div class="row justify-content-end align-items-end mb-3">
                                    <div class="col-sm-6 justify-content-end">
                                        <!-- Botão recusar solicitação -->
                                        <input type="submit" value="Recusar" class="btn btn-danger float-end me-3">
                                    
                                        <!-- Botão confirmar solicitação -->
                                        <input type="submit" value="Confirmar" class="btn btn-success float-end me-1">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                Consegui!!!
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
            /*let el = document.getElementById('modalEditar');
            let minhaModal = new bootstrap.Modal(el);
            minhaModal.show();*/

            let minhaModal = new bootstrap.Modal(document.getElementById('modalEditar')).show();
        }

    </script>    
    
</body>
</html>