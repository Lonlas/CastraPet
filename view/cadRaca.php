<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>

    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">

    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-danger container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Cadastrar Raça</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form action="cadastrar-raca" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0" method="POST">
                            <label for="Especie">Espécie:</label>
                            <select name="tipoEspecie" id="Especie" class="form-select">
                                <option value="1">Felina</option>
                                <option value="0">Canina</option>
                            </select>
                            <small class="form-text text-muted">Selecione a Espécie dessa Raça</small>
                            <div class="form-group">
                                <label for="raca">Raça:</label>
                                <input type="text" id="raca" name="txtRaca" class="form-control" placeholder="ex: Siamês, Persa, Sphynx " required>
                                <small class="form-text text-muted">Informe o nome da raça que deseja cadastrar</small>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success align-middle" value="Cadastrar">
                            </div>
                        </form>
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
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>