<?php

namespace Petshop\Controller;

use Petshop\Core\FrontController;
use Petshop\Model\Marca;
use Petshop\View\Render;

class MeusDadosController extends FrontController
{
    public function meusDados()
    {
        acessoRestrito();
        
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        $dados['cliente'] = $_SESSION['cliente'];

        $marcas = (new Marca)->find();

        foreach($marcas as &$p) {
            $marcaAtual = new Marca;
            $marcaAtual->loadById($p['idmarca']);
            $p['imagens'] = $marcaAtual->getFiles();
        }

        $dados['marcas'] = $marcas;   

        Render::front('meus-dados', $dados);
    }
}