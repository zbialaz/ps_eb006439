<?php

namespace Petshop\Controller;

use  Petshop\Core\FrontController;
use Petshop\View\Render;

class FaleConoscoController extends FrontController
{
    public function listar()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHtmlTopo();
        $dados['rodape'] = $this->carregaHtmlRodape();

        Render::front('favoritos', $dados);
    }
}