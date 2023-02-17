<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'carrinhos')]

class carrinhos extends DAO
{
    #[Campo(label:'Cód. Carrinho', nn:true, pk:true, auto:true)]
    protected $idcarrinho;

    #[Campo(label:'Cód. Cliente', nn:true, pk:true)]
    protected $idcliente;

    #[Campo(label:'Valor Total', nn:true)]
    protected $valortotal;

    #[Campo(label:'Encerrado', nn:true)]
    protected $encerrado;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idcarrinho
     */
    public function getIdcarrinho()
    {
        return $this->idcarrinho;
    }

    /**
     * Get the value of idcliente
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the value of valortotal
     */
    public function getValortotal()
    {
        return $this->valortotal;
    }

    /**
     * Set the value of valortotal
     */
    public function setValortotal($valortotal): self
    {
        $this->valortotal = $valortotal;

        return $this;
    }

    /**
     * Get the value of encerrado
     */
    public function getEncerrado()
    {
        return $this->encerrado;
    }

    /**
     * Set the value of encerrado
     */
    public function setEncerrado($encerrado): self
    {
        $this->encerrado = $encerrado;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}