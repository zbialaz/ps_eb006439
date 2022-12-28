<?php

namespace Petshop\Controller;

use Petshop\Core\Exception;
use Petshop\Model\Cliente;
use Petshop\Model\Usuario;
use Petshop\View\Render;

class AdminLoginController
{
  public function login()
  {

    if(!empty($_SESSION['usuario'])) {
      redireciona('/admin/dashboard');
    }

    $dados = [];
    $dados['titulo'] = 'Página de Login | Admin';
    $dados['formLogin'] = $this->formLogin();

    Render::front('admin-login', $dados);
  }


  public function logout()
  {
    $_SESSION = [];
    session_destroy();
    session_start();
    redireciona('/login','success', 'Usuário foi desconectado');
  }

  public function postLogin()
  {
    try {
      if (empty($_POST['email']) || empty($_POST['senha'])) {
        throw new Exception('Os campos de usuário e senha devem ser informados');
      }
  
      if (strlen($_POST['senha']) < 5) {
        throw new Exception('O comprimento da senha é inválido, digite ao menos cinco caracteres');
      }
  
      $dadosUsuario = (new Usuario())->find(['email=' => $_POST['email']]);
  
      if (!count($dadosUsuario)) {
        throw new Exception('Usuário ou senha inválidos');
      }
  
      $hashdaSenha = hash_hmac('md5', $_POST['senha'], SALT_SENHA);
      $senhaNoBanco = $dadosUsuario[0]['senha'];

      $senhaValida = password_verify($hashdaSenha, $senhaNoBanco);
  
      if (!$senhaValida) {
        throw new Exception('Usuário ou senha inválidos');
      }
      
      $_SESSION['usuario'] = $dadosUsuario[0];
      $nome = $_SESSION['usuario']['nome'];
      $_SESSION['usuario']['prinome'] = substr($nome, 0, strpos($nome, ' '));

      $usuarioLogado = new Usuario;
      $usuarioLogado->loadById($dadosUsuario[0]['idusuario']);
      $usuarioLogado->qtdAcessos++;
      $usuarioLogado->save();

      redireciona('/admin/dashboard');
    } catch(Exception $e) {
      $_SESSION['mensagem'] = [
        'tipo'  => 'warning',
        'texto' => $e->getMessage()
      ];
      $_POST['senha'] = '';
      $this->login();
    }

  }

  private function formLogin()
  {
    $dados = [
      'btn_label' => 'Entrar',
      'btn_class' => 'btn btn-success mt-4 w-25',
      'fields' => [
        [
          'type' => 'email',
          'name' => 'email',
          'label' => 'Usuário',
          'placeholder' => 'Seu e-mail cadastrado',
          'required' => true
        ],
        [
          'type' => 'password',
          'name' => 'senha',
          'required' => true
        ],
      ]

    ];
    return Render::block('form', $dados);
  }
}