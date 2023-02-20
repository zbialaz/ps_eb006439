<?php

namespace Petshop\Controller;

use Petshop\Core\FrontController;
use Petshop\Model\Marca;
use Petshop\Model\Produto;
use Petshop\View\Render;

class HomeController extends FrontController
{
    public function index()
    {
        $dados = [];
        $dados['titulo'] = 'Página inicial';
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        

        $produtos = (new Produto)->find();
        $produtoAtual = new Produto;
        
        foreach($produtos as &$p) {
            $produtoAtual->loadById($p['idproduto']);
            $p['imagens'] = $produtoAtual->getFiles();
        }

        $dados['produtos'] = $produtos;        
        Render::front('home', $dados);
    }
}