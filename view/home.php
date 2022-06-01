<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>
    <style rel="stylesheet" type="text/css">
        .corpo{
            grid-template-areas: 'header''corpo''footer';
            grid-template-rows: max-content auto 100px;
        }
    </style>
</head>
<body>
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">
        <?php //CONTROLE DE MENU
            if($_SESSION) //caso esteja logado e exista uma sessão
            {
                switch($_SESSION["dadosLogin"]->nivelacesso)
                {
                    //caso tenha nível de acesso de usuário
                    case 0: include_once "menuLogado.php"; break;
                    //caso tenha nível de acesso de clínica
                    case 1: include_once "menuClinica.php"; break;
                    //caso tenha nível de acesso de Administrador
                    case 2: include_once "menuADM.php"; break;   
                }
            }
            else{ include_once "menu.php"; }
        ?>
        <div class="bg-primary container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacus mi, venenatis et scelerisque a, consectetur eu neque. Cras id rhoncus tortor, eget     aliquam erat. Aliquam erat volutpat. Pellentesque vehicula quam quis elementum maximus. Suspendisse ut congue nibh. Quisque vitae imperdiet nulla, eget pellentesque orci. In nunc mauris, tristique ut ex nec, volutpat pretium elit. Etiam sollicitudin ullamcorper elit in ultricies.

                                    Donec cursus placerat commodo. Duis luctus arcu enim. Etiam lobortis fermentum aliquet. In lectus velit, aliquet tempor rhoncus et, efficitur sit amet nibh. Nulla quis odio id nulla rutrum pretium. Maecenas consequat consequat posuere. Nullam sed mattis sapien.

                                    Suspendisse vitae magna sed neque vestibulum fermentum. Quisque a vulputate sapien. Pellentesque condimentum scelerisque feugiat. Pellentesque luctus quam orci, ut aliquam lorem iaculis sed. Morbi ac metus ac nisl fermentum volutpat eu in nulla. Curabitur congue quam et urna porttitor condimentum. Aliquam lorem erat, euismod vel velit a, imperdiet luctus magna. Suspendisse aliquam sapien non nisi eleifend, et suscipit ante auctor. Vivamus rhoncus enim nulla, in dignissim sem elementum ut. Phasellus feugiat volutpat tempor. Sed tristique enim nec elit ornare varius. Mauris congue mauris vitae dui elementum vulputate. Suspendisse consequat, tellus nec tincidunt pellentesque, nisl augue fringilla odio, eget egestas nunc dui vel eros.

                                    Donec pharetra lacinia posuere. Integer lobortis dui vel suscipit ullamcorper. Morbi eget cursus ipsum, commodo mollis magna. Aliquam eu suscipit mi. Phasellus eu scelerisque est. Phasellus ac convallis leo. Integer maximus suscipit laoreet. Suspendisse non justo posuere nisi hendrerit efficitur. Nullam tortor justo, porttitor nec neque vel, lacinia commodo ipsum.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacus mi, venenatis et scelerisque a, consectetur eu neque. Cras id rhoncus tortor, eget     aliquam erat. Aliquam erat volutpat. Pellentesque vehicula quam quis elementum maximus. Suspendisse ut congue nibh. Quisque vitae imperdiet nulla, eget pellentesque orci. In nunc mauris, tristique ut ex nec, volutpat pretium elit. Etiam sollicitudin ullamcorper elit in ultricies.

                                    Donec cursus placerat commodo. Duis luctus arcu enim. Etiam lobortis fermentum aliquet. In lectus velit, aliquet tempor rhoncus et, efficitur sit amet nibh. Nulla quis odio id nulla rutrum pretium. Maecenas consequat consequat posuere. Nullam sed mattis sapien.

                                    Suspendisse vitae magna sed neque vestibulum fermentum. Quisque a vulputate sapien. Pellentesque condimentum scelerisque feugiat. Pellentesque luctus quam orci, ut aliquam lorem iaculis sed. Morbi ac metus ac nisl fermentum volutpat eu in nulla. Curabitur congue quam et urna porttitor condimentum. Aliquam lorem erat, euismod vel velit a, imperdiet luctus magna. Suspendisse aliquam sapien non nisi eleifend, et suscipit ante auctor. Vivamus rhoncus enim nulla, in dignissim sem elementum ut. Phasellus feugiat volutpat tempor. Sed tristique enim nec elit ornare varius. Mauris congue mauris vitae dui elementum vulputate. Suspendisse consequat, tellus nec tincidunt pellentesque, nisl augue fringilla odio, eget egestas nunc dui vel eros.

                                    Donec pharetra lacinia posuere. Integer lobortis dui vel suscipit ullamcorper. Morbi eget cursus ipsum, commodo mollis magna. Aliquam eu suscipit mi. Phasellus eu scelerisque est. Phasellus ac convallis leo. Integer maximus suscipit laoreet. Suspendisse non justo posuere nisi hendrerit efficitur. Nullam tortor justo, porttitor nec neque vel, lacinia commodo ipsum.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                </div>
            </div> 
        </div>
    </div>
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL;?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>