<div class="container my-3">

<h1 class="h3 text-center mt-3">Promoções</h1>

<hr class="mb-5">

  <div class="site-card-promocoes">

    <?php
    foreach ($promocao as $p) {
      $imgLink = $p['imagens'][0]['url'] ?? '';
        
      echo <<<HTML
              <a href="#" class="text-decoration-none text-body">
                <div class="col-12 pb-2">
                  <div class="card-empresas card border-dark">
                    <div class="card-body row">
                      <div class="row">
                        <div class="col-5">
                          <img class="img-fluid w-50" src="{$imgLink}" alt="{$p['titulo']}" style="height=700px">
                        </div>
                         <div class="row col-7 d-flex align-items-center text-center">
                          <div class="col-12">
                          <span class="h6">Id: {$p['idpromocao']}</span>
                          </div>
                          <div class="col-12">
                          <span class="h6">Desconto: {$p['percentual']} % </span>
                          </div>
                          <div class="col-12">
                          <span class="h6">Início {$p['datainicial']}</span>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
      HTML;
    }
    ?>

  </div>
</div>