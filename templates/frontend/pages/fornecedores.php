<div class="container my-3">
  <div class="site-card-empresas">
    <?php
    foreach ($fornecedor as $f) {
      $img = $f['imagens'][0]['url'] ?? '';

      echo <<<HTML
              <a href="#" class="text-decoration-none text-body">
                <div class="col-12 pb-2">
                  <div class="card-fornecedor card border-dark">
                    <div class="card-body row">
                      <div class="row">
                        <div class="col-5">
                          <img class="img-fluid w-50" src="{$img}" alt="{$f['nomefantasia']}" style="height=200px">
                        </div>
                        <div class="row col-5 d-flex align-items-center text-center">
                          <div class="col-12">
                            <h3><b>{$f['nomefantasia']}</b></h3>
                          </div>
                          <div class="col-12">
                            <span class="h6">{$f['razaosocial']}</span>
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