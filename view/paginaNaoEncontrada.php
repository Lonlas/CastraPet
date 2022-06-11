<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
</head>
<body>
    
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        
    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <?php
        if(isset($_SESSION["dadosLogin"]))
        {
            switch($_SESSION["dadosLogin"]->nivelacesso)
            {
                case 0:
                    echo "<div class='bg-primary container-fluid' style='grid-area: corpo;'>";
                break;
                case 1:
                    echo "<div class='bg-warning container-fluid' style='grid-area: corpo;'>";
                break;
                case 2:
                    echo "<div class='bg-danger container-fluid' style='grid-area: corpo;'>";
                break;
            }
        }
        else
        echo "<div class='bg-primary container-fluid' style='grid-area: corpo;'>";
        ?>
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Ops... Parece que esta página não existe</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white text-center" style="height:400px;">
                        <div class="row align-items-center m-0 h-100 w-100">
                            <?php
                            if(isset($_SESSION["dadosLogin"]->nivelacesso))
                            {
                                switch($_SESSION["dadosLogin"]->nivelacesso)
                                {
                                    case 0:
                                        echo "<a href='".URL."home-usuario' class='stretched-link'>Voltar para a página inicial</a>";
                                    break;
                                    case 1:
                                        echo "<a href='".URL."home-clinica' class='stretched-link'>Voltar para a página inicial</a>";
                                    break;
                                    case 2:
                                        echo "<a href='".URL."home-adm' class='stretched-link'>Voltar para a página inicial</a>";
                                    break;
                                    default:
                                        echo "<a href='".URL."inicio' class='stretched-link'>Voltar para a página inicial</a>";
                                }    
                            }
                            else
                            echo "<a href='".URL."inicio' class='stretched-link'>Voltar para a página inicial</a>";
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <?php
                        if(isset($_SESSION["dadosLogin"]))
                        {
                            switch($_SESSION["dadosLogin"]->nivelacesso)
                            {
                                case 0:
                                    echo "<a href='".URL."home-usuario' class='btn btn-success'>Voltar</a>";
                                break;
                                case 1:
                                    echo "<a href='".URL."home-clinica' class='btn btn-success'>Voltar</a>";
                                break;
                                case 2:
                                    echo "<a href='".URL."home-adm' class='btn btn-success'>Voltar</a>";
                                break;
                                default:
                                    echo "<a href='".URL."inicio' class='btn btn-success'>Voltar</a>";
                            }
                        }
                        else
                        echo "<a href='".URL."inicio' class='btn btn-success'>Voltar</a>";
                    ?>
                </div>
            </div> 
        </div>
    </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>/recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> -->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>/recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>