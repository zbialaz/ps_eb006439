<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'descontos')]


class Desconto extends DAO
{
    #[Campo(label:'Cód. Desconto', nn:true, pk:true, auto:true)]
    protected $iddesconto;

    #[Campo(label:'Código')]
    protected $codigo;

    #[Campo(label:'Data Inicial')]
    protected $dataini;

    #[Campo(label:'Data Final')]
    protected $datafim;

    #[Campo(label:'Percentual de desconto')]
    protected $percentual;
    
    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of iddesconto
     */
    public function getIddesconto()
    {
        return $this->iddesconto;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     */
    public function setCodigo($codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of dataini
     */
    public function getDataini()
    {
        return $this->dataini;
    }

    /**
     * Set the value of dataini
     */
    public function setDataini($dataini): self
    {
        $this->dataini = $dataini;

        return $this;
    }

    /**
     * Get the value of datafim
     */
    public function getDatafim()
    {
        return $this->datafim;
    }

    /**
     * Set the value of datafim
     */
    public function setDatafim($datafim): self
    {
        $this->datafim = $datafim;

        return $this;
    }

    /**
     * Get the value of percentual
     */
    public function getPercentual()
    {
        return $this->percentual;
    }

    /**
     * Set the value of percentual
     */
    public function setPercentual($percentual): self
    {
        $this->percentual = $percentual;

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