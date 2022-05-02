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
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">
</head>
<body>
    <!-- CORPO -->
    <?php include_once "menuLogado.php";?>

    <div class="container">
        <form method="post" action="cadastrar-animal">
            <h1>CADASTRAR ANIMAL</h1>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="txtAniNome">Nome do animal:</label>
                            <input type="text" name="txtAniNome" id="txtAniNome" maxlength="50" required>
                        </td>
                        <td>
                            <label>Foto do animal:</label>
                            <input type="file" name="imgAnimal" id="imgAnimal" accept="image/*" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label>Espécie:</label>
                            <input type="radio" name="rdbEspecie" id="rdbCanina" value="1" required>
                            <label for="rdbCanina">Canina</label>
                            &nbsp;
                            <input type="radio" name="rdbEspecie" id="rdbFelina" value="2" required>
                            <label for="rdbFelina">Felina</label>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <label for="numIdade">Idade:</label>
                            <input type="number" name="numIdade" id="numIdade" min="0" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Sexo:</label>
                            <input type="radio" name="rdbSexo" id="rdbMacho" value="1" required>
                            <label for="rdbMacho">Macho</label>
                            &nbsp;
                            <input type="radio" name="rdbSexo" id="rdbFemea" value="2" required>
                            <label for="rdbFemea">Fêmea</label>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <label>Pelagem:</label>
                            <input type="radio" name="rdbPelagem" id="rdbCurta" value="1" required>
                            <label for="rdbCurta">Curta</label>
                            &nbsp;
                            <input type="radio" name="rdbPelagem" id="rdbMedia" value="2" required>
                            <label for="rdbMedia">Média</label>
                            &nbsp;
                            <input type="radio" name="rdbPelagem" id="rdbAlta" value="3" required>
                            <label for="rdbAlta">Alta</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="txtCor">Cor:</label>
                            <input type="text" name="txtCor" id="txtCor" maxlength="30" required>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <label>Porte:</label>
                            <input type="radio" name="rdbPorte" id="rdbPequeno" value="1" required>
                            <label for="rdbPequeno">Pequeno</label>
                            &nbsp;
                            <input type="radio" name="rdbPorte" id="rdbMedio" value="2" required>
                            <label for="rdbMedio">Médio</label>
                            &nbsp;
                            <input type="radio" name="rdbPorte" id="rdbGrande" value="3" required>
                            <label for="rdbGrande">Grande</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="listRaca">Raça:</label>
                            <input list="racas" name="listRaca" id="listRaca" maxlength="30" required>
                            <datalist id="racas">
                                <?php
                                    foreach($dadosRaca as $values)
                                    {
                                        echo"   
                                            <option value='$values->idRaca'>$values->raca</option>
                                        ";
                                    }
                                ?>
                            </datalist>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <label>Animal comunitário:</label>
                            <input type="radio" name="rdbComunitario" id="rdbSim" value="1" required>
                            <label for="rdbSim">Sim</label>
                            &nbsp;
                            <input type="radio" name="rdbComunitario" id="rdbNao" value="2" required>
                            <label for="rdbNao">Não</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img src="#" alt="Foto do Animal">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Cadastrar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div>
            <a href="#">Voltar</a>
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