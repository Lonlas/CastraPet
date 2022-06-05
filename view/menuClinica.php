<nav class="navbar navbar-expand-md navbar-light bg-transparent mx-4 my-0" style="grid-area: header;">
  <a class="navbar-brand" href="<?php echo URL.'home-clinica';?>"><img src="<?php echo URL.'recursos/img/LogoCP (2).png'?>" style="height:80px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'home-clinica'; ?>">Área da Clínica</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'consulta-castracao'; ?>">Consultar castrações</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo URL.'lista-solicitacao'; ?>">Lista Solicitações</a>
      </li>
    </ul>
    <form class="form-inline ms-auto my-2 my-lg-0">
      <a href="<?php echo URL.'encerrar-sessao'; ?>" class="btn btn-success my-2 my-sm-0">Encerrar Sessão</a>
    </form>
  </div>
</nav>