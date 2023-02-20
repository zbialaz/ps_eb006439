<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'comentarios')]

class Comentario extends DAO
{
    #[Campo(label:'Cód. Comentário', nn:true, pk:true, auto:true)]
    protected $idcomentario;

    #[Campo(label:'Cód. Produto', nn:true)]
    protected $idproduto;

    #[Campo(label:'Cód. Cliente', nn:true)]
    protected $idcliente;

    #[Campo(label:'Tipo', nn:true)]
    protected $tipo;

    #[Campo(label:'Descrição', nn:true)]
    protected $descricao;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idcomentario
     */
    public function getIdcomentario()
    {
        return $this->idcomentario;
    }

    /**
     * Get the value of idproduto
     */
    public function getIdproduto()
    {
        return $this->idproduto;
    }

    /**
     * Get the value of idcliente
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

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