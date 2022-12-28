<?php

namespace Petshop\Controller;

use Petshop\Core\Exception;
use Petshop\Model\Marca;
use Petshop\View\Render;

class AdminMarcaController
{
  public function listar()
  {
    //alimentando dados para a tabela de listagem
    $dadosListagem = [];
    $dadosListagem['objeto']  = new Marca();
    $dadosListagem['imagens']  = true;
    $dadosListagem['colunas'] = [
      ['campo' => 'idmarca',  'class' => 'text-center'],
      ['campo' => 'marca'],
      ['campo' => 'fabricante'],
      ['campo' => 'created_at', 'class' => 'text-center'],
    ];
    $htmlTabela = Render::block('tabela-admin', $dadosListagem);

    //alimentando dados para a página de clientes
    $dados = [];
    $dados['titulo'] = 'Marcas - Listagem';
    $dados['usuario'] = $_SESSION['usuario'];
    $dados['tabela'] = $htmlTabela;

    Render::back('marcas', $dados);
  }

  public function form($valor)
  {
    //verificar se o parâmetro tem um número e, se for número, é um ID válido
    if (is_numeric($valor)) {
      $objeto = new Marca();
      $resultado = $objeto->find(['idmarca=' => $valor]);
      if (empty($resultado)) {
        redireciona('/admin/marcas', 'danger', 'Link inválido, registro não localizado');
      }
      $_POST = $resultado[0];
      $_POST['senha'] = '';
    }

    //cria e exibe o formulário
    $dados = [];
    $dados['titulo'] = 'Marcas - Manutenção';
    $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

    Render::back('marcas', $dados);
  }

  public function postForm($valor)
  {
    $objeto = new Marca();

    //se $valor tem um número, carrega dados relativos a ele
    if (is_numeric($valor)) {
      if (!$objeto->loadById($valor)) {
        redireciona('/admin/marcas', 'danger', 'Link inválido, registro não localizado');
      }
    }

    try {
      
      $campos = array_change_key_case($objeto->getFields());
      foreach($campos as $campo => $propriedades) {
        if(isset($_POST[$campo])) {
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
    redireciona('/admin/marcas', 'success', 'Alterações realizadas com SUCESSO');
  }

  public function renderizaFormulario($novo)
  {
    $dados = [
      'btn_class' => 'btn btn-warning px-5 mt-5',
      'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
      'fields' => [
        ['type' => 'readonly', 'name' => 'idmarca', 'class' => 'col-3', 'label' => 'Id. Marca'],
        ['type' => 'text', 'name' => 'marca', 'class' => 'col-5', 'label' => 'Marca', 'required'=>true],
        ['type' => 'text', 'name' => 'fabricante', 'class' => 'col-6', 'label' => 'Fabricante'],
        ['type' => 'readonly', 'name' => 'created_at', 'class' => 'col-3', 'label' => 'Criado em:'],
        ['type' => 'readonly', 'name' => 'updated_at', 'class' => 'col-3', 'label' => 'Atualizado em:'],
      ]
    ];

    return Render::block('form', $dados);
  }
}