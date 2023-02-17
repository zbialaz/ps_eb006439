<div class="container">
    <div class="row w-75 mx-auto mt-3">

        <h1 class="h3 text-center">Carrinho de Compras</h1>

        <hr class="my-3">

        <?php $valorTotal = 0; ?>


        <?php foreach ($produtos as $produto) : ?>
            <div class="col-2">
                <img src="<?= $produto['imagens'][0]['url'] ?>" alt="" class="img-fluid">
            </div>
            <div class="col-6 d-flex align-items-center">
                <?= $produto['nome'] ?>
            </div>
            <div class="col-2 d-flex align-items-center">
                <a href="#" class="altera-qtd-produto" data-incremento="-1" data-idproduto="<?= $produto['idproduto'] ?>">
                    <i class="bi bi-dash"></i>
                </a>

                <input type="text" class="w-100 mx-2 text-center" value="<?= $produto['quantidade'] ?>" id="produto-<?= $produto['idproduto'] ?>">

                <a href="#" class="altera-qtd-produto" data-incremento="+1" data-idproduto="<?= $produto['idproduto'] ?>">
                    <i class="bi bi-plus"></i>
                </a>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center display-1 fs-4">
                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
            </div>
            <hr class="my-3">
            <?php $valorTotal += $produto['preco'] * $produto['quantidade']; ?>
        <?php endforeach; ?>

        <div class="col-10 d-flex align-items-center justify-content-end h3 mb-0">
            Total no carrinho
        </div>
        <div class="col-2 text-center display-1 fs-4 valor-total">
            R$ <?= number_format($valorTotal, 2, ',', '.') ?>
        </div>
        <hr class="my-3">

        <div class="col-12 text-end mb-5">
            <a href="#" class="btn btn-danger">Finalizar compra</a>
        </div>
    </div>
</div>