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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URL; ?>recursos/css/root.css">
    <style type="text/css">
        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
        .vazio
        {
            width: 100px;
        }
        #inputImgAnimal + label
        {
            position: absolute;
            height: 250px; 
            width: 375px;
            border: solid;
            border-color: #198754;
            cursor: pointer;
        }
        #imgAnimal
        {
            height: 250px;
            width: 375px;
        }
        
        @media screen and (max-width: 992px)
        {
            #inputImgAnimal + label, #imgAnimal
            {
                height: 200px;
                width: 275px;
            }
        }

        @media screen and (max-width: 767px)
        {
            .container-principal
            {
                padding: 0;
            }
        }
        
        @media screen and (max-width: 336px)
        {
            #inputImgAnimal + label, #imgAnimal
            {
                height: 175px;
                width: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- CORPO -->
    <?php include_once "menuLogado.php";?>

    <div class="container-fluid container-principal">
        <div class="bg-primary">
            <div class="container mx-auto p-3">
                <div class="container shadow-lg text-light p-3" style="border: 0; border-radius:0; overflow: hidden; background-color: var(--preto);">
                    <h1 class="h5 m-1">CADASTRAR ANIMAL</h1>
                </div>
                <div class="container shadow-lg bg-white p-4">
                    <form method="post" action="<?php echo URL.'cadastrar-animal';?>">                       
                        <input type="hidden" name="idUsuario" value="#">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="txtNome" class="form-label">Nome do Animal:</label>
                                        <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="slcEspecie" class="form-label">Espécie:</label>
                                        <select id="slcEspecie" name="slcEspecie" class="form-select" required>
                                            <option value="1">Canina</option>
                                            <option value="2">Felina</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="numIdade" class="form-label">Idade:</label>
                                        <input type="number" class="form-control" id="numIdade" name="numIdade" min="0" max="100" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="slcSexo" class="form-label">Sexo:</label>
                                        <select id="slcSexo" name="slcSexo" class="form-select" required>
                                            <option value="1">Macho</option>
                                            <option value="2">Fêmea</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcPelagem" class="form-label">Pelagem:</label>
                                        <select id="slcPelagem" name="slcPelagem" class="form-select" required>
                                            <option value="1">Curta</option>
                                            <option value="2">Média</option>
                                            <option value="3">Alta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="txtCor" class="form-label">Cor:</label>
                                        <input type="text" class="form-control" id="txtCor" name="txtCor" maxlength="30" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcPorte" class="form-label">Porte:</label>
                                        <select id="slcPorte" name="slcPorte" class="form-select" required>
                                            <option value="1">Pequeno</option>
                                            <option value="2">Médio</option>
                                            <option value="3">Grande</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="listRaca" class="form-label">Raça:</label>
                                        <input list="racas" name="listRaca" id="listRaca" class="form-control" maxlength="30" required>
                                        <datalist id="racas">
                                            <?php
                                                foreach($dadosRaca as $value)
                                                {
                                                    echo "<option value='$value->raca'>";
                                                }
                                            ?>
                                        </datalist>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="slcComunitario" class="form-label">Animal Comunitário:</label>
                                        <select id="slcComunitario" name="slcComunitario" class="form-select" required>
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mt-2">
                                <div class="row text-center mb-3">
                                    <label>Foto do animal:</label>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <input type="file" name="imgAnimal" id="inputImgAnimal" type="file" accept="image/*" hidden>
                                    <label id="labelImgAnimal" for="inputImgAnimal" style="background-color: 0;"></label>
                                    <img src="recursos/img/imagem_exemplo.jpg" alt="Foto do Animal" id="imgAnimal" for="inputImgAnimal">
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center mt-3 mb-2">
                                        <input type="submit" value="Cadastrar" class="btn btn-lg btn-success shadow" style="border-radius: 0; border: 0; padding: 12px 30px 12px 30px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col" style="background:var(--preto); padding: 35px 0px 35px 0px; overflow: hidden;">
                <a href="#" class="btn-lg btn-success" role="button" style="border-radius: 0; text-decoration: 0; padding: 12px 35px 12px 35px; margin-left: 40px;">Voltar</a>
            </div>
        </div>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
        inputImgAnimal.onchange = evt => {
            const [file] = inputImgAnimal.files
            if (file) {
                var url = URL.createObjectURL(file);
                imgAnimal.src = url;
            }
        }
    </script>
</body>
</html>