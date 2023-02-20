<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'avaliacoes')]


class Avaliacao extends DAO
{
    #[Campo(label:'Cód. Avaliação', nn:true, pk:true, auto:true)]
    protected $idavaliacao;

    #[Campo(label:'Cód. Produto', nn:true)]
    protected $idproduto;

    #[Campo(label:'Cód. Cliente', nn:true)]
    protected $idcliente;

    #[Campo(label:'Nota', nn:true)]
    protected $nota;

    #[Campo(label:'Comentário')]
    protected $comentario;
    
    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;


    /**
     * Get the value of idavaliacao
     */
    public function getIdavaliacao()
    {
        return $this->idavaliacao;
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
     * Get the value of nota
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set the value of nota
     */
    public function setNota($nota): self
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get the value of comentario
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     */
    public function setComentario($comentario): self
    {
        $this->comentario = $comentario;

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