<?php

namespace Petshop\Controller;

use Exception;
use Petshop\Core\DB;

class AdminRemoveController
{
    public function acao($model, $idModel)
    {
        $urlOrigemClick = $_SERVER['HTTP_REFERER'];

        $modelPath = "Petshop\\Model\\{$model}";
        if (!class_exists($modelPath)) {
            redireciona($urlOrigemClick, 'danger', 'Página não localizada/Classe de dados destino não definida');
        }

        $objeto = new $modelPath;

        if (!$objeto->loadById($idModel)) {
            redireciona($urlOrigemClick, 'danger', 'O registro informado não foi localizado em ' . $model);
        }

        try {
            $tabelaAlvo = $objeto->getTableName();
            $campoChave = $objeto->getPkName();

            if ($tabelaAlvo == 'arquivos') {
                $nomeArquivo = $objeto->idArquivo . '.' . pathinfo($objeto->nome, PATHINFO_EXTENSION);
                $nomeArquivo = PATH_PROJETO . 'public/assets/img/uploads/' . $nomeArquivo;
            }

            $sql = "DELETE FROM {$tabelaAlvo} WHERE {$campoChave} = ?";
            $st = DB::query($sql, [$idModel]);

            if ($st->rowCount()) {
                if (!empty($nomeArquivo)) {
                    unlink($nomeArquivo);
                }
                redireciona($urlOrigemClick, 'success', 'Registro removido com sucesso');
            }
            redireciona($urlOrigemClick, 'warning', 'Registro não pôde ser removido');

        } catch(Exception $e) {
            redireciona($urlOrigemClick, 'danger', $e->getMessage());
        }
    }
}