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
                    <div class="container bg-dark text-light font-weight-bold p-3">
                        <h5 class="m-0">Cadastrar Clínica</h5>
                    </div>
                    <div class="container p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                        <form action="cadastrar-clinica" class="p-sm-3 p-md-3 p-lg-4 p-3 px-0 row m-0" method="POST">
                            <div class="col-md-6 mb-lg-0 mb-5 p-0 pe-md-3">
                                <div class="form-group row-3">
                                    <label for="txtNome">Nome:</label>
                                    <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtEmail">E-mail:</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group row-3">
                                    <label for="txtCNPJ">CNPJ:</label>
                                    <input type="text" id="txtCNPJ" name="txtCNPJ" class="form-control" placeholder="" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtTelefone">Telefone:</label>
                                            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtVagas">Vagas:</label>
                                            <input type="number" id="txtVagas" name="txtVagas" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 ps-md-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtCEP">CEP:</label>
                                            <input type="text" id="txtCEP" name="txtCEP" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="txtNumero">Número:</label>
                                            <input type="text" id="txtNumero" name="txtNumero" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="txtBairro">Bairro:</label>
                                    <input type="text" id="txtBairro" name="txtBairro" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtRua">Rua:</label>
                                    <input type="text" id="txtRua" name="txtRua" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtSenha">Crie uma Senha:</label>
                                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtConfSenha">Confirme a Senha</label>
                                    <input type="password" id="txtConfSenha" name="txtConfSenha" class="form-control" placeholder="" required>
                                    <div class="text-danger" id="avisoIgualdade" style="display:none;">as Senhas devem ser iguais*</div>
                                    <div class="text-danger" id="avisoComprimento" style="display:none;">A senha deve conter mais que 5 dígitos*</div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success float-end mt-4" value="Cadastrar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark" style="grid-area: footer;">
            <div class="row h-100 align-items-center">
                <div class="px-5">
                    <a href="<?php echo URL.'home-adm';?>" class="btn btn-success">Voltar</a>
                </div>
            </div> 
        </div>
    </div>

    <!-- /CORPO -->

    <!-- EXTENSÃO BOOTSTRAP -->
    <script src="<?php echo URL; ?>recursos/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>recursos/js/bootstrap.min.js"></script>    

    <!-- EXTENSÃO JQUERY DAS MASCARAS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <script>
        //Adicionar Máscaras
        $(document).ready(function (){
            $("#txtCNPJ").mask('00.000.000/0000-00');
            $("#txtCEP").mask('00000-000');
            $("#txtTelefone").mask('(00) 0000 0000');
        });
    </script>
    <script>
        //Consultar CEP
            const $campoCEP = document.getElementById("txtCEP");
            const $campoBairro = document.getElementById("txtBairro");
            const $campoRua = document.getElementById("txtRua");

            $campoCEP.addEventListener("blur", infosDoEvento => {
                const cep = infosDoEvento.target.value;
                if($campoCEP.value != '')
                {
                    fetch('https://viacep.com.br/ws/'+cep+'/json/')
                    .then((RetornoDoServidor) => {
                        return RetornoDoServidor.json();
                    })
                    .then((objJS) => {
                        if(objJS.erro == 'true')
                        {
                            $campoBairro.value = '';
                            $campoRua.value = '';
                        }else
                        {
                            //07868150
                        console.log(objJS);
                        $campoBairro.value = objJS.bairro;
                        $campoRua.value = objJS.logradouro;
                        }
                    })
                }
                else
                {
                    $campoBairro.value = '';
                    $campoRua.value = '';
                }
            });
    </script>
    <script type="text/javascript">
        //confirme a senha
        $("form").submit(function(){
            if($("#txtSenha").val() != $("#txtConfSenha").val())
            {
                event.preventDefault();
                $("#avisoIgualdade").show();
            }
            else{$("#avisoIgualdade").hide();}

            if(($("#txtSenha").val().length <= 5) && ($("#txtConfSenha").val().length <= 5))
            {
                event.preventDefault();
                $("#avisoComprimento").show();
            }
            else {$("#avisoComprimento").hide();}
        });
    </script>

    
</body>
</html>