<?php

namespace Petshop\Core;

use Petshop\Model\Empresa;
use Petshop\View\Render;

abstract class FrontController
 {
    /**
     * Alimenta com dados e renderiza o Topo do site para o cliente (front-end)
     *
     * @return void
     */
    public function carregaHTMLTopo()
    {
        $empresa = new Empresa;
        $dados = $empresa->find(['tipo ='=>'Matriz']);
        return Render::block('topo', $dados);
    }

     /**
     * Alimenta com dados e renderiza o Rodapé do site para o cliente (front-end)
     *
     * @return void
     */
    public function carregaHTMLRodape()
    {
        $empresa = new Empresa;
        $dados = $empresa->find(['tipo ='=>'Matriz']);
        return Render::block('rodape', $dados);
    }
}