<?php

namespace Petshop\Controller;

use Petshop\Core\FrontController;
use Petshop\View\Render;

class MeusDadosController extends FrontController {

    public function meusDados() {
        
        acessoRestrito();

        $dados = [];
        $dados['topo'] = $this->carregaHtmlTopo();
        $dados['rodape'] = $this->carregaHtmlRodape();
        $dados['cliente'] = $_SESSION['cliente'];

            Render::front('meus-dados', $dados);
    }
}