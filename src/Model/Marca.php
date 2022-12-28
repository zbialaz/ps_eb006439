<?php
namespace Petshop\Model;

use Petshop\Core\Attribute\Campo;
use Petshop\Core\Attribute\Entidade;
use Petshop\Core\DAO;
use Petshop\Core\Exception;

#[Entidade(name: 'marcas')]
class Marca extends DAO {
    
    #[Campo(label: 'Cód. Marca', nn:true, pk:true, auto:true)]
    protected $idmarca;

    #[Campo(label: 'Marca', nn:true, pk:true, auto:true)]
    protected $marca;

    #[Campo(label: 'Fabricante', nn:true, order:true)]
    protected $fabricante;
    
    #[Campo(label: 'Dt. Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label: 'Dt. Alteração', nn:true, auto:true)]
    protected $updated_at;
 
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    public function setIdmarca($idmarca)
    {
        $this->idmarca = $idmarca;

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $marca = trim($marca);
        if( strlen($marca < 3)) {
            throw new Exception('marca invalido');
        }
        $this->marca = $marca;

        return $this;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante)
    {
        $fabricante = trim($fabricante);
        if(strlen($fabricante) < 3) {
            throw new Exception('Nome do Fabricante invalido');
        }
        $this->fabricante = $fabricante;

        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}