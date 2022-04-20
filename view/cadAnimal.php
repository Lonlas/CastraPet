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
    <?php include_once "view/menu.php"?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="row justify-content-center">
                <div class="col-9 mt-4 mb-4">
                    <div class="card mt-3 mb-3" style="border: 0; border-radius:0;">
                        <div class="card-header bg-dark" style="color:white; border-radius:0;">
                            <h1 class="h5 m-1">CADASTRAR ANIMAL</h1>
                        </div>
                        <div class="card-body">
                            <form class="container m-0" method="post" action="<?php echo URL.'cadastrar-animal';?>">
                                <input type="hidden" name="idUsuario" value="#">
                                <div class="row justify-content-between">
                                    <div class="col-8">
                                        <div class="container" style="padding:0;">
                                            <div class="row g-3">
                                                <div class="col">
                                                    <div class="form-group row mb-0">
                                                        <label for="txtAniNome" class="col-form-label-sm">Nome do animal:</label>
                                                        <div class="form-group col mb-0">
                                                            <input type="text" name="txtAniNome" id="txtAniNome" class="form-control form-control-sm" maxlength="50" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-start g-3">
                                                <div class="col" style="padding:0;">
                                                    <label class="col-form-label-sm mr-2">Espécie:</label>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbEspecie" id="rdbCanina" class="form-check-input" value="1" required>
                                                        <label for="rdbCanina" class="form-check-label">Canina</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbEspecie" id="rdbFelina" class="form-check-input" value="2" required>
                                                        <label for="rdbFelina" class="form-check-label">Felina</label>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <div class="form-group row mb-0">
                                                        <label for="numIdade" class="col-form-label-sm">Idade:</label>
                                                        <div class="form-group col mb-0">
                                                            <input type="number" name="numIdade" id="numIdade" class="form-control form-control-sm" min="0" required>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col" style="padding:0;">
                                                    <label class="col-form-label-sm mr-2">Sexo:</label>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbSexo" id="rdbMacho" class="form-check-input" value="1" required>
                                                        <label for="rdbMacho" class="form-check-label">Macho</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbSexo" id="rdbFemea" class="form-check-input" value="2" required>
                                                        <label for="rdbFemea" class="form-check-label">Fêmea</label>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <label class="col-form-label-sm mr-2">Pelagem:</label>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPelagem" id="rdbCurta" class="form-check-input" value="1" required>
                                                        <label for="rdbCurta" class="form-check-label">Curta</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPelagem" id="rdbMedia" class="form-check-input" value="2" required>
                                                        <label for="rdbMedia" class="form-check-label">Média</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPelagem" id="rdbAlta" class="form-check-input" value="3" required>
                                                        <label for="rdbAlta" class="form-check-label">Alta</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <label for="txtCor" class="col-form-label-sm">Cor:</label>
                                                <div class="col">
                                                    <input type="text" name="txtCor" id="txtCor" class="form-control form-control-sm" maxlength="30" required>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <label class="col-form-label-sm mr-2">Porte:</label>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPorte" id="rdbPequeno" class="form-check-input" value="1" required>
                                                        <label for="rdbPequeno" class="form-check-label">Pequeno</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPorte" id="rdbMedio" class="form-check-input" value="2" required>
                                                        <label for="rdbMedio" class="form-check-label">Médio</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbPorte" id="rdbGrande" class="form-check-input" value="3" required>
                                                        <label for="rdbGrande" class="form-check-label">Grande</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <label for="listRaca" class="col-form-label mz-2">Raça:</label>
                                                <div class="col">
                                                    <input list="racas" name="listRaca" id="listRaca" class="form-control form-control-sm" maxlength="30" required>
                                                    <datalist id="racas">
                                                        <?php
                                                            foreach($dadosRaca as $value)
                                                            {
                                                                echo "<option value='$value->raca'>";
                                                            }
                                                        ?>
                                                    </datalist>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <label class="col-form-label-sm mr-2">Animal comunitário:</label>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbComunitario" id="rdbSim" class="form-check-input" value="1" required>
                                                        <label for="rdbSim" class="form-check-label">Sim</label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input type="radio" name="rdbComunitario" id="rdbNao" class="form-check-input" value="0" required>
                                                        <label for="rdbNao" class="form-check-label">Não</label>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col justify-content end">
                                        <div class="container justify-content-end">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="col-form-label-sm mr-2" for="imgAnimal">Foto do animal:</label>
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="imgAnimal" id="imgAnimal" accept="image/*" hidden>
                                                    <img src="#" alt="Foto do Animal" class="img-thumbnail" for="imgAnimal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="submit" value="Cadastrar" class="btn-lg btn-success" style="border-radius: 0; border: 0;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px;">
                    <a href="#" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
</body>
</html>