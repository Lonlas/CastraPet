<nav class="navbar navbar-expand-lg navbar-light bg-transparent mx-4 my-0" style="grid-area: header;">
<a class="navbar-brand" href="<?php echo URL.'inicio';?>"><img src="<?php echo URL.'recursos/img/Logo-Fav3.png'?>" style="height:80px;"></a>
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
        <a class="nav-link"  href="<?php echo URL.'#'; ?>">Prefeitura Franco da Rocha</a>
    </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0"> 
        <a class="pe-auto text-decoration-none" href="<?php echo URL.'perfil'?>">
            <img src="<?php echo URL.'recursos/img/Logo-Castra-Pet.svg' ?>" alt="Perfil" width="50" class="me-3">
        </a>
        <a href="<?php echo URL.'encerrarSessao';?>" class="btn btn-success my-2 my-sm-0">Encerrar Sessão</a>
    </form>
</div>
</nav>