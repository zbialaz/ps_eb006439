<div class="container my-3">
  <div class="site-card-empresas">

    <?php
    foreach ($empresa as $e) {
      $imgLink = $e['imagens'][0]['url'] ?? '';

      echo <<<HTML
              <a href="#" class="text-decoration-none text-body">
                <div class="col-12 pb-2">
                  <div class="card-esmpresas card border-dark">
                    <div class="card-body row">
                      <div class="row">
                        <div class="col-5">
                          <img class="img-fluid w-100" src="{$imgLink}" alt="{$e['nomefantasia']}" style="height=700px">
                        </div>
                        <div class="row col-7 d-flex align-items-center text-center">
                          <div class="col-12">
                          <h1><b>{$e['nomefantasia']}</b></h1>
                          </div>
                          <div class="col-12">
                          <span class="h6">{$e['razaosocial']}</span>
                          </div>
                          <div class="col-12">
                          <span class="h6">Localizada em: {$e['rua']}, {$e['numero']} - {$e['estado']}/{$e['cep']}</span>
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