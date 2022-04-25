
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CastraPet</title>
    <!-- EXTENSÃO BOOTSTRAP -->
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/bootstrap.min.css">

</head>
<body>
    <!-- CORPO -->
    <?php include_once "menuADM.php";?>

    <div class="container-fluid">
        <div class="bg-danger">
            <div class="container mx-auto row p-3">
                <form action="" class="container bg-dark text-light font-weight-bold p-3">
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
                        <form action="#" class="ms-auto mb-0" method="post">
                            <div class="float-end">
                                <a href="#" class="btn btn-success">
                                    Editar
                                </a>
                                <a href="#" class="btn btn-danger">
                                    Excluir
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'home-adm'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->    
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>