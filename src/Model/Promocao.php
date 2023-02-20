<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'promocoes')]
class Promocao extends DAO
{
  #[Campo(label: 'Cód. Promocao', pk: true, nn: true, auto: true)]
  protected $idpromocao;

  #[Campo(label: 'Título', nn: true, order: true)]
  protected $titulo;

  #[Campo(label: 'Percentual', nn: true)]
  protected $percentual;

  #[Campo(label: 'Dt. Inicial', nn: true)]
  protected $datainicial;

  #[Campo(label: 'Dt. Final')]
  protected $datafinal;

  #[Campo(label: 'Dt. Criação', nn: true, auto: true)]
  protected $created_at;

  #[Campo(label: 'Dt. Alteração', nn: true, auto: true)]
  protected $updated_at;


  public function getIdPromocao()
  {
    return $this->idpromocao;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setTitulo(string $titulo): self
  {
    $this->titulo = $titulo;

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

  public function getPercentual()
  {
    return $this->percentual;
  }

  public function setPercentual($percentual)
  {
    $this->percentual = $percentual;

    return $this;
  }

  public function getDatainicial()
  {
    return $this->datainicial;
  }

  public function setDatainicial($datainicial)
  {
    $this->datainicial = $datainicial;

    return $this;
  }

  public function getDatafinal()
  {
    return $this->datafinal;
  }

  public function setDatafinal($datafinal)
  {
    $this->datafinal = $datafinal;

    return $this;
  }
}