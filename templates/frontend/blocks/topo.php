 <!-- HACK PARA O TOPO FIXO NÃO "COMER" O CONTEÚDO DA PÁGINA -->
 <div style="margin-top: 0em">&nbsp;</div>
 <div class="topo-site fixed-top">
   <div class="container">
     <div class="topo-site-superior row pt-3 pb-1">
       <div class="col-2 topo-site-logo d-flex align-items-center">
         <a href="/" title="Voltar ao início do site">
           <img src="https://picsum.photos/180/50" width="180px" height="50px" alt="Logo" class="img-fluid rounded-1">
         </a>
       </div>
       <div class="topo-site-busca col-6">
         <form action="/busca" method="GET" class="position-relative h-100 d-flex align-items-center">
           <input type="text" name="ps_busca" class="form-control input-busca rounded-5 pe-5">
           <button type="submit" class="btn-busca"><i class="bi bi-search"></i></button>
       </div>
       </form>

       <div class="topo-site-opcoes col-4 row text-center align-items-center">
         <div class="topo-site-opcoes-usr col-8">
           <a href="/login" title="Entrar/Cadastrar" class="d-flex align-items-center">
             <i class="bi bi-person-fill fs-3 pe-2"></i>
             <span>Entre ou cadastre-se</span>
           </a>
         </div>
         <div class="col-4 d-flex justify-content-between">
           <a href="/favoritos" title="Ver meus favoritos" class="px-3">
             <i class="bi bi-box2-heart-fill fs-3"></i>
           </a>
           <a href="/carinho" title="Ver meu carrinho de compras" class="px-3">
             <i class="bi bi-cart-fill fs-3"></i>
           </a>
         </div>
       </div>
       <div class="topo-site-inferior row ">
            <div class="topo-site-inferior-menu col-2">
                <a data-bs-toggle="offcanvas" href="#offcanvas-menu" aria-controls="offcanvas-menu" class="d-flex align-items-center">
                    <i class="bi bi-list fs-3 pe-1"></i>
                    <span>Departamentos</span>
                </a>
            </div>
            <div class="topo-site-inferior-contatos col-6 row">
                <div class="col-auto d-flex align-items-center">
                    <a href="/nossas-lojas" title="Conheça as nossas lojas">
                        <i class="bi bi-geo-alt-fill pe-1"></i>
                        <span>Nossas Lojas</span>
                    </a>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <a href="/fale-conosco" title="Fale Conosco">
                        <i class="bi bi-megaphone-fill pe-1"></i>
                        <span>Fale Conosco</span>
                    </a>
                </div>
            </div>
            <div class="topo-site-inferior-fone col-4 d-flex align-items-center justify-content-end">
                <i class="bi bi-telephone-fill pe-2"></i>
                <span>(55) 99143-3893</span>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start rounded-2 m-2" data-bs-scroll="true" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvas-menuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvas-menuLabel">Categorias do site</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p>Lista das categorias 1</p>
        <p>Lista das categorias 2</p>
        <p>Lista das categorias 3</p>
    </div>
</div>