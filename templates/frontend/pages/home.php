<div class="container">

    <div class="row">
        <div class="col-6 mx-auto">
        </div>
    </div>

    <div class="row my-5">

        <div class="col-8">
            <div id="carrosselTopoHome" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner ratio ratio-21x9 rounded">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/assets/img/banner/figura-1.jpg" alt="FIGURA DO BANNER">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Produtos selecionados</h5>
                            <p><i>para melhor atender nossos melhores amigos</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/assets/img/banner/figura-2.jpg" alt="FIGURA DO BANNER">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Produtos selecionados</h5>
                            <p><i>para melhor atender nossos melhores amigos</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/assets/img/banner/figura-3.jpg" alt="FIGURA DO BANNER">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Brinquedos e petiscos para treinos</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/assets/img/banner/figura-4.jpg" alt="FIGURA DO BANNER">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Animais rastreados</h5>
                            <p><i>produtos para rastreio (chip) de animais protegidos</i></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/assets/img/banner/figura-5.jpg" alt="FIGURA DO BANNER">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Hotel</h5>
                        </div>
                    </div>
                </div>
                <button href="#carrosselTopoHome" class="carousel-control-prev" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button href="#carrosselTopoHome" class="carousel-control-next" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-4 d-flex flex-column justify-content-between">
            <div class="pb-3 rounded-2 display-6 text-center w-100">
                Vantagens exclusivas
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 mx-auto bg-light w-50">
                <div class="icone me-2"><i class="bi bi-stopwatch"></i></div>
                <div class="texto">Receba em horas</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 mx-auto bg-light w-50">
                <div class="icone me-2"><i class="bi bi-truck"></i></div>
                <div class="texto">Frete Grátis - RS</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 mx-auto bg-light w-50">
                <div class="icone me-2"><i class="bi bi-cash-stack"></i></div>
                <div class="texto">Parcele em até 12x</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 mx-auto bg-light w-50">
                <div class="icone me-2"><i class="bi bi-shop"></i></div>
                <div class="texto">Retire na loja</div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <h1 class="pb-3 rounded-2 display-6 w-100">Pet Shop</h1>
        <p class="text-justify">
            Só quem é apaixonado por animais sabe: a relação de amor e cumplicidade que temos com nossos bichinhos de estimação é um vínculo único! Por essa razão, não medimos esforços para oferecer o que há de melhor para trazer ainda mais alegria e qualidade de vida. Rações, acessórios, medicamentos e brinquedos estão na nossa listinha de prioridades; e tudo isso você encontra em nosso Pet Shop online.
        </p>
        <p class="text-justify">
            Cada item é separado de acordo não apenas com a espécie dos nossos queridos amiguinhos, mas também segundo o peso, a idade e até as condições físicas. Com isso, é possível facilitar a busca de produtos para pet perfeitos sem perder muito tempo. Afinal, a melhor experiência é aproveitar cada momento ao lado dos nossos companheiros.
        </p>
        <p class="text-justify">
            Por isso, conveniência é uma de nossas virtudes! A qualquer hora do dia ou da noite, tudo sobre pet shop — e sobre nossos animais — você pode encontrar aqui. Sempre com a qualidade das melhores marcas e com o cuidado da Petz.
        </p>
    </div>

    <div class="row">
        <img src="/assets/img/banner/bannerAzul.jpg" class="img-fluid mt-5" alt="...">
    </div>

    <div class="row row-cols-5">
        <h1 class="pb-3 rounded-2 display-6 w-100 mt-5">Produtos</h1>

        <?php
        foreach ($produtos as $p) {
            $primeiraImagem = $p['imagens'][0]['url'] ?? 'https://picsum.photos/300';
            $preco = number_format($p['preco'], 2, ',', '.');
            $nome = strlen($p['nome']) < 50 ? $p['nome'] : substr($p['nome'], 0, 50) . '...';
            $link = '/produtos/' . $p['idproduto'];

            echo <<<HTML
                    <div class="col produto position-relative mb-5">
                        <img src="{$primeiraImagem}" class="img-fluid rounded" alt="{$p['nome']}">
                        <p class="mb-0 mt-2 text-center"><strong>{$nome}</strong></p>
                        <a href="{$link}" class="btn btn-success btn-sm w-100 my-2 stretched-link">R$ {$preco}</a>
                    </div>
            HTML;
        }
        ?>
    </div>

</div>