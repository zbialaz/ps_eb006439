<?php

namespace Petshop\Controller;

use Petshop\Core\DB;
use Petshop\Core\FrontController;
use Petshop\Model\Produto;
use Petshop\View\Render;

class CarrinhoController extends FrontController
{
    public function listar()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $idcliente = $_SESSION['cliente']['idcliente'] ?? 0;

        $sql = 'SELECT p.idproduto, p.nome, p.preco, cp.quantidade
                FROM carrinhos c
                INNER JOIN carrinhosprodutos cp ON cp.idcarrinho = c.idcarrinho
                INNER JOIN produtos p ON p.idproduto = cp.idproduto
                WHERE c.idcliente = ?
                ORDER BY cp.created_at DESC';
        $produtos = DB::select($sql, [$idcliente]);

        $objProduto = new Produto;
        foreach($produtos as &$p) {
            $objProduto->loadById($p['idproduto']);
            $p['imagens'] = $objProduto->getFiles();
        }

        $dados['produtos'] = $produtos;  

        Render::front('carrinho', $dados);
    }
}