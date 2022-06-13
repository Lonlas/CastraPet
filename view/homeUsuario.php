<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.php";?>

</head>
<body>
    
    <!-- CORPO -->
    <div class="container-fluid d-grid min-vh-100 corpo">

    <?php /*Controle de menu!*/ include_once "menuControle.php";?>
    
        <div class="bg-primary container-fluid" style="grid-area: corpo;">
            <div class="row h-100 align-items-center">
                <div class="p-3">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                                    <p>
                                        Seja bem-vindo(a) ao projeto PetCastra, um site em que você pode se cadastrar para agendar uma castração gratuita para seu gato ou cachorro 
                                        através do programa gratuito da Prefeitura de Franco da Rocha. Você sabe sobre as vantagens de castrar seu animalzinho? Algumas delas são:
                                        <ul>
                                            <li>Redução dos passeios externos e problemas associados a esta prática, como o desenvolvimento de doenças infecciosas contraídas nas ruas, traumas e atropelamentos, intoxicações e maus tratos;</li>
                                            <li>Redução de doenças zoonóticas (transmitidas de pets para humanos), como a <span class="fw-bold text-decoration-underline">Raiva</span> e a <span class="fw-bold text-decoration-underline">Leishmaniose</span>;</li>
                                            <li>Redução no <span class="fw-bold text-decoration-underline">comportamento de cio</span> e prevenção de doenças reprodutivas em fêmeas;</li>
                                            <li>Redução do risco de enfermidades mamárias, uterinas e ovarianas como <span class="fw-bold text-decoration-underline">neoplasias</span> e piometra (infecção no útero);</li>
                                            <li>Prevenção de doenças como pseudociese (<span class="fw-bold text-decoration-underline">gravidez psicológica</span>), hipertrofia mamária felina e estro persistente (cio);</li>
                                            <li>Prevenção de <span class="fw-bold text-decoration-underline">distúrbios testiculares</span> em machos (neoplasias, orquites (inflamação do testículo), epididimites (inflamação do epidídimo), além de auxiliar no tratamento de doenças andrógeno-dependentes como a hiperplasia prostática benigna, prostatite crônica (inflamação da próstata), adenoma e hérnia perineal;</li>
                                            <li>Auxílio no tratamento de doenças não relacionadas ao sistema reprodutivo, como diabetes e epilepsia;</li>
                                            <li>Possível redução de comportamentos indesejados como territorialismo, agressividade e marcação de território.</li>
                                            <li>Possível redução de animais abandonados nas ruas.</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-sm-3 p-md-3 p-lg-4 p-3 bg-white">
                                    <div class="card">
                                        <h4 class="card-header">Perguntas Frequentes:</h4>
                                        <ol class="list-group list-group-flush">
                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta0" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">É necessário pagar algo para castrar meu animal?</li>
                                            </a>
                                            <div class="collapse" id="pergunta0">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Não, o programa de castração é gratuito, o tutor tem apenas que lidar com os custos de transporte e cuidados pós-cirúrgicos.
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Com quantos anos posso solicitar a castração de meu animal?</li>
                                            </a>
                                            <div class="collapse" id="pergunta1">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> A partir de 18 anos você pode solicitar a castração de seu animal.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Posso castrar mais de um animal?</li>
                                            </a>
                                            <div class="collapse" id="pergunta2">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> As vagas são limitadas e distribuídas para os moradores de Franco da Rocha baseado nos seguintes critérios:
                                                        <br><br>
                                                        Caso seja <span class="fw-bold">Protetor de Animais</span>: Têm direito a <span class="fw-bold">5</span> vagas para castração por mês;
                                                        <br>
                                                        Caso tenha <span class="fw-bold">Benefício Social</span>: Têm direito a <span class="fw-bold">2</span> vagas para castração por mês;
                                                        <br>
                                                        Para o restante da <span class="fw-bold">população</span>: Têm direito a apenas <span class="fw-bold">1</span> vaga para castração por mês;
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">O programa castra outros animais além de gatos e cachorros?</li>
                                            </a>
                                            <div class="collapse" id="pergunta3">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Não, o programa castra apenas <span class="fw-bold">gatos</span> e <span class="fw-bold">cachorros</span>.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Como faço para solicitar uma castração para meu animal?</li>
                                            </a>
                                            <div class="collapse" id="pergunta4">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Clique no botão “Login” no menu do site, faça login caso já possua um cadastro, caso contrário clique em “Não possuo uma conta” e preencha as informações para se cadastrar. Após ter feito o login, vá em “Meus Animais” e cadastre seu animal, depois clique em “Solicitar Castração” e então sua solicitação estará em análise. Após ser aprovada, informações da clínica e horário serão enviadas ao e-mail cadastrado junto com as orientações que devem ser seguidas antes de ocorrer a cirurgia.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta5" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Por onde eu vou receber as informações da castração?</li>
                                            </a>
                                            <div class="collapse" id="pergunta5">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> As informações de qual clínica será a responsável por realizar a castração e o endereço junto com o horário serão enviados para o e-mail que foi usado na hora de cadastrar sua conta.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta6" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Como funciona o processo de castração?</li>
                                            </a>
                                            <div class="collapse" id="pergunta6">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> A castração é um processo simples onde o animal, após ser anestesiado, tem seus órgãos reprodutivos removidos, sendo eles no caso dos machos: os testículos, e no caso das fêmeas: o útero e os ovários. Depois da cirurgia ser feita, é orientado ao tutor os cuidados e remédios que devem ser dados ao animal para uma recuperação rápida.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta7" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Onde será castrado meu animal?</li>
                                            </a>
                                            <div class="collapse" id="pergunta7">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Seu animal será castrado em uma das clínicas que têm parceria com a prefeitura de Franco da Rocha.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta8" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-2">Tem riscos de acontecer algo com meu animal durante a cirurgia?</li>
                                            </a>
                                            <div class="collapse" id="pergunta8">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Sim, como toda cirurgia, há riscos de acontecer algo durante o processo cirúrgico. Contudo a cirurgia de castração é simples e rotineira, sendo a raro o animal ter sequelas graves após a cirurgia.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta9" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-3">Tem algo que impeça o meu animal de ser castrado?</li>
                                            </a>
                                            <div class="collapse" id="pergunta9">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Sim, não poderá ser castrado caso o animal:
                                                        <br>
                                                        <ul>
                                                            <li>Esteja no período de acasalamento;</li>
                                                            <li>Não tenha seguido as orientações pré-cirúrgicas;</li>
                                                            <li>Tenha alergia a anestesia;</li>
                                                            <li>Esteja amamentando filhotes com menos de 45 dias;</li>
                                                            <li>For muito idoso (acima de 08 anos);</li>
                                                            <li>Tenha menos de 3 meses.</li>
                                                        </ul>
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta10" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-3">Existe alguma penalidade caso eu não compareça na clínica no dia da castração?</li>
                                            </a>
                                            <div class="collapse" id="pergunta10">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Sim, caso o tutor não entre em contanto com a clínica da castração justificando sua falta, será aplicada uma punição impedindo-o de solicitar a castração de seus animais durante a campanha de castração.
                                                    </p>
                                                </div>
                                            </div>

                                            <a class="list-group-item" data-bs-toggle="collapse" href="#pergunta11" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <li class="ms-3">O programa de castração de Franco da Rocha está disponível para moradores de outros municípios?</li>
                                            </a>
                                            <div class="collapse" id="pergunta11">
                                                <div class="card card-body border-primary">
                                                    <p>
                                                        <span class="fw-bold">R:</span> Não, o programa de castração é reservado apenas para moradores de Franco da Rocha.
                                                    </p>
                                                </div>
                                            </div>
                                        </ol>
                                    </div>
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