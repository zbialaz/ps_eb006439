<?php
namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;
use Petshop\Core\Exception;
use Respect\Validation\Validator as v;

#[Entidade(name: 'usuarios')]
class Usuario extends DAO
{
  #[Campo(label: 'Cód. Usuário', pk: true, nn: true, auto: true)]
  protected $idUsuario;

  #[Campo(label: 'Nome Completo', nn: true, order:true)]
  protected $nome;

  #[Campo(label: 'E-mail', nn: true)]
  protected $email;

  #[Campo(label: 'Senha', nn: true)]
  protected $senha;

  #[Campo(label: 'Tipo', nn: true)]
  protected $tipo;

  #[Campo(label: 'Qtd. acessos', nn: true)]
  protected $qtdAcessos;

  #[Campo(label: 'Dt. Criação', nn: true, auto: true)]
  protected $created_at;

  #[Campo(label: 'Dt. Alteração', nn: true, auto: true)]
  protected $updated_at;


  public function getIdUsuario()
  {
    return $this->idUsuario;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome(string $nome): self
  {
    $this->nome = $nome;

    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $email = strtolower($email);

    $emailValido = v::email()->validate($email);
    if (!$emailValido) {
      throw new Exception('O e-mail informado é inválido');
    }

    $this->email = $email;
    return $this;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha(string $senha): self
  {
    if($this->senha && !$senha) {
      return $this;
    }
    if (strlen($senha) < 5) {
      throw new Exception('O comprimento da senha é inválido, digite ao menos cinco caracteres');
    }

    $hashdaSenha = hash_hmac('md5', $senha, SALT_SENHA);
    $senha = password_hash($hashdaSenha, PASSWORD_DEFAULT);
    $this->senha = $senha;
    return $this;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo(string $tipo): self
  {
    $tipo = trim($tipo);
    if (!in_array($tipo, ['Gestor', 'Vendedor'])) {
      throw new Exception('O tipo de pessoa não está definido corretamente');
    }

    $this->tipo = $tipo;
    return $this;
  }

  public function getQtdAcessos()
  {
    return $this->qtdAcessos;
  }

  public function setQtdAcessos(int $qtdAcessos): self
  {
    $this->qtdAcessos = $qtdAcessos;

    return $this;
  }

  public function getCreated_At()
  {
    return $this->created_at;
  }

  public function getUpdated_At()
  {
    return $this->updated_at;
  }
}