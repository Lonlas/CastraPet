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
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">   
                        <div class="row">
                            <div class="col">
                                <p>
                                    <h4>Olá Administrador(a)!</h4>
                                    <br>
                                    O administrador pode acessar as opções no menu acima para cadastrar clínicas e raças, consultar usuários e seus animais, 
                                    raças, clínicas e castrações, onde poderá editar ou excluir um registro deles caso seja necessário. Também há a opção de 
                                    aprovar as castrações, onde poderá analisar as informações do usuário e verificar se está tudo certo para escolher qual 
                                    clínica será a responsável por definir um dia e horário para realizar a castração.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col align-items-end">
                                <a href="#" class="btn btn-outline-success float-end"  data-bs-target="#modalNovoMes" data-bs-toggle="modal">Iniciar novo mês</a>
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

    <div class="modal fade" id="modalNovoMes" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <form method="post" action="<?php echo URL.'novo-mes';?>" enctype="multipart/form-data">
                <div class="modal-header">
                  <h4 class="modal-title">Iniciar novo mês</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                  <h5 class="text-danger">Atenção! Essa ação não poderá ser desfeita!</h5>
                  <p>Ao clicar em <b>Iniciar</b>, uma nova rodada de castrações se iniciará. Portanto, todos os usuários(não punidos), voltarão a ter permissão para solicitar uma nova castração.</p>
                  <p>Insira a quantidade de vagas disponíveis nas clínicas, em: <b>Consultar clínicas</b></p>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-danger" value="Iniciar">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    
    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL;?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <!--<script src="<?php echo URL;?>recursos/js/popper.min.js"></script> Ultrapassado-->
    <script src="<?php echo URL;?>recursos/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>