<?php

    /* ################################ PROCESSANDO AS COLUNAS/TÍTULOS ################################ */

    // pega as propriedades dos campos do objeto e converte os nomes para minúsculo 
    $colunasObjeto = array_change_key_case($objeto->getFields());

    // monta o cabeçalho da tabela a partir das informações do objeto
    $htmlColunas = '';
    foreach($colunas as $coluna) {
        $infoColuna = $colunasObjeto[$coluna['campo']];

        $class = $coluna['class'] ?? '';

        $htmlColunas .= <<<HTML
            <th class="{$class}">{$infoColuna['label']}</th>
        HTML;
    }
    $htmlColunas .= '<th class="text-center">Opções</th>';

    /* ################################ PROCESSANDO AS LINHAS DE DADOS ################################ */

    // pegar o nome do campo chave da tabela atual
    $campoChave = $objeto->getPkName();

    // pega a rota atual para fazer o link de edição
    $rotaAtual = $_SERVER['REQUEST_URI'];

    if (!isset($rows)) {
        // pega todos os registros cadastrados nessa tabela / objeto
        $rows = $objeto->find();

    }

    // montando as linhas de dados da tabela
    $htmlLinhas = '';

    foreach($rows as $row) {
        $htmlLinhas .= '<tr>';

        foreach($colunas as $coluna) {
            $class = $coluna['class'] ?? '';
            $valorColuna = $row[$coluna['campo']];

            $htmlLinhas .= "<td class='{$class}'>{$valorColuna}</td>";
        }

        // criando o botão de EDITAR
        $valorChave = $row[$campoChave];
        $linkEdicao = "{$rotaAtual}/{$valorChave}";
        $btnEditar = <<<HTML
            <a href="{$linkEdicao}" class="text-warning text-decoration-none px-1" title="Editar registro">
                <i class="bi bi-pencil-square"></i>
            </a>
        HTML;
 
        $btnImagem = '';
        if (!empty($imagens)) {
            $model = pathinfo($objeto::class, PATHINFO_BASENAME);
            $rotaImagens = "/admin/imagens/{$model}/{$valorChave}"; 
            $btnImagem = <<<HTML
                <a href="{$rotaImagens}" class="text-success text-decoration-none px-1" title="Editar Imagens">
                    <i class="bi bi-file-image"></i>
                </a>
            HTML;
        }

        $btnExcluir = '';
        if (!empty($remover)) {
            $model = pathinfo($objeto::class, PATHINFO_BASENAME);
            $rotaExclusao = "/admin/remover/{$model}/{$valorChave}"; 
            $btnExcluir = <<<HTML
                <a href="{$rotaExclusao}" class="link-excluir text-danger text-decoration-none px-1" title="Remover">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            HTML;
        }
 
        $htmlLinhas .= <<<HTML
            <td class="text-center">
                {$btnEditar}
                {$btnExcluir}
                {$btnImagem}
            </td>
        <tr>
        HTML;
        
    }
?>

<div class="text-end mb-3">
    <a href="<?=$rotaAtual?>/add" class="btn btn-primary text-light">
        <i class="bi bi-plus-circle"></i> Novo registro
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-middle">
        <thead>
            <tr>
                <?=$htmlColunas?>
            </tr>
        </thead>
        <tbody>
            <?=$htmlLinhas?>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-end" colspan="<?= count($colunas) + 1 ?>">
                    <strong>Total de registros encontrados: <?= count($rows) ?></strong> 
                </td>
            </tr>
        </tfoot>
    </table>
</div>