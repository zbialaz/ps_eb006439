<?php

namespace Petshop\Controller;

use Petshop\Core\FrontController;
use Petshop\Model\Empresa;
use Petshop\View\Render;

class NossasLojasController extends FrontController
{
    public function nossasLojas()
    {
        // $valor = 0;
        // $objeto = new Empresa;
        //     $resultado = $objeto->find(['idempresa =' => $valor]);
        //     if(empty($resultado)) {
        //         redireciona('/nossas-lojas', 'danger', 'Link inválido, registro não localizado');
        //     }
        //     $_POST = $resultado[0];

        $dados = [];
        $dados['titulo'] = 'Nossas Lojas';
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        
        Render::front('nossas-lojas', $dados);
    }

}