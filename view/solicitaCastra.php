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
    <?php include_once "menuLogado.php";?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="container mx-auto row p-3">
                <div class="container bg-dark text-light font-weight-bold p-3">
                    Solicitar Castração
                </div>
                <div class="container bg-white">
                    <!-- Componentes aqui -->
                    <form action="<?php echo URL.'perfil'; ?>">
                        <div class="row align-items-center justify-content-center my-3 ">
                            <div class="col-md-5">
                                <select name="selectAni" id="selectAni" class="form-select">
                                    <option selected> ... SELECIONE O ANIMAL ... </option>
                                    <option value="<?php ?>">ex 1</option>
                                    <option value="<?php ?>">ex 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center mb-4">
                            <div class="col-md-5">
                                <label class="form-label">Observação:</label>
                                <textarea name="obsCastracao" id="obhsCastracao" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-end my-3 me-3">
                                <input type="submit" value="Solicitar castração" class="btn btn-success col-auto" name="solicitaCastra">
                        </div>
                    </form>              
                </div>
            </div>
        </div>
        <footer class="container-fluid text-left bg-dark" style="padding: 2.5rem; color:white; background:var(--preto);">
            <a href="<?php echo URL.'meus-animais'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
        </footer>
    </div>

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>