<!DOCTYPE html>
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
        <div class="container bg-danger mx-auto">
            <div class="container bg-dark">
                <h1 class="h3">Consultar de Castrações : </h1><input type="text">
            </div>
            <div class="container bg-white">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="">Número da castração:</label>
                                <input type="text" name="" id="">
                            </td>
                            <td>
                                <label for="">Data:</label>
                                <input type="text" name="" id="">
                            </td>
                            <td>
                                <label for="">Hora:</label>
                                <input type="text" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Nome do animal:</label>
                                <input type="text" name="" id="">
                            </td>
                            <td>
                                <label for="">CPF do responsável:</label>
                                <input type="text" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Nome da clínica</label>
                                <input type="text" name="" id="">
                            </td>
                            <td>
                                <label for="">CNPJ da clínica</label>
                                <input type="text" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Observações:</label>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </td>
                            <td>
                                <label for="">Status:</label>
                                <select name="" id="">
                                    <option></option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                </table>
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