<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Entidade;
use Petshop\Core\Attribute\Campo;
use Petshop\Core\DAO;
use Petshop\Core\Exception;
use Respect\Validation\Rules\Exists;
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

    public function setNomeFantasia(string $nomeFantasia)
    {
        $nomeFantasia = trim($nomeFantasia);
        $tamanhoValido = v::stringType()->lenght(1, 255)->validate($nomeFantasia);
        $this->nomeFantasia = $nomeFantasia;
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do Nome Fantasia é inválido');
        }
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(string $razaoSocial)
    {
        $razaoSocial = trim($razaoSocial);
        $tamanhoValido = v::stringType()->lenght(1, 255)->validate($razaoSocial);
        $this->razaoSocial = $razaoSocial;
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do valor no campo Razão Social é inválido');
        }
        $this->nomeFantasia = $razaoSocial;
        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $tipoValido = in_array($tipo, ['Matrix', 'Filial']);
        if (!$tipoValido) {
            throw new Exception('O tipo deve ser Matriz ou Filial apenas');
        } 
        $this->tipo = $tipo;
        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep(string $cep)
    {
        $cepValido = v::PostalCode('BR')->lenght(1, 255)->validate($cep);
        if (!$cep) {
            throw new Exception('O campo CEP tem valor inválido');
        }
        $this->cep = $cep;
        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade)
    {
        $cidade = trim($cidade);
        $tamanhoValido = v::stringType()->lenght(2, 35)->validate($cidade);
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do valor campo é inválido');
        }
        $this->cidade = $cidade;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(string $estado)
    {
        $estado = trim($estado);
        $tamanhoValido = v::stringType()->lenght(4, 20)->validate($estado);
        if (!$tamanhoValido) {
            throw new Exception('O tamanho do valor no campo Estado é inválido');
        }
        $this->estado = $estado;
        return $this;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua(string $rua)
    {
        $this->rua = $rua;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTelefone1()
    {
        return $this->telefone1;
    }

    public function setTelefone1(string $telefone1)
    {
        {
            $telefone1 = trim($telefone1);
            $tipoValido = v::phone()->validate($telefone1);
            if (!$tipoValido) {
                throw new Exception('O campo Telefone 01 tem valor inválido');
            }
        $this->telefone1 = $telefone1;
        return $this;
    }
}

    public function getTelefone2()
    {
        return $this->telefone2;
    }

    public function setTelefone2(string $telefone2)
    {
        $telefone2 = trim($telefone2);
        $tipoValido = v::phone()->validate($telefone2);
        if (!$tipoValido) {
            throw new Exception('O campo Telefone 02 tem valor inválido');
        }
        $this->telefone2 = $telefone2;
        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite(string $site)
    {
        $site = trim($site);
        $tipoValido = v::url()->validate($site);
        if (!$tipoValido) {
            throw new Exception('O campo site tem valor inválido');
        }
        $this->site = $site;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $email = trim($email);
        $tipoValido = v::email()->validate($email);
        if (!$tipoValido) {
            throw new Exception('O campo E-mail tem valor inválido');
        }
        $this->email = $email;
        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $cnpj = trim($cnpj);
        $tipoValido = v::email()->validate($cnpj);
        if (!$tipoValido) {
            throw new Exception('O campo CNPJ tem valor inválido');
        }
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