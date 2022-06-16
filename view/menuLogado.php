<nav class="navbar navbar-expand-lg navbar-light bg-transparent mx-4 my-0" style="grid-area: header;">
<a class="navbar-brand" href="<?php echo URL.'home-usuario';?>"><img src="<?php echo URL.'recursos/img/LogoCP (2).png';?>" style="height:80px;"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav me-auto">
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'home-usuario'; ?>">Início</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'meus-animais'; ?>">Meus Animais</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'sobre'; ?>">Sobre</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="https://www.francodarocha.sp.gov.br/" target="_blank">Prefeitura Franco da Rocha</a>
    </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0"> 
        <a class="text-decoration-none alert p-0" href="<?php echo URL.'perfil'?>">
            <img src="<?php echo URL.'recursos/img/user.png';?>" alt="Perfil" width="40">
        </a>
        <span class="mx-3"></span>
        <a href="<?php echo URL.'encerrar-sessao';?>" class="btn btn-success my-2 my-sm-0">Encerrar Sessão</a>
    </form>
</div>
</nav>