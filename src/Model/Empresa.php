<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Entidade;
use Petshop\Core\Attribute\Campo;
use Petshop\Core\DAO;
use Petshop\Core\Exception;
use Respect\Validation\Validator as v;

#[Entidade(name: 'empresas')]
class Empresa extends DAO
{
    #[Campo(label: 'Cliente', nn: true, pk: true, auto: true)]
    protected $idEmpresa;

    #[Campo(label: 'Nome fantasia', nn: true)]
    protected $nomeFantasia;

    #[Campo(label: 'Razão Social', nn: true)]
    protected $razaoSocial;

    #[Campo(label: 'Tipo', nn: true)]
    protected $tipo;
    
    #[Campo(label: 'CEP', nn: true)]
    protected $cep;

    #[Campo(label: 'Cidade', nn: true)]
    protected $cidade;

    #[Campo(label: 'Estado', nn: true)]
    protected $estado;

    #[Campo(label: 'Rua')]
    protected $rua;

    #[Campo(label: 'Bairro')]
    protected $bairro;

    #[Campo(label: 'Número')]
    protected $numero;

    #[Campo(label: 'Telefone 01', nn:true)]
    protected $telefone1;

    #[Campo(label:'Telefone 02', nn:true)]
    protected $telefone2;

    #[Campo(label: 'Site')]
    protected $site;

    #[Campo(label: 'E-mail', nn:true)]
    protected $email;

    #[Campo(label: 'CNPJ')]
    protected $cnpj;

    #[Campo(label: 'Dt. Criação', nn: true)]
    protected $created_at;

    #[Campo(label: 'Dt. Alteração', nn: true)]
    protected $updated_at;

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia)
    {
        $nomeFantasia = trim($nomeFantasia);
        $tamanhoValido = v::stringType()->lenght(1, 5)->validate($nomeFantasia);
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTelefone1()
    {
        return $this->telefone1;
    }

    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;

        return $this;
    }

    public function getTelefone2()
    {
        return $this->telefone2;
    }

    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;

        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }
}