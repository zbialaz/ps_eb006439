<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'favoritos')]

class Favorito extends DAO
{
    #[Campo(label:'Cód. Favorito', nn:true, pk:true, auto:true)]
    protected $idFavorito;

    #[Campo(label:'Cód. Produto', nn:true)]
    protected $idProduto;

    #[Campo(label:'Cód. Cliente', nn:true)]
    protected $idCliente;

    #[Campo(label:'Tipo', nn:true)]
    protected $ativo;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idFavorito
     */
    public function getIdFavorito()
    {
        return $this->idFavorito;
    }

    /**
     * Get the value of idProduto
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Get the value of idCliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Get the value of ativo
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     */
    public function setAtivo($ativo): self
    {
        $this->ativo = $ativo;

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