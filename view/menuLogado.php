<nav class="navbar navbar-expand-md navbar-light bg-transparent p-4 m-2">
<a class="navbar-brand" href="<?php echo URL.'inicio';?>">Início</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL; ?>">Inicío <span class="sr-only">(página atual)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'cadastra-animal'; ?>">Cadastrar Animal</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'sobre'; ?>">Sobre</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'#'; ?>">Prefeitura Franco da Rocha</a>
    </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0">
    <span class="material-symbols-outlined align-middle fs-1 me-3">
        account_circle
    </span>
        <a href="#" class="pe-auto text-decoration-none">
            <img src="<?php echo URL; ?>recursos/img/Logo-Castra-Pet.svg" alt="Perfil" width="50" class="me-3">
        </a>
        <a href="<?php echo URL.'login';?>" class="btn btn-success my-2 my-sm-0">Encerrar Sessão</a>
    </form>
</div>
</nav>