<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'compras')]

class Compra extends DAO
{
    #[Campo(label:'Cód. Compra', nn:true, pk:true, auto:true)]
    protected $idcompra;

    #[Campo(label:'Cód. Fornecedor', nn:true, pk:true)]
    protected $idfornecedor;

    #[Campo(label:'Frete', nn:true)]
    protected $frete;

    #[Campo(label:'Valor Total', nn:true)]
    protected $total;
    
    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idcompra
     */
    public function getIdcompra()
    {
        return $this->idcompra;
    }

    /**
     * Get the value of idfornecedor
     */
    public function getIdfornecedor()
    {
        return $this->idfornecedor;
    }

    /**
     * Get the value of frete
     */
    public function getFrete()
    {
        return $this->frete;
    }

    /**
     * Set the value of frete
     */
    public function setFrete($frete): self
    {
        $this->frete = $frete;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

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