<?php
namespace Petshop\Controller;

use Petshop\Core\DB;
use Petshop\Core\Exception;

class AdminRemoveController
{
  public function remove($model, $idmodel)
  {
    $urlOrigemClique = $_SERVER['HTTP_REFERER'];

    $modelPath = "Petshop\\Model\\{$model}";
    if (!class_exists($modelPath)) {
      redireciona($urlOrigemClique, 'danger', 'Página não localizada. Classe de dados destino não definida');
    }

    $objeto = new $modelPath;

    if(!$objeto->loadById($idmodel)) {
      redireciona($urlOrigemClique, 'danger', 'O registro informado não foi localizado em: ' . $model);
    }
    try {
      $tabelaAlvo = $objeto->getTableName();
      $campoChave = $objeto->getPkName();

      if($tabelaAlvo == 'arquivos') {
        $nomeArquivo = $objeto->idarquivo . '.' . pathinfo($objeto->nome, PATHINFO_EXTENSION);
        $nomeArquivo = PATH_PROJETO . 'public/assets/img/uploads/' . $nomeArquivo;
      }

      $sql = "DELETE FROM {$tabelaAlvo} WHERE {$campoChave} = ?";
      $std = DB::query($sql, [$idmodel]);

      if($std->rowCount()) {
        if(!empty($nomeArquivo)) {
          unlink($nomeArquivo);
        }
        redireciona($urlOrigemClique, 'success', 'Registro removido com sucesso');
      }

      redireciona($urlOrigemClique, 'warning', 'Registro não pôde ser removido');

    } catch(Exception $e) {
      redireciona($urlOrigemClique,'danger', $e->getMessage());
    }
  }
}