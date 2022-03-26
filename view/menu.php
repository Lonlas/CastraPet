<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="<?php echo URL.'sobre'; ?>">Início</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL; ?>">Inicío <span class="sr-only">(página atual)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL.'sobre'; ?>">Sobre</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL.'contato'; ?>">Contato</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="<?php echo URL.'adm'; ?>" class="btn btn-secondary my-2 my-sm-0">Entrar</a>
    </form>
  </div>
</nav>