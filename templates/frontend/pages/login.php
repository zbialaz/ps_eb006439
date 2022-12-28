<div class="container my-5 pg-login">

    <div class="col-6 mx-auto">
        <?= retornaHTMLAlertMenssagemSessao() ?>
    </div>


    <div class="row">
        <div class="col-3 ms-auto border-end">
            <h3 class="text-center display-6 pb-2 border-bottom mb-4">Faça seu Logon</h3>
            <?= $formLogin ?>
        </div>
        <div class="col-3 me-auto text-center">
            <h3 class="display-6 pb-2 border-bottom mb-4">Crie sua Conta</h3>
            <a href="/cadastro" class="btn btn-info w-75 btn-conta">Criar conta</a>
        </div>
    </div>
</div>