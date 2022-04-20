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
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }

        @media screen and (max-width: 1450px)
        {
            .vazio
            {
                display: none;
            }
            table
            {
                display: block !important;
            }
            td, tr
            {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- CORPO -->
    <?php include_once "view/menu.php"?>

    <div class="container-fluid">
        <div class="container-fluid bg-primary">
            <div class="row">
                <div class="col-9 mx-auto p-0" >
                    <div class="card shadow-lg" style="border: 0; border-radius:0; overflow: hidden; margin: 70px 0px 70px 0px;">
                        <div class="card-header bg-dark" style="color:white; border-radius:0;">
                            <h1 class="h5 m-1">CADASTRAR ANIMAL</h1>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" action="<?php echo URL.'cadastrar-animal';?>">
                                <div class="container-fluid">                                    
                                    <input type="hidden" name="idUsuario" value="#">
                                    <div class="row g-0">
                                        <div class="col-md-7 p-0">
                                            <table border=0 style="height:100%; width:100%; margin-top: -15px;">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="row m-0">
                                                                <label for="txtAniNome" class="col-form-label">Nome do animal:</label>
                                                                <div class="col">
                                                                    <input type="text" name="txtAniNome" id="txtAniNome" class="form-control form-control-sm mt-1" maxlength="50" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="col-form-label mr-2">Espécie:</label>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbEspecie" id="rdbCanina" class="form-check-input" value="1" required>
                                                                <label for="rdbCanina" class="form-check-label">Canina</label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbEspecie" id="rdbFelina" class="form-check-input" value="2" required>
                                                                <label for="rdbFelina" class="form-check-label">Felina</label>
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <div class="vazio col-2" style="width:100px;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="row m-0">
                                                                <label for="numIdade" class="col-form-label">Idade:</label>
                                                                <div class="col m-0">
                                                                    <input type="number" name="numIdade" id="numIdade" class="form-control form-control-sm mt-1" min="0" required>  
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="col-form-label mr-2">Sexo:</label>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbSexo" id="rdbMacho" class="form-check-input" value="1" required>
                                                                <label for="rdbMacho" class="form-check-label">Macho</label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbSexo" id="rdbFemea" class="form-check-input" value="2" required>
                                                                <label for="rdbFemea" class="form-check-label">Fêmea</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="vazio col-2"></div>
                                                        </td>
                                                        <td>
                                                            <label class="col-form-label mr-2">Pelagem:</label>
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row m-0">
                                                                <label for="txtCor" class="col-form-label">Cor:</label>
                                                                <div class="col m-0">
                                                                    <input type="text" name="txtCor" id="txtCor" class="form-control form-control-sm mt-1" maxlength="30" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="vazio col-2"></div>
                                                        </td>
                                                        <td>
                                                            <label class="col-form-label mr-2">Porte:</label>
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row m-0">
                                                                <label for="listRaca" class="col-form-label">Raça:</label>
                                                                <div class="col m-0">
                                                                    <input list="racas" name="listRaca" id="listRaca" class="form-control form-control-sm mt-1" maxlength="30" required>
                                                                    <datalist id="racas">
                                                                        <?php
                                                                            foreach($dadosRaca as $value)
                                                                            {
                                                                                echo "<option value='$value->raca'>";
                                                                            }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="vazio col-2"></div>
                                                        </td>
                                                        <td>
                                                            <label class="col-form-label mr-2">Animal comunitário:</label>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbComunitario" id="rdbSim" class="form-check-input" value="1" required>
                                                                <label for="rdbSim" class="form-check-label">Sim</label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <input type="radio" name="rdbComunitario" id="rdbNao" class="form-check-input" value="0" required>
                                                                <label for="rdbNao" class="form-check-label">Não</label>  
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col">
                                            <table class="text-center" border=0 style="height:100%; width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="float-right">
                                                            <label class="col-form-label mr-2" for="inputImgAnimal">Foto do animal:</label>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="imgAnimal" id="inputImgAnimal" type="file" accept="image/*" hidden>
                                                            <img src="recursos/img/imagem_exemplo.jpg" alt="Foto do Animal" id="imgAnimal" class="img-thumbnail" for="inputImgAnimal" style="height: 250px; width: 375px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <input type="submit" value="Cadastrar" class="btn-lg btn-success mx-auto" style="border-radius: 0; border: 0; padding: 12px 35px 12px 35px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px; overflow: hidden;">
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

    <script>
        inputImgAnimal.onchange = evt => {
            const [file] = inputImgAnimal.files
            if (file) {
                imgAnimal.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>