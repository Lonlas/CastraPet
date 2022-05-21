
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <?php include_once "favicon.php"?>
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">

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

    <!-- MODAL: EDITAR DADOS CLÍNICA-->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?php echo URL.'atualizar-clinica'; ?>" class="p-sm-2 py-sm-3 p-md-3 p-lg-4 py-3 " method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <!--<input type="hidden" name="idusuario" value="<?php echo $dadosclinica->idclinica;?>">-->

                        <div class="row m-0">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtCEP">CEP:</label>
                                            <input type="number" id="txtCEP" name="txtCEP" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtNumero">Número:</label>
                                            <input type="number" id="txtNumero" name="txtNumero" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="txtBairro">Bairro:</label>
                                        <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtRua">Rua:</label>
                                        <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder="" required>
                                    </div>
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

    <!-- /MODAL -->



    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>