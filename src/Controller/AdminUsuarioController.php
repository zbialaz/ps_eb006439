<?php
namespace Petshop\Controller;

use Petshop\Core\Exception;
use Petshop\Model\Usuario;
use Petshop\View\Render;

class AdminUsuarioController
{
  public function listar()
  {
    $dadosListagem = [];
    $dadosListagem['objeto'] = new Usuario;
    $dadosListagem['colunas'] = [
      ['campo' => 'idusuario', 'class' => 'text-center'],
      ['campo' => 'tipo', 'class' => 'text-center'],
      ['campo' => 'nome'],
      ['campo' => 'qtdacessos', 'class' => 'text-center'],
      ['campo' => 'created_at', 'class' => 'text-center'],
    ];
    $htmlTabela = Render::block('tabela-admin', $dadosListagem);

    $dados = [];
    $dados['titulo'] = 'Usuarios - Listagem';
    $dados['usuario'] = $_SESSION['usuario'];
    $dados['tabela'] = $htmlTabela;

    Render::back('usuarios', $dados);
  }

  public function form($valor)
  {
    if (is_numeric($valor)) {
      $objeto = new Usuario();
      $resultado = $objeto->find(['idusuario =' => $valor]);
      if (empty($resultado)) {
        redireciona('/admin/usuarios', 'danger', 'Link inválido, registro não localizado');
      }
      $_POST = $resultado[0];
      $_POST['senha'] = '';
    }
    $dados = [];
    $dados['titulo'] = 'Usuarios - Manutenção ';
    $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

    Render::back('usuarios', $dados);
  }

  public function postForm($valor)
  {
    $objeto = new Usuario;

    if (is_numeric($valor)) {
      if ($objeto->loadById($valor)) {
        redireciona('/admin/usuarios', 'Danger', 'Link inválido, registro não localizado');
      }
    }
    try {
      $campos = array_change_key_case($objeto->getFields());
      foreach ($campos as $campo => $propriedades) {
        if (isset($_POST[$campo])) {
          $objeto->$campo = $_POST[$campo];

          //$objeto->idUsuario = $_POST['idUsuarios'];
        }
      }
      $objeto->save();
    } catch (Exception $e) {
      $_SESSION['mensagem'] = [
        'tipo' => 'warning',
        'texto' => $e->getMessage()
      ];
      $this->form($valor);
      exit;
    }
    redireciona('/admin/usuarios', 'success', 'Alterações realizadas com sucesso');
  }

  public function renderizaFormulario()
  {

    $dados = [
      'btn_class' => 'btn btn-warning px-5 mt-5',
      'btn_label' => 'Adicionar',
      'fields' => [
        ['type' => 'readonly', 'name' => 'idusuario', 'class' => 'col-2', 'label' => 'Id. Usuario'],
        [
          'type' => 'radio-inline', 'name' => 'tipo', 'class' => 'col-3', 'label' => 'Tipo...',
          'options' => [
            ['value' => 'Gestor', 'label' => 'Gestor'],
            ['value' => 'Vendedor', 'label' => 'Vendedor'],
          ],
        ],
        ['type' => 'text', 'name' => 'qtdacessos', 'class' => 'col-3', 'label' => 'Qtde. Acessos', 'required' => true],
        ['type' => 'text', 'name' => 'nome', 'class' => 'col-4', 'label' => 'Nome completo', 'required' => true],
        ['type' => 'email', 'name' => 'email', 'class' => 'col-3', 'label' => 'E-mail', 'required' => true],
        ['type' => 'password', 'name' => 'senha', 'class' => 'col-3', 'label' => 'Senha'],
        ['type' => 'readonly', 'name' => 'created_at', 'class' => 'col-3', 'label' => 'Criado em:'],
        ['type' => 'readonly', 'name' => 'updated_at', 'class' => 'col-2', 'label' => 'Atualizado em:'],
      ]
    ];

    return Render::block('form', $dados);
  }
}