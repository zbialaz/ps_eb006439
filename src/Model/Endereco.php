<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;

#[Entidade(name: 'enderecos')]

class Endereco extends DAO
{
    #[Campo(label:'Cód. Endereço', nn:true, pk:true, auto:true)]
    protected $idendereco;

    #[Campo(label:'Cód. Cliente', nn:true)]
    protected $idcliente;

    #[Campo(label:'CEP', nn:true)]
    protected $cep;

    #[Campo(label:'Cidade', nn:true)]
    protected $cidade;

    #[Campo(label:'Estado', nn:true)]
    protected $estado;

    #[Campo(label:'Rua')]
    protected $rua;

    #[Campo(label:'Bairro')]
    protected $bairro;

    #[Campo(label:'Número')]
    protected $numero;
    
    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idendereco
     */
    public function getIdendereco()
    {
        return $this->idendereco;
    }

    /**
     * Get the value of idcliente
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     */
    public function setCep($cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     */
    public function setCidade($cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of rua
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     */
    public function setRua($rua): self
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     */
    public function setBairro($bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero($numero): self
    {
        $this->numero = $numero;

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