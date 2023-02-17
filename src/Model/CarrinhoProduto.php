<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'carrinhosprodutos')]


class CarrinhoProduto extends DAO
{
    #[Campo(label:'Cód. Produto', nn:true, pk:true, auto:true)]
    protected $idproduto;

    #[Campo(label:'Cód. Carrinho', nn:true, pk:true)]
    protected $idcarrinho;

    #[Campo(label:'Preço', nn:true)]
    protected $preco;

    #[Campo(label:'Quantidade', nn:true)]
    protected $quantidade;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    /**
     * Get the value of idproduto
     */
    public function getIdproduto()
    {
        return $this->idproduto;
    }

    /**
     * Get the value of idcarrinho
     */
    public function getIdcarrinho()
    {
        return $this->idcarrinho;
    }

    /**
     * Get the value of preco
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     */
    public function setPreco($preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of quantidade
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     */
    public function setQuantidade($quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}