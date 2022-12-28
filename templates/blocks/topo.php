<?php
if (empty($cliente)) {
  $opcaoLogin  = <<<HTML
      <a href="/login" title="Entrar ou cadastrar" class="d-flex align-items-center lh-1">
        <i class="bi bi-person fs-3 pe-2"></i>
        <span>Entrar ou<br>
        cadastrar</span>
      </a>
  HTML;
} else {
  $opcaoLogin = <<<HTML
      <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
          <i class="bi bi-person fs-3 pe-1"></i>
          Olá <strong>{$cliente['prinome']}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark border-light">
          <li><a class="dropdown-item" href="/meus-dados">Minha área</a></li>
          <li><a class="dropdown-item" href="/meus-pedidos">Meus pedidos</a></li>
          <li><hr class="dropdown-divider border-light"></li>
          <li><a class="dropdown-item" href="/logout">Sair</a></li>
        </ul>
      </div>
  HTML;
}
?>

<!-- Hack para o topo fixo não "comer" o conteúdo da página -->
<div style="margin-top:5.5em;">&nbsp;</div>
<div class="topo-site fixed-top">
  <div class="container">
    <div class="topo-site-superior row pt-3 pb-1">
      <div class="col-2 topo-site-logo d-flex align-items-center">
        <a href="/" title="Voltar ao início do site">
          <img src="https://picsum.photos/180/50" width="180" height="50" alt="Logo" class="img-fluid rounded-1">
        </a>
      </div>
      <div class="topo-site-busca col-6">
        <form action="/busca" method="GET" class="position-relative d-flex align-items-center h-100">
          <input type="text" name="ps-busca" class="form-control input-busca rounded-5 pe-5">
          <button type="submit" class="btn-busca">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
      <div class="topo-site-opcoes col-4 row align-items-center">
        <div class="topo-site-opcoes-usr col-8">
          <?= $opcaoLogin ?>
        </div>
        <div class="col-4 d-flex justify-content-between">
          <a href="/favoritos" title="Ver meus favoritos" class="px-3">
            <i class="bi bi-box2-heart-fill fs-3"></i>
          </a>
          <a href="/carrinho" title="Ver meu carrinho" class="px-3">
            <i class="bi bi-cart-fill fs-3"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="row topo-site-inferior">
      <dic class="topo-site-inferior-menu col-2">
        <a class="d-flex align-items-center" data-bs-toggle="offcanvas" href="#offcanvas-menu" aria-controls="offcanvas-menu">
          <i class="bi bi-list fs-3 pe-1"></i>
          <span>Departamentos</span>
        </a>
      </dic>
      <div class="topo-site-inferior-contatos col-6 row">
        <div class="col-auto d-flex align-items-center">
          <a href="/nossas-lojas" title="Conheça as nossas lojas">
            <i class=“”bi bi-geo-alt-fill pe-1></i>
            <span>Nossas Lojas</span>
          </a>
        </div>
        <div class="col-auto d-flex align-items-center">
          <a href="/fale-conosco" title="Fale conosco">
            <i class="bi bi-megaphone-fill pe-1"></i>
            <span>Fale conosco</span>
          </a>

        </div>
      </div>
      <div class="topo-site-inferior-fone col-4 d-flex align-items-center justify-content-end">
        <i class="bi bi-telephone pe-2"></i>
        <span><?= $telefone1 ?? '' ?></span>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-start rounded-3 m-3" data-bs-scroll="true" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvas-menuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvas-menu">Categoria do site</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Categorias</p>
  </div>
</div>