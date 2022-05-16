<!DOCTYPE html>
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
    <?php include_once "menuADM.php";?>

    <div class="container-fluid">
        <div class="container-fluid bg-danger">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Animais cadastrados
                </div>
                <div class="container bg-white">
                <!-- Componentes aqui -->
                    <!-- Começo de um animal -->
                    <div class="row mt-3 mb-5">
                        <div class="col-md-4 d-flex align-items-center mb-3">
                            <img src="<?php echo URL.'recursos/img/imagem_cachorro.jpg';?>" alt="Imagem" class="mw-100">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <div class="row">
                                        <p>
                                            Nome:
                                            <?php echo"Alfredo";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p>
                                            Espécie:
                                            <?php echo"Canina";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p>
                                            Sexo:
                                            <?php echo"Macho";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p>
                                            Pelagem:
                                            <?php echo"Média";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p>
                                            Porte:
                                            <?php echo"Grande";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="mb-md-0">
                                            Animal Comunitário:
                                            <?php echo"Não";?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <p>
                                            Idade:
                                            <?php echo"8 anos";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p>
                                            Cor:
                                            <?php echo"Amarelado";?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="mb-0">
                                            Raça:
                                            <?php echo"SRD";?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 align-itens-end justify-content-end mb-3">  
                            <button class="btn btn-success btn-md" id="btnEditar" data-target="#mostrarModal" data-toggle="modal">Editar</button>
                            <button class="btn btn-danger btn-md">Excluir</button>
                        </div>
                        <hr>
                    </div>
                    <!-- Fim de um animal -->
                <!-- Fim dos componentes -->
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'perfil'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- MODAL: editar usuário -->
    <div class="modal fade" id="modalEditar" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                Conseguiu!!!
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

</body>
</html>