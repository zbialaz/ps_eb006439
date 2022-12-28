<?php


function retornaHTMLAlertMenssagemSessao()
{
    if (!isset($_SESSION['mensagem']) || !is_array($_SESSION['mensagem'])) {
        return '';
    }

    $tipo = $_SESSION['mensagem']['tipo'];
    $texto = $_SESSION['mensagem']['texto'];

    $bootstrapAlert = <<<HTML
      <div class="alert alert-{$tipo}" role="alert">
        {$texto}
      </div>
  HTML;

    unset($_SESSION['mensagem']);

    return $bootstrapAlert;
}

function redireciona(string $destino, string $tipoMsg='', string $mensagem='')
{
    if ($tipoMsg && $mensagem) {
        $_SESSION['mensagem'] = [
            'tipo'  => $tipoMsg,
            'texto' => $mensagem
        ];
    }

    header('location:' . $destino);
    exit;
}

function acessoRestrito()
{
    if (empty($_SESSION['cliente'])) {
        redireciona('/login', 'warning', 'Faça logon para continuar');
    }
}