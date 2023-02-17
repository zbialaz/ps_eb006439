<div class="container my-5">
    <div class="row mb-5">
        <div class="col-3 text-center text-light py-2 rounded-4" style="background-color:yellowgreen;">
            <div>Bem vindo(a): <strong><?= $cliente['prinome'] ?></strong></div>
            <div style="font-size: .8em;">(<?= $cliente['email'] ?>)</div>
            <div class="mt-4">
                <a href="/logout" class="badge text-bg-danger text-decoration-none">sair</a>
            </div>
        </div>
    </div>
    <hr class="mt-5">
    <div class="row row-cols-3">
        
        <h1 class="pb-3 rounded-2 display-6 w-100">Marcas Parceiras</h1>

        <?php
        foreach ($marcas as $p) {
            $primeiraImagem = $p['imagens'][0]['url'] ?? 'https://picsum.photos/300';
            

            echo <<<HTML
                    <div class="col position-relative mb-3">
                        <img src="{$primeiraImagem}" class="img-fluid rounded">
                    </div>
                HTML;
        }
        ?>
    </div>
</div>