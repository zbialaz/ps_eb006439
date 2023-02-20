<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'vendas')]

class Venda extends DAO
{
    #[Campo(label:'Cód. Venda', nn:true, pk:true, auto:true)]
    protected $idvenda;

    #[Campo(label:'Cód. Carrinho', nn:true, pk:true)]
    protected $idcarrinho;

    #[Campo(label:'Forma de Pagamento', nn:true)]
    protected $formagpto;

    #[Campo(label:'Status', nn:true)]
    protected $status;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idvenda
     */
    public function getIdvenda()
    {
        return $this->idvenda;
    }

    /**
     * Get the value of idcarrinho
     */
    public function getIdcarrinho()
    {
        return $this->idcarrinho;
    }

    /**
     * Get the value of formagpto
     */
    public function getFormagpto()
    {
        return $this->formagpto;
    }

    /**
     * Set the value of formagpto
     */
    public function setFormagpto($formagpto): self
    {
        $this->formagpto = $formagpto;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

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