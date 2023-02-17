<?php

namespace Petshop\Controller;

use Petshop\Core\Exception;
use Petshop\Model\Promocao;
use Petshop\View\Render;

class AdminPromocoesController
{
  public function listar()
  {
    $dadosListagem = [];
    $dadosListagem['objeto']  = new Promocao();
    $dadosListagem['imagens']  = true;
    $dadosListagem['colunas'] = [
      ['campo' => 'idpromocao',  'class' => 'text-center'],
      ['campo' => 'titulo', 'class' => 'text-center'],
      ['campo' => 'percentual', 'class' => 'text-center'],
      ['campo' => 'datainicial', 'class' => 'text-center'],
      ['campo' => 'datafinal', 'class' => 'text-center'],
      ['campo' => 'created_at', 'class' => 'text-center'],
      ['campo' => 'updated_at', 'class' => 'text-center']
    ];

    
    $htmlTabela = Render::block('tabela-admin', $dadosListagem);
    $dados = [];
    $dados['titulo'] = 'Promoções - Listagem';
    $dados['usuario'] = $_SESSION['usuario'];
    $dados['tabela'] = $htmlTabela;

    Render::back('promocao', $dados);
  }

  public function form($valor)
  {
    if (is_numeric($valor)) {
      $objeto = new Promocao();
      $resultado = $objeto->find(['idpromocao=' => $valor]);
      if (empty($resultado)) {
        redireciona('/admin/promocao', 'danger', 'Link inválido, registro não localizado');
      }
      $_POST = $resultado[0];
      $_POST['senha'] = '';
    }

    $dados = [];
    $dados['titulo'] = 'Promoções - Manutenção';
    $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

    Render::back('promocao', $dados);
  }

  public function postForm($valor)
  {
    $objeto = new Promocao();

    if (is_numeric($valor)) {
      if (!$objeto->loadById($valor)) {
        redireciona('/admin/promocao', 'danger', 'Link inválido, registro não localizado');
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
    redireciona('/admin/promocao', 'success', 'Alterações realizadas com SUCESSO');
  }

  public function renderizaFormulario($novo)
  {
    $dados = [
      'btn_class' => 'btn btn-warning px-5 mt-5',
      'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
      'fields' => [
        ['type' => 'readonly', 'name' => 'idpromocao', 'class' => 'col-2', 'label' => 'Id. Promoção'],
        ['type' => 'text', 'name' => 'titulo', 'class' => 'col-10', 'label' => 'Título da Promocao', 'required'=>true],
        ['type' => 'text', 'name' => 'percentual', 'class' => 'col-12', 'label' => 'Percentual', 'required'=>true],
        ['type' => 'text', 'name' => 'datainicial', 'class' => 'col-3', 'label' => 'Data Inicial (ANO-MES-DIA)', 'required'=>true],
        ['type' => 'text', 'name' => 'datafinal', 'class' => 'col-3', 'label' => 'Data Final (ANO-MES-DIA)'],
        ['type' => 'readonly', 'name' => 'created_at', 'class' => 'col-3', 'label' => 'Criado em:'],
        ['type' => 'readonly', 'name' => 'updated_at', 'class' => 'col-3', 'label' => 'Atualizado em:'],
      ]
    ];

    return Render::block('form', $dados);
  }
}