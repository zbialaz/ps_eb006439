<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;
use Petshop\Core\Exception;
use Respect\Validation\Validator as v;

#[Entidade(name: 'fornecedores')]

class Fornecedor extends DAO
{
    #[Campo(label:'Cód. Fornecedor', nn:true, pk:true, auto:true)]
    protected $idFornecedor;

    #[Campo(label:'Razão Social', nn:true)]
    protected $razaoSocial;

    #[Campo(label:'Nome Fantasia', nn:true, order:true)]
    protected $nomeFantasia;

    #[Campo(label:'Telefone 01', nn:true)]
    protected $telefone1;

    #[Campo(label:'Telefone 02')]
    protected $telefone2;

    #[Campo(label:'E-mail', nn:true)]
    protected $email;

    #[Campo(label:'Contato')]
    protected $contato;
    
    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    /**
     * Get the value of idfornecedor
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Get the value of razaosocial
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set the value of razaosocial
     */
    public function setRazaoSocial($razaoSocial): self
    {
        $razaoSocial = trim($razaoSocial);
        $tamanhoValido = v::stringType()->length(1, 255)->validate($razaoSocial);
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do valor do campo Razão Social é inválido');
        }

        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * Get the value of nomefantasia
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * Set the value of nomefantasia
     */
    public function setNomeFantasia($nomeFantasia): self
    {
        $nomeFantasia = trim($nomeFantasia);
        $tamanhoValido = v::stringType()->length(1, 255)->validate($nomeFantasia);
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do Nome Fantasia é inválido');
        }

        $this->nomefantasia = $nomeFantasia;
        return $this;
    }

    /**
     * Get the value of telefone1
     */
    public function getTelefone1()
    {
        return $this->telefone1;
    }

    /**
     * Set the value of telefone1
     */
    public function setTelefone1($telefone1): self
    {
        $telefone1 = trim($telefone1);
        $tamanhoValido = v::phone()->validate($telefone1);
        if (!$tamanhoValido) {
            throw new Exception('O campo Telefone 01 tem valor inválido');
        }

        $this->telefone1 = $telefone1;
        return $this;
    }

    /**
     * Get the value of telefone2
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * Set the value of telefone2
     */
    public function setTelefone2($telefone2): self
    {
        $telefone2 = trim($telefone2);
        
        if ($telefone2 == '') {
            $this->telefone2 = null;
            return $this;
        } 
        
        $tamanhoValido = v::phone()->validate($telefone2);
        if (!$tamanhoValido) {
            throw new Exception('O campo Telefone 02 tem valor inválido');
        }

        $this->telefone2 = $telefone2;
        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $email = trim($email);
        $tamanhoValido = v::email()->validate($email);
        if (!$tamanhoValido) {
            throw new Exception('O campo E-mail tem valor inválido');
        }
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of contato
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * Set the value of contato
     */
    public function setContato($contato): self
    {
        if ($contato == '') {
            $this->contato = null;
            return $this;
        }

        $this->contato = $contato;
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