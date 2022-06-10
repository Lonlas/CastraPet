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
        
        <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="container-fluid">
            <div class="bg-primary h-100 row align-items-center">
                <div class="container mx-auto p-3"style="grid-area:corpo;">
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        Olá <?php echo $_SESSION["dadosLogin"]->nome."!"; ?>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 px-0 bg-white">
                        <form action="<?php echo URL.'perfil'; ?>" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0" method="POST">
                            <div class="col-sm-6 form-group pe-sm-3 p-0">
                                <div class="row">
                                    <p>Nome: <?php echo $_SESSION["dadosUsuario"]->nome;?></p>
                                </div>
                                <div class="row">
                                    <p>E-mail: <?php echo $_SESSION["dadosUsuario"]->email;?></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            //Formatando o CPF
                                            $bloco1 = substr($_SESSION["dadosUsuario"]->cpf,0,3);
                                            $bloco2 = substr($_SESSION["dadosUsuario"]->cpf,3,3);
                                            $bloco3 = substr($_SESSION["dadosUsuario"]->cpf,6,3);
                                            $digverificador = substr($_SESSION["dadosUsuario"]->cpf,-2);
                                            $CPF_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
                                        ?>
                                        <p>CPF: <?php echo $CPF_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            //Formatando o Telefone
                                            $ddd = substr($_SESSION["dadosUsuario"]->telefone,0,2);
                                            $bloco1 = substr($_SESSION["dadosUsuario"]->telefone,2,4);
                                            $bloco2 = substr($_SESSION["dadosUsuario"]->telefone,6,4);
                                            $Telefone_Formatado = "(".$ddd.") ".$bloco1."-".$bloco2;

                                        ?>
                                        <p>Telefone: <?php if(empty($_SESSION["dadosUsuario"]->telefone)) echo "-"; else echo $Telefone_Formatado;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            //Formatando o RG
                                            $bloco1 = substr($_SESSION["dadosUsuario"]->rg,0,2);
                                            $bloco2 = substr($_SESSION["dadosUsuario"]->rg,2,3);
                                            $bloco3 = substr($_SESSION["dadosUsuario"]->rg,5,3);
                                            $digverificador = substr($_SESSION["dadosUsuario"]->rg,-1);
                                            $RG_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
                                        ?>
                                        <p>RG: <?php echo $RG_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                            //Formatando o Celular
                                            $ddd = substr($_SESSION["dadosUsuario"]->celular,0,2);
                                            $bloco1 = substr($_SESSION["dadosUsuario"]->celular,2,5);
                                            $bloco2 = substr($_SESSION["dadosUsuario"]->celular,7,4);
                                            $Celular_Formatado = "(".$ddd.") ".$bloco1."-".$bloco2;
                                        ?>
                                        <p>Celular: <?php echo $Celular_Formatado;?></p>
                                    </div>    
                                </div>
                                
                            </div>
                            <div class="col-sm-6 form-group ps-sm-3 p-0">
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            //Formatando o CEP
                                            $bloco1 = substr($_SESSION["dadosUsuario"]->usucep,0,5);
                                            $bloco2 = substr($_SESSION["dadosUsuario"]->usucep,-3);
                                            $CEP_Formatado = $bloco1."-".$bloco2;
                                        ?>
                                        <p>CEP: <?php echo $CEP_Formatado?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Número: <?php echo $_SESSION["dadosUsuario"]->usunumero;?></p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <p>Bairro: <?php echo $_SESSION["dadosUsuario"]->usubairro;?></p>
                                </div>
                                <div class="row">
                                    <p>Rua: <?php echo $_SESSION["dadosUsuario"]->usurua;?></p>
                                </div>
                                <div class="row">
                                    <p>
                                        <?php 
                                            if(empty($_SESSION["dadosUsuario"]->nis))
                                            {
                                                echo "<input type='checkbox' disabled>";
                                                echo " Tenho benefício NIS: - ";
                                            }
                                            else
                                            {
                                                echo "<input type='checkbox' checked disabled>";
    
                                                //Formatando o NIS
                                                $bloco1 = substr($_SESSION["dadosUsuario"]->nis,0,3);
                                                $bloco2 = substr($_SESSION["dadosUsuario"]->nis,3,5);
                                                $bloco3 = substr($_SESSION["dadosUsuario"]->nis,8,2);
                                                $digverificador = substr($_SESSION["dadosUsuario"]->nis,-1);
                                                $NIS_Formatado = $bloco1.".".$bloco2.".".$bloco3."-".$digverificador;
    
                                                echo " Tenho benefício NIS: $NIS_Formatado";
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div class="row">
                                    <p>
                                        <?php 
                                            if(empty($_SESSION["dadosUsuario"]->docprotetor)){
                                                echo "<input type='checkbox' disabled>";  
                                                echo " Sou protetor de animais";
                                            }
                                            else{
                                                echo "<input type='checkbox' checked disabled>";
                                                echo " Sou protetor de animais";
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col row">
                                <div class="col-sm-3 mb-3">
                                    <a href="<?php echo URL.'alterar-senha/'.$_SESSION["dadosLogin"]->idlogin; ?>" class="link-dark">Alterar minha senha</a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="<?php echo URL.'meus-animais'; ?>" class="btn btn-success col-auto ">Meus animais</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area:footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-usuario'; ?>" class="btn btn-success my-2 my-sm-0">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL: imagem protetor-->
    <div class="modal fade" id="modalImagem" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Documento Comprovante de protetor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="img">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>    
    </div>
    <!--/MODAL -->
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL; ?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>

    <!-- ABRIR MODAL EDITAR -->
    <script>
        //Definindo os valores nos inputs da modal
        var modal = document.getElementById('modalImagem')
        modal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes

            var img = button.getAttribute('data-bs-imagem')

            $("#img").prop("src","<?php echo URL.'recursos/img/docProtetores/'?>"+img);
        })
    </script>

</body>
</html>