<?php

?>
<div class="container my-5">
  <div class="row">
    <div class="col-3 text-center">
      <div>Bem vindo(a): <strong><?= $cliente['prinome']?></strong></div>
      <div style="font-size:.8em;">(<?= $cliente['email']?>)</div>
      <div class="mt-5">
        <a href="/logout" class="badge text-bg-warning text-decoration-none">SAIR</a>
      </div>
    </div>
    <div class="col-9 ps-5">
      - Meus Pedidos<br>
      - Meus endereços<br>
      - Meus favoritos
    </div>
  </div>
</div>