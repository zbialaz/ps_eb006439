<?php

namespace Petshop\Controller;

use Petshop\Core\DB;
use Petshop\Core\FrontController;
use Petshop\Model\Produto;
use Petshop\View\Render;

class BuscaController extends FrontController
{
    public function listar()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $sql = 'SELECT *
                FROM produtos
                WHERE MATCH (nome, tipo, descricao, especificacoes)
                AGAINST (?)';
        $busca = $_GET['ps-busca'] ?? '';
        $produtos = DB::select($sql, [$busca]);

        $objProduto = new Produto;
        foreach($produtos as &$p) {
            $objProduto->loadById($p['idproduto']);
            $p['imagens'] = $objProduto->getFiles();
        }

        $dados['produtos'] = $produtos;  

        Render::front('busca', $dados);
    }
}