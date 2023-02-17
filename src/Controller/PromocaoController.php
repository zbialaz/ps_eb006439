<?php

namespace Petshop\Controller;

use Petshop\Core\FrontController;
use Petshop\View\Render;
use Petshop\Model\Promocao;

class PromocaoController extends FrontController
{
  public function listapromocao()
  {
    $dados = [];
    $dados['topo'] = $this->carregaHTMLTopo();
    $dados['rodape'] = $this->carregaHTMLRodape();

    $promocao = new Promocao();
    $rowsPromocao = $promocao->find();

    foreach ($rowsPromocao as &$p) {
      $promocao = new Promocao();
      $promocao->loadById($p['idpromocao']);
      $p['imagens'] = $promocao->getFiles();
    }
    $dados['promocao'] = $rowsPromocao;

    Render::front('promocao', $dados);
  }
}