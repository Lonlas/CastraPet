<nav class="navbar navbar-expand-md navbar-light bg-transparent p-4 m-2">
  <a class="navbar-brand" href="<?php echo URL.'inicio';?>">Início</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link"  href="<?php echo URL.'home-adm'; ?>">Inicío <span class="sr-only">(página atual)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'cadastra-raca'; ?>">Cadastrar Raça</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'cadastra-clinica'; ?>">Cadastrar Clínica</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Consultar
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo URL.'consulta-usuario'; ?>">Usuários</a></li>
            <li><a class="dropdown-item" href="<?php echo URL.'consulta-clinica'; ?>">Clínicas</a></li>
            <li><a class="dropdown-item" href="<?php echo URL.'consulta-castracao'; ?>">Castrações</a></li>
          </ul>
        </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0">
      <a href="<?php echo URL.'inicio'; ?>" class="btn btn-success my-2 my-sm-0">Encerrar Sessão</a>
    </form>
  </div>
</nav>