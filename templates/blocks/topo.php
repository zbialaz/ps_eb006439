<?php
if (empty($cliente)) {
    $opcaoLogin = <<<HTML
                <a href="/login" title="Entrar/Cadastrar" class="d-flex align-items-center lh-1">
                    <i class="bi bi-person fs-3 pe-2"></i>
                    <span>Entre ou<br>cadastre-se</span>
                </a>
            HTML;
} else {
    $opcaoLogin = <<<HTML
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Olá <strong>{$cliente['prinome']}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="/meus-dados">Minha área</a></li>
                    <li><a class="dropdown-item" href="/meus-pedidos">Meus pedidos</a></li>
                    <li><hr class="dropdown-divider border-light"></li>
                    <li><a class="dropdown-item" href="/logout">Sair</a></li>
                </ul>
                </div>
        HTML;
}
?>

<!-- hack para o topo fixo não "comer" o conteúdo da página -->
<div style="margin-top: 5.5em">&nbsp;</div>

<div class="topo-site fixed-top">
    <div class="container">
        <div class="topo-site-superior row pt-3 pb-1">
            <div class="col-2 topo-site-logo d-flex align-items-center">
                <a href="/" title="Voltar ao início do site">
                    <img src="/assets/img/logo_site.png" width="180" height="50" alt="Logo" class="img-fluid rounded-1">
                </a>
            </div>
            <div class="topo-site-busca col-6">
                <form action="/busca" method="GET" class="position-relative h-100 d-flex align-items-center">
                    <input type="text" name="ps-busca" class="form-control input-busca rounded-5 pe-5" value="<?= $_GET['ps-busca'] ?? '' ?>">
                    <button type="submit" class="btn-busca"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="topo-site-opcoes col-4 row align-items-center">
                <div class="col-8 topo-site-opcoes-usr">
                    <?= $opcaoLogin ?>
                </div>
                <div class="col-4 d-flex justify-content-between">
                    <a href="/favoritos" title="Ver meus favoritos" class="px-3">
                        <i class="bi bi-box2-heart fs-3"></i>
                    </a>
                    <a href="/carrinho" title="Ver meu carrinho" class="px-3">
                        <i class="bi bi-cart3 fs-3"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row topo-site-inferior">
            <div class="topo-site-inferior-menu col-2">
                <a class="d-flex align-items-center" data-bs-toggle="offcanvas" href="#offcanvas-menu" aria-controls="offcanvas-menu">
                    <i class="bi bi-list fs-3 pe-1"></i>
                    <span>Departamentos</span>
                </a>
            </div>
            <div class="topo-site-inferior-contatos col-6 row">
                <div class="col-auto d-flex align-items-center">
                    <a href="/nossas-lojas" title="Conheça as nossas lojas">
                        <i class="bi bi-geo-alt pe-1"></i>
                        <span>Nossas lojas</span>
                    </a>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <a href="/fale-conosco">
                        <i class="bi bi-megaphone pe-1"></i>
                        <span>Fale conosco</span>
                    </a>
                </div>

                <div class="col-auto d-flex align-items-center">
<<<<<<< HEAD
                    <a href="/promocoes" title="Promocoes">
=======
                    <a href="/promocao" title="Promocoes">
>>>>>>> 79c4b7819bb44b0e6544660731a2e94d37076284
                        <i class="pe-1 bi bi-bullseye"></i>
                        <span>Promoções</span>
                    </a>
                </div>

            </div>
            <div class="topo-site-inferior-fone col-4 justify-content-end d-flex align-items-center">
                <i class="bi bi-telephone pe-2"></i>
<<<<<<< HEAD
                <span><?= $telefone1 ?? '' ?></span>
=======
                <span> (55) 3537-1276 </span>
>>>>>>> 79c4b7819bb44b0e6544660731a2e94d37076284
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
<div class="offcanvas offcanvas-start rounded-3 m-3" data-bs-scroll="true" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvas-menuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvas-menuLabel">Categorias do site</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group list-group-flush">
            <?php
            foreach ($categorias ?? [] as $c) {
                echo <<<HTML
                        <a href="/categorias/{$c['idcategoria']}" class="list-group-item list-group-item-action">
                            {$c['nome']}
                        </a>
                    HTML;
            }
            ?>
=======


<div class="offcanvas offcanvas-start rounded-3 m-3" data-bs-scroll="true" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvas-menuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvas-menuLabel">Categorias dos Produtos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    <div class="list-group">

  </a>
  <a href="#" class="list-group-item list-group-item-action">Beleza e Limpeza</a>
  <a href="#" class="list-group-item list-group-item-action">Casa</a>
  <a href="#" class="list-group-item list-group-item-action">Coleira e Peitorais</a>
  <a href="#" class="list-group-item list-group-item-action">Gaiolas</a>
  <a href="#" class="list-group-item list-group-item-action">Pestiscos</a>
  <a href="#" class="list-group-item list-group-item-action">Rações especiais</a>
  <a href="#" class="list-group-item list-group-item-action">Vitaminas</a>
>>>>>>> 79c4b7819bb44b0e6544660731a2e94d37076284
        </div>
    </div>
</div>