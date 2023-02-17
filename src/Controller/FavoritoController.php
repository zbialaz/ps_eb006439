<?php

namespace Petshop\Controller;

use Petshop\Core\DB;
use Petshop\Core\FrontController;
use Petshop\Model\Produto;
use Petshop\View\Render;

class FavoritoController extends FrontController
{
    public function listar()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $idcliente = $_SESSION['cliente']['idcliente'] ?? 0;

        $sql = 'SELECT p.*
                FROM produtos p
                INNER JOIN favoritos f ON f.idproduto = p.idproduto
                WHERE f.idcliente = ?
                ORDER BY p.nome';
                
        $produtos = DB::select($sql, [$idcliente]);

        $objProduto = new Produto;
        foreach($produtos as &$p) {
            $objProduto->loadById($p['idproduto']);
            $p['imagens'] = $objProduto->getFiles();
        }

        $dados['produtos'] = $produtos;  

        Render::front('favoritos', $dados);
    }
}