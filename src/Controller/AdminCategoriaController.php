<?php

namespace Petshop\Controller;

use Exception;
use Petshop\Model\Categoria;
use Petshop\View\Render;

class AdminCategoriaController
{
    public function listar()
    {
        // alimentando dados para a tabela de listagem
        $dadosListagem= [];
        $dadosListagem['objeto'] = new Categoria;
        $dadosListagem['imagens'] = true;
        $dadosListagem['remover'] = true;
        $dadosListagem['colunas'] = [
            ['campo'=>'idcategoria', 'class'=>'text-center'],
            ['campo'=>'nome', 'class'=>'text-center'],
            ['campo'=>'created_at', 'class'=>'text-center']
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        // alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Categorias - Listagem';
        $dados['tabela'] = $htmlTabela;

        Render::back('categorias', $dados);
    }

    public function form($valor)
    {
        // verificar se o parâmetro tem um número e, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Categoria;
            $resultado = $objeto->find(['idcategoria ='=>$valor]);
            if (empty($resultado)) {
                redireciona('/admin/categorias', 'danger', 'Link inválido, registro não localizado');
            }
            $_POST = $resultado[0];
        }

        $dados = [];
        $dados['titulo'] = 'Categorias - Manutenção';
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('categorias', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Categoria;

        // se um $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/categorias', 'danger', 'Link inválido, registro não localizado');
            }
        }

        try {
            $campos = array_change_key_case($objeto->getFields());
            foreach($campos as $campo => $propriedades) {
                if (isset($_POST[$campo])) {
                    $objeto->$campo = $_POST[$campo];
                }
            }
            
            $objeto->save();

        } catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo'=>'warning',
                'texto'=>$e->getMessage()
            ];
            $this->form($valor);
            exit;
        }

        redireciona('/admin/categorias', 'success', 'Alterações realizadas com sucesso');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 mt-4 text-light',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idcategoria', 'class'=>'col-2', 'label'=>'ID Categoria'],
                ['type'=>'text', 'name'=>'nome', 'class'=>'col-10', 'label'=>'Categoria', 'required'=>true],
                ['type'=>'textarea', 'name'=>'descricao', 'class'=>'col-12', 'label'=>'Descrição'],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-6', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-6', 'label'=>'Atualizado em:'],
            ]
        ];
        return Render::block('form', $dados);
    }
}