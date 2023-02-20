<?php

namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;
use Petshop\Core\Exception;

#[Entidade(name: 'marcas')]

class Marca extends DAO
{
    #[Campo(label:'Cód. Marca', nn:true, pk:true, auto:true)]
    protected $idMarca;

    #[Campo(label:'Marca', nn:true, order:true)]
    protected $marca;

    #[Campo(label:'Fabricante')]
    protected $fabricante;

    #[Campo(label:'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdMarca()
    {
        return $this->idMarca;
    }

    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca): self
    {
        $marca = trim($marca);
        if (strlen($marca) < 3) {
            throw new Exception('Marca inválida');
        }
        $this->marca = $marca;
        return $this;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }
    public function setFabricante($fabricante): self
    {
        $fabricante = trim($fabricante);
        if ($fabricante == '') {
            $this->fabricante = null;
        } else if (strlen($fabricante) < 3) {
            throw new Exception('Nome do Fabricante inválido');
        }
        $this->fabricante = $fabricante;
        return $this;
    }

    public function getCreated_At()
    {
        return $this->created_at;
    }

    public function getUpdated_At()
    {
        return $this->updated_at;
    }
}